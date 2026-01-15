<?php

require_once 'includes/config.inc.php';
require_once RL_INC . 'control.inc.php';

// Check user login
$reefless->loadClass('Account');
if ($rlAccount->isLogin()) {
    $account_info = $_SESSION['account'];
    define('IS_LOGIN', true);
    echo "<h2>User Info</h2>";
    echo "<pre>";
    print_r($account_info);
    echo "</pre>";
} else {
    echo "<h2>User not logged in</h2>";
}

// Check my_quotes page
$page_sql = "SELECT * FROM `{db_prefix}pages` WHERE `Key` = 'my_quotes'";
$page_data = $rlDb->getRow($page_sql);

echo "<h2>my_quotes Page Data</h2>";
echo "<pre>";
print_r($page_data);
echo "</pre>";

if ($page_data) {
    echo "<h2>Access Check</h2>";
    echo "<p>Page Login Required: " . $page_data['Login'] . "</p>";
    echo "<p>Page Deny: " . $page_data['Deny'] . "</p>";
    echo "<p>Page Status: " . $page_data['Status'] . "</p>";
    
    if (isset($account_info)) {
        echo "<p>User Type ID: " . $account_info['Type_ID'] . "</p>";
        
        if ($page_data['Deny']) {
            $deny_types = explode(',', $page_data['Deny']);
            $is_denied = in_array($account_info['Type_ID'], $deny_types);
            echo "<p>User is denied: " . ($is_denied ? 'YES' : 'NO') . "</p>";
        }
        
        if (isset($account_info['Abilities'][$page_data['Key']])) {
            echo "<p>User ability for this page: " . ($account_info['Abilities'][$page_data['Key']] ? 'TRUE' : 'FALSE') . "</p>";
        } else {
            echo "<p>No specific ability setting for this page</p>";
        }
    }
}

// Check controller file
$controller_file = RL_CONTROL . 'my_quotes.inc.php';
echo "<h2>Controller File</h2>";
echo "<p>Path: " . $controller_file . "</p>";
echo "<p>Exists: " . (file_exists($controller_file) ? 'YES' : 'NO') . "</p>";
echo "<p>Readable: " . (is_readable($controller_file) ? 'YES' : 'NO') . "</p>";

?> 