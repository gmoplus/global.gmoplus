<?php
/******************************************************************************
 * Flynax Quote Requests AJAX Handler
 * Flynax controller sistemine entegre edilmiş versiyon
 ******************************************************************************/





header('Content-Type: application/json');

$action = $_REQUEST['action'] ?? '';
$id = (int)($_REQUEST['id'] ?? 0);

switch ($action) {
    case 'view':
        // Get quote details
        $sql = "SELECT qr.*, l.title as listing_title, l.ID as listing_id,
                       a.Username, a.Full_name, a.Mail as owner_email 
                FROM `{db_prefix}quote_requests` qr 
                LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID 
                LEFT JOIN `{db_prefix}accounts` a ON l.Account_ID = a.ID 
                WHERE qr.ID = {$id}";
        
        $quote = $rlDb->getRow($sql);
        
        if (!$quote) {
            echo json_encode(['success' => false, 'message' => 'Teklif talebi bulunamadı.']);
            exit;
        }
        
        // Mark as viewed if new
        if ($quote['Status'] == 'new') {
            $rlDb->updateOne(array(
                'fields' => array('Status' => 'viewed'),
                'where' => array('ID' => $id)
            ), 'quote_requests');
        }
        
        // Build HTML for modal
        $html = '<div class="quote-modal-content">';
        
        // Basic info
        $html .= '<div class="detail-section">';
        $html .= '<h4>Teklif Talebi Bilgileri</h4>';
        $html .= '<p><strong>ID:</strong> #' . $quote['ID'] . '</p>';
        $html .= '<p><strong>Ad Soyad:</strong> ' . htmlspecialchars($quote['Name']) . '</p>';
        
        if ($quote['Company']) {
            $html .= '<p><strong>Şirket:</strong> ' . htmlspecialchars($quote['Company']) . '</p>';
        }
        
        $html .= '<p><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($quote['Email']) . '">' . htmlspecialchars($quote['Email']) . '</a></p>';
        
        if ($quote['Phone']) {
            $html .= '<p><strong>Telefon:</strong> <a href="tel:' . htmlspecialchars($quote['Phone']) . '">' . htmlspecialchars($quote['Phone']) . '</a></p>';
        }
        
        $html .= '<p><strong>Tarih:</strong> ' . date('d.m.Y H:i:s', strtotime($quote['Date'])) . '</p>';
        $html .= '</div>';
        
        // Description
        if ($quote['Description']) {
            $html .= '<div class="detail-section">';
            $html .= '<h4>Açıklama</h4>';
            $html .= '<p>' . nl2br(htmlspecialchars($quote['Description'])) . '</p>';
            $html .= '</div>';
        }
        
        // Listing info
        if ($quote['listing_title']) {
            $html .= '<div class="detail-section">';
            $html .= '<h4>İlan Bilgileri</h4>';
            $html .= '<p><strong>İlan:</strong> <a href="' . RL_URL_HOME . 'listing/' . $quote['listing_id'] . '" target="_blank">' . htmlspecialchars($quote['listing_title']) . '</a></p>';
            $html .= '</div>';
        }
        
        // Owner info
        if ($quote['Full_name'] || $quote['owner_email']) {
            $html .= '<div class="detail-section">';
            $html .= '<h4>İlan Sahibi</h4>';
            
            if ($quote['Full_name']) {
                $html .= '<p><strong>İsim:</strong> ' . htmlspecialchars($quote['Full_name']) . '</p>';
            }
            
            if ($quote['owner_email']) {
                $html .= '<p><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($quote['owner_email']) . '">' . htmlspecialchars($quote['owner_email']) . '</a></p>';
            }
            
            $html .= '</div>';
        }
        
        $html .= '</div>';
        
        echo json_encode(['success' => true, 'html' => $html]);
        break;
        
    case 'delete':
        // Delete quote request
        $quote = $rlDb->getRow("SELECT * FROM `{db_prefix}quote_requests` WHERE `ID` = {$id}");
        
        if (!$quote) {
            echo json_encode(['success' => false, 'message' => 'Teklif talebi bulunamadı.']);
            exit;
        }
        
        // Delete file if exists
        if ($quote['File_path'] && file_exists(RL_FILES . $quote['File_path'])) {
            @unlink(RL_FILES . $quote['File_path']);
        }
        
        // Delete from database
        $result = $rlDb->query("DELETE FROM `{db_prefix}quote_requests` WHERE `ID` = {$id}");
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Teklif talebi başarıyla silindi.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Silme işlemi başarısız.']);
        }
        break;
        
    case 'update_status':
        $status = $_REQUEST['status'] ?? '';
        $allowed_statuses = array('new', 'in_progress', 'replied', 'closed');
        
        if (!in_array($status, $allowed_statuses)) {
            echo json_encode(['success' => false, 'message' => 'Geçersiz durum.']);
            exit;
        }
        
        $result = $rlDb->updateOne(array(
            'fields' => array('Status' => $status),
            'where' => array('ID' => $id)
        ), 'quote_requests');
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Durum güncellendi.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Güncelleme başarısız.']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Geçersiz işlem.']);
        break;
}

exit;
?> 