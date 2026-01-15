<?php /* Smarty version 2.6.31, created on 2025-08-26 14:27:39
         compiled from blocks/categories/parent_cats_tree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/categories/parent_cats_tree.tpl', 5, false),)), $this); ?>
<!-- parent categories -->

<?php if ($this->_tpl_vars['categories']): ?>
    <div id="section_<?php echo $this->_tpl_vars['type']; ?>
">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_selector.tpl') : smarty_modifier_cat($_tmp, 'category_selector.tpl')), 'smarty_include_vars' => array('single_type' => $this->_tpl_vars['type'],'button' => $this->_tpl_vars['lang']['apply'],'callback' => 'flynax.openTree(tree_selected, tree_parentPoints, 1)')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php endif; ?>

<!-- parent categories end -->