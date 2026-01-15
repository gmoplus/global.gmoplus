{*
 * Quote Request Button Template
 * Modern JavaScript tabanlı teklif talebi sistemi
 *}

{if $config.quote_request_enabled && $listing_data}
    {* JavaScript global değişkenlerini ayarla *}
    <script>
        window.listingId = {$listing_data.ID};
        window.quoteMaxFileSize = {$config.quote_request_max_file_size|default:5};
        
        {* Dil metinleri *}
        window.quoteRequestLang = {
            title: '{$lang.quote_request_title|default:"Teklif Talebi"}',
            name: '{$lang.quote_request_name|default:"Ad Soyad"}',
            email: '{$lang.quote_request_email|default:"Email Adresi"}',
            phone: '{$lang.quote_request_phone|default:"Telefon"}',
            position: '{$lang.quote_request_position|default:"Pozisyon/Yetki"}',
            description: '{$lang.quote_request_description|default:"Açıklama"}',
            file: '{$lang.quote_request_file|default:"Dosya Ekle (Opsiyonel)"}',
            send: '{$lang.quote_request_send|default:"Gönder"}',
            success: '{$lang.quote_request_success|default:"Teklif talebiniz başarıyla gönderildi!"}',
            error: '{$lang.quote_request_error|default:"Bir hata oluştu!"}',
            loginRequired: '{$lang.quote_request_login_required|default:"Lütfen giriş yapınız."}'
        };
        
        {* Kullanıcı bilgileri *}
        {if $account_info}
        window.accountInfo = {
            ID: {$account_info.ID},
            name: '{$account_info.First_name|cat:" "|cat:$account_info.Last_name|escape:"javascript"}',
            email: '{$account_info.Mail|escape:"javascript"}',
            phone: '{$account_info.phone|escape:"javascript"}'
        };
        {/if}
        
        {* AJAX URL ve config *}
        window.rlConfig = window.rlConfig || {};
        window.rlConfig.ajax_url = '{$rlBase}ajax.php';
        window.rlPluginsUrl = '{$smarty.const.RL_PLUGINS_URL}';
        
        {* Debug bilgileri *}
        console.log('Quote Request Plugin Loaded');
        console.log('Listing ID:', window.listingId);
        console.log('User logged in:', {if $account_info}true{else}false{/if});
    </script>
    
    {* CSS ve JS dosyalarını yükle *}
    <link rel="stylesheet" href="{$smarty.const.RL_PLUGINS_URL}quoteRequest/static/quote_request.css?v={$smarty.now}">
    <script src="{$smarty.const.RL_PLUGINS_URL}quoteRequest/static/quote_request.js?v={$smarty.now}"></script>
    
    {* Modal stilleri *}
    <style>
    .quote-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 99999;
        display: none;
    }
    
    .quote-modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border-radius: 12px;
        width: 90%;
        max-width: 520px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        border: 1px solid #ddd;
        animation: slideIn 0.3s ease;
    }
    
    .quote-modal-header {
        background: linear-gradient(135deg, #ff9800, #f57c00);
        color: white;
        padding: 20px;
        border-radius: 12px 12px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .quote-modal-header h3 {
        margin: 0;
        font-size: 18px;
        display: flex;
        align-items: center;
    }
    
    .quote-modal-header i {
        margin-right: 10px;
        font-size: 20px;
    }
    
    .quote-modal-close {
        background: none;
        border: none;
        color: white;
        font-size: 28px;
        cursor: pointer;
        padding: 0;
        line-height: 1;
    }
    
    .quote-modal-close:hover {
        opacity: 0.8;
    }
    
    #quote-request-form {
        padding: 25px;
    }
    
    .quote-form-group {
        margin-bottom: 20px;
    }
    
    .quote-form-group label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
        color: #333;
        font-size: 14px;
    }
    
    .quote-form-group input,
    .quote-form-group textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    
    .quote-form-group input:focus,
    .quote-form-group textarea:focus {
        border-color: #ff9800;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(255, 152, 0, 0.25);
    }
    
    .quote-form-group textarea {
        resize: vertical;
    }
    
    .quote-form-group small {
        color: #666;
        font-size: 12px;
    }
    
    .quote-form-actions {
        text-align: center;
        margin-top: 25px;
    }
    
    .quote-submit-btn {
        background: linear-gradient(135deg, #ff9800, #f57c00);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .quote-submit-btn:hover {
        background: linear-gradient(135deg, #e68900, #e65100);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .quote-submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }
    
    .quote-submit-btn i {
        margin-right: 8px;
    }
    
    @keyframes slideIn {
        from {
            transform: translate(-50%, -60%) scale(0.9);
            opacity: 0;
        }
        to {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }
    }
    
    /* Quote request butonu stilleri */
    .quote-request-btn {
        background-color: #ff9800 !important;
        border-color: #ff9800 !important;
        color: white !important;
        font-weight: bold !important;
        margin-top: 10px !important;
        padding: 12px 15px !important;
        border-radius: 4px !important;
        width: 100% !important;
        transition: all 0.3s ease !important;
        border: none !important;
        cursor: pointer !important;
        font-size: 14px !important;
        text-transform: uppercase !important;
    }
    
    .quote-request-btn:hover {
        background-color: #e68900 !important;
        border-color: #e68900 !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .quote-request-btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 152, 0, 0.25);
    }
    
    .quote-request-btn i {
        margin-right: 8px;
    }
    </style>
{/if}