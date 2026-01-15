<?php
// ERROR LOG KONTROL
echo "<h1 style='color: red;'>ERROR LOG KONTROL</h1>";

// Error log dosyalarını kontrol et
$error_files = [
    __DIR__ . '/error_log',
    __DIR__ . '/tmp/errorLog/errors.log',
    __DIR__ . '/logs/error.log',
    '/var/log/apache2/error.log',
    '/var/log/nginx/error.log'
];

echo "<h3>ERROR LOG ARAMA:</h3>";

foreach ($error_files as $error_file) {
    if (file_exists($error_file) && is_readable($error_file)) {
        echo "<h4>Dosya: " . htmlspecialchars($error_file) . "</h4>";
        
        $content = file_get_contents($error_file);
        $lines = explode("\n", $content);
        
        // Son 20 satırı al
        $recent_lines = array_slice($lines, -20);
        
        echo "<div style='background: #f0f0f0; padding: 10px; border: 1px solid #ccc; max-height: 300px; overflow-y: scroll;'>";
        echo "<pre style='font-size: 12px;'>";
        
        foreach ($recent_lines as $line) {
            if (trim($line)) {
                // WordPress bridge ile ilgili hataları vurgula
                if (strpos($line, 'wpbridge') !== false || 
                    strpos($line, 'wordpressBridge') !== false || 
                    strpos($line, 'Fatal error') !== false ||
                    strpos($line, 'recent_posts') !== false) {
                    echo "<span style='background: yellow; color: red;'>" . htmlspecialchars($line) . "</span>\n";
                } else {
                    echo htmlspecialchars($line) . "\n";
                }
            }
        }
        
        echo "</pre>";
        echo "</div><br>";
        break; // İlk bulunan dosyayı göster
    }
}

// PHP error reporting aç
echo "<h3>PHP ERROR REPORTING:</h3>";
echo "<p>Error Reporting Level: " . error_reporting() . "</p>";
echo "<p>Display Errors: " . (ini_get('display_errors') ? 'ON' : 'OFF') . "</p>";
echo "<p>Log Errors: " . (ini_get('log_errors') ? 'ON' : 'OFF') . "</p>";

// Blog block content'ini tekrar kontrol et
include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

echo "<h3>BLOG BLOCK DURUMU:</h3>";
$check_query = "SELECT `Key`, `Status`, `Side`, Position, LENGTH(Content) as content_length FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($check_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<div style='border: 1px solid #ccc; padding: 10px;'>";
    echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . "<br>";
    echo "<strong>Status:</strong> " . htmlspecialchars($row['Status']) . "<br>";
    echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
    echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . "<br>";
    echo "<strong>Content Length:</strong> " . htmlspecialchars($row['content_length']) . " characters<br>";
    echo "</div>";
}

// Basit HTML-only block deneyelim
echo "<h3>BASIT HTML BLOCK DENEMESİ:</h3>";

$html_only_content = '<div style="background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 8px;">
<h3 style="color: #333; margin-bottom: 20px;">Recent Blog Posts</h3>
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
    <div style="background: white; padding: 15px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h4 style="margin: 0 0 10px 0;"><a href="https://blog.global.gmoplus.com" target="_blank" style="color: #007bff;">Organik Sebze İthalatında Lojistik Süreçler</a></h4>
        <p style="color: #666; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        <small style="color: #999;">28.07.2025</small>
    </div>
    <div style="background: white; padding: 15px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h4 style="margin: 0 0 10px 0;"><a href="https://blog.global.gmoplus.com" target="_blank" style="color: #007bff;">İnciler, Değerli Taşlar ve Mücevherat</a></h4>
        <p style="color: #666; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        <small style="color: #999;">27.07.2025</small>
    </div>
    <div style="background: white; padding: 15px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h4 style="margin: 0 0 10px 0;"><a href="https://blog.global.gmoplus.com" target="_blank" style="color: #007bff;">Kozmetik ve Güzellik Ürünleri</a></h4>
        <p style="color: #666; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        <small style="color: #999;">26.07.2025</small>
    </div>
</div>
</div>';

// HTML-only block'u dene
$update_html = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ?, `Type` = 'html' WHERE `Key` = 'wpbridge_last_post'";
$stmt = $connection->prepare($update_html);
$stmt->bind_param('s', $html_only_content);
$result = $stmt->execute();

if ($result) {
    echo "<p style='color: green;'>✓ HTML-only blog block oluşturuldu (PHP yok)</p>";
} else {
    echo "<p style='color: red;'>❌ HTML block hatası: " . $connection->error . "</p>";
}

$connection->close();

echo "<h2 style='color: blue;'>ERROR LOG KONTROLÜ TAMAMLANDI</h2>";
echo "<p style='color: green; font-size: 16px;'><strong>ANA SAYFAYI YENİLEYİN - ŞİMDİ HTML BLOCK ÇALIŞACAK!</strong></p>";
echo "<p><strong>Eğer HTML block çalışırsa:</strong> Sorun PHP kodundaydı<br>";
echo "<strong>Eğer HTML block da çalışmazsa:</strong> Template sorunu var</p>";
?> 