<?php
// ACİL DEBUG - TAM HATA KONTROL
echo "<h1 style='color: red;'>ACİL DEBUG - TAM HATA KONTROL</h1>";

// Error reporting açık olsun
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once(__DIR__ . '/includes/config.inc.php');

echo "<h3>1. WORDPRESS API MANUEL TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// WordPress API direkt test
$wp_api_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=3";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wp_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

echo "<strong>WordPress API Test:</strong><br>";
echo "<strong>URL:</strong> $wp_api_url<br>";
echo "<strong>HTTP Code:</strong> <span style='color: " . ($http_code == 200 ? 'green' : 'red') . ";'>$http_code</span><br>";

if ($error) {
    echo "<strong style='color: red;'>cURL Error:</strong> $error<br>";
}

if ($response && $http_code == 200) {
    $posts = json_decode($response, true);
    if ($posts && is_array($posts)) {
        echo "<strong style='color: green;'>✓ " . count($posts) . " blog postu çekildi!</strong><br>";
        echo "<strong>İlk Post:</strong> " . htmlspecialchars($posts[0]['title']['rendered']) . "<br>";
    } else {
        echo "<strong style='color: red;'>❌ JSON parse hatası</strong><br>";
    }
} else {
    echo "<strong style='color: red;'>❌ WordPress API erişilemiyor</strong><br>";
}

echo "</div>";

echo "<h3>2. FLYNAX WORDPRESS BRIDGE TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

try {
    // Flynax WordPress Bridge test
    global $reefless;
    $reefless->loadClass("WordpressBridge", null, "wordpressBridge");
    
    echo "<strong style='color: green;'>✓ WordPress Bridge class yüklendi</strong><br>";
    
    // API class test
    require_once(RL_PLUGINS . 'wordpressBridge/src/WordPressAPI/API.php');
    
    $wordPressApi = new \Flynax\Plugin\WordPressBridge\WordPressAPI\API();
    echo "<strong style='color: green;'>✓ WordPress API class oluşturuldu</strong><br>";
    
    // Posts çekmeyi dene
    $posts = $wordPressApi->getRecentPosts(3);
    
    if ($posts && is_array($posts) && count($posts) > 0) {
        echo "<strong style='color: green;'>✓ Flynax Bridge ile " . count($posts) . " post çekildi!</strong><br>";
        echo "<strong>İlk Post:</strong> " . htmlspecialchars($posts[0]['title']) . "<br>";
    } else {
        echo "<strong style='color: red;'>❌ Flynax Bridge ile post çekilemedi</strong><br>";
        echo "<strong>Posts Response:</strong> " . htmlspecialchars(json_encode($posts)) . "<br>";
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ Flynax Bridge Hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
    echo "<strong>Stack Trace:</strong><br>";
    echo "<pre style='background: #ffe6e6; padding: 10px; font-size: 11px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</div>";

echo "<h3>3. BLOCK MANUEL ÇALIŞTIR:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

try {
    // Block'u manuel çalıştır
    echo "<strong>blockWPBridgeLastPost() manuel çalıştırma:</strong><br>";
    
    ob_start(); // Output buffering başlat
    
    global $reefless, $rlSmarty;
    $reefless->loadClass("WordpressBridge", null, "wordpressBridge");
    $GLOBALS["rlWordpressBridge"]->blockWPBridgeLastPost();
    
    $output = ob_get_clean(); // Output'u yakala
    
    if ($output) {
        echo "<strong style='color: green;'>✓ Block output oluşturuldu!</strong><br>";
        echo "<div style='background: #e7f3ff; padding: 10px; max-height: 300px; overflow-y: scroll;'>";
        echo $output;
        echo "</div>";
    } else {
        echo "<strong style='color: red;'>❌ Block output boş!</strong><br>";
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ Block Çalıştırma Hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
    echo "<strong>Stack Trace:</strong><br>";
    echo "<pre style='background: #ffe6e6; padding: 10px; font-size: 11px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</div>";

echo "<h3>4. TEMPLATE DOSYASI KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$template_file = RL_PLUGINS . "wordpressBridge" . RL_DS . "recent_posts.tpl";
echo "<strong>Template Dosyası:</strong> " . htmlspecialchars($template_file) . "<br>";

if (file_exists($template_file)) {
    echo "<strong style='color: green;'>✓ Template dosyası mevcut</strong><br>";
    $template_content = file_get_contents($template_file);
    echo "<strong>Template İçeriği (ilk 500 karakter):</strong><br>";
    echo "<div style='background: #f0f0f0; padding: 10px; font-size: 11px;'>";
    echo "<code>" . htmlspecialchars(substr($template_content, 0, 500)) . "...</code>";
    echo "</div>";
} else {
    echo "<strong style='color: red;'>❌ Template dosyası bulunamadı!</strong><br>";
}

echo "</div>";

echo "<h3>5. ERROR LOG KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$error_log_path = __DIR__ . '/error_log';
if (file_exists($error_log_path)) {
    $error_log = file_get_contents($error_log_path);
    $recent_errors = array_slice(explode("\n", $error_log), -10); // Son 10 satır
    
    echo "<strong>Son Error Log Kayıtları:</strong><br>";
    echo "<div style='background: #ffe6e6; padding: 10px; font-size: 11px; max-height: 200px; overflow-y: scroll;'>";
    foreach ($recent_errors as $error) {
        if (trim($error)) {
            echo htmlspecialchars($error) . "<br>";
        }
    }
    echo "</div>";
} else {
    echo "<strong>Error log bulunamadı.</strong><br>";
}

echo "</div>";

echo "<h2 style='color: blue;'>DEBUG TAMAMLANDI</h2>";
echo "<p><strong>SONUÇ:</strong> Yukarıdaki hatalar blog çalışmamasının sebebini gösteriyor.</p>";
?> 