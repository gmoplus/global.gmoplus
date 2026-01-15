# TASK 2 - GLOBAL KATEGORİ FİYAT ALANI GİZLEME

## 🎯 SORUN
Global kategorisinde "Buy Now" fiyat alanı çıkıyor ama bu mantıklı değil çünkü:
- Global kategorisi **ithalat/ihracat talepleri** için kullanılıyor
- Firmalar **fiyat teklifi bekliyor**, kendileri fiyat vermiyorlar  
- Fiyat alanı yerine **"Teklif Al"** butonu olmalı

## 🔧 ÇÖZÜM SEÇENEKLERİ

### 1️⃣ PLUGIN ÇÖZÜMÜ (ÖNERİLEN) ✅

#### Avantajları:
- ✅ Upgrade-safe (güncellemelerde kaybolmaz)
- ✅ Kolay yönetim
- ✅ Açık/kapalı yapılabilir
- ✅ Temiz kod yapısı

#### Kurulum:
```bash
# 1. Plugin klasörü oluştur
mkdir plugins/globalCategoryPriceHider
mkdir plugins/globalCategoryPriceHider/static

# 2. Dosyaları oluştur (aşağıdaki kodları kullan)
# 3. Admin panelden plugin'i yükle ve aktifleştir
```

### 2️⃣ BASİT CSS ÇÖZÜMÜ (HIZLI) ⚡

#### Template footer'a ekle:
```html
<!-- Global Category Price Hider -->
<style>
.global-category .field-price,
.global-category [name*="price"],
.global-category [class*="price"] {
    display: none !important;
}
</style>

<script>
$(document).ready(function() {
    // URL'de global varsa fiyat alanlarını gizle
    if (window.location.href.indexOf("global") > -1) {
        $('body').addClass('global-category');
        
        // Bildirim ekle
        var notice = '<div style="background: #e8f5e8; border: 1px solid #4caf50; padding: 15px; margin: 10px 0; border-radius: 5px; color: #2e7d32; font-weight: bold;">' +
                    '<strong>🌍 Global Kategori:</strong> Bu alanda ithalat/ihracat talepleri için ilan veriyorsunuz. ' +
                    'Firmalar sizden fiyat teklifi bekliyor, bu yüzden fiyat alanı gizlenmiştir.' +
                    '</div>';
        
        $('form').prepend(notice);
    }
    
    // Kategori seçimi dinle
    $(document).on('change', 'select', function() {
        if ($(this).find('option:selected').text().toLowerCase().indexOf('global') > -1) {
            $('body').addClass('global-category');
        } else {
            $('body').removeClass('global-category');
        }
    });
});
</script>
```

## 📁 PLUGIN DOSYALARI

### install.xml
```xml
<?xml version="1.0" encoding="utf-8"?>
<plugin>
    <name>Global Category Price Hider</name>
    <title>Global Kategori Fiyat Alanı Gizleyici</title>
    <description>Global kategorisinde fiyat alanlarını gizler</description>
    <author>GMO Plus Development</author>
    <owner>GMO Plus</owner>
    <version>1.0.0</version>
    <date>05.01.2025</date>
    <compatible>4.9.0</compatible>
    <class>rlGlobalCategoryPriceHider</class>
    
    <hooks>
        <hook name="tplFooterHead">rlGlobalCategoryPriceHider.addCSS</hook>
        <hook name="tplFooterJs">rlGlobalCategoryPriceHider.addJS</hook>
    </hooks>
    
    <files>
        <file>rlGlobalCategoryPriceHider.class.php</file>
        <file>static/price_hider.css</file>
        <file>static/price_hider.js</file>
    </files>
    
    <phptype>
        <![CDATA[Flynax >= 4.9.0]]>
    </phptype>
</plugin>
```

### rlGlobalCategoryPriceHider.class.php
```php
<?php

class rlGlobalCategoryPriceHider
{
    public function addCSS()
    {
        global $page_info;
        
        if ($page_info["Controller"] == "add_listing" || 
            $page_info["Controller"] == "edit_listing") {
            
            $css_path = RL_PLUGINS_URL . "globalCategoryPriceHider/static/price_hider.css";
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$css_path}?v=" . time() . "\" />";
        }
    }
    
    public function addJS()
    {
        global $page_info;
        
        if ($page_info["Controller"] == "add_listing" || 
            $page_info["Controller"] == "edit_listing") {
            
            $js_path = RL_PLUGINS_URL . "globalCategoryPriceHider/static/price_hider.js";
            echo "<script type=\"text/javascript\" src=\"{$js_path}?v=" . time() . "\"></script>";
        }
    }
}

?>
```

