<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.10.0
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: RLTAMIHOSTED.CLASS.PHP
 *  
 ******************************************************************************/

class rlTamiHosted extends rlGateway
{
    /**
     * TAMI Hosted Payment URLs - Güncel API endpoint'leri
     */
    private $hosted_url_test = 'https://sandbox-paymentapi.tami.com.tr/hosted/create-one-time-hosted-token';
    private $hosted_url_live = 'https://paymentapi.tami.com.tr/hosted/create-one-time-hosted-token';
    private $hosted_url;
    
    /**
     * Initialize TAMI Hosted Gateway
     */
    public function init()
    {
        global $config;
        
        $this->test_mode = ($config['tami_test_mode'] == '1' || $config['tami_test_mode'] == 'true');
        $this->hosted_url = $this->test_mode ? $this->hosted_url_test : $this->hosted_url_live;
        
        error_log("TAMI Hosted Init - Test Mode: " . ($this->test_mode ? 'YES' : 'NO'));
        error_log("TAMI Hosted Init - URL: " . $this->hosted_url);
        
        // TAMI Configuration
        if ($this->test_mode) {
            // Test mode: FORCE dokümantasyondaki test değerleri
            $this->merchant_id = '77006950';  // TAMI test merchant
            $this->merchant_key = '0edad05a-7ea7-40f1-a80c-d600121ca51b';  // TAMI test key
            $this->user_code = '84006953';    // TAMI test terminal
        } else {
            // Production mode: Gerçek değerler (TAMI panelinden alınan)
            $this->merchant_id = !empty($config['tami_merchant_id']) ? $config['tami_merchant_id'] : '77013594';
            $this->merchant_key = !empty($config['tami_merchant_key']) ? $config['tami_merchant_key'] : '86af9ca6-03c5-4ab0-9ca9-16473f48a2f8';
            $this->user_code = !empty($config['tami_user_code']) ? $config['tami_user_code'] : '84013596';
        }
    }
    
    /**
     * Create hosted payment link
     */
    public function createPaymentLink($order_data)
    {
        // TAMI Ortak Ödeme Sayfası dokümantasyonuna göre parametreler
        $request_data = array(
            'amount' => floatval($order_data['amount']),
            'orderId' => $order_data['order_id'],
            'successCallbackUrl' => RL_URL_HOME . 'plugins/tami/success.php',
            'failCallbackUrl' => RL_URL_HOME . 'plugins/tami/fail.php',
            'mobilePhoneNumber' => $this->formatPhoneNumber($order_data['customer_phone']),
            'data' => array(
                'customer_name' => isset($order_data['customer_name']) ? $order_data['customer_name'] : '',
                'customer_email' => isset($order_data['customer_email']) ? $order_data['customer_email'] : '',
                'description' => isset($order_data['description']) ? $order_data['description'] : ''
            )
        );
        
        // DEBUG: API isteği
        error_log("TAMI API Request URL: " . $this->hosted_url);
        error_log("TAMI API Request Data: " . json_encode($request_data));
        
        // Send request to TAMI
        $response = $this->sendRequest($this->hosted_url, $request_data);
        
        error_log("TAMI API Response: " . json_encode($response));
        error_log("TAMI API HTTP Code: " . (isset($response['http_code']) ? $response['http_code'] : 'unknown'));
        
        if ($response && isset($response['oneTimeToken'])) {
            // TAMI hosted payment sayfası URL'ini oluştur
            $payment_url = $this->test_mode 
                ? 'https://sandbox-portal.tami.com.tr/hostedPaymentPage?token=' . $response['oneTimeToken']
                : 'https://portal.tami.com.tr/hostedPaymentPage?token=' . $response['oneTimeToken'];
                
            return array(
                'success' => true,
                'payment_url' => $payment_url,
                'token' => $response['oneTimeToken'],
                'token_create_time' => $response['tokenCreateTime']
            );
        }
        
        return array(
            'success' => false,
            'error' => isset($response['message']) ? $response['message'] : 'Ödeme linki oluşturulamadı'
        );
    }
    
