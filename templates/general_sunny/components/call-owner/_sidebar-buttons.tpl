<!-- Call buttons in sidebar -->

<input type="button" class="w-100 contact-owner" value="{phrase key='contact_owner'}" accesskey="{phrase key='contact_owner'}" />
<input class="w-100 mt-3 call-owner" data-listing-id="{$listing_data.ID}" type="button" value="{phrase key='call_owner'}" accesskey="{phrase key='call_owner'}" />

<!-- TEKLİF AL BUTONU -->
<input type="button" class="w-100 mt-3" id="quote-request-btn" style="background-color: #ff9800; border: 1px solid #ff9800; color: white; font-weight: bold;" value="TEKLİF AL" onclick="openQuoteModal()" />

{literal}
<script>
// Global değişkenler  
window.listingId = {/literal}{$listing_data.ID}{literal};
{/literal}
{if $account_info}
{literal}
window.accountInfo = {
    ID: {/literal}{$account_info.ID}{literal},
    name: "{/literal}{$account_info.First_name|escape} {$account_info.Last_name|escape}{literal}",
    email: "{/literal}{$account_info.Mail|escape}{literal}"
};
{/literal}
{else}
{literal}
window.accountInfo = null;
{/literal}
{/if}

{literal}
// Modal fonksiyonu
function openQuoteModal() {
    if (!window.accountInfo) {
        alert('Lütfen giriş yapınız.');
        return;
    }
    
    var modalHtml = '<div id="quote-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); z-index: 99999; display: flex; align-items: center; justify-content: center;">';
    modalHtml += '<div style="background: white; padding: 30px; border-radius: 8px; width: 90%; max-width: 500px; max-height: 90vh; overflow-y: auto;">';
    modalHtml += '<h3 style="margin-top: 0; color: #ff9800;">Teklif Talebi</h3>';
    modalHtml += '<form id="quote-form" style="margin: 20px 0;">';
    modalHtml += '<div style="margin-bottom: 15px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Ad Soyad *</label><input type="text" id="quote-name" value="' + window.accountInfo.name + '" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required></div>';
    modalHtml += '<div style="margin-bottom: 15px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Email *</label><input type="email" id="quote-email" value="' + window.accountInfo.email + '" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required></div>';
    modalHtml += '<div style="margin-bottom: 15px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Telefon *</label><input type="tel" id="quote-phone" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required></div>';
    modalHtml += '<div style="margin-bottom: 15px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Pozisyon/Yetki *</label><input type="text" id="quote-position" placeholder="Örn: Satın Alma Müdürü" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" required></div>';
    modalHtml += '<div style="margin-bottom: 15px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Açıklama *</label><textarea id="quote-description" rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" placeholder="Teklif detaylarınızı açıklayın..." required></textarea></div>';
    modalHtml += '<div style="margin-bottom: 20px;"><label style="display: block; margin-bottom: 5px; font-weight: bold;">Dosya Ekle (Opsiyonel)</label><input type="file" id="quote-file" accept=".pdf,.doc,.docx,.xls,.xlsx" style="width: 100%; padding: 8px;"></div>';
    modalHtml += '<div style="text-align: right;"><button type="button" onclick="closeQuoteModal()" style="background: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 4px; margin-right: 10px; cursor: pointer;">İptal</button><button type="submit" style="background: #ff9800; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Gönder</button></div>';
    modalHtml += '</form></div></div>';
    
    document.body.insertAdjacentHTML('beforeend', modalHtml);
    
    document.getElementById('quote-form').onsubmit = function(e) {
        e.preventDefault();
        submitQuoteRequest();
    };
}

function closeQuoteModal() {
    var modal = document.getElementById('quote-modal');
    if (modal) modal.remove();
}

function submitQuoteRequest() {
    var formData = new FormData();
    formData.append('action', 'submit_quote');
    formData.append('listing_id', window.listingId);
    formData.append('name', document.getElementById('quote-name').value);
    formData.append('email', document.getElementById('quote-email').value);
    formData.append('phone', document.getElementById('quote-phone').value);
    formData.append('position', document.getElementById('quote-position').value);
    formData.append('description', document.getElementById('quote-description').value);
    
    var fileInput = document.getElementById('quote-file');
    if (fileInput.files[0]) {
        formData.append('file', fileInput.files[0]);
    }
    
    var submitBtn = document.querySelector('#quote-form button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Gönderiliyor...';
    
    fetch('{/literal}{$smarty.const.RL_PLUGINS_URL}{literal}quoteRequest/ajax.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Teklif talebiniz başarıyla gönderildi!');
            closeQuoteModal();
        } else {
            alert('Hata: ' + data.message);
            submitBtn.disabled = false;
            submitBtn.textContent = 'Gönder';
        }
    })
    .catch(error => {
        alert('Bir hata oluştu: ' + error);
        submitBtn.disabled = false;
        submitBtn.textContent = 'Gönder';
    });
}
</script>
{/literal}

<!-- Call buttons in sidebar end -->
