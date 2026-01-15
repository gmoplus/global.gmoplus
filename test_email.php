<?php
// Email Test Sayfası
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

// Basit güvenlik - sadece admin erişimi
session_start();
// Email test sayfası herkese açık (geçici)

echo '<h1>📧 Email Test Sistemi</h1>';

// Test email gönder
if (isset($_POST['test_email'])) {
    $test_email = trim($_POST['test_email']);
    
    if (filter_var($test_email, FILTER_VALIDATE_EMAIL)) {
        $reefless->loadClass('Mail');
        
        $mail_tpl = array(
            'subject' => 'Test Email - GMOPlus',
            'body' => 'Bu bir test emailidir. Eğer bu emaili aldıysanız, email sistemi çalışıyor demektir!<br><br>Tarih: ' . date('Y-m-d H:i:s'),
            'Type' => 'html'
        );
        
        $result = $GLOBALS['rlMail']->send($mail_tpl, $test_email);
        
        if ($result) {
            echo '<div style="color: green; font-weight: bold;">✅ Test email başarıyla gönderildi!</div>';
        } else {
            echo '<div style="color: red; font-weight: bold;">❌ Email gönderilemedi!</div>';
        }
    } else {
        echo '<div style="color: red;">❌ Geçerli email adresi giriniz!</div>';
    }
}

// Email konfigürasyonunu göster
echo '<h2>📋 Email Konfigürasyonu</h2>';
echo '<table border="1" cellpadding="5">';
echo '<tr><td><strong>Mail Method:</strong></td><td>' . ($config['mail_method'] ?: 'Tanımsız') . '</td></tr>';
echo '<tr><td><strong>Site Main Email:</strong></td><td>' . ($config['site_main_email'] ?: 'Tanımsız') . '</td></tr>';
echo '<tr><td><strong>Owner Name:</strong></td><td>' . ($config['owner_name'] ?: 'Tanımsız') . '</td></tr>';

if ($config['mail_method'] == 'smtp') {
    echo '<tr><td><strong>SMTP Server:</strong></td><td>' . ($config['smtp_server'] ?: 'Tanımsız') . '</td></tr>';
    echo '<tr><td><strong>SMTP Username:</strong></td><td>' . ($config['smtp_username'] ?: 'Tanımsız') . '</td></tr>';
    echo '<tr><td><strong>SMTP Method:</strong></td><td>' . ($config['smtp_method'] ?: 'Tanımsız') . '</td></tr>';
}
echo '</table>';

// Test email formu
echo '<h2>🧪 Test Email Gönder</h2>';
echo '<form method="post">';
echo '<input type="email" name="test_email" placeholder="test@example.com" required style="padding: 10px; width: 300px;">';
echo '<button type="submit" style="padding: 10px 20px; background: #ff6b35; color: white; border: none;">Test Email Gönder</button>';
echo '</form>';

// Log dosyası göster
echo '<h2>📝 Email Log</h2>';
$log_file = RL_ROOT . 'files/quote_email_log.txt';
if (file_exists($log_file)) {
    echo '<pre style="background: #f5f5f5; padding: 10px; height: 300px; overflow-y: scroll;">';
    echo htmlspecialchars(file_get_contents($log_file));
    echo '</pre>';
    echo '<p><a href="?clear_log=1" onclick="return confirm(\'Log dosyasını temizlemek istediğinizden emin misiniz?\')">🗑️ Log\'u Temizle</a></p>';
} else {
    echo '<p>Henüz log dosyası oluşmamış. Bir teklif talebi gönderin.</p>';
}

// Log temizle
if (isset($_GET['clear_log'])) {
    file_put_contents($log_file, '');
    echo '<script>alert("Log temizlendi!"); window.location.href="test_email.php";</script>';
}
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
table { border-collapse: collapse; }
td { padding: 8px; }
</style> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 