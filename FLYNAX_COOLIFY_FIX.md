# Flynax Coolify Sorun Giderme ve Çözüm Rehberi

Bu dosya, Flynax yazılımının Coolify üzerinde çalışırken karşılaştığı "Admin Giriş Yapamama", "Session Hatası", "502 Bad Gateway" ve "SSL Döngüsü" sorunlarını tek seferde çözmek için hazırlanmış komut listesidir.

Diğer domainlerde bu adımları sırasıyla uygulayarak sorunları çözebilirsiniz.

---

## 1. Adım: Config Düzeltmesi (SSL ve Session)
Bu adım en kritik adımdır. Hem "Giriş yapamıyorum" sorununu (Session yolu) hem de "Sayfa 502 veriyor" sorununu (SSL Proxy) çözer.

**Terminal Komutu (Kopyala/Yapıştır):**
```bash
sed -i "s|<?php|<?php\n\n// Session ve SSL Fix\nini_set('session.save_path', '/tmp');\nif (isset(\$_SERVER['HTTP_X_FORWARDED_PROTO']) \&\& \$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') { \$_SERVER['HTTPS'] = 'on'; }|g" /var/www/html/includes/config.inc.php && echo "✅ Config Düzeltildi"
```
*Bu komut config dosyasının en başına gerekli ayarları ekler.*

---

## 2. Adım: Klasör İzinleri
Session dosyalarının yazılabilmesi için `/tmp` klasörünün izinlerini garantiye alın.

**Terminal Komutu:**
```bash
chmod 1777 /tmp && echo "✅ Izinler Verildi"
```

---

## 3. Adım: Admin Şifresini Sıfırlama
Eğer eski şifre çalışmıyorsa, veritabanından `admin` kullanıcısının şifresini `123456` (MD5) olarak günceller.

**Terminal Komutu:**
```bash
php -r "
try {
    \$pdo = new PDO('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASSWORD'));
    \$pdo->exec(\"UPDATE fl_admins SET Pass = MD5('123456') WHERE User = 'admin'\");
    echo '✅ Admin sifresi 123456 olarak guncellendi!';
} catch (Exception \$e) {
    echo '❌ Hata: ' . \$e->getMessage();
}
"
```
*DİKKAT: Eğer veritabanındaki kullanıcı adınız `admin` değil de `Admin` veya başka bir şey ise, komuttaki `WHERE User = 'admin'` kısmını ona göre değiştirin.*

---

## 4. Adım: Coolify Ayarları (Panelden Yapılacak)
Coolify panelinde **Environment Variables** kısmını kontrol edin:

*   **PORT:** `80` (Mutlaka olmalı, yoksa site açılmaz)
*   **DB_NAME:** `default` (Eğer veritabanı import edilirken default kullanıldıysa)
*   **APP_URL:** `https://siteniz.com`

---

## 5. Adım: Son Kontrol (.htaccess)
Eğer site hala 500 hatası veriyorsa, `.htaccess` dosyasındaki cPanel kalıntılarını (php_value, vb.) temizleyin.

**Basit Temizlik Komutu:**
```bash
grep -v "php_" /var/www/html/.htaccess > /var/www/html/.htaccess.temp && mv /var/www/html/.htaccess.temp /var/www/html/.htaccess && echo "✅ .htaccess Temizlendi"
```
