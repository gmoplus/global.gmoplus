<?php /* Smarty version 2.6.31, created on 2025-09-20 12:25:57
         compiled from /home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/row.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/row.tpl', 9, false),)), $this); ?>
<!-- location finder option in listing type -->

<tr>
    <td class="name"><?php echo $this->_tpl_vars['lang']['locationFinder_option_name']; ?>
</td>
    <td class="field">
        <?php $this->assign('checkbox_field', 'location_finder'); ?>
        
        <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php else: ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php endif; ?>
        
        <table>
        <tr>
            <td>
                <input <?php echo $this->_tpl_vars['location_finder_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <input <?php echo $this->_tpl_vars['location_finder_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            </td>
        </tr>
        </table>
    </td>
</tr>

<!-- location finder option in listing type end -->