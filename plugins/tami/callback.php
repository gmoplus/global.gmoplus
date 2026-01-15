<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.10.0
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: CALLBACK.PHP (TAMI 3D Secure Callback)
 *  
 ******************************************************************************/

// Include Flynax core
define('IS_AJAX', true);
require_once '../../includes/config.inc.php';
require_once RL_CLASSES . 'rlGateway.class.php';

// Load TAMI classes
$reefless->loadClass('TamiGateway', null, 'tami');
$reefless->loadClass('Tami', null, 'tami');

// Initialize
$rlTamiGateway->init();

// Handle callback
if ($_POST) {
    // Log the callback for debugging (in test mode)
    if ($config['tami_test_mode']) {
        file_put_contents(RL_PLUGINS . 'tami/callback.log', date('Y-m-d H:i:s') . " - " . print_r($_POST, true) . "\n", FILE_APPEND);
    }
    
    // Process the callback
    $result = $rlTamiGateway->callBack();
    
    if ($result) {
        // Success - redirect to success page
        $redirect_url = RL_URL_HOME . 'payment-complete.php?status=success';
    } else {
        // Error - redirect to error page
        $errors = $rlTamiGateway->getErrors();
        $error_message = is_array($errors) ? urlencode(implode(', ', $errors)) : urlencode('Payment failed');
        $redirect_url = RL_URL_HOME . 'payment-complete.php?status=error&message=' . $error_message;
    }
    
    // Redirect with JavaScript (safer for 3D callback)
    echo '<html><head><title>Redirecting...</title></head><body>';
    echo '<script type="text/javascript">';
    echo 'window.top.location.href = "' . $redirect_url . '";';
    echo '</script>';
    echo '<p>Redirecting...</p>';
    echo '</body></html>';
} else {
    // No POST data received
    echo '<html><head><title>Error</title></head><body>';
    echo '<p>Invalid callback request.</p>';
    echo '</body></html>';
}
?> 