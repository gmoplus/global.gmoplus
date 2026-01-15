/**
 * Global Category Price Hider Plugin - JavaScript
 * İthalat/İhracat talebi kategorilerinde fiyat alanlarını gizler
 */

// Global değişkenler
var priceHider = {
    requestCategories: ['ithalat_talepleri', 'ihracat_talepleri', 'konsorsiyum_talep_teklif'],
    isInitialized: false,
    currentCategory: null,
    messageShown: false,
    debug: false
};

// Kategori tespiti fonksiyonu
function detectCategory() {
    var category = null;
    
    // 1. URL'den kategori tespiti
    var url = window.location.href;
    priceHider.requestCategories.forEach(function(cat) {
        if (url.indexOf(cat) !== -1) {
            category = cat;
            return false;
        }
    });
    
    // 2. Kategori seçici dropdown'dan tespit
    if (!category) {
        var categorySelect = jQuery('select[name*="category"], select[name*="f_category"]');
        if (categorySelect.length > 0) {
            var selectedOption = categorySelect.find('option:selected');
            if (selectedOption.length > 0) {
                var optionText = selectedOption.text().toLowerCase();
                var optionValue = selectedOption.val();
                
                priceHider.requestCategories.forEach(function(cat) {
                    if (optionText.indexOf(cat) !== -1 || optionValue.indexOf(cat) !== -1) {
                        category = cat;
                        return false;
                    }
                });
            }
        }
    }
    
    // 3. Kategori ID'lerinden tespit
    if (!category) {
        var categoryId = jQuery('input[name*="category_id"], input[name*="f_category_id"]').val();
        if (categoryId) {
            // Kategori ID'leri ile eşleştir (gerekirse database'den alınabilir)
            var requestCategoryIds = [15, 16, 17]; // Örnek ID'ler
            if (requestCategoryIds.indexOf(parseInt(categoryId)) !== -1) {
                category = 'detected_by_id';
            }
        }
    }
    
    // 4. Sayfa içeriğinden tespit
    if (!category) {
        var pageContent = jQuery('body').text().toLowerCase();
        priceHider.requestCategories.forEach(function(cat) {
            if (pageContent.indexOf(cat) !== -1) {
                category = cat;
                return false;
            }
        });
    }
    
    if (priceHider.debug) {
        console.log('Detected category:', category);
    }
    
    return category;
}

// Fiyat alanlarını gizle
function hidePriceFields() {
    var fieldsHidden = false;
    
    // Tüm fiyat alanlarını bul ve gizle
    var priceSelectors = [
        'input[name*="price"]',
        'input[name*="Price"]',
        'select[name*="price"]',
        'select[name*="Price"]',
        'textarea[name*="price"]',
        'textarea[name*="Price"]',
        '.f_price',
        '.field_price',
        '.listing_price',
        '.price_input',
        '.price_field',
        '.price_container',
        '.price_selector',
        '.price_type',
        '.price_period',
        '.price_currency',
        '.price_negotiable',
        '.price_on_call',
        '.price_range',
        '.price_min',
        '.price_max',
        '.price_from',
        '.price_to',
        '.price_unit',
        '.price_tag',
        '.price_label',
        '.price_value',
        '.price_display',
        '.price_format',
        '.price_option',
        '.price_area',
        '.price_section',
        '.price_block',
        '.price_wrapper',
        '.price_group',
        'tr[id*="price"]',
        'tr[id*="Price"]',
        'td[id*="price"]',
        'td[id*="Price"]',
        'div[id*="price"]',
        'div[id*="Price"]',
        'span[id*="price"]',
        'span[id*="Price"]',
        'label[for*="price"]',
        'label[for*="Price"]'
    ];
    
    priceSelectors.forEach(function(selector) {
        var elements = jQuery(selector);
        if (elements.length > 0) {
            elements.each(function() {
                var $this = jQuery(this);
                
                // Eğer zaten gizli değilse gizle
                if (!$this.hasClass('price-field-hidden')) {
                    $this.addClass('price-field-hidden');
                    
                    // Parent elementleri de gizle
                    var $parent = $this.closest('tr, .form-group, .field, .form-row, .input-group, .control-group');
                    if ($parent.length > 0) {
                        $parent.addClass('price-field-hidden');
                    }
                    
                    // Değeri temizle
                    if ($this.is('input, textarea')) {
                        $this.val('');
                    } else if ($this.is('select')) {
                        $this.prop('selectedIndex', 0);
                    }
                    
                    fieldsHidden = true;
                }
            });
        }
    });
    
    // Body'ye class ekle
    jQuery('body').addClass('hide-price-fields');
    
    if (priceHider.debug && fieldsHidden) {
        console.log('Price fields hidden');
    }
    
    return fieldsHidden;
}

