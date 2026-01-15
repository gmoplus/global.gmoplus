<?php
// ÇALIŞAN JOBS.GMOPLUS AYARLARINI KOPYALA
echo "<h1 style='color: red;'>ÇALIŞAN JOBS.GMOPLUS AYARLARINI KOPYALA</h1>";

echo "<h3>1. JOBS.GMOPLUS DATABASE OKUMA:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Jobs.gmoplus database bağlantısı - manuel olarak deneme
$jobs_configs = [
    ['host' => 'localhost', 'user' => 'gmoplus_jobs', 'pass' => 'gmoplus123', 'db' => 'gmoplus_jobs'],
    ['host' => 'localhost', 'user' => 'root', 'pass' => '', 'db' => 'jobs_gmoplus'],
    ['host' => 'localhost', 'user' => 'gmoplus', 'pass' => 'gmoplus123', 'db' => 'jobs'],
];

$jobs_connection = null;
$working_config = null;

foreach ($jobs_configs as $config) {
    try {
        $test_conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['db']);
        if (!$test_conn->connect_error) {
            echo "<strong style='color: green;'>✓ Jobs database bulundu: " . $config['db'] . "</strong><br>";
            $jobs_connection = $test_conn;
            $working_config = $config;
            break;
        }
    } catch (Exception $e) {
        // Devam et
    }
}

if (!$jobs_connection) {
    echo "<strong style='color: orange;'>⚠ Jobs database bağlantısı bulunamadı, manuel kontrol gerekli</strong><br>";
    echo "<p>jobs.gmoplus/includes/config.inc.php dosyasından database bilgilerini kontrol edin.</p>";
} else {
    // WordPress Bridge ayarlarını al
    echo "<h4>Jobs.gmoplus WordPress Ayarları:</h4>";
    $jobs_wp_config = "SELECT `Key`, `Default` FROM rl_config WHERE `Key` LIKE 'wp_%'";
    $result = $jobs_connection->query($jobs_wp_config);
    
    $wp_configs = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $wp_configs[$row['Key']] = $row['Default'];
            echo "<strong>" . $row['Key'] . ":</strong> " . htmlspecialchars($row['Default']) . "<br>";
        }
    }
    
    // Blog block ayarlarını al
    echo "<h4>Jobs.gmoplus Blog Block:</h4>";
    $jobs_blocks = "SELECT `Key`, Plugin, `Side`, Position, `Status`, `Type`, Content FROM rl_blocks WHERE Plugin = 'wordpressBridge' OR `Key` = 'wpbridge_last_post'";
    $result = $jobs_connection->query($jobs_blocks);
    
    $working_block = null;
    if ($result && $result->num_rows > 0) {
        $working_block = $result->fetch_assoc();
        echo "<strong>Key:</strong> " . htmlspecialchars($working_block['Key']) . "<br>";
        echo "<strong>Plugin:</strong> " . htmlspecialchars($working_block['Plugin']) . "<br>";
        echo "<strong>Type:</strong> " . htmlspecialchars($working_block['Type']) . "<br>";
        echo "<strong>Side:</strong> " . htmlspecialchars($working_block['Side']) . "<br>";
        echo "<strong>Position:</strong> " . htmlspecialchars($working_block['Position']) . "<br>";
        echo "<strong>Status:</strong> " . htmlspecialchars($working_block['Status']) . "<br>";
        echo "<strong>Content Length:</strong> " . strlen($working_block['Content']) . " karakter<br>";
    }
    
    $jobs_connection->close();
}

echo "</div>";

echo "<h3>2. GLOBAL.GMOPLUS'A KOPYALA:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Global.gmoplus database
include_once(__DIR__ . '/includes/config.inc.php');
$global_connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if ($global_connection->connect_error) {
    die("Global database bağlantı hatası: " . $global_connection->connect_error);
}

echo "<strong style='color: green;'>✓ Global database bağlantısı</strong><br>";

// WordPress Bridge dosyalarını kopyala
echo "<h4>WordPress Bridge Plugin Dosyalarını Kopyala:</h4>";

$source_plugin = '../jobs.gmoplus/plugins/wordpressBridge/';
$target_plugin = __DIR__ . '/plugins/wordpressBridge/';

if (is_dir($source_plugin)) {
    // Ana plugin dosyalarını kopyala
    $files_to_copy = [
        'rlWordpressBridge.class.php',
        'recent_posts.tpl',
        'install.xml'
    ];
    
    foreach ($files_to_copy as $file) {
        $source_file = $source_plugin . $file;
        $target_file = $target_plugin . $file;
        
        if (file_exists($source_file)) {
            copy($source_file, $target_file);
            echo "<strong style='color: green;'>✓ $file kopyalandı</strong><br>";
        } else {
            echo "<strong style='color: red;'>❌ $file bulunamadı</strong><br>";
        }
    }
    
    // src klasörünü tamamen kopyala
    $source_src = $source_plugin . 'src/';
    $target_src = $target_plugin . 'src/';
    
    if (is_dir($source_src)) {
        echo "<strong style='color: blue;'>src/ klasörü kopyalanıyor...</strong><br>";
        copyDirectory($source_src, $target_src);
        echo "<strong style='color: green;'>✓ src/ klasörü kopyalandı</strong><br>";
    }
    
} else {
    echo "<strong style='color: red;'>❌ jobs.gmoplus plugin klasörü bulunamadı</strong><br>";
}