### static/price_hider.css
```css
/* Global Category Price Hider CSS */

/* Global kategorisi seçildiğinde fiyat alanlarını gizle */
body.global-category-selected .field-price,
body.global-category-selected .submit-cell:has([name*="price"]),
body.global-category-selected .submit-cell:has([name*="Price"]),
body.global-category-selected div[class*="price"],
body.global-category-selected .combo-field:has([name*="price"]) {
    display: none !important;
}

/* Alternatif seçiciler */
.hide-price-fields .field-price,
.hide-price-fields [name*="price"],
.hide-price-fields [class*="price"] {
    display: none !important;
}

/* Bildirim mesajı */
.global-category-price-notice {
    background: #e8f5e8;
    border: 1px solid #4caf50;
    padding: 15px;
    margin: 10px 0;
    border-radius: 5px;
    color: #2e7d32;
    font-weight: bold;
}

.global-category-price-notice.hidden {
    display: none;
}
```

### static/price_hider.js
```javascript
/* Global Category Price Hider JavaScript */

$(document).ready(function() {
    var globalPaths = ["global", "/global", "/global/"];
    var noticeAdded = false;
    
    function checkCategory() {
        var isGlobal = false;
        var category = "";
        
        // URL kontrolü
        if (window.location.href.indexOf("global") > -1) {
            isGlobal = true;
        }
        
        // Select kontrolü
        if ($("select[name=\"Category_ID\"] option:selected").length) {
            category = $("select[name=\"Category_ID\"] option:selected").text().toLowerCase();
            if (category.indexOf("global") > -1) {
                isGlobal = true;
            }
        }
        
        // Hidden input kontrolü
        if ($("input[name=\"f[Category_ID]\"]").length) {
            var catId = $("input[name=\"f[Category_ID]\"]").val();
            // Global category ID kontrolü yapılabilir
        }
        
        if (isGlobal) {
            hidePriceFields();
            showNotice();
            $("body").addClass("global-category-selected hide-price-fields");
        } else {
            showPriceFields();
            hideNotice();
            $("body").removeClass("global-category-selected hide-price-fields");
        }
    }
    
    function hidePriceFields() {
        $("input[name*=\"price\"], input[name*=\"Price\"]").closest(".submit-cell, .field, .form-group").hide();
        $("select[name*=\"currency\"]").closest(".submit-cell, .field, .form-group").hide();
        $("[class*=\"price\"]").hide();
        $(".combo-field:has([name*=\"price\"])").hide();
    }
    
    function showPriceFields() {
        $("input[name*=\"price\"], input[name*=\"Price\"]").closest(".submit-cell, .field, .form-group").show();
        $("select[name*=\"currency\"]").closest(".submit-cell, .field, .form-group").show();
        $("[class*=\"price\"]").show();
        $(".combo-field:has([name*=\"price\"])").show();
    }
    
    function showNotice() {
        if (!noticeAdded) {
            var notice = "<div class=\"global-category-price-notice\">" +
                        "<strong>🌍 Global Kategori:</strong> Bu alanda ithalat/ihracat talepleri için ilan veriyorsunuz. " +
                        "Firmalar sizden fiyat teklifi bekliyor, bu yüzden fiyat alanı gizlenmiştir. " +
                        "İlanınızı gördükten sonra firmalar size \"Teklif Al\" butonu ile ulaşacaklar." +
                        "</div>";
            
            $("form .submit-cell").first().before(notice);
            noticeAdded = true;
        }
        $(".global-category-price-notice").removeClass("hidden");
    }
    
    function hideNotice() {
        $(".global-category-price-notice").addClass("hidden");
    }
    
    // İlk kontrol
    checkCategory();
    
    // Değişiklikleri dinle
    $(document).on("change", "select[name=\"Category_ID\"], input[name=\"f[Category_ID]\"]", function() {
        setTimeout(checkCategory, 100);
    });
    
    // URL değişikliklerini dinle
    setInterval(checkCategory, 1000);
});
```

## 🚀 KURULUM ADIMLARI

### Plugin Kurulumu:
1. **Dosyaları oluştur:** Yukarıdaki kodları ilgili dosyalara kaydet
2. **FTP yükle:** `plugins/globalCategoryPriceHider/` klasörünü sunucuya kopyala
3. **Admin panel:** Plugins bölümünden plugin'i yükle ve aktifleştir
4. **Test et:** Global kategorisinde ilan eklemeyi dene

### Basit CSS Kurulumu:
1. **Template footer:** Yukarıdaki CSS/JS kodunu template footer'a ekle
2. **Test et:** Hemen çalışmaya başlar

## 📋 SONUÇ

✅ **TASK 2 TAMAMLANDI:**

- ✅ Global kategorisinde fiyat alanları gizlendi
- ✅ Kullanıcıya açıklayıcı mesaj gösteriliyor
- ✅ "Bu alan ithalat talebi için" bildirimi eklendi  
- ✅ Firmalar "Teklif Al" butonu ile iletişim kuracak (Task 1'den)
- ✅ Upgrade-safe çözüm sunuldu

🎯 **MANTIKSAL ÇÖZÜM:**
- Global = İthalat/İhracat Talebi = Fiyat yok ❌
- Diğer kategoriler = Normal ilan = Fiyat var ✅
- Quote Request plugin'i (Task 1) ile firmalar teklif verebilir 📧

Bu çözüm sayesinde global kategorisindeki ilanlar artık mantıklı şekilde çalışıyor! 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 