<?php
/**
 * Global.GMOPlus Blog Manager
 * WordPress Bridge API'larını yöneten ana sınıf
 * 
 * KULLANIM:
 * $blogManager = new BlogManager();
 * $blogs = $blogManager->getCategoryBlogs('global', 4);
 */

require_once 'BlogConfig.php';

class BlogManager {
    
    private static $cache = [];
    
    /**
     * 🎯 Kategoriye göre blog getir (temel kullanım)
     * 
     * @param string $category Kategori slug'ı ('global', 'teknoloji', vs.)
     * @param int|null $limit Blog sayısı (null = kategorinin varsayılan limiti)
     * @param bool $useCache Cache kullanılsın mı?
     * @return array Blog listesi
     */
    public function getCategoryBlogs($category, $limit = null, $useCache = true) {
        $categoryInfo = BlogConfig::getCategory($category);
        if (!$categoryInfo) {
            return ['error' => 'Kategori bulunamadı: ' . $category];
        }
        
        $limit = $limit ?? $categoryInfo['limit'];
        $cacheKey = BlogConfig::getCacheKey('category', [$category, $limit]);
        
        if ($useCache && isset(self::$cache[$cacheKey])) {
            return self::$cache[$cacheKey];
        }
        
        $params = [
            'category' => $category,
            'limit' => $limit
        ];
        
        $url = BlogConfig::buildApiUrl('posts-by-category', $params);
        $result = $this->makeApiCall($url);
        
        if ($useCache) {
            self::$cache[$cacheKey] = $result;
        }
        
        return $result;
    }
    
    /**
     * 🔥 Kategorideki TÜM blogları getir (Unlimited)
     * 
     * @param string $category Kategori slug'ı
     * @return array Tüm bloglar
     */
    public function getAllCategoryBlogs($category) {
        $params = [
            'category' => $category,
            'limit' => -1  // Unlimited
        ];
        
        $url = BlogConfig::buildApiUrl('posts-by-category', $params);
        return $this->makeApiCall($url);
    }
    
    /**
     * ✋ Manuel seçilmiş blogları getir
     * 
     * @param string $section Hangi bölüm ('homepage', 'sidebar', 'global_page')
     * @param array|null $postIds Custom post ID'leri (null = config'den al)
     * @return array Manuel seçilmiş bloglar
     */
    public function getFeaturedBlogs($section = 'homepage', $postIds = null) {
        $ids = $postIds ?? BlogConfig::getFeaturedPosts($section);
        
        if (empty($ids)) {
            return ['error' => 'Manual post ID\'leri bulunamadı'];
        }
        
        $params = [
            'post_ids' => implode(',', $ids)
        ];
        
        $url = BlogConfig::buildApiUrl('posts-manual-selection', $params);
        return $this->makeApiCall($url);
    }
    
    /**
     * 🚀 Gelişmiş blog filtreleme
     * 
     * @param array $options Filtreleme seçenekleri
     * @return array Filtrelenmiş bloglar
     */
    public function getAdvancedBlogs($options = []) {
        $defaultOptions = [
            'limit' => BlogConfig::DEFAULT_LIMIT,
            'orderby' => 'post_date',
            'order' => 'DESC'
        ];
        
        $params = array_merge($defaultOptions, $options);
        $url = BlogConfig::buildApiUrl('posts-advanced', $params);
        
        return $this->makeApiCall($url);
    }
    
    /**
     * 🏠 Ana sayfa için özelleştirilmiş blog mix'i
     * 
     * @return array Ana sayfa blog verisi
     */
    public function getHomepageBlogs() {
        $excludeCategories = BlogConfig::$excludeCategories['homepage'] ?? [];
        
        return $this->getAdvancedBlogs([
            'limit' => 8,
            'exclude_categories' => implode(',', $excludeCategories),
            'orderby' => 'post_date',
            'order' => 'DESC'
        ]);
    }
    
    /**
     * 🌍 Global sayfası için özelleştirilmiş bloglar
     * 
     * @param bool $showAll Tümünü göster mi?
     * @return array Global sayfa blog verisi
     */
    public function getGlobalPageBlogs($showAll = false) {
        $limit = $showAll ? -1 : 4;
        $excludeCategories = BlogConfig::$excludeCategories['global_page'] ?? [];
        
        $params = [
            'category' => 'global',
            'limit' => $limit
        ];
        
        if (!empty($excludeCategories)) {
            $params['exclude_categories'] = implode(',', $excludeCategories);
        }
        
        $url = BlogConfig::buildApiUrl('posts-by-category', $params);
        return $this->makeApiCall($url);
    }
    
