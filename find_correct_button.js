// Önce hangi sayfada olduğumuzu kontrol edelim
console.log('=== SAYFA KONTROLÜ ===');
console.log('Mevcut URL:', window.location.href);
console.log('Sayfa başlığı:', document.title);

// İlan detay sayfası mı kontrol et
var isListingPage = window.location.href.includes('/listing/') || 
                   window.location.href.includes('/ilan/') ||
                   document.querySelector('.listing-details') ||
                   document.querySelector('.listing-info') ||
                   document.querySelector('[class*="listing"]') ||
                   document.querySelector('[class*="detail"]');

console.log('İlan detay sayfası:', isListingPage ? 'EVET' : 'HAYIR');

if (!isListingPage) {
    console.log('🚨 DİKKAT: Bu bir ilan detay sayfası değil!');
    console.log('📍 Test için bir ilan detay sayfasına gidin');
    console.log('📍 Örnek: https://global.gmoplus.com/listing/[ILAN_ID]/');
    console.log('\n✅ İlan detay sayfasında bu scripti tekrar çalıştırın');
} else {
    console.log('✅ İlan detay sayfası tespit edildi, buton arama başlıyor...');
    
    console.log('\n=== DOĞRU CONTACT SELLER BUTONU BULMA ===');
    
    // Tüm butonları kontrol et
    var allButtons = document.querySelectorAll('button, a, input[type="button"], input[type="submit"]');
    console.log('Toplam buton/link sayısı:', allButtons.length);
    
    // Potansiyel Contact Seller butonları - Daha geniş arama
    var contactButtons = [];
    
    for (var i = 0; i < allButtons.length; i++) {
        var button = allButtons[i];
        var buttonText = (button.textContent || button.innerText || button.value || '').trim().toLowerCase();
        var buttonId = (button.id || '').toLowerCase();
        var buttonClass = (button.className || '').toLowerCase();
        
        // Türkçe ve İngilizce contact/seller terimleri
        if (buttonText.includes('contact') || 
            buttonText.includes('call') ||
            buttonText.includes('seller') ||
            buttonText.includes('satıcı') ||
            buttonText.includes('iletişim') ||
            buttonText.includes('ara') ||
            buttonText.includes('phone') ||
            buttonText.includes('telefon') ||
            buttonId.includes('contact') ||
            buttonId.includes('call') ||
            buttonId.includes('seller') ||
            buttonClass.includes('contact') ||
            buttonClass.includes('call') ||
            buttonClass.includes('seller') ||
            button.classList.contains('btn-warning') ||  
            button.classList.contains('btn-success')) {
            
            contactButtons.push({
                index: i,
                text: buttonText,
                element: button,
                classes: button.className,
                id: button.id,
                tagName: button.tagName,
                href: button.href || 'N/A'
            });
        }
    }
    
    console.log('\n📞 Potansiyel Contact/Call butonları:');
    if (contactButtons.length === 0) {
        console.log('❌ Hiç Contact/Call butonu bulunamadı!');
    } else {
        contactButtons.forEach(function(btn, index) {
            console.log(index + ':', btn.text, '| Tag:', btn.tagName, '| ID:', btn.id, '| Classes:', btn.classes);
        });
    }
    
    // Görsel olarak sarı/yeşil/mavi butonları bul
    var coloredButtons = [];
    for (var i = 0; i < allButtons.length; i++) {
        var button = allButtons[i];
        var style = window.getComputedStyle(button);
        var bgColor = style.backgroundColor;
        var buttonText = (button.textContent || button.innerText || button.value || '').trim();
        
        // Bootstrap renkleri ve yaygın buton renkleri
        if (bgColor.includes('rgb(255, 193, 7)') ||    // Bootstrap warning (sarı)
            bgColor.includes('rgb(40, 167, 69)') ||    // Bootstrap success (yeşil)
            bgColor.includes('rgb(0, 123, 255)') ||    // Bootstrap primary (mavi)
            bgColor.includes('rgb(92, 184, 92)') ||    // Eski bootstrap yeşil
            bgColor.includes('rgb(240, 173, 78)') ||   // Turuncu tonları
            button.style.backgroundColor.includes('yellow') ||
            button.style.backgroundColor.includes('green') ||
            button.style.backgroundColor.includes('orange') ||
            button.style.backgroundColor.includes('blue') ||
            button.style.backgroundColor.includes('#ffc107') ||
            button.style.backgroundColor.includes('#28a745') ||
            button.style.backgroundColor.includes('#007bff')) {
            
            // Sadece anlamlı metinli butonları al
            if (buttonText.length > 1) {
                coloredButtons.push({
                    text: buttonText,
                    element: button,
                    bgColor: bgColor,
                    classes: button.className,
                    id: button.id
                });
            }
        }
    }
    
    console.log('\n🎨 Renkli butonlar (sarı/yeşil/mavi):');
    if (coloredButtons.length === 0) {
        console.log('❌ Hiç renkli buton bulunamadı!');
    } else {
        coloredButtons.forEach(function(btn, index) {
            console.log(index + ':', btn.text, '| BG:', btn.bgColor, '| ID:', btn.id);
        });
    }
    
    // Özel arama - telefon/iletişim iconları
    var iconButtons = document.querySelectorAll('[class*="fa-phone"], [class*="fa-contact"], [class*="icon-phone"], [class*="glyphicon-phone"]');
    console.log('\n📱 Telefon iconu olan elementler:', iconButtons.length);
    iconButtons.forEach(function(icon, index) {
        var parentButton = icon.closest('button, a');
        if (parentButton) {
            console.log(index + ':', (parentButton.textContent || '').trim(), '| Parent Tag:', parentButton.tagName);
        }
    });
    
    // Manuel seçim talimatları
    console.log('\n=== MANUEL SEÇİM TALİMATLARI ===');
    console.log('Yukarıdaki listelerden Contact Seller butonunu bulun');
    console.log('Sonra bu kodu çalıştırın:');
    console.log('addQuoteButton(BUTON_INDEX); // Örnek: addQuoteButton(0)');
    
    // İçerik arama - sayfa içinde "contact seller" metni var mı?
    var pageHTML = document.body.innerHTML.toLowerCase();
    if (pageHTML.includes('contact seller') || pageHTML.includes('call seller') || pageHTML.includes('satıcı')) {
        console.log('\n✅ Sayfada "contact/seller" metni bulundu');
    } else {
        console.log('\n❌ Sayfada "contact/seller" metni bulunamadı');
        console.log('Bu sayfa gerçekten bir ilan detay sayfası mı?');
    }
}

