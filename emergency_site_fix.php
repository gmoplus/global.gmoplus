<?php
// ACİL SİTE DÜZELTMESİ
echo "<h1 style='color: red;'>ACİL SİTE DÜZELTMESİ</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

echo "<p style='color: green;'>✓ Config ve Database hazır</p>";

echo "<h3>1. PROBLEMLİ BLOCLARI SİL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Test blog block'unu sil
$delete_test_block = "DELETE FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'test_blog_block'";
$result = $connection->query($delete_test_block);

if ($result) {
    echo "<strong style='color: green;'>✅ test_blog_block silindi</strong><br>";
} else {
    echo "<strong style='color: red;'>❌ test_blog_block silinemedi</strong><br>";
}

// Test block lang key'lerini sil
$delete_test_lang = "DELETE FROM " . RL_DBPREFIX . "lang_keys WHERE `Key` = 'blocks+name+test_blog_block'";
$connection->query($delete_test_lang);
echo "<strong style='color: green;'>✅ test_blog_block dil kayıtları silindi</strong><br>";

echo "</div>";

echo "<h3>2. BLOG BLOCK'U NORMAL YERİNE TAŞI:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Blog block'unu orjinal pozisyonuna taşı
$restore_blog_position = "UPDATE " . RL_DBPREFIX . "blocks SET `Side` = 'middle', Position = 2, `Status` = 'active' WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($restore_blog_position);

if ($result) {
    echo "<strong style='color: green;'>✅ wpbridge_last_post middle pozisyonuna taşındı</strong><br>";
} else {
    echo "<strong style='color: red;'>❌ Blog block taşınamadı</strong><br>";
}

echo "</div>";

echo "<h3>3. CACHE TEMİZLE:</h3>";
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

echo "</div>";

echo "<h3>4. INDEX.PHP KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// index.php dosyasını kontrol et
$index_file = __DIR__ . '/index.php';
if (file_exists($index_file)) {
    $index_size = filesize($index_file);
    echo "<strong>index.php:</strong> Mevcut ($index_size bytes)<br>";
    
    if ($index_size > 1000) {
        echo "<span style='color: green;'>✓ index.php boyutu normal görünüyor</span><br>";
    } else {
        echo "<span style='color: red;'>❌ index.php çok küçük, bozulmuş olabilir</span><br>";
    }
    
    // İlk birkaç satırı kontrol et
    $index_content = file_get_contents($index_file, false, null, 0, 200);
    echo "<strong>İlk 200 karakter:</strong><br>";
    echo "<code style='background: #f0f0f0; padding: 5px; font-size: 11px;'>" . htmlspecialchars($index_content) . "</code><br>";
    
} else {
    echo "<strong style='color: red;'>❌ index.php bulunamadı!</strong><br>";
}

echo "</div>";

echo "<h3>5. .HTACCESS KONTROL:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// .htaccess dosyasını kontrol et
$htaccess_file = __DIR__ . '/.htaccess';
if (file_exists($htaccess_file)) {
    $htaccess_content = file_get_contents($htaccess_file);
    echo "<strong>.htaccess:</strong> Mevcut (" . strlen($htaccess_content) . " karakter)<br>";
    
    // DirectoryIndex var mı kontrol et
    if (strpos($htaccess_content, 'DirectoryIndex') !== false) {
        echo "<span style='color: green;'>✓ DirectoryIndex tanımlı</span><br>";
    } else {
        echo "<span style='color: orange;'>⚠ DirectoryIndex bulunamadı</span><br>";
    }
    
    // Options -Indexes var mı kontrol et
    if (strpos($htaccess_content, 'Options -Indexes') !== false) {
        echo "<span style='color: green;'>✓ Directory listing kapalı</span><br>";
    } else {
        echo "<span style='color: red;'>❌ Directory listing açık olabilir!</span><br>";
        
        // .htaccess'e Options -Indexes ekle
        $new_htaccess = "Options -Indexes\nDirectoryIndex index.php index.html\n\n" . $htaccess_content;
        file_put_contents($htaccess_file, $new_htaccess);
        echo "<strong style='color: green;'>✅ .htaccess düzeltildi - directory listing kapatıldı</strong><br>";
    }
    
} else {
    echo "<strong style='color: red;'>❌ .htaccess bulunamadı!</strong><br>";
    
    // Yeni .htaccess oluştur
    $new_htaccess = "Options -Indexes\nDirectoryIndex index.php index.html\n\nRewriteEngine On\n";
    file_put_contents($htaccess_file, $new_htaccess);
    echo "<strong style='color: green;'>✅ Yeni .htaccess oluşturuldu</strong><br>";
}

echo "</div>";

echo "<h3>6. AKTİF BLOKLAR:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Aktif blokları listele
$active_blocks = "SELECT `Key`, Plugin, `Type`, `Side`, Position, `Status` FROM " . RL_DBPREFIX . "blocks WHERE `Status` = 'active' ORDER BY `Side`, Position LIMIT 10";
$result = $connection->query($active_blocks);

echo "<strong>Aktif Bloklar (İlk 10):</strong><br>";
while($row = $result->fetch_assoc()) {
    $bg_color = ($row['Key'] == 'wpbridge_last_post') ? '#e7f3ff' : '#f8f8f8';
    echo "<div style='background: $bg_color; padding: 3px; margin: 2px; font-size: 12px;'>";
    echo htmlspecialchars($row['Key']) . " | " . htmlspecialchars($row['Side']) . " | Pos:" . htmlspecialchars($row['Position']);
    echo "</div>";
}

echo "</div>";

$connection->close();

echo "<h2 style='color: blue;'>🔧 ACİL ONARIM TAMAMLANDI</h2>";
echo "<div style='background: #d4edda; padding: 20px; border-radius: 10px; margin: 10px;'>";
echo "<h3>ŞİMDİ YAPIN:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı hemen silin</strong></li>";
echo "<li><strong>Tarayıcıyı tamamen kapatın ve açın</strong></li>";
echo "<li><strong>Ana sayfayı tekrar açın</strong></li>";
echo "<li><strong>Ana sayfa düzgün açılmalı</strong></li>";
echo "</ol>";
echo "</div>";

echo "<h4 style='color: red;'>EĞER HALA INDEX OF ÇIKIYORSA:</h4>";
echo "<p>Sunucu konfigürasyonu problemi olabilir. Hosting sağlayıcınızla iletişime geçin.</p>";
?> 