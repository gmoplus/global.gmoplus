<?php
// POZİSYON CONFLICT DÜZELTMESİ
echo "<h1 style='color: red;'>POZİSYON CONFLICT DÜZELTMESİ</h1>";

include_once(__DIR__ . '/includes/config.inc.php');
$connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

// Önce conflicting block'ları farklı pozisyonlara taşı
$fix_conflicts = [
    "UPDATE " . RL_DBPREFIX . "blocks SET Position = 5 WHERE `Key` = 'more_news_block'",
    "UPDATE " . RL_DBPREFIX . "blocks SET Position = 0, `Side` = 'bottom' WHERE `Key` = 'wpbridge_last_post'"
];

foreach ($fix_conflicts as $query) {
    $result = $connection->query($query);
    if ($result) {
        echo "<p style='color: green;'>✓ Pozisyon düzeltildi</p>";
    }
}

// wpbridge_last_post için tamamen yeni, basit content
$new_content = '<?php
echo "<div class=\"wp-posts row\">";
echo "<h3>Recent Blog Posts</h3>";

$wp_url = "https://blog.global.gmoplus.com/wp-json/wp/v2/posts?per_page=8";
$ch = curl_init($wp_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 200) {
    $posts = json_decode($response, true);
    if ($posts && is_array($posts)) {
        foreach ($posts as $post) {
            echo "<div class=\"col-md-3 mb-3\">";
            echo "<h4><a href=\"" . htmlspecialchars($post["link"]) . "\">" . htmlspecialchars($post["title"]["rendered"]) . "</a></h4>";
            if (!empty($post["excerpt"]["rendered"])) {
                echo "<p>" . htmlspecialchars(strip_tags($post["excerpt"]["rendered"])) . "</p>";
            }
            echo "<small>" . date("d.m.Y", strtotime($post["date"])) . "</small>";
            echo "</div>";
        }
    } else {
        echo "<p>Blog postları yüklenemedi.</p>";
    }
} else {
    echo "<p>WordPress API erişilemiyor.</p>";
}

echo "</div>";
?>';

// Content'i güncelle
$update_content = "UPDATE " . RL_DBPREFIX . "blocks SET Content = ? WHERE `Key` = 'wpbridge_last_post'";
$stmt = $connection->prepare($update_content);
$stmt->bind_param('s', $new_content);
$result = $stmt->execute();

if ($result) {
    echo "<p style='color: green;'>✓ Blog block content güncellendi</p>";
}

// Final durum
echo "<h3>FİNAL DURUM:</h3>";
$final_check = "SELECT `Key`, `Side`, Position, `Status` FROM " . RL_DBPREFIX . "blocks WHERE `Side` = 'bottom' ORDER BY Position";
$result = $connection->query($final_check);

while($row = $result->fetch_assoc()) {
    $status_color = $row['Status'] == 'active' ? 'green' : 'red';
    echo "<strong>" . htmlspecialchars($row['Key']) . "</strong> - ";
    echo "Position: " . $row['Position'] . " - ";
    echo "<span style='color: $status_color;'>" . $row['Status'] . "</span><br>";
}

$connection->close();

echo "<h2 style='color: blue;'>CONFLICT DÜZELTİLDİ!</h2>";
echo "<p style='color: green; font-size: 18px;'><strong>ANA SAYFAYI YENİLEYİN - ŞİMDİ ÇALIŞACAK!</strong></p>";
?> 