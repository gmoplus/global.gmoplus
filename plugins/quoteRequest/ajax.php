<?php

/******************************************************************************
 * Quote Request Plugin AJAX Handler - Basit Versiyon
 ******************************************************************************/

// Tüm çıktıları bastır
ob_start();
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 0);

// Content-Type ayarla
header('Content-Type: application/json; charset=utf-8');

// Response array
$response = array(
    'success' => false,
    'message' => 'Unknown error',
    'data' => null
);

/**
 * Email bildirimi gönderme fonksiyonu
 */
function sendQuoteNotificationEmail($listing_id, $quote_data) {
    global $reefless, $rlDb, $config, $lang;
    
    try {
        // Flynax framework'ünü sessizce başlat
        if (!isset($GLOBALS['reefless'])) {
            return false;
        }
        
        // İlan ve sahip bilgilerini al
        $listing_sql = "
            SELECT l.*, a.Mail, a.Full_name, a.First_name, a.Last_name, a.Username 
            FROM " . RL_DBPREFIX . "listings l 
            LEFT JOIN " . RL_DBPREFIX . "accounts a ON l.Account_ID = a.ID 
            WHERE l.ID = " . intval($listing_id) . " 
            LIMIT 1
        ";
        
        $listing_info = $rlDb->getRow($listing_sql);
        
        if (!$listing_info || !$listing_info['Mail']) {
            return false;
        }
        
        // Flynax Mail sınıfını sessizce yükle
        ob_start();
        $reefless->loadClass('Mail');
        ob_end_clean();
        
        // İlan linkini oluştur
        $listing_url = RL_URL_HOME . 'listing/' . $listing_id;
        $listing_link = '<a href="' . $listing_url . '">' . ($listing_info['title'] ?: 'İlan #' . $listing_id) . '</a>';
        
        // İlan sahibinin adını belirle
        $owner_name = trim($listing_info['First_name'] . ' ' . $listing_info['Last_name']);
        if (empty($owner_name)) {
            $owner_name = $listing_info['Username'] ?: $listing_info['Full_name'] ?: 'İlan Sahibi';
        }
        
        // Email içeriği
        $subject = 'İlanınız için Teklif Talebi - ' . ($config['site_name'] ?: 'GMOPlus');
        
        $body = "Sayın {$owner_name},\n\n";
        $body .= "İlanınız için yeni bir teklif talebi aldınız:\n\n";
        $body .= "📋 İlan: {$listing_link}\n\n";
        $body .= "👤 Talep Eden Kişi:\n";
        $body .= "• Ad Soyad: {$quote_data['name']}\n";
        $body .= "• E-posta: {$quote_data['email']}\n";
        $body .= "• Telefon: {$quote_data['phone']}\n";
        $body .= "• Pozisyon/Yetki: {$quote_data['position']}\n\n";
        $body .= "💬 Mesaj:\n{$quote_data['description']}\n\n";
        
        if ($quote_data['file_name']) {
            $body .= "📎 Ek Dosya: {$quote_data['file_name']}\n\n";
        }
        
        $body .= "Bu teklif talebini cevaplayabilmek için lütfen doğrudan talep eden kişi ile iletişime geçiniz.\n\n";
        $body .= "Saygılarımızla,\n";
        $body .= ($config['site_name'] ?: 'GMOPlus') . " Ekibi\n";
        $body .= RL_URL_HOME;
        
        // Email template array
        $mail_tpl = array(
            'subject' => $subject,
            'body' => $body,
            'Type' => 'html'
        );
        
        // Email gönder (output buffer kullan)
        ob_start();
        $result = $GLOBALS['rlMail']->send(
            $mail_tpl, 
            $listing_info['Mail'], 
            false, 
            $quote_data['email'], 
            $quote_data['name']
        );
        $email_output = ob_get_clean();
        
        // Hata varsa log'a yaz
        if (!$result) {
            $error_msg = "Email Error: " . $GLOBALS['rlMail']->phpMailer->ErrorInfo;
            if ($email_output) {
                $error_msg .= " | Debug: " . $email_output;
            }
            file_put_contents(RL_ROOT . 'files/quote_email_log.txt', 
                date('Y-m-d H:i:s') . " - " . $error_msg . "\n", 
                FILE_APPEND | LOCK_EX
            );
        }
        
        return $result;
        
    } catch (Exception $e) {
        // Hata durumunda sessizce geç (email hatası sistem durdurmaz)
        return false;
    }
}

