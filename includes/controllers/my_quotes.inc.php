<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL63573ZF30R - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: global.gmoplus.com
 *  FILE: MY_QUOTES.INC.PHP
 *  
 ******************************************************************************/

// Global değişkenleri tanımla
global $rlDb, $rlValid, $rlSmarty, $reefless, $rlNotice, $account_info, $page_info, $config, $rlBase;

// Global değişkenlerin varlığını kontrol et
if (!$rlNotice) {
    $reefless->loadClass('Notice');
}

// REALM kontrolü frontend için gerekli değil - sadece admin için
// if (!defined('REALM')) {
//     exit('Access denied');
// }

// Kullanıcının giriş yapmış olması gerekiyor
if (!defined('IS_LOGIN') || !$account_info['ID']) {
    // Debug log
    file_put_contents('login_debug.log', date('Y-m-d H:i:s') . " - Login check failed\n", FILE_APPEND);
    file_put_contents('login_debug.log', date('Y-m-d H:i:s') . " - IS_LOGIN defined: " . (defined('IS_LOGIN') ? 'YES' : 'NO') . "\n", FILE_APPEND);
    file_put_contents('login_debug.log', date('Y-m-d H:i:s') . " - Account ID: " . ($account_info['ID'] ?? 'null') . "\n", FILE_APPEND);
    
    // Flynax standart login redirect
    if ($config['mod_rewrite']) {
        $login_url = $rlBase . 'login.html?return_url=' . urlencode($_SERVER['REQUEST_URI']);
    } else {
        $login_url = $rlBase . 'index.php?page=login&return_url=' . urlencode($_SERVER['REQUEST_URI']);
    }
    
    file_put_contents('login_debug.log', date('Y-m-d H:i:s') . " - Redirecting to: {$login_url}\n", FILE_APPEND);
    header('Location: ' . $login_url);
    exit;
}

// Sayfa bilgilerini ayarla
$page_info['name'] = 'Tekliflerim';
$page_info['title'] = 'İlanlarıma Gelen Teklifler';

// Tablo varlığını kontrol et
$check_table = $rlDb->getRow("SHOW TABLES LIKE '{db_prefix}quote_requests'");
if (!$check_table) {
    $rlNotice->saveNotice('Teklif sistemi kurulu değil.', 'errors');
    
    // Doğru redirect - infinite loop engellemek için
    if ($config['mod_rewrite']) {
        $redirect_url = $rlBase . 'my-listing.html';
    } else {
        $redirect_url = $rlBase . 'index.php?page=my_listing';
    }
    header('Location: ' . $redirect_url);
    exit;
}

// my_quotes sayfasının pages tablosunda kayıtlı olup olmadığını kontrol et
$check_page = $rlDb->getRow("SELECT * FROM `{db_prefix}pages` WHERE `Key` = 'my_quotes'");
if (!$check_page) {
    // Sayfayı ekle
    $max_position = $rlDb->getOne("SELECT MAX(`Position`) FROM `{db_prefix}pages`");
    
    $page_data = array(
        'Parent_ID' => 0,
        'Page_type' => 'system',
        'Login' => 1,
        'Key' => 'my_quotes',
        'Position' => $max_position + 1,
        'Path' => 'my-quotes',
        'Get_vars' => '',
        'Controller' => 'my_quotes',
        'Tpl' => 1,
        'Menus' => '2',
        'Deny' => '',
        'Plugin' => '',
        'No_follow' => 0,
        'Modified' => 'NOW()',
        'Status' => 'active',
        'Readonly' => 0
    );
    
    $rlDb->insertOne($page_data, 'pages');
    
    // Dil anahtarlarını ekle
    $lang_keys = array(
        array('Key' => 'pages+name+my_quotes', 'Code' => 'english', 'Value' => 'My Quotes', 'Plugin' => '', 'Status' => 'active'),
        array('Key' => 'pages+name+my_quotes', 'Code' => 'turkish', 'Value' => 'Tekliflerim', 'Plugin' => '', 'Status' => 'active'),
        array('Key' => 'pages+title+my_quotes', 'Code' => 'english', 'Value' => 'My Quotes - View quote requests', 'Plugin' => '', 'Status' => 'active'),
        array('Key' => 'pages+title+my_quotes', 'Code' => 'turkish', 'Value' => 'Tekliflerim - Teklif taleplerini görüntüle', 'Plugin' => '', 'Status' => 'active')
    );
    
    foreach ($lang_keys as $lang_key) {
        $exists = $rlDb->getRow("SELECT * FROM `{db_prefix}lang_keys` WHERE `Key` = '{$lang_key['Key']}' AND `Code` = '{$lang_key['Code']}'");
        if (!$exists) {
            $rlDb->insertOne($lang_key, 'lang_keys');
        }
    }
}

