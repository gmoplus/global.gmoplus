<?php /* Smarty version 2.6.31, created on 2025-09-20 12:25:57
         compiled from /home/gmoplus/global.gmoplus.com/plugins/categories_tree/admin/settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/categories_tree/admin/settings.tpl', 9, false),)), $this); ?>
<!-- category tree / category block settings -->

<tr>
    <td class="name"><?php echo $this->_tpl_vars['lang']['category_tree_tree_options']; ?>
</td>
    <td class="field" style="vertical-align: top;padding-top: 10px;" id="ctree_block_settings">
        <?php $this->assign('checkbox_field', 'ctree_module'); ?>
            
        <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php else: ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php endif; ?>
        
        <input <?php echo $this->_tpl_vars['ctree_module_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
        <input <?php echo $this->_tpl_vars['ctree_module_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        
        <div class="ctree-cont">
            <div style="padding: 14px 0 0;"><label><input value="1" <?php if ($this->_tpl_vars['sPost']['ctree_subcat_counter']): ?>checked="checked"<?php endif; ?> type="checkbox" name="ctree_subcat_counter" /> <?php echo $this->_tpl_vars['lang']['category_tree_show_subcat_counter']; ?>
</label></div>
            <div style="padding: 5px 0 0;"><label><input value="1" <?php if ($this->_tpl_vars['sPost']['ctree_open_subcat']): ?>checked="checked"<?php endif; ?> type="checkbox" name="ctree_open_subcat" /> <?php echo $this->_tpl_vars['lang']['category_tree_open_subcat']; ?>
</label></div>
            <div style="padding: 5px 0 0;"><label><input value="1" <?php if ($this->_tpl_vars['sPost']['ctree_child_only']): ?>checked="checked"<?php endif; ?> type="checkbox" name="ctree_child_only" /> <?php echo $this->_tpl_vars['lang']['category_tree_show_child_only']; ?>
</label></div>
        </div>
        
        <script type="text/javascript">
        <?php echo '
        
        var ctree_settings = function(){
            var obj = $(\'#ctree_block_settings input[name=ctree_module]:checked\');
            if ( parseInt(obj.val()) ) {
                obj.parent().find(\'.ctree-cont\').slideDown(\'fast\');
                $(\'input[name=ablock_display_subcategories], \\
                input[name=ablock_subcategories_number], \\
                input[name=ablock_scrolling_in_box], \\
                input[name=ablock_visible_number], \\
                input[name=ablock_columns_number]\').attr(\'disabled\', true).addClass(\'disabled\').each(function(){
                    if (($(this).attr(\'type\') == \'radio\' && $(this).attr(\'checked\')) || $(this).attr(\'type\') == \'text\') {
                        var value = $(this).val();
                        var name  = $(this).attr(\'name\');

                        if (name == \'ablock_visible_number\' || name == \'ablock_subcategories_number\') {
                            value = \'0\';
                            $(this).val(value);
                        } else if (name == \'ablock_scrolling_in_box\' || name == \'ablock_display_subcategories\') {
                            value = \'1\';
                            $(\'#\'+ name + \'_yes\').prop(\'checked\', true)
                        }

                        $(this).after(\'<input name="\' + name + \'" type="hidden" value="\' + value + \'" />\');
                    }
                });
            }
            else {
                obj.parent().find(\'.ctree-cont\').slideUp();
                $(\'input[name=ablock_display_subcategories], \\
                input[name=ablock_subcategories_number], \\
                input[name=ablock_scrolling_in_box], \\
                input[name=ablock_visible_number], \\
                input[name=ablock_columns_number]\').attr(\'disabled\', false).removeClass(\'disabled\').each(function(){
                    if ( ($(this).attr(\'type\') == \'radio\' && $(this).attr(\'checked\')) || $(this).attr(\'type\') == \'text\' ) {
                        if ( $(this).next().attr(\'type\') == \'hidden\' ) {
                            $(this).next().remove();
                        }
                    }
                });
            }
        }
        
        $(document).ready(function(){
            ctree_settings();
            
            $(\'#ctree_block_settings input[name=ctree_module]\').change(function(){
                ctree_settings();
            });
        });
        
        '; ?>

        </script>
    </td>
</tr>

<!-- category tree / category block settings end -->