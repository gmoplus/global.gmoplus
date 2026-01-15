<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.10.0
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: RLTAMI.CLASS.PHP
 *  
 ******************************************************************************/

class rlTami
{
    /**
     * Hook for payment gateways
     *
     * @hook phpGetPaymentGateways
     */
    public function hookPhpGetPaymentGateways(&$gateways, &$content)
    {
        global $config, $lang;
        
        // DEBUG: Log that hook is called
        error_log("TAMI Hook: phpGetPaymentGateways called");
        
        // Include gateway class
        require_once RL_PLUGINS . 'tami/rlTamiGateway.class.php';
        
        // Initialize TAMI Gateway
        $tamiGateway = new rlTamiGateway();
        $tamiGateway->init();
        
        // DEBUG: Check IP
        $isConfigured = $tamiGateway->isConfigured();
        error_log("TAMI Hook: isConfigured = " . ($isConfigured ? 'true' : 'false'));
        
        // Check if TAMI should be displayed (Turkey IP check) - DISABLED FOR DEBUG
        // if (!$tamiGateway->isTurkishCustomer()) {
        //     error_log("TAMI Hook: Not Turkish customer - skipping");
        //     return;
        // }
        
        // Check if TAMI is configured
        if (!$tamiGateway->isConfigured()) {
            error_log("TAMI Hook: Not configured - skipping");
            return;
        }
        
        // DEBUG: Adding TAMI to gateways
        error_log("TAMI Hook: Adding TAMI to gateways array");
        
        // Add TAMI in proper array format like other gateways
        $gateways[] = array(
            'Key' => 'tami',
            'Plugin' => 'tami',
            'Form_type' => 'offsite',
            'Status' => 'active',
            'Type' => 'online'
        );
        
        // DEBUG: Final gateways array
        error_log("TAMI Hook: Final gateways = " . print_r($gateways, true));
    }
    
    /**
     * Hook for loading payment form
     *
     * @hook loadPaymentForm
     */
    public function hookLoadPaymentForm(&$gateway, &$form)
    {
        if ($gateway == 'tami') {
            global $rlPayment, $rlSmarty, $lang, $config;
            
            // DEBUG
            error_log("TAMI loadPaymentForm called for gateway: " . $gateway);
            
            // TAMI Hosted Payment - Direct redirect form
            $form = '
            <div class="tami-hosted-payment" style="text-align: center; padding: 20px; border: 2px solid #e74c3c; border-radius: 10px; background: #fff;">
                <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                    <img src="' . RL_PLUGINS_URL . 'tami/static/tami.png" alt="TAMI" style="height: 30px; width: auto; max-width: 60px; margin-right: 10px;" onerror="this.style.display=\'none\';">
                    <h3 style="margin: 0; color: #e74c3c;">TAMI Güvenli Ödeme</h3>
                </div>
                <p style="color: #666;">T. Garanti Bankası güvencesiyle güvenli ödeme sayfasına yönlendirileceksiniz.</p>
                <div style="display: flex; justify-content: center; gap: 10px; margin: 15px 0;">
                    <img src="' . RL_PLUGINS_URL . 'tami/static/visa.png" alt="Visa" style="height: 30px;" onerror="this.style.display=\'none\';">
                    <img src="' . RL_PLUGINS_URL . 'tami/static/mastercard.png" alt="Mastercard" style="height: 30px;" onerror="this.style.display=\'none\';">
                    <img src="' . RL_PLUGINS_URL . 'tami/static/troy.png" alt="Troy" style="height: 30px;" onerror="this.style.display=\'none\';">
                </div>
                <p style="font-size: 12px; color: #999;"><strong>Test Modu Aktif</strong></p>
            </div>';
            
            error_log("TAMI loadPaymentForm: hosted payment form generated");
            return;
            
            // Assign variables to template
            $rlSmarty->assign('tami_test_mode', $config['tami_test_mode']);
            $rlSmarty->assign('tami_3d_secure', $config['tami_3d_secure']);
            
            // Generate installment options
            $installments = [];
            for ($i = 1; $i <= 12; $i++) {
                $installments[] = [
                    'value' => $i,
                    'name' => $i == 1 ? $lang['tami_single_payment'] : $i . ' ' . $lang['tami_installments']
                ];
            }
            $rlSmarty->assign('tami_installments', $installments);
            
            // Get current payment total
            $total = $rlPayment->getOption('total');
            $rlSmarty->assign('payment_total', $total);
            
            $form = $rlSmarty->fetch(RL_PLUGINS . 'tami/form.tpl');
        }
    }
    
