/**
 * Quote Request JavaScript
 */

$(document).ready(function() {
    // Quote request butonu işleyicisi
    $(document).on('click', '.quote-request-btn', function() {
        openQuoteModal();
    });
    
    // Modal kapatma işleyicileri
    $(document).on('click', '.quote-modal-close, .quote-modal-overlay', function(e) {
        if (e.target === this) {
            closeQuoteModal();
        }
    });
    
    // ESC tuşu ile kapatma
    $(document).keydown(function(e) {
        if (e.key === "Escape" && $('#quote-request-modal').length) {
            closeQuoteModal();
        }
    });
    
    // Form submit işleyicisi
    $(document).on('submit', '#quote-request-form', function(e) {
        e.preventDefault();
        submitQuoteRequest();
    });
});

/**
 * Teklif talebi modalını aç
 */
function openQuoteModal() {
    // Modal zaten var mı kontrol et
    if ($('#quote-request-modal').length) {
        $('#quote-request-modal').show();
        return;
    }
    
    // Modal HTML'i oluştur
    var modalHtml = `
        <div id="quote-request-modal" class="quote-modal-overlay">
            <div class="quote-modal-content">
                <div class="quote-modal-header">
                    <h3>
                        <i class="fa fa-file-text"></i>
                        ${quoteRequestLang.title || 'Teklif Talebi'}
                    </h3>
                    <button type="button" class="quote-modal-close">&times;</button>
                </div>
                <form id="quote-request-form" enctype="multipart/form-data">
                    <input type="hidden" name="listing_id" value="${window.listingId || ''}" />
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.name || 'Ad Soyad'} *</label>
                        <input type="text" name="name" required maxlength="100" />
                    </div>
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.email || 'Email Adresi'} *</label>
                        <input type="email" name="email" required maxlength="100" />
                    </div>
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.phone || 'Telefon'} *</label>
                        <input type="tel" name="phone" required maxlength="20" />
                    </div>
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.position || 'Pozisyon/Yetki'}</label>
                        <input type="text" name="position" maxlength="100" />
                    </div>
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.description || 'Açıklama'} *</label>
                        <textarea name="description" required rows="4" maxlength="1000"></textarea>
                    </div>
                    
                    <div class="quote-form-group">
                        <label>${quoteRequestLang.file || 'Dosya Ekle (Opsiyonel)'}</label>
                        <input type="file" name="quote_file" accept=".pdf,.doc,.docx,.xls,.xlsx" />
                        <small>Max ${window.quoteMaxFileSize || 5}MB - PDF, DOC, XLS dosyaları</small>
                    </div>
                    
                    <div class="quote-form-actions">
                        <button type="submit" class="quote-submit-btn">
                            <i class="fa fa-paper-plane"></i>
                            ${quoteRequestLang.send || 'Gönder'}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    `;
    
    // Modal'ı sayfaya ekle
    $('body').append(modalHtml);
    
    // Kullanıcı bilgilerini doldur (giriş yapmışsa)
    if (window.accountInfo) {
        $('#quote-request-form input[name="name"]').val(window.accountInfo.name || '');
        $('#quote-request-form input[name="email"]').val(window.accountInfo.email || '');
        $('#quote-request-form input[name="phone"]').val(window.accountInfo.phone || '');
    }
    
    // Modal'ı göster
    $('#quote-request-modal').show();
}

/**
 * Modal'ı kapat
 */
function closeQuoteModal() {
    $('#quote-request-modal').remove();
}

/**
 * Teklif talebini gönder
 */
function submitQuoteRequest() {
    var $form = $('#quote-request-form');
    var $submitBtn = $('.quote-submit-btn');
    
    // Giriş kontrolü
    if (!window.accountInfo || !window.accountInfo.ID) {
        alert(quoteRequestLang.loginRequired || 'Lütfen giriş yapınız.');
        return;
    }
    
    // Loading durumu
    $submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Gönderiliyor...');
    
    // Form verilerini topla
    var formData = new FormData($form[0]);
    formData.append('action', 'submit_quote');
    
    // AJAX isteği
    $.ajax({
        url: window.rlPluginsUrl + 'quoteRequest/ajax.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(quoteRequestLang.success || 'Teklif talebiniz başarıyla gönderildi!');
                closeQuoteModal();
            } else {
                alert(response.message || quoteRequestLang.error || 'Bir hata oluştu!');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            alert(quoteRequestLang.error || 'Bir hata oluştu!');
        },
        complete: function() {
            $submitBtn.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> ' + (quoteRequestLang.send || 'Gönder'));
        }
    });
}

/**
 * Otomatik buton ekleme
 */
function addQuoteRequestButton() {
    // Listing ID'yi bul
    var listingId = window.listingId || $('input[name="listing_id"]').val() || 
                   (window.listing_data ? window.listing_data.ID : null);
    
    if (!listingId) {
        console.log('Quote Request: Listing ID bulunamadı');
        return;
    }
    
    // Buton zaten var mı?
    if ($('.quote-request-btn').length) {
        return;
    }
    
    // Contact seller bölümünü bul
    var $contactSection = $('.listing-details-contacts, .contact-owner, .listing-contact, .account-controls');
    
    if ($contactSection.length === 0) {
        // Alternative: Contact/Call butonlarını bul
        $contactSection = $('input[value*="Contact"], input[value*="Call"], button:contains("Contact"), button:contains("Call")').parent();
    }
    
    if ($contactSection.length) {
        var quoteButtonHtml = `
            <button type="button" class="quote-request-btn btn btn-warning btn-block" style="margin-top: 10px;">
                <i class="fa fa-file-text"></i> TEKLİF AL
            </button>
        `;
        
        $contactSection.append(quoteButtonHtml);
        console.log('Quote Request: Buton eklendi');
    } else {
        console.log('Quote Request: Contact section bulunamadı');
    }
}

// Sayfa yüklendiğinde otomatik buton ekle
$(document).ready(function() {
    setTimeout(addQuoteRequestButton, 1000);
});

// Global değişkenler - Template'den doldurulacak
window.quoteRequestLang = window.quoteRequestLang || {};
window.quoteMaxFileSize = window.quoteMaxFileSize || 5;