/**
 * Direct Quote Button Injection
 * Plugin sistemi yerine doğrudan Call Seller altına Teklif Al butonu ekler
 */

(function() {
    'use strict';
    
    // Sayfa yüklendiğinde çalışsın
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQuoteButton);
    } else {
        initQuoteButton();
    }
    
    function initQuoteButton() {
        console.log('Direct Quote Button başlatılıyor...');
        
        // jQuery kontrolü
        if (typeof jQuery === 'undefined') {
            console.log('jQuery yok, native JS kullanılıyor');
            initWithVanillaJS();
        } else {
            console.log('jQuery bulundu');
            initWithJQuery();
        }
    }
    
    function initWithJQuery() {
        $(document).ready(function() {
            createQuoteButton();
            setupQuoteModal();
        });
    }
    
    function initWithVanillaJS() {
        createQuoteButton();
        setupQuoteModal();
    }
    
    function createQuoteButton() {
        // Call Seller butonunu bul
        var callSellerBtn = findCallSellerButton();
        
        if (!callSellerBtn) {
            console.log('Call Seller butonu bulunamadı');
            return;
        }
        
        console.log('Call Seller butonu bulundu:', callSellerBtn);
        
        // Quote butonu zaten var mı kontrol et
        if (document.querySelector('.direct-quote-btn')) {
            console.log('Quote butonu zaten mevcut');
            return;
        }
        
        // Quote butonunu oluştur
        var quoteBtn = document.createElement('button');
        quoteBtn.className = 'btn btn-warning btn-block direct-quote-btn';
        quoteBtn.style.cssText = `
            background-color: #ff9800 !important;
            border-color: #ff9800 !important;
            color: white !important;
            font-weight: bold !important;
            margin-top: 10px !important;
            padding: 12px 15px !important;
            border-radius: 4px !important;
            width: 100% !important;
            transition: all 0.3s ease !important;
        `;
        quoteBtn.innerHTML = '<i class="fa fa-file-text" style="margin-right: 8px;"></i> TEKLİF AL';
        
        // Hover efekti
        quoteBtn.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#e68900';
            this.style.transform = 'translateY(-1px)';
            this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.2)';
        });
        
        quoteBtn.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '#ff9800';
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
        
        // Click eventi
        quoteBtn.addEventListener('click', function() {
            showQuoteModal();
        });
        
        // Call Seller'ın parent container'ına ekle
        var container = callSellerBtn.parentElement;
        container.appendChild(quoteBtn);
        
        console.log('Quote butonu eklendi');
    }
    
    function findCallSellerButton() {
        var selectors = [
            'button:contains("Call Seller")',
            'a:contains("Call Seller")',
            '.btn-success', // Yeşil Call Seller butonu
            'button[style*="green"]',
            'a[style*="green"]'
        ];
        
        // CSS selector ile bul
        var buttons = document.querySelectorAll('button, a');
        for (var i = 0; i < buttons.length; i++) {
            var btn = buttons[i];
            var text = btn.textContent || btn.innerText;
            if (text.toLowerCase().includes('call') || 
                text.toLowerCase().includes('ara') ||
                btn.style.backgroundColor === 'rgb(92, 184, 92)' || // Bootstrap success yeşili
                btn.classList.contains('btn-success')) {
                return btn;
            }
        }
        
        return null;
    }
    
    function showQuoteModal() {
        // Modal zaten var mı kontrol et
        var existingModal = document.getElementById('direct-quote-modal');
        if (existingModal) {
            existingModal.style.display = 'block';
            return;
        }
        
        // Modal oluştur
        var modal = createQuoteModal();
        document.body.appendChild(modal);
        modal.style.display = 'block';
        
        console.log('Quote modal gösterildi');
    }
    
    function createQuoteModal() {
        var modal = document.createElement('div');
        modal.id = 'direct-quote-modal';
        modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 9999;
            display: none;
        `;
        
        var modalContent = document.createElement('div');
        modalContent.style.cssText = `
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
        `;
        
        modalContent.innerHTML = `
            <div style="background-color: #ff9800; color: white; padding: 15px; border-radius: 10px 10px 0 0;">
                <h4 style="margin: 0; display: flex; align-items: center;">
                    <i class="fa fa-file-text" style="margin-right: 10px;"></i>
                    Teklif Talebi
                    <button onclick="closeQuoteModal()" style="background: none; border: none; color: white; font-size: 20px; margin-left: auto; cursor: pointer;">&times;</button>
                </h4>
            </div>
            <div style="padding: 20px;">
                <form id="direct-quote-form">
                    <div style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Ad Soyad *</label>
                        <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Email *</label>
                        <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Telefon *</label>
                        <input type="tel" name="phone" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Pozisyon/Yetki</label>
                        <input type="text" name="position" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Açıklama *</label>
                        <textarea name="description" required rows="4" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 5px; display: block;">Dosya Ekle (Opsiyonel)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" style="background-color: #ff9800; color: white; border: none; padding: 12px 30px; border-radius: 4px; font-weight: bold; cursor: pointer;">
                            TEKLİF TALEBİNİ GÖNDER
                        </button>
                    </div>
                </form>
            </div>
        `;
        
        modal.appendChild(modalContent);
        
        // Form submit eventi
        var form = modalContent.querySelector('#direct-quote-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitQuoteRequest(this);
        });
        
        // Modal dışına tıklayınca kapat
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeQuoteModal();
            }
        });
        
        return modal;
    }
    
    function submitQuoteRequest(form) {
        var formData = new FormData(form);
        
        // URL'den listing ID'yi al
        var urlPath = window.location.pathname;
        var listingId = urlPath.match(/(\d+)\.html?$/);
        if (listingId) {
            formData.append('listing_id', listingId[1]);
        }
        
        console.log('Teklif talebi gönderiliyor...');
        
        // Burada normal olarak AJAX ile backend'e gönderilir
        // Şimdilik sadece alert gösterelim
        alert('Teklif talebiniz alındı! Kısa süre içinde size dönüş yapılacaktır.');
        closeQuoteModal();
    }
    
    // Global fonksiyon - modal'ı kapatmak için
    window.closeQuoteModal = function() {
        var modal = document.getElementById('direct-quote-modal');
        if (modal) {
            modal.style.display = 'none';
        }
    };
    
    function setupQuoteModal() {
        // Modal açma/kapama event'leri burada
        console.log('Quote modal setup tamamlandı');
    }
    
    console.log('Direct Quote Button script yüklendi');
})(); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 