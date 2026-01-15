<?php
// Admin Menu Setup for Quote Requests
require_once 'includes/config.inc.php';

echo "<h2>🔧 Admin Menu Setup for Quote Requests</h2>\n";

try {
    // Database connection check
    if (!$rlDb) {
        die("Database connection failed!");
    }
    
    echo "<h3>📊 Checking current admin menu...</h3>\n";
    
    // Check if menu item already exists
    $existing = $rlDb->getRow("SELECT * FROM `{db_prefix}admin_menu` WHERE `Key` = 'quote_requests'");
    
    if ($existing) {
        echo "✅ Menu item already exists: " . print_r($existing, true) . "<br>\n";
        
        // Update if needed
        $rlDb->query("UPDATE `{db_prefix}admin_menu` SET `Status` = 'active', `Position` = 85 WHERE `Key` = 'quote_requests'");
        echo "✅ Menu item updated<br>\n";
    } else {
        echo "❌ Menu item not found, creating...<br>\n";
        
        // Insert new menu item
        $menu_data = array(
            'Key' => 'quote_requests',
            'Position' => 85,
            'Status' => 'active',
            'Module' => 'general'
        );
        
        $result = $rlDb->insertOne($menu_data, 'admin_menu');
        
        if ($result) {
            echo "✅ Menu item created successfully<br>\n";
        } else {
            echo "❌ Failed to create menu item<br>\n";
        }
    }
    
    echo "<h3>🌐 Setting up language keys...</h3>\n";
    
    // Language keys to add
    $lang_keys = array(
        array('Key' => 'admin_menu+name+quote_requests', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri', 'Module' => 'general'),
        array('Key' => 'admin_menu+name+quote_requests', 'Code' => 'english', 'Value' => 'Quote Requests', 'Module' => 'general'),
        array('Key' => 'admin_menu+title+quote_requests', 'Code' => 'turkish', 'Value' => 'Musteri teklif taleplerini yonetin', 'Module' => 'general'),
        array('Key' => 'admin_menu+title+quote_requests', 'Code' => 'english', 'Value' => 'Manage customer quote requests', 'Module' => 'general'),
        array('Key' => 'quote_requests', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri', 'Module' => 'general'),
        array('Key' => 'quote_requests', 'Code' => 'english', 'Value' => 'Quote Requests', 'Module' => 'general'),
        array('Key' => 'quote_requests_management', 'Code' => 'turkish', 'Value' => 'Teklif Talepleri Yonetimi', 'Module' => 'general'),
        array('Key' => 'quote_requests_management', 'Code' => 'english', 'Value' => 'Quote Requests Management', 'Module' => 'general'),
        array('Key' => 'quote_status_updated', 'Code' => 'turkish', 'Value' => 'Teklif durumu guncellendi', 'Module' => 'general'),
        array('Key' => 'quote_status_updated', 'Code' => 'english', 'Value' => 'Quote status updated', 'Module' => 'general'),
        array('Key' => 'quote_invalid_data', 'Code' => 'turkish', 'Value' => 'Gecersiz veri', 'Module' => 'general'),
        array('Key' => 'quote_invalid_data', 'Code' => 'english', 'Value' => 'Invalid data', 'Module' => 'general'),
        array('Key' => 'quote_deleted', 'Code' => 'turkish', 'Value' => 'Teklif silindi', 'Module' => 'general'),
        array('Key' => 'quote_deleted', 'Code' => 'english', 'Value' => 'Quote deleted', 'Module' => 'general')
    );
    
    foreach ($lang_keys as $lang_key) {
        // Check if exists
        $exists = $rlDb->getRow("SELECT * FROM `{db_prefix}lang_keys` WHERE `Key` = '{$lang_key['Key']}' AND `Code` = '{$lang_key['Code']}'");
        
        if ($exists) {
            // Update existing
            $rlDb->query("UPDATE `{db_prefix}lang_keys` SET `Value` = '{$lang_key['Value']}' WHERE `Key` = '{$lang_key['Key']}' AND `Code` = '{$lang_key['Code']}'");
            echo "🔄 Updated: {$lang_key['Key']} ({$lang_key['Code']})<br>\n";
        } else {
            // Insert new
            $result = $rlDb->insertOne($lang_key, 'lang_keys');
            if ($result) {
                echo "✅ Added: {$lang_key['Key']} ({$lang_key['Code']})<br>\n";
            } else {
                echo "❌ Failed: {$lang_key['Key']} ({$lang_key['Code']})<br>\n";
            }
        }
    }
    
    echo "<h3>🧹 Clearing cache...</h3>\n";
    
    // Clear admin menu cache if exists
    $rlDb->query("DELETE FROM `{db_prefix}cache` WHERE `Key` LIKE '%admin_menu%' OR `Key` LIKE '%lang%'");
    echo "✅ Cache cleared<br>\n";
    
    echo "<h3>✅ Setup Completed!</h3>\n";
    echo "<p>Admin menüde 'Teklif Talepleri' sekmesi görünmelidir.</p>\n";
    echo "<p>URL: <a href='{$rlBase}admin/index.php?controller=quote_requests' target='_blank'>{$rlBase}admin/index.php?controller=quote_requests</a></p>\n";
    
} catch (Exception $e) {
    echo "<h3>❌ Error:</h3>\n";
    echo "<p>" . $e->getMessage() . "</p>\n";
}

echo "<p><a href='javascript:history.back()'>← Geri Dön</a></p>\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 