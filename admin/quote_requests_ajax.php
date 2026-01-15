<?php
// Quote Requests AJAX Endpoint - XAJAX Bypass
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');

// Output buffer temizle
while (ob_get_level()) {
    ob_end_clean();
}

// Start new buffer
ob_start();

try {
    require_once '../includes/config.inc.php';
    require_once RL_ADMIN_CONTROL . 'ext_header.inc.php';
    require_once RL_LIBS . 'system.lib.php';

    // Check admin authentication
    if (!$rlAdmin->isLogin()) {
        echo json_encode(['error' => 'Not authenticated']);
        exit;
    }

    $action = $_GET['action'] ?? $_POST['action'] ?? '';

    switch ($action) {
        case 'get_quotes':
            $limit = (int) ($_GET['limit'] ?? 50);
            $start = (int) ($_GET['start'] ?? 0);
            $status_filter = $_GET['status'] ?? 'all';

            $sql = "SELECT 
                        qr.ID,
                        qr.Listing_ID,
                        qr.Name,
                        qr.Email,
                        qr.Phone,
                        qr.Position,
                        qr.Description,
                        qr.File_name,
                        qr.Date,
                        qr.Status,
                        l.title as listing_title
                    FROM `{db_prefix}quote_requests` qr
                    LEFT JOIN `{db_prefix}listings` l ON qr.Listing_ID = l.ID
                    WHERE 1=1 ";

            if ($status_filter && $status_filter !== 'all') {
                $status_filter = $rlValid->xSql($status_filter);
                $sql .= "AND qr.Status = '{$status_filter}' ";
            }

            $sql .= "ORDER BY qr.Date DESC LIMIT {$start}, {$limit}";

            $data = $rlDb->getAll($sql);

            // Format data
            foreach ($data as $key => $value) {
                $data[$key]['Date'] = date('d.m.Y H:i', strtotime($value['Date']));
                $data[$key]['listing_link'] = $value['Listing_ID'] ? RL_URL_HOME . 'listing/' . $value['Listing_ID'] : null;
                
                // Truncate description
                if (strlen($value['Description']) > 100) {
                    $data[$key]['Description'] = substr($value['Description'], 0, 100) . '...';
                }
            }

            echo json_encode(['data' => $data, 'total' => count($data)]);
            break;

        case 'update_status':
            $id = (int) $_POST['id'];
            $status = $rlValid->xSql($_POST['status']);
            
            if ($id && $status) {
                $update = $rlDb->query("UPDATE `{db_prefix}quote_requests` SET `Status` = '{$status}' WHERE `ID` = {$id}");
                echo json_encode(['success' => $update ? true : false]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Invalid parameters']);
            }
            break;

        case 'delete':
            $ids = $_POST['ids'] ?? '';
            if ($ids) {
                $ids_array = array_map('intval', explode(',', $ids));
                $ids_str = implode(',', $ids_array);
                
                $delete = $rlDb->query("DELETE FROM `{db_prefix}quote_requests` WHERE `ID` IN ({$ids_str})");
                echo json_encode(['success' => $delete ? true : false]);
            } else {
                echo json_encode(['success' => false, 'error' => 'No IDs provided']);
            }
            break;

        case 'get_stats':
            // Get statistics
            $all_quotes = $rlDb->getAll("SELECT Status, Date FROM `{db_prefix}quote_requests`");
            
            $stats = array();
            $stats['total'] = count($all_quotes);
            $stats['new'] = 0;
            $stats['in_progress'] = 0;
            $stats['today'] = 0;
            
            $today = date('Y-m-d');
            
            foreach ($all_quotes as $quote) {
                if ($quote['Status'] == 'new') $stats['new']++;
                if ($quote['Status'] == 'in_progress') $stats['in_progress']++;
                
                if (date('Y-m-d', strtotime($quote['Date'])) == $today) {
                    $stats['today']++;
                }
            }
            
            echo json_encode($stats);
            break;

        default:
            echo json_encode(['error' => 'Invalid action']);
            break;
    }

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

// Clean output and send
$output = ob_get_clean();
echo $output;
exit;
?> 