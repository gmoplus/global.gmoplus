/**
 * TAMI Sanal POS JavaScript
 * Card validation and form handling
 */

$(document).ready(function() {
    
    // Initialize TAMI payment form
    if ($('#tami_payment_form').length) {
        initTamiForm();
    }
    
});

/**
 * Initialize TAMI form validation and interactions
 */
function initTamiForm() {
    
    // Card number formatting
    $('#tami_card_number').on('input', function() {
        let value = $(this).val().replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        $(this).val(formattedValue);
        
        // Card type detection
        detectCardType(value);
        
        // Validate card number
        validateCardNumber(value);
    });
    
    // CVV validation
    $('#tami_cvv').on('input', function() {
        let value = $(this).val().replace(/[^0-9]/gi, '');
        $(this).val(value);
        validateCVV(value);
    });
    
    // Expiry month/year validation
    $('#tami_expiry_month, #tami_expiry_year').on('change', function() {
        validateExpiry();
    });
    
    // Form submission
    $('#tami-form').on('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            showLoading();
            $(this).off('submit').submit();
        }
    });
    
    // Installment selection
    $('#tami_installments').on('change', function() {
        updateInstallmentInfo();
    });
}

/**
 * Detect card type from number
 */
function detectCardType(number) {
    let cardType = '';
    
    if (/^4/.test(number)) {
        cardType = 'visa';
    } else if (/^5[1-5]/.test(number)) {
        cardType = 'mastercard';
    } else if (/^3[47]/.test(number)) {
        cardType = 'amex';
    }
    
    // Update card icon
    $('.card-type-icon').removeClass('visa mastercard amex').addClass(cardType);
}

/**
 * Validate card number using Luhn algorithm
 */
function validateCardNumber(number) {
    let isValid = luhnCheck(number) && number.length >= 13 && number.length <= 19;
    
    toggleFieldValidation('#tami_card_number', isValid);
    return isValid;
}

/**
 * Luhn algorithm for card validation
 */
function luhnCheck(number) {
    let sum = 0;
    let shouldDouble = false;
    
    for (let i = number.length - 1; i >= 0; i--) {
        let digit = parseInt(number.charAt(i));
        
        if (shouldDouble) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        
        sum += digit;
        shouldDouble = !shouldDouble;
    }
    
    return (sum % 10) === 0;
}

/**
 * Validate CVV
 */
function validateCVV(cvv) {
    let isValid = cvv.length >= 3 && cvv.length <= 4;
    toggleFieldValidation('#tami_cvv', isValid);
    return isValid;
}

/**
 * Validate expiry date
 */
function validateExpiry() {
    let month = parseInt($('#tami_expiry_month').val());
    let year = parseInt($('#tami_expiry_year').val());
    
    if (!month || !year) return false;
    
    let now = new Date();
    let currentMonth = now.getMonth() + 1;
    let currentYear = now.getFullYear();
    
    let isValid = year > currentYear || (year === currentYear && month >= currentMonth);
    
    toggleFieldValidation('#tami_expiry_month', isValid);
    toggleFieldValidation('#tami_expiry_year', isValid);
    
    return isValid;
}

/**
 * Toggle field validation visual feedback
 */
function toggleFieldValidation(fieldSelector, isValid) {
    let field = $(fieldSelector);
    
    if (isValid) {
        field.removeClass('error').addClass('valid');
    } else {
        field.removeClass('valid').addClass('error');
    }
}

/**
 * Validate entire form
 */
function validateForm() {
    let cardNumber = $('#tami_card_number').val().replace(/\s/g, '');
    let cvv = $('#tami_cvv').val();
    let cardName = $('#tami_card_name').val().trim();
    
    let isCardValid = validateCardNumber(cardNumber);
    let isCvvValid = validateCVV(cvv);
    let isExpiryValid = validateExpiry();
    let isNameValid = cardName.length >= 2;
    
    // Show specific error messages
    if (!isCardValid) {
        showError('Geçersiz kart numarası');
        return false;
    }
    
    if (!isCvvValid) {
        showError('Geçersiz CVV kodu');
        return false;
    }
    
    if (!isExpiryValid) {
        showError('Geçersiz son kullanım tarihi');
        return false;
    }
    
    if (!isNameValid) {
        showError('Kart sahibi adı gerekli');
        return false;
    }
    
    return true;
}

/**
 * Update installment information
 */
function updateInstallmentInfo() {
    let installments = parseInt($('#tami_installments').val());
    let totalAmount = parseFloat($('#tami_total_amount').data('amount'));
    
    if (installments > 1) {
        let monthlyAmount = totalAmount / installments;
        $('#installment-info').html(
            `<strong>${installments} taksit:</strong> Aylık ${monthlyAmount.toFixed(2)} TL`
        ).show();
    } else {
        $('#installment-info').hide();
    }
}

/**
 * Show loading state
 */
function showLoading() {
    $('#tami-submit-btn').prop('disabled', true).html(
        '<i class="fa fa-spinner fa-spin"></i> İşleniyor...'
    );
    
    $('.tami-form').addClass('loading');
}

/**
 * Show error message
 */
function showError(message) {
    $('.tami-error').remove();
    
    $('<div class="tami-error alert alert-danger">' + message + '</div>')
        .prependTo('#tami_payment_form')
        .hide()
        .slideDown();
    
    // Auto remove after 5 seconds
    setTimeout(function() {
        $('.tami-error').slideUp(function() {
            $(this).remove();
        });
    }, 5000);
}

/**
 * Show success message
 */
function showSuccess(message) {
    $('.tami-success').remove();
    
    $('<div class="tami-success alert alert-success">' + message + '</div>')
        .prependTo('#tami_payment_form')
        .hide()
        .slideDown();
}

/**
 * TAMI 3D Secure redirect handler
 */
function handleTami3DRedirect(redirectUrl) {
    if (redirectUrl) {
        showLoading();
        window.location.href = redirectUrl;
    }
} 