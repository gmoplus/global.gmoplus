<?php
// Admin Controller Debug
echo '<h1>Admin Controller Debug</h1>';

// Controller dosyası var mı?
$controller_file = __DIR__ . '/admin/controllers/quote_requests.inc.php';
echo '<h2>Dosya Kontrolleri:</h2>';
echo '<p><strong>Controller dosyası:</strong> ' . $controller_file . '</p>';
echo '<p><strong>Var mı?</strong> ' . (file_exists($controller_file) ? '✅ Evet' : '❌ Hayır') . '</p>';

if (file_exists($controller_file)) {
    echo '<p><strong>Dosya boyutu:</strong> ' . filesize($controller_file) . ' bytes</p>';
    echo '<p><strong>Son değişiklik:</strong> ' . date('Y-m-d H:i:s', filemtime($controller_file)) . '</p>';
}

// Template dosyası var mı?
$template_file = __DIR__ . '/admin/tpl/controllers/quote_requests.tpl';
echo '<p><strong>Template dosyası:</strong> ' . $template_file . '</p>';
echo '<p><strong>Var mı?</strong> ' . (file_exists($template_file) ? '✅ Evet' : '❌ Hayır') . '</p>';

if (file_exists($template_file)) {
    echo '<p><strong>Dosya boyutu:</strong> ' . filesize($template_file) . ' bytes</p>';
    echo '<p><strong>Son değişiklik:</strong> ' . date('Y-m-d H:i:s', filemtime($template_file)) . '</p>';
}

// Database bağlantısı test et
echo '<h2>Veritabanı Kontrol:</h2>';
try {
    require_once 'includes/config.inc.php';
    require_once 'includes/control.inc.php';
    
    // Teklif tablosu var mı?
    $table_check = $rlDb->getRow("SHOW TABLES LIKE '{db_prefix}quote_requests'");
    if ($table_check) {
        $table_exists = $rlDb->getOne("COUNT(*) as count", '', 'quote_requests');
        echo '<p><strong>quote_requests tablosu:</strong> ✅ Var (Toplam kayıt: ' . $table_exists . ')</p>';
    } else {
        echo '<p><strong>quote_requests tablosu:</strong> ❌ Yok</p>';
    }
    
    // Dil anahtarları var mı?
    $lang_count = $rlDb->getOne("COUNT(*) as count", "`Module` = 'admin' AND `Key` LIKE 'quote%'", 'lang_keys');
    echo '<p><strong>Dil anahtarları:</strong> ✅ ' . $lang_count . ' adet</p>';
    
} catch (Exception $e) {
    echo '<p><strong>Veritabanı hatası:</strong> ❌ ' . $e->getMessage() . '</p>';
}

echo '<h2>Test Linkleri:</h2>';
echo '<p><a href="https://global.gmoplus.com/admin/" target="_blank">Admin Panel Ana Sayfa</a></p>';
echo '<p><a href="https://global.gmoplus.com/admin/index.php?controller=quote_requests" target="_blank">Teklif Talepleri</a></p>';

echo '<h2>Sorun Giderme:</h2>';
echo '<p>Eğer sayfa açılmıyorsa:</p>';
echo '<ol>';
echo '<li>Admin paneline giriş yapmış olduğunuzdan emin olun</li>';
echo '<li>URL\'yi tarayıcıda direkt açmayı deneyin</li>';
echo '<li>Tarayıcı cache\'ini temizleyin</li>';
echo '<li>Browser developer tools (F12) açıp console hatalarını kontrol edin</li>';
echo '</ol>';
?> 