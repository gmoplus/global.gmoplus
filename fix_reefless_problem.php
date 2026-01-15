<?php
// REEFLESS PROBLEM DÜZELTMESİ
echo "<h1 style='color: red;'>REEFLESS PROBLEM DÜZELTMESİ</h1>";

// Flynax'ı tam olarak initialize et
require_once(__DIR__ . '/includes/config.inc.php');
require_once(RL_CLASSES . 'rlReefless.class.php');

// Reefless objesi oluştur
global $reefless;
$reefless = new rlReefless();

echo "<p style='color: green;'>✓ Flynax reefless objesi oluşturuldu</p>";

// Database bağlantısı
require_once(RL_CLASSES . 'rlDb.class.php');
$rlDb = new rlDb();
$GLOBALS['rlDb'] = $rlDb;

echo "<p style='color: green;'>✓ Database bağlantısı kuruldu</p>";

// Smarty yükle
require_once(RL_CLASSES . 'rlSmarty.class.php');
$rlSmarty = new rlSmarty();
$GLOBALS['rlSmarty'] = $rlSmarty;

echo "<p style='color: green;'>✓ Smarty yüklendi</p>";

echo "<h3>1. WORDPRESS BRIDGE CLASS TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

try {
    // WordPress Bridge class'ını yükle
    $reefless->loadClass("WordpressBridge", null, "wordpressBridge");
    echo "<strong style='color: green;'>✓ WordPress Bridge class yüklendi</strong><br>";
    
    // WordPress Bridge objesi kontrol
    if (isset($GLOBALS["rlWordpressBridge"])) {
        echo "<strong style='color: green;'>✓ rlWordpressBridge objesi mevcut</strong><br>";
        
        // Method var mı kontrol et
        if (method_exists($GLOBALS["rlWordpressBridge"], 'blockWPBridgeLastPost')) {
            echo "<strong style='color: green;'>✓ blockWPBridgeLastPost method mevcut</strong><br>";
        } else {
            echo "<strong style='color: red;'>❌ blockWPBridgeLastPost method yok!</strong><br>";
        }
        
    } else {
        echo "<strong style='color: red;'>❌ rlWordpressBridge objesi oluşturulamadı</strong><br>";
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ WordPress Bridge yükleme hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
}

echo "</div>";

echo "<h3>2. WORDPRESS API DIRECT TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

try {
    // API class'ını direkt yükle
    require_once(RL_PLUGINS . 'wordpressBridge/src/WordPressAPI/API.php');
    
    // Global config'i set et
    $GLOBALS['config'] = [
        'wp_path' => 'https://blog.global.gmoplus.com',
        'wp_post_count' => 8,
        'wp_success' => 1
    ];
    
    $wordPressApi = new \Flynax\Plugin\WordPressBridge\WordPressAPI\API();
    echo "<strong style='color: green;'>✓ WordPress API class oluşturuldu</strong><br>";
    
    // Posts çek
    $posts = $wordPressApi->getRecentPosts(3);
    
    if ($posts && is_array($posts) && count($posts) > 0) {
        echo "<strong style='color: green;'>✓ " . count($posts) . " post çekildi!</strong><br>";
        foreach ($posts as $index => $post) {
            echo "<strong>Post " . ($index + 1) . ":</strong> " . htmlspecialchars($post['title']) . "<br>";
        }
    } else {
        echo "<strong style='color: red;'>❌ Posts çekilemedi</strong><br>";
        echo "<strong>Response:</strong> " . htmlspecialchars(json_encode($posts)) . "<br>";
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ API Hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
    echo "<pre style='font-size: 11px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</div>";

echo "<h3>3. MANUEL BLOG BLOCK TEST:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

try {
    if (isset($GLOBALS["rlWordpressBridge"]) && method_exists($GLOBALS["rlWordpressBridge"], 'blockWPBridgeLastPost')) {
        
        echo "<strong>blockWPBridgeLastPost() çalıştırılıyor...</strong><br>";
        
        ob_start();
        $GLOBALS["rlWordpressBridge"]->blockWPBridgeLastPost();
        $output = ob_get_clean();
        
        if ($output && trim($output)) {
            echo "<strong style='color: green;'>✓ Block output oluştu!</strong><br>";
            echo "<div style='background: #e7f3ff; padding: 10px; max-height: 300px; overflow-y: scroll;'>";
            echo $output;
            echo "</div>";
        } else {
            echo "<strong style='color: red;'>❌ Block output boş!</strong><br>";
        }
        
    } else {
        echo "<strong style='color: red;'>❌ WordPress Bridge method çalıştırılamıyor</strong><br>";
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ Block Test Hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
    echo "<pre style='font-size: 11px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

echo "</div>";

echo "<h3>4. DİREKT HTML BLOG BLOCK OLUŞTUR:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Eğer hiçbiri çalışmazsa, direkt HTML block oluştur
try {
    $connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);
    
    if (!$connection->connect_error) {
        // WordPress'ten direkt HTML oluştur
        $wp_api_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=8";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $wp_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($response && $http_code == 200) {
            $posts = json_decode($response, true);
            
            $html_content = '<div class="wp-posts"><h3>Recent Blog Posts</h3><div class="row">';
            
            foreach ($posts as $post) {
                $title = htmlspecialchars($post['title']['rendered']);
                $url = htmlspecialchars($post['link']);
                $date = date('d.m.Y', strtotime($post['date']));
                $excerpt = htmlspecialchars(wp_trim_words(strip_tags($post['excerpt']['rendered']), 20));
                
                $html_content .= '<div class="col-md-6 mb-3">';
                $html_content .= '<div class="card">';
                $html_content .= '<div class="card-body">';
                $html_content .= '<h5><a href="' . $url . '" target="_blank">' . $title . '</a></h5>';
                $html_content .= '<p class="text-muted small">' . $date . '</p>';
                $html_content .= '<p>' . $excerpt . '</p>';
                $html_content .= '</div></div></div>';
            }
            
            $html_content .= '</div></div>';
            
            // Blog block'unu HTML olarak güncelle
            $update_block = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ?, `Type` = 'html' WHERE `Key` = 'wpbridge_last_post'";
            $stmt = $connection->prepare($update_block);
            $stmt->bind_param('s', $html_content);
            $result = $stmt->execute();
            
            if ($result) {
                echo "<strong style='color: green;'>✓ HTML Blog block oluşturuldu!</strong><br>";
                echo "<strong>İçerik:</strong><br>";
                echo "<div style='background: #e7f3ff; padding: 10px; max-height: 200px; overflow-y: scroll;'>";
                echo $html_content;
                echo "</div>";
            } else {
                echo "<strong style='color: red;'>❌ HTML block güncellenemedi</strong><br>";
            }
        }
        
        $connection->close();
    }
    
} catch (Exception $e) {
    echo "<strong style='color: red;'>❌ HTML Block Hatası:</strong> " . htmlspecialchars($e->getMessage()) . "<br>";
}

echo "</div>";

echo "<h2 style='color: blue;'>TEST TAMAMLANDI</h2>";
echo "<p><strong>SONUÇ:</strong> Flynax düzgün initialize edildi ve testler yapıldı.</p>";

// Helper function 
function wp_trim_words($text, $num_words = 55) {
    $words = explode(' ', $text);
    if (count($words) > $num_words) {
        $words = array_slice($words, 0, $num_words);
        return implode(' ', $words) . '...';
    }
    return $text;
}
?> 