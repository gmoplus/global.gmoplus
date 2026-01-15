<?php
// ÇALIŞAN BLOG KARŞILAŞTIRMASI
echo "<h1 style='color: blue;'>ÇALIŞAN BLOG KARŞILAŞTIRMASI</h1>";

echo "<h3>1. JOBS.GMOPLUS VERİTABANI KONTROLÜ:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Jobs.gmoplus config dosyasını okuyalım
$jobs_config = '../jobs.gmoplus/includes/config.inc.php';
if (file_exists($jobs_config)) {
    include_once($jobs_config);
    
    echo "<strong style='color: green;'>✓ jobs.gmoplus config yüklendi</strong><br>";
    
    // Jobs veritabanına bağlan
    $jobs_connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);
    
    if (!$jobs_connection->connect_error) {
        echo "<strong style='color: green;'>✓ jobs.gmoplus database bağlantısı</strong><br>";
        
        // WordPress Bridge ayarlarını kontrol et
        echo "<h4>WordPress Bridge Ayarları (jobs.gmoplus):</h4>";
        $jobs_wp_config = "SELECT `Key`, `Default` FROM " . RL_DBPREFIX . "config WHERE `Key` LIKE 'wp_%'";
        $result = $jobs_connection->query($jobs_wp_config);
        
        while($row = $result->fetch_assoc()) {
            echo "<strong>" . $row['Key'] . ":</strong> " . htmlspecialchars($row['Default']) . "<br>";
        }
        
        // Blog block durumunu kontrol et
        echo "<h4>Blog Block Durumu (jobs.gmoplus):</h4>";
        $jobs_blocks = "SELECT `Key`, Plugin, `Side`, Position, `Status`, `Type`, LENGTH(Content) as content_length FROM " . RL_DBPREFIX . "blocks WHERE Plugin = 'wordpressBridge' OR `Key` LIKE '%blog%' OR `Key` LIKE '%post%'";
        $result = $jobs_connection->query($jobs_blocks);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $status_color = $row['Status'] == 'active' ? 'green' : 'red';
                echo "<div style='background: #f0f0f0; padding: 5px; margin: 3px;'>";
                echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . " | ";
                echo "<strong>Plugin:</strong> " . htmlspecialchars($row['Plugin']) . " | ";
                echo "<strong>Type:</strong> " . htmlspecialchars($row['Type']) . " | ";
                echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . " | ";
                echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . " | ";
                echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span> | ";
                echo "<strong>Content Length:</strong> " . $row['content_length'] . " chars";
                echo "</div>";
            }
        } else {
            echo "<p style='color: red;'>Hiç blog block bulunamadı!</p>";
        }
        
        // Çalışan blog block content'ini al
        echo "<h4>Çalışan Blog Block Content:</h4>";
        $working_content_query = "SELECT Content FROM " . RL_DBPREFIX . "blocks WHERE Plugin = 'wordpressBridge' AND `Status` = 'active' LIMIT 1";
        $result = $jobs_connection->query($working_content_query);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div style='background: #e7f3ff; padding: 10px; max-height: 200px; overflow-y: scroll;'>";
            echo "<code style='font-size: 12px;'>" . htmlspecialchars($row['Content']) . "</code>";
            echo "</div>";
        }
        
        $jobs_connection->close();
    } else {
        echo "<strong style='color: red;'>❌ jobs.gmoplus database bağlantı hatası</strong><br>";
    }
} else {
    echo "<strong style='color: red;'>❌ jobs.gmoplus config dosyası bulunamadı</strong><br>";
}

echo "</div>";

echo "<h3>2. GLOBAL.GMOPLUS VERİTABANI KONTROLÜ:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Global.gmoplus config
include_once(__DIR__ . '/includes/config.inc.php');
$global_connection = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME);

