<?php
// Admin Quote Requests Dil Anahtarları Kurulumu
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

echo '<h1>Admin Panel Dil Anahtarları Kurulumu</h1>';

// Türkçe dil anahtarları
$tr_keys = array(
    'quote_requests' => 'Teklif Talepleri',
    'quote_status_new' => 'Yeni',
    'quote_status_in_progress' => 'İşlemde',
    'quote_status_replied' => 'Cevaplandı',
    'quote_status_closed' => 'Kapalı',
    'quote_status_updated' => 'Durum güncellendi',
    'quote_status_update_failed' => 'Durum güncellenemedi',
    'quotes_deleted' => 'Teklif talepleri silindi',
    'quotes_delete_failed' => 'Silme işlemi başarısız',
    'quote_not_found' => 'Teklif talebi bulunamadı'
);

// İngilizce dil anahtarları
$en_keys = array(
    'quote_requests' => 'Quote Requests',
    'quote_status_new' => 'New',
    'quote_status_in_progress' => 'In Progress',
    'quote_status_replied' => 'Replied',
    'quote_status_closed' => 'Closed',
    'quote_status_updated' => 'Status updated',
    'quote_status_update_failed' => 'Status update failed',
    'quotes_deleted' => 'Quote requests deleted',
    'quotes_delete_failed' => 'Delete operation failed',
    'quote_not_found' => 'Quote request not found'
);

echo '<h2>Türkçe Dil Anahtarları Ekleniyor...</h2>';
foreach ($tr_keys as $key => $value) {
    // Önce kontrol et, varsa güncelle
    $exists = $rlDb->getOne('ID', "`Code` = 'tr' AND `Module` = 'admin' AND `Key` = '{$key}'", 'lang_keys');
    
    if ($exists) {
        $update = $rlDb->query("UPDATE `{db_prefix}lang_keys` SET `Value` = '{$rlDb->escape($value)}' WHERE `ID` = {$exists}");
        echo "✅ Güncellendi: {$key} = {$value}<br>";
    } else {
        $insert = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Code`, `Module`, `Key`, `Value`, `Plugin`) VALUES ('tr', 'admin', '{$key}', '{$rlDb->escape($value)}', '')");
        if ($insert) {
            echo "✅ Eklendi: {$key} = {$value}<br>";
        } else {
            echo "❌ Hata: {$key}<br>";
        }
    }
}

echo '<h2>İngilizce Dil Anahtarları Ekleniyor...</h2>';
foreach ($en_keys as $key => $value) {
    // Önce kontrol et, varsa güncelle
    $exists = $rlDb->getOne('ID', "`Code` = 'en' AND `Module` = 'admin' AND `Key` = '{$key}'", 'lang_keys');
    
    if ($exists) {
        $update = $rlDb->query("UPDATE `{db_prefix}lang_keys` SET `Value` = '{$rlDb->escape($value)}' WHERE `ID` = {$exists}");
        echo "✅ Güncellendi: {$key} = {$value}<br>";
    } else {
        $insert = $rlDb->query("INSERT INTO `{db_prefix}lang_keys` (`Code`, `Module`, `Key`, `Value`, `Plugin`) VALUES ('en', 'admin', '{$key}', '{$rlDb->escape($value)}', '')");
        if ($insert) {
            echo "✅ Eklendi: {$key} = {$value}<br>";
        } else {
            echo "❌ Hata: {$key}<br>";
        }
    }
}

echo '<h2>✅ Kurulum Tamamlandı!</h2>';
echo '<p><a href="admin/index.php?controller=quote_requests" target="_blank">Admin Paneli - Teklif Talepleri</a></p>';
echo '<p>Artık admin panelinden teklif taleplerini yönetebilirsiniz.</p>';
?> 