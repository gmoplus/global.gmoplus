<?php
/**
 * Quote Request Plugin Debug
 * Plugin'in neden çalışmadığını anlayalım
 */

include("includes/config.inc.php");

echo "=== QUOTE REQUEST PLUGIN DEBUG ===\n\n";

// 1. Plugin tablosunu kontrol et
echo "1. PLUGİN DURUMU:\n";
$plugin_query = "SELECT * FROM " . RL_DBPREFIX . "plugins WHERE `Key` = 'quoteRequest'";
$plugin_result = $rlDb->getAll($plugin_query);

if ($plugin_result) {
    foreach ($plugin_result as $plugin) {
        echo "✓ Plugin bulundu:\n";
        echo "  - Key: " . $plugin['Key'] . "\n";
        echo "  - Name: " . $plugin['Name'] . "\n";
        echo "  - Status: " . $plugin['Status'] . "\n";
        echo "  - Class: " . $plugin['Class'] . "\n";
        echo "  - Files: " . $plugin['Files'] . "\n\n";
    }
} else {
    echo "❌ Plugin veritabanında bulunamadı!\n\n";
}

// 2. Plugin dosyalarını kontrol et
echo "2. PLUGİN DOSYALARI:\n";
$plugin_dir = "plugins/quoteRequest/";
$required_files = [
    'install.xml',
    'rlQuoteRequest.class.php',
    'quote_button.tpl',
    'quote_form.tpl',
    'static/quote_request.css',
    'static/quote_request.js'
];

foreach ($required_files as $file) {
    $full_path = $plugin_dir . $file;
    if (file_exists($full_path)) {
        echo "✓ $file - MEVCUT\n";
    } else {
        echo "❌ $file - EKSİK\n";
    }
}

// 3. Hook'ları kontrol et
echo "\n3. HOOK DURUMU:\n";
$hook_query = "SELECT * FROM " . RL_DBPREFIX . "hooks WHERE `Plugin` = 'quoteRequest'";
$hook_result = $rlDb->getAll($hook_query);

if ($hook_result) {
    foreach ($hook_result as $hook) {
        echo "✓ Hook bulundu:\n";
        echo "  - Name: " . $hook['Name'] . "\n";
        echo "  - Plugin: " . $hook['Plugin'] . "\n";
        echo "  - Status: " . $hook['Status'] . "\n\n";
    }
} else {
    echo "❌ Hiç hook bulunamadı!\n\n";
}

// 4. Config ayarlarını kontrol et
echo "4. CONFIG AYARLARI:\n";
$config_query = "SELECT * FROM " . RL_DBPREFIX . "config WHERE `Key` LIKE '%quote_request%'";
$config_result = $rlDb->getAll($config_query);

if ($config_result) {
    foreach ($config_result as $config) {
        echo "✓ Config: " . $config['Key'] . " = " . $config['Default'] . "\n";
    }
} else {
    echo "❌ Quote request config bulunamadı!\n";
}

// 5. Tablo kontrolü
echo "\n5. VERİTABANI TABLOSU:\n";
$table_check = "SHOW TABLES LIKE '" . RL_DBPREFIX . "quote_requests'";
$table_result = $rlDb->getRow($table_check);

if ($table_result) {
    echo "✓ quote_requests tablosu mevcut\n";
    
    // Tablo yapısını göster
    $structure = $rlDb->getAll("DESCRIBE " . RL_DBPREFIX . "quote_requests");
    echo "Tablo yapısı:\n";
    foreach ($structure as $column) {
        echo "  - " . $column['Field'] . " (" . $column['Type'] . ")\n";
    }
} else {
    echo "❌ quote_requests tablosu mevcut değil!\n";
}

// 6. Plugin class dosyasını kontrol et
echo "\n6. CLASS DOSYASI KONTROLÜ:\n";
$class_file = "plugins/quoteRequest/rlQuoteRequest.class.php";
if (file_exists($class_file)) {
    echo "✓ Class dosyası mevcut\n";
    
    // Class'ı include etmeye çalış
    try {
        include_once($class_file);
        if (class_exists('rlQuoteRequest')) {
            echo "✓ rlQuoteRequest class'ı yüklendi\n";
        } else {
            echo "❌ rlQuoteRequest class'ı bulunamadı!\n";
        }
    } catch (Exception $e) {
        echo "❌ Class dosyası hatası: " . $e->getMessage() . "\n";
    }
} else {
    echo "❌ Class dosyası bulunamadı!\n";
}

// 7. Mevcut sayfa bilgisi
echo "\n7. SAYFA BİLGİSİ:\n";
echo "Mevcut controller: " . (isset($page_info['Controller']) ? $page_info['Controller'] : 'Bilinmiyor') . "\n";
echo "Mevcut action: " . (isset($_GET['action']) ? $_GET['action'] : 'Bilinmiyor') . "\n";

// 8. JavaScript kontrolü için HTML çıktısı
echo "\n8. FRONTEND TEST KODU:\n";
echo "Bu kodu browser'da test etmek için:\n";
echo "<script>\n";
echo "console.log('=== QUOTE REQUEST DEBUG ===');\n";
echo "console.log('jQuery loaded:', typeof jQuery !== 'undefined');\n";
echo "console.log('Quote section:', $('.quote-request-section').length);\n";
echo "console.log('Call Seller button:', $('button:contains(\"Call\"), a:contains(\"Call\")').length);\n";
echo "console.log('Plugin config enabled:', '" . (isset($config['quote_request_enabled']) ? $config['quote_request_enabled'] : 'undefined') . "');\n";
echo "</script>\n";

echo "\n=== DEBUG TAMAMLANDI ===\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 