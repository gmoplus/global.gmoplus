<?php
// Fix Admin Menu for Quote Requests
require_once 'includes/config.inc.php';

echo "<h2>🔧 Fix Admin Menu System</h2>\n";

try {
    // Check if admin_menu table exists
    $table_exists = $rlDb->getAll("SHOW TABLES LIKE '{db_prefix}admin_menu'");
    
    if (!$table_exists) {
        echo "<h3>❌ Admin menu table does not exist. Creating...</h3>\n";
        
        // Create admin_menu table
        $create_table_sql = "
        CREATE TABLE `{db_prefix}admin_menu` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `Key` varchar(50) NOT NULL,
            `Position` int(11) NOT NULL DEFAULT '0',
            `Status` enum('active','approval') NOT NULL DEFAULT 'active',
            `Module` varchar(50) NOT NULL DEFAULT 'general',
            PRIMARY KEY (`ID`),
            UNIQUE KEY `Key` (`Key`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ";
        
        $rlDb->query($create_table_sql);
        echo "✅ Admin menu table created<br>\n";
    } else {
        echo "✅ Admin menu table already exists<br>\n";
    }
    
    // Insert or update quote_requests menu item
    $existing_menu = $rlDb->getRow("SELECT * FROM `{db_prefix}admin_menu` WHERE `Key` = 'quote_requests'");
    
    if ($existing_menu) {
        echo "🔄 Updating existing menu item...<br>\n";
        $rlDb->query("UPDATE `{db_prefix}admin_menu` SET `Status` = 'active', `Position` = 85 WHERE `Key` = 'quote_requests'");
    } else {
        echo "➕ Creating new menu item...<br>\n";
        $menu_data = array(
            'Key' => 'quote_requests',
            'Position' => 85,
            'Status' => 'active',
            'Module' => 'general'
        );
        $rlDb->insertOne($menu_data, 'admin_menu');
    }
    
    echo "<h3>🌐 Adding Language Keys...</h3>\n";
    
    // Language keys
    $lang_keys = array(
        array('Key' => 'admin_menu+name+quote_requests', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri'),
        array('Key' => 'admin_menu+name+quote_requests', 'Code' => 'english', 'Value' => 'Quote Requests'),
        array('Key' => 'quote_requests', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri'),
        array('Key' => 'quote_requests', 'Code' => 'english', 'Value' => 'Quote Requests'),
        array('Key' => 'quote_requests_management', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri Yonetimi'),
        array('Key' => 'quote_requests_management', 'Code' => 'english', 'Value' => 'Quote Requests Management'),
        array('Key' => 'quote_status_updated', 'Code' => 'turkish', 'Value' => 'Durum guncellendi'),
        array('Key' => 'quote_status_updated', 'Code' => 'english', 'Value' => 'Status updated'),
        array('Key' => 'quote_deleted', 'Code' => 'turkish', 'Value' => 'Teklif silindi'),
        array('Key' => 'quote_deleted', 'Code' => 'english', 'Value' => 'Quote deleted')
    );
    
    foreach ($lang_keys as $lang_key) {
        $exists = $rlDb->getRow("SELECT * FROM `{db_prefix}lang_keys` WHERE `Key` = '{$lang_key['Key']}' AND `Code` = '{$lang_key['Code']}'");
        
        if ($exists) {
            $rlDb->query("UPDATE `{db_prefix}lang_keys` SET `Value` = '{$lang_key['Value']}' WHERE `Key` = '{$lang_key['Key']}' AND `Code` = '{$lang_key['Code']}'");
            echo "🔄 Updated: {$lang_key['Key']} ({$lang_key['Code']})<br>\n";
        } else {
            $insert_data = array(
                'Key' => $lang_key['Key'],
                'Code' => $lang_key['Code'],
                'Value' => $lang_key['Value'],
                'Module' => 'general'
            );
            $rlDb->insertOne($insert_data, 'lang_keys');
            echo "✅ Added: {$lang_key['Key']} ({$lang_key['Code']})<br>\n";
        }
    }
    
    // Clear cache
    $rlDb->query("DELETE FROM `{db_prefix}cache` WHERE `Key` LIKE '%admin_menu%' OR `Key` LIKE '%lang%'");
    echo "🧹 Cache cleared<br>\n";
    
    echo "<h3>✅ Admin Menu Fixed!</h3>\n";
    echo "<p>Artık admin panelde 'Teklif Talepleri' menüsü görünmelidir.</p>\n";
    echo "<p><a href='{$rlBase}admin/index.php?controller=quote_requests' target='_blank'>🔗 Test Admin Panel</a></p>\n";
    
} catch (Exception $e) {
    echo "<h3>❌ Error:</h3>\n";
    echo "<p>" . $e->getMessage() . "</p>\n";
}

echo "<p><a href='javascript:history.back()'>← Geri Dön</a></p>\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 