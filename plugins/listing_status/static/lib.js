
/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL63573ZF30R - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: global.gmowin.com
 *  FILE: RLLISTINGSTATUS.CLASS.PHP
 *  
 *  The software is a commercial product delivered under single, non-exclusive,
 *  non-transferable license for one domain or IP address. Therefore distribution,
 *  sale or transfer of the file in whole or in part without permission of Flynax
 *  respective owners is considered to be illegal and breach of Flynax License End
 *  User Agreement.
 *  
 *  You are not allowed to remove this information from the file without permission
 *  of Flynax respective owners.
 *  
 *  Flynax Classifieds Software 2025 | All copyrights reserved.
 *  
 *  https://www.flynax.com
 ******************************************************************************/
$(document).ready(function(){ 
    $('#listings select.selector, #agencies select.selector').change(function(){ 
        var id    = $(this).data('id');
        var $self = $(this);
        var data  = {
            mode:   'listing_status',
            item:   'listing_status',
            id:     id,
            status: $(this).val(),
            lang:   rlLang,
        };
        flUtil.ajax(data, function(response, status){
            if (status == 'success' && response) {

                if (response.status == 'ok') {
                    if(response.html) {
                        var $labelBox = $("#listing_"+id).find("div.picture>div.listing_labels");
                        $labelBox.empty();
                        $labelBox.html(response.html);
                    }
                    printMessage('notice', response.message);
                }
                else {                    
                    $self.find('option[value='+response.default+']').attr('selected','selected');
                    if(response.message) {
                        printMessage('error', response.message);
                    }
                }
            }
        });
    });
});
