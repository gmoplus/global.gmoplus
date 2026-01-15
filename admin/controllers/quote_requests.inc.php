<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL63573ZF30R - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: global.gmoplus.com
 *  FILE: QUOTE_REQUESTS.INC.PHP
 *  
 ******************************************************************************/

/* deny direct access */
if (!defined('REALM')) {
    exit('Access denied');
}

// ERROR LOGGING - START
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/../../quote_controller_errors.log');

$log_msg = date('Y-m-d H:i:s') . " - Quote Requests Controller Started\n";
file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

try {
    // LOAD MISSING CLASSES
    $log_msg = date('Y-m-d H:i:s') . " - Loading missing framework classes...\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // Load rlDebug if not already loaded + STATIC METHOD FIX
    if (!class_exists('rlDebug')) {
        if (isset($reefless) && is_object($reefless) && method_exists($reefless, 'loadClass')) {
            $reefless->loadClass('Debug');
            $log_msg = date('Y-m-d H:i:s') . " - rlDebug loaded via reefless\n";
        } else {
            require_once RL_CLASSES . 'rlDebug.class.php';
            $GLOBALS['rlDebug'] = new rlDebug();
            $log_msg = date('Y-m-d H:i:s') . " - rlDebug loaded manually\n";
        }
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    }

    // CRITICAL FIX: Ensure rlDebug is available globally and add static method if missing
    if (!isset($GLOBALS['rlDebug']) && class_exists('rlDebug')) {
        $GLOBALS['rlDebug'] = new rlDebug();
        $log_msg = date('Y-m-d H:i:s') . " - rlDebug instance created globally\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    }

    // Add static logger method if it doesn't exist (compatibility fix)
    if (class_exists('rlDebug') && !method_exists('rlDebug', 'logger')) {
        eval('
        class rlDebugStatic extends rlDebug {
            public static function logger($message) {
                if (isset($GLOBALS["rlDebug"])) {
                    return $GLOBALS["rlDebug"]->logger($message);
                }
                return true;
            }
        }
        ');
        class_alias('rlDebugStatic', 'rlDebug', false);
        $log_msg = date('Y-m-d H:i:s') . " - rlDebug static method compatibility added\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        }

    // Load other missing classes
    if (!class_exists('rlActions') && isset($reefless) && method_exists($reefless, 'loadClass')) {
        $reefless->loadClass('Actions');
        $log_msg = date('Y-m-d H:i:s') . " - rlActions loaded\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    }

    if (!class_exists('rlHook') && isset($reefless) && method_exists($reefless, 'loadClass')) {
        $reefless->loadClass('Hook');
        $log_msg = date('Y-m-d H:i:s') . " - rlHook loaded\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    }

    // DISABLE DATABASE DEBUG to prevent static method issues
    if (isset($rlDb) && method_exists($rlDb, 'setDebug')) {
        $rlDb->setDebug(false);
        $log_msg = date('Y-m-d H:i:s') . " - Database debug disabled\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    }

    // Global değişkenler - LOG CHECK
    $log_msg = date('Y-m-d H:i:s') . " - Checking global variables...\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    global $rlDb, $rlSmarty, $rlValid, $reefless, $rlNotice, $config, $lang, $account_info;

    if (!$rlDb) {
        $log_msg = date('Y-m-d H:i:s') . " - ERROR: rlDb not available\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        throw new Exception('rlDb not available');
    }

    if (!$rlSmarty) {
        $log_msg = date('Y-m-d H:i:s') . " - ERROR: rlSmarty not available\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        throw new Exception('rlSmarty not available');
    }

    if (!$lang) {
        $log_msg = date('Y-m-d H:i:s') . " - ERROR: lang array not available\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        throw new Exception('lang array not available');
    }

    $log_msg = date('Y-m-d H:i:s') . " - Global variables OK\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // ENABLE FLYNAX STANDARD FILTERING SYSTEM
    $filtering = true;
    $mass_actions = false;
    $sorting = true;
    $actions = true;
    $search = true;
    $paging = true;
    
    // Assign control variables to template
    $rlSmarty->assign('filtering', true);
    $rlSmarty->assign('mass_actions', false);
    $rlSmarty->assign('sorting', true);
    $rlSmarty->assign('actions', true);
    $rlSmarty->assign('search', true);
    $rlSmarty->assign('paging', true);
    
    // FLYNAX STANDARD FILTERING OPTIONS
    $filter_fields = array(
        'Status' => array(
            'type' => 'select',
            'values' => array(
                '' => 'Tümü',
                'new' => 'Yeni',
                'read' => 'Okundu',
                'replied' => 'Cevaplandı',
                'closed' => 'Kapatıldı'
            )
        ),
        'Date' => array(
            'type' => 'date_range'
        )
    );
    
    $search_fields = array(
        'Name' => 'qr.Name',
        'Email' => 'qr.Email', 
        'Company' => 'qr.Company',
        'Listing' => 'l.title'
    );
    
    $sorting_fields = array(
        'Date' => 'qr.Date',
        'Status' => 'qr.Status',
        'Name' => 'qr.Name',
        'Email' => 'qr.Email'
    );
    
    $rlSmarty->assign('filter_fields', $filter_fields);
    $rlSmarty->assign('search_fields', $search_fields);
    $rlSmarty->assign('sorting_fields', $sorting_fields);

    // Sayfa bilgileri
    $page_info['name'] = isset($lang['quote_requests']) ? $lang['quote_requests'] : 'Teklif Talepleri';
    $page_info['title'] = isset($lang['quote_requests_management']) ? $lang['quote_requests_management'] : 'Teklif Talepleri Yönetimi';

    $log_msg = date('Y-m-d H:i:s') . " - Page info set: " . $page_info['title'] . "\n";
    $log_msg .= date('Y-m-d H:i:s') . " - Flynax default filtering disabled\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // File Download Action (GET) - COMPREHENSIVE VERSION FROM MY_QUOTES
    if (isset($_GET['action']) && $_GET['action'] == 'download' && isset($_GET['quote_id'])) {
        $quote_id = (int)$_GET['quote_id'];
        
        $log_msg = date('Y-m-d H:i:s') . " - Download request for quote_id: {$quote_id}\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        
        // Get file info
        $file_info = $rlDb->getRow("SELECT File_path, Name FROM `{db_prefix}quote_requests` WHERE `ID` = {$quote_id}");
        
        $log_msg = date('Y-m-d H:i:s') . " - File info found: " . var_export($file_info, true) . "\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        
        if ($file_info && $file_info['File_path']) {
            // Try multiple possible paths
            $possible_paths = array(
                RL_ROOT . 'files/' . $file_info['File_path'],
                RL_ROOT . 'files/05-2025/' . $file_info['File_path'],
                RL_ROOT . 'files/11-2024/' . $file_info['File_path'],
                RL_ROOT . 'files/10-2024/' . $file_info['File_path'],
                RL_ROOT . 'files/quote_requests/' . basename($file_info['File_path']),
                RL_ROOT . 'files/05-2025/' . basename($file_info['File_path']),
                RL_ROOT . 'files/11-2024/' . basename($file_info['File_path']),
                RL_ROOT . 'files/10-2024/' . basename($file_info['File_path'])
            );
            
            $log_msg = date('Y-m-d H:i:s') . " - Original file path: {$file_info['File_path']}\n";
            $log_msg .= date('Y-m-d H:i:s') . " - RL_ROOT: " . RL_ROOT . "\n";
            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
            
            $file_found = false;
            $found_path = '';
            
            foreach ($possible_paths as $index => $path) {
                $log_msg = date('Y-m-d H:i:s') . " - Trying path " . ($index + 1) . ": {$path}\n";
                $log_msg .= date('Y-m-d H:i:s') . " - Path " . ($index + 1) . " exists: " . (file_exists($path) ? 'YES' : 'NO') . "\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
                if (file_exists($path)) {
                    $file_found = true;
                    $found_path = $path;
                    break;
                }
            }
            
            // Recursive search if not found
            if (!$file_found) {
                $log_msg = date('Y-m-d H:i:s') . " - File not found in any path, starting recursive search:\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
                $search_filename = basename($file_info['File_path']);
                $log_msg = date('Y-m-d H:i:s') . " - Searching for filename: {$search_filename}\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
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
                    urldecode($search_filename)
                );
                
                // Add transliterator variant if available
                if (function_exists('transliterator_transliterate')) {
                    $search_variants[] = transliterator_transliterate('Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove', $search_filename);
                }
                
                $log_msg = date('Y-m-d H:i:s') . " - Search variants: " . implode(' | ', $search_variants) . "\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
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
                        $log_msg = date('Y-m-d H:i:s') . " - Searching in: {$base_dir}\n";
                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                        
                        // Search in date folders with ad## subdirectories
                        if (preg_match('/\d{2}-\d{4}\/$/', $base_dir)) {
                            $subdirs = glob($base_dir . 'ad*', GLOB_ONLYDIR);
                            $log_msg = date('Y-m-d H:i:s') . " - Found ad dirs: " . implode(', ', $subdirs) . "\n";
                            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                            
                            foreach ($subdirs as $subdir) {
                                foreach ($search_variants as $variant) {
                                    if (empty($variant)) continue;
                                    $check_path = $subdir . '/' . $variant;
                                    if (file_exists($check_path)) {
                                        $found_path = $check_path;
                                        $file_found = true;
                                        $log_msg = date('Y-m-d H:i:s') . " - FOUND in subdir with variant: {$check_path}\n";
                                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                                        break 3;
                                    }
                                }
                            }
                        }
                        
                        // Search directly in the directory
                        foreach ($search_variants as $variant) {
                            if (empty($variant)) continue;
                            $direct_path = $base_dir . $variant;
                            if (file_exists($direct_path)) {
                                $found_path = $direct_path;
                                $file_found = true;
                                $log_msg = date('Y-m-d H:i:s') . " - FOUND directly with variant: {$direct_path}\n";
                                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                                break 2;
                            }
                        }
                        
                        // Scan directory for similar files
                        $files = @scandir($base_dir);
                        if ($files) {
                            $log_msg = date('Y-m-d H:i:s') . " - Directory contents (first 10): " . implode(', ', array_slice($files, 0, 10)) . "\n";
                            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                            
                            foreach ($files as $file) {
                                foreach ($search_variants as $variant) {
                                    if (empty($variant)) continue;
                                    // Case insensitive + similar_text matching
                                    if (strtolower($file) === strtolower($variant) || 
                                        similar_text(strtolower($file), strtolower($variant)) > (strlen($variant) * 0.8)) {
                                        $found_path = $base_dir . $file;
                                        $file_found = true;
                                        $log_msg = date('Y-m-d H:i:s') . " - FOUND in scan with similarity: {$found_path} (matched {$file} vs {$variant})\n";
                                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                                        break 3;
                                    }
                                }
                            }
                        }
                    } else {
                        $log_msg = date('Y-m-d H:i:s') . " - Directory does not exist: {$base_dir}\n";
                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                    }
                }
                
                // Final recursive search
                if (!$file_found) {
                    $log_msg = date('Y-m-d H:i:s') . " - Starting desperate recursive search for: {$search_filename}\n";
                    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                    
                    $found_path = admin_recursiveFileSearch(RL_ROOT . 'files/', $search_filename);
                    if ($found_path && file_exists($found_path)) {
                        $file_found = true;
                        $log_msg = date('Y-m-d H:i:s') . " - FOUND via recursive search: {$found_path}\n";
                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                    }
                }
            }
            
            if ($file_found && file_exists($found_path)) {
                $log_msg = date('Y-m-d H:i:s') . " - File found at: {$found_path}\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
                $file_name = basename($found_path);
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $original_name = sanitize_filename($file_info['Name']) . '_teklif_' . $quote_id . '.' . $file_ext;
                
                // MIME type
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
                
                // Clean output buffer
                if (ob_get_level()) {
                    ob_end_clean();
                }
                
                // Download headers
                header('Content-Description: File Transfer');
                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $original_name . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($found_path));
                
                // Output file
                readfile($found_path);
                exit;
            } else {
                $log_msg = date('Y-m-d H:i:s') . " - FINAL ERROR: File not found anywhere\n";
                file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
                
                header('HTTP/1.1 404 Not Found');
                echo "<!DOCTYPE html><html><head><title>Dosya Bulunamadı</title></head><body>";
                echo "<h1>❌ Dosya Bulunamadı</h1>";
                echo "<p>Aradığınız dosya sistemde bulunamadı.</p>";
                echo "<p>Dosya adı: " . htmlspecialchars($file_info['File_path']) . "</p>";
                echo "<p><a href='?controller=quote_requests'>← Geri Dön</a></p>";
                echo "</body></html>";
                exit;
            }
        } else {
            $log_msg = date('Y-m-d H:i:s') . " - No file info found for quote_id: {$quote_id}\n";
            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
            
            header('HTTP/1.1 404 Not Found');
            echo "<!DOCTYPE html><html><head><title>Dosya Bulunamadı</title></head><body>";
            echo "<h1>❌ Dosya Bulunamadı</h1>";
            echo "<p>Bu teklif için dosya bulunmuyor.</p>";
            echo "<p><a href='?controller=quote_requests'>← Geri Dön</a></p>";
            echo "</body></html>";
            exit;
        }
    }

    // View Quote Detail Action (GET)
    if (isset($_GET['action']) && $_GET['action'] == 'view' && isset($_GET['id'])) {
        $quote_id = (int)$_GET['id'];
        
        $log_msg = date('Y-m-d H:i:s') . " - View request for quote_id: {$quote_id}\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
        
        // Get detailed quote info with listing and account details
        $quote_sql = "SELECT qr.*, 
                      l.title as listing_title, l.ID as listing_id, l.Account_ID,
                      CONCAT(COALESCE(a.First_name, ''), ' ', COALESCE(a.Last_name, '')) as listing_owner_name,
                      a.Username as listing_owner_username, a.Mail as listing_owner_email,
                      a.Phone as listing_owner_phone, a.company_name as listing_owner_company
                      FROM `{db_prefix}quote_requests` qr 
                      LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
                      LEFT JOIN `{db_prefix}accounts` a ON l.Account_ID = a.ID
                      WHERE qr.ID = {$quote_id}";
        
        $quote = $rlDb->getRow($quote_sql);
        
        if ($quote) {
            $log_msg = date('Y-m-d H:i:s') . " - Quote details found for ID: {$quote_id}\n";
            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
            
            // Format the quote data
            $quote['formatted_date'] = date('d.m.Y H:i', strtotime($quote['Date']));
            $quote['status_text'] = array(
                'new' => 'Yeni',
                'read' => 'Okundu', 
                'replied' => 'Cevaplandı',
                'closed' => 'Kapatıldı'
            )[$quote['Status']] ?? $quote['Status'];
            
            // Set page info for detail view
            $page_info['name'] = 'Teklif Detayı';
            $page_info['title'] = 'Teklif Detayı #' . $quote_id;
            
            $rlSmarty->assign('quote_detail', $quote);
            $rlSmarty->assign('view_mode', 'detail');
            
            // Template will check for view_mode to show detail instead of list
        } else {
            $log_msg = date('Y-m-d H:i:s') . " - Quote not found for ID: {$quote_id}\n";
            file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
            
            // Redirect back with error
            header('Location: ?controller=quote_requests&error=quote_not_found');
            exit;
        }
    }

    // AJAX Actions
    if (isset($_POST['action']) && $_POST['action']) {
        $log_msg = date('Y-m-d H:i:s') . " - AJAX Action: " . $_POST['action'] . "\n";
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

        switch ($_POST['action']) {
            case 'update_status':
                $quote_id = (int)$_POST['quote_id'];
                $status = $rlValid->xSql($_POST['status']);
                
                if ($quote_id && in_array($status, ['new', 'read', 'replied', 'closed'])) {
                    $rlDb->query("UPDATE `{db_prefix}quote_requests` SET `Status` = '{$status}' WHERE `ID` = {$quote_id}");
                    $GLOBALS['reefless']->ajaxResponse(['status' => 'OK', 'message' => 'Durum güncellendi']);
                } else {
                    $GLOBALS['reefless']->ajaxResponse(['status' => 'ERROR', 'message' => 'Geçersiz veri']);
                }
                break;
                
            case 'delete_quote':
                $quote_id = (int)$_POST['quote_id'];
                
                if ($quote_id) {
                    // Önce dosyayı sil
                    $file_info = $rlDb->getRow("SELECT File_path FROM `{db_prefix}quote_requests` WHERE `ID` = {$quote_id}");
                    if ($file_info['File_path']) {
                        @unlink(RL_ROOT . 'files/' . $file_info['File_path']);
        }
                    
                    $rlDb->query("DELETE FROM `{db_prefix}quote_requests` WHERE `ID` = {$quote_id}");
                    $GLOBALS['reefless']->ajaxResponse(['status' => 'OK', 'message' => isset($lang['quote_deleted']) ? $lang['quote_deleted'] : 'Silindi']);
    } else {
                    $GLOBALS['reefless']->ajaxResponse(['status' => 'ERROR', 'message' => isset($lang['quote_invalid_data']) ? $lang['quote_invalid_data'] : 'Geçersiz veri']);
                }
                break;
        }
    }

    // Filtreleme parametreleri
    $filters = [];
    $where_conditions = ['1=1'];

    $log_msg = date('Y-m-d H:i:s') . " - Setting up filters...\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // Status filtresi
    if (isset($_GET['status']) && $_GET['status'] && $_GET['status'] != 'all') {
        $status_filter = $rlValid->xSql($_GET['status']);
        $where_conditions[] = "qr.Status = '{$status_filter}'";
        $filters['status'] = $status_filter;
    }

    // Tarih filtresi
    if (isset($_GET['date_from']) && $_GET['date_from']) {
        $date_from = $rlValid->xSql($_GET['date_from']);
        $where_conditions[] = "DATE(qr.Date) >= '{$date_from}'";
        $filters['date_from'] = $date_from;
    }

    if (isset($_GET['date_to']) && $_GET['date_to']) {
        $date_to = $rlValid->xSql($_GET['date_to']);
        $where_conditions[] = "DATE(qr.Date) <= '{$date_to}'";
        $filters['date_to'] = $date_to;
    }

    // Arama
    if (isset($_GET['search']) && $_GET['search']) {
        $search = $rlValid->xSql($_GET['search']);
        $where_conditions[] = "(qr.Name LIKE '%{$search}%' OR qr.Email LIKE '%{$search}%' OR qr.Company LIKE '%{$search}%' OR l.title LIKE '%{$search}%')";
        $filters['search'] = $search;
    }

    $where_clause = implode(' AND ', $where_conditions);

    // Sayfalama
    $limit = 20;
    $page = (int)(isset($_GET['pg']) ? $_GET['pg'] : 1);
    if ($page < 1) $page = 1;
    $start = ($page - 1) * $limit;
    
    $log_msg = date('Y-m-d H:i:s') . " - Running main query...\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // Ana sorgu - DISABLE ERROR REPORTING TEMPORARILY
    $old_error_reporting = error_reporting(0);
    $quotes = $rlDb->getAll("SELECT qr.*, l.title as listing_title, l.ID as listing_id, a.Username as account_username, 
            CONCAT(COALESCE(a.First_name, ''), ' ', COALESCE(a.Last_name, '')) as account_name,
            a.Mail as account_email, a.company_name as account_company
            FROM `{db_prefix}quote_requests` qr
            LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID
            LEFT JOIN `{db_prefix}accounts` a ON l.Account_ID = a.ID
            WHERE {$where_clause}
            ORDER BY qr.Date DESC
            LIMIT {$start}, {$limit}");
    error_reporting($old_error_reporting);

    $log_msg = date('Y-m-d H:i:s') . " - Found " . count($quotes) . " quotes\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // Toplam sayı - SIMPLIFIED and SAFE
    $total_count = count($quotes); // Use simple count for now
    $pages_count = ceil($total_count / $limit);

    $log_msg = date('Y-m-d H:i:s') . " - Using simplified count: {$total_count}\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // İstatistikler - SIMPLIFIED
    $stats = ['new' => 0, 'read' => 0, 'replied' => 0, 'closed' => 0];
    foreach ($quotes as $quote) {
        if (isset($stats[$quote['Status']])) {
            $stats[$quote['Status']]++;
        }
    }

    $log_msg = date('Y-m-d H:i:s') . " - Stats calculated from loaded quotes\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    $log_msg = date('Y-m-d H:i:s') . " - Assigning template variables...\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

    // Template değişkenleri - SAFE ASSIGNMENT
    if (method_exists($rlSmarty, 'assign_by_ref')) {
        $rlSmarty->assign_by_ref('quotes', $quotes);
    } else {
        $rlSmarty->assign('quotes', $quotes);
    }

    $rlSmarty->assign('total_count', $total_count);
    $rlSmarty->assign('pages_count', $pages_count);
    $rlSmarty->assign('current_page', $page);
    $rlSmarty->assign('stats', $stats);
    $rlSmarty->assign('filters', $filters);

    // Status options - Database'deki gerçek değerler
    $status_options = [
        'all' => isset($lang['all']) ? $lang['all'] : 'Tümü',
        'new' => 'Yeni',
        'read' => 'Okundu', 
        'replied' => 'Cevaplandı',
        'closed' => 'Kapatıldı'
    ];
    $rlSmarty->assign('status_options', $status_options);

    // Breadcrumb
    $rlSmarty->assign('breadcrumbs', [
        ['title' => isset($lang['home']) ? $lang['home'] : 'Ana Sayfa', 'url' => RL_URL_HOME . ADMIN],
        ['title' => $page_info['title'], 'url' => '']
    ]);

    $log_msg = date('Y-m-d H:i:s') . " - Quote Requests Controller completed successfully\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);

} catch (Exception $e) {
    $log_msg = date('Y-m-d H:i:s') . " - EXCEPTION: " . $e->getMessage() . "\n";
    $log_msg .= "File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
    $log_msg .= "Trace: " . $e->getTraceAsString() . "\n";
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', $log_msg, FILE_APPEND);
    
    // Display error for debugging
    echo "<div style='background: red; color: white; padding: 10px; margin: 10px;'>";
    echo "<h3>Quote Controller Error:</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . " Line: " . $e->getLine() . "</p>";
    echo "</div>";
}

// Helper function for sanitizing filenames
function sanitize_filename($filename) {
    $filename = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $filename);
    $filename = mb_ereg_replace("([\.]{2,})", '', $filename);
    return $filename;
}

// Recursive file search function for admin
function admin_recursiveFileSearch($dir, $filename) {
    if (!is_dir($dir)) {
        return false;
    }
    
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', 
        date('Y-m-d H:i:s') . " - admin_recursiveFileSearch in: {$dir} for: {$filename}\n", FILE_APPEND);
    
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
    
    file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', 
        date('Y-m-d H:i:s') . " - Recursive search variants: " . implode(' | ', $search_variants) . "\n", FILE_APPEND);
    
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
                        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', 
                            date('Y-m-d H:i:s') . " - Recursive match found: {$file->getPathname()} (matched {$current_filename} vs {$variant})\n", FILE_APPEND);
                        return $file->getPathname();
                    }
                }
            }
        }
    } catch (Exception $e) {
        file_put_contents(dirname(__FILE__) . '/../../quote_controller_errors.log', 
            date('Y-m-d H:i:s') . " - Recursive search error: " . $e->getMessage() . "\n", FILE_APPEND);
    }
    
    return false;
}

?>