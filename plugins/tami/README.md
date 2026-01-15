# TAMI Sanal POS Plugin

**T. Garanti Bankası A.Ş.** TAMI Sanal POS entegrasyonu için Flynax plugin'i.

## 🏦 TAMI Hakkında

TAMI, T. Garanti Bankası A.Ş.'nin sanal pos markasıdır ve şu özellikleri sunar:
- ✅ **24 saat içinde** tüm banka kartlarından ödeme alma
- ✅ **Taksitli satış** imkanı (Bonus, World, Maximum, Cardfinans, Paraf, Bankkart, Advantage)
- ✅ **3D Secure** güvenli ödeme altyapısı
- ✅ **Pazaryeri çözümü**
- ✅ **Garanti BBVA güvencesi**
- ✅ **Ortak Ödeme Sayfası** - PCI DSS gerektirmez
- ✅ **Masterpass entegrasyonu**

**Dokümantasyon:** [TAMI Ortak Ödeme Sayfası](https://dev.tami.com.tr/tami-ortak-odeme-sayfasi)

## 📋 Gereksinimler

- Flynax Classifieds Software 4.10.0+
- PHP 7.4+
- cURL extension
- TAMI Merchant hesabı

## 🚀 Kurulum

### 1. Plugin Dosyalarının Yüklenmesi
Plugin dosyalarını `plugins/tami/` klasörüne yükleyin.

### 2. Plugin Aktivasyonu
1. Admin panele gidin
2. **Plugins** → **Browse** menüsüne gidin
3. TAMI plugin'ini bulun ve **Install** butonuna tıklayın

### 3. TAMI Ayarları
1. **Settings** → **Payment Gateways** menüsüne gidin
2. TAMI seçeneğini bulun ve ayarları yapın:

```
Merchant ID: [TAMI'den aldığınız Merchant ID]
Merchant Key: [TAMI'den aldığınız Merchant Key]
User Code: [TAMI'den aldığınız User Code]
Test Mode: Aktif (test için) / Pasif (canlı için)
3D Secure: Aktif (önerilen)
Sadece Türkiye IP'leri: Aktif (önerilen)
```

## ⚙️ Yapılandırma

### Test Ortamı
Test modunda aşağıdaki bilgileri kullanabilirsiniz:
- **API URL:** `https://ppgpayment-test.birlesikodeme.com:20000/api/ppg/Payment`
- Test kartları TAMI dokümantasyonunda mevcuttur

### Canlı Ortam
- **API URL:** `https://api.tami.com.tr/api/ppg/Payment`
- Gerçek TAMI hesap bilgilerinizi kullanın

## 🎯 Özellikler

### IP Tabanlı Ülke Tespiti
Plugin, kullanıcının IP adresine göre Türkiye'den olup olmadığını tespit eder:
```php
// Türk IP aralıkları
$turkish_ip_ranges = [
    '78.160.0.0/11',     // Türk Telekom
    '88.224.0.0/11',     // Türk Telekom
    '94.54.0.0/15',      // TTNet
    '195.87.0.0/16',     // Superonline
];
```

### 3D Secure Desteği
- 3D Secure aktif/pasif seçeneği
- Güvenli callback işlemi
- Otomatik yönlendirme

### Taksit Desteği
- 1-12 taksit seçeneği
- Dinamik taksit sorgulaması
- Komisyon oranı gösterimi

### Kart Validasyonu
- Luhn algoritması ile kart numarası kontrolü
- Kart türü tespiti (Visa, Mastercard, Amex, Troy)
- Real-time form validasyonu

## 🛠️ API Entegrasyonu

### Hash Hesaplama
```php
$hash_string = $merchant_key . $user_code . $rnd . $txn_type . $total_amount . $customer_id . $order_id;
$hash = strtoupper(hash('sha512', mb_convert_encoding($hash_string, 'UTF-16LE')));
```

### 3D Secure Akışı
1. Ödeme bilgileri toplanır
2. TAMI 3D API'sine istek gönderilir
3. Kullanıcı 3D Secure sayfasına yönlendirilir
4. Doğrulama sonrası callback'e dönüş yapılır
5. Ödeme sonucu işlenir

## 📱 Frontend Özellikleri

### Responsive Tasarım
- Mobil uyumlu form
- Modern ve kullanıcı dostu arayüz
- Animasyonlu geçişler

### JavaScript Özellikleri
- Real-time kart formatlaması
- Kart türü algılama
- Form validasyonu
- AJAX ödeme işlemi

### CSS Stilleri
- Modern gradient butonlar
- Smooth animasyonlar
- Kart tipi ikonları
- Loading spinners

## 🔧 Geliştirici Notları

### Hook'lar
```php
// Payment gateway listesine ekleme
public function hookPhpGetPaymentGateways(&$gateways, &$content)

// Ödeme formunu yükleme
public function hookLoadPaymentForm(&$gateway, &$form)

// AJAX isteklerini işleme
public function hookAjaxRequest()
```

### Önemli Sınıflar
- `rlTami` - Ana plugin sınıfı
- `rlTamiGateway` - Gateway işlemleri
- `rlInstall` - Kurulum işlemleri

### Dosya Yapısı
```
plugins/tami/
├── rlTami.class.php              # Ana plugin sınıfı
├── rlTamiGateway.class.php       # Gateway sınıfı
├── rlInstall.class.php           # Kurulum sınıfı
├── install.xml                   # Plugin tanımları
├── form.tpl                      # Ödeme formu şablonu
├── callback.php                  # 3D Secure callback
├── i18n/
│   ├── tr.json                   # Türkçe dil dosyası
│   └── en.json                   # İngilizce dil dosyası
├── static/
│   ├── tami.css                  # CSS stilleri
│   └── tami.js                   # JavaScript dosyası
└── README.md                     # Bu dosya
```

## 🐛 Hata Giderme

### Debug Modu
Test modunda hata logları `plugins/tami/callback.log` dosyasına yazılır.

### Yaygın Hatalar
1. **Hash Mismatch:** Merchant Key kontrolü
2. **IP Restriction:** IP aralığı ayarları
3. **3D Callback:** Callback URL'i kontrolü

### Log Kontrolü
```php
// Test modunda logları kontrol edin
if ($config['tami_test_mode']) {
    error_log('TAMI Debug: ' . print_r($data, true));
}
```

## 📞 Destek

- **TAMI Destek:** [dev.tami.com.tr](https://dev.tami.com.tr/)
- **Plugin Geliştirici:** GMO Plus Team
- **E-mail:** support@gmoplus.com

## 📄 Lisans

Bu plugin Flynax Software lisansı altında dağıtılmaktadır.

## 🔄 Versiyon Geçmişi

### v1.0.0 (06.01.2025)
- ✅ İlk sürüm
- ✅ 3D Secure desteği
- ✅ IP bazlı ülke tespiti
- ✅ Taksit desteği
- ✅ Responsive tasarım
- ✅ Hash güvenliği

---

**TAMI - T. Garanti Bankası A.Ş. markasıdır** 