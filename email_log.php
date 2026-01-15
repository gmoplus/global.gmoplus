<?php
// Email Log Görüntüleme Sayfası
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Log - GMOPlus</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .log-box { background: #f5f5f5; padding: 15px; border-radius: 5px; }
        .refresh { background: #ff6b35; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px; }
        .status { padding: 10px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
        h1 { color: #333; }
        table { border-collapse: collapse; margin: 10px 0; }
        table td { padding: 8px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>📧 Email Log Görüntüleyici</h1>
    
    <p><a href="email_log.php" class="refresh">🔄 Yenile</a></p>
    
    <div class="status info">
        <h3>📧 Email Ayarları Kontrol:</h3>
        <table>
            <tr><td><strong>Site Main Email:</strong></td><td><?php echo $config['site_main_email'] ?: 'Tanımsız'; ?></td></tr>
            <tr><td><strong>Owner Name:</strong></td><td><?php echo $config['owner_name'] ?: 'Tanımsız'; ?></td></tr>
            <tr><td><strong>Mail Method:</strong></td><td><?php echo $config['mail_method'] ?: 'Tanımsız'; ?></td></tr>
            <?php if ($config['mail_method'] == 'smtp'): ?>
            <tr><td><strong>SMTP Server:</strong></td><td><?php echo $config['smtp_server'] ?: 'Tanımsız'; ?></td></tr>
            <tr><td><strong>SMTP Username:</strong></td><td><?php echo $config['smtp_username'] ?: 'Tanımsız'; ?></td></tr>
            <tr><td><strong>SMTP Method:</strong></td><td><?php echo $config['smtp_method'] ?: 'Tanımsız'; ?></td></tr>
            <?php endif; ?>
        </table>
    </div>
    
    <?php
    $log_file = RL_ROOT . 'files/quote_email_log.txt';
    
    if (file_exists($log_file)) {
        $log_content = file_get_contents($log_file);
        
        if (!empty(trim($log_content))) {
            echo '<div class="log-box">';
            echo '<h3>📝 Email Gönderim Logları:</h3>';
            echo '<pre>' . htmlspecialchars($log_content) . '</pre>';
            echo '</div>';
            
            // Son satırları analiz et
            $lines = explode("\n", trim($log_content));
            $recent_lines = array_slice($lines, -10); // Son 10 satır
            
            $success_count = 0;
            $fail_count = 0;
            
            foreach ($recent_lines as $line) {
                if (strpos($line, 'Başarılı') !== false) {
                    $success_count++;
                } elseif (strpos($line, 'Başarısız') !== false) {
                    $fail_count++;
                }
            }
            
            echo '<div class="status success">';
            echo "✅ Son aktivitede {$success_count} başarılı email gönderimi";
            echo '</div>';
            
            if ($fail_count > 0) {
                echo '<div class="status error">';
                echo "❌ Son aktivitede {$fail_count} başarısız email gönderimi";
                echo '</div>';
            }
            
        } else {
            echo '<div class="status error">📝 Log dosyası boş.</div>';
        }
    } else {
        echo '<div class="status error">📝 Henüz log dosyası oluşmamış. Bir teklif talebi gönderin.</div>';
    }
    ?>
    
    <hr>
    <h3>🧪 Email Sistemi Test Etmek İçin:</h3>
    <ol>
        <li>Bir ilan sayfasına git</li>
        <li>"TEKLİF AL" butonuna tıkla</li>
        <li>Formu doldur ve gönder</li>
        <li>Bu sayfayı yenile ve log'u kontrol et</li>
    </ol>
    
    <p style="margin-top: 30px; font-size: 12px; color: #666;">
        Son güncelleme: <?php echo date('Y-m-d H:i:s'); ?>
    </p>
</body>
</html> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 