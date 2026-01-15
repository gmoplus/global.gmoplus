<?php
// Basit Mail Testi
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<h1>Basit Mail() Fonksiyonu Testi</h1>';

$to = 'alpgurle1@gmail.com';
$subject = 'Test Email - ' . date('Y-m-d H:i:s');
$message = 'Bu basit mail() fonksiyonu ile gönderilen test emailidir.';
$headers = 'From: info@gmoplus.com' . "\r\n" .
    'Reply-To: info@gmoplus.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

echo '<pre>';
echo "To: $to\n";
echo "Subject: $subject\n";
echo "From: info@gmoplus.com\n\n";

if (mail($to, $subject, $message, $headers)) {
    echo '<span style="color: green;">✅ Email başarıyla gönderildi!</span>';
} else {
    echo '<span style="color: red;">❌ Email gönderilemedi!</span>';
    
    // Error log kontrol
    $error = error_get_last();
    if ($error) {
        echo "\n\nHata detayı:\n";
        print_r($error);
    }
}
echo '</pre>';

// PHP mail konfigürasyonu
echo '<h2>PHP Mail Konfigürasyonu:</h2>';
echo '<pre>';
echo 'sendmail_path: ' . ini_get('sendmail_path') . "\n";
echo 'SMTP: ' . ini_get('SMTP') . "\n";
echo 'smtp_port: ' . ini_get('smtp_port') . "\n";
echo 'mail.add_x_header: ' . ini_get('mail.add_x_header') . "\n";
echo '</pre>';

// Alternatif: Config'den mail_method kontrolü
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

echo '<h2>Flynax Mail Method:</h2>';
echo '<pre>';
echo 'mail_method: ' . $config['mail_method'] . "\n";
echo '</pre>';

if ($config['mail_method'] != 'smtp') {
    echo '<div style="background: #fffbcc; padding: 10px; border: 1px solid #e6db55;">';
    echo '<strong>Not:</strong> Sistem SMTP yerine "' . $config['mail_method'] . '" kullanıyor. ';
    echo 'SMTP kullanmak için admin panelden mail_method ayarını "smtp" olarak değiştirin.';
    echo '</div>';
}
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 