// Dosya indirme işlemi - önce kontrol et
if ($_GET['action'] == 'download' && $_GET['quote_id']) {
    $quote_id = (int)$_GET['quote_id'];
    
    // Debug logging
    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Download request for quote_id: {$quote_id}\n", FILE_APPEND);
    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - User Account_ID: {$account_info['ID']}\n", FILE_APPEND);
    
    // Bu teklif bu kullanıcının ilanına ait mi ve dosyası var mı kontrol et
    $sql = "SELECT qr.File_path, l.Account_ID, qr.Name 
            FROM `{db_prefix}quote_requests` qr 
            LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
            WHERE qr.ID = {$quote_id} AND l.Account_ID = {$account_info['ID']} AND qr.File_path != ''";
    
    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - SQL: {$sql}\n", FILE_APPEND);
    
    $file_info = $rlDb->getRow($sql);
    
    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - File info found: " . var_export($file_info, true) . "\n", FILE_APPEND);
    
    if ($file_info && $file_info['File_path']) {
        // Dosya yolunu düzelt - multiple paths deneyelim
        $possible_paths = array(
            RL_ROOT . 'files/' . $file_info['File_path'],
            RL_FILES . $file_info['File_path'],
            RL_ROOT . $file_info['File_path'],
            RL_ROOT . 'uploads/' . $file_info['File_path'],
            '/home/gmoplus/global.gmoplus.com/uploads/' . $file_info['File_path'],
            '/home/gmoplus/public_html/files/' . $file_info['File_path'],
            dirname(__FILE__) . '/../files/' . $file_info['File_path'],
            dirname(__FILE__) . '/../../files/' . $file_info['File_path'],
            // Tarih klasörlerinde de ara
            RL_ROOT . 'files/05-2025/' . $file_info['File_path'],
            RL_ROOT . 'files/11-2024/' . $file_info['File_path'],
            RL_ROOT . 'files/10-2024/' . $file_info['File_path'],
            // Quote requests klasörünü oluştur ve kullan
            RL_ROOT . 'files/quote_requests/' . basename($file_info['File_path']),
            // Basit dosya adı ile tarih klasörlerinde ara
            RL_ROOT . 'files/05-2025/' . basename($file_info['File_path']),
            RL_ROOT . 'files/11-2024/' . basename($file_info['File_path']),
            RL_ROOT . 'files/10-2024/' . basename($file_info['File_path'])
        );
        
        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Original file path: {$file_info['File_path']}\n", FILE_APPEND);
        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - RL_ROOT: " . RL_ROOT . "\n", FILE_APPEND);
        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - RL_FILES: " . RL_FILES . "\n", FILE_APPEND);
        
        $file_found = false;
        $found_path = '';
        
        foreach ($possible_paths as $index => $path) {
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Trying path " . ($index + 1) . ": {$path}\n", FILE_APPEND);
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Path " . ($index + 1) . " exists: " . (file_exists($path) ? 'YES' : 'NO') . "\n", FILE_APPEND);
            
            if (file_exists($path)) {
                $file_found = true;
                $found_path = $path;
                break;
            }
        }
        
        // Eğer hala bulunamadıysa recursive search yap
        if (!$file_found) {
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - File not found in any path, starting recursive search:\n", FILE_APPEND);
            
            $search_filename = basename($file_info['File_path']);
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Searching for filename: {$search_filename}\n", FILE_APPEND);
            
            // Character encoding alternatives
            $search_variants = array(
                $search_filename,
                // UTF-8 to ISO-8859-9 (Turkish)
                iconv('UTF-8', 'ISO-8859-9//IGNORE', $search_filename),
                // Fix common encoding issues
                str_replace(['ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'], 
                           ['Ä±', 'Ä', 'Ã¼', 'Å', 'Ã¶', 'Ã§', 'Ä°', 'Äž', 'Ãœ', 'Åž', 'Ã–', 'Ã‡'], $search_filename),
                // Reverse fix  
                str_replace(['Ä±', 'Ä', 'Ã¼', 'Å', 'Ã¶', 'Ã§', 'Ä°', 'Äž', 'Ãœ', 'Åž', 'Ã–', 'Ã‡'],
                           ['ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'], $search_filename),
                // URL decode
                urldecode($search_filename),
                // Remove accents completely
                transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $search_filename)
            );
            
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Search variants: " . implode(' | ', $search_variants) . "\n", FILE_APPEND);
            
            $directories_to_check = array(
                RL_ROOT . 'files/',
                RL_ROOT . 'files/05-2025/',
                RL_ROOT . 'files/11-2024/',
                RL_ROOT . 'files/10-2024/',
                RL_ROOT . 'uploads/',
                RL_ROOT . 'tmp/upload/'
            );
            
            foreach ($directories_to_check as $base_dir) {
                if (is_dir($base_dir)) {
                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Searching in: {$base_dir}\n", FILE_APPEND);
                    
                    // Eğer tarih klasörüyse, ad## alt klasörlerini de kontrol et
                    if (preg_match('/\d{2}-\d{4}\/$/', $base_dir)) {
                        $subdirs = glob($base_dir . 'ad*', GLOB_ONLYDIR);
                        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Found ad dirs: " . implode(', ', $subdirs) . "\n", FILE_APPEND);
                        
                        foreach ($subdirs as $subdir) {
                            // Her variant için kontrol et
                            foreach ($search_variants as $variant) {
                                if (empty($variant)) continue;
                                $check_path = $subdir . '/' . $variant;
                                if (file_exists($check_path)) {
                                    $found_path = $check_path;
                                    $file_found = true;
                                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - FOUND in subdir with variant: {$check_path}\n", FILE_APPEND);
                                    break 3;
                                }
                            }
                        }
                    }
                    
                    // Doğrudan klasörde ara - tüm variants
                    foreach ($search_variants as $variant) {
                        if (empty($variant)) continue;
                        $direct_path = $base_dir . $variant;
                        if (file_exists($direct_path)) {
                            $found_path = $direct_path;
                            $file_found = true;
                            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - FOUND directly with variant: {$direct_path}\n", FILE_APPEND);
                            break 2;
                        }
                    }
                    
                    // Klasörü scan et - case insensitive ve partial match
                    $files = @scandir($base_dir);
                    if ($files) {
                        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Directory contents (first 10): " . implode(', ', array_slice($files, 0, 10)) . "\n", FILE_APPEND);
                        
                        foreach ($files as $file) {
                            foreach ($search_variants as $variant) {
                                if (empty($variant)) continue;
                                // Case insensitive + similar_text matching
                                if (strtolower($file) === strtolower($variant) || 
                                    similar_text(strtolower($file), strtolower($variant)) > (strlen($variant) * 0.8)) {
                                    $found_path = $base_dir . $file;
                                    $file_found = true;
                                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - FOUND in scan with similarity: {$found_path} (matched {$file} vs {$variant})\n", FILE_APPEND);
                                    break 3;
                                }
                            }
                        }
                    }
                } else {
                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Directory does not exist: {$base_dir}\n", FILE_APPEND);
                }
            }
            
            // Quote requests klasörünü oluştur
            $quote_requests_dir = RL_ROOT . 'files/quote_requests/';
            if (!is_dir($quote_requests_dir)) {
                if (mkdir($quote_requests_dir, 0755, true)) {
                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Created quote_requests directory: {$quote_requests_dir}\n", FILE_APPEND);
                } else {
                    file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Failed to create quote_requests directory\n", FILE_APPEND);
                }
            }
        }
        
        if ($file_found && file_exists($found_path)) {
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - File found at: {$found_path}\n", FILE_APPEND);
            $file_name = basename($found_path);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $original_name = sanitize_filename($file_info['Name']) . '_teklif_' . $quote_id . '.' . $file_ext;
            
            // MIME type'ı belirle
            $mime_type = 'application/octet-stream';
            if ($file_ext == 'pdf') {
                $mime_type = 'application/pdf';
            } elseif (in_array($file_ext, ['jpg', 'jpeg'])) {
                $mime_type = 'image/jpeg';
            } elseif ($file_ext == 'png') {
                $mime_type = 'image/png';
            } elseif (in_array($file_ext, ['doc', 'docx'])) {
                $mime_type = 'application/msword';
            }
            
            // Önceki output'u temizle
            if (ob_get_level()) {
                ob_end_clean();
            }
            
            // Dosya indirme headers
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mime_type);
            header('Content-Disposition: attachment; filename="' . $original_name . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($found_path));
            
            // Dosyayı okuyup çıktı ver
            readfile($found_path);
            exit;
        } else {
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - ERROR: File not found in any path\n", FILE_APPEND);
            
            // Son çare: tüm files klasörünü recursive tara
            $search_filename = basename($file_info['File_path']);
            file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Starting desperate recursive search for: {$search_filename}\n", FILE_APPEND);
            
            $found_path = recursiveFileSearch(RL_ROOT . 'files/', $search_filename);
            if ($found_path && file_exists($found_path)) {
                file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - FOUND via recursive search: {$found_path}\n", FILE_APPEND);
                
                $file_name = basename($found_path);
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $original_name = sanitize_filename($file_info['Name']) . '_teklif_' . $quote_id . '.' . $file_ext;
                
                // MIME type'ı belirle
                $mime_type = 'application/octet-stream';
                if ($file_ext == 'pdf') {
                    $mime_type = 'application/pdf';
                } elseif (in_array($file_ext, ['jpg', 'jpeg'])) {
                    $mime_type = 'image/jpeg';
                } elseif ($file_ext == 'png') {
                    $mime_type = 'image/png';
                } elseif (in_array($file_ext, ['doc', 'docx'])) {
                    $mime_type = 'application/msword';
                }
                
                // Önceki output'u temizle
                if (ob_get_level()) {
                    ob_end_clean();
                }
                
                // Dosya indirme headers
                header('Content-Description: File Transfer');
                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $original_name . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($found_path));
                
                // Dosyayı okuyup çıktı ver
                readfile($found_path);
                exit;
            } else {
                // Dosya hiç bulunamadı - error göster, redirect yapma
                file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - FINAL ERROR: File not found anywhere\n", FILE_APPEND);
                
                if (ob_get_level()) {
                    ob_end_clean();
                }
                
                header('HTTP/1.1 404 Not Found');
                echo "<!DOCTYPE html><html><head><title>Dosya Bulunamadı</title></head><body>";
                echo "<h1>❌ Dosya Bulunamadı</h1>";
                echo "<p>Aradığınız dosya sistemde bulunamadı.</p>";
                echo "<p>Dosya adı: " . htmlspecialchars($file_info['File_path']) . "</p>";
                echo "<p><a href='" . $rlBase . "my-quotes.html'>← Tekliflere Geri Dön</a></p>";
                echo "</body></html>";
                exit;
            }
        }
    } else {
        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - ERROR: No file info found or empty file path\n", FILE_APPEND);
        
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        header('HTTP/1.1 404 Not Found');
        echo "<!DOCTYPE html><html><head><title>Dosya Bulunamadı</title></head><body>";
        echo "<h1>❌ Dosya Bulunamadı</h1>";
        echo "<p>Bu teklif için dosya bulunmuyor veya erişim yetkiniz yok.</p>";
        echo "<p><a href='" . $rlBase . "my-quotes.html'>← Tekliflere Geri Dön</a></p>";
        echo "</body></html>";
        exit;
    }
    
    // Bu kod artık gereksiz - yukarıda exit yapıyoruz
}