// Teklif Al butonu ekleyen fonksiyon (geliştirilmiş)
window.addQuoteButton = function(buttonIndex) {
    console.log('🔧 addQuoteButton çağrıldı, index:', buttonIndex);
    
    var targetButton = null;
    var buttonSource = '';
    
    // Contact butonları arasından seç
    if (typeof contactButtons !== 'undefined' && buttonIndex < contactButtons.length) {
        targetButton = contactButtons[buttonIndex].element;
        buttonSource = 'contact buttons';
        console.log('📞 Contact buton seçildi:', contactButtons[buttonIndex].text);
    } else if (typeof coloredButtons !== 'undefined') {
        // Renkli butonlar arasından seç
        var colorIndex = buttonIndex - (typeof contactButtons !== 'undefined' ? contactButtons.length : 0);
        if (colorIndex >= 0 && colorIndex < coloredButtons.length) {
            targetButton = coloredButtons[colorIndex].element;
            buttonSource = 'colored buttons';
            console.log('🎨 Renkli buton seçildi:', coloredButtons[colorIndex].text);
        }
    }
    
    if (!targetButton) {
        console.log('❌ Geçersiz buton index: ' + buttonIndex);
        console.log('Kullanılabilir indexler: 0 - ' + (contactButtons.length + coloredButtons.length - 1));
        return false;
    }
    
    // Quote butonu zaten var mı?
    if (document.querySelector('.teklif-al-btn')) {
        console.log('⚠️ Teklif Al butonu zaten mevcut!');
        return false;
    }
    
    // Teklif Al butonu oluştur
    var quoteButton = document.createElement('button');
    quoteButton.className = 'btn btn-warning btn-block teklif-al-btn';
    quoteButton.innerHTML = '<i class="fa fa-file-text"></i> TEKLİF AL';
    quoteButton.style.cssText = `
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
    `;
    
    // Hover efektleri
    quoteButton.addEventListener('mouseenter', function() {
        this.style.backgroundColor = '#e68900';
        this.style.transform = 'translateY(-1px)';
        this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
    });
    
    quoteButton.addEventListener('mouseleave', function() {
        this.style.backgroundColor = '#ff9800';
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = 'none';
    });
    
    // Click eventi - Modal açar
    quoteButton.onclick = function() {
        openQuoteModal();
    };
    
    // Target butonun parent'ına ekle
    var container = targetButton.parentElement;
    if (container) {
        container.appendChild(quoteButton);
        console.log('✅ TEKLİF AL butonu başarıyla eklendi!');
        console.log('📍 Buton konumu:', container.tagName, container.className);
        console.log('📊 Kaynak:', buttonSource);
        return true;
    } else {
        console.log('❌ Target butonun parent elementi bulunamadı!');
        return false;
    }
};

