<?php
/**
 * Flynax "Teklif Al" Plugin Oluşturucu
 * 
 * Bu script "Quote Request" plugin'ini otomatik olarak oluşturur
 */

echo "=== FLYNAX 'TEKLİF AL' PLUGİN OLUŞTURUCU ===\n\n";

// Plugin klasörü oluştur
$pluginDir = 'plugins/quoteRequest';
if (!is_dir($pluginDir)) {
    mkdir($pluginDir, 0755, true);
    echo "✓ Plugin klasörü oluşturuldu: {$pluginDir}\n";
}

// Admin klasörü oluştur
$adminDir = $pluginDir . '/admin';
if (!is_dir($adminDir)) {
    mkdir($adminDir, 0755, true);
    echo "✓ Admin klasörü oluşturuldu: {$adminDir}\n";
}

// Static klasörü oluştur
$staticDir = $pluginDir . '/static';
if (!is_dir($staticDir)) {
    mkdir($staticDir, 0755, true);
    echo "✓ Static klasörü oluşturuldu: {$staticDir}\n";
}

// Languages klasörü oluştur
$langDir = $pluginDir . '/languages';
if (!is_dir($langDir)) {
    mkdir($langDir, 0755, true);
    echo "✓ Languages klasörü oluşturuldu: {$langDir}\n";
}

echo "\n1. INSTALL.XML DOSYASI OLUŞTURULUYOR...\n";

