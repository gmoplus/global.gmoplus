<?php
/**
 * Global Category Price Hider Plugin Creator
 * Bu script global kategorisinde fiyat alanlarını gizleyen plugin'i oluşturur
 */

echo "=== GLOBAL CATEGORY PRICE HIDER PLUGIN OLUŞTURUCU ===\n\n";

// Plugin klasörünü oluştur
$plugin_dir = "plugins/globalCategoryPriceHider";
if (!is_dir($plugin_dir)) {
    mkdir($plugin_dir, 0755, true);
    echo "✓ Plugin klasörü oluşturuldu: $plugin_dir\n";
}

// Static klasörünü oluştur
$static_dir = "$plugin_dir/static";
if (!is_dir($static_dir)) {
    mkdir($static_dir, 0755, true);
    echo "✓ Static klasörü oluşturuldu: $static_dir\n";
}

// 1. install.xml dosyasını oluştur
$install_xml = '<?xml version="1.0" encoding="utf-8"?>
<plugin>
    <name>Global Category Price Hider</name>
    <title>Global Kategori Fiyat Alanı Gizleyici</title>
    <description>Global kategorisinde fiyat alanlarını gizler çünkü bu kategori ithalat/ihracat talepleri için kullanılır</description>
    <version>1.0.0</version>
    <date>04.01.2025</date>
    <author>GMO Plus Development Team</author>
    <owner>Global.GMOPlus.com</owner>
    <compatible>4.9.0</compatible>
    <files>
        <file>rlGlobalCategoryPriceHider.class.php</file>
        <file>static/price_hider.css</file>
        <file>static/price_hider.js</file>
    </files>
    <hooks>
        <hook name="phpHeader" class="rlGlobalCategoryPriceHider" method="addCSS" />
        <hook name="phpHeader" class="rlGlobalCategoryPriceHider" method="addJS" />
    </hooks>
    <phrases>
        <phrase key="global_price_hider_title" module="common">Global Kategori - Fiyat Alanı Gizli</phrase>
        <phrase key="global_price_hider_message" module="common">Bu kategoride fiyat belirtmeyin. Firmalar sizden teklif talep edecektir.</phrase>
    </phrases>
    <configs>
        <config key="global_category_id" name="Global Kategori ID" description="Global kategorisinin ID numarası" type="text" value="1" />
        <config key="hide_method" name="Gizleme Yöntemi" description="CSS veya JS ile gizleme" type="radio" value="both" values="css,js,both" />
    </configs>
</plugin>';

file_put_contents("$plugin_dir/install.xml", $install_xml);
echo "✓ install.xml oluşturuldu\n";

// 2. Ana PHP sınıfını oluştur
$main_class = '<?php

/**
 * Global Category Price Hider Plugin
 * Global kategorisinde fiyat alanlarını gizler
 */
class rlGlobalCategoryPriceHider
{
    /**
     * CSS dosyasını yükle
     */
    public function addCSS()
    {
        global $rlSmarty, $page_info, $reefless;
        
        // Sadece listing ekleme/düzenleme sayfalarında çalışsın
        if (in_array($page_info["Controller"], ["add_listing", "edit_listing"])) {
            $css_url = $reefless->loadClass("Plugins")->getStaticUrl("globalCategoryPriceHider") . "price_hider.css";
            $rlSmarty->assign("price_hider_css", $css_url);
            
            // CSS\'i header\'a ekle
            echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$css_url}?v=" . time() . "\" />\n";
        }
    }
    
    /**
     * JavaScript dosyasını yükle
     */
    public function addJS()
    {
        global $rlSmarty, $page_info, $reefless;
        
        // Sadece listing ekleme/düzenleme sayfalarında çalışsın
        if (in_array($page_info["Controller"], ["add_listing", "edit_listing"])) {
            $js_url = $reefless->loadClass("Plugins")->getStaticUrl("globalCategoryPriceHider") . "price_hider.js";
            $rlSmarty->assign("price_hider_js", $js_url);
            
            // JavaScript\'i footer\'a ekle
            echo "<script type=\"text/javascript\" src=\"{$js_url}?v=" . time() . "\"></script>\n";
        }
    }
    
    /**
     * Global kategori ID\'sini al
     */
    private function getGlobalCategoryId()
    {
        global $rlDb;
        
        // Global kategorisini bul
        $global_cat = $rlDb->fetch(array("ID"), array("Path" => "global"), null, 1, "categories");
        return $global_cat ? $global_cat["ID"] : 1; // Varsayılan 1
    }
}

?>';

file_put_contents("$plugin_dir/rlGlobalCategoryPriceHider.class.php", $main_class);
echo "✓ rlGlobalCategoryPriceHider.class.php oluşturuldu\n";

