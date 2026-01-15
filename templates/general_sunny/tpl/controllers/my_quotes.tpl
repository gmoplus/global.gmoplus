<!-- my quotes -->

{if $quote}
    <!-- Tekil teklif görüntüleme -->
    <div class="quote-detail-container">
        <div class="quote-detail-card">
            <div class="quote-header">
                <h1 class="quote-title">
                    <i class="fas fa-file-invoice"></i>
                    Teklif Detayı
                </h1>
                <div class="quote-actions">
                    <a href="{$rlBase}my-quotes.html" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Tekliflere Dön
                    </a>
                </div>
            </div>
            
            <div class="quote-content">
                <!-- İlan Bilgisi -->
                <div class="info-section">
                    <h3 class="section-title">
                        <i class="fas fa-home"></i>
                        İlan Bilgisi
                    </h3>
                    <div class="info-item">
                        <span class="label">İlan:</span>
                        <span class="value">
                            <a href="{$quote.listing_url}" target="_blank" class="listing-link">
                                {$quote.listing_title}
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </span>
                    </div>
                </div>

                <!-- İletişim Bilgileri -->
                <div class="info-section">
                    <h3 class="section-title">
                        <i class="fas fa-user"></i>
                        İletişim Bilgileri
                    </h3>
                    <div class="contact-grid">
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-user-tag"></i>
                                Ad Soyad
                            </span>
                            <span class="value">{$quote.Name}</span>
                        </div>
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-envelope"></i>
                                E-posta
                            </span>
                            <span class="value">
                                <a href="mailto:{$quote.Email}" class="contact-link">
                                    {$quote.Email}
                                </a>
                            </span>
                        </div>
                        {if $quote.Phone}
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-phone"></i>
                                Telefon
                            </span>
                            <span class="value">
                                <a href="tel:{$quote.Phone}" class="contact-link">
                                    {$quote.Phone}
                                </a>
                            </span>
                        </div>
                        {/if}
                        {if $quote.Company}
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-building"></i>
                                Şirket
                            </span>
                            <span class="value">{$quote.Company}</span>
                        </div>
                        {/if}
                        {if $quote.Position}
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-briefcase"></i>
                                Pozisyon
                            </span>
                            <span class="value">{$quote.Position}</span>
                        </div>
                        {/if}
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-calendar"></i>
                                Tarih
                            </span>
                            <span class="value">{$quote.Date|date_format:"%d.%m.%Y %H:%M"}</span>
                        </div>
                        <div class="info-item">
                            <span class="label">
                                <i class="fas fa-flag"></i>
                                Durum
                            </span>
                            <span class="value">
                                <span class="status-badge status-{$quote.Status}">
                                    {$statuses[$quote.Status]}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                {if $quote.Description}
                <div class="info-section">
                    <h3 class="section-title">
                        <i class="fas fa-comment"></i>
                        Mesaj
                    </h3>
                    <div class="message-content">
                        {$quote.Description|nl2br}
                    </div>
                </div>
                {/if}
                
                {if $quote.File_path}
                <div class="info-section">
                    <h3 class="section-title">
                        <i class="fas fa-paperclip"></i>
                        Ek Dosya
                    </h3>
                    <div class="file-download">
                        <a href="{$rlBase}my-quotes.html?action=download&quote_id={$quote.ID}" 
                           class="btn btn-download">
                            <i class="fas fa-download"></i>
                            Dosyayı İndir
                        </a>
                        <span class="file-info">
                            <i class="fas fa-info-circle"></i>
                            Teklif sahibinin eklediği dosya
                        </span>
                    </div>
                </div>
                {/if}
            </div>
            
            <!-- Durum güncelleme -->
            <div class="status-update-section">
                <h3 class="section-title">
                    <i class="fas fa-cog"></i>
                    Durum Güncelle
                </h3>
                <form method="post" action="" class="status-form" id="statusForm">
                    <input type="hidden" name="action" value="update_status">
                    <input type="hidden" name="quote_id" value="{$quote.ID}">
                    <div class="form-row">
                        <select name="status" class="status-select">
                            {foreach from=$statuses key='status_key' item='status_name'}
                                <option value="{$status_key}" {if $quote.Status == $status_key}selected{/if}>
                                    {$status_name}
                                </option>
                            {/foreach}
                        </select>
                        <button type="submit" class="btn btn-primary" id="updateBtn">
                            <i class="fas fa-save"></i>
                            Güncelle
                        </button>
                    </div>
                    <div id="statusMessage" class="status-message" style="display: none;"></div>
                </form>
            </div>
        </div>
    </div>

