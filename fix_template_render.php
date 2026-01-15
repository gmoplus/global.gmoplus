<?php
// TEMPLATE RENDER PROBLEMI DÜZELTMESİ
echo "<h1 style='color: red;'>TEMPLATE RENDER PROBLEMI DÜZELTMESİ</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

echo "<p style='color: green;'>✓ Config ve Database hazır</p>";

echo "<h3>1. MEVCUT BLOG BLOCK KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Mevcut block içeriğini kontrol et
$block_query = "SELECT Content, `Type`, `Side`, Position, `Status` FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($block_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<strong>Type:</strong> " . htmlspecialchars($row['Type']) . "<br>";
    echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
    echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . "<br>";
    echo "<strong>Status:</strong> " . htmlspecialchars($row['Status']) . "<br>";
    echo "<strong>Content Length:</strong> " . strlen($row['Content']) . " karakter<br>";
    
    echo "<h4>İçerik Önizleme:</h4>";
    echo "<div style='background: #f0f0f0; padding: 10px; max-height: 200px; overflow-y: scroll; font-size: 11px;'>";
    echo htmlspecialchars(substr($row['Content'], 0, 1000)) . "...";
    echo "</div>";
} else {
    echo "<p style='color: red;'>❌ Blog block bulunamadı!</p>";
}

echo "</div>";

echo "<h3>2. TEMPLATE DOSYALARI KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Template dosyalarını kontrol et
$template_files = [
    'templates/general_sunny/tpl/blocks/blocks_manager.tpl',
    'templates/general_sunny/tpl/content.tpl'
];

foreach ($template_files as $template_file) {
    echo "<h4>" . basename($template_file) . ":</h4>";
    
    if (file_exists(__DIR__ . '/' . $template_file)) {
        echo "<span style='color: green;'>✓ Dosya mevcut</span><br>";
        
        $content = file_get_contents(__DIR__ . '/' . $template_file);
        
        // Middle section var mı kontrol et
        if (strpos($content, 'middle') !== false) {
            echo "<span style='color: green;'>✓ Middle section bulundu</span><br>";
        } else {
            echo "<span style='color: red;'>❌ Middle section bulunamadı</span><br>";
        }
        
        // Block manager var mı kontrol et
        if (strpos($content, 'blocks_manager') !== false || strpos($content, 'block') !== false) {
            echo "<span style='color: green;'>✓ Block manager bulundu</span><br>";
        } else {
            echo "<span style='color: red;'>❌ Block manager bulunamadı</span><br>";
        }
        
    } else {
        echo "<span style='color: red;'>❌ Dosya bulunamadı</span><br>";
    }
    echo "<br>";
}

echo "</div>";

echo "<h3>3. BLOG BLOCK'U FARKLI POZISYONA TAŞI:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Blog block'unu farklı pozisyonlara taşıyarak test et
$positions_to_try = [
    ['side' => 'bottom', 'position' => 1],
    ['side' => 'left', 'position' => 1], 
    ['side' => 'right', 'position' => 1],
    ['side' => 'middle', 'position' => 0]
];

$current_position = 0;

foreach ($positions_to_try as $pos) {
    $update_position = "UPDATE " . RL_DBPREFIX . "blocks SET `Side` = ?, Position = ? WHERE `Key` = 'wpbridge_last_post'";
    $stmt = $connection->prepare($update_position);
    $stmt->bind_param('si', $pos['side'], $pos['position']);
    $result = $stmt->execute();
    
    if ($result) {
        echo "<strong style='color: green;'>✓ Blog block " . $pos['side'] . " pozisyonuna taşındı (Position: " . $pos['position'] . ")</strong><br>";
        $current_position++;
        
        if ($current_position == 1) {
            // İlk deneme - bottom'da test et
            echo "<strong style='color: blue;'>→ Ana sayfayı kontrol edin - BOTTOM'da görünmeli!</strong><br>";
            break;
        }
    }
}

echo "</div>";

echo "<h3>4. ALTERNATİF BLOG BLOCK OLUŞTUR:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Çok basit, direkt görünecek blog block oluştur
$simple_html = '<div style="background: #007bff; color: white; padding: 20px; margin: 20px; border-radius: 10px; text-align: center;">
<h2>🎉 BLOG ÇALIŞTI! 🎉</h2>
<h3>Recent Blog Posts</h3>
<div style="background: white; color: black; padding: 15px; margin: 10px; border-radius: 5px;">
<h4><a href="https://blog.global.gmoplus.com" target="_blank">📰 Organik Sebze İthalatında Lojistik Süreçler</a></h4>
<p>Blog sistemi başarıyla çalışıyor! WordPress bağlantısı aktif.</p>
</div>
<div style="background: white; color: black; padding: 15px; margin: 10px; border-radius: 5px;">
<h4><a href="https://blog.global.gmoplus.com" target="_blank">💎 İnciler, Değerli Taşlar ve Mücevherat</a></h4>
<p>Tüm blog postları WordPress\'ten başarıyla çekiliyor.</p>
</div>
<div style="background: white; color: black; padding: 15px; margin: 10px; border-radius: 5px;">
<h4><a href="https://blog.global.gmoplus.com" target="_blank">🧴 Kozmetik ve Güzellik Ürünleri</a></h4>
<p>HTML blog block sistemi mükemmel çalışıyor!</p>
</div>
<p style="margin-top: 20px;">
<a href="https://blog.global.gmoplus.com" target="_blank" style="background: #28a745; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;">
🔗 Tüm Blog Yazılarını Gör
</a>
</p>
</div>';

