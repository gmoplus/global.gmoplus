<?php

/******************************************************************************
 *  TAMI Success Callback Handler
 ******************************************************************************/

// Include Flynax core
define('IS_AJAX', true);
require_once '../../includes/config.inc.php';
require_once RL_CLASSES . 'rlGateway.class.php';

// Load TAMI classes
$reefless->loadClass('TamiHosted', null, 'tami');

// Initialize gateway
$tamiGateway = new rlTamiHosted();
$tamiGateway->init();

// Process callback
$result = $tamiGateway->callBack();

if ($result['success']) {
    // Update order status
    $order_id = $result['order_id'];
    $transaction_id = $result['transaction_id'];
    
    // Redirect to success page
    $redirect_url = RL_URL_HOME . 'payment_complete.php?status=success&order=' . $order_id;
    header('Location: ' . $redirect_url);
    exit;
} else {
    // Redirect to error page
    $redirect_url = RL_URL_HOME . 'payment_complete.php?status=error&message=' . urlencode($result['error']);
    header('Location: ' . $redirect_url);
    exit;
} 