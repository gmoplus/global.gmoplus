<!-- Quote Requests Admin Template - Flynax Standard -->

{include file='header.tpl'}

{literal}
<style>
/* Admin sidebar'ı gizle */
.admin-sidebar, .sidebar, .left-sidebar, .nav-sidebar, .admin-nav,
.admin-menu, .side-menu, .navigation, .admin-navigation {
    display: none !important;
}

/* Main content'i full width yap */
.admin-content, .content-wrapper, .main-content, #main-content {
    margin-left: 0 !important;
    width: 100% !important;
    max-width: 100% !important;
}

/* Body'ye özel stil */
body.admin {
    padding: 0 !important;
    margin: 0 !important;
}

/* Controller area'yı full width yap */
#controller_area {
    width: 100% !important;
    max-width: 100% !important;
    margin: 0 !important;
    padding: 20px !important;
    background: #f8f9fa;
    min-height: 100vh;
}

/* Sadece istatistik kartları için özel CSS */
.quote-stats {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
    flex-wrap: wrap;
}

.stat-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px;
    border-radius: 10px;
    min-width: 150px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-card.new { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%); }
.stat-card.read { background: linear-gradient(135deg, #4834d4 0%, #686de0 100%); }
.stat-card.replied { background: linear-gradient(135deg, #00d2d3 0%, #54a0ff 100%); }
.stat-card.closed { background: linear-gradient(135deg, #7f8fa6 0%, #273c75 100%); }

.stat-number {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 14px;
    opacity: 0.9;
}

/* Quote Detail Styles */
.quote-detail-container {
    max-width: 1200px;
    margin: 0 auto;
}

.detail-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e9ecef;
}

.detail-header h2 {
    margin: 0;
    color: #495057;
}

.detail-content {
    margin-bottom: 30px;
}

.detail-card {
    background: white;
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
}

.detail-card h4 {
    color: #495057;
    margin-bottom: 20px;
    font-weight: 600;
    border-bottom: 2px solid #667eea;
    padding-bottom: 10px;
}

.detail-card table {
    margin-bottom: 0;
}

.detail-card table td {
    padding: 8px 0;
    vertical-align: top;
}

.detail-card table td:first-child {
    width: 30%;
    color: #6c757d;
}

.message-content {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid #667eea;
    line-height: 1.6;
    font-size: 14px;
}

.detail-actions {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
    text-align: center;
}

.badge {
    font-size: 12px;
    padding: 6px 12px;
}

@media (max-width: 768px) {
    .quote-stats {
        flex-direction: column;
    }
    
    .detail-header {
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }
    
    .detail-card {
        padding: 15px;
    }
    
    .detail-card table td:first-child {
        width: 40%;
    }
}
</style>
{/literal}
                
<div id="controller_area">
    <!-- Page Header -->
    <div class="page-header">
        <h1>📋 Teklif Talepleri Yönetimi</h1>
        <p>Müşterilerden gelen teklif taleplerini yönetin ve takip edin</p>
    </div>
        
    <!-- Statistics Cards -->
    <div class="quote-stats">
            <div class="stat-card new">
                <div class="stat-number">{$stats.new|default:0}</div>
            <div class="stat-label">Yeni Talepler</div>
            </div>
        <div class="stat-card read">
            <div class="stat-number">{$stats.read|default:0}</div>
            <div class="stat-label">Okunanlar</div>
        </div>
        <div class="stat-card replied">
            <div class="stat-number">{$stats.replied|default:0}</div>
            <div class="stat-label">Cevaplanılanlar</div>
        </div>
        <div class="stat-card closed">
            <div class="stat-number">{$stats.closed|default:0}</div>
            <div class="stat-label">Kapatılanlar</div>
                </div>
            </div>
            
    <!-- Flynax Standard Content Area -->
    <div class="content-area">
        
        {if $view_mode == 'detail'}
            <!-- Quote Detail View -->
            <div class="quote-detail-container">
                <div class="detail-header">
                    <h2>📋 Teklif Detayı #{$quote_detail.ID}</h2>
                    <a href="?controller=quote_requests" class="btn btn-secondary">← Listeye Dön</a>
                </div>
                
                <div class="detail-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h4>👤 Talep Eden Bilgileri</h4>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Ad Soyad:</strong></td>
                                        <td>{$quote_detail.Name}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>E-posta:</strong></td>
                                        <td><a href="mailto:{$quote_detail.Email}">{$quote_detail.Email}</a></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Telefon:</strong></td>
                                        <td>
                                            {if $quote_detail.Phone}
                                                <a href="tel:{$quote_detail.Phone}">{$quote_detail.Phone}</a>
                                            {else}
                                                <em>Belirtilmemiş</em>
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Şirket:</strong></td>
                                        <td>
                                            {if $quote_detail.Company}
                                                {$quote_detail.Company}
                                            {else}
                                                <em>Belirtilmemiş</em>
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pozisyon:</strong></td>
                                        <td>
                                            {if $quote_detail.Position}
                                                {$quote_detail.Position}
                                            {else}
                                                <em>Belirtilmemiş</em>
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Yetki:</strong></td>
                                        <td>
                                            {if $quote_detail.Authority}
                                                {$quote_detail.Authority}
                                            {else}
                                                <em>Belirtilmemiş</em>
                                            {/if}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h4>📝 Teklif Bilgileri</h4>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Tarih:</strong></td>
                                        <td>{$quote_detail.formatted_date}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Durum:</strong></td>
                                        <td>
                                            <span class="badge badge-{if $quote_detail.Status == 'new'}danger{elseif $quote_detail.Status == 'read'}primary{elseif $quote_detail.Status == 'replied'}success{else}secondary{/if}">
                                                {$quote_detail.status_text}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>İlan:</strong></td>
                                        <td>
                                            {if $quote_detail.listing_title}
                                                <a href="{$rlBase}index.php?page=view_listing&id={$quote_detail.listing_id}" target="_blank">
                                                    {$quote_detail.listing_title}
                                                </a>
                                            {else}
                                                İlan #{$quote_detail.Listing_ID}
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>İlan Sahibi:</strong></td>
                                        <td>
                                            {if $quote_detail.listing_owner_name}
                                                {$quote_detail.listing_owner_name}
                                                <br><small>@{$quote_detail.listing_owner_username}</small>
                                            {else}
                                                <em>Bilinmiyor</em>
                                            {/if}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dosya:</strong></td>
                                        <td>
                                            {if $quote_detail.File_path}
                                                <a href="?controller=quote_requests&action=download&quote_id={$quote_detail.ID}" class="btn btn-sm btn-info">
                                                    📎 Dosya İndir
                                                </a>
                                            {else}
                                                <em>Dosya yok</em>
                                            {/if}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    {if $quote_detail.Message}
                        <div class="detail-card">
                            <h4>💬 Açıklama/Mesaj</h4>
                            <div class="message-content">
                                {$quote_detail.Message|nl2br}
                            </div>
                        </div>
                    {/if}
                    
                    <div class="detail-actions">
                        <select class="form-control status-select" data-quote-id="{$quote_detail.ID}" style="width: 200px; display: inline-block;">
                            <option value="new" {if $quote_detail.Status == 'new'}selected{/if}>Yeni</option>
                            <option value="read" {if $quote_detail.Status == 'read'}selected{/if}>Okundu</option>
                            <option value="replied" {if $quote_detail.Status == 'replied'}selected{/if}>Cevaplandı</option>
                            <option value="closed" {if $quote_detail.Status == 'closed'}selected{/if}>Kapatıldı</option>
                        </select>
                        
                        <button class="btn btn-danger" onclick="deleteQuote({$quote_detail.ID})" style="margin-left: 10px;">
                            🗑️ Teklifi Sil
                        </button>
                    </div>
                </div>
            </div>
        {else}
        {if $quotes}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tarih</th>
                        <th>İlan</th>
                        <th>Talep Eden</th>
                        <th>İletişim</th>
                        <th>Durum</th>
                        <th>Dosya</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$quotes item=quote}
                        <tr>
                            <td>#{$quote.ID}</td>
                            <td>
                                {$quote.Date|date_format:"%d.%m.%Y"}<br>
                                <small>{$quote.Date|date_format:"%H:%M"}</small>
                        </td>
                        <td>
                            {if $quote.listing_title}
                                    <a href="{$rlBase}index.php?page=view_listing&id={$quote.listing_id}" target="_blank">
                                        {$quote.listing_title|truncate:30}
                                </a>
                            {else}
                                İlan #{$quote.Listing_ID}
                            {/if}
                        </td>
                        <td>
                                <strong>{$quote.Name}</strong>
                                {if $quote.Company}
                                    <br><small>{$quote.Company}</small>
                                {/if}
                            </td>
                            <td>
                                <a href="mailto:{$quote.Email}">{$quote.Email}</a>
                                {if $quote.Phone}
                                    <br><a href="tel:{$quote.Phone}">{$quote.Phone}</a>
                                {/if}
                            </td>
                            <td>
                                <select class="form-control status-select" data-quote-id="{$quote.ID}">
                                    <option value="new" {if $quote.Status == 'new'}selected{/if}>Yeni</option>
                                    <option value="read" {if $quote.Status == 'read'}selected{/if}>Okundu</option>
                                    <option value="replied" {if $quote.Status == 'replied'}selected{/if}>Cevaplandı</option>
                                    <option value="closed" {if $quote.Status == 'closed'}selected{/if}>Kapatıldı</option>
                                </select>
                            </td>
                                                        <td>
                                {if $quote.File_path}
                                    <a href="?controller=quote_requests&action=download&quote_id={$quote.ID}" class="btn btn-sm btn-info">
                                        📎 Dosya İndir
                                    </a>
                                {else}
                                    -
                                {/if}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary" onclick="viewQuote({$quote.ID})" title="Detay">
                                        👁️
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteQuote({$quote.ID})" title="Sil">
                                        🗑️
                                    </button>
                                </div>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        {else}
            <div class="alert alert-info text-center">
                <h3>📭 Teklif talebi bulunamadı</h3>
                <p>Belirtilen kriterlere uygun teklif talebi bulunmuyor.</p>
        </div>
        {/if}
    </div>
        
        <!-- Summary -->
        <div class="alert alert-info text-center">
            Toplam <strong>{$total_count}</strong> teklif talebi gösteriliyor
        </div>
        {/if}
    </div>
</div>

{literal}
<script>
// FORCE HIDE ADMIN SIDEBAR
$(document).ready(function() {
    // Hide admin sidebar completely
    $('.admin-sidebar, .sidebar, .left-sidebar, .nav-sidebar').hide();
    $('.admin-nav, .admin-menu, .side-menu, .navigation').hide();
    $('.admin-navigation, .menu-sidebar, .left-panel').hide();
    
    // Force main content to full width
    $('.admin-content, .content-wrapper, .main-content, #main-content').css({
        'margin-left': '0',
        'width': '100%',
        'max-width': '100%'
    });
    
    // Force controller area to full width
    $('#controller_area').css({
        'width': '100%',
        'max-width': '100%',
        'margin': '0',
        'padding': '20px',
        'background': '#f8f9fa'
    });
    
    // Hide any remaining sidebar elements
    $('*').each(function() {
        var className = $(this).attr('class') || '';
        var id = $(this).attr('id') || '';
        
        if (className.includes('sidebar') || className.includes('nav') || 
            className.includes('menu') || id.includes('sidebar') || 
            id.includes('nav') || id.includes('menu')) {
            
            // Don't hide our main navigation
            if (!className.includes('quote-') && !id.includes('controller_area')) {
                $(this).hide();
            }
        }
    });
    
    console.log('Admin sidebar hidden');
});

// Status update via AJAX
$(document).on('change', '.status-select', function() {
    var quoteId = $(this).data('quote-id');
    var newStatus = $(this).val();
    var selectElement = $(this);
    
    $.post('', {
        action: 'update_status',
        quote_id: quoteId,
        status: newStatus
    }, function(response) {
        if (response.status === 'OK') {
            printMessage('success', response.message || 'Durum güncellendi');
        } else {
            selectElement.val(selectElement.data('original-value'));
            printMessage('error', response.message || 'Hata oluştu');
}
    }, 'json').fail(function() {
        selectElement.val(selectElement.data('original-value'));
        printMessage('error', 'Bağlantı hatası');
    });
});

// Store original values
$(document).ready(function() {
    $('.status-select').each(function() {
        $(this).data('original-value', $(this).val());
        });
});

// View quote details
function viewQuote(quoteId) {
    window.location.href = '?controller=quote_requests&action=view&id=' + quoteId;
}

// Delete quote
function deleteQuote(quoteId) {
    if (confirm('Bu teklif talebini silmek istediğinizden emin misiniz?')) {
        $.post('', {
            action: 'delete_quote',
            quote_id: quoteId
        }, function(response) {
            if (response.status === 'OK') {
                // Detay sayfasındaysak listeye gönder, değilse reload yap
                if (window.location.href.indexOf('action=view') > -1) {
                    window.location.href = '?controller=quote_requests';
                } else {
                    location.reload();
                }
            } else {
                printMessage('error', response.message || 'Hata oluştu');
            }
        }, 'json').fail(function() {
            printMessage('error', 'Bağlantı hatası');
        });
    }
}
</script>
{/literal}

{include file='footer.tpl'} 