// Dosya adını temizleyen fonksiyon
function sanitize_filename($filename) {
    $filename = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename);
    $filename = mb_ereg_replace("([\.]{2,})", '', $filename);
    return $filename;
}

// Recursive dosya arama fonksiyonu
function recursiveFileSearch($dir, $filename) {
    if (!is_dir($dir)) {
        return false;
    }
    
    // Character encoding alternatives
    $search_variants = array(
        $filename,
        // UTF-8 to ISO-8859-9 (Turkish)
        iconv('UTF-8', 'ISO-8859-9//IGNORE', $filename),
        // Fix common encoding issues
        str_replace(['ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'], 
                   ['Ä±', 'Ä', 'Ã¼', 'Å', 'Ã¶', 'Ã§', 'Ä°', 'Äž', 'Ãœ', 'Åž', 'Ã–', 'Ã‡'], $filename),
        // Reverse fix  
        str_replace(['Ä±', 'Ä', 'Ã¼', 'Å', 'Ã¶', 'Ã§', 'Ä°', 'Äž', 'Ãœ', 'Åž', 'Ã–', 'Ã‡'],
                   ['ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ş', 'Ö', 'Ç'], $filename),
        // URL decode
        urldecode($filename)
    );
    
    // Add transliterator variant if available
    if (function_exists('transliterator_transliterate')) {
        $search_variants[] = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $filename);
    }
    
    try {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        
        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $current_filename = $file->getFilename();
                
                // Exact match ve variant matches
                foreach ($search_variants as $variant) {
                    if (empty($variant)) continue;
                    
                    if (strtolower($current_filename) === strtolower($variant) ||
                        similar_text(strtolower($current_filename), strtolower($variant)) > (strlen($variant) * 0.85)) {
                        return $file->getPathname();
                    }
                }
            }
        }
    } catch (Exception $e) {
        file_put_contents('download_debug.log', date('Y-m-d H:i:s') . " - Recursive search error: " . $e->getMessage() . "\n", FILE_APPEND);
    }
    
    return false;
}

