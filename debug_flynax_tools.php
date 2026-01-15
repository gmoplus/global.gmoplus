<?php
/**
 * Flynax Geliştirme ve Debug Araçları
 * 
 * Bu script Flynax framework ile çalışırken kullanışlı debug ve test araçları sağlar
 * 
 * Kullanım: 
 * - Komut satırından: php debug_flynax_tools.php [işlem_adı]
 * - Tarayıcıdan: debug_flynax_tools.php?action=[işlem_adı]
 */

// Hata raporlamayı aç
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/config.inc.php';

// CLI veya web kontrolü
$isCLI = php_sapi_name() === 'cli';
$action = $isCLI ? ($argv[1] ?? 'menu') : ($_GET['action'] ?? 'menu');

if (!$isCLI) {
    echo "<pre>";
}

echo "=== FLYNAX GELİŞTİRME ARAÇLARI ===\n\n";

// Menü fonksiyonu
function showMenu() {
    echo "Kullanılabilir işlemler:\n";
    echo "- config: Konfigürasyon ayarlarını listele\n";
    echo "- plugins: Plugin durumlarını göster\n";
    echo "- categories: Kategori yapısını göster\n";
    echo "- users: Son kullanıcıları listele\n";
    echo "- listings: Son ilanları listele\n";
    echo "- fields: Özel alanları listele\n";
    echo "- cache_clear: Cache'i temizle\n";
    echo "- debug_enable: Debug modunu aç\n";
    echo "- debug_disable: Debug modunu kapat\n";
    echo "- db_query: Özel SQL sorgusu çalıştır\n";
    echo "- compare_domains: Diğer domainlerle karşılaştır\n";
    echo "\nKullanım: php debug_flynax_tools.php [işlem_adı]\n";
}

// Veritabanı bağlantısı
try {
    $pdo = new PDO(
        "mysql:host=" . RL_DBHOST . ";port=" . RL_DBPORT . ";dbname=" . RL_DBNAME,
        RL_DBUSER,
        RL_DBPASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage() . "\n");
}

// İşlem seçimi
switch ($action) {
    case 'config':
        showConfig();
        break;
    case 'plugins':
        showPlugins();
        break;
    case 'categories':
        showCategories();
        break;
    case 'users':
        showUsers();
        break;
    case 'listings':
        showListings();
        break;
    case 'fields':
        showFields();
        break;
    case 'cache_clear':
        clearCache();
        break;
    case 'debug_enable':
        enableDebug();
        break;
    case 'debug_disable':
        disableDebug();
        break;
    case 'db_query':
        runCustomQuery();
        break;
    case 'compare_domains':
        compareDomains();
        break;
    default:
        showMenu();
        break;
}

// Konfigürasyon göster
function showConfig() {
    global $pdo;
    
    echo "=== KONFIGÜRASYON AYARLARI ===\n\n";
    
    $stmt = $pdo->query("SELECT `Key`, `Value`, `Default` FROM `" . RL_DBPREFIX . "config` ORDER BY `Key`");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $value = $row['Value'] ?: $row['Default'];
        echo "- {$row['Key']}: {$value}\n";
    }
}

// Plugin durumları
function showPlugins() {
    global $pdo;
    
    echo "=== PLUGIN DURUMU ===\n\n";
    
    $stmt = $pdo->query("SELECT `Name`, `Version`, `Status`, `Date` FROM `" . RL_DBPREFIX . "plugins` ORDER BY `Name`");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $status = $row['Status'] == 'active' ? '✓ Aktif' : '✗ Pasif';
        echo "- {$row['Name']} (v{$row['Version']}): {$status} - {$row['Date']}\n";
    }
}

// Kategori yapısı
function showCategories() {
    global $pdo;
    
    echo "=== KATEGORİ YAPISI ===\n\n";
    
    // Ana kategoriler
    $stmt = $pdo->query("SELECT `ID`, `Name`, `Position` FROM `" . RL_DBPREFIX . "categories` WHERE `Parent_ID` = 0 ORDER BY `Position`");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "📁 {$row['Name']} (ID: {$row['ID']})\n";
        
        // Alt kategoriler
        $subStmt = $pdo->prepare("SELECT `ID`, `Name` FROM `" . RL_DBPREFIX . "categories` WHERE `Parent_ID` = ? ORDER BY `Position`");
        $subStmt->execute([$row['ID']]);
        
        while ($subRow = $subStmt->fetch(PDO::FETCH_ASSOC)) {
            echo "  └── {$subRow['Name']} (ID: {$subRow['ID']})\n";
        }
    }
}

