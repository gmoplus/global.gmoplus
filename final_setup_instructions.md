# 🎯 FLYNAX "TEKLİF AL" PLUGİN KURULUM REHBERİ

## ✅ Plugin Başarıyla Oluşturuldu!

Plugin dosyaları `plugins/quoteRequest/` klasöründe hazır.

## 📋 KURULUM ADIMLARI

### 1. Dosyaları Kontrol Edin
Şu dosyaların oluştuğunu kontrol edin:
```
plugins/quoteRequest/
├── install.xml
├── rlQuoteRequest.class.php
├── quote_button.tpl
├── quote_form.tpl
├── admin/
│   ├── quote_requests.inc.php
│   └── quote_requests.tpl
├── static/
│   ├── quote_request.css
│   └── quote_request.js
└── languages/
    ├── English(EN).xml
    └── Turkish(TR).xml
```

### 2. Plugin Yükleme (Admin Panel)
1. **Admin paneline giriş yapın**: https://global.gmoplus.com/admin/
2. **Plugins** bölümüne gidin
3. **"Quote Request System"** plugin'ini bulun
4. **Install** butonuna tıklayın
5. **Activate** ile aktifleştirin

### 3. Plugin Ayarları
**Plugins > Quote Request Settings** bölümünden:
- ✅ **Enable Quote Requests**: Aktif
- ✅ **Admin Email**: admin@gmoplus.com (veya istediğiniz email)
- ✅ **Max File Size**: 5 MB
- ✅ **Allowed File Types**: pdf,doc,docx,xls,xlsx

### 4. Test Etme
1. Herhangi bir **ilan detay sayfasına** gidin
2. **"Teklif Al"** butonunu göreceksiniz
3. Butona tıklayıp **formu doldurun**
4. **Dosya yükleyip** test edin
5. **Email bildirimlerini** kontrol edin

## 🎯 ÖZELLİKLER

### 📱 Frontend (Kullanıcı Tarafı)
- ✅ İlan detay sayfasında **"Teklif Al"** butonu
- ✅ **Modal popup** form
- ✅ **Dosya yükleme** desteği (PDF, DOC, XLS)
- ✅ **Responsive** tasarım
- ✅ **Türkçe/İngilizce** dil desteği

### 🔧 Backend (Admin Tarafı)
- ✅ **Admin > Quote Requests** yönetim paneli
- ✅ Talepleri **görüntüleme, filtreleme**
- ✅ **Cevap verme** sistemi
- ✅ **Excel export** özelliği
- ✅ **Email bildirimleri**

### 📧 Email Bildirimleri
- ✅ **Yeni talep**: Satıcıya + Admin'e email
- ✅ **Cevap**: Talep sahibine email
- ✅ **Ek dosya** bilgisi dahil

## 🚀 KULLANIM

### Kullanıcı Deneyimi:
1. Kullanıcı ilan sayfasında **"Teklif Al"** butonunu görür
2. **Giriş yapmış** olması gerekir
3. **Form açılır**: Ad-soyad, email, telefon, pozisyon, açıklama
4. **İsteğe bağlı dosya** yükleyebilir
5. **Teklif gönderir**

### Satıcı Deneyimi:
1. **Email bildirimi** alır
2. **Admin panelinden** talebi görür
3. **Cevap verebilir**
4. **Durumu güncelleyebilir** (Read, Replied, Closed)

### Admin Deneyimi:
1. **Tüm talepleri** görebilir
2. **Filtreyebilir** (durum, satıcı)
3. **Excel'e export** edebilir
4. **Email ayarlarını** yönetebilir

## 🔧 ADVANCED KURULUM

Eğer manuel kurulum yapmak isterseniz:

```bash
# Canlı sunucuda
php create_quote_request_plugin.php
php create_admin_controller.php
```

## ❗ SORUN GİDERME

### Plugin görünmüyorsa:
- Dosya izinlerini kontrol edin (755)
- install.xml dosyasının doğru oluştuğunu kontrol edin

### Email gitmiyorsa:
- SMTP ayarlarını kontrol edin
- Admin email adresini doğru yazdığınızdan emin olun

### Dosya yüklenmiyorsa:
- `files/quote_requests/` klasörünün yazılabilir olduğunu kontrol edin
- PHP upload_max_filesize ayarını kontrol edin

### Form çalışmıyorsa:
- JavaScript hatalarını browser console'dan kontrol edin
- jQuery'nin yüklendiğinden emin olun

## 🎉 BAŞARILI!

Plugin artık kullanıma hazır. Kullanıcılar ilan detay sayfalarında "Teklif Al" butonunu görebilir ve teklif talep edebilirler. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 