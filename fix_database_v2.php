<?php
// Database Fix Script for Quote Requests Controller - V2 (Corrected)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/config.inc.php';
require_once RL_CLASSES . 'rlDb.class.php';

$rlDb = new rlDb();
$rlDb->connect(RL_DBHOST, RL_DBPORT, RL_DBUSER, RL_DBPASS, RL_DBNAME);

echo "<h2>Database Fix for Quote Requests Admin Controller - V2</h2>\n";

try {
    // ADIM 1: Eski kayıtları sil
    echo "<p>ADIM 1: Eski kayıtları siliniyor...</p>\n";
    $delete1 = $rlDb->query("DELETE FROM `{db_prefix}admin_controllers` WHERE `Key` = 'quote_requests'");
    echo $delete1 ? "✓ Admin controllers kayıtları silindi<br>" : "✗ Hata: Admin controllers silinemedi<br>";

    // ADIM 2: Yeni kayıt ekle
    echo "<p>ADIM 2: Yeni controller kaydı ekleniyor...</p>\n";
    $insert1 = $rlDb->query("INSERT INTO `{db_prefix}admin_controllers` (`Parent_ID`, `Position`, `Key`, `Controller`) VALUES (2, 99, 'quote_requests', 'quote_requests')");
    echo $insert1 ? "✓ Admin controller kaydı eklendi<br>" : "✗ Hata: Admin controller eklenemedi<br>";

    // ADIM 3: Mevcut dil anahtarlarını temizle
    echo "<p>ADIM 3: Eski dil anahtarları temizleniyor...</p>\n";
    $delete_lang = $rlDb->query("DELETE FROM `{db_prefix}lang_keys` WHERE `Key` = 'admin_controllers+name+quote_requests'");
    echo "- Eski dil anahtarları temizlendi<br>";

    // ADIM 4: Türkçe dil kaydı ekle
    echo "<p>ADIM 4: Türkçe dil kaydı ekleniyor...</p>\n";
    $insert_tr = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Code`, `Module`, `Key`, `Value`, `Status`) VALUES ('turkish', 'admin', 'admin_controllers+name+quote_requests', 'Teklif Talepleri', 'active')");
    echo $insert_tr ? "✓ Türkçe dil kaydı eklendi<br>" : "✗ Hata: Türkçe dil kaydı eklenemedi<br>";

    // ADIM 5: İngilizce dil kaydı ekle
    echo "<p>ADIM 5: İngilizce dil kaydı ekleniyor...</p>\n";
    $insert_en = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Code`, `Module`, `Key`, `Value`, `Status`) VALUES ('english', 'admin', 'admin_controllers+name+quote_requests', 'Quote Requests', 'active')");
    echo $insert_en ? "✓ İngilizce dil kaydı eklendi<br>" : "✗ Hata: İngilizce dil kaydı eklenemedi<br>";

    // ADIM 6: Diğer gerekli dil anahtarları
    echo "<p>ADIM 6: Ek dil anahtarları ekleniyor...</p>\n";
    
    $extra_phrases = [
        ['turkish', 'admin', 'quote_requests', 'Teklif Talepleri'],
        ['english', 'admin', 'quote_requests', 'Quote Requests'],
        ['turkish', 'admin', 'quote_requests_management', 'Teklif Talepleri Yönetimi'],
        ['english', 'admin', 'quote_requests_management', 'Quote Requests Management'],
        ['turkish', 'admin', 'quote_deleted', 'Teklif silindi'],
        ['english', 'admin', 'quote_deleted', 'Quote deleted'],
        ['turkish', 'admin', 'quote_invalid_data', 'Geçersiz veri'],
        ['english', 'admin', 'quote_invalid_data', 'Invalid data']
    ];

    foreach ($extra_phrases as $phrase) {
        $check = $rlDb->getOne('ID', "`Code` = '{$phrase[0]}' AND `Key` = '{$phrase[2]}'", 'lang_keys');
        if (!$check) {
            $insert_phrase = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Code`, `Module`, `Key`, `Value`, `Status`) VALUES ('{$phrase[0]}', '{$phrase[1]}', '{$phrase[2]}', '{$phrase[3]}', 'active')");
            echo $insert_phrase ? "✓ {$phrase[2]} ({$phrase[0]}) eklendi<br>" : "✗ {$phrase[2]} ({$phrase[0]}) eklenemedi<br>";
        } else {
            echo "- {$phrase[2]} ({$phrase[0]}) zaten mevcut<br>";
        }
    }

    // ADIM 7: Sonucu kontrol et
    echo "<p>ADIM 7: Kayıt kontrolü...</p>\n";
    $controller_result = $rlDb->getRow("SELECT * FROM `{db_prefix}admin_controllers` WHERE `Key` = 'quote_requests'");
    
    if ($controller_result) {
        echo "✓ <strong>Controller kaydı BAŞARILI!</strong><br>";
        echo "ID: {$controller_result['ID']}<br>";
        echo "Key: {$controller_result['Key']}<br>";
        echo "Controller: {$controller_result['Controller']}<br>";
        echo "Parent_ID: {$controller_result['Parent_ID']}<br>";
    }

    $lang_result = $rlDb->getAll("SELECT `Code`, `Key`, `Value` FROM `{db_prefix}lang_keys` WHERE `Key` = 'admin_controllers+name+quote_requests'");
    
    if ($lang_result) {
        echo "✓ <strong>Dil kayıtları BAŞARILI!</strong><br>";
        foreach ($lang_result as $lang_row) {
            echo "- {$lang_row['Code']}: {$lang_row['Value']}<br>";
        }
    }
    
    echo "<hr>";
    echo "<p><strong>✅ TÜM İŞLEMLER TAMAMLANDI!</strong></p>";
    echo "<p>Şimdi admin paneline gidin ve quote requests sayfasını deneyin:</p>";
    echo "<p><a href='admin/index.php?controller=quote_requests' target='_blank' style='background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>🔗 Admin Quote Requests Sayfasını Aç</a></p>";
    
    // ADIM 8: Cache temizle önerisi
    echo "<p><em>Not: Eğer hala çalışmıyorsa, admin panelinde cache'i temizleyin.</em></p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'><strong>HATA:</strong> " . $e->getMessage() . "</p>";
}

$rlDb->connectionClose();
?> 