{else}
    <!-- Teklif listesi -->
    <div class="quotes-container">
        <div class="quotes-header">
            <h1 class="page-title">
                <i class="fas fa-file-invoice-dollar"></i>
                İlanlarıma Gelen Teklifler
            </h1>
        </div>
        
        <!-- Filtreleme -->
        <div class="filters-section">
            <form method="get" action="{$rlBase}my-quotes.html" class="filters-form">
                
                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-home"></i>
                        İlan Filtrele:
                    </label>
                    <select name="id" onchange="this.form.submit()" class="filter-select">
                        <option value="">Tüm İlanlar</option>
                        {foreach from=$my_listings item='listing'}
                            <option value="{$listing.ID}" {if $selected_listing == $listing.ID}selected{/if}>
                                {$listing.title}
                            </option>
                        {/foreach}
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-flag"></i>
                        Durum Filtrele:
                    </label>
                    <select name="status" onchange="this.form.submit()" class="filter-select">
                        <option value="">Tüm Durumlar</option>
                        {foreach from=$statuses key='status_key' item='status_name'}
                            <option value="{$status_key}" {if $selected_status == $status_key}selected{/if}>
                                {$status_name}
                            </option>
                        {/foreach}
                    </select>
                </div>
            </form>
        </div>
        
        {if $quotes}
            <div class="quotes-grid">
                {foreach from=$quotes item='quote'}
                <div class="quote-card">
                    <div class="quote-card-header">
                        <div class="listing-info">
                            <h3 class="listing-title">
                                <a href="{$quote.listing_url}" target="_blank" class="listing-link">
                                    {$quote.listing_title}
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </h3>
                        </div>
                        <div class="quote-status">
                            <span class="status-badge status-{$quote.Status}">
                                {$statuses[$quote.Status]}
                            </span>
                        </div>
                    </div>
                    
                    <div class="quote-card-body">
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-user"></i>
                                <span>{$quote.Name}</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{$quote.Email}" class="contact-link">
                                    {$quote.Email}
                                </a>
                            </div>
                            {if $quote.Phone}
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:{$quote.Phone}" class="contact-link">
                                    {$quote.Phone}
                                </a>
                            </div>
                            {/if}
                        </div>
                        
                        <div class="quote-meta">
                            <div class="quote-date">
                                <i class="fas fa-calendar"></i>
                                {$quote.Date|date_format:"%d.%m.%Y"}
                            </div>
                            {if $quote.File_path}
                            <div class="has-attachment">
                                <i class="fas fa-paperclip"></i>
                                Ek dosya var
                            </div>
                            {/if}
                        </div>
                    </div>
                    
                    <div class="quote-card-footer">
                        <a href="{$rlBase}my-quotes.html?action=view&id={$quote.ID}" 
                           class="btn btn-primary btn-view">
                            <i class="fas fa-eye"></i>
                            Detayları Görüntüle
                        </a>
                    </div>
                </div>
                {/foreach}
            </div>
            
            <!-- Sayfalama -->
            {if $pages_count > 1}
            <div class="pagination-wrapper">
                <div class="pagination">
                    {for $i=1 to $pages_count}
                        {if $i == $current_page}
                            <span class="page-item current">{$i}</span>
                        {else}
                            <a href="{$rlBase}my-quotes.html?pg={$i}{if $selected_listing}&id={$selected_listing}{/if}{if $selected_status}&status={$selected_status}{/if}" 
                               class="page-item">{$i}</a>
                        {/if}
                    {/for}
                </div>
            </div>
            {/if}
            
        {else}
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <h3 class="empty-title">Henüz teklif yok</h3>
                <p class="empty-message">İlanlarınıza henüz hiç teklif gelmemiş. İlanlarınızı paylaşın ve teklifleri burada görüntüleyin.</p>
                <a href="{$rlBase}index.php?page=my_all_ads" class="btn btn-primary">
                    <i class="fas fa-list"></i>
                    İlanlarıma Git
                </a>
            </div>
        {/if}
    </div>
{/if}

