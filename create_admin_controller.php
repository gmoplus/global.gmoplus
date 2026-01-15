<?php
/**
 * Quote Request Plugin - Admin Controller Creator
 * Bu script admin kontrolcüsü ve template dosyalarını oluşturur
 */

echo "=== QUOTE REQUEST - ADMİN KONTROLCÜSÜ OLUŞTURULUYOR ===\n\n";

$pluginDir = 'plugins/quoteRequest';
$adminDir = $pluginDir . '/admin';

// Admin Controller dosyası
echo "1. ADMİN KONTROLCÜSÜ OLUŞTURULUYOR...\n";

$adminController = '<?php

/******************************************************************************
 * Quote Request Plugin - Admin Controller
 * Teklif isteklerini yönetmek için admin paneli
 ******************************************************************************/

// Admin kontrolü
if (!$reefless->checkPermissions(\'administrator\')) {
    $reefless->redirect();
}

// Plugin sınıfını yükle
$reefless->loadClass(\'QuoteRequest\', null, \'quoteRequest\');

$action = $_GET[\'action\'];
$id = (int)$_GET[\'id\'];

// Breadcrumb ayarla
$bcAStep = $action ? ucfirst($action) : \'Browse\';
$rlSmarty->assign_by_ref(\'bcAStep\', $bcAStep);

switch ($action) {
    case \'view\':
        // Teklif detayını görüntüle
        if ($id) {
            $quote = $rlDb->fetch("*", array(\'ID\' => $id), null, null, \'quote_requests\', \'row\');
            
            if ($quote) {
                // İlan bilgilerini al
                $listing = $rlDb->fetch("*", array(\'ID\' => $quote[\'Listing_ID\']), null, null, \'listings\', \'row\');
                $quote[\'Listing_Title\'] = $listing[\'Title\'];
                
                // Talep sahibi bilgilerini al
                if ($quote[\'Requester_ID\']) {
                    $requester = $rlDb->fetch("*", array(\'ID\' => $quote[\'Requester_ID\']), null, null, \'accounts\', \'row\');
                    $quote[\'Requester_Username\'] = $requester[\'Username\'];
                }
                
                // Satıcı bilgilerini al
                $seller = $rlDb->fetch("*", array(\'ID\' => $quote[\'Seller_ID\']), null, null, \'accounts\', \'row\');
                $quote[\'Seller_Username\'] = $seller[\'Username\'];
                
                $rlSmarty->assign_by_ref(\'quote\', $quote);
            }
        }
        break;
        
    case \'reply\':
        // Teklif cevapla
        if ($_POST[\'submit\']) {
            $replyMessage = $_POST[\'reply_message\'];
            $status = $_POST[\'status\'];
            
            if ($rlQuoteRequest->updateQuoteStatus($id, $status, $replyMessage)) {
                $rlSmarty->assign_by_ref(\'message\', \'Reply sent successfully\');
                
                // Email gönder
                $quote = $rlDb->fetch("*", array(\'ID\' => $id), null, null, \'quote_requests\', \'row\');
                if ($quote) {
                    $subject = "Reply to your quote request";
                    $message = "
                    <h3>Quote Request Reply</h3>
                    <p><strong>Status:</strong> " . ucfirst($status) . "</p>
                    <p><strong>Message:</strong><br>" . nl2br($replyMessage) . "</p>
                    ";
                    
                    $rlMail->send($quote[\'Email\'], $subject, $message);
                }
            } else {
                $rlSmarty->assign_by_ref(\'error\', \'Failed to send reply\');
            }
        }
        
        if ($id) {
            $quote = $rlDb->fetch("*", array(\'ID\' => $id), null, null, \'quote_requests\', \'row\');
            $rlSmarty->assign_by_ref(\'quote\', $quote);
        }
        break;
        
    case \'delete\':
        // Teklif sil
        if ($_POST[\'submit\']) {
            $quote = $rlDb->fetch("*", array(\'ID\' => $id), null, null, \'quote_requests\', \'row\');
            
            // Dosyayı sil
            if ($quote[\'File_path\'] && file_exists($quote[\'File_path\'])) {
                unlink($quote[\'File_path\']);
            }
            
            // Veritabanından sil
            if ($rlDb->query("DELETE FROM `" . RL_DBPREFIX . "quote_requests` WHERE `ID` = {$id}")) {
                $rlSmarty->assign_by_ref(\'message\', \'Quote request deleted successfully\');
            } else {
                $rlSmarty->assign_by_ref(\'error\', \'Failed to delete quote request\');
            }
        }
        break;
        
    case \'export\':
        // Excel export
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=quote_requests_" . date(\'Y-m-d\') . ".xls");
        
        $quotes = $rlQuoteRequest->getQuoteRequests(null, 1000, 0);
        
        echo "<table border=1>";
        echo "<tr><th>ID</th><th>Date</th><th>Name</th><th>Email</th><th>Phone</th><th>Position</th><th>Description</th><th>Status</th></tr>";
        
        foreach ($quotes as $quote) {
            echo "<tr>";
            echo "<td>{$quote[\'ID\']}</td>";
            echo "<td>{$quote[\'Date\']}</td>";
            echo "<td>{$quote[\'Name\']}</td>";
            echo "<td>{$quote[\'Email\']}</td>";
            echo "<td>{$quote[\'Phone\']}</td>";
            echo "<td>{$quote[\'Position\']}</td>";
            echo "<td>" . htmlspecialchars($quote[\'Description\']) . "</td>";
            echo "<td>{$quote[\'Status\']}</td>";
            echo "</tr>";
        }
        echo "</table>";
        exit;
        break;
        
    default:
        // Liste görünümü
        $page = (int)$_GET[\'page\'] ?: 1;
        $limit = 20;
        $start = ($page - 1) * $limit;
        
        // Filtreleme
        $where = array();
        if ($_GET[\'status\']) {
            $where[\'Status\'] = $_GET[\'status\'];
        }
        if ($_GET[\'seller_id\']) {
            $where[\'Seller_ID\'] = (int)$_GET[\'seller_id\'];
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
                $conditions[] = "qr.{$key} = \'" . $rlDb->escape($value) . "\'";
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        
        $sql .= " ORDER BY qr.Date DESC LIMIT {$start}, {$limit}";
        
        $quotes = $rlDb->getAll($sql);
        
        // Sayfalama
        $reefless->loadClass(\'Navigator\');
        $navigator = $rlNavigator->build($totalCount, $limit, $page);
        
        $rlSmarty->assign_by_ref(\'quotes\', $quotes);
        $rlSmarty->assign_by_ref(\'navigator\', $navigator);
        $rlSmarty->assign_by_ref(\'total_count\', $totalCount);
        
        // Durum filtreleri
        $statuses = array(
            \'new\' => \'New\',
            \'read\' => \'Read\', 
            \'replied\' => \'Replied\',
            \'closed\' => \'Closed\'
        );
        $rlSmarty->assign_by_ref(\'statuses\', $statuses);
        break;
}';

file_put_contents($adminDir . '/quote_requests.inc.php', $adminController);
echo "✓ quote_requests.inc.php oluşturuldu\n";

echo "\n2. ADMİN TEMPLATE DOSYASI OLUŞTURULUYOR...\n";

// Admin Template dosyası
$adminTemplate = '<!-- Quote Requests Admin Template -->

{if $smarty.get.action == \'view\' && $quote}
    <!-- Detay Görünümü -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Quote Request Details - #{$quote.ID}</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td width="150"><strong>Date:</strong></td>
                            <td>{$quote.Date}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>
                                <span class="label label-{if $quote.Status == \'new\'}warning{elseif $quote.Status == \'read\'}info{elseif $quote.Status == \'replied\'}success{else}default{/if}">
                                    {$quote.Status|ucfirst}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Listing:</strong></td>
                            <td>{$quote.Listing_Title}</td>
                        </tr>
                        <tr>
                            <td><strong>Seller:</strong></td>
                            <td>{$quote.Seller_Username}</td>
                        </tr>
                        <tr>
                            <td><strong>Requester:</strong></td>
                            <td>{$quote.Requester_Username|default:"Guest"}</td>
                        </tr>
                    </table>
                    
                    <h5>Contact Information:</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td width="150"><strong>Name:</strong></td>
                            <td>{$quote.Name}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td><a href="tel:{$quote.Phone}">{$quote.Phone}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Position:</strong></td>
                            <td>{$quote.Position}</td>
                        </tr>
                    </table>
                    
                    <h5>Description:</h5>
                    <div class="well">
                        {$quote.Description|nl2br}
                    </div>
                    
                    {if $quote.File_name}
                    <h5>Attached File:</h5>
                    <p>
                        <a href="{$smarty.const.RL_FILES_URL}quote_requests/{$quote.File_name}" target="_blank" class="btn btn-default">
                            <i class="fa fa-download"></i> Download {$quote.File_name}
                        </a>
                    </p>
                    {/if}
                    
                    {if $quote.Reply_message}
                    <h5>Reply:</h5>
                    <div class="alert alert-info">
                        <strong>Reply Date:</strong> {$quote.Reply_date}<br>
                        <strong>Message:</strong><br>
                        {$quote.Reply_message|nl2br}
                    </div>
                    {/if}
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Actions</h4>
                </div>
                <div class="panel-body">
                    <a href="index.php?controller=quote_requests&action=reply&id={$quote.ID}" class="btn btn-primary btn-block">
                        <i class="fa fa-reply"></i> Reply
                    </a>
                    <a href="index.php?controller=quote_requests" class="btn btn-default btn-block">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                    <hr>
                    <button type="button" class="btn btn-danger btn-block" onclick="if(confirm(\'Are you sure?\')) location.href=\'index.php?controller=quote_requests&action=delete&id={$quote.ID}\'">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

{elseif $smarty.get.action == \'reply\' && $quote}
    <!-- Cevap Formu -->
    <form method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Reply to Quote Request #{$quote.ID}</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status:</label>
                            <select name="status" class="form-control">
                                <option value="read" {if $quote.Status == \'read\'}selected{/if}>Read</option>
                                <option value="replied" {if $quote.Status == \'replied\'}selected{/if}>Replied</option>
                                <option value="closed" {if $quote.Status == \'closed\'}selected{/if}>Closed</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Reply Message:</label>
                    <textarea name="reply_message" class="form-control" rows="5" required>{$quote.Reply_message}</textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i> Send Reply
                    </button>
                    <a href="index.php?controller=quote_requests&action=view&id={$quote.ID}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>

{else}
    <!-- Liste Görünümü -->
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <h4 class="pull-left">Quote Requests ({$total_count})</h4>
            <div class="pull-right">
                <a href="index.php?controller=quote_requests&action=export" class="btn btn-success btn-sm">
                    <i class="fa fa-download"></i> Export Excel
                </a>
            </div>
        </div>
        
        <!-- Filtreler -->
        <div class="panel-body">
            <form method="get" class="form-inline">
                <input type="hidden" name="controller" value="quote_requests">
                
                <div class="form-group">
                    <label>Status:</label>
                    <select name="status" class="form-control input-sm">
                        <option value="">All Statuses</option>
                        {foreach from=$statuses key=key item=label}
                            <option value="{$key}" {if $smarty.get.status == $key}selected{/if}>{$label}</option>
                        {/foreach}
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="index.php?controller=quote_requests" class="btn btn-default btn-sm">Clear</a>
            </form>
        </div>
        
        {if $quotes}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Listing</th>
                        <th>Requester</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$quotes item=quote}
                    <tr>
                        <td>#{$quote.ID}</td>
                        <td>{$quote.Date|date_format:"%d.%m.%Y %H:%M"}</td>
                        <td>
                            {$quote.Listing_Title|truncate:30}
                            {if $quote.File_name}
                                <i class="fa fa-paperclip text-info" title="Has attachment"></i>
                            {/if}
                        </td>
                        <td>{$quote.Name}</td>
                        <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                        <td><a href="tel:{$quote.Phone}">{$quote.Phone}</a></td>
                        <td>
                            <span class="label label-{if $quote.Status == \'new\'}warning{elseif $quote.Status == \'read\'}info{elseif $quote.Status == \'replied\'}success{else}default{/if}">
                                {$quote.Status|ucfirst}
                            </span>
                        </td>
                        <td>
                            <a href="index.php?controller=quote_requests&action=view&id={$quote.ID}" class="btn btn-xs btn-primary" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="index.php?controller=quote_requests&action=reply&id={$quote.ID}" class="btn btn-xs btn-success" title="Reply">
                                <i class="fa fa-reply"></i>
                            </a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        
        <!-- Sayfalama -->
        {if $navigator}
        <div class="panel-footer">
            {include file=\'blocks/m_block_navigator.tpl\'}
        </div>
        {/if}
        
        {else}
        <div class="panel-body text-center">
            <p>No quote requests found.</p>
        </div>
        {/if}
    </div>
{/if}

<style>
.label {
    font-size: 11px;
    padding: 3px 6px;
}
.table td {
    vertical-align: middle;
}
</style>';

file_put_contents($adminDir . '/quote_requests.tpl', $adminTemplate);
echo "✓ quote_requests.tpl oluşturuldu\n";

echo "\n=== ADMİN KONTROLCÜSÜ BAŞARIYLA OLUŞTURULDU! ===\n\n";

echo "📋 KURULUM REHBERİ:\n\n";

echo "1. FTP ile dosyaları yükleyin:\n";
echo "   - plugins/quoteRequest/ klasörünü sunucuya kopyalayın\n\n";

echo "2. Admin paneline giriş yapın:\n";
echo "   - https://global.gmoplus.com/admin/\n\n";

echo "3. Plugin yüklemesi:\n";
echo "   - Plugins bölümüne gidin\n";
echo "   - quoteRequest plugin'ini bulun\n";
echo "   - Install butonuna tıklayın\n";
echo "   - Activate ile aktifleştirin\n\n";

echo "4. Plugin ayarları:\n";
echo "   - Plugins > Quote Request Settings\n";
echo "   - Admin email adresini ayarlayın\n";
echo "   - Dosya boyutu limitini belirleyin\n";
echo "   - İzin verilen dosya tiplerini ayarlayın\n\n";

echo "5. Test edin:\n";
echo "   - Herhangi bir ilan detay sayfasına gidin\n";
echo "   - \"Teklif Al\" butonunu göreceksiniz\n";
echo "   - Formu doldurup test edin\n\n";

echo "🎯 YÖNETİM PANELİ:\n";
echo "   - Admin > Quote Requests bölümünden tüm talepleri görebilirsiniz\n";
echo "   - Talepleri filtreleyebilir, cevap verebilir, silebilirsiniz\n";
echo "   - Excel export özelliği de mevcut\n\n";

echo "📧 EMAIL BİLDİRİMLERİ:\n";
echo "   - Yeni talep geldiğinde satıcıya email gider\n";
echo "   - Admin email adresine de bildirim gider\n";
echo "   - Cevap verildiğinde talep sahibine email gider\n\n";

echo "✅ HAZIR! Plugin kullanıma hazır.\n";
?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 