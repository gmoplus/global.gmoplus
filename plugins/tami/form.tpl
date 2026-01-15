<!-- TAMI Sanal POS Payment Form -->
<div id="tami_payment_form" class="tami-payment-form">
    <div class="tami-header">
        <img src="{$rlTplBase}img/tami-logo.png" alt="TAMI Sanal POS" class="tami-logo" />
        <h3>{$lang.tami_payment}</h3>
        {if $tami_test_mode}
            <div class="notice_box warning">
                <strong>TEST MODU:</strong> Bu işlem test modunda gerçekleştirilecektir.
            </div>
        {/if}
    </div>

    <form id="tami-form" class="tami-form" method="post">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="tami_card_number" class="required">{$lang.tami_card_number}</label>
                <input type="text" 
                       name="tami_card_number" 
                       id="tami_card_number" 
                       class="form-control card-number" 
                       placeholder="**** **** **** ****"
                       maxlength="19"
                       autocomplete="cc-number"
                       required />
                <div class="card-type-icon"></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="tami_card_holder" class="required">{$lang.tami_card_name}</label>
                <input type="text" 
                       name="tami_card_holder" 
                       id="tami_card_holder" 
                       class="form-control" 
                       placeholder="Ad Soyad"
                       autocomplete="cc-name"
                       required />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="tami_expiry_month" class="required">{$lang.tami_expiry_month}</label>
                <select name="tami_expiry_month" id="tami_expiry_month" class="form-control" required>
                    <option value="">Ay</option>
                    {for $i=1 to 12}
                        <option value="{if $i < 10}0{$i}{else}{$i}{/if}">
                            {if $i < 10}0{$i}{else}{$i}{/if}
                        </option>
                    {/for}
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="tami_expiry_year" class="required">{$lang.tami_expiry_year}</label>
                <select name="tami_expiry_year" id="tami_expiry_year" class="form-control" required>
                    <option value="">Yıl</option>
                    {assign var="current_year" value=$smarty.now|date_format:"%Y"}
                    {for $i=0 to 15}
                        {assign var="year" value=$current_year+$i}
                        <option value="{$year|substr:-2}">
                            {$year}
                        </option>
                    {/for}
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="tami_cvv" class="required">{$lang.tami_cvv}</label>
                <input type="text" 
                       name="tami_cvv" 
                       id="tami_cvv" 
                       class="form-control" 
                       placeholder="***"
                       maxlength="4"
                       autocomplete="cc-csc"
                       required />
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="tami_installments">{$lang.tami_installments}</label>
                <select name="tami_installments" id="tami_installments" class="form-control">
                    <option value="1" selected>{$lang.tami_single_payment}</option>
                    {for $i=2 to 12}
                        <option value="{$i}">{$i} Taksit</option>
                    {/for}
                </select>
                <div id="installment-info" class="installment-info"></div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="payment-total">
                    <strong>Toplam: {$payment_total} TL</strong>
                </div>
            </div>
        </div>

        {if $tami_3d_secure}
        <div class="row">
            <div class="col-md-12">
                <div class="notice_box info">
                    <i class="icon-shield"></i>
                    Bu ödeme 3D Secure ile güvenli şekilde gerçekleştirilecektir.
                </div>
            </div>
        </div>
        {/if}

        <div class="form-actions">
            <button type="submit" id="tami-submit-btn" class="btn btn-primary btn-large">
                <i class="icon-lock"></i>
                {$lang.tami_submit}
            </button>
            <div class="payment-security">
                <small>
                    <i class="icon-shield"></i>
                    256-bit SSL şifreleme ile korunmaktadır
                </small>
            </div>
        </div>
    </form>

    <div id="tami-loading" class="tami-loading" style="display: none;">
        <div class="loading-content">
            <div class="spinner"></div>
            <p>{$lang.tami_payment_processing}</p>
        </div>
    </div>

    <div class="tami-footer">
        <div class="accepted-cards">
            <span>Kabul edilen kartlar:</span>
            <img src="{$rlTplBase}img/cards/visa.png" alt="Visa" />
            <img src="{$rlTplBase}img/cards/mastercard.png" alt="Mastercard" />
            <img src="{$rlTplBase}img/cards/amex.png" alt="American Express" />
            <img src="{$rlTplBase}img/cards/troy.png" alt="Troy" />
        </div>
        <div class="powered-by">
            <small>Powered by <strong>TAMI</strong> - T. Garanti Bankası A.Ş.</small>
        </div>
    </div>
</div>

