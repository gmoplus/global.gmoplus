<?php
// Database Fix Script for Quote Requests Controller
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/config.inc.php';
require_once RL_CLASSES . 'rlDb.class.php';

$rlDb = new rlDb();
$rlDb->connect(RL_DBHOST, RL_DBPORT, RL_DBUSER, RL_DBPASS, RL_DBNAME);

echo "<h2>Database Fix for Quote Requests Admin Controller</h2>\n";

try {
    // ADIM 1: Eski kayıtları sil
    echo "<p>ADIM 1: Eski kayıtları siliniyor...</p>\n";
    $delete1 = $rlDb->query("DELETE FROM `{db_prefix}admin_controllers` WHERE `Key` = 'quote_requests'");
    echo $delete1 ? "✓ Admin controllers kayıtları silindi<br>" : "✗ Hata: Admin controllers silinemedi<br>";

    // ADIM 2: Yeni kayıt ekle
    echo "<p>ADIM 2: Yeni controller kaydı ekleniyor...</p>\n";
    $insert1 = $rlDb->query("INSERT INTO `{db_prefix}admin_controllers` (`Parent_ID`, `Position`, `Key`, `Controller`) VALUES (2, 99, 'quote_requests', 'quote_requests')");
    echo $insert1 ? "✓ Admin controller kaydı eklendi<br>" : "✗ Hata: Admin controller eklenemedi<br>";

    // ADIM 3: Dil anahtarını temizle ve ekle
    echo "<p>ADIM 3: Dil anahtarları düzeltiliyor...</p>\n";
    $delete2 = $rlDb->query("DELETE FROM `{db_prefix}lang_keys` WHERE `Key` = 'admin_controllers+name+quote_requests'");
    $insert2 = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Key`, `Module`, `Status`) VALUES ('admin_controllers+name+quote_requests', 'admin', 'active')");
    echo $insert2 ? "✓ Dil anahtarı eklendi<br>" : "✗ Hata: Dil anahtarı eklenemedi<br>";

    // ADIM 4: Türkçe dil içeriği
    echo "<p>ADIM 4: Türkçe dil içeriği ekleniyor...</p>\n";
    $delete3 = $rlDb->query("DELETE FROM `{db_prefix}lang_content` WHERE `Key` = 'admin_controllers+name+quote_requests' AND `Code` = 'turkish'");
    $insert3 = $rlDb->query("INSERT INTO `{db_prefix}lang_content` (`Key`, `Code`, `Value`) VALUES ('admin_controllers+name+quote_requests', 'turkish', 'Teklif Talepleri')");
    echo $insert3 ? "✓ Türkçe dil içeriği eklendi<br>" : "✗ Hata: Türkçe dil içeriği eklenemedi<br>";

    // ADIM 5: İngilizce dil içeriği
    echo "<p>ADIM 5: İngilizce dil içeriği ekleniyor...</p>\n";
    $delete4 = $rlDb->query("DELETE FROM `{db_prefix}lang_content` WHERE `Key` = 'admin_controllers+name+quote_requests' AND `Code` = 'english'");
    $insert4 = $rlDb->query("INSERT INTO `{db_prefix}lang_content` (`Key`, `Code`, `Value`) VALUES ('admin_controllers+name+quote_requests', 'english', 'Quote Requests')");
    echo $insert4 ? "✓ İngilizce dil içeriği eklendi<br>" : "✗ Hata: İngilizce dil içeriği eklenemedi<br>";

    // ADIM 6: Sonucu kontrol et
    echo "<p>ADIM 6: Kayıt kontrolü...</p>\n";
    $result = $rlDb->getRow("SELECT * FROM `{db_prefix}admin_controllers` WHERE `Key` = 'quote_requests'");
    
    if ($result) {
        echo "✓ <strong>BAŞARILI!</strong> Quote Requests controller kaydı bulundu:<br>";
        echo "ID: {$result['ID']}<br>";
        echo "Key: {$result['Key']}<br>";
        echo "Controller: {$result['Controller']}<br>";
        echo "Parent_ID: {$result['Parent_ID']}<br>";
        echo "Position: {$result['Position']}<br>";
    } else {
        echo "✗ <strong>HATA!</strong> Controller kaydı bulunamadı.";
    }
    
    echo "<hr>";
    echo "<p><strong>Tamamlandı!</strong> Şimdi admin paneline gidin ve <code>?controller=quote_requests</code> adresini deneyin.</p>";
    echo "<p><a href='admin/index.php?controller=quote_requests' target='_blank'>🔗 Admin Quote Requests sayfasını aç</a></p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>HATA:</strong> " . $e->getMessage() . "</p>";
}

$rlDb->connectionClose();
?> 