if (!$global_connection->connect_error) {
    echo "<strong style='color: green;'>✓ global.gmoplus database bağlantısı</strong><br>";
    
    // WordPress Bridge ayarlarını kontrol et
    echo "<h4>WordPress Bridge Ayarları (global.gmoplus):</h4>";
    $global_wp_config = "SELECT `Key`, `Default` FROM " . RL_DBPREFIX . "config WHERE `Key` LIKE 'wp_%'";
    $result = $global_connection->query($global_wp_config);
    
    while($row = $result->fetch_assoc()) {
        echo "<strong>" . $row['Key'] . ":</strong> " . htmlspecialchars($row['Default']) . "<br>";
    }
    
    // Blog block durumunu kontrol et
    echo "<h4>Blog Block Durumu (global.gmoplus):</h4>";
    $global_blocks = "SELECT `Key`, Plugin, `Side`, Position, `Status`, `Type`, LENGTH(Content) as content_length FROM " . RL_DBPREFIX . "blocks WHERE Plugin = 'wordpressBridge' OR `Key` LIKE '%blog%' OR `Key` LIKE '%post%'";
    $result = $global_connection->query($global_blocks);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $status_color = $row['Status'] == 'active' ? 'green' : 'red';
            echo "<div style='background: #fff0f0; padding: 5px; margin: 3px;'>";
            echo "<strong>Key:</strong> " . htmlspecialchars($row['Key']) . " | ";
            echo "<strong>Plugin:</strong> " . htmlspecialchars($row['Plugin']) . " | ";
            echo "<strong>Type:</strong> " . htmlspecialchars($row['Type']) . " | ";
            echo "<strong>Side:</strong> " . htmlspecialchars($row['Side']) . " | ";
            echo "<strong>Position:</strong> " . htmlspecialchars($row['Position']) . " | ";
            echo "<strong>Status:</strong> <span style='color: $status_color;'>" . htmlspecialchars($row['Status']) . "</span> | ";
            echo "<strong>Content Length:</strong> " . $row['content_length'] . " chars";
            echo "</div>";
        }
    }
    
    $global_connection->close();
}

echo "</div>";

echo "<h3>3. TEMPLATE KARŞILAŞTIRMASI:</h3>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";

// Template dosyalarını karşılaştır
$template_files = [
    'recent_posts.tpl',
    'blocks/blocks_manager.tpl',
    'content.tpl'
];

foreach ($template_files as $template_file) {
    echo "<h4>$template_file:</h4>";
    
    $jobs_template = "../jobs.gmoplus/plugins/wordpressBridge/$template_file";
    $global_template = __DIR__ . "/plugins/wordpressBridge/$template_file";
    
    if (file_exists($jobs_template)) {
        $jobs_content = file_get_contents($jobs_template);
        echo "<strong>jobs.gmoplus (Çalışan):</strong><br>";
        echo "<div style='background: #e7f3ff; padding: 10px; margin: 5px; max-height: 150px; overflow-y: scroll;'>";
        echo "<code style='font-size: 11px;'>" . htmlspecialchars(substr($jobs_content, 0, 500)) . "...</code>";
        echo "</div>";
    }
    
    if (file_exists($global_template)) {
        $global_content = file_get_contents($global_template);
        echo "<strong>global.gmoplus (Bizim):</strong><br>";
        echo "<div style='background: #fff0f0; padding: 10px; margin: 5px; max-height: 150px; overflow-y: scroll;'>";
        echo "<code style='font-size: 11px;'>" . htmlspecialchars(substr($global_content, 0, 500)) . "...</code>";
        echo "</div>";
    }
    
    echo "<hr>";
}

echo "</div>";

echo "<h2 style='color: blue;'>KARŞILAŞTIRMA TAMAMLANDI</h2>";
echo "<p><strong>Sonuç:</strong> Çalışan jobs.gmoplus ile bizim global.gmoplus arasındaki farklar yukarıda görünüyor.</p>";
echo "<p><strong>Yapılacak:</strong> Çalışan konfigürasyonu bizim sisteme kopyalayacağız.</p>";
?> 