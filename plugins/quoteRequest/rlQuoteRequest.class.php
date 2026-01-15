<?php

class rlQuoteRequest 
{
    /**
     * Plugin constructor
     */
    public function __construct() 
    {
        global $rlPlugin;
        $this->plugin = $rlPlugin->getPlugin('quoteRequest');
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
            `Status` enum('new','read','replied','closed') DEFAULT 'new',
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
        $uploadDir = RL_FILES . 'quote_requests/';
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
        $uploadDir = RL_FILES . 'quote_requests/';
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
        // EN BASİT TEST - eğer bu görünmezse hook hiç çalışmıyor
        echo '<div style="position:fixed;top:0;left:0;background:red;color:white;padding:10px;z-index:99999;font-size:16px;font-weight:bold;">🔥 HOOK ÇALIŞIYOR!</div>';
        echo '<script>console.log("🔥🔥🔥 HOOK KESINLIKLE ÇALIŞTI! 🔥🔥🔥");</script>';
    }
    
    /**
     * Hook: AJAX Request handler
     */
    public function hookAjaxRequest() 
    {
        global $rlXajax;
        
        if ($_GET['item'] == 'submitQuoteRequest') {
            $rlXajax->registerFunction(array('submitQuoteRequest', $this, 'ajaxSubmitQuote'));
        }
    }
    
    /**
     * AJAX: Submit quote request (Modern JSON version)
     */
    public function ajaxSubmitQuote($data) 
    {
        global $rlDb, $rlMail, $config, $account_info;
        
        $response = array(
            'success' => false,
            'message' => 'Unknown error',
            'data' => null
        );
        
        try {
        // Giriş kontrolü
            if (!$account_info || !$account_info['ID']) {
                $response['message'] = $GLOBALS['lang']['quote_request_login_required'] ?? 'Please login to request a quote.';
                return $response;
        }
        
        // Veri doğrulama
            $listingId = (int)($data['listing_id'] ?? 0);
            $name = trim($data['name'] ?? '');
            $email = trim($data['email'] ?? '');
            $phone = trim($data['phone'] ?? '');
            $position = trim($data['position'] ?? '');
            $description = trim($data['description'] ?? '');
        
        if (!$listingId || !$name || !$email || !$phone || !$description) {
                $response['message'] = 'Please fill all required fields.';
                return $response;
            }
            
            // Email formatını kontrol et
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $response['message'] = 'Please enter a valid email address.';
                return $response;
        }
        
        // İlan bilgilerini al
        $listing = $rlDb->fetch("*", array('ID' => $listingId), null, null, 'listings', 'row');
        if (!$listing) {
                $response['message'] = 'Listing not found.';
                return $response;
            }
            
            // Kendi ilanına teklif isteyemez
            if ($account_info['ID'] == $listing['Account_ID']) {
                $response['message'] = 'You cannot request a quote for your own listing.';
                return $response;
        }
        
        // Dosya yükleme işlemi
        $filePath = null;
        $fileName = null;
        
        if (isset($_FILES['quote_file']) && $_FILES['quote_file']['size'] > 0) {
            $uploadResult = $this->handleFileUpload($_FILES['quote_file']);
                if (!$uploadResult['success']) {
                    $response['message'] = $uploadResult['message'];
                    return $response;
                } else {
                $filePath = $uploadResult['path'];
                $fileName = $uploadResult['name'];
            }
        }
        
        // Veritabanına kaydet
        $quoteData = array(
            'Listing_ID' => $listingId,
            'Requester_ID' => $account_info['ID'],
            'Seller_ID' => $listing['Account_ID'],
            'Name' => $name,
            'Email' => $email,
            'Phone' => $phone,
            'Position' => $position,
            'Description' => $description,
            'File_path' => $filePath,
            'File_name' => $fileName,
            'Date' => date('Y-m-d H:i:s')
        );
        
        $quoteId = $rlDb->insertOne($quoteData, 'quote_requests');
        
        if ($quoteId) {
            // Satıcıya email gönder
                $emailSent = $this->sendNotificationEmail($listing, $quoteData, $quoteId);
            
                $response['success'] = true;
                $response['message'] = $GLOBALS['lang']['quote_request_success'] ?? 'Your quote request has been sent successfully!';
                $response['data'] = array(
                    'quote_id' => $quoteId,
                    'email_sent' => $emailSent
                );
            } else {
                $response['message'] = $GLOBALS['lang']['quote_request_error'] ?? 'An error occurred while saving your request.';
            }
            
        } catch (Exception $e) {
            $response['message'] = 'Server error: ' . $e->getMessage();
            error_log('Quote Request Error: ' . $e->getMessage());
        }
        