// Son kullanıcılar
function showUsers() {
    global $pdo;
    
    echo "=== SON KULLANICILAR (Son 10) ===\n\n";
    
    $stmt = $pdo->query("
        SELECT `Username`, `Full_name`, `Email`, `Type`, `Status`, `Reg_date` 
        FROM `" . RL_DBPREFIX . "accounts` 
        ORDER BY `Reg_date` DESC 
        LIMIT 10
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $status = $row['Status'] == 'active' ? '✓' : '✗';
        echo "- {$row['Username']} ({$row['Full_name']}) - {$row['Email']}\n";
        echo "  Tip: {$row['Type']} | Durum: {$status} | Tarih: {$row['Reg_date']}\n\n";
    }
}

// Son ilanlar
function showListings() {
    global $pdo;
    
    echo "=== SON İLANLAR (Son 10) ===\n\n";
    
    $stmt = $pdo->query("
        SELECT l.`Title`, l.`Status`, l.`Type`, l.`Date`, a.`Username`, c.`Name` as Category
        FROM `" . RL_DBPREFIX . "listings` l
        LEFT JOIN `" . RL_DBPREFIX . "accounts` a ON l.`Account_ID` = a.`ID`
        LEFT JOIN `" . RL_DBPREFIX . "categories` c ON l.`Category_ID` = c.`ID`
        ORDER BY l.`Date` DESC 
        LIMIT 10
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- {$row['Title']}\n";
        echo "  Kategori: {$row['Category']} | Tip: {$row['Type']} | Durum: {$row['Status']}\n";
        echo "  Kullanıcı: {$row['Username']} | Tarih: {$row['Date']}\n\n";
    }
}

// Özel alanlar
function showFields() {
    global $pdo;
    
    echo "=== ÖZEL ALANLAR ===\n\n";
    
    $stmt = $pdo->query("
        SELECT `Key`, `Name`, `Type`, `Required`, `Status`
        FROM `" . RL_DBPREFIX . "listing_fields` 
        ORDER BY `Position`
    ");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $required = $row['Required'] ? 'Zorunlu' : 'İsteğe bağlı';
        $status = $row['Status'] == 'active' ? '✓' : '✗';
        echo "- {$row['Name']} ({$row['Key']})\n";
        echo "  Tip: {$row['Type']} | {$required} | Durum: {$status}\n\n";
    }
}

