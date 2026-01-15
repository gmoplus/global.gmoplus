<?php
// BLOG BLOCK'U YENİDEN OLUŞTUR
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>BLOG BLOCK'U YENİDEN OLUŞTURMA</h1>";

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
                    echo "<p style='color: green;'>✓ WordPress config bulundu</p>";
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
                    echo "<p style='color: green;'>✓ Flynax config bulundu</p>";
                    break;
                }
            }
        } catch (Exception $e) {
            continue;
        }
    }
}

if (!$db_found) {
    echo "<div style='color: red; border: 2px solid red; padding: 10px;'>";
    echo "<h3>VERİTABANI BİLGİLERİNİ MANUEL GİRİN:</h3>";
    $dbHost = 'localhost';
    $dbName = 'gmoplus_global'; // DEĞIŞTIRIN
    $dbUser = 'your_username';  // DEĞIŞTIRIN  
    $dbPass = 'your_password';  // DEĞIŞTIRIN
    $dbPrefix = 'rl_';
    echo "</div>";
}

// Sadece gerçek değerler varsa devam et
if ($db_found || ($dbUser !== 'your_username')) {
    try {
        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        
        if ($connection->connect_error) {
            die("<p style='color: red;'>Veritabanı bağlantısı başarısız: " . $connection->connect_error . "</p>");
        }
        
        echo "<p style='color: green;'>✓ Veritabanına bağlandı</p>";
        
        // 1. WordPress Bridge plugin'in aktif olduğunu kontrol et
        $plugin_check = "SELECT * FROM {$dbPrefix}plugins WHERE `Key` = 'wordpressBridge' AND `Status` = 'active'";
        $result = $connection->query($plugin_check);
        
        if ($result->num_rows == 0) {
            echo "<p style='color: red;'>WordPress Bridge plugin aktif değil!</p>";
            exit;
        }
        
        echo "<p style='color: green;'>✓ WordPress Bridge plugin aktif</p>";
        
        // 2. Blog block'unu yeniden oluştur - doğru içerikle
        $block_content = '<?php
$GLOBALS[\'reefless\']->loadClass(\'WordpressBridge\', null, \'wordpressBridge\');
$GLOBALS[\'rlWordpressBridge\']->cachedPosts = \'\';
$GLOBALS[\'rlWordpressBridge\']->blockWPBridgeLastPost();
?>';
        
        // Önce mevcut block'u sil
        $delete_query = "DELETE FROM {$dbPrefix}blocks WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
        $connection->query($delete_query);
        
        // Yeni block'u ekle
        $insert_query = "INSERT INTO {$dbPrefix}blocks (Plugin, `Key`, Content, `Tpl`, `Status`, `Position`, `Side`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insert_query);
        
        $plugin = 'wordpressBridge';
        $key = 'wpbridge_last_post';
        $tpl = '';
        $status = 'active';
        $position = 0;
        $side = 'middle'; // Ana sayfada middle bölümde göster
        
        $stmt->bind_param('ssssiss', $plugin, $key, $block_content, $tpl, $status, $position, $side);
        $result = $stmt->execute();
        
        if ($result) {
            echo "<p style='color: green;'>✓ Blog block'u başarıyla oluşturuldu</p>";
        } else {
            echo "<p style='color: red;'>Blog block oluşturulamadı: " . $connection->error . "</p>";
        }
        
        // 3. Block name'i çoklu dil için ekle
        $block_names = [
            'en' => 'Recent Blog Posts',
            'tr' => 'Son Blog Yazıları',
            'ar' => 'أحدث منشورات المدونة'
        ];
        
        foreach ($block_names as $lang => $name) {
            $lang_query = "INSERT INTO {$dbPrefix}lang_keys (Code, Module, Key, Value, Plugin) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Value = ?";
            $lang_stmt = $connection->prepare($lang_query);
            $module = 'blocks';
            $key_name = 'blocks+name+wpbridge_last_post';
            $plugin = 'wordpressBridge';
            
            $lang_stmt->bind_param('ssssss', $lang, $module, $key_name, $name, $plugin, $name);
            $lang_stmt->execute();
        }
        
        echo "<p style='color: green;'>✓ Block isimleri eklendi</p>";
        
        // 4. Mevcut blocks listesini göster
        $blocks_query = "SELECT `Key`, Plugin, Content, Side, Status FROM {$dbPrefix}blocks WHERE Plugin = 'wordpressBridge'";
        $blocks_result = $connection->query($blocks_query);
        
        echo "<h3>Mevcut WordPress Bridge Blokları:</h3>";
        if ($blocks_result->num_rows > 0) {
            while($row = $blocks_result->fetch_assoc()) {
                $status_color = $row['Status'] == 'active' ? 'green' : 'red';
                echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 5px;'>";
                echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . "<br>";
                echo "<strong>Plugin:</strong> " . htmlspecialchars($row['Plugin']) . "<br>";
                echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
                echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span><br>";
                echo "<strong>Content:</strong><br><code style='font-size: 12px;'>" . htmlspecialchars(substr($row['Content'], 0, 100)) . "...</code>";
                echo "</div>";
            }
        }
        
        $connection->close();
        
        echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>BAŞARILI! Blog block'u yeniden oluşturuldu.</h2>";
        echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
        echo "<h3>ŞİMDİ YAPMANIZ GEREKENLER:</h3>";
        echo "<ol>";
        echo "<li><strong>Bu dosyayı silin</strong></li>";
        echo "<li><strong>Ana sayfayı yenileyin</strong> (Ctrl+F5)</li>";
        echo "<li><strong>Admin panelde Blocks bölümünden kontrol edin</strong></li>";
        echo "<li><strong>Blog Posts bölümünün göründüğünü kontrol edin</strong></li>";
        echo "</ol>";
        echo "</div>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>HATA: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>Lütfen veritabanı bilgilerini düzeltin!</p>";
}
?> 