// Bilgilendirme mesajı göster
function showMessage() {
    if (priceHider.messageShown) {
        return;
    }
    
    var messageHtml = '<div class="price-hider-message">' +
        '<div class="icon"></div>' +
        '<strong>Teklif Talebi Kategorisi:</strong> ' +
        'Bu kategoride fiyat belirtmeyin. Firmalar sizden teklif talep edecektir.' +
        '</div>';
    
    // Mesajı form başına ekle
    var $form = jQuery('form[name="addForm"], form[name="editForm"], form.listing-form, .form-container, .listing-form-container');
    if ($form.length > 0) {
        $form.prepend(messageHtml);
    } else {
        // Alternatif yerleşim
        var $content = jQuery('#content, .content, .main-content, .page-content, body');
        if ($content.length > 0) {
            $content.first().prepend(messageHtml);
        }
    }
    
    priceHider.messageShown = true;
    
    if (priceHider.debug) {
        console.log('Message shown');
    }
}

// Fiyat alanlarını göster (debug amaçlı)
function showPriceFields() {
    jQuery('.price-field-hidden').removeClass('price-field-hidden');
    jQuery('body').removeClass('hide-price-fields');
    jQuery('.price-hider-message').remove();
    priceHider.messageShown = false;
    
    if (priceHider.debug) {
        console.log('Price fields shown');
    }
}

// Ana kontrol fonksiyonu
function checkPriceFields() {
    var category = detectCategory();
    
    if (category && priceHider.requestCategories.indexOf(category) !== -1) {
        // Teklif talebi kategorisi - fiyat alanlarını gizle
        priceHider.currentCategory = category;
        
        if (hidePriceFields()) {
            showMessage();
        }
        
        if (priceHider.debug) {
            console.log('Price fields hidden for category:', category);
        }
    } else {
        // Normal kategori - fiyat alanlarını göster
        if (priceHider.currentCategory) {
            showPriceFields();
            priceHider.currentCategory = null;
        }
    }
}

// Form submit kontrolü
function handleFormSubmit() {
    jQuery('form[name="addForm"], form[name="editForm"]').on('submit', function(e) {
        if (priceHider.currentCategory) {
            // Fiyat alanlarını temizle
            jQuery('input[name*="price"], textarea[name*="price"], select[name*="price"]').each(function() {
                var $this = jQuery(this);
                if ($this.is('input, textarea')) {
                    $this.val('');
                } else if ($this.is('select')) {
                    $this.prop('selectedIndex', 0);
                }
            });
            
            if (priceHider.debug) {
                console.log('Price fields cleared on form submit');
            }
        }
    });
}

// Kategori değişikliği izle
function watchCategoryChange() {
    // Kategori seçici değişikliğini izle
    jQuery(document).on('change', 'select[name*="category"], select[name*="f_category"]', function() {
        setTimeout(function() {
            checkPriceFields();
        }, 100);
    });
    
    // URL değişikliğini izle (AJAX navigasyon için)
    var currentUrl = window.location.href;
    setInterval(function() {
        if (window.location.href !== currentUrl) {
            currentUrl = window.location.href;
            setTimeout(function() {
                checkPriceFields();
            }, 500);
        }
    }, 1000);
}

// DOM mutation observer
function initMutationObserver() {
    if (typeof MutationObserver !== 'undefined') {
        var observer = new MutationObserver(function(mutations) {
            var shouldCheck = false;
            
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1) { // Element node
                            var $node = jQuery(node);
                            if ($node.find('input[name*="price"], select[name*="category"]').length > 0) {
                                shouldCheck = true;
                            }
                        }
                    });
                }
            });
            
            if (shouldCheck) {
                setTimeout(function() {
                    checkPriceFields();
                }, 100);
            }
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
        
        if (priceHider.debug) {
            console.log('Mutation observer initialized');
        }
    }
}

// Debug modu toggle
function toggleDebug() {
    priceHider.debug = !priceHider.debug;
    
    if (priceHider.debug) {
        jQuery('body').addClass('price-hider-debug');
        console.log('Price hider debug mode enabled');
    } else {
        jQuery('body').removeClass('price-hider-debug');
        console.log('Price hider debug mode disabled');
    }
}

// Başlatma fonksiyonu
function initializePriceHider() {
    if (priceHider.isInitialized) {
        return;
    }
    
    // Global değişkenlerden kategorileri al
    if (typeof requestCategories !== 'undefined' && requestCategories.length > 0) {
        priceHider.requestCategories = requestCategories;
    }
    
    // Debug modu kontrolü
    if (window.location.href.indexOf('debug=price') !== -1) {
        toggleDebug();
    }
    
    // İlk kontrol
    checkPriceFields();
    
    // Event listener'ları kur
    handleFormSubmit();
    watchCategoryChange();
    initMutationObserver();
    
    priceHider.isInitialized = true;
    
    if (priceHider.debug) {
        console.log('Price hider initialized');
        console.log('Request categories:', priceHider.requestCategories);
    }
}

// Document ready
jQuery(document).ready(function($) {
    initializePriceHider();
});

// AJAX complete event
jQuery(document).ajaxComplete(function() {
    setTimeout(function() {
        checkPriceFields();
    }, 500);
});

// Window load event
jQuery(window).on('load', function() {
    setTimeout(function() {
        checkPriceFields();
    }, 1000);
});

// Global fonksiyonlar (debug amaçlı)
if (typeof window !== 'undefined') {
    window.priceHider = priceHider;
    window.checkPriceFields = checkPriceFields;
    window.toggleDebug = toggleDebug;
    window.hidePriceFields = hidePriceFields;
    window.showPriceFields = showPriceFields;
} 