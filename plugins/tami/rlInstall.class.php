<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.10.0
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: RLINSTALL.CLASS.PHP (TAMI Plugin)
 *  
 ******************************************************************************/

class rlInstall
{
    /**
     * Install TAMI plugin
     */
    public function install()
    {
        global $rlDb, $config, $lang;
        
        // Add Parallel field to payment_gateways if not exists
        if (!$rlDb->columnExists('Parallel', 'payment_gateways')) {
            $rlDb->addColumnToTable('Parallel', "ENUM('0','1') NOT NULL DEFAULT '0'", 'payment_gateways');
        }
        
        // Insert TAMI gateway to payment_gateways table
        $gateway_info = [
            'Key' => 'tami',
            'Name' => 'TAMI Sanal POS',
            'Des_page' => 'TAMI (T. Garanti Bankası A.Ş.) Sanal POS ödeme sistemi',
            'Service_file' => 'tami',
            'Logo' => 'tami.png',
            'Status' => 'active',
            'Plugin' => 'tami',
            'Supports_subscription' => '0',
            'Form_type' => 'integrated',
            'Parallel' => '0'
        ];
        
        if ($rlDb->insertOne($gateway_info, 'payment_gateways')) {
            // Add language keys
            $lang_keys = [
                'tr' => [
                    'payment_gateways+name+tami' => 'TAMI Sanal POS',
                    'tami_payment' => 'TAMI Sanal POS',
                    'tami_module' => 'TAMI Sanal POS Modülü',
                    'tami_merchant_id' => 'Merchant ID',
                    'tami_merchant_key' => 'Merchant Key',
                    'tami_user_code' => 'User Code',
                    'tami_test_mode' => 'Test Modu',
                    'tami_card_number' => 'Kart Numarası',
                    'tami_card_name' => 'Kart Sahibi',
                    'tami_expiry_month' => 'Son Kullanım Ayı',
                    'tami_expiry_year' => 'Son Kullanım Yılı',
                    'tami_cvv' => 'CVV',
                    'tami_installments' => 'Taksit Sayısı',
                    'tami_single_payment' => 'Tek Çekim',
                    'tami_submit' => 'Ödeme Yap',
                    'tami_success' => 'Ödeme başarıyla tamamlandı',
                    'tami_error' => 'Ödeme işlemi başarısız',
                    'tami_3d_redirect' => '3D Secure doğrulaması için yönlendiriliyorsunuz...',
                    'tami_invalid_card_number' => 'Geçersiz kart numarası',
                    'tami_payment_processing' => 'Ödeme işleminiz gerçekleştiriliyor...',
                    'tami_not_configured' => 'TAMI ayarları yapılmamış'
                ],
                'en' => [
                    'payment_gateways+name+tami' => 'TAMI Virtual POS',
                    'tami_payment' => 'TAMI Virtual POS',
                    'tami_module' => 'TAMI Virtual POS Module',
                    'tami_merchant_id' => 'Merchant ID',
                    'tami_merchant_key' => 'Merchant Key',
                    'tami_user_code' => 'User Code',
                    'tami_test_mode' => 'Test Mode',
                    'tami_card_number' => 'Card Number',
                    'tami_card_name' => 'Card Holder',
                    'tami_expiry_month' => 'Expiry Month',
                    'tami_expiry_year' => 'Expiry Year',
                    'tami_cvv' => 'CVV',
                    'tami_installments' => 'Installments',
                    'tami_single_payment' => 'Single Payment',
                    'tami_submit' => 'Pay Now',
                    'tami_success' => 'Payment completed successfully',
                    'tami_error' => 'Payment failed',
                    'tami_3d_redirect' => 'Redirecting to 3D Secure verification...',
                    'tami_invalid_card_number' => 'Invalid card number',
                    'tami_payment_processing' => 'Processing your payment...',
                    'tami_not_configured' => 'TAMI is not configured'
                ]
            ];
            
            foreach ($lang_keys as $code => $keys) {
                foreach ($keys as $key => $value) {
                    // Check if language key already exists
                    if (!$rlDb->getOne('ID', "`Key` = '{$key}' AND `Code` = '{$code}'", 'lang_keys')) {
                        $lang_data = [
                            'Code' => $code,
                            'Module' => 'common',
                            'Key' => $key,
                            'Value' => $value,
                            'Status' => 'active',
                            'Plugin' => 'tami'
                        ];
                        
                        $rlDb->insertOne($lang_data, 'lang_keys');
                    }
                }
            }
            
            // Add TAMI to payment_gateways table
            $gateway_data = [
                'Key' => 'tami',
                'name' => 'TAMI Sanal POS',
                'Controller' => 'payment',
                'Type' => 'online',
                'Plugin' => 'tami',
                'Status' => 'active',
                'Form_type' => 'psi', // standard form type
                'Default' => 0,
                'Payment_due' => 'realtime',
                'Position' => 10
            ];
            
            // Check if already exists
            if (!$rlDb->getOne('ID', "`Key` = 'tami'", 'payment_gateways')) {
                $rlDb->insertOne($gateway_data, 'payment_gateways');
            }
            
            // Add hooks
            $hooks = [
                [
                    'Class' => 'Tami',
                    'Name' => 'phpGetPaymentGateways',
                    'Version' => '1.0.0',
                    'Plugin' => 'tami',
                    'Status' => 'active'
                ],
                [
                    'Class' => 'Tami',
                    'Name' => 'loadPaymentForm',
                    'Version' => '1.0.0',
                    'Plugin' => 'tami',
                    'Status' => 'active'
                ],
                [
                    'Class' => 'Tami',
                    'Name' => 'ajaxRequest',
                    'Version' => '1.0.0',
                    'Plugin' => 'tami',
                    'Status' => 'active'
                ],
                [
                    'Class' => 'Tami',
                    'Name' => 'apTplPaymentGatewaysBottom',
                    'Version' => '1.0.0',
                    'Plugin' => 'tami',
                    'Status' => 'active'
                ]
            ];
            
            foreach ($hooks as $hook) {
                // Check if hook already exists
                if (!$rlDb->getOne('ID', "`Class` = '{$hook['Class']}' AND `Name` = '{$hook['Name']}' AND `Plugin` = '{$hook['Plugin']}'", 'hooks')) {
                    $rlDb->insertOne($hook, 'hooks');
                }
            }
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Uninstall TAMI plugin
     */
    public function uninstall()
    {
        global $rlDb;
        
        // Delete from payment_gateways table
        $rlDb->delete(['Key' => 'tami'], 'payment_gateways');
        
        // Delete language keys
        $rlDb->delete(['Plugin' => 'tami'], 'lang_keys');
        
        // Delete hooks
        $rlDb->delete(['Plugin' => 'tami'], 'hooks');
        
        // Delete config entries
        $tami_configs = [
            'tami_merchant_id',
            'tami_merchant_key', 
            'tami_user_code',
            'tami_test_mode',
            'tami_3d_secure',
            'tami_only_turkey'
        ];
        
        foreach ($tami_configs as $config_key) {
            $rlDb->delete(['Key' => $config_key], 'config');
        }
        
        return true;
    }
    
    /**
     * Update plugin (if needed for future versions)
     */
    public function update()
    {
        // Future update logic here
        return true;
    }
} 