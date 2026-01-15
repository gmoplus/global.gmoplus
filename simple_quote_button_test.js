// Basit Teklif Al Butonu - Console'da test için
// Bu kodu F12 Console'a kopyalayın

console.log('=== TEKLİF AL BUTONU TEST ===');

// Call Seller butonunu bul
var callSellerButton = null;
var allButtons = document.querySelectorAll('button, a');

console.log('Toplam buton sayısı:', allButtons.length);

for (var i = 0; i < allButtons.length; i++) {
    var button = allButtons[i];
    var buttonText = button.textContent || button.innerText;
    console.log('Buton ' + i + ':', buttonText.trim());
    
    if (buttonText.toLowerCase().includes('call') || 
        buttonText.toLowerCase().includes('ara') ||
        button.classList.contains('btn-success')) {
        callSellerButton = button;
        console.log('✓ Call Seller butonu bulundu:', buttonText.trim());
        break;
    }
}

if (!callSellerButton) {
    console.log('❌ Call Seller butonu bulunamadı!');
    
    // Manuel olarak yeşil butonları bul
    var greenButtons = document.querySelectorAll('.btn-success, [style*="green"]');
    console.log('Yeşil butonlar:', greenButtons.length);
    greenButtons.forEach(function(btn, index) {
        console.log('Yeşil buton ' + index + ':', (btn.textContent || btn.innerText).trim());
    });
    
} else {
    console.log('✅ Call Seller bulundu, Teklif Al butonu ekleniyor...');
    
    // Quote butonu oluştur
    var quoteButton = document.createElement('button');
    quoteButton.innerHTML = 'TEKLİF AL';
    quoteButton.style.cssText = `
        background-color: #ff9800;
        color: white;
        border: none;
        padding: 12px;
        margin-top: 10px;
        width: 100%;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
    `;
    
    // Click eventi
    quoteButton.onclick = function() {
        alert('Teklif Al butonu çalışıyor! 🎉\n\nModal form burada açılacak.');
    };
    
    // Call Seller'ın parent'ına ekle
    var container = callSellerButton.parentElement;
    container.appendChild(quoteButton);
    
    console.log('✅ TEKLİF AL butonu eklendi!');
}

console.log('=== TEST TAMAMLANDI ==='); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 