// Test blog block oluştur
$test_block_key = 'test_blog_block';
$insert_test = "INSERT INTO " . RL_DBPREFIX . "blocks (Plugin, `Key`, Content, `Type`, `Status`, `Position`, `Side`) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Content = ?, `Type` = ?, `Status` = ?";
$stmt = $connection->prepare($insert_test);

$plugin = '';
$type = 'html';
$status = 'active';
$position = 0;
$side = 'bottom';

$stmt->bind_param('sssssissss', $plugin, $test_block_key, $simple_html, $type, $status, $position, $side, $simple_html, $type, $status);
$result = $stmt->execute();

if ($result) {
    echo "<strong style='color: green;'>✅ TEST BLOG BLOCK oluşturuldu!</strong><br>";
    echo "<strong>Key:</strong> test_blog_block<br>";
    echo "<strong>Side:</strong> bottom<br>";
    echo "<strong>Type:</strong> html<br>";
    echo "<strong>Bu MUTLAKA görünmeli!</strong><br>";
    
    // Test block ismi ekle
    $lang_key = "blocks+name+test_blog_block";
    $insert_lang = "INSERT INTO " . RL_DBPREFIX . "lang_keys (Code, Module, `Key`, Value, Plugin) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Value = ?";
    $stmt = $connection->prepare($insert_lang);
    $lang = 'en';
    $module = 'common';
    $name = 'Test Blog Block';
    $plugin_name = '';
    $stmt->bind_param('ssssss', $lang, $module, $lang_key, $name, $plugin_name, $name);
    $stmt->execute();
    
    echo "<strong style='color: green;'>✅ Test block ismi de eklendi!</strong><br>";
} else {
    echo "<strong style='color: red;'>❌ Test block oluşturulamadı</strong><br>";
}

echo "</div>";

echo "<h3>5. CACHE TEMİZLE VE TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Cache temizle
$cache_dirs = [
    __DIR__ . '/tmp/compile/',
    __DIR__ . '/tmp/cache/'
];

$deleted_files = 0;
foreach ($cache_dirs as $cache_dir) {
    if (is_dir($cache_dir)) {
        $files = glob($cache_dir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                $deleted_files++;
            }
        }
    }
}

echo "<strong style='color: green;'>✅ $deleted_files cache dosyası silindi</strong><br>";

// Final durumu göster
$all_blocks = "SELECT `Key`, Plugin, `Type`, `Side`, Position, `Status` FROM " . RL_DBPREFIX . "blocks WHERE `Status` = 'active' AND (`Key` LIKE '%blog%' OR `Key` LIKE '%post%' OR `Key` = 'wpbridge_last_post' OR `Key` = 'test_blog_block') ORDER BY `Side`, Position";
$result = $connection->query($all_blocks);

echo "<h4>Aktif Blog Blokları:</h4>";
while($row = $result->fetch_assoc()) {
    $bg_color = ($row['Key'] == 'test_blog_block') ? '#e7f3ff' : '#f0f0f0';
    echo "<div style='background: $bg_color; padding: 5px; margin: 3px; border-radius: 3px;'>";
    echo "<strong>" . htmlspecialchars($row['Key']) . "</strong> | ";
    echo "Type: " . htmlspecialchars($row['Type']) . " | ";
    echo "Side: " . htmlspecialchars($row['Side']) . " | ";
    echo "Position: " . htmlspecialchars($row['Position']);
    echo "</div>";
}

echo "</div>";

$connection->close();

echo "<h2 style='color: blue;'>📱 TEST SONUÇLARI</h2>";
echo "<div style='background: #fff3cd; padding: 20px; border-radius: 10px; margin: 10px;'>";
echo "<h3>ŞİMDİ YAPIN:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";
echo "<li><strong>Ana sayfayı açın ve Ctrl+F5 yapın</strong></li>";
echo "<li><strong>BOTTOM'da MAVİ TEST BLOG BLOCK'unu arayın</strong></li>";
echo "<li><strong>Eğer mavi block görünürse → template çalışıyor</strong></li>";
echo "<li><strong>Eğer hiçbir block görünmezse → template problemi var</strong></li>";
echo "</ol>";
echo "</div>";

echo "<h4 style='color: red;'>EĞER TEST BLOCK GÖRÜNÜRSE:</h4>";
echo "<p>Template çalışıyor demektir. Original blog block'ta CSS veya içerik problemi var.</p>";
echo "<h4 style='color: red;'>EĞER HİÇBİR BLOCK GÖRÜNMEZSE:</h4>";
echo "<p>Flynax template'inde block rendering problemi var. jobs.gmoplus template'ini kopyalamamız gerekir.</p>";
?> 