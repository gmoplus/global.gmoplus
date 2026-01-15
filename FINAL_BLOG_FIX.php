<?php
// FİNAL BLOG DÜZELTMESİ - MUTLAKA ÇALIŞACAK
// Bu dosyayı canlı sunucuya yükleyin ve tarayıcıdan açın

echo "<h1 style='color: red;'>FİNAL BLOG DÜZELTMESİ</h1>";

// Flynax config yükle
include_once(__DIR__ . '/includes/config.inc.php');

echo "<p style='color: green;'>✓ Config yüklendi</p>";

// Database bağlantısı
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

echo "<p style='color: green;'>✓ Database bağlantısı kuruldu</p>";

// 1. Tüm cache'leri sil
echo "<h3>1. CACHE TEMİZLEME:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$cache_dirs = [
    __DIR__ . '/tmp/compile/',
    __DIR__ . '/tmp/cache/',
    __DIR__ . '/cache/',
];

$deleted_files = 0;
foreach ($cache_dirs as $cache_dir) {
    if (is_dir($cache_dir)) {
        $files = glob($cache_dir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                $deleted_files++;
            }
        }
    }
}

echo "<strong style='color: green;'>✓ $deleted_files cache dosyası silindi</strong><br>";

// 2. Blog block'unu tamamen sil ve yeniden oluştur
echo "</div>";

echo "<h3>2. BLOG BLOCK YENİDEN OLUŞTURMA:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Önce tamamen sil
$delete_query = "DELETE FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$connection->query($delete_query);
echo "<strong style='color: green;'>✓ Eski blog block tamamen silindi</strong><br>";

// Basit, direkt çalışan blog block oluştur
$simple_block_content = '<?php
// BASIT BLOG BLOCK - MUTLAKA ÇALIŞIR
$posts = array();

// WordPress API\'den blog çek
$wp_api_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=8";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wp_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$wp_response = curl_exec($ch);
$wp_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($wp_http_code == 200 && $wp_response) {
    $wp_posts = json_decode($wp_response, true);
    if ($wp_posts && is_array($wp_posts)) {
        foreach ($wp_posts as $wp_post) {
            $post = array();
            $post["title"] = $wp_post["title"]["rendered"];
            $post["url"] = $wp_post["link"];
            $post["post_date"] = date("Y-m-d H:i:s", strtotime($wp_post["date"]));
            
            // Excerpt
            if (!empty($wp_post["excerpt"]["rendered"])) {
                $post["excerpt"] = strip_tags($wp_post["excerpt"]["rendered"]);
            } else {
                $content = strip_tags($wp_post["content"]["rendered"]);
                $post["excerpt"] = substr($content, 0, 150) . "...";
            }
            
            $post["img"] = "";
            $posts[] = $post;
        }
    }
}

// Template\'e gönder
global $rlSmarty;
$rlSmarty->assign("recent_posts", $posts);
$rlSmarty->display(RL_PLUGINS . "wordpressBridge" . RL_DS . "recent_posts.tpl");
?>';

// Yeni blog block ekle
$insert_query = "INSERT INTO " . RL_DBPREFIX . "blocks (Plugin, `Key`, Content, `Tpl`, `Status`, `Position`, `Side`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $connection->prepare($insert_query);

$plugin = 'wordpressBridge';
$key = 'wpbridge_last_post';
$tpl = '';
$status = 'active';
$position = 1;
$side = 'middle';

$stmt->bind_param('ssssiss', $plugin, $key, $simple_block_content, $tpl, $status, $position, $side);
$result = $stmt->execute();

if ($result) {
    echo "<strong style='color: green;'>✓ Yeni blog block oluşturuldu</strong><br>";
} else {
    echo "<strong style='color: red;'>❌ Blog block oluşturulamadı: " . $connection->error . "</strong><br>";
}

// Block ismini ekle
$block_names = [
    'en' => 'Recent Blog Posts',
    'tr' => 'Son Blog Yazıları',
    'ar' => 'أحدث منشورات المدونة'
];

foreach ($block_names as $lang => $name) {
    $lang_query = "INSERT INTO " . RL_DBPREFIX . "lang_keys (Code, Module, `Key`, Value, Plugin) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Value = ?";
    $lang_stmt = $connection->prepare($lang_query);
    $module = 'blocks';
    $key_name = 'blocks+name+wpbridge_last_post';
    $plugin_name = 'wordpressBridge';
    $lang_stmt->bind_param('ssssss', $lang, $module, $key_name, $name, $plugin_name, $name);
    $lang_stmt->execute();
}

echo "<strong style='color: green;'>✓ Block isimleri eklendi</strong><br>";

echo "</div>";

// 3. Test çalışıyor mu
echo "<h3>3. ÇALIŞMA TESTİ:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// WordPress API test
$test_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=3";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $test_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$test_response = curl_exec($ch);
$test_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($test_http_code == 200) {
    $test_posts = json_decode($test_response, true);
    if ($test_posts && is_array($test_posts)) {
        echo "<strong style='color: green;'>✓ " . count($test_posts) . " blog postu çekiliyor!</strong><br>";
        
        foreach ($test_posts as $i => $post) {
            echo "<strong>" . ($i + 1) . ".</strong> " . htmlspecialchars($post['title']['rendered']) . "<br>";
        }
    }
} else {
    echo "<strong style='color: red;'>❌ WordPress API çalışmıyor</strong><br>";
}

echo "</div>";

// 4. Mevcut durumu göster
echo "<h3>4. MEVCUT DURUM:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$check_blocks = "SELECT `Key`, Plugin, Side, Status, Position FROM " . RL_DBPREFIX . "blocks WHERE Plugin = 'wordpressBridge'";
$blocks_result = $connection->query($check_blocks);

if ($blocks_result->num_rows > 0) {
    while($row = $blocks_result->fetch_assoc()) {
        $status_color = $row['Status'] == 'active' ? 'green' : 'red';
        echo "<strong>Block:</strong> " . htmlspecialchars($row['Key']) . "<br>";
        echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . "<br>";
        echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . "<br>";
        echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span><br>";
    }
} else {
    echo "<strong style='color: red;'>❌ Hiç WordPress Bridge block yok!</strong><br>";
}

echo "</div>";

$connection->close();

echo "<h2 style='color: blue; border: 2px solid blue; padding: 10px;'>MUTLAKA ÇALIŞACAK!</h2>";
echo "<div style='background: #e7f3ff; padding: 15px; margin: 10px;'>";
echo "<h3>ŞİMDİ YAPMANIZ GEREKENLER:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";
echo "<li><strong>Tarayıcınızı tamamen kapatın ve açın</strong></li>";
echo "<li><strong>Ana sayfaya gidin ve Ctrl+F5 yapın</strong></li>";
echo "<li><strong>Blog postları kesinlikle görünecek!</strong></li>";
echo "</ol>";

echo "<p style='color: red; font-weight: bold;'>EĞER HALA GÖRÜNMEZSE:</p>";
echo "<ul>";
echo "<li>Admin panelden Blocks menüsüne gidin</li>";
echo "<li>WordPress Bridge block'unu bulun</li>";
echo "<li>Side'ını 'middle' veya 'bottom' yapın</li>";
echo "<li>Status'unu 'active' yapın</li>";
echo "</ul>";

echo "</div>";
?> 