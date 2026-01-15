<?php /* Smarty version 2.6.31, created on 2025-09-07 10:39:25
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/category_box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/category_box.tpl', 9, false),)), $this); ?>

<div id="categories_<?php echo $this->_tpl_vars['mode']; ?>
" style="margin: 0 0 8px;">
    <div class="tree" data-key="<?php echo $this->_tpl_vars['mode']; ?>
">
        <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
            <fieldset class="light" data-key='<?php echo $this->_tpl_vars['section']['Key']; ?>
'>
                <legend id="legend_box<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('<?php echo $this->_tpl_vars['mode']; ?>
_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                <div id="<?php echo $this->_tpl_vars['mode']; ?>
_<?php echo $this->_tpl_vars['section']['ID']; ?>
">
                    <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listings_box') : smarty_modifier_cat($_tmp, 'listings_box')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_tree.tpl') : smarty_modifier_cat($_tmp, 'category_tree.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true,'mode' => $this->_tpl_vars['mode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php else: ?>
                        <div style="padding: 0 0 8px 10px;"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
                    <?php endif; ?>
                </div>
            </fieldset>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>

<?php $this->assign('subCatName', 'subcategories'); ?>
<?php if ($this->_tpl_vars['mode'] == 'cats'): ?>
    <?php $this->assign('subCatName', 'use_subcats'); ?>
<?php endif; ?>
<div style="padding: 0 0 6px 20px;">
    <input id="<?php echo $this->_tpl_vars['subCatName']; ?>
" <?php if (! empty ( $this->_tpl_vars['sPost'][$this->_tpl_vars['subCatName']] )): ?>checked="checked"<?php elseif ($this->_tpl_vars['mode'] == 'cats' && empty ( $this->_tpl_vars['sPost'][$this->_tpl_vars['subCatName']] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="<?php echo $this->_tpl_vars['subCatName']; ?>
" value="1" />
    <label class="cLabel" for="<?php echo $this->_tpl_vars['subCatName']; ?>
"><?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
</div>

<?php if ($this->_tpl_vars['check_all']): ?>
    <div class="grey_area">
        <label><input class="checkbox" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>checked="checked"<?php endif; ?> type="checkbox" name="cat_sticky" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
        <span id="cats_nav" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>class="hide"<?php endif; ?>>
            <span onclick="$('#categories_<?php echo $this->_tpl_vars['mode']; ?>
 div.tree input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
            <span class="divider"> | </span>
            <span onclick="$('#categories_<?php echo $this->_tpl_vars['mode']; ?>
 div.tree input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
        </span>
    </div>
<?php endif; ?>

<?php $this->assign('parent', ((is_array($_tmp=$this->_tpl_vars['mode'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_parent') : smarty_modifier_cat($_tmp, '_parent'))); ?>
<script type="text/javascript">
<?php echo '
$(document).ready(function(){
    var catsSelected = [];
    var catsSelectedParent = [];
    catsSelected = '; ?>
<?php if ($_POST[$this->_tpl_vars['mode']]): ?>[<?php $_from = $_POST[$this->_tpl_vars['mode']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postcatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postcatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['post_cat']):
        $this->_foreach['postcatF']['iteration']++;
?>'<?php echo $this->_tpl_vars['post_cat']; ?>
'<?php if (! ($this->_foreach['postcatF']['iteration'] == $this->_foreach['postcatF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?><?php echo ';
    catsSelectedParent = '; ?>
<?php if ($_POST[$this->_tpl_vars['parent']]): ?>[<?php $_from = $_POST[$this->_tpl_vars['parent']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postcatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postcatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['post_cat']):
        $this->_foreach['postcatF']['iteration']++;
?>'<?php echo $this->_tpl_vars['post_cat']; ?>
'<?php if (! ($this->_foreach['postcatF']['iteration'] == $this->_foreach['postcatF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?><?php echo ';
    customTree.init('; ?>
'<?php echo $this->_tpl_vars['mode']; ?>
'<?php echo ', catsSelected, catsSelectedParent);
});
'; ?>

</script>