        return $response;
    }
    
    /**
     * AJAX: Get quote requests (Admin)
     */
    public function ajaxGetRequests($data)
    {
        global $rlDb, $account_info;
        
        $response = array(
            'success' => false,
            'message' => 'Access denied',
            'data' => null
        );
        
        // Admin kontrolü
        if (!$account_info || $account_info['Type'] !== 'admin') {
            return $response;
        }
        
        try {
            $limit = (int)($data['limit'] ?? 50);
            $offset = (int)($data['offset'] ?? 0);
            $status = trim($data['status'] ?? '');
            
            $where = array();
            if ($status && $status !== 'all') {
                $where['Status'] = $status;
            }
            
            $requests = $rlDb->fetch("*", $where, "Date DESC", array($offset, $limit), 'quote_requests');
            $total = $rlDb->getOne('COUNT(*)', $where, 'quote_requests');
            
            $response['success'] = true;
            $response['data'] = array(
                'requests' => $requests,
                'total' => $total,
                'limit' => $limit,
                'offset' => $offset
            );
            
        } catch (Exception $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
        
        return $response;
    }
    
    /**
     * AJAX: Update quote request status
     */
    public function ajaxUpdateStatus($data)
    {
        global $rlDb, $account_info;
        
        $response = array(
            'success' => false,
            'message' => 'Access denied',
            'data' => null
        );
        
        // Admin kontrolü
        if (!$account_info || $account_info['Type'] !== 'admin') {
            return $response;
        }
        
        try {
            $quoteId = (int)($data['quote_id'] ?? 0);
            $status = trim($data['status'] ?? '');
            $replyMessage = trim($data['reply_message'] ?? '');
            
            if (!$quoteId || !$status) {
                $response['message'] = 'Missing required parameters';
                return $response;
            }
            
            $updateData = array(
                'Status' => $status,
                'Reply_date' => date('Y-m-d H:i:s')
            );
            
            if ($replyMessage) {
                $updateData['Reply_message'] = $replyMessage;
            }
            
            $updated = $rlDb->updateOne($updateData, array('ID' => $quoteId), 'quote_requests');
            
            if ($updated) {
                $response['success'] = true;
                $response['message'] = 'Status updated successfully';
        } else {
                $response['message'] = 'Failed to update status';
            }
            
        } catch (Exception $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
        
        return $response;
    }
    
    /**
     * Handle file upload
     */
    private function handleFileUpload($file) 
    {
        global $config;
        
        $allowedTypes = explode(',', $config['quote_request_allowed_files']);
        $maxSize = $config['quote_request_max_file_size'] * 1024 * 1024; // MB to bytes
        
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($fileExt, $allowedTypes)) {
            return array('success' => false, 'error' => 'File type not allowed');
        }
        
        if ($file['size'] > $maxSize) {
            return array('success' => false, 'error' => 'File too large');
        }
        
        $uploadDir = RL_FILES . 'quote_requests/';
        $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file['name']);
        $filePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return array(
                'success' => true,
                'path' => $filePath,
                'name' => $file['name']
            );
        }
        
        return array('success' => false, 'error' => 'Upload failed');
    }
    
    /**
     * Send notification email
     */
    private function sendNotificationEmail($listing, $quoteData, $quoteId) 
    {
        global $rlMail, $rlDb, $config;
        
        // Satıcı bilgilerini al
        $seller = $rlDb->fetch("*", array('ID' => $listing['Account_ID']), null, null, 'accounts', 'row');
        
        if (!$seller) return;
        
        $subject = "New Quote Request for: " . $listing['Title'];
        
        $message = "
        <h3>New Quote Request</h3>
        <p><strong>Listing:</strong> {$listing['Title']}</p>
        <p><strong>Requester:</strong> {$quoteData['Name']}</p>
        <p><strong>Email:</strong> {$quoteData['Email']}</p>
        <p><strong>Phone:</strong> {$quoteData['Phone']}</p>
        <p><strong>Position:</strong> {$quoteData['Position']}</p>
        <p><strong>Description:</strong><br>{$quoteData['Description']}</p>
        ";
        
        if ($quoteData['File_name']) {
            $message .= "<p><strong>Attached File:</strong> {$quoteData['File_name']}</p>";
        }
        
        $message .= "<p><a href='" . RL_URL_HOME . "admin/index.php?controller=quote_requests&action=view&id={$quoteId}'>View in Admin Panel</a></p>";
        
        $rlMail->send($seller['Email'], $subject, $message);
        
        // Admin'e de bildir
        if ($config['quote_request_email']) {
            $rlMail->send($config['quote_request_email'], $subject, $message);
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
            $where['Seller_ID'] = $sellerId;
        }
        
        return $rlDb->fetch("*", $where, "ORDER BY Date DESC LIMIT {$start}, {$limit}", null, 'quote_requests');
    }
    
    /**
     * Update quote request status
     */
    public function updateQuoteStatus($id, $status, $replyMessage = null) 
    {
        global $rlDb;
        
        $data = array(
            'Status' => $status
        );
        
        if ($replyMessage) {
            $data['Reply_message'] = $replyMessage;
            $data['Reply_date'] = date('Y-m-d H:i:s');
        }
        
        return $rlDb->updateOne($data, array('ID' => $id), 'quote_requests');
    }
    
    /**
     * Delete directory recursively
     */
    private function deleteDirectory($dir) 
    {
        if (!is_dir($dir)) return;
        
        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            is_dir($path) ? $this->deleteDirectory($path) : unlink($path);
        }
        rmdir($dir);
    }
}