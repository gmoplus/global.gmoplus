<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.10.0
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: RLTAMIGATEWAY.CLASS.PHP
 *  
 ******************************************************************************/

class rlTamiGateway extends rlGateway
{
    /**
     * TAMI API URLs
     */
    private $api_url_test = 'https://ppgpayment-test.birlesikodeme.com:20000/api/ppg/Payment';
    private $api_url_live = 'https://api.tami.com.tr/api/ppg/Payment';
    private $api_url;
    
    /**
     * Initialize TAMI Gateway
     */
    public function init()
    {
        global $config;
        
        $this->test_mode = $config['tami_test_mode'] == 'true';
        $this->api_url = $this->test_mode ? $this->api_url_test : $this->api_url_live;
        
        // TAMI Configuration - TAMI panelinden alınan gerçek değerler
        $this->merchant_id = !empty($config['tami_merchant_id']) ? $config['tami_merchant_id'] : '77013594';
        $this->merchant_key = !empty($config['tami_merchant_key']) ? $config['tami_merchant_key'] : '86af9ca6-03c5-4ab0-9ca9-16473f48a2f8';
        $this->user_code = !empty($config['tami_user_code']) ? $config['tami_user_code'] : '84013596';
    }
    
    /**
     * Check if TAMI is properly configured
     */
    public function isConfigured()
    {
        global $config;
        
        // DEBUG: Log config values
        error_log("TAMI isConfigured: merchant_id = " . ($config['tami_merchant_id'] ?? 'NOT_SET'));
        error_log("TAMI isConfigured: merchant_key = " . (isset($config['tami_merchant_key']) ? 'SET' : 'NOT_SET'));
        error_log("TAMI isConfigured: user_code = " . ($config['tami_user_code'] ?? 'NOT_SET'));
        
        $result = !empty($config['tami_merchant_id']) 
            && !empty($config['tami_merchant_key']) 
            && !empty($config['tami_user_code']);
            
        error_log("TAMI isConfigured: result = " . ($result ? 'true' : 'false'));
        
        return $result;
    }
    