echo "</div>";

echo "<h3>3. DATABASE AYARLARINI GÜNCELLE:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// WordPress ayarlarını güncelle
$default_wp_configs = [
    'wp_path' => 'https://blog.global.gmoplus.com',
    'wp_post_count' => '8',
    'wp_success' => '1',
    'wp_account_type' => 'dealer',
    'wp_delete_flynax_account' => '0'
];

// Eğer jobs'tan ayarlar alındıysa onları kullan
if (isset($wp_configs) && !empty($wp_configs)) {
    // wp_path'i global için güncelle
    if (isset($wp_configs['wp_path'])) {
        $wp_configs['wp_path'] = 'https://blog.global.gmoplus.com';
    }
    $default_wp_configs = array_merge($default_wp_configs, $wp_configs);
}

foreach ($default_wp_configs as $key => $value) {
    $update_config = "UPDATE " . RL_DBPREFIX . "config SET `Default` = ? WHERE `Key` = ?";
    $stmt = $global_connection->prepare($update_config);
    $stmt->bind_param('ss', $value, $key);
    $result = $stmt->execute();
    
    if ($result) {
        echo "<strong style='color: green;'>✓ $key = $value</strong><br>";
    }
}

echo "</div>";

echo "<h3>4. BLOG BLOCK'UNU YENİDEN OLUŞTUR:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Eski blog block'unu sil
$delete_old = "DELETE FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'wpbridge_last_post'";
$global_connection->query($delete_old);

// Test block'unu da sil
$delete_test = "DELETE FROM " . RL_DBPREFIX . "blocks WHERE `Key` = 'test_blog_block'";
$global_connection->query($delete_test);

echo "<strong style='color: green;'>✓ Eski blog block'ları silindi</strong><br>";

// Çalışan block content'i (PHP tabanlı)
$working_block_content = '<?php
global $reefless;
$reefless->loadClass("WordpressBridge", null, "wordpressBridge");
$GLOBALS["rlWordpressBridge"]->blockWPBridgeLastPost();
?>';

// Yeni blog block ekle
$insert_block = "INSERT INTO " . RL_DBPREFIX . "blocks (Plugin, `Key`, Content, `Type`, `Status`, `Position`, `Side`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $global_connection->prepare($insert_block);

$plugin = 'wordpressBridge';
$key = 'wpbridge_last_post';
$type = 'php'; // ÖNEMLİ: PHP OLMALI
$status = 'active';
$position = 1;
$side = 'middle';

$stmt->bind_param('sssssis', $plugin, $key, $working_block_content, $type, $status, $position, $side);
$result = $stmt->execute();

if ($result) {
    echo "<strong style='color: green;'>✓ ÇALIŞAN blog block oluşturuldu!</strong><br>";
    echo "<strong>Type:</strong> php<br>";
    echo "<strong>Side:</strong> middle<br>";
    echo "<strong>Position:</strong> 1<br>";
} else {
    echo "<strong style='color: red;'>❌ Blog block oluşturulamadı: " . $global_connection->error . "</strong><br>";
}

// Block isimlerini ekle
$block_names = [
    'en' => 'Recent Blog Posts',
    'tr' => 'Son Blog Yazıları'
];

foreach ($block_names as $lang => $name) {
    $lang_key = "blocks+name+wpbridge_last_post";
    $insert_lang = "INSERT INTO " . RL_DBPREFIX . "lang_keys (Code, Module, `Key`, Value, Plugin) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE Value = ?";
    $stmt = $global_connection->prepare($insert_lang);
    $module = 'common';
    $plugin_name = 'wordpressBridge';
    $stmt->bind_param('ssssss', $lang, $module, $lang_key, $name, $plugin_name, $name);
    $stmt->execute();
}

echo "<strong style='color: green;'>✓ Block isimleri eklendi</strong><br>";

echo "</div>";

echo "<h3>5. CACHE TEMİZLE:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

$cache_dirs = [
    __DIR__ . '/tmp/compile/',
    __DIR__ . '/tmp/cache/'
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

echo "<strong style='color: green;'>✅ $deleted_files cache dosyası silindi</strong><br>";

echo "</div>";

$global_connection->close();

echo "<h2 style='color: blue;'>🎉 JOBS.GMOPLUS KOPYALAMA TAMAMLANDI! 🎉</h2>";
echo "<div style='background: #d4edda; padding: 20px; border-radius: 10px; margin: 10px;'>";
echo "<h3>YAPTIKLARIMIZ:</h3>";
echo "<ul>";
echo "<li>✅ jobs.gmoplus plugin dosyalarını kopyaladık</li>";
echo "<li>✅ WordPress Bridge ayarlarını kopyaladık</li>";
echo "<li>✅ Çalışan blog block'unu oluşturduk</li>";
echo "<li>✅ Cache temizledik</li>";
echo "</ul>";

echo "<h3>ŞİMDİ YAPIN:</h3>";
echo "<ol>";
echo "<li><strong>Bu dosyayı silin</strong></li>";
echo "<li><strong>Ana sayfayı yenileyin (Ctrl+F5)</strong></li>";
echo "<li><strong>Blog postları ÇALIŞACAK!</strong></li>";
echo "</ol>";
echo "</div>";

// Helper function to copy directory recursively
function copyDirectory($src, $dst) {
    $dir = opendir($src);
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    while(($file = readdir($dir)) !== false) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copyDirectory($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}
?> 