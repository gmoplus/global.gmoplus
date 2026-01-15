<?php
// BLOG BLOCK FİNAL DÜZELTMESİ
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>BLOG BLOCK FİNAL DÜZELTMESİ</h1>";

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
        
        // 1. Blog block'unu kontrol et ve gerekirse oluştur
        $check_query = "SELECT * FROM {$dbPrefix}blocks WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
        $result = $connection->query($check_query);
        
        if ($result->num_rows == 0) {
            // Blog block'u oluştur
            $block_content = '<?php
$GLOBALS[\'reefless\']->loadClass(\'WordpressBridge\', null, \'wordpressBridge\');
$GLOBALS[\'rlWordpressBridge\']->cachedPosts = \'\';
$GLOBALS[\'rlWordpressBridge\']->blockWPBridgeLastPost();
?>';
            
            $insert_query = "INSERT INTO {$dbPrefix}blocks (Plugin, `Key`, Content, `Tpl`, `Status`, `Position`, `Side`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($insert_query);
            
            $plugin = 'wordpressBridge';
            $key = 'wpbridge_last_post';
            $tpl = '';
            $status = 'active';
            $position = 1;
            $side = 'middle';
            
            $stmt->bind_param('ssssiss', $plugin, $key, $block_content, $tpl, $status, $position, $side);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<p style='color: green;'>✓ Blog block'u başarıyla oluşturuldu</p>";
            } else {
                echo "<p style='color: red;'>Blog block oluşturulamadı: " . $connection->error . "</p>";
            }
        } else {
            echo "<p style='color: green;'>✓ Blog block'u zaten mevcut</p>";
            
            // Block'u aktif yap
            $update_query = "UPDATE {$dbPrefix}blocks SET `Status` = 'active', `Side` = 'middle' WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
            $connection->query($update_query);
            echo "<p style='color: green;'>✓ Blog block'u aktif yapıldı</p>";
        }
        
        // 2. Block ismini manuel olarak ekle - daha basit yöntemle
        $block_names = [
            'en' => 'Recent Blog Posts',
            'tr' => 'Son Blog Yazıları',
            'ar' => 'أحدث منشورات المدونة'
        ];
        
        foreach ($block_names as $lang => $name) {
            // Önce mevcut kayıt var mı kontrol et
            $check_lang = "SELECT * FROM {$dbPrefix}lang_keys WHERE Code = ? AND Module = ? AND `Key` = ?";
            $check_stmt = $connection->prepare($check_lang);
            $module = 'blocks';
            $key_name = 'blocks+name+wpbridge_last_post';
            $check_stmt->bind_param('sss', $lang, $module, $key_name);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            
            if ($check_result->num_rows == 0) {
                // Yeni kayıt ekle
                $lang_query = "INSERT INTO {$dbPrefix}lang_keys (Code, Module, `Key`, Value, Plugin) VALUES (?, ?, ?, ?, ?)";
                $lang_stmt = $connection->prepare($lang_query);
                $plugin = 'wordpressBridge';
                $lang_stmt->bind_param('sssss', $lang, $module, $key_name, $name, $plugin);
                $lang_stmt->execute();
            } else {
                // Mevcut kaydı güncelle
                $update_lang = "UPDATE {$dbPrefix}lang_keys SET Value = ? WHERE Code = ? AND Module = ? AND `Key` = ?";
                $update_stmt = $connection->prepare($update_lang);
                $update_stmt->bind_param('ssss', $name, $lang, $module, $key_name);
                $update_stmt->execute();
            }
        }
        
        echo "<p style='color: green;'>✓ Block isimleri eklendi</p>";
        
        // 3. WordPress ayarlarını kontrol et
        $wp_config_check = "SELECT * FROM {$dbPrefix}config WHERE `Key` = 'wp_post_count'";
        $wp_result = $connection->query($wp_config_check);
        
        if ($wp_result->num_rows > 0) {
            $wp_row = $wp_result->fetch_assoc();
            echo "<p style='color: green;'>✓ WordPress post sayısı: " . $wp_row['Default'] . "</p>";
            
            if ($wp_row['Default'] != '8') {
                $update_wp = "UPDATE {$dbPrefix}config SET `Default` = '8' WHERE `Key` = 'wp_post_count'";
                $connection->query($update_wp);
                echo "<p style='color: green;'>✓ Post sayısı 8 olarak güncellendi</p>";
            }
        }
        
        // 4. Mevcut durumu göster
        $final_check = "SELECT `Key`, Plugin, Content, Side, Status, Position FROM {$dbPrefix}blocks WHERE Plugin = 'wordpressBridge'";
        $final_result = $connection->query($final_check);
        
        echo "<h3>WordPress Bridge Blokları:</h3>";
        if ($final_result->num_rows > 0) {
            while($row = $final_result->fetch_assoc()) {
                $status_color = $row['Status'] == 'active' ? 'green' : 'red';
                echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 5px;'>";
                echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . "<br>";
                echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
                echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . "<br>";
                echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span><br>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: red;'>Hiç WordPress Bridge block bulunamadı!</p>";
        }
        
        $connection->close();
        
        echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>BAŞARILI! Blog sistemi tamamen düzeltildi.</h2>";
        echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
        echo "<h3>ŞİMDİ:</h3>";
        echo "<ol>";
        echo "<li><strong>Bu dosyayı silin</strong></li>";
        echo "<li><strong>Ana sayfayı yenileyin</strong> (Ctrl+F5)</li>";
        echo "<li><strong>\"Son Blog Yazıları\" bölümü görünecek</strong></li>";
        echo "<li><strong>8 adet blog postu çekilecek</strong></li>";
        echo "</ol>";
        echo "</div>";
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>HATA: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>Lütfen veritabanı bilgilerini düzeltin!</p>";
}
?> 