    /**
     * Check if customer is from Turkey
     */
    public function isTurkishCustomer()
    {
        global $config;
        
        if (!$config['tami_only_turkey']) {
            return true;
        }
        
        $user_ip = $this->getUserIP();
        
        // Basic Turkish IP detection
        $turkish_ranges = [
            '78.160.0.0/11',
            '88.224.0.0/11', 
            '94.54.0.0/15',
            '195.87.0.0/16'
        ];
        
        foreach ($turkish_ranges as $range) {
            if ($this->ipInRange($user_ip, $range)) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Start payment process
     */
    public function call()
    {
        global $rlPayment, $config, $lang;
        
        error_log("========================");
        error_log("TAMI GATEWAY call() method TRIGGERED!!!");
        error_log("========================");
        
        if (!$this->isConfigured()) {
            error_log("TAMI Gateway: Not configured properly");
            $this->errors[] = 'TAMI not configured properly';
            return false;
        }
        
        // Use Hosted Payment instead of direct API
        error_log("TAMI Gateway: Switching to hosted payment mode");
        
        // Load TAMI Hosted Gateway
        $reefless = $GLOBALS['reefless'];
        $reefless->loadClass('TamiHosted', null, 'tami');
        
        $GLOBALS['rlTamiHosted']->init();
        
        // Get order data
        $total_amount = $rlPayment->getOption('total');
        $order_data = array(
            'total' => $total_amount,
            'amount' => $total_amount, // TAMI için gerekli
            'currency' => $config['system_currency'],
            'order_id' => time() . '_' . mt_rand(1000, 9999),
            'customer_name' => $_SESSION['account']['First_name'] . ' ' . $_SESSION['account']['Last_name'],
            'customer_email' => $_SESSION['account']['Mail'],
            'customer_phone' => $_SESSION['account']['Phone'] ?? '05001234567'
        );
        
        error_log("TAMI Gateway Order data: " . print_r($order_data, true));
        
        // Create payment link and redirect
        $payment_response = $GLOBALS['rlTamiHosted']->createPaymentLink($order_data);
        
        error_log("TAMI Gateway Payment Response: " . print_r($payment_response, true));
        
        if ($payment_response && isset($payment_response['success']) && $payment_response['success'] && isset($payment_response['payment_url'])) {
            $payment_url = $payment_response['payment_url'];
            error_log("TAMI Gateway Redirecting to: " . $payment_url);
            header("Location: " . $payment_url);
            exit;
        } else {
            $error_msg = isset($payment_response['error']) ? $payment_response['error'] : 'Ödeme bağlantısı oluşturulamadı';
            error_log("TAMI Gateway: Failed to create payment URL - " . $error_msg);
            echo "TAMI Hatası: " . $error_msg . ". Lütfen tekrar deneyin.";
            exit;
        }
        
        // OLD CODE BELOW (not used anymore)
        /*
        
        // Get payment data*/
        
        // Return true to indicate success (though we redirect above)
        return true;
    }
    
    // OLD METHOD BACKUP
    private function oldCall()
    {
        global $rlPayment, $config, $lang;
        
        // Get payment data
        $total = $rlPayment->getOption('total');
        $account_id = $rlPayment->getOption('account_id');
        
        $order_id = 'GMO_' . time() . '_' . $account_id;
        $total_amount = intval($total * 100);
        
        // Get form data
        $card_data = [
            'card_number' => $_POST['tami_card_number'],
            'expiry_month' => $_POST['tami_expiry_month'], 
            'expiry_year' => $_POST['tami_expiry_year'],
            'cvv' => $_POST['tami_cvv'],
            'card_holder' => $_POST['tami_card_holder'],
            'installments' => $_POST['tami_installments'] ?: 1
        ];
        
        // Generate hash
        $rnd = uniqid();
        $hash_string = $config['tami_merchant_key'] . $config['tami_user_code'] . $rnd . 'Auth' . $total_amount . '' . $order_id;
        $hash = strtoupper(hash('sha512', mb_convert_encoding($hash_string, 'UTF-16LE')));
        
        // Prepare request
        $request_data = [
            'memberId' => 1,
            'merchantId' => intval($config['tami_merchant_id']),
            'cardNumber' => $card_data['card_number'],
            'expiryDateMonth' => $card_data['expiry_month'],
            'expiryDateYear' => $card_data['expiry_year'],
            'cvv' => $card_data['cvv'],
            'userCode' => $config['tami_user_code'],
            'txnType' => 'Auth',
            'installmentCount' => strval($card_data['installments']),
            'currency' => '949',
            'orderId' => $order_id,
            'totalAmount' => strval($total_amount),
            'rnd' => $rnd,
            'hash' => $hash,
            'description' => 'GMO Plus Payment',
            'cardHolderName' => $card_data['card_holder'],
            'requestIp' => $this->getUserIP()
        ];
        
        $this->transaction_id = $order_id;
        
        if ($config['tami_3d_secure']) {
            return $this->process3DPayment($request_data);
        } else {
            return $this->processDirectPayment($request_data);
        }
    }
    
    /**
     * Complete payment process
     */
    public function callBack()
    {
        if ($_POST) {
            $status = $_POST['status'] ?? '';
            
            if ($status === 'success') {
                return $this->processSuccessfulPayment($_POST);
            } else {
                $this->errors[] = $_POST['message'] ?? 'Payment failed';
                return false;
            }
        }
        
        return false;
    }
    
    /**
     * Process 3D payment
     */
    private function process3DPayment($request_data)
    {
        $request_data['callbackUrl'] = RL_URL_HOME . 'plugins/tami/callback.php';
        
        $response = $this->sendRequest('/ThreeDPayment', $request_data);
        
        if ($response && isset($response['threeDSecureUrl'])) {
            header('Location: ' . $response['threeDSecureUrl']);
            exit;
        } else {
            $this->errors[] = 'TAMI 3D payment error';
            return false;
        }
    }
    
    /**
     * Process direct payment
     */
    private function processDirectPayment($request_data)
    {
        $response = $this->sendRequest('/NoneSecurePayment', $request_data);
        
        if ($response && isset($response['result']['responseCode']) && $response['result']['responseCode'] == '00') {
            return $this->processSuccessfulPayment($response['result']);
        } else {
            $this->errors[] = 'TAMI payment error';
            return false;
        }
    }
    
    /**
     * Process successful payment
     */
    private function processSuccessfulPayment($result)
    {
        global $rlPayment;
        
        $update_data = [
            'Status' => 'success',
            'Gateway' => 'tami',
            'Gateway_transaction_id' => $result['authCode'] ?? '',
            'Txn_id' => $this->transaction_id,
        ];
        
        $rlPayment->completePayment($update_data);
        return true;
    }
    
    /**
     * Send API request
     */
    private function sendRequest($endpoint, $data)
    {
        $url = $this->api_url . $endpoint;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, !$this->test_mode);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200 && $response) {
            return json_decode($response, true);
        }
        
        return false;
    }
    
    /**
     * Get user IP
     */
    private function getUserIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    
    /**
     * Check if IP is in range
     */
    private function ipInRange($ip, $range)
    {
        if (strpos($range, '/') === false) {
            return $ip === $range;
        }
        
        list($range, $netmask) = explode('/', $range, 2);
        $range_decimal = ip2long($range);
        $ip_decimal = ip2long($ip);
        $wildcard_decimal = pow(2, (32 - $netmask)) - 1;
        $netmask_decimal = ~ $wildcard_decimal;
        
        return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
    }
    
    /**
     * Get transaction ID
     */
    public function getTransactionID()
    {
        return $this->transaction_id;
    }
} 