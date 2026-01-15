<?php

/******************************************************************************
 *  TAMI Fail Callback Handler
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

// Always redirect to error page
$error_message = isset($result['error_message']) ? $result['error_message'] : 'Ödeme işlemi başarısız oldu';
$redirect_url = RL_URL_HOME . 'payment_complete.php?status=error&message=' . urlencode($error_message);

header('Location: ' . $redirect_url);
exit; 