<!-- TAMI JavaScript -->
<script type="text/javascript">
{literal}
$(document).ready(function() {
    var tamiForm = {
        init: function() {
            this.bindEvents();
            this.formatCardNumber();
            this.validateForm();
        },
        
        bindEvents: function() {
            $('#tami-form').on('submit', this.submitPayment);
            $('#tami_card_number').on('input', this.onCardNumberChange);
            $('#tami_installments').on('change', this.updateInstallmentInfo);
            $('#tami_cvv').on('input', this.formatCVV);
        },
        
        formatCardNumber: function() {
            $('#tami_card_number').on('input', function() {
                var value = $(this).val().replace(/\D/g, '');
                var formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                $(this).val(formattedValue);
                
                // Detect card type
                var cardType = tamiForm.detectCardType(value);
                $('.card-type-icon').attr('class', 'card-type-icon ' + cardType);
            });
        },
        
        formatCVV: function() {
            $('#tami_cvv').on('input', function() {
                var value = $(this).val().replace(/\D/g, '');
                $(this).val(value);
            });
        },
        
        detectCardType: function(number) {
            var patterns = {
                visa: /^4/,
                mastercard: /^5[1-5]|^2[2-7]/,
                amex: /^3[47]/,
                troy: /^9792/
            };
            
            for (var type in patterns) {
                if (patterns[type].test(number)) {
                    return type;
                }
            }
            return '';
        },
        
        onCardNumberChange: function() {
            var cardNumber = $(this).val().replace(/\s/g, '');
            if (cardNumber.length >= 6) {
                tamiForm.queryInstallments(cardNumber);
            }
        },
        
        queryInstallments: function(cardNumber) {
            // Query available installments for this card
            $.ajax({
                url: rlUrlHome + 'request.ajax.php',
                type: 'POST',
                data: {
                    mode: 'tamiInstallmentQuery',
                    card_number: cardNumber,
                    amount: parseFloat('{/literal}{$payment_total}{literal}')
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'OK') {
                        tamiForm.updateInstallmentOptions(response.installments);
                    }
                }
            });
        },
        
        updateInstallmentOptions: function(installments) {
            var select = $('#tami_installments');
            select.empty();
            
            $.each(installments, function(index, item) {
                var text = item.installment == 1 ? 'Tek Çekim' : item.installment + ' Taksit';
                if (item.commission_rate > 0) {
                    text += ' (+%' + item.commission_rate + ')';
                }
                select.append('<option value="' + item.installment + '" data-total="' + item.total + '">' + text + '</option>');
            });
        },
        
        updateInstallmentInfo: function() {
            var selected = $('#tami_installments option:selected');
            var installments = selected.val();
            var total = selected.data('total');
            
            if (installments > 1 && total) {
                var monthlyAmount = (total / installments).toFixed(2);
                $('#installment-info').html(
                    '<small>' + installments + ' x ' + monthlyAmount + ' TL = ' + total.toFixed(2) + ' TL</small>'
                );
            } else {
                $('#installment-info').empty();
            }
        },
        
        validateForm: function() {
            $('#tami-form input[required], #tami-form select[required]').on('blur', function() {
                var field = $(this);
                var value = field.val();
                
                if (!value) {
                    field.addClass('error');
                } else {
                    field.removeClass('error');
                    
                    // Specific validations
                    if (field.attr('id') === 'tami_card_number') {
                        if (!tamiForm.luhnCheck(value.replace(/\s/g, ''))) {
                            field.addClass('error');
                            field.after('<span class="error-msg">Geçersiz kart numarası</span>');
                        } else {
                            field.next('.error-msg').remove();
                        }
                    }
                }
            });
        },
        
        luhnCheck: function(cardNumber) {
            var sum = 0;
            var alternate = false;
            
            for (var i = cardNumber.length - 1; i >= 0; i--) {
                var n = parseInt(cardNumber.charAt(i), 10);
                
                if (alternate) {
                    n *= 2;
                    if (n > 9) {
                        n = (n % 10) + 1;
                    }
                }
                
                sum += n;
                alternate = !alternate;
            }
            
            return (sum % 10 === 0);
        },
        
        submitPayment: function(e) {
            e.preventDefault();
            
            // Show loading
            $('#tami-loading').show();
            $('#tami-form').hide();
            
            // Validate form
            var isValid = true;
            $('#tami-form input[required], #tami-form select[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('error');
                }
            });
            
            if (!isValid) {
                $('#tami-loading').hide();
                $('#tami-form').show();
                alert('Lütfen tüm alanları doldurun.');
                return;
            }
            
            // Submit payment
            $.ajax({
                url: rlUrlHome + 'request.ajax.php',
                type: 'POST',
                data: $('#tami-form').serialize() + '&mode=tamiPayment',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'OK') {
                        if (response.redirect_url) {
                            window.location.href = response.redirect_url;
                        } else {
                            alert(response.message);
                        }
                    } else {
                        $('#tami-loading').hide();
                        $('#tami-form').show();
                        alert(response.message);
                    }
                },
                error: function() {
                    $('#tami-loading').hide();
                    $('#tami-form').show();
                    alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                }
            });
        }
    };
    
    // Initialize TAMI form
    tamiForm.init();
});
{/literal}
</script>

<style type="text/css">
{literal}
.tami-payment-form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #fff;
}

.tami-header {
    text-align: center;
    margin-bottom: 20px;
}

.tami-logo {
    height: 40px;
    margin-bottom: 10px;
}

.tami-form .form-group {
    margin-bottom: 15px;
}

.tami-form label.required:after {
    content: " *";
    color: red;
}

.card-number {
    position: relative;
}

.card-type-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 24px;
    height: 16px;
}

.card-type-icon.visa { background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAyNCAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjI0IiBoZWlnaHQ9IjE2IiByeD0iMiIgZmlsbD0iIzFFNDc4MyIvPgo8L3N2Zz4K') no-repeat; }
.card-type-icon.mastercard { background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAyNCAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjI0IiBoZWlnaHQ9IjE2IiByeD0iMiIgZmlsbD0iI0VCMDAxQiIvPgo8L3N2Zz4K') no-repeat; }

.installment-info {
    margin-top: 5px;
    color: #666;
}

.payment-total {
    text-align: right;
    font-size: 18px;
    margin-top: 25px;
}

.form-actions {
    text-align: center;
    margin-top: 25px;
}

.tami-loading {
    text-align: center;
    padding: 40px;
}

.spinner {
    border: 3px solid #f3f3f3;
    border-top: 3px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.tami-footer {
    margin-top: 20px;
    text-align: center;
    border-top: 1px solid #eee;
    padding-top: 15px;
}

.accepted-cards img {
    height: 20px;
    margin: 0 5px;
}

.powered-by {
    margin-top: 10px;
    color: #999;
}

.error {
    border-color: #d9534f !important;
}

.error-msg {
    color: #d9534f;
    font-size: 12px;
    display: block;
    margin-top: 5px;
}
{/literal}
</style> 