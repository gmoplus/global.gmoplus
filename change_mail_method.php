<?php
// Mail Method Değiştirme
require_once 'includes/config.inc.php';
require_once 'includes/control.inc.php';

echo '<h1>Mail Method Değiştirme</h1>';

// Mevcut ayarı göster
echo '<p>Mevcut mail_method: <strong>' . $config['mail_method'] . '</strong></p>';

if (isset($_POST['change'])) {
    // Mail metodunu değiştir
    $new_method = $_POST['mail_method'];
    
    $update = $rlDb->query("UPDATE `{db_prefix}config` SET `Default` = '{$new_method}' WHERE `Key` = 'mail_method'");
    
    if ($update) {
        echo '<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">';
        echo '✅ Mail method başarıyla <strong>' . $new_method . '</strong> olarak değiştirildi!';
        echo '</div>';
        
        // Cache temizle
        $rlCache->updateConfig();
        
        echo '<p><a href="test_email.php">Email Test Sayfasına Git</a></p>';
    } else {
        echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;">';
        echo '❌ Değişiklik yapılamadı!';
        echo '</div>';
    }
}
?>

<form method="post" style="margin-top: 20px;">
    <h3>Mail Method Seçin:</h3>
    <label>
        <input type="radio" name="mail_method" value="mail" <?php echo $config['mail_method'] == 'mail' ? 'checked' : ''; ?>>
        <strong>mail</strong> - PHP mail() fonksiyonu (Önerilen - test edildi ve çalışıyor)
    </label><br><br>
    
    <label>
        <input type="radio" name="mail_method" value="smtp" <?php echo $config['mail_method'] == 'smtp' ? 'checked' : ''; ?>>
        <strong>smtp</strong> - SMTP sunucu üzerinden (şu an şifre hatası veriyor)
    </label><br><br>
    
    <button type="submit" name="change" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        Mail Method Değiştir
    </button>
</form>

<hr>

<h3>SMTP Şifre Sorunu:</h3>
<p>Eğer SMTP kullanmak istiyorsanız:</p>
<ol>
    <li>cPanel/Hosting panelinden email şifresini sıfırlayın</li>
    <li>Yeni şifreyi buradan güncelleyin</li>
    <li>Özel karakterler içermeyen basit bir şifre kullanın</li>
</ol>

<?php if ($config['mail_method'] == 'smtp'): ?>
<h3>SMTP Şifre Güncelleme:</h3>
<form method="post">
    <label>Yeni SMTP Şifresi:</label><br>
    <input type="password" name="smtp_password" style="width: 300px; padding: 5px;"><br><br>
    <button type="submit" name="update_password" style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        SMTP Şifresini Güncelle
    </button>
</form>

<?php
if (isset($_POST['update_password']) && $_POST['smtp_password']) {
    $new_password = $rlDb->escape($_POST['smtp_password']);
    $update = $rlDb->query("UPDATE `{db_prefix}config` SET `Default` = '{$new_password}' WHERE `Key` = 'smtp_password'");
    
    if ($update) {
        $rlCache->updateConfig();
        echo '<p style="color: green;">✅ SMTP şifresi güncellendi!</p>';
    }
}
?>
<?php endif; ?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 