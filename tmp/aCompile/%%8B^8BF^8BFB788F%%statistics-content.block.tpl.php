<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:54
         compiled from /home/gmoplus/global.gmoplus.com/admin/tpl/blocks/statistics-content.block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/admin/tpl/blocks/statistics-content.block.tpl', 54, false),)), $this); ?>
<!-- Statistics-box content block tpl -->

<?php $this->assign('allow_listings', true); ?>
<?php $this->assign('allow_custom_categories', true); ?>
<?php $this->assign('allow_accounts', true); ?>
<?php $this->assign('allow_messages', true); ?>
<?php $this->assign('aRights', $_SESSION['sessAdmin']['rights']); ?>

<?php if ($_SESSION['sessAdmin']['type'] == 'limited'): ?>
    <?php if (! $this->_tpl_vars['aRights']['listings']): ?>
        <?php $this->assign('allow_listings', false); ?>
    <?php endif; ?>

    <?php if (! $this->_tpl_vars['aRights']['custom_categories']): ?>
        <?php $this->assign('allow_custom_categories', false); ?>
    <?php endif; ?>

    <?php if (! $this->_tpl_vars['aRights']['all_accounts']): ?>
        <?php $this->assign('allow_accounts', false); ?>
    <?php endif; ?>

    <?php if (! $this->_tpl_vars['aRights']['contacts']): ?>
        <?php $this->assign('allow_messages', false); ?>
    <?php endif; ?>
<?php endif; ?>

<table class="fixed">
<tr>
    <?php if ($this->_tpl_vars['allow_listings'] || $this->_tpl_vars['allow_custom_categories']): ?>
        <td>
            <?php if ($this->_tpl_vars['allow_listings']): ?>
                <table class="stat listings">
                    <tr class="header">
                        <td colspan="3"><?php echo $this->_tpl_vars['statistics']['listings']['name']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color total" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=listings"><?php echo $this->_tpl_vars['lang']['total']; ?>
</a>
                            </div>
                        </td>
                        <td class="counter">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=listings"><?php echo $this->_tpl_vars['statistics']['listings']['total']; ?>
</a>
                        </td>
                    </tr>
                    <?php $this->assign('replace_days', ('{')."days".('}')); ?>
                    <?php $_from = $this->_tpl_vars['statistics']['listings']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stat_key'] => $this->_tpl_vars['count']):
?>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color <?php echo $this->_tpl_vars['stat_key']; ?>
" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=listings&status=<?php echo $this->_tpl_vars['stat_key']; ?>
"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['stat_key']]; ?>
</a>
                                <?php if ($this->_tpl_vars['stat_key'] == 'new'): ?><span> | <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['over_days'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_days'], $this->_tpl_vars['config']['new_period']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_days'], $this->_tpl_vars['config']['new_period'])); ?>
</span><?php endif; ?>
                            </div>
                        </td>
                        <td class="counter">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=listings&status=<?php echo $this->_tpl_vars['stat_key']; ?>
"><?php if ($this->_tpl_vars['count']): ?><?php echo $this->_tpl_vars['count']; ?>
<?php else: ?>0<?php endif; ?></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['allow_custom_categories']): ?>
                <table class="stat">
                <tr class="header">
                    <td colspan="3"><?php echo $this->_tpl_vars['statistics']['categories']['name']; ?>
</td>
                </tr>
                <tr>
                    <td class="line">
                        <div>
                            <img class="color new" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=custom_categories"><?php echo $this->_tpl_vars['lang']['new']; ?>
</a>
                        </div>
                    </td>
                    <td class="counter">
                        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=custom_categories"><?php echo $this->_tpl_vars['statistics']['categories']['new']; ?>
</a>
                    </td>
                </tr>
                </table>
            <?php endif; ?>
        </td>
        <td class="divider"></td>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['allow_accounts'] || $this->_tpl_vars['allow_messages']): ?>
        <td>
            <?php if ($this->_tpl_vars['allow_accounts']): ?>
                <table class="stat">
                    <tr class="header">
                        <td colspan="3"><?php echo $this->_tpl_vars['statistics']['accounts']['name']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color total" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts"><?php echo $this->_tpl_vars['lang']['total']; ?>
