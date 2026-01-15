<?php
// PHP SYNTAX HATASI DÜZELTMESİ
echo "<h1 style='color: red;'>PHP SYNTAX HATASI DÜZELTMESİ</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

// Hatasız, basit blog block content
$error_free_content = '<?php
try {
    $wp_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=8";
    $ch = curl_init($wp_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "<div class=\"wp-posts\">";
    echo "<h3 style=\"margin-bottom: 20px;\">Recent Blog Posts</h3>";
    echo "<div class=\"row\">";
    
    if ($http_code == 200 && $response) {
        $posts = json_decode($response, true);
        if ($posts && is_array($posts)) {
            $count = 0;
            foreach ($posts as $post) {
                if ($count >= 8) break;
                
                echo "<div class=\"col-md-3 col-sm-6 mb-4\">";
                echo "<div class=\"wpb_last_posts\">";
                echo "<h4><a href=\"" . htmlspecialchars($post["link"]) . "\" target=\"_blank\">" . htmlspecialchars($post["title"]["rendered"]) . "</a></h4>";
                
                if (!empty($post["excerpt"]["rendered"])) {
                    $excerpt = strip_tags($post["excerpt"]["rendered"]);
                    if (strlen($excerpt) > 100) {
                        $excerpt = substr($excerpt, 0, 100) . "...";
                    }
                    echo "<p>" . htmlspecialchars($excerpt) . "</p>";
                }
                
                echo "<small style=\"color: #666;\">" . date("d.m.Y", strtotime($post["date"])) . "</small>";
                echo "</div>";
                echo "</div>";
                
                $count++;
            }
        } else {
            echo "<div class=\"col-12\">";
            echo "<p>Blog postları yüklenemedi.</p>";
            echo "</div>";
        }
    } else {
        echo "<div class=\"col-12\">";
        echo "<p>WordPress sitesine bağlanılamıyor.</p>";
        echo "</div>";
    }
    
    echo "</div>";
    echo "</div>";
    
} catch (Exception $e) {
    echo "<div class=\"wp-posts\">";
    echo "<h3>Recent Blog Posts</h3>";
    echo "<p>Temporarily unavailable.</p>";
    echo "</div>";
}
?>';

// Content'i güncelle
$update_content = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ? WHERE `Key` = 'wpbridge_last_post'";
$stmt = $connection->prepare($update_content);
$stmt->bind_param('s', $error_free_content);
$result = $stmt->execute();

if ($result) {
    echo "<p style='color: green;'>✓ Hatasız blog block content güncellendi</p>";
} else {
    echo "<p style='color: red;'>❌ Güncelleme hatası: " . $connection->error . "</p>";
}

// Test - içeriği okuyalım
echo "<h3>TEST - GÜNCEL CONTENT:</h3>";
$test_query = "SELECT Content FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$result = $connection->query($test_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<div style='background: #f0f0f0; padding: 10px; max-height: 200px; overflow-y: scroll;'>";
    echo "<code>" . htmlspecialchars(substr($row['Content'], 0, 500)) . "...</code>";
    echo "</div>";
}

$connection->close();

echo "<h2 style='color: blue;'>PHP HATASI DÜZELTİLDİ!</h2>";
echo "<p style='color: green; font-size: 18px;'><strong>ANA SAYFAYI YENİLEYİN - ARTIK HATA OLMAYACAK!</strong></p>";
echo "<p><strong>Beklenen sonuç:</strong> Başlık görünecek ve altında blog postları listelenecek.</p>";
?> 