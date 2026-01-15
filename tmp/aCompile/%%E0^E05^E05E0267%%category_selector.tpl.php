<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:32
         compiled from blocks/category_selector.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'blocks/category_selector.tpl', 5, false),array('modifier', 'cat', 'blocks/category_selector.tpl', 29, false),)), $this); ?>
<!-- category selector -->

<?php if ($this->_tpl_vars['namespace']): ?><div class="namespace-<?php echo $this->_tpl_vars['namespace']; ?>
"><?php endif; ?>

<ul class="select-type<?php if ($this->_tpl_vars['sections'] && count($this->_tpl_vars['sections']) <= 1 || $this->_tpl_vars['single_type']): ?> hide<?php endif; ?>">
    <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sectionsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sectionsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['section']):
        $this->_foreach['sectionsF']['iteration']++;
?><?php echo '<li><label><input '; ?><?php if (($this->_foreach['sectionsF']['iteration'] <= 1)): ?><?php echo 'checked="checked"'; ?><?php endif; ?><?php echo ' type="radio" name="section'; ?><?php if ($this->_tpl_vars['namespace']): ?><?php echo '_'; ?><?php echo $this->_tpl_vars['namespace']; ?><?php echo ''; ?><?php endif; ?><?php echo '" value="'; ?><?php echo $this->_tpl_vars['section']['Key']; ?><?php echo '"> '; ?><?php echo $this->_tpl_vars['section']['name']; ?><?php echo '</label></li>'; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>

<?php if ($this->_tpl_vars['single_type']): ?>
    <?php 
        $single_type = $this -> get_template_vars('single_type');
        $categories = $this -> get_template_vars('categories');

        $sections[0] = array(
            'Key' => $single_type,
            'Categories' => $categories
        );

        $this -> assign_by_ref('sections', $sections);
     ?>
<?php endif; ?>

<ul class="select-category">
    <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sectionsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sectionsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['section']):
        $this->_foreach['sectionsF']['iteration']++;
?><?php echo '<li id="type_section_'; ?><?php echo $this->_tpl_vars['section']['Key']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['namespace']): ?><?php echo '_'; ?><?php echo $this->_tpl_vars['namespace']; ?><?php echo ''; ?><?php endif; ?><?php echo '" class="'; ?><?php if (! ($this->_foreach['sectionsF']['iteration'] <= 1)): ?><?php echo 'hide'; ?><?php endif; ?><?php echo '">'; ?><?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level.tpl') : smarty_modifier_cat($_tmp, 'category_level.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'mode' => $this->_tpl_vars['mode'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php else: ?><?php echo '<div><select disabled="disabled"><option value="">'; ?><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?><?php echo '</option></select></div>'; ?><?php endif; ?><?php echo '</li>'; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>

<div class="form-buttons<?php if ($this->_tpl_vars['mode']): ?> <?php echo $this->_tpl_vars['mode']; ?>
<?php endif; ?>">
    <a href="javascript:void(0)" class="button disabled"><?php if ($this->_tpl_vars['button']): ?><?php echo $this->_tpl_vars['button']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['next']; ?>
<?php endif; ?></a>
    <a class="cancel" href="javascript:void(0)" onclick="$(this).closest('div.block').parent().slideUp();"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
</div>

<?php if ($this->_tpl_vars['namespace']): ?></div><?php endif; ?>

<script>flynax.treeLoadLevel('', '<?php echo $this->_tpl_vars['callback']; ?>
', '', '<?php echo $this->_tpl_vars['namespace']; ?>
', '<?php echo $this->_tpl_vars['mode']; ?>
');</script>

<!-- category selector end -->