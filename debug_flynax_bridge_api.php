<?php
// FLYNAXBRIDGE API DEBUG
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>FLYNAXBRIDGE API DEBUG</h1>";

$blog_url = 'https://blog.global.gmoplus.com';

echo "<p style='color: green;'>WordPress URL: " . htmlspecialchars($blog_url) . "</p>";

// Farklı API endpoint'lerini test et
$api_endpoints = [
    '/wp-json/flynax-bridge/v1/recent-posts',
    '/wp-json/flynaxbridge/v1/recent-posts', 
    '/wp-json/flynax/v1/recent-posts',
    '/wp-json/bridge/v1/recent-posts',
    '/wp-json/wp/v2/posts',  // WordPress standart API
    '/wp-json/',  // Base API
];

echo "<h3>API Endpoint Test:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

foreach ($api_endpoints as $endpoint) {
    $full_url = rtrim($blog_url, '/') . $endpoint;
    if ($endpoint !== '/wp-json/') {
        $full_url .= '?limit=3';
    }
    
    echo "<strong>Test:</strong> " . htmlspecialchars($full_url) . "<br>";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $full_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'FlynaxBridge-Test/1.0');
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "<strong>HTTP:</strong> " . $http_code . " ";
    
    if ($http_code == 200) {
        echo "<strong style='color: green;'>✓ ÇALIŞIYOR!</strong><br>";
        
        $json_data = json_decode($response, true);
        if ($json_data) {
            if (isset($json_data['data'])) {
                echo "<strong style='color: green;'>FlynaxBridge format - " . count($json_data['data']) . " post</strong><br>";
            } elseif (isset($json_data[0]['title'])) {
                echo "<strong style='color: green;'>WordPress API format - " . count($json_data) . " post</strong><br>";
            } else {
                echo "<strong>Response:</strong> " . htmlspecialchars(substr($response, 0, 100)) . "...<br>";
            }
        }
        echo "<br>";
    } elseif ($http_code == 404) {
        echo "<strong style='color: red;'>❌ Bulunamadı</strong><br>";
    } else {
        echo "<strong style='color: orange;'>⚠ Hata: " . $http_code . "</strong><br>";
    }
    echo "<br>";
}

echo "</div>";

// WordPress API ile standart post çekme testi
echo "<h3>WordPress Standart API Test:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$wp_api_url = rtrim($blog_url, '/') . '/wp-json/wp/v2/posts?per_page=3';
echo "<strong>URL:</strong> " . htmlspecialchars($wp_api_url) . "<br>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wp_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$wp_response = curl_exec($ch);
$wp_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<strong>HTTP Kodu:</strong> " . $wp_http_code . "<br>";

if ($wp_http_code == 200) {
    echo "<strong style='color: green;'>✓ WordPress API çalışıyor!</strong><br>";
    
    $wp_posts = json_decode($wp_response, true);
    if ($wp_posts && is_array($wp_posts)) {
        echo "<strong style='color: green;'>✓ " . count($wp_posts) . " blog postu bulundu!</strong><br>";
        
        echo "<strong>Blog Postları:</strong><br>";
        foreach ($wp_posts as $i => $post) {
            echo ($i + 1) . ". " . htmlspecialchars($post['title']['rendered']) . "<br>";
        }
        
        // WordPress API ile blog block oluştur
        echo "<br><strong>WordPress API Blog Block Oluşturuluyor...</strong><br>";
        
        $wp_block_content = '<?php
// WordPress API Blog Block
$wp_api_url = "' . rtrim($blog_url, '/') . '/wp-json/wp/v2/posts?per_page=8";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wp_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$wp_response = curl_exec($ch);
$wp_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$recent_posts = array();

if ($wp_http_code == 200 && $wp_response) {
    $wp_posts = json_decode($wp_response, true);
    if ($wp_posts && is_array($wp_posts)) {
        foreach ($wp_posts as $wp_post) {
            $post = array();
            $post[\'title\'] = $wp_post[\'title\'][\'rendered\'];
            $post[\'url\'] = $wp_post[\'link\'];
            $post[\'post_date\'] = date(\'Y-m-d H:i:s\', strtotime($wp_post[\'date\']));
            
            // Excerpt
            if (!empty($wp_post[\'excerpt\'][\'rendered\'])) {
                $post[\'excerpt\'] = strip_tags($wp_post[\'excerpt\'][\'rendered\']);
            } else {
                $content = strip_tags($wp_post[\'content\'][\'rendered\']);
                $post[\'excerpt\'] = substr($content, 0, 150) . \'...\';
            }
            
            // Featured image
            if (!empty($wp_post[\'featured_media\'])) {
                $media_url = "' . rtrim($blog_url, '/') . '/wp-json/wp/v2/media/" . $wp_post[\'featured_media\'];
                $media_ch = curl_init();
                curl_setopt($media_ch, CURLOPT_URL, $media_url);
                curl_setopt($media_ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($media_ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($media_ch, CURLOPT_SSL_VERIFYPEER, false);
                
                $media_response = curl_exec($media_ch);
                curl_close($media_ch);
                
                $media_data = json_decode($media_response, true);
                if ($media_data && isset($media_data[\'source_url\'])) {
                    $post[\'img\'] = $media_data[\'source_url\'];
                } else {
                    $post[\'img\'] = \'\';
                }
            } else {
                $post[\'img\'] = \'\';
            }
            
            $recent_posts[] = $post;
        }
    }
}

global $rlSmarty;
$rlSmarty->assign("recent_posts", $recent_posts);
$rlSmarty->display(RL_PLUGINS . "wordpressBridge" . RL_DS . "recent_posts.tpl");
?>';
        
        // Database bağlantısı
        include_once(__DIR__ . '/includes/config.inc.php');
        $connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);
        
        if (!$connection->connect_error) {
            // Blog block'u güncelle
            $update_block = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ? WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
            $stmt = $connection->prepare($update_block);
            $stmt->bind_param('s', $wp_block_content);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<strong style='color: green;'>✓ WordPress API Blog Block başarıyla oluşturuldu!</strong><br>";
            } else {
                echo "<strong style='color: red;'>❌ Blog Block güncellenemedi</strong><br>";
            }
            
            $connection->close();
        }
    }
} else {
    echo "<strong style='color: red;'>❌ WordPress API erişilemiyor</strong><br>";
}

echo "</div>";

echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>SONUÇ</h2>";
echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
echo "<h3>YAPMANIZ GEREKENLER:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";

if (isset($wp_http_code) && $wp_http_code == 200) {
    echo "<li><strong style='color: green;'>Ana sayfayı yenileyin (Ctrl+F5) - WordPress API'den blog postları görünecek!</strong></li>";
} else {
    echo "<li><strong style='color: red;'>WordPress API'sini kontrol edin</strong></li>";
}

echo "</ol>";
echo "</div>";
?> 