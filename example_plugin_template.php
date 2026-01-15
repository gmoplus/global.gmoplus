<?php
/**
 * FLYNAX PLUGİN GELİŞTİRME ŞABLONu
 * 
 * Bu dosya yeni plugin geliştirmek için kullanılabilir
 * 
 * ADIMLAR:
 * 1. plugins/ klasöründe yeni klasör oluşturun (örn: myPlugin)
 * 2. install.xml dosyası oluşturun
 * 3. Ana plugin sınıfını oluşturun (rlMyPlugin.class.php)
 * 4. Gerekli template dosyalarını ekleyin
 * 5. Admin panelinden plugin'i yükleyin
 */

// ÖRNEK PLUGİN KLASÖR YAPISI:
/*
plugins/
└── myPlugin/
    ├── install.xml                 (Zorunlu - Plugin tanımı)
    ├── rlMyPlugin.class.php        (Zorunlu - Ana plugin sınıfı)
    ├── admin/
    │   ├── myPlugin.inc.php        (Admin kontrolcüsü)
    │   └── myPlugin.tpl            (Admin template)
    ├── static/
    │   ├── style.css               (CSS dosyaları)
    │   └── script.js               (JavaScript dosyaları)
    ├── languages/
    │   ├── English(EN).xml         (Dil dosyaları)
    │   └── Turkish(TR).xml
    └── myPlugin.tpl                (Frontend template)
*/

echo "=== FLYNAX PLUGİN GELİŞTİRME KILAVUZU ===\n\n";

echo "1. PLUGİN KLASÖRÜ OLUŞTURMA:\n";
echo "   plugins/myPlugin/ klasörünü oluşturun\n\n";

echo "2. INSTALL.XML DOSYASI:\n";
echo "   Plugin tanımları ve ayarları için gerekli\n\n";

