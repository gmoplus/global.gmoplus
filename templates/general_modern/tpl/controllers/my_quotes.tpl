<!-- my quotes -->

{if $quote}
    <!-- Tekil teklif görüntüleme -->
    <div class="quote-detail">
        <div class="content-area">
            <h1>Teklif Detayı</h1>
            
            <div class="quote-info">
                <table class="table">
                    <tr>
                        <td><strong>İlan:</strong></td>
                        <td><a href="{$rlBase}index.php?page=view_listing&id={$quote.listing_id}" target="_blank">{$quote.listing_title}</a></td>
                    </tr>
                    <tr>
                        <td><strong>Ad Soyad:</strong></td>
                        <td>{$quote.Name}</td>
                    </tr>
                    <tr>
                        <td><strong>E-posta:</strong></td>
                        <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                    </tr>
                    {if $quote.Phone}
                    <tr>
                        <td><strong>Telefon:</strong></td>
                        <td><a href="tel:{$quote.Phone}">{$quote.Phone}</a></td>
                    </tr>
                    {/if}
                    {if $quote.Company}
                    <tr>
                        <td><strong>Şirket:</strong></td>
                        <td>{$quote.Company}</td>
                    </tr>
                    {/if}
                    {if $quote.Position}
                    <tr>
                        <td><strong>Pozisyon:</strong></td>
                        <td>{$quote.Position}</td>
                    </tr>
                    {/if}
                    <tr>
                        <td><strong>Tarih:</strong></td>
                        <td>{$quote.Date|date_format:"%d.%m.%Y %H:%M"}</td>
                    </tr>
                    <tr>
                        <td><strong>Durum:</strong></td>
                        <td>
                            <span class="status-{$quote.Status}">{$statuses[$quote.Status]}</span>
                        </td>
                    </tr>
                </table>
                
                {if $quote.Description}
                <div class="quote-description">
                    <h3>Mesaj:</h3>
                    <div class="description-text">{$quote.Description|nl2br}</div>
                </div>
                {/if}
                
                {if $quote.File_path}
                <div class="quote-file">
                    <h3>Ek Dosya:</h3>
                    <a href="{$quote.File_path}" target="_blank" class="file-link">
                        📎 Dosyayı İndir
                    </a>
                </div>
                {/if}
            </div>
            
            <!-- Durum güncelleme formu -->
            <div class="status-update">
                <h3>Durum Güncelle:</h3>
                <form method="post" action="">
                    <input type="hidden" name="action" value="update_status">
                    <input type="hidden" name="quote_id" value="{$quote.ID}">
                    <select name="status" class="form-control">
                        {foreach from=$statuses key='status_key' item='status_name'}
                            <option value="{$status_key}" {if $quote.Status == $status_key}selected{/if}>
                                {$status_name}
                            </option>
                        {/foreach}
                    </select>
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
            
            <div class="back-link">
                <a href="{$rlBase}index.php?page=my_quotes" class="btn btn-secondary">← Tekliflere Dön</a>
            </div>
        </div>
    </div>

    <style>
    {literal}
    .quote-detail {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px 0;
        overflow: hidden;
    }
    .quote-detail .content-area {
        padding: 20px;
    }
    .quote-info table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .quote-info td {
        padding: 10px;
        border-bottom: 1px solid #eee;
        vertical-align: top;
    }
    .quote-info td:first-child {
        width: 150px;
        font-weight: bold;
        background: #f8f9fa;
    }
    .quote-description, .quote-file {
        margin: 20px 0;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    .description-text {
        margin-top: 10px;
        line-height: 1.6;
    }
    .file-link {
        display: inline-block;
        padding: 8px 15px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 10px;
    }
    .file-link:hover {
        background: #0056b3;
        color: white;
    }
    .status-update {
        margin: 20px 0;
        padding: 15px;
        background: #f0f0f0;
        border-radius: 5px;
    }
    .status-update select, .status-update button {
        margin: 5px;
        padding: 8px 12px;
    }
    .status-new { color: #28a745; font-weight: bold; }
    .status-viewed { color: #17a2b8; }
    .status-replied { color: #ffc107; }
    .status-closed { color: #6c757d; }
    {/literal}
    </style>

{else}
    <!-- Teklif listesi -->
    <div class="quotes-list">
        <div class="content-area">
            <h1>İlanlarıma Gelen Teklifler</h1>
            
            <!-- Filtreleme -->
            <div class="filter-area">
                <form method="get" action="">
                    <input type="hidden" name="page" value="my_quotes">
                    
                    <label>İlan Filtrele:</label>
                    <select name="listing_id" onchange="this.form.submit()">
                        <option value="">Tüm İlanlar</option>
                        {foreach from=$my_listings item='listing'}
                            <option value="{$listing.ID}" {if $selected_listing == $listing.ID}selected{/if}>
                                {$listing.title}
                            </option>
                        {/foreach}
                    </select>
                    
                    <label>Durum Filtrele:</label>
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Tüm Durumlar</option>
                        {foreach from=$statuses key='status_key' item='status_name'}
                            <option value="{$status_key}" {if $selected_status == $status_key}selected{/if}>
                                {$status_name}
                            </option>
                        {/foreach}
                    </select>
                </form>
            </div>
            
            {if $quotes}
                <div class="quotes-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>İlan</th>
                                <th>Ad Soyad</th>
                                <th>E-posta</th>
                                <th>Telefon</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$quotes item='quote'}
                            <tr class="quote-row status-{$quote.Status}">
                                <td>
                                    <a href="{$rlBase}index.php?page=view_listing&id={$quote.listing_id}" target="_blank">
                                        {$quote.listing_title}
                                    </a>
                                </td>
                                <td>{$quote.Name}</td>
                                <td><a href="mailto:{$quote.Email}">{$quote.Email}</a></td>
                                <td>
                                    {if $quote.Phone}
                                        <a href="tel:{$quote.Phone}">{$quote.Phone}</a>
                                    {else}
                                        -
                                    {/if}
                                </td>
                                <td>{$quote.Date|date_format:"%d.%m.%Y"}</td>
                                <td>
                                    <span class="status-badge status-{$quote.Status}">
                                        {$statuses[$quote.Status]}
                                    </span>
                                </td>
                                <td>
                                    <a href="{$rlBase}index.php?page=my_quotes&action=view&id={$quote.ID}" 
                                       class="btn btn-sm btn-primary">
                                        Detay
                                    </a>
                                </td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
                
                <!-- Sayfalama -->
                {if $pages_count > 1}
                <div class="pagination">
                    {for $i=1 to $pages_count}
                        {if $i == $current_page}
                            <span class="current">{$i}</span>
                        {else}
                            <a href="{$rlBase}index.php?page=my_quotes&pg={$i}{if $selected_listing}&listing_id={$selected_listing}{/if}{if $selected_status}&status={$selected_status}{/if}">{$i}</a>
                        {/if}
                    {/for}
                </div>
                {/if}
                
            {else}
                <div class="no-quotes">
                    <p>Henüz hiç teklif almamışsınız.</p>
                    <a href="{$rlBase}index.php?page=my_all_ads" class="btn btn-primary">İlanlarım</a>
                </div>
            {/if}
        </div>
    </div>

    <style>
    {literal}
    .quotes-list {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px 0;
        overflow: hidden;
    }
    .quotes-list .content-area {
        padding: 20px;
    }
    .filter-area {
        background: #f8f9fa;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    .filter-area label {
        display: inline-block;
        margin: 0 10px 0 20px;
        font-weight: bold;
    }
    .filter-area label:first-child {
        margin-left: 0;
    }
    .filter-area select {
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
    }
    .quotes-table {
        overflow-x: auto;
    }
    .quotes-table table {
        width: 100%;
        border-collapse: collapse;
    }
    .quotes-table th,
    .quotes-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        vertical-align: middle;
    }
    .quotes-table th {
        background: #f8f9fa;
        font-weight: bold;
    }
    .quote-row.status-new {
        background: #f8fff8;
    }
    .status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .status-badge.status-new {
        background: #d4edda;
        color: #155724;
    }
    .status-badge.status-viewed {
        background: #cce7ff;
        color: #004085;
    }
    .status-badge.status-replied {
        background: #fff3cd;
        color: #856404;
    }
    .status-badge.status-closed {
        background: #f8d7da;
        color: #721c24;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }
    .btn-primary {
        background: #007bff;
        color: white;
    }
    .btn-primary:hover {
        background: #0056b3;
        color: white;
    }
    .btn-secondary {
        background: #6c757d;
        color: white;
    }
    .btn-sm {
        padding: 4px 8px;
        font-size: 12px;
    }
    .pagination {
        text-align: center;
        margin-top: 20px;
    }
    .pagination a,
    .pagination .current {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 2px;
        text-decoration: none;
        border-radius: 4px;
    }
    .pagination a {
        background: #f8f9fa;
        color: #007bff;
        border: 1px solid #dee2e6;
    }
    .pagination a:hover {
        background: #e9ecef;
    }
    .pagination .current {
        background: #007bff;
        color: white;
        border: 1px solid #007bff;
    }
    .no-quotes {
        text-align: center;
        padding: 40px 20px;
    }
    .no-quotes p {
        font-size: 18px;
        color: #6c757d;
        margin-bottom: 20px;
    }
    {/literal}
    </style>
{/if}

<!-- my quotes end --> 