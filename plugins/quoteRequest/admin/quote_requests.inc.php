<?php

/******************************************************************************
 * Quote Request Plugin - Admin Controller
 * Teklif isteklerini yönetmek için admin paneli
 ******************************************************************************/

// Admin kontrolü
if (!$reefless->checkPermissions('administrator')) {
    $reefless->redirect();
}

// Plugin sınıfını yükle
$reefless->loadClass('QuoteRequest', null, 'quoteRequest');

$action = $_GET['action'];
$id = (int)$_GET['id'];

// Breadcrumb ayarla
$bcAStep = $action ? ucfirst($action) : 'Browse';
$rlSmarty->assign_by_ref('bcAStep', $bcAStep);

switch ($action) {
    case 'view':
        // Teklif detayını görüntüle
        if ($id) {
            $quote = $rlDb->fetch("*", array('ID' => $id), null, null, 'quote_requests', 'row');
            
            if ($quote) {
                // İlan bilgilerini al
                $listing = $rlDb->fetch("*", array('ID' => $quote['Listing_ID']), null, null, 'listings', 'row');
                $quote['Listing_Title'] = $listing['Title'];
                
                // Talep sahibi bilgilerini al
                if ($quote['Requester_ID']) {
                    $requester = $rlDb->fetch("*", array('ID' => $quote['Requester_ID']), null, null, 'accounts', 'row');
                    $quote['Requester_Username'] = $requester['Username'];
                }
                
                // Satıcı bilgilerini al
                $seller = $rlDb->fetch("*", array('ID' => $quote['Seller_ID']), null, null, 'accounts', 'row');
                $quote['Seller_Username'] = $seller['Username'];
                
                $rlSmarty->assign_by_ref('quote', $quote);
            }
        }
        break;
        
    case 'reply':
        // Teklif cevapla
        if ($_POST['submit']) {
            $replyMessage = $_POST['reply_message'];
            $status = $_POST['status'];
            
            if ($rlQuoteRequest->updateQuoteStatus($id, $status, $replyMessage)) {
                $rlSmarty->assign_by_ref('message', 'Reply sent successfully');
                
                // Email gönder
                $quote = $rlDb->fetch("*", array('ID' => $id), null, null, 'quote_requests', 'row');
                if ($quote) {
                    $subject = "Reply to your quote request";
                    $message = "
                    <h3>Quote Request Reply</h3>
                    <p><strong>Status:</strong> " . ucfirst($status) . "</p>
                    <p><strong>Message:</strong><br>" . nl2br($replyMessage) . "</p>
                    ";
                    
                    $rlMail->send($quote['Email'], $subject, $message);
                }
            } else {
                $rlSmarty->assign_by_ref('error', 'Failed to send reply');
            }
        }
        
        if ($id) {
            $quote = $rlDb->fetch("*", array('ID' => $id), null, null, 'quote_requests', 'row');
            $rlSmarty->assign_by_ref('quote', $quote);
        }
        break;
        
    case 'delete':
        // Teklif sil
        if ($_POST['submit']) {
            $quote = $rlDb->fetch("*", array('ID' => $id), null, null, 'quote_requests', 'row');
            
            // Dosyayı sil
            if ($quote['File_path'] && file_exists($quote['File_path'])) {
                unlink($quote['File_path']);
            }
            
            // Veritabanından sil
            if ($rlDb->query("DELETE FROM `" . RL_DBPREFIX . "quote_requests` WHERE `ID` = {$id}")) {
                $rlSmarty->assign_by_ref('message', 'Quote request deleted successfully');
            } else {
                $rlSmarty->assign_by_ref('error', 'Failed to delete quote request');
            }
        }
        break;
        
    case 'export':
        // Excel export
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=quote_requests_" . date('Y-m-d') . ".xls");
        
        $quotes = $rlQuoteRequest->getQuoteRequests(null, 1000, 0);
        
        echo "<table border=1>";
        echo "<tr><th>ID</th><th>Date</th><th>Name</th><th>Email</th><th>Phone</th><th>Position</th><th>Description</th><th>Status</th></tr>";
        
        foreach ($quotes as $quote) {
            echo "<tr>";
            echo "<td>{$quote['ID']}</td>";
            echo "<td>{$quote['Date']}</td>";
            echo "<td>{$quote['Name']}</td>";
            echo "<td>{$quote['Email']}</td>";
            echo "<td>{$quote['Phone']}</td>";
            echo "<td>{$quote['Position']}</td>";
            echo "<td>" . htmlspecialchars($quote['Description']) . "</td>";
            echo "<td>{$quote['Status']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        exit;
        break;
        
    default:
        // Liste görünümü
        $page = (int)$_GET['page'] ?: 1;
        $limit = 20;
        $start = ($page - 1) * $limit;
        
        // Filtreleme
        $where = array();
        if ($_GET['status']) {
            $where['Status'] = $_GET['status'];
        }
        if ($_GET['seller_id']) {
            $where['Seller_ID'] = (int)$_GET['seller_id'];
        }
        
        // Toplam sayı
        $totalCount = $rlDb->getOne("COUNT(*)", $where, "quote_requests");
        
        // Verileri al
        $sql = "SELECT qr.*, l.Title as Listing_Title, a.Username as Seller_Username 
                FROM `" . RL_DBPREFIX . "quote_requests` qr
                LEFT JOIN `" . RL_DBPREFIX . "listings` l ON qr.Listing_ID = l.ID  
                LEFT JOIN `" . RL_DBPREFIX . "accounts` a ON qr.Seller_ID = a.ID";
        
        if ($where) {
            $conditions = array();
            foreach ($where as $key => $value) {
                $conditions[] = "qr.{$key} = '" . $rlDb->escape($value) . "'";
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        
        $sql .= " ORDER BY qr.Date DESC LIMIT {$start}, {$limit}";
        
        $quotes = $rlDb->getAll($sql);
        
        // Sayfalama
        $reefless->loadClass('Navigator');
        $navigator = $rlNavigator->build($totalCount, $limit, $page);
        
        $rlSmarty->assign_by_ref('quotes', $quotes);
        $rlSmarty->assign_by_ref('navigator', $navigator);
        $rlSmarty->assign_by_ref('total_count', $totalCount);
        
        // Durum filtreleri
        $statuses = array(
            'new' => 'New',
            'read' => 'Read', 
            'replied' => 'Replied',
            'closed' => 'Closed'
        );
        $rlSmarty->assign_by_ref('statuses', $statuses);
        break;
}