<?php
/**
 * 📝 Blog Konfigürasyon Sınıfı
 * WordPress Bridge API bağlantı ayarları ve genel konfigürasyon
 */
class BlogConfig {
    
    // 🌍 BLOG SİTESİ SEÇİMİ - Hangisini kullanmak istiyorsunuz?
    // Seçenek 1: blog.gmoplus.com
    // Seçenek 2: blog.global.gmoplus.com
    // ⚠️ Test sonuçlarına göre her ikisi de aynı durumda!
    
    // CURRENT: blog.global.gmoplus.com kullanılıyor (23 blog içeriği ile!)
    const BRIDGE_URL = 'https://blog.global.gmoplus.com/wp-content/plugins/flynax-bridge/request.php';
    
    // ALTERNATIVE: blog.gmoplus.com (sadece 8 blog) - kullanmayın
    // const BRIDGE_URL = 'https://blog.gmoplus.com/wp-content/plugins/flynax-bridge/request.php';
    
    // 🕐 Cache süreleri (saniye)
    const CACHE_TIME_SHORT = 1800;  // 30 dakika
    const CACHE_TIME_LONG = 7200;   // 2 saat
    
    // 📊 Varsayılan limitler
    const DEFAULT_LIMIT = 8;        // Genel blog limiti
    const CATEGORY_LIMIT = 4;       // Kategori sayfası limiti  
    const FEATURED_LIMIT = 6;       // Öne çıkan blog limiti
    
    // 🏷️ MEVCUT KATEGORİLER (WordPress'ten alındı)
    // Test sonuçlarına göre şu kategoriler mevcut:
    // - KEŞFET (kesfet)
    // - ONLİNE (online) 
    // - 7/24 Yemek (7-24-yemek)
    // - Dünya Mutfağı (dunya-mutfagi)
    // - Ev Yemekleri (ev-yemekleri)
    // - Fast Food (fast-food)
    // - Gece Açıkmaları (gece-acikmalari)
    // - Hafif Atıştırmalıklar (hafif-atisirmaliklar)
    // - İçecekler (icecekler)
    // - İnşaat & Kebap (insaat-kebap)
    // - Tatlı & Atıştırmalık (tatli-atistirmalik)
    
    // ✅ GERÇEK KATEGORİLER (blog.global.gmoplus.com'dan alındı)
    public static $categories = [
        // 🎯 EN ÇOK İÇERİKLİ KATEGORİLER (23 blog each)
        'global' => [
            'name' => 'Global', 
            'slug' => 'global', 
            'limit' => 4, 
            'description' => 'Global kategori blogları (23 blog mevcut)'
        ],
        'cozumlerimiz' => [
            'name' => 'Çözümlerimiz', 
            'slug' => 'cozumlerimiz', 
            'limit' => 6, 
            'description' => 'Çözümlerimiz kategorisi (23 blog mevcut)'
        ],
        'kesfet' => [
            'name' => 'KEŞFET', 
            'slug' => 'kesfet', 
            'limit' => 8, 
            'description' => 'Keşfet kategorisi (23 blog mevcut)'
        ],
        
        // 🔥 ORTA İÇERİKLİ KATEGORİLER
        'ihracat-teklifleri' => [
            'name' => 'İhracat Teklifleri', 
            'slug' => 'ihracat-teklifleri', 
            'limit' => 5, 
            'description' => 'İhracat teklifleri (18 blog mevcut)'
        ],
        'tarim-ve-sut-urunleri' => [
            'name' => 'Tarım Ve Süt Ürünleri', 
            'slug' => 'tarim-ve-sut-urunleri', 
            'limit' => 4, 
            'description' => 'Tarım ve süt ürünleri (15 blog mevcut)'
        ],
        
        // 💼 İŞ KATEGORİLERİ
        'otomotiv' => [
            'name' => 'Otomotiv', 
            'slug' => 'otomotiv', 
            'limit' => 6, 
            'description' => 'Otomotiv sektörü (9 blog mevcut)'
        ]
    ];
    
    // Manuel seçilecek blog ID'leri (admin panelinden güncellenebilir)
    public static $featuredPosts = [
        'homepage' => [1, 3, 5, 7],         // Ana sayfa öne çıkanları (değiştirin!)
        'sidebar' => [2, 4, 6],             // Sidebar öne çıkanları (değiştirin!)
        'global_page' => [8, 9, 10, 11]     // Global sayfa öne çıkanları (değiştirin!)
    ];
    
    // Hariç tutulacak kategoriler
    public static $excludeCategories = [
        'homepage' => ['draft', 'private', 'test'],
        'global_page' => ['duyuru', 'eski']
    ];
    
    /**
     * Kategori bilgilerini getir
     */
    public static function getCategory($slug) {
        return self::$categories[$slug] ?? null;
    }
    
    /**
     * Tüm kategorileri listele
     */
    public static function getAllCategories() {
        return self::$categories;
    }
    
    /**
     * Manuel seçilmiş blog ID'lerini getir
     */
    public static function getFeaturedPosts($section = 'homepage') {
        return self::$featuredPosts[$section] ?? [];
    }
    
    /**
     * Cache key oluştur
     */
    public static function getCacheKey($type, $params = []) {
        $key = 'gmoplus_blog_' . $type;
        if (!empty($params)) {
            $key .= '_' . md5(serialize($params));
        }
        return $key;
    }
    
    /**
     * WordPress Bridge API URL'ini oluştur
     */
    public static function buildApiUrl($route, $params = []) {
        $url = self::BRIDGE_URL . '?route=' . $route;
        
        if (!empty($params)) {
            $url .= '&' . http_build_query($params);
        }
        
        return $url;
    }
} 