    /**
     * Hook for AJAX requests
     *
     * @hook ajaxRequest
     */
    public function hookAjaxRequest()
    {
        global $config, $rlPayment;
        
        $mode = $_GET['mode'] ?? '';
        
        switch ($mode) {
            case 'tamiPayment':
                $this->processTamiHostedPayment();
                break;
                
            case 'tamiInstallmentQuery':
                $this->queryInstallments();
                break;
        }
    }
    
    /**
     * Process TAMI Hosted Payment (redirect to TAMI)
     */
    private function processTamiHostedPayment()
    {
        global $config, $rlPayment, $lang;
        
        error_log("TAMI processTamiHostedPayment called");
        
        // Load TAMI Hosted Gateway
        require_once RL_CLASSES . 'rlGateway.class.php';
        $reefless = $GLOBALS['reefless'];
        $reefless->loadClass('TamiHosted', null, 'tami');
        
        $GLOBALS['rlTamiHosted']->init();
        
        // Get order data
        $order_data = array(
            'total' => $rlPayment->getOption('total'),
            'currency' => $config['system_currency'],
            'order_id' => time() . '_' . mt_rand(1000, 9999),
            'customer_name' => $_SESSION['account']['First_name'] . ' ' . $_SESSION['account']['Last_name'],
            'customer_email' => $_SESSION['account']['Mail'],
            'customer_phone' => $_SESSION['account']['Phone'] ?? '05001234567'
        );
        
        error_log("TAMI Order data: " . print_r($order_data, true));
        
        // Create payment link and redirect
        $payment_url = $GLOBALS['rlTamiHosted']->createPaymentLink($order_data);
        
        if ($payment_url) {
            $out = array(
                'status' => 'OK',
                'redirect_url' => $payment_url,
                'message' => 'TAMI ödeme sayfasına yönlendiriliyor...'
            );
        } else {
            $out = array(
                'status' => 'ERROR',
                'message' => 'TAMI ödeme bağlantısı oluşturulamadı.'
            );
        }
        
        exit(json_encode($out));
    }
    
    /**
     * Main payment call method (required by Flynax)
     * This is called when TAMI is selected as payment method
     */
    public function call()
    {
        global $config, $rlPayment;
        
        error_log("========================");
        error_log("TAMI call() method TRIGGERED!!!");
        error_log("========================");
        
        // Load TAMI Hosted Gateway
        require_once RL_CLASSES . 'rlGateway.class.php';
        $reefless = $GLOBALS['reefless'];
        $reefless->loadClass('TamiHosted', null, 'tami');
        
        $GLOBALS['rlTamiHosted']->init();
        
        // Get order data from payment session
        $order_data = array(
            'total' => $rlPayment->getOption('total'),
            'currency' => $config['system_currency'],
            'order_id' => time() . '_' . mt_rand(1000, 9999),
            'customer_name' => $_SESSION['account']['First_name'] . ' ' . $_SESSION['account']['Last_name'],
            'customer_email' => $_SESSION['account']['Mail'],
            'customer_phone' => $_SESSION['account']['Phone'] ?? '05001234567'
        );
        
        error_log("TAMI call() Order data: " . print_r($order_data, true));
        
        // Create payment link and redirect directly
        $payment_url = $GLOBALS['rlTamiHosted']->createPaymentLink($order_data);
        
        if ($payment_url) {
            error_log("TAMI call() Redirecting to: " . $payment_url);
            header("Location: " . $payment_url);
            exit;
        } else {
            error_log("TAMI call() Failed to create payment URL");
            echo "TAMI ödeme bağlantısı oluşturulamadı. Lütfen tekrar deneyin.";
            exit;
        }
    }
    
