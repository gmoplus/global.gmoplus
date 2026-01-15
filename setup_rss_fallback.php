<?php
// RSS FALLBACK ÇÖZÜMÜ
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: blue;'>RSS FALLBACK ÇÖZÜMÜ</h1>";

// Flynax config yükle
include_once(__DIR__ . '/includes/config.inc.php');

echo "<p style='color: green;'>✓ Config yüklendi</p>";

// Database bağlantısı
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

$blog_url = 'https://blog.global.gmoplus.com';
$rss_url = $blog_url . '/feed/';

echo "<h3>RSS Feed Test:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// RSS feed'i test et
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $rss_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$rss_response = curl_exec($ch);
$rss_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<strong>RSS URL:</strong> " . htmlspecialchars($rss_url) . "<br>";
echo "<strong>HTTP Kodu:</strong> " . $rss_http_code . "<br>";

if ($rss_http_code == 200 && $rss_response) {
    echo "<strong style='color: green;'>✓ RSS feed erişilebilir</strong><br>";
    
    // RSS'i parse et
    $xml = simplexml_load_string($rss_response);
    if ($xml && isset($xml->channel->item)) {
        $posts_count = count($xml->channel->item);
        echo "<strong style='color: green;'>✓ " . min($posts_count, 8) . " blog postu bulundu!</strong><br>";
        
        // İlk 3 postu göster
        $shown = 0;
        foreach ($xml->channel->item as $item) {
            if ($shown >= 3) break;
            echo "<strong>" . ($shown + 1) . ".</strong> " . htmlspecialchars((string)$item->title) . "<br>";
            $shown++;
        }
        
        // RSS blog block'u oluştur
        echo "<br><strong>RSS Blog Block Oluşturuluyor...</strong><br>";
        
        // Yeni RSS tabanlı blog block content'i
        $rss_block_content = '<?php
// RSS Blog Block
$rss_url = "' . $rss_url . '";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $rss_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$rss_response = curl_exec($ch);
$rss_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$recent_posts = array();

if ($rss_http_code == 200 && $rss_response) {
    $xml = @simplexml_load_string($rss_response);
    if ($xml && isset($xml->channel->item)) {
        $count = 0;
        foreach ($xml->channel->item as $item) {
            if ($count >= 8) break;
            
            $post = array();
            $post[\'title\'] = (string)$item->title;
            $post[\'url\'] = (string)$item->link;
            $post[\'post_date\'] = date(\'Y-m-d H:i:s\', strtotime((string)$item->pubDate));
            
            // Description/excerpt
            $description = (string)$item->description;
            if (!empty($description)) {
                $post[\'excerpt\'] = strip_tags($description);
                if (strlen($post[\'excerpt\']) > 150) {
                    $post[\'excerpt\'] = substr($post[\'excerpt\'], 0, 150) . \'...\';
                }
            } else {
                $post[\'excerpt\'] = \'\';
            }
            
            // Try to get image from content
            $content = (string)$item->children(\'http://purl.org/rss/1.0/modules/content/\')->encoded;
            if (empty($content)) {
                $content = (string)$item->description;
            }
            
            if (preg_match(\'/<img[^>]+src=["\\\']([^"\\\']+)["\\\']/i\', $content, $matches)) {
                $post[\'img\'] = $matches[1];
            } else {
                $post[\'img\'] = \'\';
            }
            
            $recent_posts[] = $post;
            $count++;
        }
    }
}

global $rlSmarty;
$rlSmarty->assign("recent_posts", $recent_posts);
$rlSmarty->display(RL_PLUGINS . "wordpressBridge" . RL_DS . "recent_posts.tpl");
?>';
        
        // WordPress Bridge block'unu güncelle
        $update_block = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ? WHERE `Key` = 'wpbridge_last_post' AND Plugin = 'wordpressBridge'";
        $stmt = $connection->prepare($update_block);
        $stmt->bind_param('s', $rss_block_content);
        $result = $stmt->execute();
        
        if ($result) {
            echo "<strong style='color: green;'>✓ RSS Blog Block başarıyla oluşturuldu!</strong><br>";
        } else {
            echo "<strong style='color: red;'>❌ Blog Block güncellenemedi</strong><br>";
        }
        
    } else {
        echo "<strong style='color: red;'>❌ RSS feed parse edilemedi</strong><br>";
    }
} else {
    echo "<strong style='color: red;'>❌ RSS feed erişilemiyor</strong><br>";
}

echo "</div>";

$connection->close();

echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>SONUÇ</h2>";
echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
echo "<h3>YAPMANIZ GEREKENLER:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";

if (isset($rss_http_code) && $rss_http_code == 200) {
    echo "<li><strong style='color: green;'>Ana sayfayı yenileyin (Ctrl+F5) - RSS'ten blog postları görünecek!</strong></li>";
    echo "<li><strong>İSTERSENİZ:</strong> WordPress'te FlynaxBridge plugin'ini yükleyip API çözümüne geçebilirsiniz</li>";
} else {
    echo "<li><strong style='color: red;'>WordPress RSS feed'ini kontrol edin</strong></li>";
}

echo "</ol>";
echo "</div>";
?> 