    /**
     * Process hosted payment
     */
    public function processPayment($order_data)
    {
        // Create payment link and redirect
        $result = $this->createPaymentLink($order_data);
        
        if ($result['success']) {
            // Redirect to TAMI payment page
            header('Location: ' . $result['payment_url']);
            exit;
        } else {
            // Return error
            return array(
                'success' => false,
                'error' => $result['error']
            );
        }
    }
    
    /**
     * Verify payment callback
     */
    public function verifyCallback($callback_data)
    {
        // Verify hash
        $expected_hash = hash('sha256', 
            $callback_data['merchant_id'] . 
            $callback_data['order_id'] . 
            $callback_data['amount'] . 
            $callback_data['status'] . 
            $this->merchant_key
        );
        
        if ($callback_data['hash'] !== $expected_hash) {
            return array(
                'success' => false,
                'error' => 'Hash verification failed'
            );
        }
        
        return array(
            'success' => $callback_data['status'] == 'SUCCESS',
            'transaction_id' => $callback_data['transaction_id'],
            'order_id' => $callback_data['order_id'],
            'amount' => $callback_data['amount'],
            'status' => $callback_data['status'],
            'error_message' => $callback_data['error_message'] ?? null
        );
    }
    
    /**
     * Check if TAMI Hosted is properly configured
     */
    public function isConfigured()
    {
        global $config;
        
        return !empty($config['tami_merchant_id']) 
            && !empty($config['tami_merchant_key']) 
            && !empty($config['tami_user_code']);
    }
    
    /**
     * Main payment call - creates payment link and redirects
     */
    public function call()
    {
        // Get order data from session or request
        global $session, $_POST;
        
        $order_data = isset($_POST['order_data']) ? $_POST['order_data'] : $session['order_data'];
        
        return $this->processPayment($order_data);
    }
    
    /**
     * Callback handler for payment results
     */
    public function callBack()
    {
        $callback_data = $_POST;
        
        if (empty($callback_data)) {
            $callback_data = $_GET;
        }
        
        return $this->verifyCallback($callback_data);
    }
    
    /**
     * Format phone number for TAMI (must be 905xxxxxxxxx format)
     */
    private function formatPhoneNumber($phone)
    {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // If starts with +90, remove +
        if (substr($phone, 0, 3) == '90') {
            return $phone;
        }
        
        // If starts with 0, replace with 90
        if (substr($phone, 0, 1) == '0') {
            return '90' . substr($phone, 1);
        }
        
        // If 10 digits without country code, add 90
        if (strlen($phone) == 10) {
            return '90' . $phone;
        }
        
        return $phone;
    }
    
    /**
     * Generate PG-Auth-Token header according to TAMI documentation
     */
    private function generateAuthToken()
    {
        // merchantNumber:terminalNumber:hash formatında
        $text = $this->merchant_id . $this->user_code . $this->merchant_key;
        $hash = base64_encode(hash('sha256', $text, true));
        
        return $this->merchant_id . ':' . $this->user_code . ':' . $hash;
    }
    
    /**
     * Send HTTP request with TAMI headers
     */
    private function sendRequest($url, $data)
    {
        $correlation_id = uniqid('tami_', true);
        $auth_token = $this->generateAuthToken();
        
        error_log("TAMI Auth Debug - Merchant ID: " . $this->merchant_id);
        error_log("TAMI Auth Debug - User Code: " . $this->user_code);
        error_log("TAMI Auth Debug - Auth Token: " . $auth_token);
        error_log("TAMI Auth Debug - Correlation ID: " . $correlation_id);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            'correlationId: ' . $correlation_id,
            'PG-Auth-Token: ' . $auth_token
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        
        error_log("TAMI cURL Response: " . $response);
        error_log("TAMI cURL HTTP Code: " . $http_code);
        error_log("TAMI cURL Error: " . $curl_error);
        
        if (curl_errno($ch)) {
            curl_close($ch);
            return array('error_message' => 'CURL Error: ' . $curl_error);
        }
        
        curl_close($ch);
        
        if ($http_code != 200) {
            return array('error_message' => 'HTTP Error: ' . $http_code . ' - Response: ' . $response);
        }
        
        $decoded_response = json_decode($response, true);
        error_log("TAMI Decoded Response: " . print_r($decoded_response, true));
        
        return $decoded_response;
    }
} 