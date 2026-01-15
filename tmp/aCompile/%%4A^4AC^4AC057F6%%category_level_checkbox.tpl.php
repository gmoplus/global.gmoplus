<?php /* Smarty version 2.6.31, created on 2025-07-31 13:16:02
         compiled from blocks/category_level_checkbox.tpl */ ?>
<!-- category level -->

<?php if ($this->_tpl_vars['categories']): ?>
    <ul <?php if ($this->_tpl_vars['first']): ?>class="first"<?php endif; ?>>
        <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['catF']['iteration']++;
?>
            <?php if (! empty ( $this->_tpl_vars['cat']['Sub_cat'] ) || ( $this->_tpl_vars['cat']['Add'] == '1' && $this->_tpl_vars['listing_types'][$this->_tpl_vars['cat_type']]['Cat_custom_adding'] )): ?><?php $this->assign('sub_leval', true); ?><?php else: ?><?php $this->assign('sub_leval', false); ?><?php endif; ?>
            <li id="tree_cat_<?php echo $this->_tpl_vars['cat']['ID']; ?>
" <?php if ($this->_tpl_vars['cat']['Lock']): ?>class="locked"<?php endif; ?>>
                <img <?php if (! $this->_tpl_vars['sub_leval']): ?>class="no_child"<?php endif; ?> src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" alt="" />
                <label><input type="checkbox" name="categories[]" value="<?php echo $this->_tpl_vars['cat']['ID']; ?>
" /> <span><?php echo $this->_tpl_vars['cat']['name']; ?>
</span></label>
                <span class="tree_loader"></span>
            </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>

<!-- category level end -->