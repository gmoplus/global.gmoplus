<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:53
         compiled from blocks/flynaxPluginsLog.blocks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'blocks/flynaxPluginsLog.blocks.tpl', 10, false),array('modifier', 'replace', 'blocks/flynaxPluginsLog.blocks.tpl', 23, false),)), $this); ?>
<!-- flynax plugins log DOM -->

<?php if ($this->_tpl_vars['change_log_content']): ?>
    <table class="sTable">
    <?php $this->assign('update_from', ('{')."from".('}')); ?>
    <?php $this->assign('update_to', ('{')."to".('}')); ?>
    <?php $_from = $this->_tpl_vars['change_log_content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pLog_key'] => $this->_tpl_vars['log_item']):
?>
    <tr>
        <td class="list-date">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['log_item']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d') : smarty_modifier_date_format($_tmp, '%d')); ?>

            <div><?php echo ((is_array($_tmp=$this->_tpl_vars['log_item']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b') : smarty_modifier_date_format($_tmp, '%b')); ?>
</div>
        </td>
            
        <td class="list-body changelog_<?php echo $this->_tpl_vars['log_item']['status']; ?>
">
            <div class="changelog_item" id="pChangelog_<?php echo $this->_tpl_vars['pLog_key']; ?>
">
                <a class="green_14" target="_blank" href="https://www.flynax.com/plugins/<?php echo $this->_tpl_vars['log_item']['path']; ?>
.html#changelog" title="<?php echo $this->_tpl_vars['lang']['learn_more_about']; ?>
 <?php echo $this->_tpl_vars['log_item']['name']; ?>
"><?php echo $this->_tpl_vars['log_item']['name']; ?>
</a>
                <span class="dark_13">&rarr; <?php echo $this->_tpl_vars['log_item']['version']; ?>
</span>
                <?php if ($this->_tpl_vars['log_item']['status'] == 'current'): ?>
                    <span class="gray-border"><?php echo $this->_tpl_vars['lang']['current_version']; ?>
</span>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['log_item']['status'] != 'no'): ?>
                        <?php if ($this->_tpl_vars['log_item']['compatible']): ?>
                            <a <?php if ($this->_tpl_vars['log_item']['status'] == 'update'): ?>title="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['update_from_to'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['update_from'], $this->_tpl_vars['log_item']['current']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['update_from'], $this->_tpl_vars['log_item']['current'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['update_to'], $this->_tpl_vars['log_item']['version']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['update_to'], $this->_tpl_vars['log_item']['version'])); ?>
"<?php endif; ?> name="<?php echo $this->_tpl_vars['log_item']['key']; ?>
" href="javascript:void(0)" class="<?php if ($this->_tpl_vars['log_item']['paid']): ?>buy_icon<?php else: ?><?php echo $this->_tpl_vars['log_item']['status']; ?>
_icon remote_<?php echo $this->_tpl_vars['log_item']['status']; ?>
<?php endif; ?>">
                                <?php if (( $this->_tpl_vars['log_item']['version']['0'] > $this->_tpl_vars['log_item']['current']['0'] ) && $this->_tpl_vars['log_item']['current']['0']): ?>
                                    <?php echo $this->_tpl_vars['lang']['upgrade']; ?>

                                <?php else: ?>
                                    <?php if ($this->_tpl_vars['log_item']['paid']): ?><?php echo $this->_tpl_vars['lang']['buy_plugin']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['log_item']['status']]; ?>
<?php endif; ?>
                                <?php endif; ?>
                            </a>
                        <?php else: ?>
                            <span class="not-compatible"><?php echo $this->_tpl_vars['lang']['plugin_not_compatible']; ?>
</span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="gray-border"><?php echo $this->_tpl_vars['lang']['you_use']; ?>
: <?php echo $this->_tpl_vars['log_item']['current']; ?>
</span>
                    <?php endif; ?>
                <?php endif; ?>
                
                <div class="grey_13">
                    <?php echo $this->_tpl_vars['log_item']['comment']; ?>

                </div>
            </div>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
<?php else: ?>
    <div class="box-center purple_13"><?php echo $this->_tpl_vars['lang']['flynax_connect_fail']; ?>
</div>
<?php endif; ?>

<!-- flynax plugins log DOM end -->