// 3. CSS dosyasını oluştur
$css_content = '/**
 * Global Category Price Hider CSS
 * Global kategorisinde fiyat alanlarını gizler
 */

/* Fiyat alanlarını gizle */
.global-price-hidden .price-field,
.global-price-hidden input[name*="price"],
.global-price-hidden input[name*="Price"],
.global-price-hidden .f_price,
.global-price-hidden .f_buy_now,
.global-price-hidden #f_price,
.global-price-hidden #f_buy_now,
.global-price-hidden tr[id*="price"],
.global-price-hidden tr[id*="Price"],
.global-price-hidden .field-price,
.global-price-hidden .field-buy-now {
    display: none !important;
    visibility: hidden !important;
}

/* Bilgilendirici mesaj */
.global-category-notice {
    background-color: #e8f5e8;
    border: 2px solid #4caf50;
    border-radius: 8px;
    padding: 15px;
    margin: 15px 0;
    color: #2e7d32;
    font-weight: bold;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.global-category-notice .icon {
    font-size: 20px;
    margin-right: 10px;
}

.global-category-notice .title {
    font-size: 16px;
    margin-bottom: 5px;
}

.global-category-notice .message {
    font-size: 14px;
    font-weight: normal;
    color: #388e3c;
}

/* Responsive tasarım */
@media (max-width: 768px) {
    .global-category-notice {
        padding: 10px;
        font-size: 14px;
    }
    
    .global-category-notice .title {
        font-size: 15px;
    }
    
    .global-category-notice .message {
        font-size: 13px;
    }
}';

file_put_contents("$static_dir/price_hider.css", $css_content);
echo "✓ price_hider.css oluşturuldu\n";

// 4. JavaScript dosyasını oluştur
$js_content = '/**
 * Global Category Price Hider JavaScript
 * Global kategorisinde fiyat alanlarını dinamik olarak gizler
 */

(function($) {
    "use strict";
    
    // Global değişkenler
    var globalCategoryId = 1; // Varsayılan global kategori ID
    var priceFieldsHidden = false;
    var noticeShown = false;
    
    // Sayfa yüklendiğinde çalışacak
    $(document).ready(function() {
        console.log("Global Category Price Hider aktif");
        
        // Kategori değişikliklerini izle
        watchCategoryChanges();
        
        // İlk yükleme kontrolü
        checkAndHidePriceFields();
        
        // Form submit kontrolü
        watchFormSubmit();
    });
    
    /**
     * Kategori değişikliklerini izle
     */
    function watchCategoryChanges() {
        // Kategori select elementlerini izle
        $(\'select[name*="category"], select[name*="Category"], #category_id, .category-select\').on(\'change\', function() {
            setTimeout(function() {
                checkAndHidePriceFields();
            }, 500);
        });
        
        // AJAX kategori yüklemelerini izle
        $(document).ajaxComplete(function(event, xhr, settings) {
            if (settings.url && settings.url.indexOf(\'category\') !== -1) {
                setTimeout(function() {
                    checkAndHidePriceFields();
                }, 1000);
            }
        });
        
        // DOM değişikliklerini izle
        if (window.MutationObserver) {
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === \'childList\') {
                        checkAndHidePriceFields();
                    }
                });
            });
            
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        }
    }
    
    /**
     * Fiyat alanlarını kontrol et ve gizle
     */
    function checkAndHidePriceFields() {
        var currentCategory = getCurrentCategory();
        
        if (isGlobalCategory(currentCategory)) {
            hidePriceFields();
            showGlobalCategoryNotice();
        } else {
            showPriceFields();
            hideGlobalCategoryNotice();
        }
    }
    
    /**
     * Mevcut kategoriyi al
     */
    function getCurrentCategory() {
        var categoryId = null;
        
        // Farklı selector\'larla kategori ID\'sini bulmaya çalış
        var selectors = [
            \'select[name*="category"]:visible\',
            \'select[name*="Category"]:visible\',
            \'#category_id\',
            \'.category-select:visible\',
            \'input[name*="category"]:checked\'
        ];
        
        for (var i = 0; i < selectors.length; i++) {
            var $element = $(selectors[i]);
            if ($element.length && $element.val()) {
                categoryId = $element.val();
                break;
            }
        }
        
        console.log("Mevcut kategori ID:", categoryId);
        return categoryId;
    }
    
    /**
     * Global kategori kontrolü
     */
    function isGlobalCategory(categoryId) {
        // Global kategori ID\'leri (çoklu olabilir)
        var globalCategoryIds = [1, \'1\', \'global\'];
        
        // Kategori path kontrolü
        var isGlobal = globalCategoryIds.indexOf(categoryId) !== -1;
        
        // URL kontrolü
        if (!isGlobal && window.location.href.indexOf(\'global\') !== -1) {
            isGlobal = true;
        }
        
        console.log("Global kategori mi?", isGlobal, "Kategori:", categoryId);
        return isGlobal;
    }
    
    /**
     * Fiyat alanlarını gizle
     */
    function hidePriceFields() {
        if (priceFieldsHidden) return;
        
        console.log("Fiyat alanları gizleniyor...");
        
        // Body\'ye class ekle
        $(\'body\').addClass(\'global-price-hidden\');
        
        // Fiyat alanlarını bul ve gizle
        var priceSelectors = [
            \'input[name*="price"]\',
            \'input[name*="Price"]\',
            \'.f_price\',
            \'.f_buy_now\',
            \'#f_price\',
            \'#f_buy_now\',
            \'tr[id*="price"]\',
            \'tr[id*="Price"]\',
            \'.field-price\',
            \'.field-buy-now\',
            \'[class*="price"]\',
            \'[id*="price"]\',
            \'label[for*="price"]\',
            \'td:contains("Price")\',
            \'td:contains("Fiyat")\',
            \'th:contains("Price")\',
            \'th:contains("Fiyat")\'
        ];
        
        priceSelectors.forEach(function(selector) {
            $(selector).hide();
            $(selector).closest(\'tr\').hide();
            $(selector).closest(\'.form-group\').hide();
            $(selector).closest(\'.field\').hide();
        });
        
        priceFieldsHidden = true;
        console.log("Fiyat alanları gizlendi");
    }
    
    /**
     * Fiyat alanlarını göster
     */
    function showPriceFields() {
        if (!priceFieldsHidden) return;
        
        console.log("Fiyat alanları gösteriliyor...");
        
        // Body\'den class kaldır
        $(\'body\').removeClass(\'global-price-hidden\');
        
        // Tüm gizli alanları göster
        $(\'input[name*="price"], input[name*="Price"], .f_price, .f_buy_now, #f_price, #f_buy_now\').show();
        $(\'tr[id*="price"], tr[id*="Price"]\').show();
        $(\'.field-price, .field-buy-now\').show();
        
        priceFieldsHidden = false;
        console.log("Fiyat alanları gösterildi");
    }
    
    /**
     * Global kategori bildirimini göster
     */
    function showGlobalCategoryNotice() {
        if (noticeShown) return;
        
        var notice = $(\'<div class="global-category-notice">\' +
            \'<div class="title"><span class="icon">🌍</span>Global Kategori - İthalat/İhracat Talebi</div>\' +
            \'<div class="message">Bu kategoride fiyat belirtmeyin. Firmalar sizden teklif talep edecektir.</div>\' +
            \'</div>\');
        
        // Formu bul ve başına ekle
        var $form = $(\'form[name="listing"], .listing-form, #listing-form, form:first\');
        if ($form.length) {
            $form.prepend(notice);
            noticeShown = true;
            console.log("Global kategori bildirimi gösterildi");
        }
    }
    
    /**
     * Global kategori bildirimini gizle
     */
    function hideGlobalCategoryNotice() {
        $(\'.global-category-notice\').remove();
        noticeShown = false;
        console.log("Global kategori bildirimi gizlendi");
    }
    
    /**
     * Form submit kontrolü
     */
    function watchFormSubmit() {
        $(\'form\').on(\'submit\', function() {
            var currentCategory = getCurrentCategory();
            if (isGlobalCategory(currentCategory)) {
                // Global kategorisinde fiyat alanlarını temizle
                $(\'input[name*="price"], input[name*="Price"]\').val(\'\');
                console.log("Global kategorisinde fiyat alanları temizlendi");
            }
        });
    }
    
})(jQuery);';

file_put_contents("$static_dir/price_hider.js", $js_content);
echo "✓ price_hider.js oluşturuldu\n";

echo "\n=== PLUGIN BAŞARIYLA OLUŞTURULDU! ===\n\n";
echo "📁 Dosyalar:\n";
echo "- plugins/globalCategoryPriceHider/install.xml\n";
echo "- plugins/globalCategoryPriceHider/rlGlobalCategoryPriceHider.class.php\n";
echo "- plugins/globalCategoryPriceHider/static/price_hider.css\n";
echo "- plugins/globalCategoryPriceHider/static/price_hider.js\n\n";

echo "🚀 KURULUM ADIMLARı:\n";
echo "1. plugins/globalCategoryPriceHider/ klasörünü ZIP yapın\n";
echo "2. Admin panelde Plugins > Upload Plugin\n";
echo "3. ZIP\'i yükleyin ve Install edin\n";
echo "4. Plugin\'i Activate edin\n\n";

echo "🧪 TEST:\n";
echo "1. Admin > Add Listing git\n";
echo "2. Global kategorisini seç\n";
echo "3. Fiyat alanları gizlenecek\n";
echo "4. Bilgilendirici mesaj görünecek\n\n";

echo "✅ HAZIR!\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 