</a>
                            </div>
                        </td>
                        <td class="counter">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts"><?php echo $this->_tpl_vars['statistics']['accounts']['total']; ?>
</a>
                        </td>
                    </tr>
                    <?php $this->assign('replace_days', ('{')."days".('}')); ?>
                    <?php $_from = $this->_tpl_vars['statistics']['accounts']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stat_key'] => $this->_tpl_vars['count']):
?>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color <?php echo $this->_tpl_vars['stat_key']; ?>
" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&status=<?php echo $this->_tpl_vars['stat_key']; ?>
"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['stat_key']]; ?>
</a>
                                <?php if ($this->_tpl_vars['stat_key'] == 'new'): ?><span> | <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['over_days'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_days'], $this->_tpl_vars['config']['new_period']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_days'], $this->_tpl_vars['config']['new_period'])); ?>
</span><?php endif; ?>
                            </div>
                        </td>
                        <td class="counter <?php echo $this->_tpl_vars['stat_key']; ?>
">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&status=<?php echo $this->_tpl_vars['stat_key']; ?>
"><?php if ($this->_tpl_vars['count']): ?><?php echo $this->_tpl_vars['count']; ?>
<?php else: ?>0<?php endif; ?></a>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['allow_messages']): ?>
                <table class="stat">
                    <tr class="header">
                        <td colspan="3"><?php echo $this->_tpl_vars['statistics']['contacts']['name']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color total" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=contacts"><?php echo $this->_tpl_vars['lang']['total']; ?>
</a>
                            </div>
                        </td>
                        <td class="counter">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=contacts"><?php echo $this->_tpl_vars['statistics']['contacts']['total']; ?>
</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="line">
                            <div>
                                <img class="color new" src="<?php echo $this->_tpl_vars['rlBase']; ?>
img/blank.gif" alt="" />
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=contacts&status=new"><?php echo $this->_tpl_vars['lang']['new']; ?>
</a>
                            </div>
                        </td>
                        <td class="counter">
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=contacts&status=new"><?php if ($this->_tpl_vars['statistics']['contacts']['new']): ?><?php echo $this->_tpl_vars['statistics']['contacts']['new']; ?>
<?php else: ?>0<?php endif; ?></a>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
        </td>
    <?php endif; ?>
</tr>
</table>

<?php if ($this->_tpl_vars['plugin_statistics']): ?>
    <table class="fixed">
    <tr>
        <?php $_from = $this->_tpl_vars['plugin_statistics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['plg_statF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['plg_statF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plg_stat']):
        $this->_foreach['plg_statF']['iteration']++;
?>
            <td>
                <table class="stat">
                    <tr class="header">
                        <td colspan="3"><?php echo $this->_tpl_vars['plg_stat']['name']; ?>
</td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['plg_stat']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plg_item']):
?>
                    <tr>
                        <td class="line">
                            <div>
                                <a href="<?php echo $this->_tpl_vars['plg_item']['link']; ?>
"><?php echo $this->_tpl_vars['plg_item']['name']; ?>
</a>
                                <?php if ($this->_tpl_vars['plg_item']['note']): ?><span><?php echo $this->_tpl_vars['plg_item']['note']; ?>
</span><?php endif; ?>
                            </div>
                        </td>
                        <td class="counter"><a href="<?php echo $this->_tpl_vars['plg_item']['link']; ?>
"><?php echo $this->_tpl_vars['plg_item']['count']; ?>
</a></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </td>
            <?php if ($this->_foreach['plg_statF']['iteration']%2 == 0): ?>
                <?php if (! ($this->_foreach['plg_statF']['iteration'] == $this->_foreach['plg_statF']['total'])): ?></tr><tr><?php endif; ?>
            <?php else: ?>
                <td class="divider"></td>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_foreach['plg_statF']['total']%2 != 0): ?>
            <td></td>
        <?php endif; ?>
    </tr>
    </table>
<?php endif; ?>

<!-- Statistics-box content block tpl end -->