    private function oldProcessMethod()
    {
        require_once RL_CLASSES . 'rlGateway.class.php';
        $reefless = $GLOBALS['reefless'];
        $reefless->loadClass('TamiGateway', null, 'tami');
        
        $GLOBALS['rlTamiGateway']->init();
        
        // Validate form data
        $required_fields = ['tami_card_number', 'tami_expiry_month', 'tami_expiry_year', 'tami_cvv', 'tami_card_holder'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                $out = ['status' => 'ERROR', 'message' => 'Missing required field: ' . $field];
                exit(json_encode($out));
            }
        }
        
        // Validate card number
        if (!$this->validateCardNumber($_POST['tami_card_number'])) {
            $out = ['status' => 'ERROR', 'message' => $lang['tami_invalid_card_number']];
            exit(json_encode($out));
        }
        
        // Process payment
        $result = $GLOBALS['rlTamiGateway']->call();
        
        if ($result) {
            $out = [
                'status' => 'OK',
                'message' => $lang['tami_payment_processing'],
                'redirect_url' => RL_URL_HOME . 'payment-complete.php'
            ];
        } else {
            $errors = $GLOBALS['rlTamiGateway']->getErrors();
            $error_message = is_array($errors) ? implode(', ', $errors) : 'Payment failed';
            
            $out = [
                'status' => 'ERROR', 
                'message' => $error_message
            ];
        }
        
        exit(json_encode($out));
    }
    
    /**
     * Query installment options
     */
    private function queryInstallments()
    {
        global $config;
        
        $card_number = $_POST['card_number'] ?? '';
        $amount = $_POST['amount'] ?? 0;
        
        if (empty($card_number) || empty($amount)) {
            $out = ['status' => 'ERROR', 'message' => 'Missing card number or amount'];
            exit(json_encode($out));
        }
        
        // Get BIN (first 6 digits)
        $bin = substr(str_replace(' ', '', $card_number), 0, 6);
        
        // Mock installment data - in real implementation, query TAMI API
        $installments = [
            ['installment' => 1, 'total' => $amount, 'commission_rate' => 0],
            ['installment' => 2, 'total' => $amount, 'commission_rate' => 0],
            ['installment' => 3, 'total' => $amount, 'commission_rate' => 0],
            ['installment' => 6, 'total' => $amount * 1.05, 'commission_rate' => 5],
            ['installment' => 9, 'total' => $amount * 1.08, 'commission_rate' => 8],
            ['installment' => 12, 'total' => $amount * 1.12, 'commission_rate' => 12],
        ];
        
        $out = [
            'status' => 'OK',
            'installments' => $installments
        ];
        
        exit(json_encode($out));
    }
    
    /**
     * Validate card number using Luhn algorithm
     */
    private function validateCardNumber($cardNumber)
    {
        $cardNumber = preg_replace('/\D/', '', $cardNumber);
        
        if (strlen($cardNumber) < 13 || strlen($cardNumber) > 19) {
            return false;
        }
        
        // Luhn algorithm
        $sum = 0;
        $alt = false;
        
        for ($i = strlen($cardNumber) - 1; $i >= 0; $i--) {
            $n = intval($cardNumber[$i]);
            
            if ($alt) {
                $n *= 2;
                if ($n > 9) {
                    $n = ($n % 10) + 1;
                }
            }
            
            $sum += $n;
            $alt = !$alt;
        }
        
        return ($sum % 10 == 0);
    }
    
    /**
     * Hook for payment gateways bottom
     *
     * @hook apTplPaymentGatewaysBottom
     */
    public function hookApTplPaymentGatewaysBottom()
    {
        global $rlSmarty, $config;
        
        if ($config['tami_test_mode']) {
            echo '<div class="notice_box">TAMI Test Mode is enabled</div>';
        }
    }
} 