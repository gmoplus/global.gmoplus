<?php /* Smarty version 2.6.31, created on 2025-09-20 12:25:57
         compiled from /home/gmoplus/global.gmoplus.com/admin/tpl/blocks/lt_category_search_option.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/admin/tpl/blocks/lt_category_search_option.tpl', 9, false),)), $this); ?>
<!-- all in one option -->

<tr>
    <td class="name"><?php echo $this->_tpl_vars['lang']['lt_category_search_dropdown']; ?>
</td>
    <td class="field">
        <?php $this->assign('checkbox_field', 'category_search_dropdown'); ?>

        <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php else: ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php endif; ?>
        
        <table>
        <tr>
            <td>
                <input <?php echo $this->_tpl_vars['category_search_dropdown_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <input <?php echo $this->_tpl_vars['category_search_dropdown_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            </td>
            <td><span class="field_description"><?php echo $this->_tpl_vars['lang']['lt_category_search_dropdown_hint']; ?>
</span></td>
        </tr>
        </table>
    </td>

    <script>
    <?php echo '

    var categoryDropdownSearch = function(){
        $(\'input[name=category_search_dropdown]\').attr(\'disabled\', $(\'input[name=search_form]:checked\').val() == \'1\' ? false : true);
    }

    $(document).ready(function(){
        $(\'input[name=search_form]\').change(function(){
            categoryDropdownSearch();
        });

        categoryDropdownSearch();
    });

    '; ?>

    </script>
</tr>

<!-- all in one option end -->