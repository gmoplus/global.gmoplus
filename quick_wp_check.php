<?php
// HIZLI WORDPRESS KONTROL
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>HIZLI WORDPRESS KONTROL</h1>";

// Flynax config yükle
include_once(__DIR__ . '/includes/config.inc.php');

echo "<p style='color: green;'>✓ Config yüklendi</p>";

// WordPress Bridge ayarlarını kontrol et
echo "<h3>WordPress Bridge Ayarları:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Database'den WordPress ayarlarını oku
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

$wp_configs = "SELECT `Key`, `Default` FROM " . RL_DBPREFIX . "config WHERE `Key` LIKE 'wp_%'";
$result = $connection->query($wp_configs);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $value = $row['Default'];
        if ($row['Key'] == 'wp_path' && !empty($value)) {
            echo "<strong style='color: green;'>WordPress URL:</strong> " . htmlspecialchars($value) . "<br>";
            $wp_url = $value;
        } elseif ($row['Key'] == 'wp_post_count') {
            echo "<strong>Post Sayısı:</strong> " . htmlspecialchars($value) . "<br>";
        } elseif ($row['Key'] == 'wp_success') {
            $success_text = $value == '1' ? 'Evet (Bağlantı Kurulmuş)' : 'Hayır (Bağlantı Yok)';
            $success_color = $value == '1' ? 'green' : 'red';
            echo "<strong style='color: $success_color;'>WP Success:</strong> " . $success_text . "<br>";
        }
    }
} else {
    echo "<strong style='color: red;'>WordPress ayarları bulunamadı!</strong><br>";
}

echo "</div>";

// WordPress URL test et
if (isset($wp_url) && !empty($wp_url)) {
    echo "<h3>WordPress Sitesi Test:</h3>";
    echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $wp_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    echo "<strong>URL:</strong> " . htmlspecialchars($wp_url) . "<br>";
    echo "<strong>HTTP Kodu:</strong> " . $http_code . "<br>";
    
    if ($error) {
        echo "<strong style='color: red;'>Curl Hatası:</strong> " . htmlspecialchars($error) . "<br>";
    }
    
    if ($http_code == 200) {
        echo "<strong style='color: green;'>✓ WordPress sitesi erişilebilir</strong><br>";
        
        // Basit API test
        $api_url = rtrim($wp_url, '/') . '/wp-json/flynax-bridge/v1/recent-posts?limit=3';
        echo "<br><strong>API Test:</strong><br>";
        echo "<strong>API URL:</strong> " . htmlspecialchars($api_url) . "<br>";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $api_response = curl_exec($ch);
        $api_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        echo "<strong>API HTTP Kodu:</strong> " . $api_http_code . "<br>";
        
        if ($api_http_code == 200) {
            echo "<strong style='color: green;'>✓ API erişilebilir</strong><br>";
            
            $json_data = json_decode($api_response, true);
            if ($json_data && isset($json_data['data'])) {
                $posts_count = count($json_data['data']);
                echo "<strong style='color: green;'>✓ " . $posts_count . " blog postu bulundu!</strong><br>";
            } else {
                echo "<strong style='color: orange;'>⚠ API çalışıyor ama blog postu yok</strong><br>";
            }
        } else {
            echo "<strong style='color: red;'>❌ API erişilemiyor (FlynaxBridge plugin pasif olabilir)</strong><br>";
        }
        
    } else {
        echo "<strong style='color: red;'>❌ WordPress sitesi erişilemiyor</strong><br>";
    }
    
    echo "</div>";
} else {
    echo "<h3 style='color: red;'>WordPress URL tanımlı değil!</h3>";
    echo "<p>Admin panelden <strong>Plugins → WordPress Bridge → Settings</strong> bölümünden WordPress URL'sini tanımlayın.</p>";
}

// Cache durumu kontrol et
echo "<h3>Cache Durumu:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$cache_check = "SELECT Content FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
$cache_result = $connection->query($cache_check);

if ($cache_result->num_rows > 0) {
    $cache_row = $cache_result->fetch_assoc();
    echo "<strong style='color: green;'>✓ Blog block mevcut</strong><br>";
    
    if (strpos($cache_row['Content'], 'cachedPosts') !== false) {
        echo "<strong style='color: orange;'>⚠ Cache var - temizlenebilir</strong><br>";
    } else {
        echo "<strong style='color: green;'>✓ Cache temiz</strong><br>";
    }
} else {
    echo "<strong style='color: red;'>❌ Blog block yok</strong><br>";
}

echo "</div>";

$connection->close();

echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>SONUÇ</h2>";
echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
echo "<h3>YAPMANIZ GEREKENLER:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";

if (!isset($wp_url) || empty($wp_url)) {
    echo "<li><strong style='color: red;'>WordPress URL'sini admin panelden tanımlayın</strong></li>";
} else {
    if (isset($http_code) && $http_code == 200) {
        if (isset($api_http_code) && $api_http_code == 200) {
            echo "<li><strong style='color: green;'>Ana sayfayı yenileyin - blog postları görünecek!</strong></li>";
        } else {
            echo "<li><strong style='color: red;'>WordPress'te FlynaxBridge plugin'ini aktif edin</strong></li>";
        }
    } else {
        echo "<li><strong style='color: red;'>WordPress URL'sini kontrol edin</strong></li>";
    }
}

echo "</ol>";
echo "</div>";
?> 