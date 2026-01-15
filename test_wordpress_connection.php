<?php
// WORDPRESS BAĞLANTI TESTİ
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>WORDPRESS BAĞLANTI TESTİ</h1>";

// Flynax config yükle
$config_files = [
    __DIR__ . '/includes/config.inc.php',
];

foreach ($config_files as $config_file) {
    if (file_exists($config_file)) {
        include_once($config_file);
        break;
    }
}

echo "<p style='color: green;'>✓ Flynax config yüklendi</p>";

try {
    // WordPress Bridge class'ını yükle
    require_once(RL_PLUGINS . 'wordpressBridge/rlWordpressBridge.class.php');
    require_once(RL_PLUGINS . 'wordpressBridge/src/WordPressAPI/API.php');
    
    echo "<p style='color: green;'>✓ WordPress Bridge class'ları yüklendi</p>";
    
    // API class'ını başlat
    $wordPressApi = new \Flynax\Plugin\WordPressBridge\WordPressAPI\API();
    
    echo "<p style='color: green;'>✓ WordPress API class'ı başlatıldı</p>";
    
    // WordPress ayarlarını kontrol et
    echo "<h3>WordPress Ayarları:</h3>";
    echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
    
    if (isset($GLOBALS['config']['wp_path'])) {
        echo "<strong>WordPress URL:</strong> " . htmlspecialchars($GLOBALS['config']['wp_path']) . "<br>";
    } else {
        echo "<strong style='color: red;'>WordPress URL tanımlı değil!</strong><br>";
    }
    
    if (isset($GLOBALS['config']['wp_post_count'])) {
        echo "<strong>Post Sayısı:</strong> " . htmlspecialchars($GLOBALS['config']['wp_post_count']) . "<br>";
    }
    
    if (isset($GLOBALS['config']['wp_success'])) {
        echo "<strong>WP Success:</strong> " . ($GLOBALS['config']['wp_success'] ? 'Evet' : 'Hayır') . "<br>";
    }
    
    echo "</div>";
    
    // Blog postlarını çekmeyi dene
    echo "<h3>Blog Post Çekme Testi:</h3>";
    
    $posts = $wordPressApi->getRecentPosts(8);
    
    if (empty($posts)) {
        echo "<p style='color: red;'>❌ Blog postları çekilemedi!</p>";
        
        echo "<h4>Muhtemel Nedenler:</h4>";
        echo "<ul>";
        echo "<li>WordPress URL yanlış veya erişilemiyor</li>";
        echo "<li>WordPress'te FlynaxBridge plugin'i aktif değil</li>";
        echo "<li>API token'ları yanlış</li>";
        echo "<li>WordPress sitesi çalışmıyor</li>";
        echo "</ul>";
        
        // WordPress URL'ye erişmeyi test et
        if (isset($GLOBALS['config']['wp_path']) && !empty($GLOBALS['config']['wp_path'])) {
            $wp_url = $GLOBALS['config']['wp_path'];
            echo "<h4>WordPress URL Testi:</h4>";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $wp_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<strong>URL:</strong> " . htmlspecialchars($wp_url) . "<br>";
            echo "<strong>HTTP Kodu:</strong> " . $http_code . "<br>";
            
            if ($error) {
                echo "<strong style='color: red;'>Hata:</strong> " . htmlspecialchars($error) . "<br>";
            }
            
            if ($http_code == 200) {
                echo "<strong style='color: green;'>✓ WordPress sitesine erişim başarılı</strong><br>";
            } else {
                echo "<strong style='color: red;'>❌ WordPress sitesine erişim başarısız</strong><br>";
            }
            echo "</div>";
            
            // API endpoint'ini test et
            $api_url = rtrim($wp_url, '/') . '/wp-json/flynax-bridge/v1/recent-posts?limit=8';
            echo "<h4>API Endpoint Testi:</h4>";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $api_response = curl_exec($ch);
            $api_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $api_error = curl_error($ch);
            curl_close($ch);
            
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<strong>API URL:</strong> " . htmlspecialchars($api_url) . "<br>";
            echo "<strong>HTTP Kodu:</strong> " . $api_http_code . "<br>";
            
            if ($api_error) {
                echo "<strong style='color: red;'>Hata:</strong> " . htmlspecialchars($api_error) . "<br>";
            }
            
            if ($api_http_code == 200) {
                echo "<strong style='color: green;'>✓ API endpoint'e erişim başarılı</strong><br>";
                echo "<strong>Response:</strong><br>";
                echo "<code style='font-size: 12px;'>" . htmlspecialchars(substr($api_response, 0, 500)) . "...</code><br>";
            } else {
                echo "<strong style='color: red;'>❌ API endpoint'e erişim başarısız</strong><br>";
                if ($api_response) {
                    echo "<strong>Response:</strong><br>";
                    echo "<code style='font-size: 12px;'>" . htmlspecialchars(substr($api_response, 0, 500)) . "...</code><br>";
                }
            }
            echo "</div>";
        }
        
    } else {
        echo "<p style='color: green;'>✓ " . count($posts) . " adet blog postu çekildi!</p>";
        
        echo "<h4>Çekilen Blog Postları:</h4>";
        foreach ($posts as $i => $post) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 5px;'>";
            echo "<strong>" . ($i + 1) . ". " . htmlspecialchars($post['title']) . "</strong><br>";
            echo "<strong>URL:</strong> " . htmlspecialchars($post['url']) . "<br>";
            echo "<strong>Tarih:</strong> " . htmlspecialchars($post['post_date']) . "<br>";
            echo "<strong>Özet:</strong> " . htmlspecialchars(substr($post['excerpt'], 0, 100)) . "...<br>";
            if (!empty($post['img'])) {
                echo "<strong>Resim:</strong> <img src='" . htmlspecialchars($post['img']) . "' style='max-width: 100px; max-height: 60px;'><br>";
            }
            echo "</div>";
        }
    }
    
    echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>TEST TAMAMLANDI</h2>";
    echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
    echo "<h3>SONRAKİ ADIMLAR:</h3>";
    echo "<ol>";
    echo "<li><strong>Bu dosyayı silin</strong></li>";
    if (empty($posts)) {
        echo "<li><strong>WordPress URL'yi kontrol edin</strong></li>";
        echo "<li><strong>WordPress'te FlynaxBridge plugin'ini aktif edin</strong></li>";
        echo "<li><strong>API token'larını yeniden oluşturun</strong></li>";
    } else {
        echo "<li><strong>Ana sayfayı yenileyin - blog postları görünecek</strong></li>";
    }
    echo "</ol>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>HATA: " . $e->getMessage() . "</p>";
    echo "<p>Stack trace:</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
?> 