// Cache temizle
function clearCache() {
    echo "=== CACHE TEMİZLEME ===\n\n";
    
    $cacheDir = RL_CACHE;
    $compileDir = RL_TMP . 'compile/';
    
    // Cache klasörünü temizle
    if (is_dir($cacheDir)) {
        $files = glob($cacheDir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        echo "✓ Cache klasörü temizlendi: {$cacheDir}\n";
    }
    
    // Compile klasörünü temizle  
    if (is_dir($compileDir)) {
        $files = glob($compileDir . '*.php');
        foreach ($files as $file) {
            unlink($file);
        }
        echo "✓ Compile klasörü temizlendi: {$compileDir}\n";
    }
    
    echo "\nCache başarıyla temizlendi!\n";
}

// Debug modunu aç
function enableDebug() {
    global $pdo;
    
    echo "=== DEBUG MODU AKTİFLEŞTİRİLİYOR ===\n\n";
    
    $configs = [
        'debug' => '1',
        'db_debug' => '1',
        'ajax_debug' => '1'
    ];
    
    foreach ($configs as $key => $value) {
        $stmt = $pdo->prepare("UPDATE `" . RL_DBPREFIX . "config` SET `Value` = ? WHERE `Key` = ?");
        $stmt->execute([$value, $key]);
        echo "✓ {$key} aktifleştirildi\n";
    }
    
    echo "\n⚠️  Debug modu açıldı. Üretim sunucusunda kullanmayın!\n";
    echo "Kapatmak için: php debug_flynax_tools.php debug_disable\n";
}

// Debug modunu kapat
function disableDebug() {
    global $pdo;
    
    echo "=== DEBUG MODU KAPATILIYOR ===\n\n";
    
    $configs = [
        'debug' => '0',
        'db_debug' => '0', 
        'ajax_debug' => '0'
    ];
    
    foreach ($configs as $key => $value) {
        $stmt = $pdo->prepare("UPDATE `" . RL_DBPREFIX . "config` SET `Value` = ? WHERE `Key` = ?");
        $stmt->execute([$value, $key]);
        echo "✓ {$key} kapatıldı\n";
    }
    
    echo "\nDebug modu kapatıldı.\n";
}

// Özel SQL sorgusu
function runCustomQuery() {
    global $pdo, $isCLI;
    
    echo "=== ÖZEL SQL SORGUSU ===\n\n";
    
    if ($isCLI) {
        echo "SQL sorgusunu girin (çıkmak için 'exit'):\n";
        $query = trim(fgets(STDIN));
    } else {
        $query = $_GET['query'] ?? '';
    }
    
    if (empty($query) || $query === 'exit') {
        echo "Sorgu girilmedi.\n";
        return;
    }
    
    // Güvenlik kontrolü - sadece SELECT sorgularına izin ver
    if (!preg_match('/^\s*SELECT/i', $query)) {
        echo "Güvenlik nedeniyle sadece SELECT sorguları çalıştırılabilir.\n";
        return;
    }
    
    try {
        $stmt = $pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($results) {
            echo "Sonuçlar (" . count($results) . " kayıt):\n\n";
            foreach ($results as $i => $row) {
                echo "Kayıt " . ($i + 1) . ":\n";
                foreach ($row as $col => $val) {
                    echo "  {$col}: {$val}\n";
                }
                echo "\n";
            }
        } else {
            echo "Sonuç bulunamadı.\n";
        }
    } catch (Exception $e) {
        echo "Sorgu hatası: " . $e->getMessage() . "\n";
    }
}

// Domain karşılaştırması
function compareDomains() {
    global $pdo;
    
    echo "=== DOMAIN KARŞILAŞTIRMASI ===\n\n";
    echo "Mevcut domain: " . RL_DBNAME . "\n\n";
    
    // Diğer GMOPlus veritabanlarını bul
    $stmt = $pdo->query("SHOW DATABASES LIKE 'gmoplus_%'");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "Bulunan GMOPlus veritabanları:\n";
    foreach ($databases as $db) {
        if ($db !== RL_DBNAME) {
            echo "- {$db}\n";
            
            // Bu veritabanındaki ilan sayısını al
            try {
                $countStmt = $pdo->query("SELECT COUNT(*) FROM `{$db}`.`fl_listings`");
                $count = $countStmt->fetchColumn();
                echo "  İlan sayısı: {$count}\n";
            } catch (Exception $e) {
                echo "  Hata: " . $e->getMessage() . "\n";
            }
        }
    }
    
    echo "\nDetaylı karşılaştırma için her veritabanında bu scripti çalıştırın.\n";
}

if (!$isCLI) {
    echo "</pre>";
}

/**
 * GELİŞTİRME İPUÇLARI:
 * 
 * 1. FLYNAX HOOK SİSTEMİ:
 *    - includes/classes/rlHook.class.php dosyasını inceleyin
 *    - Plugin geliştirirken hook noktalarını kullanın
 * 
 * 2. YENİ ALAN EKLEME:
 *    - Admin panelinden Listing Fields bölümünden ekleyin
 *    - Template dosyalarını güncelleyin
 * 
 * 3. TEMPLATE GELİŞTİRME:
 *    - templates/ klasöründe çalışın
 *    - Smarty template engine kullanılır
 * 
 * 4. VERİTABANI YAPISI:
 *    - fl_ prefixi ile başlar
 *    - ORM kullanmaz, düz SQL
 * 
 * 5. PLUGIN GELİŞTİRME:
 *    - plugins/ klasöründe yeni klasör açın
 *    - install.xml dosyası zorunlu
 *    - Hook sistemi ile entegrasyon
 */
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 