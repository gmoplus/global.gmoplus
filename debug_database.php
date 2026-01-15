<?php
/**
 * Flynax Veritabanı Debug ve Analiz Scripti
 * 
 * Bu script veritabanı yapısını analiz eder ve debug bilgileri sağlar
 * Özellikle çok subdomainli yapıda faydalıdır
 */

require_once 'includes/config.inc.php';

echo "=== FLYNAX VERİTABANI DEBUG ANALİZİ ===\n\n";

try {
    $pdo = new PDO(
        "mysql:host=" . RL_DBHOST . ";port=" . RL_DBPORT . ";dbname=" . RL_DBNAME,
        RL_DBUSER,
        RL_DBPASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    echo "1. VERİTABANI BAĞLANTI BİLGİLERİ:\n";
    echo "- Database: " . RL_DBNAME . "\n";
    echo "- Host: " . RL_DBHOST . ":" . RL_DBPORT . "\n";
    echo "- User: " . RL_DBUSER . "\n";
    echo "- Prefix: " . RL_DBPREFIX . "\n\n";
    
    // 2. TABLO YAPISI ANALİZİ
    echo "2. TABLO YAPISI:\n";
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $flynaxTables = array_filter($tables, function($table) {
        return strpos($table, RL_DBPREFIX) === 0;
    });
    
    echo "- Toplam tablo sayısı: " . count($tables) . "\n";
    echo "- Flynax tabloları: " . count($flynaxTables) . "\n\n";
    
    // 3. ANA TABLOLAR ANALİZİ
    echo "3. ANA TABLOLAR VE KAYIT SAYILARI:\n";
    $mainTables = [
        'accounts' => 'Kullanıcı hesapları',
        'listings' => 'İlanlar',
        'categories' => 'Kategoriler',
        'pages' => 'Sayfalar',
        'config' => 'Konfigürasyon',
        'account_types' => 'Hesap tipleri',
        'listing_types' => 'İlan tipleri',
        'plugins' => 'Pluginler',
        'lang_keys' => 'Dil anahtarları',
        'blocks' => 'Bloklar'
    ];
    
    foreach ($mainTables as $table => $description) {
        $fullTableName = RL_DBPREFIX . $table;
        if (in_array($fullTableName, $tables)) {
            $stmt = $pdo->query("SELECT COUNT(*) FROM `{$fullTableName}`");
            $count = $stmt->fetchColumn();
            echo "- {$description} ({$fullTableName}): {$count} kayıt\n";
        } else {
            echo "- {$description} ({$fullTableName}): ✗ Tablo bulunamadı\n";
        }
    }
    echo "\n";
    
    // 4. KULLANICI İSTATİSTİKLERİ
    echo "4. KULLANICI İSTATİSTİKLERİ:\n";
    $accountTable = RL_DBPREFIX . 'accounts';
    if (in_array($accountTable, $tables)) {
        // Aktif/pasif kullanıcılar
        $stmt = $pdo->query("SELECT Status, COUNT(*) as count FROM `{$accountTable}` GROUP BY Status");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $status = $row['Status'] == 'active' ? 'Aktif' : 'Pasif';
            echo "- {$status} kullanıcılar: {$row['count']}\n";
        }
        
        // Hesap tipine göre
        $stmt = $pdo->query("SELECT Type, COUNT(*) as count FROM `{$accountTable}` GROUP BY Type");
        echo "\nHesap tipine göre:\n";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- {$row['Type']}: {$row['count']}\n";
        }
    }
    echo "\n";
    
    // 5. İLAN İSTATİSTİKLERİ
    echo "5. İLAN İSTATİSTİKLERİ:\n";
    $listingsTable = RL_DBPREFIX . 'listings';
    if (in_array($listingsTable, $tables)) {
        // Duruma göre ilanlar
        $stmt = $pdo->query("SELECT Status, COUNT(*) as count FROM `{$listingsTable}` GROUP BY Status");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- {$row['Status']} ilanlar: {$row['count']}\n";
        }
        
        // Tipine göre ilanlar
        $stmt = $pdo->query("SELECT Type, COUNT(*) as count FROM `{$listingsTable}` GROUP BY Type");
        echo "\nTipine göre:\n";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- {$row['Type']}: {$row['count']}\n";
        }
        
        // Son 30 gün eklenen ilanlar
        $stmt = $pdo->query("SELECT COUNT(*) FROM `{$listingsTable}` WHERE Date > DATE_SUB(NOW(), INTERVAL 30 DAY)");
        $recent = $stmt->fetchColumn();
        echo "\n- Son 30 günde eklenen: {$recent}\n";
    }
    echo "\n";
    
    // 6. KATEGORİ YAPISI
    echo "6. KATEGORİ YAPISI:\n";
    $categoriesTable = RL_DBPREFIX . 'categories';
    if (in_array($categoriesTable, $tables)) {
        $stmt = $pdo->query("SELECT COUNT(*) FROM `{$categoriesTable}` WHERE Parent_ID = 0");
        $mainCats = $stmt->fetchColumn();
        
        $stmt = $pdo->query("SELECT COUNT(*) FROM `{$categoriesTable}` WHERE Parent_ID != 0");
        $subCats = $stmt->fetchColumn();
        
        echo "- Ana kategoriler: {$mainCats}\n";
        echo "- Alt kategoriler: {$subCats}\n";
        
        // En çok ilan olan kategoriler
        echo "\nEn çok ilan olan kategoriler:\n";
        $stmt = $pdo->query("
            SELECT c.Name, COUNT(l.ID) as listing_count 
            FROM `{$categoriesTable}` c 
            LEFT JOIN `{$listingsTable}` l ON c.ID = l.Category_ID 
            WHERE c.Parent_ID = 0 
            GROUP BY c.ID 
            ORDER BY listing_count DESC 
            LIMIT 5
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- {$row['Name']}: {$row['listing_count']} ilan\n";
        }
    }
    echo "\n";
    
    // 7. PLUGIN DURUMU
    echo "7. PLUGIN DURUMU:\n";
    $pluginsTable = RL_DBPREFIX . 'plugins';
    if (in_array($pluginsTable, $tables)) {
        $stmt = $pdo->query("SELECT Status, COUNT(*) as count FROM `{$pluginsTable}` GROUP BY Status");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $status = $row['Status'] == 'active' ? 'Aktif' : 'Pasif';
            echo "- {$status} pluginler: {$row['count']}\n";
        }
        
        echo "\nAktif pluginler:\n";
        $stmt = $pdo->query("SELECT Name, Version FROM `{$pluginsTable}` WHERE Status = 'active' ORDER BY Name");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- {$row['Name']} (v{$row['Version']})\n";
        }
    }
    echo "\n";
    
    // 8. AYAR KONTROLÜ
    echo "8. ÖNEMLİ AYARLAR:\n";
    $configTable = RL_DBPREFIX . 'config';
    if (in_array($configTable, $tables)) {
        $importantSettings = [
            'template' => 'Kullanılan tema',
            'lang' => 'Varsayılan dil',
            'timezone' => 'Zaman dilimi',
            'site_url' => 'Site URL',
            'mod_rewrite' => 'SEO URL',
            'registration' => 'Kayıt durumu',
            'auto_approval' => 'Otomatik onay'
        ];
        
        foreach ($importantSettings as $key => $description) {
            $stmt = $pdo->prepare("SELECT Value FROM `{$configTable}` WHERE `Key` = ?");
            $stmt->execute([$key]);
            $value = $stmt->fetchColumn();
            echo "- {$description}: " . ($value ?: 'Bulunamadı') . "\n";
        }
    }
    echo "\n";
    
    // 9. VERİTABANI BOYUTU
    echo "9. VERİTABANI BOYUTU ANALİZİ:\n";
    $stmt = $pdo->query("
        SELECT 
            table_name as 'Tablo',
            ROUND(((data_length + index_length) / 1024 / 1024), 2) as 'Boyut (MB)'
        FROM information_schema.TABLES 
        WHERE table_schema = '" . RL_DBNAME . "' 
        AND table_name LIKE '" . RL_DBPREFIX . "%'
        ORDER BY (data_length + index_length) DESC
        LIMIT 10
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- {$row['Tablo']}: {$row['Boyut (MB)']} MB\n";
    }
    
    // Toplam boyut
    $stmt = $pdo->query("
        SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) as total_size
        FROM information_schema.TABLES 
        WHERE table_schema = '" . RL_DBNAME . "'
    ");
    $totalSize = $stmt->fetchColumn();
    echo "\nToplam veritabanı boyutu: {$totalSize} MB\n\n";
    
    echo "=== VERİTABANI ANALİZİ TAMAMLANDI ===\n";
    
} catch (Exception $e) {
    echo "HATA: " . $e->getMessage() . "\n";
}

/**
 * Bu scriptin kullanım alanları:
 * 
 * 1. Veritabanı durumunu kontrol etme
 * 2. Performans sorunlarını tespit etme
 * 3. Veri bütünlüğünü kontrol etme
 * 4. Multi-domain yapısında farklı siteleri karşılaştırma
 * 5. Plugin durumlarını takip etme
 * 6. Kullanıcı ve ilan istatistiklerini görme
 */
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 