// AJAX Status güncelleme işlemi - JSON response ile
if ($_POST['action'] == 'update_status' && $_POST['quote_id']) {
    header('Content-Type: application/json');
    
    $quote_id = (int)$_POST['quote_id'];
    $status = $rlValid->xSql($_POST['status']);
    
    try {
        // Bu teklif bu kullanıcının ilanına ait mi kontrol et
        $check_sql = "SELECT qr.ID FROM `{db_prefix}quote_requests` qr 
                      LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
                      WHERE qr.ID = {$quote_id} AND l.Account_ID = {$account_info['ID']}";
        $check = $rlDb->getRow($check_sql);
        
        if ($check) {
            $rlDb->query("UPDATE `{db_prefix}quote_requests` SET `Status` = '{$status}' WHERE `ID` = {$quote_id}");
            echo json_encode(['success' => true, 'message' => 'Teklif durumu güncellendi']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Yetkisiz işlem']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Hata oluştu: ' . $e->getMessage()]);
    }
    exit;
}

// Status tanımları
$statuses = array(
    'new' => 'Yeni', 
    'viewed' => 'Görüldü', 
    'replied' => 'Cevaplandı', 
    'closed' => 'Kapalı'
);
$rlSmarty->assign('statuses', $statuses);

// SEO-friendly listing URL'i oluşturan fonksiyon
function getListingUrl($listing_id) {
    global $rlDb, $rlBase, $config, $reefless;
    
    try {
        file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Getting URL for listing_id: {$listing_id}\n", FILE_APPEND);
        
        // Listing ve kategori bilgilerini al - Type bilgisini de al
        $listing_sql = "SELECT l.ID, l.title, l.Category_ID, c.Path as category_path, c.ID as category_id, c.Parent_ID, c.Type as category_type
                       FROM `{db_prefix}listings` l 
                       LEFT JOIN `{db_prefix}categories` c ON l.Category_ID = c.ID 
                       WHERE l.ID = {$listing_id}";
        $listing = $rlDb->getRow($listing_sql);
        
        file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Listing data: " . var_export($listing, true) . "\n", FILE_APPEND);
        
        if ($listing && $config['mod_rewrite'] && $listing['category_path']) {
            // Listing type path'ini al - multiple approaches
            $listing_type_path = '';
            
            // Önce lt_ prefix ile dene
            $listing_type_sql = "SELECT Path FROM `{db_prefix}pages` WHERE `Key` = 'lt_{$listing['category_type']}' AND `Status` = 'active'";
            $listing_type_path = $rlDb->getOne($listing_type_sql);
            
            file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Listing type path (lt_ prefix): {$listing_type_path}\n", FILE_APPEND);
            
            // Eğer bulunamadıysa, direkt key ile dene
            if (!$listing_type_path) {
                $listing_type_sql = "SELECT Path FROM `{db_prefix}pages` WHERE `Key` = '{$listing['category_type']}' AND `Status` = 'active'";
                $listing_type_path = $rlDb->getOne($listing_type_sql);
                file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Listing type path (direct key): {$listing_type_path}\n", FILE_APPEND);
            }
            
            // Hala bulunamadıysa, listing_types tablosundan hardcoded mapping
            if (!$listing_type_path) {
                $hardcoded_paths = array(
                    'ithalat_teklifleri' => 'ithalat-teklifleri',
                    'ithalat_talepleri' => 'ithalat-talepleri', 
                    'ihracat_teklifleri' => 'ihracat-teklifleri',
                    'ihracat_talepleri' => 'ihracat-talepleri',
                    'konsorsiyum_talep_teklif' => 'konsorsiyum-talep-teklif',
                    'listings' => '' // Default listing type için boş
                );
                
                $listing_type_path = $hardcoded_paths[$listing['category_type']] ?? '';
                file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Listing type path (hardcoded): {$listing_type_path}\n", FILE_APPEND);
            }
            
            // Title'ı temizle
            $clean_title = $listing['title'];
            $clean_title = preg_replace('/\{\|[a-z]{2}\|\}(.*?)\{\|\/[a-z]{2}\|\}/', '$1', $clean_title);
            $clean_title = preg_replace('/\{\|.*?\|\}/', '', $clean_title);
            
            file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Original title: {$listing['title']}\n", FILE_APPEND);
            file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Cleaned title: {$clean_title}\n", FILE_APPEND);
            
            $title_seo = preg_replace('/[^a-zA-Z0-9-_\s]/', '', $clean_title);
            $title_seo = preg_replace('/\s+/', '-', trim($title_seo));
            $title_seo = preg_replace('/-+/', '-', strtolower($title_seo));
            $title_seo = trim($title_seo, '-');
            
            // URL'i oluştur: listing_type_path/category_path/title-id.html
            if ($listing_type_path) {
                $full_path = $listing_type_path . '/' . $listing['category_path'];
            } else {
                $full_path = $listing['category_path'];
            }
            
            $url = $rlBase . $full_path . '/' . $title_seo . '-' . $listing['ID'] . '.html';
            
            file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Final URL: {$url}\n", FILE_APPEND);
            return $url;
        } else {
            file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Cannot create SEO URL - missing data\n", FILE_APPEND);
        }
    } catch (Exception $e) {
        file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Exception: " . $e->getMessage() . "\n", FILE_APPEND);
    }
    
    // Fallback - basit URL
    $fallback_url = $rlBase . 'index.php?page=view_listing&id=' . $listing_id;
    file_put_contents('url_debug.log', date('Y-m-d H:i:s') . " - Using fallback URL: {$fallback_url}\n", FILE_APPEND);
    return $fallback_url;
}