/**
 * Admin'e email bildirimi gönderme fonksiyonu
 */
function sendAdminQuoteNotification($listing_id, $quote_data) {
    global $reefless, $rlDb, $config;
    
    try {
        // Admin email adresi
        $admin_email = $config['site_main_email'];
        if (!$admin_email || !isset($GLOBALS['reefless'])) {
            return false;
        }
        
        // İlan bilgilerini al
        $listing_sql = "
            SELECT l.*, a.Full_name, a.First_name, a.Last_name, a.Username 
            FROM " . RL_DBPREFIX . "listings l 
            LEFT JOIN " . RL_DBPREFIX . "accounts a ON l.Account_ID = a.ID 
            WHERE l.ID = " . intval($listing_id) . " 
            LIMIT 1
        ";
        
        $listing_info = $rlDb->getRow($listing_sql);
        
        if (!$listing_info) {
            return false;
        }
        
        // Flynax Mail sınıfını sessizce yükle
        ob_start();
        $reefless->loadClass('Mail');
        ob_end_clean();
        
        // İlan linkini oluştur
        $listing_url = RL_URL_HOME . 'listing/' . $listing_id;
        $listing_link = '<a href="' . $listing_url . '">' . ($listing_info['title'] ?: 'İlan #' . $listing_id) . '</a>';
        
        // İlan sahibinin adını belirle
        $owner_name = trim($listing_info['First_name'] . ' ' . $listing_info['Last_name']);
        if (empty($owner_name)) {
            $owner_name = $listing_info['Username'] ?: $listing_info['Full_name'] ?: 'Bilinmeyen';
        }
        
        // Admin paneli linki
        $admin_panel_link = RL_URL_HOME . 'view_quotes.php';
        
        // Email içeriği
        $subject = 'Yeni Teklif Talebi - ' . ($config['site_name'] ?: 'GMOPlus');
        
        $body = "Sayın Yönetici,\n\n";
        $body .= "Sistemde yeni bir teklif talebi oluşturuldu:\n\n";
        $body .= "📋 İlan: {$listing_link}\n";
        $body .= "👤 İlan Sahibi: {$owner_name}\n\n";
        $body .= "💼 Teklif Talep Eden:\n";
        $body .= "• Ad Soyad: {$quote_data['name']}\n";
        $body .= "• E-posta: {$quote_data['email']}\n";
        $body .= "• Telefon: {$quote_data['phone']}\n";
        $body .= "• Pozisyon/Yetki: {$quote_data['position']}\n\n";
        $body .= "💬 Mesaj:\n{$quote_data['description']}\n\n";
        
        if ($quote_data['file_name']) {
            $body .= "📎 Ek Dosya: {$quote_data['file_name']}\n\n";
        }
        
        $body .= "🔗 Teklif yönetimi: <a href=\"{$admin_panel_link}\">Teklif Talepleri</a>\n\n";
        $body .= "Bu bildiri otomatik olarak oluşturulmuştur.\n\n";
        $body .= ($config['site_name'] ?: 'GMOPlus') . " Sistemi\n";
        $body .= RL_URL_HOME;
        
        // Email template array
        $mail_tpl = array(
            'subject' => $subject,
            'body' => $body,
            'Type' => 'html'
        );
        
        // Email gönder (output buffer kullan)
        ob_start();
        $result = $GLOBALS['rlMail']->send(
            $mail_tpl, 
            $admin_email, 
            false, 
            $quote_data['email'], 
            $quote_data['name']
        );
        $email_output = ob_get_clean();
        
        // Hata varsa log'a yaz
        if (!$result) {
            $error_msg = "Admin Email Error: " . $GLOBALS['rlMail']->phpMailer->ErrorInfo;
            if ($email_output) {
                $error_msg .= " | Debug: " . $email_output;
            }
            file_put_contents(RL_ROOT . 'files/quote_email_log.txt', 
                date('Y-m-d H:i:s') . " - " . $error_msg . "\n", 
                FILE_APPEND | LOCK_EX
            );
        }
        
        return $result;
        
    } catch (Exception $e) {
        // Hata durumunda sessizce geç
        return false;
    }
}