// INSTALL.XML ÖRNEK İÇERİĞİ
$installXml = '<?xml version="1.0" encoding="utf-8" ?>
<plugin name="myPlugin">
    <title>Benim Plugin\'im</title>
    <description>Bu plugin örnek amaçlı oluşturulmuştur</description>
    <author>Geliştirici Adı</author>
    <owner>Şirket Adı</owner>
    <version>1.0.0</version>
    <date>01.01.2025</date>
    <class>MyPlugin</class>
    <compatible>4.9.3</compatible>

    <files>
        <file>rlMyPlugin.class.php</file>
        <file>admin/myPlugin.inc.php</file>
        <file>admin/myPlugin.tpl</file>
        <file>myPlugin.tpl</file>
        <file>static/style.css</file>
        <file>static/script.js</file>
        <file>languages/English(EN).xml</file>
        <file>languages/Turkish(TR).xml</file>
    </files>

    <install><![CDATA[
        $GLOBALS[\'reefless\']->loadClass(\'MyPlugin\', null, \'myPlugin\');
        $GLOBALS[\'rlMyPlugin\']->install();
    ]]></install>

    <hooks>
        <hook version="1.0.0" name="listingDetailsTop"><![CDATA[
            $GLOBALS[\'reefless\']->loadClass(\'MyPlugin\', null, \'myPlugin\');
            $GLOBALS[\'rlMyPlugin\']->hookListingDetailsTop();
        ]]></hook>
    </hooks>

    <configs key="myPlugin" name="My Plugin Settings">
        <config key="myPlugin_enabled" name="Plugin Aktif" type="bool"><![CDATA[1]]></config>
        <config key="myPlugin_text" name="Özel Metin" type="text"><![CDATA[Varsayılan Metin]]></config>
    </configs>

    <blocks>
        <block key="myPlugin_block" name="My Plugin Block" side="middle_right" type="smarty" tpl="1"><![CDATA[
            {include file=$smarty.const.RL_PLUGINS|cat:\'myPlugin\'|cat:$smarty.const.RL_DS|cat:\'myPlugin.tpl\'}
        ]]></block>
    </blocks>

    <phrases>
        <phrase key="myPlugin_hello" module="common"><![CDATA[Merhaba]]></phrase>
        <phrase key="myPlugin_world" module="common"><![CDATA[Dünya]]></phrase>
    </phrases>

    <uninstall><![CDATA[
        $GLOBALS[\'reefless\']->loadClass(\'MyPlugin\', null, \'myPlugin\');
        $GLOBALS[\'rlMyPlugin\']->uninstall();
    ]]></uninstall>
</plugin>';

echo "3. ANA PLUGİN SINIFI (rlMyPlugin.class.php):\n\n";

// ANA PLUGİN SINIFI ÖRNEK İÇERİĞİ
$pluginClass = '<?php

class rlMyPlugin 
{
    /**
     * Plugin sınıfı constructor
     */
    public function __construct() 
    {
        global $rlPlugin;
        
        // Plugin bilgilerini ayarla
        $this->plugin = $rlPlugin->getPlugin(\'myPlugin\');
    }
    
    /**
     * Plugin kurulum işlemi
     */
    public function install() 
    {
        global $rlDb;
        
        // Özel tablo oluştur (isteğe bağlı)
        $sql = "CREATE TABLE IF NOT EXISTS `" . RL_DBPREFIX . "myPlugin_data` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `Name` varchar(255) NOT NULL,
            `Value` text,
            `Date` datetime NOT NULL,
            PRIMARY KEY (`ID`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
        
        $rlDb->query($sql);
        
        return true;
    }
    
    /**
     * Plugin kaldırma işlemi
     */
    public function uninstall() 
    {
        global $rlDb;
        
        // Özel tabloyu sil
        $rlDb->query("DROP TABLE IF EXISTS `" . RL_DBPREFIX . "myPlugin_data`");
        
        return true;
    }
    
    /**
     * Hook: İlan detay sayfasının üstü
     */
    public function hookListingDetailsTop() 
    {
        global $rlSmarty, $config;
        
        // Plugin aktif mi kontrol et
        if (!$config[\'myPlugin_enabled\']) {
            return;
        }
        
        // Template\'e değişken ata
        $rlSmarty->assign(\'myPlugin_text\', $config[\'myPlugin_text\']);
        
        // Template\'i göster
        echo $rlSmarty->fetch(RL_PLUGINS . \'myPlugin\' . RL_DS . \'myPlugin.tpl\');
    }
    
    /**
     * Özel fonksiyon örneği
     */
    public function getData($limit = 10) 
    {
        global $rlDb;
        
        $sql = "SELECT * FROM `" . RL_DBPREFIX . "myPlugin_data` ORDER BY `Date` DESC LIMIT " . (int)$limit;
        return $rlDb->getAll($sql);
    }
    
    /**
     * Veri ekleme fonksiyonu
     */
    public function addData($name, $value) 
    {
        global $rlDb;
        
        $data = array(
            \'Name\' => $name,
            \'Value\' => $value,
            \'Date\' => date(\'Y-m-d H:i:s\')
        );
        
        return $rlDb->insertOne($data, \'myPlugin_data\');
    }
}';

echo "4. FRONTEND TEMPLATE (myPlugin.tpl):\n\n";

// FRONTEND TEMPLATE ÖRNEK İÇERİĞİ
$frontendTemplate = '<div class="myPlugin-container">
    <h3>{$lang.myPlugin_hello} {$lang.myPlugin_world}!</h3>
    <p>{$myPlugin_text}</p>
    
    {if $myPlugin_data}
        <ul>
        {foreach from=$myPlugin_data item=item}
            <li>{$item.Name}: {$item.Value}</li>
        {/foreach}
        </ul>
    {/if}
</div>

<style>
.myPlugin-container {
    background: #f9f9f9;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 10px 0;
}

.myPlugin-container h3 {
    color: #333;
    margin-top: 0;
}
</style>';

echo "5. ADMIN KONTROLCÜSÜ (admin/myPlugin.inc.php):\n\n";

// ADMİN KONTROLCÜSÜ ÖRNEK İÇERİĞİ
$adminController = '<?php

/* admin controller */

/* check admin logged */
if (!$rlAccount->isAdmin()) {
    $reefless->redirect();
}

// Plugin sınıfını yükle
$reefless->loadClass(\'MyPlugin\', null, \'myPlugin\');

$action = $_GET[\'action\'];

switch ($action) {
    case \'add\':
        // Yeni veri ekleme
        if ($_POST[\'submit\']) {
            $name = $_POST[\'name\'];
            $value = $_POST[\'value\'];
            
            if ($rlMyPlugin->addData($name, $value)) {
                $rlSmarty->assign_by_ref(\'message\', \'Veri başarıyla eklendi\');
            } else {
                $rlSmarty->assign_by_ref(\'error\', \'Veri eklenemedi\');
            }
        }
        break;
        
    case \'delete\':
        // Veri silme
        $id = (int)$_GET[\'id\'];
        if ($id) {
            $rlDb->query("DELETE FROM `" . RL_DBPREFIX . "myPlugin_data` WHERE `ID` = {$id}");
            $rlSmarty->assign_by_ref(\'message\', \'Veri silindi\');
        }
        break;
        
    default:
        // Veri listeleme
        $data = $rlMyPlugin->getData(50);
        $rlSmarty->assign_by_ref(\'myPlugin_data\', $data);
        break;
}

// Sayfa başlığı
$bcAStep = $_GET[\'action\'] ? ucfirst($_GET[\'action\']) : \'Browse\';
$rlSmarty->assign_by_ref(\'bcAStep\', $bcAStep);';

echo "6. GELİŞTİRME İPUÇLARI:\n\n";
echo "• Hook sistemi: includes/classes/rlHook.class.php\n";
echo "• Mevcut hook'lar: phpBeforeListingDetails, listingDetailsTop, vb.\n";
echo "• Template değişkenleri: \$rlSmarty->assign() ile\n";
echo "• Veritabanı: \$rlDb->getAll(), insertOne(), updateOne()\n";
echo "• Konfigürasyon: \$config['plugin_ayar_adı']\n";
echo "• Dil: \$lang['anahtar'] veya \$rlLang->getPhrase()\n\n";

echo "7. YAYGIN HOOK NOKTALARI:\n";
$hooks = [
    'init' => 'Sistem başlatıldığında',
    'phpBeforeListingDetails' => 'İlan detayı sayfası öncesi',
    'listingDetailsTop' => 'İlan detayı sayfası üstü',
    'listingDetailsBottom' => 'İlan detayı sayfası altı',
    'apPhpListings' => 'Admin ilanlar sayfası',
    'apTplListingsNavbar' => 'Admin ilanlar navbar',
    'cronAdditional' => 'Cron işlemleri',
    'specialBlock' => 'Özel bloklar'
];

foreach ($hooks as $hook => $description) {
    echo "• {$hook}: {$description}\n";
}

echo "\n8. PLUGİN TEST ETME:\n";
echo "• Admin panelinden Plugins bölümüne gidin\n";
echo "• Upload Plugin ile zip dosyası yükleyin\n";
echo "• Veya FTP ile plugins/ klasörüne kopyalayın\n";
echo "• Install butonuna tıklayın\n";
echo "• Activate ile aktifleştirin\n\n";

echo "9. DEBUG VE LOG:\n";
echo "• error_log() fonksiyonu kullanın\n";
echo "• tmp/errorLog/ klasörünü kontrol edin\n";
echo "• RL_DEBUG = true yaparak detaylı hata gösterimini açın\n\n";

echo "Bu template'i kullanarak kendi plugin'inizi geliştirebilirsiniz!\n";
echo "Daha fazla örnek için mevcut plugin'ları inceleyebilirsiniz.\n";

/**
 * ÖNEMLİ NOTLAR:
 * 
 * 1. Plugin adları küçük harfle başlamalı (camelCase)
 * 2. Sınıf adları büyük harfle başlamalı (PascalCase)
 * 3. Hook fonksiyonları "hook" ile başlamalı
 * 4. Veritabanı tabloları RL_DBPREFIX ile başlamalı
 * 5. Template dosyaları .tpl uzantılı olmalı
 * 6. install.xml dosyası UTF-8 kodlamalı olmalı
 * 7. Plugin sürüm numaraları semantic versioning kullanmalı
 * 8. Güvenlik için input validation yapmalı
 * 9. Çoklu dil desteği için lang keys kullanmalı
 * 10. CSS/JS dosyaları static/ klasöründe olmalı
 */
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 