<style>
{literal}
/* Modern Dark Mode Compatible Quote System Styles */

/* Container & Layout */
.quote-detail-container,
.quotes-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Quote Detail Card */
.quote-detail-card {
    background: var(--card-bg, #ffffff);
    border: 1px solid var(--border-color, #e1e5e9);
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.04);
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.quote-detail-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color, #2c5aa0), var(--accent-color, #3498db), var(--secondary-color, #e74c3c));
    border-radius: 16px 16px 0 0;
}

.quote-header {
    background: linear-gradient(135deg, var(--primary-color, #2c5aa0), var(--primary-dark, #1a4480));
    color: white;
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.quote-title {
    font-size: 24px;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.quote-content {
    padding: 24px;
}

/* Info Sections */
.info-section {
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 1px solid var(--border-light, #f0f2f4);
}

.info-section:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.section-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--heading-color, #2c3e50);
    margin: 0 0 16px 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: var(--primary-color, #2c5aa0);
    font-size: 16px;
}

/* Contact Grid */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 16px;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.info-item .label {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted, #6c757d);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.info-item .value {
    font-size: 15px;
    color: var(--text-color, #2c3e50);
    font-weight: 500;
}

/* Links */
.listing-link,
.contact-link {
    color: var(--primary-color, #2c5aa0);
    text-decoration: none;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.listing-link:hover,
.contact-link:hover {
    color: var(--primary-dark, #1a4480);
    text-decoration: none;
}

/* Status Badges */
.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.status-new {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-badge.status-viewed {
    background: #cce7ff;
    color: #004085;
    border: 1px solid #b3d7ff;
}

.status-badge.status-replied {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.status-badge.status-closed {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Message Content */
.message-content {
    background: var(--bg-light, #f8f9fa);
    border: 1px solid var(--border-light, #e9ecef);
    border-radius: 8px;
    padding: 20px;
    line-height: 1.6;
    color: var(--text-color, #495057);
    white-space: pre-wrap;
}

/* File Download */
.file-download {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.file-info {
    font-size: 13px;
    color: var(--text-muted, #6c757d);
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Status Update */
.status-update-section {
    background: var(--bg-light, #f8f9fa);
    border-top: 1px solid var(--border-color, #e1e5e9);
    padding: 24px;
}

.status-form .form-row {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.status-select {
    padding: 10px 16px;
    border: 1px solid var(--border-color, #ced4da);
    border-radius: 6px;
    background: var(--input-bg, #ffffff);
    color: var(--text-color, #495057);
    font-size: 14px;
    min-width: 200px;
}

/* Quotes Grid */
.quotes-header {
    margin-bottom: 24px;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--heading-color, #2c3e50);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Modern Filters */
.filters-section {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(248, 249, 250, 0.9));
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 32px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    position: relative;
}

.filters-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(44, 90, 160, 0.05), rgba(52, 152, 219, 0.05));
    pointer-events: none;
}

.filters-form {
    display: flex;
    gap: 24px;
    align-items: end;
    flex-wrap: wrap;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 200px;
}

.filter-label {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted, #6c757d);
    display: flex;
    align-items: center;
    gap: 6px;
}

.filter-select {
    padding: 14px 20px;
    border: 2px solid var(--primary-color, #2c5aa0);
    border-radius: 12px;
    background: var(--input-bg, #ffffff);
    color: var(--text-color, #2c3e50);
    font-size: 15px;
    font-weight: 500;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    appearance: none;
    position: relative;
    min-height: 50px;
}

.filter-select option {
    background: var(--input-bg, #ffffff);
    color: var(--text-color, #2c3e50);
    padding: 10px;
    font-size: 14px;
}

.filter-select:focus {
    outline: none;
    transform: translateY(-1px);
    box-shadow: 0 8px 24px rgba(44, 90, 160, 0.2);
}

.filter-select:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 16px rgba(44, 90, 160, 0.15);
}

/* Quote Cards Grid */
.quotes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
}

.quote-card {
    background: var(--card-bg, #ffffff);
    border: 1px solid var(--border-color, #e1e5e9);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08), 0 1px 4px rgba(0, 0, 0, 0.04);
    position: relative;
    backdrop-filter: blur(10px);
}

.quote-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--primary-color, #2c5aa0), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.quote-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.16), 0 4px 12px rgba(0, 0, 0, 0.08);
    border-color: var(--primary-color, #2c5aa0);
}

.quote-card:hover::before {
    opacity: 1;
}

.quote-card-header {
    background: var(--bg-light, #f8f9fa);
    border-bottom: 1px solid var(--border-light, #e9ecef);
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: start;
    gap: 12px;
}

.listing-title {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
    line-height: 1.4;
}

.quote-card-body {
    padding: 20px;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 16px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: var(--text-color, #495057);
}

.contact-item i {
    color: var(--primary-color, #2c5aa0);
    width: 16px;
    flex-shrink: 0;
}

.quote-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid var(--border-light, #f0f2f4);
    font-size: 13px;
    color: var(--text-muted, #6c757d);
}

.quote-date,
.has-attachment {
    display: flex;
    align-items: center;
    gap: 6px;
}

.has-attachment {
    color: var(--primary-color, #2c5aa0);
    font-weight: 500;
}

.quote-card-footer {
    padding: 16px 20px;
    background: var(--bg-light, #f8f9fa);
    border-top: 1px solid var(--border-light, #e9ecef);
}

/* Modern Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 24px;
    border: none;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    white-space: nowrap;
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.btn:hover::before {
    left: 100%;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color, #2c5aa0), var(--primary-dark, #1a4480));
    color: white;
    box-shadow: 0 4px 16px rgba(44, 90, 160, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--primary-dark, #1a4480), var(--primary-color, #2c5aa0));
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(44, 90, 160, 0.4);
}

.btn-outline {
    background: transparent;
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-outline:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    text-decoration: none;
}

.btn-download {
    background: var(--success-color, #28a745);
    color: white;
}

.btn-download:hover {
    background: var(--success-dark, #1e7e34);
    color: white;
    text-decoration: none;
}

.btn-view {
    width: 100%;
    justify-content: center;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-muted, #6c757d);
}

.empty-icon {
    font-size: 64px;
    color: var(--border-color, #e1e5e9);
    margin-bottom: 24px;
}

.empty-title {
    font-size: 24px;
    font-weight: 600;
    color: var(--heading-color, #2c3e50);
    margin: 0 0 12px 0;
}

.empty-message {
    font-size: 16px;
    line-height: 1.5;
    margin: 0 0 24px 0;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 32px;
}

.pagination {
    display: flex;
    gap: 8px;
    align-items: center;
}

.page-item {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 1px solid var(--border-color, #dee2e6);
    border-radius: 6px;
    color: var(--text-color, #495057);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.page-item:hover {
    background: var(--primary-color, #2c5aa0);
    color: white;
    border-color: var(--primary-color, #2c5aa0);
    text-decoration: none;
}

.page-item.current {
    background: var(--primary-color, #2c5aa0);
    color: white;
    border-color: var(--primary-color, #2c5aa0);
}

/* CSS Variables & Animation Support */
:root {
    --primary-color: #2c5aa0;
    --primary-dark: #1a4480;
    --accent-color: #3498db;
    --secondary-color: #e74c3c;
    --success-color: #27ae60;
    --success-dark: #229954;
    --card-bg: #ffffff;
    --border-color: #e1e5e9;
    --border-light: #f0f2f4;
    --bg-light: #f8f9fa;
    --text-color: #2c3e50;
    --text-muted: #6c757d;
    --heading-color: #2c3e50;
    --input-bg: #ffffff;
    --shadow-light: rgba(0, 0, 0, 0.04);
    --shadow-medium: rgba(0, 0, 0, 0.08);
    --shadow-heavy: rgba(0, 0, 0, 0.16);
}

/* Smooth Loading Animation */
@keyframes shimmer {
    0% { background-position: -200px 0; }
    100% { background-position: calc(200px + 100%) 0; }
}

.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200px 100%;
    animation: shimmer 1.5s infinite;
}

/* Micro-interactions */
.interactive {
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.interactive:hover {
    transform: scale(1.02);
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
    :root {
        --card-bg: #2c3e50;
        --border-color: #34495e;
        --border-light: #3a4e63;
        --bg-light: #34495e;
        --text-color: #ecf0f1;
        --text-muted: #95a5a6;
        --heading-color: #ecf0f1;
        --input-bg: #34495e;
        --primary-color: #3498db;
        --primary-dark: #2980b9;
        --accent-color: #52c9f5;
        --shadow-light: rgba(0, 0, 0, 0.2);
        --shadow-medium: rgba(0, 0, 0, 0.3);
        --shadow-heavy: rgba(0, 0, 0, 0.5);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .quote-detail-container,
    .quotes-container {
        padding: 16px;
    }
    
    .quote-header {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
    }
    
    .quote-title {
        font-size: 20px;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
    }
    
    .filters-form {
        flex-direction: column;
        align-items: stretch;
    }
    
    .filter-group {
        min-width: auto;
    }
    
    .quotes-grid {
        grid-template-columns: 1fr;
    }
    
    .quote-card-header {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }
    
    .quote-meta {
        flex-direction: column;
        gap: 8px;
        align-items: start;
    }
    
    .status-form .form-row {
        flex-direction: column;
        align-items: stretch;
    }
    
    .status-select {
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 24px;
        flex-direction: column;
        gap: 8px;
        text-align: center;
    }
    
    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }
}
{/literal}
</style>

<script>
{literal}
// Status Update AJAX İşlevselliği
document.addEventListener('DOMContentLoaded', function() {
    const statusForm = document.getElementById('statusForm');
    const updateBtn = document.getElementById('updateBtn');
    const statusMessage = document.getElementById('statusMessage');
    
    if (statusForm) {
        statusForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Button'u devre dışı bırak ve loading göster
            updateBtn.disabled = true;
            updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Güncelleniyor...';
            
            // Form verilerini topla
            const formData = new FormData(statusForm);
            
            // AJAX isteği gönder
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Mesajı göster
                statusMessage.style.display = 'block';
                if (data.success) {
                    statusMessage.className = 'status-message success';
                    statusMessage.innerHTML = '<i class="fas fa-check-circle"></i> ' + data.message;
                    
                    // Sayfayı 1.5 saniye sonra yeniden yükle
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    statusMessage.className = 'status-message error';
                    statusMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> ' + data.message;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                statusMessage.style.display = 'block';
                statusMessage.className = 'status-message error';
                statusMessage.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Bir hata oluştu. Lütfen tekrar deneyin.';
            })
            .finally(() => {
                // Button'u yeniden aktif et
                updateBtn.disabled = false;
                updateBtn.innerHTML = '<i class="fas fa-save"></i> Güncelle';
            });
        });
    }
    
    // Form submit için filter fix - onchange ile conflict önlemek için
    const filterSelects = document.querySelectorAll('.filter-select');
    filterSelects.forEach(select => {
        // Önce mevcut onchange'i kaldır
        select.removeAttribute('onchange');
        
        select.addEventListener('change', function() {
            console.log('Filter changed:', this.name, this.value);
            // Form submit işlemini 200ms geciktir (kullanıcı deneyimi için)
            setTimeout(() => {
                this.closest('form').submit();
            }, 200);
        });
    });
});

// Status message stillerini ekle
const styleElement = document.createElement('style');
styleElement.textContent = `
.status-message {
    margin-top: 12px;
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
    animation: slideIn 0.3s ease;
}

.status-message.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-message.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
`;
document.head.appendChild(styleElement);
{/literal}
</script>

<!-- my quotes end --> 