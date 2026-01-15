<?php
require_once 'includes/config.inc.php';
echo "<h2>Database Debug</h2>";

// Accounts table structure
echo "<h3>Accounts Table:</h3>";
$accounts = $rlDb->getAll("SHOW COLUMNS FROM `{db_prefix}accounts`");
foreach ($accounts as $col) {
    echo $col['Field'] . " - " . $col['Type'] . "<br>";
}

// Admin menu check
echo "<h3>Admin Menu Check:</h3>";
$admin_menu_exists = $rlDb->getAll("SHOW TABLES LIKE '{db_prefix}admin_menu'");
if ($admin_menu_exists) {
    echo "Admin menu table EXISTS<br>";
} else {
    echo "Admin menu table DOES NOT EXIST<br>";
}

// Sample account
echo "<h3>Sample Account:</h3>";
$sample = $rlDb->getAll("SELECT * FROM `{db_prefix}accounts` LIMIT 1");
if ($sample) {
    print_r($sample[0]);
}
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 