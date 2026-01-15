<?php
// BLOG BLOCK'U BOTTOM'A TAŞI - MUTLAKA GÖRÜNÜR
echo "<h1 style='color: red;'>BLOG BLOCK BOTTOM'A TAŞINIYOR</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

// Blog block'u bottom'a taşı
$move = "UPDATE " . RL_DBPREFIX . "blocks SET `Side` = 'bottom', `Status` = 'active', `Position` = 1 WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($move);

if ($result) {
    echo "<p style='color: green;'>✓ Blog block BOTTOM'a taşındı!</p>";
} else {
    echo "<p style='color: red;'>❌ Hata: " . $connection->error . "</p>";
}

// Tüm blocks'ları göster
echo "<h3>TÜM BLOKLAR:</h3>";
$all_blocks = "SELECT `Key`, Plugin, `Side`, `Status`, Position FROM " . RL_DBPREFIX . "blocks WHERE Plugin = 'wordpressBridge' OR `Key` LIKE '%blog%' OR `Key` LIKE '%post%' OR `Key` LIKE '%news%'";
$result = $connection->query($all_blocks);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $status_color = $row['Status'] == 'active' ? 'green' : 'red';
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 5px;'>";
        echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . "<br>";
        echo "<strong>Plugin:</strong> " . htmlspecialchars($row['Plugin']) . "<br>";
        echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
        echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . "<br>";
        echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span>";
        echo "</div>";
    }
}

// Template kontrolü
echo "<h3>TEMPLATE KONTROL:</h3>";
echo "<p>Template dosyasında blog block gösteriliyor mu kontrol ediyoruz...</p>";

$template_files = [
    'templates/general_sunny/tpl/content.tpl',
    'templates/general_sunny/tpl/blocks/blocks_manager.tpl'
];

foreach ($template_files as $template_file) {
    if (file_exists(__DIR__ . '/' . $template_file)) {
        $content = file_get_contents(__DIR__ . '/' . $template_file);
        
        echo "<strong>$template_file:</strong><br>";
        
        if (strpos($content, 'bottom') !== false) {
            echo "<span style='color: green;'>✓ Bottom bölümü var</span><br>";
        } else {
            echo "<span style='color: red;'>❌ Bottom bölümü yok</span><br>";
        }
        
        if (strpos($content, 'middle') !== false) {
            echo "<span style='color: green;'>✓ Middle bölümü var</span><br>";
        } else {
            echo "<span style='color: red;'>❌ Middle bölümü yok</span><br>";
        }
        echo "<br>";
    }
}

$connection->close();

echo "<h2 style='color: blue;'>BLOG BLOCK ŞİMDİ BOTTOM'DA!</h2>";
echo "<p style='color: green; font-size: 18px;'><strong>ANA SAYFAYI YENİLEYİN - BOTTOM'DA GÖRÜNECEK!</strong></p>";
echo "<p><strong>EĞER HALA GÖRÜNMEZSE:</strong> Template sorunu var, admin panelden manuel ayarlayalım.</p>";
?> 