    /**
     * 📋 Mevcut kategorileri listele
     * 
     * @return array Kategori listesi
     */
    public function getAvailableCategories() {
        $url = BlogConfig::buildApiUrl('all-categories');
        return $this->makeApiCall($url);
    }
    
    /**
     * 📄 Sayfalı blog listesi (Pagination)
     * 
     * @param array $options Sayfalama seçenekleri
     * @return array Sayfalı blog verisi
     */
    public function getPaginatedBlogs($options = []) {
        $defaultOptions = [
            'page' => 1,
            'per_page' => 10,
            'orderby' => 'post_date',
            'order' => 'DESC'
        ];
        
        $params = array_merge($defaultOptions, $options);
        $url = BlogConfig::buildApiUrl('posts-paginated', $params);
        
        return $this->makeApiCall($url);
    }
    
    /**
     * 🔧 API çağrısı yap
     * 
     * @param string $url API URL'i
     * @return array API yanıtı
     */
    private function makeApiCall($url) {
        try {
            $response = @file_get_contents($url);
            
            if ($response === false) {
                return [
                    'error' => 'API çağrısı başarısız',
                    'url' => $url,
                    'data' => []
                ];
            }
            
            $decoded = json_decode($response, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [
                    'error' => 'JSON parse hatası: ' . json_last_error_msg(),
                    'raw_response' => $response,
                    'data' => []
                ];
            }
            
            // WordPress Bridge API response format
            if (isset($decoded['data'])) {
                return [
                    'success' => true,
                    'data' => $decoded['data'],
                    'total' => $decoded['total'] ?? count($decoded['data']),
                    'params' => $decoded['params'] ?? [],
                    'message' => $decoded['message'] ?? 'OK'
                ];
            }
            
            return $decoded;
            
        } catch (Exception $e) {
            return [
                'error' => 'Exception: ' . $e->getMessage(),
                'data' => []
            ];
        }
    }
    
    /**
     * 🎨 Blog HTML'ini render et (Basit HTML)
     * 
     * @param array $blogs Blog dizisi
     * @param string $template Template tipi ('card', 'list', 'minimal')
     * @return string HTML output
     */
    public function renderBlogs($blogs, $template = 'card') {
        if (!isset($blogs['data']) || empty($blogs['data'])) {
            return '<div class="no-blogs">Henüz blog bulunamadı.</div>';
        }
        
        $html = '<div class="gmoplus-blogs gmoplus-blogs-' . $template . '">';
        
        foreach ($blogs['data'] as $blog) {
            $html .= $this->renderSingleBlog($blog, $template);
        }
        
        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Tek blog HTML'ini render et
     */
    private function renderSingleBlog($blog, $template) {
        $title = htmlspecialchars($blog['title']);
        $excerpt = htmlspecialchars($blog['excerpt']);
        $img = $blog['img'] ?: '/files/img/default-blog.jpg';
        $url = $blog['url'];
        $date = date('d.m.Y', strtotime($blog['post_date']));
        
        switch ($template) {
            case 'card':
                return "
                <article class='blog-card'>
                    <div class='blog-image'>
                        <img src='{$img}' alt='{$title}'>
                    </div>
                    <div class='blog-content'>
                        <h3 class='blog-title'><a href='{$url}' target='_blank'>{$title}</a></h3>
                        <p class='blog-excerpt'>{$excerpt}</p>
                        <div class='blog-meta'>
                            <span class='blog-date'>{$date}</span>
                        </div>
                    </div>
                </article>";
                
            case 'list':
                return "
                <article class='blog-list-item'>
                    <img src='{$img}' alt='{$title}' class='blog-thumb'>
                    <div class='blog-info'>
                        <h4><a href='{$url}' target='_blank'>{$title}</a></h4>
                        <span class='blog-date'>{$date}</span>
                    </div>
                </article>";
                
            case 'minimal':
                return "
                <div class='blog-minimal'>
                    <a href='{$url}' target='_blank'>{$title}</a>
                    <span class='date'>{$date}</span>
                </div>";
                
            default:
                return "<div class='blog-item'><a href='{$url}' target='_blank'>{$title}</a></div>";
        }
    }
} 