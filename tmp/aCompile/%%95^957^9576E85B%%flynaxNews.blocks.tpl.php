<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:54
         compiled from blocks/flynaxNews.blocks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'blocks/flynaxNews.blocks.tpl', 8, false),array('modifier', 'strip_tags', 'blocks/flynaxNews.blocks.tpl', 15, false),array('modifier', 'truncate', 'blocks/flynaxNews.blocks.tpl', 15, false),array('modifier', 'strlen', 'blocks/flynaxNews.blocks.tpl', 15, false),)), $this); ?>
<!-- flynax news DOM -->

<?php if ($this->_tpl_vars['rss_content']): ?>
    <table class="sTable">
    <?php $_from = $this->_tpl_vars['rss_content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rss']):
?>
    <tr>
        <td class="list-date">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['rss']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d') : smarty_modifier_date_format($_tmp, '%d')); ?>

            <div><?php echo ((is_array($_tmp=$this->_tpl_vars['rss']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b') : smarty_modifier_date_format($_tmp, '%b')); ?>
</div>
        </td>
            
        <td class="list-body">
            <a target="_blank" class="green_14" href="<?php echo $this->_tpl_vars['rss']['link']; ?>
" title="<?php echo $this->_tpl_vars['rss']['title']; ?>
"><?php echo $this->_tpl_vars['rss']['title']; ?>
</a>
            <div class="grey_13">
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rss']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, '140', false) : smarty_modifier_truncate($_tmp, '140', false)); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['rss']['description'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 140): ?>...<?php endif; ?>
            </div>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
<?php else: ?>
    <div class="box-center purple_13"><?php echo $this->_tpl_vars['lang']['flynax_connect_fail']; ?>
</div>
<?php endif; ?>

<!-- flynax news DOM end -->