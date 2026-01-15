<?php
/******************************************************************************
 * Quote Requests Admin Hook
 ******************************************************************************/

// Admin panel menü ekle
if (isset($GLOBALS["rlAdmin"]) && $_GET["controller"] == "quote_requests") {
    // Redirect to view_quotes.php
    $redirect_url = RL_URL_HOME . "view_quotes.php";
    header("Location: " . $redirect_url);
    exit;
}
?>