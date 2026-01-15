<?php /* Smarty version 2.6.31, created on 2025-09-18 13:19:25
         compiled from blocks/flynaxPluginsBrowse.block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'blocks/flynaxPluginsBrowse.block.tpl', 9, false),array('modifier', 'lower', 'blocks/flynaxPluginsBrowse.block.tpl', 15, false),array('modifier', 'version_compare', 'blocks/flynaxPluginsBrowse.block.tpl', 19, false),)), $this); ?>
<!-- browse plugins block tpl -->

<ul class="browse_plugins">
<?php $_from = $this->_tpl_vars['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
    <li>
        <table class="sTable">
        <tr>
            <td class="list-date">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d') : smarty_modifier_date_format($_tmp, '%d')); ?>

                <div><?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b') : smarty_modifier_date_format($_tmp, '%b')); ?>
</div>
            </td>
                
            <td class="list-body">
                <div class="changelog_item">
                    <a target="_blank" class="green_14" href="https://www.flynax.com/plugins/<?php echo ((is_array($_tmp=$this->_tpl_vars['plugin']['path'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.html" title="<?php echo $this->_tpl_vars['lang']['learn_more_about']; ?>
 <?php echo $this->_tpl_vars['log_item']['name']; ?>
"><?php echo $this->_tpl_vars['plugin']['name']; ?>
</a>
                    <span class="dark_13" style="padding: 0 0 0 10px;"><?php echo $this->_tpl_vars['plugin']['version']; ?>
</span> 
                    
                    <div>
                        <?php if (isset ( $this->_tpl_vars['plugin']['compatible'] ) && ((is_array($_tmp=$this->_tpl_vars['plugin']['compatible'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, $this->_tpl_vars['config']['rl_version']) : version_compare($_tmp, $this->_tpl_vars['config']['rl_version'])) > 0): ?>
                            <span class="not-compatible"><?php echo $this->_tpl_vars['lang']['plugin_not_compatible']; ?>
</span>
                        <?php else: ?>
                            <?php if ($this->_tpl_vars['plugin']['paid']): ?>
                                <a title="<?php echo $this->_tpl_vars['lang']['buy_plugin_title']; ?>
" name="<?php echo $this->_tpl_vars['plugin']['key']; ?>
" href="javascript:void(0)" class="buy_icon"><?php echo $this->_tpl_vars['lang']['buy_plugin']; ?>
</a>
                            <?php else: ?>
                                <a name="<?php echo $this->_tpl_vars['plugin']['key']; ?>
" href="javascript:void(0)" class="install_icon remote_install"><span></span><?php echo $this->_tpl_vars['lang']['install']; ?>
</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
        </table>
    </li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<div class="clear"></div>

<!-- browse plugins block tpl end -->