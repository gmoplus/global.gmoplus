<?php /* Smarty version 2.6.31, created on 2025-07-28 09:41:07
         compiled from blocks/m_block_start.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/m_block_start.tpl', 1, false),)), $this); ?>
<?php $this->assign('block_cookies_index', ((is_array($_tmp='ap_blocks_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['key']))); ?>
<?php $this->assign('smarty_cookies', $_COOKIE); ?>

<div class="block<?php if ($this->_tpl_vars['block']['Status'] == 'approval' && $this->_tpl_vars['cKey'] == 'home'): ?> hide<?php endif; ?>"<?php if ($this->_tpl_vars['key']): ?> id="apblock:<?php echo $this->_tpl_vars['key']; ?>
"<?php endif; ?>>
    <table class="header<?php if (! $this->_tpl_vars['block_caption']): ?>_no_caption<?php elseif (! isset ( $this->_tpl_vars['navigation'] )): ?>_light<?php endif; ?>">
    <tr>
        <td class="left"></td>
        <td class="center">
            <?php if (! $this->_tpl_vars['block_caption']): ?>
                <div></div>
            <?php else: ?>
                <?php if (isset ( $this->_tpl_vars['navigation'] )): ?><div class="move<?php if ($this->_tpl_vars['smarty_cookies'][$this->_tpl_vars['block_cookies_index']] == 'hide'): ?> hover<?php endif; ?>"></div><?php endif; ?>
                <?php echo $this->_tpl_vars['block_caption']; ?>

                <?php if (isset ( $this->_tpl_vars['navigation'] )): ?><div class="collapse<?php if ($this->_tpl_vars['smarty_cookies'][$this->_tpl_vars['block_cookies_index']] == 'hide'): ?> collapse_hover<?php endif; ?>"></div><?php endif; ?>
            <?php endif; ?>
        </td>
        <td class="right"></td>
    </tr>
    </table>    
    <div class="outer<?php if ($this->_tpl_vars['smarty_cookies'][$this->_tpl_vars['block_cookies_index']] == 'hide'): ?> hide<?php endif; ?>"<?php if ($this->_tpl_vars['key']): ?> lang="<?php echo $this->_tpl_vars['key']; ?>
"<?php endif; ?>>
        <div class="body<?php if ($this->_tpl_vars['loading']): ?> block_loading<?php endif; ?>" <?php if ($this->_tpl_vars['fixed']): ?>style="height: 190px;overflow-y: auto;"<?php endif; ?>>