<?php
// WORDPRESS URL AYARLAMA
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>WORDPRESS URL AYARLAMA</h1>";

// Flynax config yükle
include_once(__DIR__ . '/includes/config.inc.php');

echo "<p style='color: green;'>✓ Config yüklendi</p>";

// Database bağlantısı
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

echo "<p style='color: green;'>✓ Database bağlantısı kuruldu</p>";

// WordPress blog URL'sini belirle
$blog_url = 'https://blog.global.gmoplus.com'; // Bu sizin WordPress siteniz

echo "<h3>WordPress URL Ayarları:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Mevcut wp_path ayarını kontrol et
$check_wp_path = "SELECT * FROM " . RL_DBPREFIX . "config WHERE `Key` = 'wp_path'";
$result = $connection->query($check_wp_path);

if ($result->num_rows > 0) {
    // Mevcut kaydı güncelle
    $update_wp_path = "UPDATE " . RL_DBPREFIX . "config SET `Default` = ? WHERE `Key` = 'wp_path'";
    $stmt = $connection->prepare($update_wp_path);
    $stmt->bind_param('s', $blog_url);
    $stmt->execute();
    echo "<strong style='color: green;'>✓ WordPress URL güncellendi:</strong> " . htmlspecialchars($blog_url) . "<br>";
} else {
    // Yeni kayıt oluştur
    $insert_wp_path = "INSERT INTO " . RL_DBPREFIX . "config (`Key`, `Default`, `Plugin`) VALUES ('wp_path', ?, 'wordpressBridge')";
    $stmt = $connection->prepare($insert_wp_path);
    $stmt->bind_param('s', $blog_url);
    $stmt->execute();
    echo "<strong style='color: green;'>✓ WordPress URL eklendi:</strong> " . htmlspecialchars($blog_url) . "<br>";
}

// wp_success'i 1 yap
$update_success = "UPDATE " . RL_DBPREFIX . "config SET `Default` = '1' WHERE `Key` = 'wp_success'";
$connection->query($update_success);
echo "<strong style='color: green;'>✓ WP Success aktif edildi</strong><br>";

echo "</div>";

// WordPress sitesini test et
echo "<h3>WordPress Sitesi Test:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $blog_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "<strong>URL:</strong> " . htmlspecialchars($blog_url) . "<br>";
echo "<strong>HTTP Kodu:</strong> " . $http_code . "<br>";

if ($error) {
    echo "<strong style='color: red;'>Curl Hatası:</strong> " . htmlspecialchars($error) . "<br>";
}

if ($http_code == 200) {
    echo "<strong style='color: green;'>✓ WordPress sitesi erişilebilir</strong><br>";
    
    // FlynaxBridge API test et
    $api_url = rtrim($blog_url, '/') . '/wp-json/flynax-bridge/v1/recent-posts?limit=3';
    echo "<br><strong>API Test:</strong><br>";
    echo "<strong>API URL:</strong> " . htmlspecialchars($api_url) . "<br>";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $api_response = curl_exec($ch);
    $api_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "<strong>API HTTP Kodu:</strong> " . $api_http_code . "<br>";
    
    if ($api_http_code == 200) {
        echo "<strong style='color: green;'>✓ FlynaxBridge API çalışıyor!</strong><br>";
        
        $json_data = json_decode($api_response, true);
        if ($json_data && isset($json_data['data']) && count($json_data['data']) > 0) {
            $posts_count = count($json_data['data']);
            echo "<strong style='color: green;'>✓ " . $posts_count . " blog postu bulundu!</strong><br>";
            
            // İlk blog postunu göster
            $first_post = $json_data['data'][0];
            echo "<strong>Örnek Post:</strong> " . htmlspecialchars($first_post['title']) . "<br>";
        } else {
            echo "<strong style='color: orange;'>⚠ API çalışıyor ama blog postu yok</strong><br>";
        }
    } else {
        echo "<strong style='color: red;'>❌ FlynaxBridge API erişilemiyor</strong><br>";
        echo "<strong>Bu demek ki:</strong> WordPress'te FlynaxBridge plugin'i yüklü değil veya aktif değil<br>";
    }
    
} elseif ($http_code == 404) {
    echo "<strong style='color: red;'>❌ WordPress sitesi bulunamadı (404)</strong><br>";
    echo "<strong>Doğru URL:</strong> Belki blog.global.gmoplus.com yerine başka bir subdomain?<br>";
} else {
    echo "<strong style='color: red;'>❌ WordPress sitesi erişilemiyor</strong><br>";
}

echo "</div>";

// Cache'i temizle
echo "<h3>Cache Temizleme:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$clear_cache = "UPDATE " . RL_DBPREFIX . "blocks SET Content = REPLACE(Content, 'cachedPosts = \\'', 'cachedPosts = \\'\\''') WHERE `Key` = 'wpbridge_last_post'";
$connection->query($clear_cache);
echo "<strong style='color: green;'>✓ WordPress cache temizlendi</strong><br>";

echo "</div>";

$connection->close();

echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>SONUÇ</h2>";
echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
echo "<h3>YAPMANIZ GEREKENLER:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";

if (isset($http_code) && $http_code == 200) {
    if (isset($api_http_code) && $api_http_code == 200) {
        echo "<li><strong style='color: green;'>Ana sayfayı yenileyin (Ctrl+F5) - Blog postları görünecek!</strong></li>";
    } else {
        echo "<li><strong style='color: red;'>WordPress'te FlynaxBridge plugin'ini yükleyin/aktif edin:</strong><br>";
        echo "   - WordPress admin → Plugins → Add New<br>";
        echo "   - 'FlynaxBridge' plugin'ini arayın ve yükleyin<br>";
        echo "   - Plugin'i aktif edin</li>";
    }
} else {
    echo "<li><strong style='color: red;'>WordPress blog URL'sini kontrol edin</strong><br>";
    echo "   - blog.global.gmoplus.com doğru mu?<br>";
    echo "   - Başka bir subdomain mu kullanıyorsunuz?</li>";
}

echo "</ol>";
echo "</div>";
?> 