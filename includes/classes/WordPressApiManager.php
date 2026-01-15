<?php
/**
 * 🔄 WordPress REST API Manager
 * WordPress Bridge plugin'i yerine WordPress'ün native REST API'sini kullanır
 * Daha güvenilir ve stabil çalışır
 */

class WordPressApiManager {
    
    // WordPress REST API Base URL
    const WP_API_BASE = 'https://blog.global.gmoplus.com/wp-json/wp/v2';
    
    private static $cache = [];
    
    /**
     * 🌍 Kategoriye göre blog getir
     * 
     * @param string $categorySlug Kategori slug'ı (global, cozumlerimiz, vb.)
     * @param int $limit Blog sayısı limiti
     * @return array Blog verisi
     */
    public function getCategoryBlogs($categorySlug, $limit = 8) {
        try {
            // Önce kategori ID'sini bul
            $categoryId = $this->getCategoryId($categorySlug);
            
            if (!$categoryId) {
                return [
                    'success' => false,
                    'error' => "Kategori bulunamadı: {$categorySlug}",
                    'data' => []
                ];
            }
            
            // Blogları getir
            $url = self::WP_API_BASE . "/posts?categories={$categoryId}&per_page={$limit}&_embed=1";
            $response = $this->makeApiCall($url);
            
            if (!$response) {
                return [
                    'success' => false,
                    'error' => 'API çağrısı başarısız',
                    'data' => []
                ];
            }
            
            $posts = json_decode($response, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [
                    'success' => false,
                    'error' => 'JSON parse hatası: ' . json_last_error_msg(),
                    'data' => []
                ];
            }
            
            $processedPosts = $this->processPosts($posts);
            
            return [
                'success' => true,
                'data' => $processedPosts,
                'count' => count($processedPosts),
                'total' => $this->getTotalPostsInCategory($categoryId),
                'category' => $categorySlug
            ];
            
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => 'Sistem hatası: ' . $e->getMessage(),
                'data' => []
            ];
        }
    }
    
    /**
     * 🔥 Kategorideki TÜM blogları getir (sınırsız)
     */
    public function getAllCategoryBlogs($categorySlug) {
        return $this->getCategoryBlogs($categorySlug, 100); // Max 100 blog
    }
    
    /**
     * 🏠 Ana sayfa blog karışımı
     */
    public function getHomepageBlogs($limit = 8) {
        // Çeşitli kategorilerden karışık blog alır
        $categories = ['global', 'cozumlerimiz', 'kesfet', 'otomotiv'];
        $allBlogs = [];
        
        foreach ($categories as $category) {
            $categoryBlogs = $this->getCategoryBlogs($category, 2);
            if ($categoryBlogs['success'] && !empty($categoryBlogs['data'])) {
                $allBlogs = array_merge($allBlogs, $categoryBlogs['data']);
            }
        }
        
        // Karıştır ve limit uygula
        shuffle($allBlogs);
        $allBlogs = array_slice($allBlogs, 0, $limit);
        
        return [
            'success' => true,
            'data' => $allBlogs,
            'count' => count($allBlogs),
            'type' => 'homepage_mix'
        ];
    }
    
    /**
     * ⭐ Manuel seçilmiş bloglar
     */
    public function getFeaturedBlogs($postIds = []) {
        if (empty($postIds)) {
            // BlogConfig'den al
            $postIds = [1, 2, 3, 4]; // Örnek ID'ler, gerçek ID'lerle değiştirin
        }
        
        $posts = [];
        foreach ($postIds as $postId) {
            $url = self::WP_API_BASE . "/posts/{$postId}?_embed=1";
            $response = $this->makeApiCall($url);
            
            if ($response) {
                $post = json_decode($response, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $posts[] = $post;
                }
            }
        }
        
        $processedPosts = $this->processPosts($posts);
        
        return [
            'success' => true,
            'data' => $processedPosts,
            'count' => count($processedPosts),
            'type' => 'featured'
        ];
    }
    
    /**
     * 📋 Mevcut kategorileri listele
     */
    public function getCategories() {
        $url = self::WP_API_BASE . '/categories?per_page=50';
        $response = $this->makeApiCall($url);
        
        if (!$response) {
            return [];
        }
        
        $categories = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }
        
        return $categories;
    }
    
    /**
     * 🔍 Kategori slug'ından ID bul
     */
    private function getCategoryId($categorySlug) {
        $cacheKey = "category_id_{$categorySlug}";
        
        if (isset(self::$cache[$cacheKey])) {
            return self::$cache[$cacheKey];
        }
        
        $url = self::WP_API_BASE . "/categories?slug={$categorySlug}";
        $response = $this->makeApiCall($url);
        
        if (!$response) {
            return null;
        }
        
        $categories = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE || empty($categories)) {
            return null;
        }
        
        $categoryId = $categories[0]['id'] ?? null;
        self::$cache[$cacheKey] = $categoryId;
        
        return $categoryId;
    }
    
    /**
     * 📊 Kategorideki toplam blog sayısını al
     */
    private function getTotalPostsInCategory($categoryId) {
        $url = self::WP_API_BASE . "/posts?categories={$categoryId}&per_page=1";
        
        $context = stream_context_create([
            'http' => [
                'method' => 'HEAD',
                'timeout' => 10
            ]
        ]);
        
        $response = @file_get_contents($url, false, $context);
        
        if (isset($http_response_header)) {
            foreach ($http_response_header as $header) {
                if (strpos($header, 'X-WP-Total:') === 0) {
                    return (int)trim(str_replace('X-WP-Total:', '', $header));
                }
            }
        }
        
        return 0;
    }
    
    /**
     * 🌐 API çağrısı yap
     */
    private function makeApiCall($url) {
        $context = stream_context_create([
            'http' => [
                'timeout' => 15,
                'user_agent' => 'WordPress API Client/1.0',
                'method' => 'GET'
            ]
        ]);
        
        return @file_get_contents($url, false, $context);
    }
    
    /**
     * ⚙️ Blog verilerini işle ve standartlaştır
     */
    private function processPosts($posts) {
        $processedPosts = [];
        
        foreach ($posts as $post) {
            $processedPost = [
                'id' => $post['id'] ?? 0,
                'title' => $post['title']['rendered'] ?? 'Başlıksız',
                'excerpt' => $post['excerpt']['rendered'] ?? '',
                'content' => $post['content']['rendered'] ?? '',
                'link' => $post['link'] ?? '#',
                'date' => $post['date'] ?? '',
                'author' => $post['_embedded']['author'][0]['name'] ?? 'Bilinmeyen',
                'featured_image' => $this->getFeaturedImage($post),
                'categories' => $this->getPostCategories($post)
            ];
            
            // Excerpt'i temizle
            $processedPost['excerpt'] = strip_tags($processedPost['excerpt']);
            $processedPost['excerpt'] = substr($processedPost['excerpt'], 0, 150) . '...';
            
            $processedPosts[] = $processedPost;
        }
        
        return $processedPosts;
    }
    
    /**
     * 🖼️ Öne çıkan görseli al
     */
    private function getFeaturedImage($post) {
        if (isset($post['_embedded']['wp:featuredmedia'][0]['source_url'])) {
            return $post['_embedded']['wp:featuredmedia'][0]['source_url'];
        }
        
        // Varsayılan resim
        return 'https://via.placeholder.com/300x200?text=Blog+Image';
    }
    
    /**
     * 🏷️ Blog kategorilerini al
     */
    private function getPostCategories($post) {
        $categories = [];
        
        if (isset($post['_embedded']['wp:term'][0])) {
            foreach ($post['_embedded']['wp:term'][0] as $category) {
                $categories[] = $category['name'] ?? '';
            }
        }
        
        return $categories;
    }
    
    /**
     * 🎨 HTML render
     */
    public function renderBlogs($blogsData, $template = 'card') {
        if (!isset($blogsData['data']) || empty($blogsData['data'])) {
            return '<div class="no-blogs">Henüz blog bulunamadı.</div>';
        }
        
        $html = '<div class="gmoplus-blogs-' . $template . '">';
        
        foreach ($blogsData['data'] as $blog) {
            $html .= $this->renderSingleBlog($blog, $template);
        }
        
        $html .= '</div>';
        
        // CSS ekle
        $html .= $this->getBlogCSS();
        
        return $html;
    }
    
    /**
     * 🎨 Tek blog render
     */
    private function renderSingleBlog($blog, $template) {
        switch ($template) {
            case 'card':
                return "
                <div class='blog-card'>
                    <div class='blog-image'>
                        <img src='{$blog['featured_image']}' alt='{$blog['title']}'>
                    </div>
                    <div class='blog-content'>
                        <h3 class='blog-title'>
                            <a href='{$blog['link']}' target='_blank'>{$blog['title']}</a>
                        </h3>
                        <p class='blog-excerpt'>{$blog['excerpt']}</p>
                        <div class='blog-meta'>
                            <span class='blog-author'>{$blog['author']}</span> • 
                            <span class='blog-date'>" . date('d.m.Y', strtotime($blog['date'])) . "</span>
                        </div>
                    </div>
                </div>";
                
            case 'list':
                return "
                <div class='blog-list-item'>
                    <img src='{$blog['featured_image']}' class='blog-thumb'>
                    <div class='blog-info'>
                        <h4><a href='{$blog['link']}' target='_blank'>{$blog['title']}</a></h4>
                        <p>{$blog['excerpt']}</p>
                        <small>{$blog['author']} • " . date('d.m.Y', strtotime($blog['date'])) . "</small>
                    </div>
                </div>";
                
            default:
                return "
                <div class='blog-minimal'>
                    <h5><a href='{$blog['link']}' target='_blank'>{$blog['title']}</a></h5>
                    <small>" . date('d.m.Y', strtotime($blog['date'])) . "</small>
                </div>";
        }
    }
    
    /**
     * 🎨 Blog CSS
     */
    private function getBlogCSS() {
        return "
        <style>
        .gmoplus-blogs-card { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin: 20px 0; }
        .blog-card { border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden; background: white; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .blog-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        .blog-image img { width: 100%; height: 220px; object-fit: cover; }
        .blog-content { padding: 20px; }
        .blog-title a { color: #2c3e50; text-decoration: none; font-weight: 600; font-size: 18px; line-height: 1.3; }
        .blog-title a:hover { color: #3498db; }
        .blog-excerpt { color: #7f8c8d; margin: 15px 0; line-height: 1.6; }
        .blog-meta { color: #bdc3c7; font-size: 13px; border-top: 1px solid #ecf0f1; padding-top: 15px; }
        
        .gmoplus-blogs-list .blog-list-item { display: flex; gap: 15px; padding: 15px; border-bottom: 1px solid #ecf0f1; }
        .blog-thumb { width: 100px; height: 80px; object-fit: cover; border-radius: 8px; }
        
        .no-blogs { text-align: center; padding: 40px; color: #666; background: #f8f9fa; border-radius: 8px; }
        </style>";
    }
}
?> 