// Modal açma fonksiyonu (geliştirilmiş)
window.openQuoteModal = function() {
    console.log('📋 Modal açılıyor...');
    
    // Modal zaten var mı?
    if (document.getElementById('teklif-modal')) {
        document.getElementById('teklif-modal').style.display = 'block';
        console.log('📋 Mevcut modal yeniden açıldı');
        return;
    }
    
    // Modal oluştur
    var modal = document.createElement('div');
    modal.id = 'teklif-modal';
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.6);
        z-index: 99999;
        display: block;
        animation: fadeIn 0.3s ease;
    `;
    
    // CSS animasyon ekle
    var style = document.createElement('style');
    style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translate(-50%, -60%) scale(0.9); opacity: 0; }
            to { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        }
        .modal-content-anim {
            animation: slideIn 0.3s ease !important;
        }
    `;
    document.head.appendChild(style);
    
    var content = document.createElement('div');
    content.className = 'modal-content-anim';
    content.style.cssText = `
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
    `;
    
    content.innerHTML = `
        <div style="background: linear-gradient(135deg, #ff9800, #f57c00); color: white; padding: 20px; border-radius: 12px 12px 0 0;">
            <h3 style="margin: 0; display: flex; align-items: center; font-size: 18px;">
                <i class="fa fa-file-text" style="margin-right: 10px; font-size: 20px;"></i>
                Teklif Talebi Formu
                <button onclick="closeQuoteModal()" style="background: none; border: none; color: white; font-size: 28px; margin-left: auto; cursor: pointer; padding: 0; line-height: 1;">&times;</button>
            </h3>
            <p style="margin: 8px 0 0 0; opacity: 0.9; font-size: 14px;">Ürün/hizmet için teklif talebinizi iletin</p>
        </div>
        <form id="quote-request-form" style="padding: 25px;">
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Ad Soyad *</label>
                <input type="text" name="name" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;" placeholder="Adınızı ve soyadınızı girin">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Email Adresi *</label>
                <input type="email" name="email" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;" placeholder="ornek@email.com">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Telefon Numarası *</label>
                <input type="tel" name="phone" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;" placeholder="+90 5xx xxx xx xx">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Şirket/Pozisyon</label>
                <input type="text" name="company" style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 14px; box-sizing: border-box;" placeholder="Şirket adı ve pozisyonunuz">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Teklif Detayları *</label>
                <textarea name="message" required rows="4" style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 14px; resize: vertical; box-sizing: border-box;" placeholder="Hangi ürünler için teklif istiyorsunuz? Miktar, teslimat vb. detayları belirtin..."></textarea>
            </div>
            <div style="margin-bottom: 25px;">
                <label style="font-weight: bold; margin-bottom: 8px; display: block; color: #333; font-size: 14px;">Dosya Ekle (Opsiyonel)</label>
                <input type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png" style="width: 100%; padding: 8px; border: 2px solid #ddd; border-radius: 6px; box-sizing: border-box;">
                <small style="color: #666; font-size: 12px;">PDF, Word, Excel veya resim dosyası ekleyebilirsiniz (Max 5MB)</small>
            </div>
            <div style="text-align: center;">
                <button type="submit" style="background: linear-gradient(135deg, #ff9800, #f57c00); color: white; border: none; padding: 15px 40px; border-radius: 6px; font-weight: bold; font-size: 16px; cursor: pointer; transition: all 0.3s ease;">
                    <i class="fa fa-paper-plane" style="margin-right: 8px;"></i>
                    TEKLİF TALEBİNİ GÖNDER
                </button>
            </div>
        </form>
    `;
    
    modal.appendChild(content);
    document.body.appendChild(modal);
    
    // Form submit eventi
    document.getElementById('quote-request-form').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('📤 Form gönderiliyor...');
        
        // Form verilerini topla
        var formData = new FormData(this);
        var data = {};
        for (var pair of formData.entries()) {
            data[pair[0]] = pair[1];
        }
        
        console.log('📊 Form verileri:', data);
        
        // Burada gerçek gönderim yapılabilir
        // Ajax isteği, plugin endpoint'i vb.
        
        alert('🎉 Teklif talebiniz başarıyla gönderildi!\n\nKısa süre içinde size dönüş yapılacaktır.');
        closeQuoteModal();
    });
    
    // Modal dışına tıklayınca kapat
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeQuoteModal();
        }
    });
    
    // ESC tuşu ile kapat
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && document.getElementById('teklif-modal')) {
            closeQuoteModal();
        }
    });
    
    console.log('✅ Modal başarıyla oluşturuldu ve açıldı');
};

// Modal kapatma fonksiyonu
window.closeQuoteModal = function() {
    var modal = document.getElementById('teklif-modal');
    if (modal) {
        modal.style.display = 'none';
        console.log('❌ Modal kapatıldı');
    }
};

console.log('\n🚀 Fonksiyonlar hazır ve geliştirildi!');
console.log('📍 İlan detay sayfasında bu scripti çalıştırın');
console.log('📞 Doğru butonu bulduktan sonra: addQuoteButton(INDEX)'); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 