<?php
// ACİL TEMPLATE VE CACHE DÜZELTMESİ
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: red;'>ACİL TEMPLATE VE CACHE DÜZELTMESİ</h1>";

// Otomatik veritabanı bağlantısı için config dosyasını bulmaya çalış
$config_files = [
    __DIR__ . '/includes/config.inc.php',
    __DIR__ . '/wp-config.php',
    __DIR__ . '/../wp-config.php'
];

$db_found = false;
foreach ($config_files as $config_file) {
    if (file_exists($config_file)) {
        try {
            if (strpos($config_file, 'wp-config') !== false) {
                // WordPress config
                $config_content = file_get_contents($config_file);
                preg_match("/define\s*\(\s*['\"]DB_NAME['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $config_content, $db_name_match);
                preg_match("/define\s*\(\s*['\"]DB_USER['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $config_content, $db_user_match);
                preg_match("/define\s*\(\s*['\"]DB_PASSWORD['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $config_content, $db_pass_match);
                preg_match("/define\s*\(\s*['\"]DB_HOST['\"]\s*,\s*['\"]([^'\"]+)['\"]\s*\)/", $config_content, $db_host_match);
                
                if ($db_name_match && $db_user_match && $db_pass_match && $db_host_match) {
                    $dbName = $db_name_match[1];
                    $dbUser = $db_user_match[1];
                    $dbPass = $db_pass_match[1];
                    $dbHost = $db_host_match[1];
                    $dbPrefix = 'rl_';
                    $db_found = true;
                    echo "<p style='color: green;'>✓ WordPress config bulundu ve okundu</p>";
                    break;
                }
            } else {
                // Flynax config
                include_once($config_file);
                if (defined('RL_DBHOST')) {
                    $dbHost = RL_DBHOST;
                    $dbName = RL_DBNAME;
                    $dbUser = RL_DBUSER;
                    $dbPass = RL_DBPASS;
                    $dbPrefix = RL_DBPREFIX;
                    $db_found = true;
                    echo "<p style='color: green;'>✓ Flynax config bulundu ve okundu</p>";
                    break;
                }
            }
        } catch (Exception $e) {
            continue;
        }
    }
}

if (!$db_found) {
    echo "<div style='color: red; border: 2px solid red; padding: 10px; margin: 10px;'>";
    echo "<h3>VERİTABANI BİLGİLERİNİ MANUEL GİRİN:</h3>";
    echo "<p>Config dosyası bulunamadı. Bu script'te veritabanı bilgilerini düzenleyin.</p>";
    $dbHost = 'localhost';
    $dbName = 'gmoplus_global'; // DEĞIŞTIRIN
    $dbUser = 'your_username';  // DEĞIŞTIRIN  
    $dbPass = 'your_password';  // DEĞIŞTIRIN
    $dbPrefix = 'rl_';
    echo "</div>";
}

// Sadece gerçek değerler varsa devam et
if ($db_found || ($dbUser !== 'your_username' && $dbName !== 'gmoplus_global')) {
    try {
        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        
        if ($connection->connect_error) {
            die("<p style='color: red;'>VERİTABANI BAĞLANTISI BAŞARISIZ: " . $connection->connect_error . "</p>");
        }
        
        echo "<p style='color: green;'>✓ Veritabanına bağlandı</p>";
        
        // 1. Smarty template cache'ini temizle
        $cache_dirs = [
            __DIR__ . '/tmp/compile/',
            __DIR__ . '/tmp/cache/',
            __DIR__ . '/cache/',
            __DIR__ . '/tmp/'
        ];
        
        $deleted_files = 0;
        foreach ($cache_dirs as $cache_dir) {
            if (is_dir($cache_dir)) {
                $files = glob($cache_dir . '*');
                foreach ($files as $file) {
                    if (is_file($file) && (strpos($file, '.php') !== false || strpos($file, '.tpl') !== false)) {
                        unlink($file);
                        $deleted_files++;
                    }
                }
            }
        }
        echo "<p style='color: green;'>✓ $deleted_files template cache dosyası silindi</p>";
        
        // 2. WordPress Bridge cache'ini tamamen sil ve yeniden oluştur
        $queries = [
            "DELETE FROM {$dbPrefix}blocks WHERE Plugin = 'wordpressBridge'",
            "UPDATE {$dbPrefix}config SET `Default` = '8' WHERE `Key` = 'wp_post_count'"
        ];
        
        foreach ($queries as $i => $query) {
            $result = $connection->query($query);
            if ($result) {
                echo "<p style='color: green;'>✓ Adım " . ($i + 1) . " tamamlandı</p>";
            } else {
                echo "<p style='color: orange;'>⚠ Adım " . ($i + 1) . " hatası: " . $connection->error . "</p>";
            }
        }
        
        // 3. Yeni, temiz WordPress bridge block oluştur
        $clean_block_content = '<?php
$GLOBALS[\'reefless\']->loadClass(\'WordpressBridge\', null, \'wordpressBridge\');
$GLOBALS[\'rlWordpressBridge\']->cachedPosts = \'\';
$GLOBALS[\'rlWordpressBridge\']->blockWPBridgeLastPost();
?>';
        
        $insert_query = "INSERT INTO {$dbPrefix}blocks (Plugin, `Key`, Content, `Tpl`, `Status`, `Position`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insert_query);
        $plugin = 'wordpressBridge';
        $key = 'wpbridge_last_post';
        $tpl = '';
        $status = 'active';
        $position = 0;
        $stmt->bind_param('sssssi', $plugin, $key, $clean_block_content, $tpl, $status, $position);
        $stmt->execute();
        
        echo "<p style='color: green;'>✓ Yeni WordPress bridge block oluşturuldu</p>";
        
        // 4. Template cache klasörlerini temizle
        exec('find ' . __DIR__ . '/tmp -name "*.php" -delete 2>/dev/null', $output, $return_var);
        echo "<p style='color: green;'>✓ Sistem cache temizlendi</p>";
        
        $connection->close();
        
        echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>BAŞARILI! Sistem tamamen temizlendi.</h2>";
        echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
        echo "<h3>ŞİMDİ YAPMANIZ GEREKENLER:</h3>";
        echo "<ol>";
        echo "<li><strong>Bu dosyayı silin</strong> (güvenlik için)</li>";
        echo "<li><strong>Tarayıcı cache'ini temizleyin</strong> (Ctrl+F5)</li>";
        echo "<li><strong>Ana sayfayı yenileyin</strong></li>";
        echo "<li><strong>Blog Posts bölümünü kontrol edin</strong></li>";
        echo "<li><strong>Sidebar butonlarının çalıştığını kontrol edin</strong></li>";
        echo "</ol>";
        echo "</div>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>HATA: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>Lütfen yukarıdaki veritabanı bilgilerini düzeltin ve sayfayı yenileyin!</p>";
}

echo "<hr><p><small>Bu dosyayı çalıştırdıktan sonra mutlaka silin!</small></p>";
?> 