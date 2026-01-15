<?php /* Smarty version 2.6.31, created on 2025-08-21 11:32:54
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/status_admin_selector.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/status_admin_selector.tpl', 16, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/status_admin_selector.tpl', 34, false),)), $this); ?>
<?php if ($this->_tpl_vars['listing_info']['Status'] == 'active'): ?>
    <tr>
    	<td class="name"><?php echo $this->_tpl_vars['lang']['ls_substatus']; ?>
:</td>
    	<td class="value" id="status_bar">
    		<select class="selector" >
    			
    			<?php if ($this->_tpl_vars['listing_info']['Plan_type'] == 'account'): ?>
                    <?php $this->assign('statuses', $this->_tpl_vars['membership_statuses']); ?>
                <?php else: ?>
                    <?php $this->assign('statuses', $this->_tpl_vars['status']); ?>
                <?php endif; ?>

    			<?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    				<?php if ($this->_tpl_vars['item']['Type'] == 'all'): ?>
    					<option value="<?php echo $this->_tpl_vars['item']['Key']; ?>
" <?php if ($this->_tpl_vars['listing_info']['Sub_status'] == $this->_tpl_vars['item']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    				<?php elseif (((is_array($_tmp=$this->_tpl_vars['listing_type']['Type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['item']['Type']) : in_array($_tmp, $this->_tpl_vars['item']['Type']))): ?>
    					<option value="<?php echo $this->_tpl_vars['item']['Key']; ?>
" <?php if ($this->_tpl_vars['listing_info']['Sub_status'] == $this->_tpl_vars['item']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
    				<?php endif; ?>
    			<?php endforeach; endif; unset($_from); ?>
    		</select>
    	<td>
    </tr>
    <?php if ($this->_tpl_vars['status_admin']): ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['ls_substatus_admin']; ?>
:</td>
            <td class="value" id="admin_status_bar">
                <span class="labels"><?php if ($this->_tpl_vars['listing_info']['Sub_status_data_name']): ?><?php echo $this->_tpl_vars['listing_info']['Sub_status_data_name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['ls_no_labels']; ?>
<?php endif; ?></span>
                <span class="change-admin-label link" style="color: #8a27e2; cursor: pointer;"><?php echo $this->_tpl_vars['lang']['change']; ?>
</span>

                <div id="admin_labels" class="hide">
                    <div>
                        <ul>
                        <?php $_from = $this->_tpl_vars['status_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                            <?php $this->assign('pos_key', ((is_array($_tmp='ls_position_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['Position']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['Position']))); ?>
                            <li>
                                <label><input <?php if ($this->_tpl_vars['listing_info']['Sub_status_data_val'] && ((is_array($_tmp=$this->_tpl_vars['item']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['listing_info']['Sub_status_data_val']) : in_array($_tmp, $this->_tpl_vars['listing_info']['Sub_status_data_val']))): ?>checked="checked"<?php endif; ?> type="checkbox" name="label" value="<?php echo $this->_tpl_vars['item']['Key']; ?>
" /> <?php echo $this->_tpl_vars['item']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['pos_key']]; ?>
)</label>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                        </ul>
                        <input class="apply_label" type="button" name="ok" value="<?php echo $this->_tpl_vars['lang']['apply']; ?>
">
                    </div>
                </div>
            </td>
        </tr>
    <?php endif; ?>

    <script type="text/javascript">
        var listing_id = <?php echo $this->_tpl_vars['listing_info']['ID']; ?>
;
        <?php echo '
        $(document).ready(function(){ 
            $(\'body\').on(\'click\', \'.apply_label\', function(){ 
                var array = $.map($(".modal-wrapper input[type=\'checkbox\']:checked"), function(c){return c.value; });

                $.getJSON(rlConfig[\'ajax_url\'], {mode: \'listing_admin_status\', item: \'listing_admin_status\', id: listing_id, status: array, admin: \'true\'}, function(response) {
                    if (response.status == \'ok\') {
                        $(\'#admin_status_bar span.labels\').html(response.labels);
                        $(\'body\').trigger(\'click\');
                        printMessage(\'notice\', response.message);
                    }
                    else {
                        printMessage(\'error\', response.message);
                    }
                }, \'json\');
            });

            $(\'.change-admin-label\').flModal({
                width: \'auto\',
                height: \'auto\',
                caption: '; ?>
'<?php echo $this->_tpl_vars['lang']['ls_substatus_admin']; ?>
'<?php echo ',
                content: \'<div id="tmpAdminLabels" style="min-width:200px;"></div>\',
                onClose: function(){
                    $(\'#admin_labels\').append( $("#tmpAdminLabels > div"));
                },
                onReady: function(){
                    $("#tmpAdminLabels").append($(\'#admin_labels > div\'));
                }
            });

            $(\'#status_bar select.selector\').change(function(){ 
                
                $.getJSON(rlConfig[\'ajax_url\'], {mode: \'listing_status\', item: \'listing_status\', id: listing_id, status: $(this).val()}, function(response) {
                    if (response.status == \'ok\') {
                        printMessage(\'notice\', response.message);
                    }
                    else {
                        printMessage(\'error\', response.message);
                    }
                }, \'json\');
            }); 
        });
    '; ?>

</script>
<?php endif; ?>