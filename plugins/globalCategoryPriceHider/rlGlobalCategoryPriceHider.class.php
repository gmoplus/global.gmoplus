<?php

/**
 * Global Category Price Hider Plugin
 * İthalat/İhracat talebi kategorilerinde fiyat alanlarını gizler
 */
class rlGlobalCategoryPriceHider
{
    /**
     * Hook: phpHeader
     * CSS ve JS dosyalarını yükle
     */
    public function init()
    {
        global $rlSmarty, $page_info, $reefless, $rlDb;
        
        // Sadece listing ekleme/düzenleme sayfalarında çalışsın
        if (!in_array($page_info["Controller"], ["add_listing", "edit_listing"])) {
            return;
        }
        
        // Teklif bekleyen kategorileri belirle
        $request_categories = array(
            'ithalat_talepleri',
            'ihracat_talepleri', 
            'konsorsiyum_talep_teklif'
        );
        
        // CSS dosyasını yükle
        $css_url = $reefless->loadClass("Plugins")->getStaticUrl("globalCategoryPriceHider") . "price_hider.css";
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$css_url}?v=" . time() . "\" />\n";
        
        // JavaScript dosyasını yükle
        $js_url = $reefless->loadClass("Plugins")->getStaticUrl("globalCategoryPriceHider") . "price_hider.js";
        echo "<script type=\"text/javascript\" src=\"{$js_url}?v=" . time() . "\"></script>\n";
        
        // Kategori listesini JavaScript'e aktar
        echo "<script type=\"text/javascript\">";
        echo "var requestCategories = " . json_encode($request_categories) . ";";
        echo "</script>\n";
        
        // Bilgilendirme mesajı
        $rlSmarty->assign("price_hider_message", "Bu kategoride fiyat belirtmeyin. Firmalar sizden teklif talep edecektir.");
    }
    
    /**
     * Hook: phpFooter 
     * Ekstra JavaScript kodları
     */
    public function addFooterJS()
    {
        global $page_info;
        
        if (!in_array($page_info["Controller"], ["add_listing", "edit_listing"])) {
            return;
        }
        
        echo "<script type=\"text/javascript\">
        // Sayfa yüklendiğinde fiyat alanlarını kontrol et
        jQuery(document).ready(function($) {
            checkPriceFields();
        });
        
        // AJAX tamamlandığında kontrol et
        jQuery(document).ajaxComplete(function() {
            setTimeout(checkPriceFields, 500);
        });
        </script>\n";
    }
}

?> 