<?php
/**
 * Global Category Price Field Hider
 */

echo "=== GLOBAL KATEGORİ FİYAT ALANLARINI GİZLEME ARACI ===\n\n";

// Tüm çözümleri oluştur
createPluginSolution();
createSimpleCSSSolution();

/**
 * Plugin Çözümü - En Güvenli
 */
function createPluginSolution() {
    echo "=== PLUGIN ÇÖZÜMÜ OLUŞTURULUYOR ===\n";
    
    // Plugin klasörü oluştur
    if (!is_dir('plugins/globalCategoryPriceHider')) {
        mkdir('plugins/globalCategoryPriceHider', 0755, true);
        mkdir('plugins/globalCategoryPriceHider/static', 0755, true);
        echo "✓ Plugin klasörü oluşturuldu\n";
    }
    
    // install.xml
    $install_xml = '<?xml version="1.0" encoding="utf-8"?>
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
</plugin>';
    
    file_put_contents('plugins/globalCategoryPriceHider/install.xml', $install_xml);
    echo "✓ install.xml oluşturuldu\n";
    
    // Ana sınıf
    $main_class = '<?php

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

?>';
    
    file_put_contents('plugins/globalCategoryPriceHider/rlGlobalCategoryPriceHider.class.php', $main_class);
    echo "✓ Ana sınıf oluşturuldu\n";
    
    // CSS dosyası
    $css = '/* Global Category Price Hider CSS */

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
}';
    
    file_put_contents('plugins/globalCategoryPriceHider/static/price_hider.css', $css);
    echo "✓ CSS dosyası oluşturuldu\n";
    
    // JavaScript dosyası
    $js = '/* Global Category Price Hider JavaScript */

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
                        "Firmalar sizden fiyat teklifi bekliyor, bu yüzden fiyat alanı gizlenmiştir." +
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
});';
    
    file_put_contents('plugins/globalCategoryPriceHider/static/price_hider.js', $js);
    echo "✓ JavaScript dosyası oluşturuldu\n";
    
    echo "✅ Plugin çözümü hazır!\n\n";
}

/**
 * Basit CSS Çözümü
 */
function createSimpleCSSSolution() {
    echo "=== BASİT CSS ÇÖZÜMÜ OLUŞTURULUYOR ===\n";
    
    $simple_css = '<!-- Global Category Price Hider - Basit CSS Çözümü -->
<style>
/* Global kategorisinde fiyat alanlarını gizle */
body[class*="global"] .field-price,
body[class*="global"] [name*="price"],
body[class*="global"] [class*="price"],
.global-category .field-price,
.global-category [name*="price"],
.global-category [class*="price"] {
    display: none !important;
}
</style>

<script>
$(document).ready(function() {
    // URL kontrolü
    if (window.location.href.indexOf("global") > -1) {
        $("body").addClass("global-category");
        
        // Bildirim ekle
        var notice = "<div style=\"background: #e8f5e8; border: 1px solid #4caf50; padding: 15px; margin: 10px 0; border-radius: 5px; color: #2e7d32; font-weight: bold;\">" +
                    "<strong>🌍 Global Kategori:</strong> Bu alanda ithalat/ihracat talepleri için ilan veriyorsunuz. " +
                    "Firmalar sizden fiyat teklifi bekliyor, bu yüzden fiyat alanı gizlenmiştir." +
                    "</div>";
        
        $("form").prepend(notice);
    }
    
    // Kategori seçimi dinle
    $(document).on("change", "select", function() {
        if ($(this).find("option:selected").text().toLowerCase().indexOf("global") > -1) {
            $("body").addClass("global-category");
        } else {
            $("body").removeClass("global-category");
        }
    });
});
</script>';
    
    file_put_contents('simple_global_price_hider.html', $simple_css);
    echo "✓ Basit CSS çözümü oluşturuldu: simple_global_price_hider.html\n";
    
    echo "✅ Basit çözüm hazır!\n\n";
}

echo "🎯 ÇÖZÜMLER HAZIR!\n\n";

echo "📋 KURULUM SEÇENEKLERİ:\n\n";

echo "1️⃣ Plugin Çözümü (ÖNERİLEN):\n";
echo "   - plugins/globalCategoryPriceHider/ klasörünü admin panelden yükleyin\n";
echo "   - Plugin'i aktifleştirin\n\n";

echo "2️⃣ Basit CSS Çözümü:\n";
echo "   - simple_global_price_hider.html içeriğini template footer'a ekleyin\n\n";

echo "✅ PLUGIN ÇÖZÜMÜ EN GÜVENLİ VE ÖNERİLENDİR!\n\n";

?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 