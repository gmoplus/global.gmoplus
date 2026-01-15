<?php
// Basit Admin Test
echo '<h1>Admin Sayfa Testi</h1>';

// Önce session kontrolü
session_start();
echo '<p><strong>Session Status:</strong> ' . (session_status() == PHP_SESSION_ACTIVE ? 'Aktif' : 'Pasif') . '</p>';

// Config yükle
try {
    require_once 'includes/config.inc.php';
    echo '<p><strong>Config:</strong> ✅ Yüklendi</p>';
    
    require_once 'includes/control.inc.php';
    echo '<p><strong>Control:</strong> ✅ Yüklendi</p>';
    
    // Veritabanı test
    $test_query = $rlDb->getAll("SELECT ID, Name, Status FROM `{db_prefix}quote_requests` LIMIT 5");
    echo '<p><strong>Veritabanı:</strong> ✅ Bağlantı var</p>';
    echo '<p><strong>Teklif sayısı:</strong> ' . count($test_query) . '</p>';
    
    if (count($test_query) > 0) {
        echo '<h3>Son Teklif Talepleri:</h3>';
        echo '<table border="1" cellpadding="5">';
        echo '<tr><th>ID</th><th>Ad</th><th>Durum</th></tr>';
        foreach ($test_query as $quote) {
            echo '<tr>';
            echo '<td>' . $quote['ID'] . '</td>';
            echo '<td>' . htmlspecialchars($quote['Name']) . '</td>';
            echo '<td>' . $quote['Status'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
} catch (Exception $e) {
    echo '<p><strong>Hata:</strong> ❌ ' . $e->getMessage() . '</p>';
}

echo '<hr>';
echo '<h2>Admin Panel Test Linkleri:</h2>';
echo '<p><a href="https://global.gmoplus.com/admin/" target="_blank">Admin Giriş</a></p>';
echo '<p><a href="admin/controllers/quote_requests.inc.php" target="_blank">Controller Dosyası (Direkt)</a></p>';

// Flynax kontrolü
if (defined('REALM')) {
    echo '<p><strong>Flynax Realm:</strong> ' . REALM . '</p>';
} else {
    echo '<p><strong>Flynax Realm:</strong> Tanımlı değil</p>';
}

echo '<h3>🛠️ Manuel Test:</h3>';
echo '<p>1. Admin paneline giriş yapın: <a href="https://global.gmoplus.com/admin/" target="_blank">https://global.gmoplus.com/admin/</a></p>';
echo '<p>2. Giriş yaptıktan sonra URL çubuğuna şunu yazın:</p>';
echo '<p><code>https://global.gmoplus.com/admin/index.php?controller=quote_requests</code></p>';
?> 