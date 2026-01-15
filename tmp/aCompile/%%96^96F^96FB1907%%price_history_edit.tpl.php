<?php /* Smarty version 2.6.31, created on 2025-08-21 11:32:54
         compiled from /home/gmoplus/global.gmoplus.com/plugins/priceHistory/admin/price_history_edit.tpl */ ?>
<!-- price history section -->

<fieldset class="light">
    <legend id="legend_price_history" class="up" onclick="fieldset_action('price_history_edit');"><?php echo $this->_tpl_vars['lang']['ph_label']; ?>
</legend>
    <div id="price_history_edit">
        <table class="form hide" style="display: table;"><tr class="hide"></tr>
         <?php $_from = $this->_tpl_vars['ph_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ph_array'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ph_array']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['ph_array']['iteration']++;
?>
            <tr class="ph-field-container" data-id='<?php echo $this->_tpl_vars['item']['ID']; ?>
' id="row-<?php echo $this->_foreach['ph_array']['iteration']; ?>
">
                <td class="name"></td>
                <td class="field">
                    <div class="ph-fields" id="ph-fields-<?php echo $this->_foreach['ph_array']['iteration']; ?>
">
                        <input type="text" id="phprice-<?php echo $this->_foreach['ph_array']['iteration']; ?>
" class="ph-price numeric wauto" size="14" maxlength="14" value="<?php echo $this->_tpl_vars['item']['price_value']; ?>
" name="f[price_hisory][<?php echo $this->_foreach['ph_array']['iteration']; ?>
][price]">
                        <select id="ccode-<?php echo $this->_foreach['ph_array']['iteration']; ?>
" name="f[price_hisory][<?php echo $this->_foreach['ph_array']['iteration']; ?>
][ccode]" style="width: 80px;">
                            <?php $_from = $this->_tpl_vars['currencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currency_info']):
?>
                             <option value="<?php echo $this->_tpl_vars['currency_info']['currency_key']; ?>
"<?php if ($this->_tpl_vars['currency_info']['currency_key'] == $this->_tpl_vars['item']['price_currency']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['currency_info']['currency_value']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input name="f[price_hisory][<?php echo $this->_foreach['ph_array']['iteration']; ?>
][ph_data]" id="phdata-<?php echo $this->_foreach['ph_array']['iteration']; ?>
" style="width: 100px;" type="text" class="ph-data<?php if (! $this->_tpl_vars['item']['Date']): ?> error<?php endif; ?>" value="<?php echo $this->_tpl_vars['item']['Date']; ?>
">
                         <input name="f[price_hisory][<?php echo $this->_foreach['ph_array']['iteration']; ?>
][id]" type="hidden" value="<?php echo $this->_tpl_vars['item']['ID']; ?>
">
                         <img  style="vertical-align: middle;" class="remove remove-ph" data-id="<?php echo $this->_tpl_vars['item']['ID']; ?>
" id="remove-rate-<?php echo $this->_foreach['ph_array']['iteration']; ?>
"  src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" onclick="remove_row(this)">
                    </div>
                </td>
            </tr>
         <?php endforeach; endif; unset($_from); ?>
            <tr class="ph-add-btn">
                <td class="name"></td>
                <td class="value">
                    <span class='ph-add'><a href="javascript:add_row();"><?php echo $this->_tpl_vars['lang']['ph_add_price_field']; ?>
</a></span>
                </td>
            </tr>
        </table>
    </div>
    <div>

    </div>
</fieldset>
<script type="text/javascript">
    var curselect_source = "";

    <?php $_from = $this->_tpl_vars['currencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['currency_info']):
?>
    curselect_source += "<option value='<?php echo $this->_tpl_vars['currency_info']['currency_key']; ?>
'><?php echo $this->_tpl_vars['currency_info']['currency_value']; ?>
</option>";
    <?php endforeach; endif; unset($_from); ?>

    <?php echo '
    var data_picker_options = {
        dateFormat: \'yy-mm-dd\'
    };

    function add_row() {
        var last_row = $("tr.ph-field-container").length;
        var count = get_row_id(last_row);
        var last_price = $("#phprice-" + last_row).val();
        var last_data = $("#phdata-" + last_row).val();

        var $row = $(\'<tr/>\', {
            \'class\': \'ph-field-container\',
            \'id\': \'row-\' + count
        }).append(
            $(\'<td/>\', {class: \'name\'})
        ).append(
            $(\'<td/>\', {class: \'field\'}).append(
                $(\'<div/>\', {class: \'ph-fields\', \'id\': "ph-fields-" + count}).append(
                    $(\'<input/>\', {
                        \'type\': \'text\',
                        \'style\': \'margin-right:5px;\',
                        \'class\': \'ph-price numeric wauto\',
                        \'maxlength\': \'14\',
                        \'name\': \'f[price_hisory][\' + count + \'][price]\',
                        \'id\': \'phprice-\' + count,
                        \'value\': last_price
                    }).attr(\'size\', 14)
                ).append(
                    $(\'<select/>\', {
                        \'style\': \'width:80px;margin-right:5px;\',
                        \'id\': \'ccode-\' + count,
                        \'name\': \'f[price_hisory][\' + count + \'][ccode]\'
                    }).append(curselect_source)
                ).append(
                    $(\'<input/>\', {
                        \'type\': \'text\',
                        \'style\': \'width:100px;margin-right:5px;\',
                        \'id\': \'phdata-\' + count,
                        \'name\': \'f[price_hisory][\' + count + \'][ph_data]\',
                        \'class\': \'ph-data\',
                        \'value\': last_data
                    }).append(curselect_source)
                ).append(
                    $(\'<img/>\', {
                        \'class\': \'remove remove-ph\',
                        \'data-id\': \'0\',
                        \'style\': \'vertical-align: middle;\',
                        \'onclick\': \'remove_row(this)\',
                        \'src\':'; ?>
'<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif'<?php echo '
                    }).append(curselect_source)
                )
            )
        );

        $row.find(\'.numeric\').numeric();

        $("#price_history_edit > table > tbody > tr:not(.ph-add-btn):last").after($row);
        last_currency = $("#ccode-" + last_row + " option:selected").val();
        $("#ccode-" + count + " option[value=\'" + last_currency + "\']").attr(\'selected\', \'selected\');
        $("input.ph-data").datepicker(data_picker_options);
    }

    function remove_row(element) {
        var ph_db_id = $(element).data(\'id\');
        var row_id_string = $(element).parents(\'tr\').attr(\'id\');
        var row_array = row_id_string.split(\'-\');
        var row_id = row_array[1];

        if (ph_db_id != 0) {
            var data = {
                item: \'phRemovePriceRow\',
                id: ph_db_id,
                row_id: row_id
            };

            sendAjax(data, function () {
                $(\'#row-\' + row_id).slideUp(\'2000\').remove();
            });
        } else {
            $("#row-" + row_id).slideUp(\'2000\').remove();
        }
    }

    function get_row_id(row_id) {
        var new_row = row_id + 1;

        if ($("#row-" + new_row).length) {
            return get_row_id(new_row);
        } else {
            return new_row;
        }
    }

    /**
     * Sending AJAX
     *
     * @since 1.2.0
     *
     * @param {object} data     - Sending data
     * @param {object} callback - Callback function
     */
    function sendAjax(data, callback) {
        $.post(rlConfig["ajax_url"], data,
            function(response){
                callback(response);
            }, \'json\')
    };

    $(document).ready(function(){
        $(\'input.ph-data\').datepicker(data_picker_options);
        $(\'.ph-field-container .numeric\').numeric();
    });
    '; ?>

</script>

<!-- price history section end -->