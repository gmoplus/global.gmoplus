# 📦 PLUGIN ZİP OLUŞTURMA VE TEST REHBERİ

## 🎯 MEVCUT DURUM
✅ 2 Plugin Hazır:
- `plugins/quoteRequest/` (Task 1 - Teklif Al Sistemi)
- `plugins/globalCategoryPriceHider/` (Task 2 - Fiyat Alanı Gizleyici)

## 📦 ZIP OLUŞTURMA ADIMLARI

### 1️⃣ Manuel Zip (Windows)
```bash
# plugins klasörüne git
cd C:\laragon\www\global.gmoplus\plugins

# Her plugin'i ayrı ayrı zipla:
# Sağ tık → "Send to" → "Compressed (zipped) folder"

# Ya da PowerShell ile:
Compress-Archive -Path "quoteRequest\*" -DestinationPath "quoteRequest.zip"
Compress-Archive -Path "globalCategoryPriceHider\*" -DestinationPath "globalCategoryPriceHider.zip"
```

### 2️⃣ Manuel Dosya Seçimi
1. **File Explorer ile plugins klasörüne git**
2. **quoteRequest klasörünü seç → Sağ tık → Send to → Compressed folder**
3. **globalCategoryPriceHider klasörünü seç → Sağ tık → Send to → Compressed folder**

## 📁 HAZIR PLUGIN DOSYALARI

### Quote Request Plugin:
```
plugins/quoteRequest/
├── install.xml                    (Plugin tanımları)
├── rlQuoteRequest.class.php       (Ana PHP sınıfı)
├── quote_button.tpl               (Teklif Al butonu)
├── quote_form.tpl                 (Teklif formu)
├── static/
│   ├── quote_request.css          (CSS stilleri)
│   └── quote_request.js           (JavaScript)
├── admin/
│   ├── quote_requests.inc.php     (Admin kontrolcü)
│   └── quote_requests.tpl         (Admin template)
└── languages/
    ├── English(EN).xml            (İngilizce dil)
    └── Turkish(TR).xml            (Türkçe dil)
```

### Global Price Hider Plugin:
```
plugins/globalCategoryPriceHider/
├── install.xml                           (Plugin tanımları)
├── rlGlobalCategoryPriceHider.class.php  (Ana PHP sınıfı)
└── static/
    ├── price_hider.css                   (CSS gizleme)
    └── price_hider.js                    (JavaScript mantığı)
```

## 🚀 KURULUM ADIMLARI

### Adım 1: Zip Dosyalarını Oluştur
1. Her iki plugin klasörünü zipla
2. Zip dosyalarını masaüstüne kaydet

### Adım 2: Admin Panel'e Git
```
https://global.gmoplus.com/admin/
```

### Adım 3: Plugin Yükleme
1. **Admin Panel** → **Plugins** bölümüne git
2. **"Upload Plugin"** butonuna tıkla
3. **quoteRequest.zip** dosyasını seç ve yükle
4. **Install** butonuna tıkla
5. **Activate** ile aktifleştir
6. Aynı işlemi **globalCategoryPriceHider.zip** için tekrarla

## 🧪 TEST ADIMLARI

### Test 1: Quote Request (Teklif Al)
1. **Frontend'e git:** `https://global.gmoplus.com`
2. **Herhangi bir ilan detay sayfasına** git
3. **"Teklif Al" butonu** görünüyor mu? ✅
4. **Butona tıkla** → Form açılıyor mu? ✅
5. **Formu doldur ve gönder** ✅
6. **Admin panel** → **Quote Requests** → Talep geldi mi? ✅

### Test 2: Global Price Hider (Fiyat Gizleme)
1. **Admin panel** → **Add Listing** git
2. **Global kategorisini seç** 
3. **Fiyat alanları gizlendi mi?** ✅
4. **"Global Kategori" bildirimi göründü mü?** ✅
5. **Başka kategori seç** → Fiyat alanları geri geldi mi? ✅

## 🔧 SORUN GİDERME

### Plugin Yüklenmiyor:
- Zip içeriğini kontrol et (install.xml var mı?)
- Dosya izinlerini kontrol et (755)
- Flynax versiyonu uyumlu mu? (4.9.0+)

### Teklif Al Butonu Gözükmüyor:
- Plugin aktif mi?
- Template cache'i temizle
- Hook'lar çalışıyor mu?

### Fiyat Alanı Gizlenmiyor:
- JavaScript hatası var mı? (F12 Console)
- CSS yüklendi mi?
- Global kategorisi doğru seçildi mi?

## 📧 EMAIL AYARLARI

### Quote Request için:
1. **Admin Panel** → **Plugins** → **Quote Request Settings**
2. **Admin Email** ayarla
3. **File Upload Settings** kontrol et
4. **Test email** gönder

## 🎯 BAŞARI KRİTERLERİ

✅ **Quote Request:**
- Teklif Al butonu tüm listinglerlerde görünür
- Form çalışır ve email gönderir
- Admin panelden yönetilebilir
- Dosya upload çalışır

✅ **Global Price Hider:**
- Global kategorisinde fiyat alanları gizli
- Bilgilendirici mesaj gösterilir
- Diğer kategorilerde fiyat alanları normal
- Dinamik kategori değişimi çalışır

## 🚀 SONUÇ

Bu adımları takip ederek:
1. **İki plugin'i başarıyla yükleyeceksiniz**
2. **Global kategorisini ithalat talebi mantığına uygun hale getireceksiniz**
3. **Firmalar arası teklif sistemini kuracaksınız**

**HAZIR!** 🎉 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 