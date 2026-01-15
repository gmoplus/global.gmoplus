<?php
// SMTP Bağlantı Testi
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

echo '<h1>SMTP Bağlantı Testi</h1>';

// SMTP ayarlarını göster
echo '<h2>SMTP Ayarları:</h2>';
echo '<pre>';
echo 'SMTP Server: ' . $config['smtp_server'] . "\n";
echo 'SMTP Username: ' . $config['smtp_username'] . "\n";
echo 'SMTP Method: ' . $config['smtp_method'] . "\n";
echo 'Mail Method: ' . $config['mail_method'] . "\n";
echo '</pre>';

// PHPMailer ile SMTP testi
echo '<h2>SMTP Bağlantı Testi:</h2>';

try {
    $reefless->loadClass('Mail');
    
    // Debug modunu aç
    $rlMail->smtpDebug = true;
    
    // Test email gönder
    $mail_tpl = array(
        'subject' => 'SMTP Test - ' . date('Y-m-d H:i:s'),
        'body' => 'Bu bir SMTP test emailidir. Eğer bu emaili aldıysanız, SMTP ayarlarınız doğru çalışıyor.',
        'Type' => 'plain'
    );
    
    // Kendinize test emaili gönderin
    $test_email = 'alpgurle1@gmail.com'; // Test email adresiniz
    
    echo '<pre>';
    echo "Test email gönderiliyor: $test_email\n\n";
    
    // Output buffer başlat
    ob_start();
    $result = $rlMail->send($mail_tpl, $test_email);
    $debug_output = ob_get_clean();
    
    echo "Debug Output:\n";
    echo htmlspecialchars($debug_output);
    echo "\n\nSonuç: " . ($result ? 'BAŞARILI' : 'BAŞARISIZ') . "\n";
    echo '</pre>';
    
    // PHPMailer error info
    if (!$result && isset($rlMail->phpMailer)) {
        echo '<h3>PHPMailer Error:</h3>';
        echo '<pre>' . htmlspecialchars($rlMail->phpMailer->ErrorInfo) . '</pre>';
    }
    
} catch (Exception $e) {
    echo '<div style="color: red;">Hata: ' . $e->getMessage() . '</div>';
}

// Alternatif: Doğrudan PHPMailer testi
echo '<h2>Doğrudan PHPMailer Testi:</h2>';

try {
    require_once RL_LIBS . 'phpmailer/src/PHPMailer.php';
    require_once RL_LIBS . 'phpmailer/src/SMTP.php';
    require_once RL_LIBS . 'phpmailer/src/Exception.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
    // Debug output
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    
    // Server settings
    $mail->isSMTP();
    
    // SMTP server'ı parse et
    preg_match('#(https?://)?([^:]+):?(\d+)?#smi', $config['smtp_server'], $smtp_parts);
    $mail->Host = $smtp_parts[2];
    $mail->Port = $smtp_parts[3] ?: 465;
    
    $mail->SMTPSecure = $config['smtp_method']; // ssl
    $mail->SMTPAuth = true;
    $mail->Username = $config['smtp_username'];
    $mail->Password = $config['smtp_password'];
    
    // Recipients
    $mail->setFrom($config['site_main_email'], $config['owner_name']);
    $mail->addAddress('alpgurle1@gmail.com'); // Test email
    
    // Content
    $mail->isHTML(false);
    $mail->Subject = 'PHPMailer SMTP Test';
    $mail->Body = 'Bu doğrudan PHPMailer ile gönderilen test emailidir.';
    
    echo '<pre>';
    $mail->send();
    echo '</pre>';
    echo '<div style="color: green;">Email başarıyla gönderildi!</div>';
    
} catch (Exception $e) {
    echo '<div style="color: red;">PHPMailer Hatası: ' . $mail->ErrorInfo . '</div>';
    echo '<div style="color: red;">Exception: ' . $e->getMessage() . '</div>';
}
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 