// install.xml dosyası
$installXml = '<?xml version="1.0" encoding="utf-8" ?>
<plugin name="quoteRequest">
    <title>Quote Request System</title>
    <description>Allows users to request quotes from listing owners with file upload support</description>
    <author>GMOPlus Developer</author>
    <owner>GMOPlus</owner>
    <version>1.0.0</version>
    <date>' . date('d.m.Y') . '</date>
    <class>QuoteRequest</class>
    <compatible>4.9.3</compatible>

    <files>
        <file>rlQuoteRequest.class.php</file>
        <file>admin/quote_requests.inc.php</file>
        <file>admin/quote_requests.tpl</file>
        <file>quote_form.tpl</file>
        <file>quote_button.tpl</file>
        <file>static/quote_request.css</file>
        <file>static/quote_request.js</file>
        <file>languages/English(EN).xml</file>
        <file>languages/Turkish(TR).xml</file>
    </files>

    <install><![CDATA[
        $GLOBALS[\'reefless\']->loadClass(\'QuoteRequest\', null, \'quoteRequest\');
        $GLOBALS[\'rlQuoteRequest\']->install();
    ]]></install>

    <hooks>
        <hook version="1.0.0" name="listingDetailsBottom"><![CDATA[
            $GLOBALS[\'reefless\']->loadClass(\'QuoteRequest\', null, \'quoteRequest\');
            $GLOBALS[\'rlQuoteRequest\']->hookListingDetailsBottom();
        ]]></hook>
        <hook version="1.0.0" name="phpAjaxRequest"><![CDATA[
            $GLOBALS[\'reefless\']->loadClass(\'QuoteRequest\', null, \'quoteRequest\');
            $GLOBALS[\'rlQuoteRequest\']->hookAjaxRequest();
        ]]></hook>
    </hooks>

    <configs key="quoteRequest" name="Quote Request Settings">
        <config key="quote_request_enabled" name="Enable Quote Requests" type="bool"><![CDATA[1]]></config>
        <config key="quote_request_email" name="Admin Email for Notifications" type="text"><![CDATA[admin@gmoplus.com]]></config>
        <config key="quote_request_max_file_size" name="Max File Size (MB)" type="text" validate="number"><![CDATA[5]]></config>
        <config key="quote_request_allowed_files" name="Allowed File Types" type="text"><![CDATA[pdf,doc,docx,xls,xlsx]]></config>
    </configs>

    <phrases>
        <phrase key="quote_request_title" module="common"><![CDATA[Request Quote]]></phrase>
        <phrase key="quote_request_button" module="common"><![CDATA[Get Quote]]></phrase>
        <phrase key="quote_request_name" module="common"><![CDATA[Full Name]]></phrase>
        <phrase key="quote_request_email" module="common"><![CDATA[Email Address]]></phrase>
        <phrase key="quote_request_phone" module="common"><![CDATA[Phone Number]]></phrase>
        <phrase key="quote_request_position" module="common"><![CDATA[Position/Authority]]></phrase>
        <phrase key="quote_request_description" module="common"><![CDATA[Description]]></phrase>
        <phrase key="quote_request_file" module="common"><![CDATA[Upload File (Optional)]]></phrase>
        <phrase key="quote_request_send" module="common"><![CDATA[Send Request]]></phrase>
        <phrase key="quote_request_success" module="common"><![CDATA[Your quote request has been sent successfully!]]></phrase>
        <phrase key="quote_request_error" module="common"><![CDATA[An error occurred while sending your request.]]></phrase>
        <phrase key="quote_request_login_required" module="common"><![CDATA[Please login to request a quote.]]></phrase>
    </phrases>

    <aPages>
        <aPage key="quote_requests" name="Quote Requests" controller="quote_requests" deny=""><![CDATA[]]></aPage>
    </aPages>

    <uninstall><![CDATA[
        $GLOBALS[\'reefless\']->loadClass(\'QuoteRequest\', null, \'quoteRequest\');
        $GLOBALS[\'rlQuoteRequest\']->uninstall();
    ]]></uninstall>
</plugin>';

file_put_contents($pluginDir . '/install.xml', $installXml);
echo "✓ install.xml oluşturuldu\n";

echo "\n2. ANA PLUGİN SINIFI OLUŞTURULUYOR...\n";

// Ana plugin sınıfı
$pluginClass = '<?php

class rlQuoteRequest 
{
    /**
     * Plugin constructor
     */
    public function __construct() 
    {
        global $rlPlugin;
        $this->plugin = $rlPlugin->getPlugin(\'quoteRequest\');
    }
    
    /**
     * Plugin installation
     */
    public function install() 
    {
        global $rlDb;
        
        // Teklif istekleri tablosu oluştur
        $sql = "CREATE TABLE IF NOT EXISTS `" . RL_DBPREFIX . "quote_requests` (
            `ID` int(11) NOT NULL AUTO_INCREMENT,
            `Listing_ID` int(11) NOT NULL,
            `Requester_ID` int(11) DEFAULT NULL,
            `Seller_ID` int(11) NOT NULL,
            `Name` varchar(100) NOT NULL,
            `Email` varchar(100) NOT NULL,
            `Phone` varchar(20) NOT NULL,
            `Position` varchar(100) NOT NULL,
            `Description` text NOT NULL,
            `File_path` varchar(255) DEFAULT NULL,
            `File_name` varchar(255) DEFAULT NULL,
            `Status` enum(\'new\',\'read\',\'replied\',\'closed\') DEFAULT \'new\',
            `Date` datetime NOT NULL,
            `Reply_date` datetime DEFAULT NULL,
            `Reply_message` text DEFAULT NULL,
            PRIMARY KEY (`ID`),
            KEY `listing_id` (`Listing_ID`),
            KEY `seller_id` (`Seller_ID`),
            KEY `status` (`Status`),
            KEY `date` (`Date`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
        
        $rlDb->query($sql);
        
        // Upload klasörü oluştur
        $uploadDir = RL_FILES . \'quote_requests/\';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        return true;
    }
    
    /**
     * Plugin uninstallation
     */
    public function uninstall() 
    {
        global $rlDb;
        
        // Tabloyu sil
        $rlDb->query("DROP TABLE IF EXISTS `" . RL_DBPREFIX . "quote_requests`");
        
        // Upload klasörünü sil
        $uploadDir = RL_FILES . \'quote_requests/\';
        if (is_dir($uploadDir)) {
            $this->deleteDirectory($uploadDir);
        }
        
        return true;
    }
    
    /**
     * Hook: Listing details bottom
     */
    public function hookListingDetailsBottom() 
    {
        global $rlSmarty, $config, $listing_data, $account_info;
        
        if (!$config[\'quote_request_enabled\'] || !$listing_data) {
            return;
        }
        
        // Kendi ilanına teklif isteyemez
        if ($account_info && $account_info[\'ID\'] == $listing_data[\'Account_ID\']) {
            return;
        }
        
        $rlSmarty->assign(\'listing_data\', $listing_data);
        $rlSmarty->assign(\'quote_request_config\', array(
            \'max_file_size\' => $config[\'quote_request_max_file_size\'],
            \'allowed_files\' => $config[\'quote_request_allowed_files\']
        ));
        
        echo $rlSmarty->fetch(RL_PLUGINS . \'quoteRequest\' . RL_DS . \'quote_button.tpl\');
    }
    
    /**
     * Hook: AJAX Request handler
     */
    public function hookAjaxRequest() 
    {
        global $_response, $rlXajax;
        
        if ($_GET[\'item\'] == \'submitQuoteRequest\') {
            $_response->script("submitQuoteRequest();");
            $rlXajax->registerFunction(array(\'submitQuoteRequest\', $this, \'ajaxSubmitQuote\'));
        }
    }
    
    /**
     * AJAX: Submit quote request
     */
    public function ajaxSubmitQuote($data) 
    {
        global $rlDb, $rlMail, $config, $account_info, $_response;
        
        // Giriş kontrolü
        if (!$account_info) {
            $_response->script("alert(\'" . addslashes($GLOBALS[\'lang\'][\'quote_request_login_required\']) . "\');");
            return $_response;
        }
        
        // Veri doğrulama
        $listingId = (int)$data[\'listing_id\'];
        $name = trim($data[\'name\']);
        $email = trim($data[\'email\']);
        $phone = trim($data[\'phone\']);
        $position = trim($data[\'position\']);
        $description = trim($data[\'description\']);
        
        if (!$listingId || !$name || !$email || !$phone || !$description) {
            $_response->script("alert(\'Please fill all required fields.\');");
            return $_response;
        }
        
        // İlan bilgilerini al
        $listing = $rlDb->fetch("*", array(\'ID\' => $listingId), null, null, \'listings\', \'row\');
        if (!$listing) {
            $_response->script("alert(\'Listing not found.\');");
            return $_response;
        }
        
        // Dosya yükleme işlemi
        $filePath = null;
        $fileName = null;
        
        if (isset($_FILES[\'quote_file\']) && $_FILES[\'quote_file\'][\'size\'] > 0) {
            $uploadResult = $this->handleFileUpload($_FILES[\'quote_file\']);
            if ($uploadResult[\'success\']) {
                $filePath = $uploadResult[\'path\'];
                $fileName = $uploadResult[\'name\'];
            }
        }
        
        // Veritabanına kaydet
        $quoteData = array(
            \'Listing_ID\' => $listingId,
            \'Requester_ID\' => $account_info[\'ID\'],
            \'Seller_ID\' => $listing[\'Account_ID\'],
            \'Name\' => $name,
            \'Email\' => $email,
            \'Phone\' => $phone,
            \'Position\' => $position,
            \'Description\' => $description,
            \'File_path\' => $filePath,
            \'File_name\' => $fileName,
            \'Date\' => date(\'Y-m-d H:i:s\')
        );
        
        $quoteId = $rlDb->insertOne($quoteData, \'quote_requests\');
        
        if ($quoteId) {
            // Satıcıya email gönder
            $this->sendNotificationEmail($listing, $quoteData, $quoteId);
            
            $_response->script("
                alert(\'" . addslashes($GLOBALS[\'lang\'][\'quote_request_success\']) . "\');
                $(\'#quote-form-modal\').modal(\'hide\');
            ");
        } else {
            $_response->script("alert(\'" . addslashes($GLOBALS[\'lang\'][\'quote_request_error\']) . "\');");
        }
        
        return $_response;
    }
    
    /**
     * Handle file upload
     */
    private function handleFileUpload($file) 
    {
        global $config;
        
        $allowedTypes = explode(\',\', $config[\'quote_request_allowed_files\']);
        $maxSize = $config[\'quote_request_max_file_size\'] * 1024 * 1024; // MB to bytes
        
        $fileExt = strtolower(pathinfo($file[\'name\'], PATHINFO_EXTENSION));
        
        if (!in_array($fileExt, $allowedTypes)) {
            return array(\'success\' => false, \'error\' => \'File type not allowed\');
        }
        
        if ($file[\'size\'] > $maxSize) {
            return array(\'success\' => false, \'error\' => \'File too large\');
        }
        
        $uploadDir = RL_FILES . \'quote_requests/\';
        $fileName = time() . \'_\' . preg_replace(\'/[^a-zA-Z0-9._-]/\', \'\', $file[\'name\']);
        $filePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file[\'tmp_name\'], $filePath)) {
            return array(
                \'success\' => true,
                \'path\' => $filePath,
                \'name\' => $file[\'name\']
            );
        }
        
        return array(\'success\' => false, \'error\' => \'Upload failed\');
    }
    
    /**
     * Send notification email
     */
    private function sendNotificationEmail($listing, $quoteData, $quoteId) 
    {
        global $rlMail, $rlDb, $config;
        
        // Satıcı bilgilerini al
        $seller = $rlDb->fetch("*", array(\'ID\' => $listing[\'Account_ID\']), null, null, \'accounts\', \'row\');
        
        if (!$seller) return;
        
        $subject = "New Quote Request for: " . $listing[\'Title\'];
        
        $message = "
        <h3>New Quote Request</h3>
        <p><strong>Listing:</strong> {$listing[\'Title\']}</p>
        <p><strong>Requester:</strong> {$quoteData[\'Name\']}</p>
        <p><strong>Email:</strong> {$quoteData[\'Email\']}</p>
        <p><strong>Phone:</strong> {$quoteData[\'Phone\']}</p>
        <p><strong>Position:</strong> {$quoteData[\'Position\']}</p>
        <p><strong>Description:</strong><br>{$quoteData[\'Description\']}</p>
        ";
        
        if ($quoteData[\'File_name\']) {
            $message .= "<p><strong>Attached File:</strong> {$quoteData[\'File_name\']}</p>";
        }
        
        $message .= "<p><a href=\'" . RL_URL_HOME . "admin/index.php?controller=quote_requests&action=view&id={$quoteId}\'>View in Admin Panel</a></p>";
        
        $rlMail->send($seller[\'Email\'], $subject, $message);
        
        // Admin\'e de bildir
        if ($config[\'quote_request_email\']) {
            $rlMail->send($config[\'quote_request_email\'], $subject, $message);
        }
    }
    
    /**
     * Get quote requests
     */
    public function getQuoteRequests($sellerId = null, $limit = 20, $start = 0) 
    {
        global $rlDb;
        
        $where = array();
        if ($sellerId) {
            $where[\'Seller_ID\'] = $sellerId;
        }
        
        return $rlDb->fetch("*", $where, "ORDER BY Date DESC LIMIT {$start}, {$limit}", null, \'quote_requests\');
    }
    
    /**
     * Update quote request status
     */
    public function updateQuoteStatus($id, $status, $replyMessage = null) 
    {
        global $rlDb;
        
        $data = array(
            \'Status\' => $status
        );
        
        if ($replyMessage) {
            $data[\'Reply_message\'] = $replyMessage;
            $data[\'Reply_date\'] = date(\'Y-m-d H:i:s\');
        }
        
        return $rlDb->updateOne($data, array(\'ID\' => $id), \'quote_requests\');
    }
    
    /**
     * Delete directory recursively
     */
    private function deleteDirectory($dir) 
    {
        if (!is_dir($dir)) return;
        
        $files = array_diff(scandir($dir), array(\'.\', \'..\'));
        foreach ($files as $file) {
            $path = $dir . \'/\' . $file;
            is_dir($path) ? $this->deleteDirectory($path) : unlink($path);
        }
        rmdir($dir);
    }
}';

file_put_contents($pluginDir . '/rlQuoteRequest.class.php', $pluginClass);
echo "✓ rlQuoteRequest.class.php oluşturuldu\n";

echo "\n3. FRONTEND TEMPLATE'LERİ OLUŞTURULUYOR...\n";

// Quote button template
$quoteButtonTpl = '<!-- Quote Request Button -->
{if $config.quote_request_enabled && $listing_data}
<div class="quote-request-section">
    <button type="button" class="btn btn-primary quote-request-btn" data-toggle="modal" data-target="#quote-form-modal" data-listing-id="{$listing_data.ID}">
        <i class="fa fa-envelope"></i> {$lang.quote_request_button}
    </button>
</div>

<!-- Quote Request Modal -->
<div class="modal fade" id="quote-form-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{$lang.quote_request_title}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {include file=$smarty.const.RL_PLUGINS|cat:\'quoteRequest\'|cat:$smarty.const.RL_DS|cat:\'quote_form.tpl\'}
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{$smarty.const.RL_PLUGINS_URL}quoteRequest/static/quote_request.css">
<script src="{$smarty.const.RL_PLUGINS_URL}quoteRequest/static/quote_request.js"></script>
{/if}';

file_put_contents($pluginDir . '/quote_button.tpl', $quoteButtonTpl);
echo "✓ quote_button.tpl oluşturuldu\n";

// Quote form template
$quoteFormTpl = '<form id="quote-request-form" enctype="multipart/form-data">
    <input type="hidden" name="listing_id" value="{$listing_data.ID}">
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_name">{$lang.quote_request_name} *</label>
                <input type="text" class="form-control" id="quote_name" name="name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_email">{$lang.quote_request_email} *</label>
                <input type="email" class="form-control" id="quote_email" name="email" required>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_phone">{$lang.quote_request_phone} *</label>
                <input type="tel" class="form-control" id="quote_phone" name="phone" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="quote_position">{$lang.quote_request_position} *</label>
                <input type="text" class="form-control" id="quote_position" name="position" required>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="quote_description">{$lang.quote_request_description} *</label>
        <textarea class="form-control" id="quote_description" name="description" rows="4" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="quote_file">{$lang.quote_request_file}</label>
        <input type="file" class="form-control" id="quote_file" name="quote_file" accept=".pdf,.doc,.docx,.xls,.xlsx">
        <small class="form-text text-muted">
            Max size: {$quote_request_config.max_file_size}MB. 
            Allowed: {$quote_request_config.allowed_files}
        </small>
    </div>
    
    <div class="form-group text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">{$lang.quote_request_send}</button>
    </div>
</form>';

file_put_contents($pluginDir . '/quote_form.tpl', $quoteFormTpl);
echo "✓ quote_form.tpl oluşturuldu\n";

echo "\n4. CSS VE JAVASCRIPT DOSYALARI OLUŞTURULUYOR...\n";

// CSS dosyası
$css = '.quote-request-section {
    margin: 20px 0;
    text-align: center;
}

.quote-request-btn {
    background: #28a745;
    border: none;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.quote-request-btn:hover {
    background: #218838;
    transform: translateY(-2px);
}

.quote-request-btn i {
    margin-right: 8px;
}

#quote-form-modal .modal-dialog {
    max-width: 600px;
}

#quote-form-modal .form-group label {
    font-weight: bold;
    color: #333;
}

#quote-form-modal .form-control {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
}

#quote-form-modal .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.quote-request-success {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 4px;
    margin: 10px 0;
}

.quote-request-error {
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 4px;
    margin: 10px 0;
}';

file_put_contents($staticDir . '/quote_request.css', $css);
echo "✓ quote_request.css oluşturuldu\n";

// JavaScript dosyası
$js = 'document.addEventListener("DOMContentLoaded", function() {
    // Quote request form submit
    document.getElementById("quote-request-form").addEventListener("submit", function(e) {
        e.preventDefault();
        
        // Form verilerini topla
        var formData = new FormData(this);
        
        // AJAX ile gönder
        var xhr = new XMLHttpRequest();
        xhr.open("POST", rlUrlHome + "index.php?controller=listing_details&listing_id=" + formData.get("listing_id"));
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        
        xhr.onload = function() {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("' . addslashes($GLOBALS['lang']['quote_request_success'] ?? 'Your quote request has been sent successfully!') . '");
                        document.getElementById("quote-form-modal").style.display = "none";
                        document.querySelector(".modal-backdrop").remove();
                        document.body.classList.remove("modal-open");
                    } else {
                        alert(response.message || "' . addslashes($GLOBALS['lang']['quote_request_error'] ?? 'An error occurred.') . '");
                    }
                } catch (e) {
                    alert("' . addslashes($GLOBALS['lang']['quote_request_error'] ?? 'An error occurred.') . '");
                }
            }
        };
        
        xhr.send(formData);
    });
    
    // Modal açıldığında listing ID\'yi form\'a ata
    $("#quote-form-modal").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var listingId = button.data("listing-id");
        $(this).find("input[name=\'listing_id\']").val(listingId);
    });
});

// AJAX fonksiyonu (Flynax xajax sistemi için)
function submitQuoteRequest() {
    var form = document.getElementById("quote-request-form");
    var formData = new FormData(form);
    var data = {};
    
    for (var pair of formData.entries()) {
        data[pair[0]] = pair[1];
    }
    
    xajax_submitQuoteRequest(data);
}';

file_put_contents($staticDir . '/quote_request.js', $js);
echo "✓ quote_request.js oluşturuldu\n";

echo "\n5. DİL DOSYALARI OLUŞTURULUYOR...\n";

// English language file
$englishLang = '<?xml version="1.0" encoding="utf-8"?>
<language>
    <item key="quote_request_title" type="phrase">Request Quote</item>
    <item key="quote_request_button" type="phrase">Get Quote</item>
    <item key="quote_request_name" type="phrase">Full Name</item>
    <item key="quote_request_email" type="phrase">Email Address</item>
    <item key="quote_request_phone" type="phrase">Phone Number</item>
    <item key="quote_request_position" type="phrase">Position/Authority</item>
    <item key="quote_request_description" type="phrase">Description</item>
    <item key="quote_request_file" type="phrase">Upload File (Optional)</item>
    <item key="quote_request_send" type="phrase">Send Request</item>
    <item key="quote_request_success" type="phrase">Your quote request has been sent successfully!</item>
    <item key="quote_request_error" type="phrase">An error occurred while sending your request.</item>
    <item key="quote_request_login_required" type="phrase">Please login to request a quote.</item>
</language>';

file_put_contents($langDir . '/English(EN).xml', $englishLang);
echo "✓ English(EN).xml oluşturuldu\n";

// Turkish language file
$turkishLang = '<?xml version="1.0" encoding="utf-8"?>
<language>
    <item key="quote_request_title" type="phrase">Teklif İste</item>
    <item key="quote_request_button" type="phrase">Teklif Al</item>
    <item key="quote_request_name" type="phrase">Ad Soyad</item>
    <item key="quote_request_email" type="phrase">E-posta Adresi</item>
    <item key="quote_request_phone" type="phrase">Telefon Numarası</item>
    <item key="quote_request_position" type="phrase">Pozisyon/Yetki</item>
    <item key="quote_request_description" type="phrase">Açıklama</item>
    <item key="quote_request_file" type="phrase">Dosya Yükle (İsteğe bağlı)</item>
    <item key="quote_request_send" type="phrase">Teklif Gönder</item>
    <item key="quote_request_success" type="phrase">Teklif isteğiniz başarıyla gönderildi!</item>
    <item key="quote_request_error" type="phrase">Talebiniz gönderilirken bir hata oluştu.</item>
    <item key="quote_request_login_required" type="phrase">Teklif istemek için lütfen giriş yapın.</item>
</language>';

file_put_contents($langDir . '/Turkish(TR).xml', $turkishLang);
echo "✓ Turkish(TR).xml oluşturuldu\n";

echo "\n=== PLUGİN BAŞARIYLA OLUŞTURULDU! ===\n\n";

echo "📁 Plugin dosyaları şurada: {$pluginDir}/\n\n";

echo "📋 KURULUM ADIMLARI:\n";
echo "1. Admin paneline giriş yapın\n";
echo "2. Plugins bölümüne gidin\n";
echo "3. '{$pluginDir}' klasörünü zip olarak paketleyin\n";
echo "4. 'Upload Plugin' ile yükleyin\n";
echo "5. 'Install' butonuna tıklayın\n";
echo "6. 'Activate' ile aktifleştirin\n";
echo "7. Settings'den ayarları yapılandırın\n\n";

echo "🎯 ÖZELLİKLER:\n";
echo "• İlan detay sayfasında 'Teklif Al' butonu\n";
echo "• Modal popup form\n";
echo "• Dosya yükleme desteği (PDF, DOC, XLS)\n";
echo "• Email bildirimleri\n";
echo "• Admin panelinde yönetim\n";
echo "• Türkçe/İngilizce dil desteği\n";
echo "• Responsive tasarım\n\n";

echo "🔧 SONRAKI ADIM:\n";
echo "Admin kontrolcüsü oluşturmak için: php create_quote_request_plugin.php admin\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 