try {
    // Basic security
    if (!defined('RL_ROOT')) {
        define('RL_ROOT', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
    }
    
    require_once RL_ROOT . 'includes/config.inc.php';
    require_once RL_ROOT . 'includes/control.inc.php';

    // Basit form validasyonu
    $listing_id = (int)($_POST['listing_id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $position = trim($_POST['position'] ?? '');
    $description = trim($_POST['description'] ?? '');
    
    // Gerekli alanları kontrol et
    if (!$listing_id || !$name || !$email || !$phone || !$description) {
        $response['message'] = 'Lütfen tüm zorunlu alanları doldurun.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Geçerli bir email adresi giriniz.';
    } else {
        // Veritabanına kaydet
        $mysqli = new mysqli(RL_DBHOST, RL_DBUSER, RL_DBPASS, RL_DBNAME, RL_DBPORT);
        
        if ($mysqli->connect_error) {
            $response['message'] = 'Veritabanı bağlantı hatası.';
        } else {
            // Dosya yükleme
            $file_path = null;
            $file_name = null;
            
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                $upload_dir = RL_ROOT . 'files/quote_requests/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                
                $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $allowed_extensions = array('pdf', 'doc', 'docx', 'xls', 'xlsx');
                
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    $file_name = $_FILES['file']['name'];
                    $file_path = 'quote_requests/' . time() . '_' . $file_name;
                    move_uploaded_file($_FILES['file']['tmp_name'], RL_ROOT . 'files/' . $file_path);
                }
            }
            
            // Veritabanına ekle
            $stmt = $mysqli->prepare("INSERT INTO " . RL_DBPREFIX . "quote_requests 
                (Listing_ID, Name, Email, Phone, Position, Description, File_path, File_name, Date, Status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'new')");
                
            if ($stmt) {
                $stmt->bind_param("isssssss", $listing_id, $name, $email, $phone, $position, $description, $file_path, $file_name);
                
                if ($stmt->execute()) {
                    // Email bildirimleri gönder
                    $quote_data = array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone,
                        'position' => $position,
                        'description' => $description,
                        'file_name' => $file_name
                    );
                    
                    // Email bildirimleri sessizce gönder (output buffer kullan)
                    ob_start();
                    try {
                        $email_results = array();
                        
                        // İlan sahibine email gönder
                        $owner_result = sendQuoteNotificationEmail($listing_id, $quote_data);
                        $email_results['owner'] = $owner_result ? 'Başarılı' : 'Başarısız';
                        
                        // Admin'e de bildirim gönder
                        $admin_result = sendAdminQuoteNotification($listing_id, $quote_data);
                        $email_results['admin'] = $admin_result ? 'Başarılı' : 'Başarısız';
                        
                        // Email durumunu log'a yaz
                        $log_entry = date('Y-m-d H:i:s') . " - İlan ID: {$listing_id}, Talep Eden: {$name} ({$email})\n";
                        $log_entry .= "  İlan Sahibi Email: " . $email_results['owner'] . "\n";
                        $log_entry .= "  Admin Email: " . $email_results['admin'] . "\n\n";
                        
                        file_put_contents(RL_ROOT . 'files/quote_email_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
                        
                    } catch (Exception $e) {
                        // Email hatası sistem durdurmaz
                        $log_entry = date('Y-m-d H:i:s') . " - HATA: " . $e->getMessage() . "\n\n";
                        file_put_contents(RL_ROOT . 'files/quote_email_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
                    }
                    ob_end_clean(); // Email output'unu temizle
                    
                    $response['success'] = true;
                    $response['message'] = 'Teklif talebiniz başarıyla gönderildi!';
                } else {
                    $response['message'] = 'Kayıt sırasında bir hata oluştu.';
                }
                
                $stmt->close();
            } else {
                $response['message'] = 'Veritabanı sorgu hatası.';
            }
            
            $mysqli->close();
        }
    }
    
} catch (Exception $e) {
    $response['message'] = 'Sunucu hatası: ' . $e->getMessage();
}

// Tüm buffer'ları temizle ve JSON response gönder
while (ob_get_level()) {
    ob_end_clean();
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit; 