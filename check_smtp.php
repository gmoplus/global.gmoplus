<?php
// SMTP Ayarları Kontrol
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

echo '<h1>SMTP Ayarları Kontrol</h1>';

// Tüm SMTP ayarlarını göster
echo '<h2>Veritabanındaki SMTP Ayarları:</h2>';
$smtp_configs = $rlDb->getAll("SELECT * FROM `{db_prefix}config` WHERE `Key` LIKE 'smtp%' OR `Key` IN ('mail_method', 'site_main_email', 'owner_name')");

echo '<table border="1" cellpadding="5">';
echo '<tr><th>Key</th><th>Value</th></tr>';
foreach ($smtp_configs as $conf) {
    echo '<tr>';
    echo '<td>' . $conf['Key'] . '</td>';
    echo '<td>' . htmlspecialchars($conf['Default']) . '</td>';
    echo '</tr>';
}
echo '</table>';

// Eksik SMTP server ayarı varsa ekle
$smtp_server_exists = $rlDb->getOne('ID', "`Key` = 'smtp_server'", 'config');
if (!$smtp_server_exists) {
    echo '<h3 style="color: red;">SMTP Server ayarı eksik! Ekleniyor...</h3>';
    
    // SMTP server ayarını ekle
    $insert = array(
        'Group_ID' => 3, // Email group
        'Position' => 5,
        'Key' => 'smtp_server',
        'Default' => 'mail.gmoplus.com:587', // Varsayılan değer
        'Type' => 'text',
        'Data_type' => 'varchar'
    );
    
    if ($rlDb->insertOne($insert, 'config')) {
        echo '<p style="color: green;">✅ SMTP Server ayarı eklendi!</p>';
    } else {
        echo '<p style="color: red;">❌ SMTP Server ayarı eklenemedi!</p>';
    }
}

// SMTP method ayarı kontrol et
$smtp_method_exists = $rlDb->getOne('ID', "`Key` = 'smtp_method'", 'config');
if (!$smtp_method_exists) {
    echo '<h3 style="color: red;">SMTP Method ayarı eksik! Ekleniyor...</h3>';
    
    $insert = array(
        'Group_ID' => 3,
        'Position' => 6,
        'Key' => 'smtp_method',
        'Default' => 'tls',
        'Type' => 'select',
        'Values' => 'plain,tls,ssl',
        'Data_type' => 'varchar'
    );
    
    if ($rlDb->insertOne($insert, 'config')) {
        echo '<p style="color: green;">✅ SMTP Method ayarı eklendi!</p>';
    } else {
        echo '<p style="color: red;">❌ SMTP Method ayarı eklenemedi!</p>';
    }
}

echo '<hr>';
echo '<a href="test_email.php">Email Test Sayfasına Git</a> | ';
echo '<a href="email_log.php">Email Log Sayfasına Git</a>';
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 