// Tekil teklif görüntüleme
if ($_GET['action'] == 'view' && $_GET['id']) {
    $quote_id = (int)$_GET['id'];
    
    $sql = "SELECT qr.*, l.title as listing_title, l.ID as listing_id, l.Account_ID
            FROM `{db_prefix}quote_requests` qr 
            LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
            WHERE qr.ID = {$quote_id} AND l.Account_ID = {$account_info['ID']}";
    
    $quote = $rlDb->getRow($sql);
    
    if ($quote) {
        // Teklifi "görüldü" olarak işaretle
        if ($quote['Status'] == 'new') {
            $rlDb->query("UPDATE `{db_prefix}quote_requests` SET `Status` = 'viewed' WHERE `ID` = {$quote_id}");
            $quote['Status'] = 'viewed';
        }
        
        // SEO-friendly listing URL'ini oluştur
        $quote['listing_url'] = getListingUrl($quote['listing_id']);
        
        $rlSmarty->assign('quote', $quote);
        $rlSmarty->assign('page_info', array(
            'name' => 'Teklif Detayı',
            'title' => 'Teklif Detayı - ' . $quote['listing_title']
        ));
    } else {
        $rlNotice->saveNotice('Teklif bulunamadı veya size ait değil.', 'errors');
        
        // Doğru redirect - infinite loop engellemek için  
        if ($config['mod_rewrite']) {
            $redirect_url = $rlBase . 'my-quotes.html';
        } else {
            $redirect_url = $rlBase . 'index.php?page=my_quotes';
        }
        header('Location: ' . $redirect_url);
        exit;
    }
} else {
    // Teklifleri listele
    
    // Filtreleme
    $where_conditions = array();
    $listing_id = (int)($_GET['id'] ?? $_GET['listing_id'] ?? 0); // Hem id hem listing_id destekle
    $status_filter = $_GET['status'] ?? '';
    
    // Sadece bu kullanıcının ilanlarına gelen teklifler
    $where_conditions[] = "l.Account_ID = {$account_info['ID']}";
    
    if ($listing_id > 0) {
        $where_conditions[] = "qr.Listing_ID = {$listing_id}";
    }
    
    if (!empty($status_filter)) {
        $where_conditions[] = "qr.Status = '" . $rlValid->xSql($status_filter) . "'";
    }
    
    $where_clause = 'WHERE ' . implode(' AND ', $where_conditions);
    
    // Sayfalama - pg parametresini kullan
    $page = (int)($_GET['pg'] ?? 1);
    if ($page < 1) $page = 1;
    $limit = 20;
    $start = ($page - 1) * $limit;
    
    // Veri çekme
    $sql = "SELECT qr.*, l.title as listing_title, l.ID as listing_id
            FROM `{db_prefix}quote_requests` qr 
            LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
            {$where_clause}
            ORDER BY qr.Date DESC 
            LIMIT {$start}, {$limit}";
    
    try {
        $quotes = $rlDb->getAll($sql);
        
        // Her quote için SEO-friendly listing URL'ini oluştur
        if ($quotes) {
            foreach ($quotes as $key => $quote) {
                $quotes[$key]['listing_url'] = getListingUrl($quote['listing_id']);
            }
        }
        
        $rlSmarty->assign('quotes', $quotes);
    } catch (Exception $e) {
        $quotes = array();
        $rlSmarty->assign('quotes', $quotes);
    }

    // Toplam sayı
    $count_sql = "SELECT COUNT(*) FROM `{db_prefix}quote_requests` qr 
                  LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
                  {$where_clause}";
    
    try {
        $total_count = (int)$rlDb->getOne($count_sql);
    } catch (Exception $e) {
        $total_count = 0;
    }
    
    $pages_count = ceil($total_count / $limit);
    
    $rlSmarty->assign('total_count', $total_count);
    $rlSmarty->assign('pages_count', $pages_count);
    $rlSmarty->assign('current_page', $page);
    
    // Filtreleme için mevcut ilanları çek
    $my_listings_sql = "SELECT ID, title FROM `{db_prefix}listings` 
                        WHERE Account_ID = {$account_info['ID']} AND Status != 'trash'
                        ORDER BY title";
    $my_listings = $rlDb->getAll($my_listings_sql);
    
    $rlSmarty->assign('my_listings', $my_listings);
    $rlSmarty->assign('selected_listing', $listing_id);
    $rlSmarty->assign('selected_status', $status_filter);
}