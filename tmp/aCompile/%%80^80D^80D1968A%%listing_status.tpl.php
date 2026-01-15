<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:46
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/listing_status.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/listing_status.tpl', 39, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/listing_status.tpl', 84, false),array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/listing_status.tpl', 128, false),array('modifier', 'ceil', '/home/gmoplus/global.gmoplus.com/plugins/listing_status/admin/listing_status.tpl', 130, false),)), $this); ?>
<!-- listings status -->
<style type="text/css">
<?php echo '
    .status_box{
        position: relative;
        float: left;
    }
    .status
    {
        border: 2px solid #D0D0D0;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
    }
'; ?>

</style>
<!-- navigation bar -->
<div id="nav_bar">
    <?php if ($_GET['module']): ?>
        <?php if (! isset ( $_GET['action'] )): ?>
            <a href="javascript:void(0)" onclick="show('filters', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['filters']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&module=verify_photos" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['ls_verify_photo_request']; ?>
</span><span class="right"></span></a>
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['ls_block_list']; ?>
</span><span class="right"></span></a>
    <?php else: ?>
        <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['action'] != 'add'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['ls_add_label']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['config']['ls_verify_module']): ?>
           <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&module=verify_photos" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['ls_verify_photo_request']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['ls_block_list']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<?php $this->assign('lsPath', ((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing_status') : smarty_modifier_cat($_tmp, 'listing_status')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null)))); ?>
<?php if (isset ( $_GET['module'] )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lsPath'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'verify_photos.tpl') : smarty_modifier_cat($_tmp, 'verify_photos.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>

    <?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

    <?php $this->assign('sPost', $_POST); ?>

        <!-- add new/edit block -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;block=<?php echo $_GET['block']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="submit" value="1" />

                <?php if ($_GET['action'] == 'edit'): ?>
                    <input type="hidden" name="fromPost" value="1" />
                    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['sPost']['id']; ?>
" />
                <?php endif; ?>
                <table class="form">
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['ls_type']; ?>
</td>
                    <td class="field">
                        <select name="watermark_type">
                            <option value="image" <?php if ($this->_tpl_vars['sPost']['watermark_type'] == 'image'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_image']; ?>
</option>
                            <option value="text" <?php if ($this->_tpl_vars['sPost']['watermark_type'] == 'text'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['type_text']; ?>
</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['position']; ?>
</td>
                    <td class="field">
                        <select name="position">
                            <option value="1" <?php if ($this->_tpl_vars['sPost']['position'] == '1'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_position_1']; ?>
</option>
                            <option value="2" <?php if ($this->_tpl_vars['sPost']['position'] == '2'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_position_2']; ?>
</option>
                            <option value="3" <?php if ($this->_tpl_vars['sPost']['position'] == '3' || ! $this->_tpl_vars['sPost']['position']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_position_3']; ?>
</option>
                            <option value="4" <?php if ($this->_tpl_vars['sPost']['position'] == '4'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_position_4']; ?>
</option>
                        </select>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['ls_warning_position']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name">
                        <span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>

                    </td>
                    <td class="field" style="padding:15px 0">
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <ul class="tabs">
                                <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['language']['name']; ?>
</li>
                                <?php endforeach; endif; unset($_from); ?>
                            </ul>
                        <?php endif; ?>

                        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                            <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" <?php if ($this->_tpl_vars['language']['Code'] == $this->_tpl_vars['config']['lang']): ?>required<?php endif; ?> maxlength="350" />

                            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                                <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                            <?php endif; ?>

                            <div class="watermark_box">
                                <div style="margin: 5px 0 0;" id="watermark_<?php echo $this->_tpl_vars['language']['Code']; ?>
">
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing_status') : smarty_modifier_cat($_tmp, 'listing_status')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'watermark.tpl') : smarty_modifier_cat($_tmp, 'watermark.tpl')), 'smarty_include_vars' => array('watermark' => $this->_tpl_vars['sPost']['watermark'][$this->_tpl_vars['language']['Code']],'code' => $this->_tpl_vars['language']['Code'],'large' => '0')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                </div>
                                <div class="clear"></div>
                                <div style="margin: 5px 0 0;" id="watermarkLarge_<?php echo $this->_tpl_vars['language']['Code']; ?>
">
                                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listing_status') : smarty_modifier_cat($_tmp, 'listing_status')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'watermark.tpl') : smarty_modifier_cat($_tmp, 'watermark.tpl')), 'smarty_include_vars' => array('watermark' => $this->_tpl_vars['sPost']['watermarkLarge'][$this->_tpl_vars['language']['Code']],'code' => $this->_tpl_vars['language']['Code'],'large' => '1')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>

                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
                    <td class="field">
                        <fieldset class="light">
                            <legend id="fieldset_type" onclick="fieldset_action('type');" class="up"><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</legend>
                            <div id="type">
                                <table id="list_rt">
                                    <tr>
                                        <td valign="top">
                                        <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['listing_type']):
        $this->_foreach['typeF']['iteration']++;
?>
                                        <div style="padding: 2px 8px;">
                                            <input class="checkbox" <?php if ($this->_tpl_vars['sPost']['type'] && ((is_array($_tmp=$this->_tpl_vars['listing_type']['Type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['type']) : in_array($_tmp, $this->_tpl_vars['sPost']['type']))): ?>checked="checked"<?php endif; ?> id="type_<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
" type="checkbox" name="type[<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
]" value="<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
" /> <label class="cLabel" for="type_<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
"><?php echo $this->_tpl_vars['listing_type']['name']; ?>
</label>
                                        </div>
                                        <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['typeF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                        <?php if ($this->_foreach['typeF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                            </td>
                                            <td valign="top">
                                        <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                        </td>
                                    </tr>
                                </table>
                                <div class="grey_area" style="margin: 0 0 5px;">
                                    <span>
                                        <span onclick="$('#list_rt input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                        <span class="divider"> | </span>
                                        <span onclick="$('#list_rt input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                    </td>
                </tr>

                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['ls_substatus']; ?>
</td>
                    <td class="field">
                        <select name="delete">
                            <option value="0" <?php if (empty ( $this->_tpl_vars['sPost']['delete'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_unchanged']; ?>
</option>
                            <option value="delete" <?php if ($this->_tpl_vars['sPost']['delete'] == 'delete'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_removal']; ?>
</option>
                            <option value="disabled" <?php if ($this->_tpl_vars['sPost']['delete'] == 'disabled'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_suspension']; ?>
</option>
                        </select>
                        <span class="field_description"><span style="display: inline-flex;"><?php echo $this->_tpl_vars['lang']['ls_label_hint']; ?>
</span></span>
                    </td>
                </tr>
                </table>

                <div id="show_days">
                    <table class="form">
                    <tr>
                        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['days']; ?>
</td>
                        <td class="field">
                            <input type="text" class="numeric" name="days" value="<?php echo $this->_tpl_vars['sPost']['days']; ?>
" maxlength="10" style="width: 139px;" />
                            <span class="field_description"><?php echo $this->_tpl_vars['lang']['ls_delete_days_hint']; ?>
</span>
                        </td>
                    </tr>
                    </table>
                </div>

                <table class="form">
                <tr <?php if ($_GET['action'] == 'edit'): ?>style="display: none;"<?php endif; ?>>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['admin_only']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['sPost']['label_type'] == 'admin'): ?> checked="checked"<?php endif; ?> class="lang_add" type="radio" name="label_type" value="admin" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if ($this->_tpl_vars['sPost']['label_type'] == 'user' || ! $this->_tpl_vars['sPost']['label_type']): ?>checked="checked"<?php endif; ?> class="lang_add" type="radio" name="label_type" value="user" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        <label style="display: none;"><input <?php if ($this->_tpl_vars['sPost']['label_type'] == 'verify'): ?> checked="checked"<?php endif; ?> class="lang_add" type="radio" name="label_type" value="verify" /> <?php echo $this->_tpl_vars['lang']['verify']; ?>
</label>
                    </td>
                </tr>
                <tr <?php if ($this->_tpl_vars['sPost']['label_type'] == 'verify'): ?>class="hide"<?php endif; ?>>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['ls_use_block']; ?>
</td>
                    <td class="field">
                        <?php if ($this->_tpl_vars['sPost']['used_block'] == '1'): ?>
                            <?php $this->assign('use_block_yes', 'checked="checked"'); ?>
                            <?php $this->assign('use_block', '1'); ?>
                        <?php elseif ($this->_tpl_vars['sPost']['used_block'] == '0'): ?>
                            <?php $this->assign('use_block_no', 'checked="checked"'); ?>
                            <?php $this->assign('use_block', '0'); ?>
                        <?php else: ?>
                            <?php $this->assign('use_block_yes', 'checked="checked"'); ?>
                            <?php $this->assign('use_block', '1'); ?>
                        <?php endif; ?>
                        <label><input <?php echo $this->_tpl_vars['use_block_yes']; ?>
 class="lang_add" type="radio" name="used_block" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php echo $this->_tpl_vars['use_block_no']; ?>
 class="lang_add" type="radio" name="used_block" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['ls_use_block_info']; ?>
</span>
                    </td>
                </tr>
                </table>

                <div id="aditional_block" <?php if ($this->_tpl_vars['use_block'] == 0): ?>class="hide"<?php endif; ?>>

                <table class="form" >
                    <tr>
                        <td class="name">
                            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['ls_block_settings']; ?>

                        </td>
                        <td>
                            <fieldset class="light">
                            <legend id="legend_settings" class="up" onclick="fieldset_action('settings');">Settings</legend>
                                <div id="settings" >
                                    <table class="form" >
                                        <tr>
                                            <td class="name">
                                                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['ls_block_name']; ?>

                                            </td>
                                            <td>
                                                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                                                    <ul class="tabs">
                                                        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                                        <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['language']['name']; ?>
</li>
                                                        <?php endforeach; endif; unset($_from); ?>
                                                    </ul>
                                                <?php endif; ?>

                                                <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                                                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                                                    <input type="text" name="block_name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['block_name'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350" />

                                                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                                                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_number']; ?>
</td>
                                            <td class="field">
                                                <input type="text" class="numeric" name="count" value="<?php if ($this->_tpl_vars['sPost']['count']): ?><?php echo $this->_tpl_vars['sPost']['count']; ?>
<?php else: ?>3<?php endif; ?>" maxlength="2" style="width: 139px;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['order_type']; ?>
</td>
                                            <td class="field">
                                                <select name="order">
                                                    <option value="latest" <?php if ('latest' == $this->_tpl_vars['sPost']['order']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_latest']; ?>
</option>
                                                    <option value="random" <?php if ('random' == $this->_tpl_vars['sPost']['order']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['ls_random']; ?>
</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['block_side']; ?>
</td>
                                            <td class="field">
                                                <select name="side">
                                                    <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                                    <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
                                                    <option value="<?php echo $this->_tpl_vars['sKey']; ?>
" <?php if ($this->_tpl_vars['sKey'] == $this->_tpl_vars['sPost']['side']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['block_side']; ?>
</option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['lang']['show_on_pages']; ?>
</td>
                                            <td class="field" id="pages_obj">
                                                <fieldset class="light">
                                                    <?php $this->assign('pages_phrase', 'admin_controllers+name+pages'); ?>
                                                    <legend id="legend_pages" class="up"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['pages_phrase']]; ?>
</legend>
                                                    <div id="pages">
                                                        <div id="pages_cont" <?php if (! empty ( $this->_tpl_vars['sPost']['show_on_all'] )): ?>style="display: none;"<?php endif; ?>>
                                                            <?php $this->assign('bPages', $this->_tpl_vars['sPost']['pages']); ?>
                                                            <table class="sTable" style="margin-bottom: 15px;">
                                                            <tr>
                                                                <td valign="top">
                                                                <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pagesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pagesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['pagesF']['iteration']++;
?>
                                                                <?php $this->assign('pId', $this->_tpl_vars['page']['ID']); ?>
                                                                <div style="padding: 2px 8px;">
                                                                    <input class="checkbox" <?php if (isset ( $this->_tpl_vars['bPages'][$this->_tpl_vars['pId']] )): ?>checked="checked"<?php endif; ?> id="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
" type="checkbox" name="pages[<?php echo $this->_tpl_vars['page']['ID']; ?>
]" value="<?php echo $this->_tpl_vars['page']['ID']; ?>
" /> <label class="cLabel" for="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
"><?php echo $this->_tpl_vars['page']['name']; ?>
</label>
                                                                </div>
                                                                <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['pagesF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                                                <?php if ($this->_foreach['pagesF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                                                    </td>
                                                                    <td valign="top">
                                                                <?php endif; ?>
                                                                <?php endforeach; endif; unset($_from); ?>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                        </div>

                                                        <div class="grey_area" style="margin: 0 0 5px;">
                                                            <label><input id="show_on_all" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>checked="checked"<?php endif; ?> type="checkbox" name="show_on_all" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
                                                            <span id="pages_nav" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>class="hide"<?php endif; ?>>
                                                                <span onclick="$('#pages_cont input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                                                <span class="divider"> | </span>
                                                                <span onclick="$('#pages_cont input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <script type="text/javascript">
                                                <?php echo '

                                                $(document).ready(function(){
                                                    $(\'#legend_pages\').click(function(){
                                                        fieldset_action(\'pages\');
                                                    });

                                                    $(\'input#show_on_all\').click(function(){
                                                        $(\'#pages_cont\').slideToggle();
                                                        $(\'#pages_nav\').fadeToggle();
                                                    });

                                                    $(\'#pages input\').click(function(){
                                                        if ( $(\'#pages input:checked\').length > 0 )
                                                        {
                                                            //$(\'#show_on_all\').prop(\'checked\', false);
                                                        }
                                                    });
                                                });

                                                '; ?>

                                                </script>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['lang']['show_in_categories']; ?>
</td>
                                            <td class="field">
                                                <fieldset class="light">
                                                    <legend id="legend_cats" class="up" onclick="fieldset_action('cats');"><?php echo $this->_tpl_vars['lang']['categories']; ?>
</legend>
                                                    <div id="cats">

                                                        <div id="cat_checkboxed" style="margin: 0 0 8px;<?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>display: none<?php endif; ?>">
                                                            <div class="tree">
                                                                <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
                                                                    <fieldset class="light">
                                                                        <legend id="legend_section_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('section_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                                                                        <div id="section_<?php echo $this->_tpl_vars['section']['ID']; ?>
">
                                                                            <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                                                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level_checkbox.tpl') : smarty_modifier_cat($_tmp, 'category_level_checkbox.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true)));
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

                                                            <div style="padding: 0 0 6px 37px;">
                                                                <label><input <?php if (! empty ( $this->_tpl_vars['sPost']['subcategories'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="subcategories" value="1" /> <?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
                                                            </div>
                                                        </div>

                                                        <script type="text/javascript">
                                                        var tree_selected = <?php if ($_POST['categories']): ?>[<?php $_from = $_POST['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postcatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postcatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['post_cat']):
        $this->_foreach['postcatF']['iteration']++;
?>['<?php echo $this->_tpl_vars['post_cat']; ?>
']<?php if (! ($this->_foreach['postcatF']['iteration'] == $this->_foreach['postcatF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
                                                        var tree_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>['<?php echo $this->_tpl_vars['parent_point']; ?>
']<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
                                                        <?php echo '

                                                        $(document).ready(function(){
                                                            flynax.treeLoadLevel(\'checkbox\', \'flynax.openTree(tree_selected, tree_parentPoints)\', \'div#cat_checkboxed\');
                                                            flynax.openTree(tree_selected, tree_parentPoints);

                                                            $(\'input[name=cat_sticky]\').click(function(){
                                                                $(\'#cat_checkboxed\').slideToggle();
                                                                $(\'#cats_nav\').fadeToggle();
                                                            });
                                                        });

                                                        '; ?>

                                                        </script>

                                                        <div class="grey_area">
                                                            <label><input class="checkbox" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>checked="checked"<?php endif; ?> type="checkbox" name="cat_sticky" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
                                                            <span id="cats_nav" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>class="hide"<?php endif; ?>>
                                                                <span onclick="$('#cat_checkboxed div.tree input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                                                <span class="divider"> | </span>
                                                                <span onclick="$('#cat_checkboxed div.tree input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </fieldset>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['lang']['use_block_design']; ?>
</td>
                                            <td class="field">
                                                <?php if ($this->_tpl_vars['sPost']['tpl'] == '1'): ?>
                                                    <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                                                <?php elseif ($this->_tpl_vars['sPost']['tpl'] == '0'): ?>
                                                    <?php $this->assign('tpl_no', 'checked="checked"'); ?>
                                                <?php else: ?>
                                                    <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                                                <?php endif; ?>
                                                <label><input <?php echo $this->_tpl_vars['tpl_yes']; ?>
 class="lang_add" type="radio" name="tpl" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                                <label><input <?php echo $this->_tpl_vars['tpl_no']; ?>
 class="lang_add" type="radio" name="tpl" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['ls_status_block']; ?>
</td>
                                            <td class="field">
                                                <select name="block_status">
                                                    <option value="active" <?php if ($this->_tpl_vars['sPost']['block_status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                                                    <option value="approval" <?php if ($this->_tpl_vars['sPost']['block_status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                </table>
                </div>
                <table class="form" >
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                    <td class="field">
                        <select name="status">
                            <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                            <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="field">
                        <input type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['add']; ?>
<?php endif; ?>" />
                    </td>
                </tr>
                </table>
            </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!-- add new block end -->

        <!-- select category action -->
        <script type="text/javascript">
        var lb_method = "<?php echo $_GET['action']; ?>
";
        var lb_checker = false;
        lang['ls_change_on_inactive'] = "<?php echo $this->_tpl_vars['lang']['ls_change_on_inactive']; ?>
";
        <?php echo '
        function cat_chooser(cat_id){
            return true;
        }
        '; ?>


        <?php if ($_POST['parent_id']): ?>
            cat_chooser('<?php echo $_POST['parent_id']; ?>
');
        <?php elseif ($_GET['parent_id']): ?>
            cat_chooser('<?php echo $_GET['parent_id']; ?>
');
        <?php endif; ?>

        </script>
        <!-- select category action end -->

        <script type="text/javascript">
        var objWatermark = false;
        <?php echo '
            $(document).ready(function(){
                $(\'select[name=status]\').change(function(){
                    statusMethodHandler($(this).val());
                });

                $(\'select[name=delete]\').change(function(){
                    delMethodHandler();
                });
                delMethodHandler();

                $(\'input[name=used_block]\').change(function(){
                    aditionalBlockHandler();
                });

                $(\'select[name=watermark_type]\').change(function(){
                    typeMethodHandler();
                });
                typeMethodHandler();

                $(\'body\').on(\'click\', \'.delete_item\', function(){
                    objWatermark = $(this);
                    rlConfirm(\''; ?>
<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
<?php echo '\', \'deleteWatermark\');
                });

            });

            var deleteWatermark = function(){
                var data = {
                    item      : \'deleteWatermark\',
                    key       : objWatermark.data(\'key\'),
                    code      : objWatermark.data(\'code\'),
                    watermark : objWatermark.data(\'watermark\'),
                    large     : objWatermark.data(\'large\') ? 1 : 0,
                };

                $.getJSON(rlConfig[\'ajax_url\'], data, function(response) {
                    if(response) {
                        if (response.status == \'ok\') {
                            var large  =  data[\'large\'] ? "Large" : "";
                            var itemId = "#watermark" + large +"_" + data[\'code\'];

                            $(itemId).empty();
                            $(itemId).html(response.html);

                            printMessage(\'notice\', response.message);
                        }
                        else {
                            printMessage(\'error\', response.message);
                        }
                    }
                });
            }

            var typeMethodHandler = function(){
                var visible = $(\'select[name=watermark_type] option:selected\').val() != \'text\' ? 1 : 0;
                $(\'.watermark_box\')[visible == 0 ? \'hide\' : \'show\']();
                return;
            };

            var statusMethodHandler = function(val){
                if(lb_method == \'edit\' && val != \'active\' && !lb_checker) {
                    printMessage(\'alert\', lang[\'ls_change_on_inactive\']);
                    lb_checker = true;
                }
                return;
            };

            var delMethodHandler = function(){
                var visible = $(\'select[name=delete] option:selected\').val() != \'0\' ? 1 : 0;
                $(\'#show_days\')[visible == 0 ? \'slideUp\' : \'slideDown\']();
                return;
            };
            var aditionalBlockHandler = function(){
                var enabled = parseInt( $(\'input[name=used_block]:checked\').val() ) ? 1 : 0;
                $(\'#aditional_block\')[enabled == 0 ? \'slideUp\' : \'slideDown\']();
                return;
            };
        '; ?>

        </script>

        <!-- additional JS -->
        <?php if ($this->_tpl_vars['sPost']['type']): ?>
        <script type="text/javascript">
        <?php echo '
        $(document).ready(function(){
            block_banner(\'btype_'; ?>
<?php echo $this->_tpl_vars['sPost']['type']; ?>
<?php echo '\', \'#btypes div\');
        });

        '; ?>

        </script>
        <?php endif; ?>
        <!-- additional JS end -->
    <?php else: ?>
        <div id="gridListingStatus"></div>
        <script type="text/javascript">//<![CDATA[
        lang['listing_number'] = "<?php echo $this->_tpl_vars['lang']['listing_number']; ?>
";
        var ListingStatus;

        <?php echo '
        $(document).ready(function(){

            ListingStatus = new gridObj({
                key: \'listing_status\',
                id: \'gridListingStatus\',
                ajaxUrl: rlPlugins + \'listing_status/admin/listing_status.inc.php?q=ext\',
                defaultSortField: \'ID\',
                title: lang[\'ext_manager\'],
                fields: [
                    {name: \'ID\', mapping: \'ID\'},
                    {name: \'name\', mapping: \'name\'},
                    {name: \'Days\', mapping: \'Days\'},
                    {name: \'Count\', mapping: \'Count\'},
                    {name: \'Label_type\', mapping: \'Label_type\'},
                    {name: \'Delete\', mapping: \'Delete\'},
                    {name: \'Status\', mapping: \'Status\'}
                ],
                columns: [
                    {
                        header: lang[\'ext_id\'],
                        dataIndex: \'ID\',
                        width: 35,
                        fixed: true
                    },{
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        width: 100
                    },{
                        header: lang[\'ext_days\'],
                        dataIndex: \'Days\',
                        width: 100,
                        fixed: true,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            maxValue: 365,
                            minValue: 0
                        }),
                        renderer: function(val,col,row){
                            if (row.data.Label_type == \'verify\' && row.data.Delete ==\'simple\') {
                                val = 0;
                            }
                            val = val == 0 ? \''; ?>
<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
<?php echo '\' : val;

                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },{
                        header: lang[\'listing_number\'],
                        dataIndex: \'Count\',
                        width: 130,
                        fixed: true,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            maxValue: 30,
                            minValue: 1
                        }),
                        renderer: function(val,col,row){
                            if (row.data.Label_type == \'verify\') {
                                val = lang[\'ext_not_available\'];
                            }
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 100,
                        fixed: true,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'active\', lang[\'ext_active\']],
                                [\'approval\', lang[\'ext_approval\']]
                            ],
                            mode: \'local\',
                            typeAhead: true,
                            triggerAction: \'all\',
                            selectOnFocus: true,
                            listeners: {
                                beforeselect: function(combo, record){
                                    var index = combo.gridEditor.row;
                                    var row = ListingStatus.grid.store.data.items[index];

                                    if (record.data.field1 == \'approval\' && record.data.field2 != row.data.Status ) {
                                        Ext.MessageBox.confirm(lang[\'warning\'], \''; ?>
<?php echo $this->_tpl_vars['lang']['ls_confirm_change_status']; ?>
<?php echo '\', function(btn) {

                                            if (btn == \'yes\') {
                                               $.getJSON(rlConfig[\'ajax_url\'], {item: \'changeSubStatus\', id: row.data.ID, status: record.data.field1}, function(response) {
                                                    if (response) {
                                                        if (response.status == \'ok\') {
                                                            printMessage(\'alert\', lang[\'lb_disabled_box\']);
                                                            ListingStatus.reload();
                                                        } else {
                                                            printMessage(\'error\', lang[\'ext_error_saving_changes\']);
                                                        }
                                                    }
                                                    else {
                                                        printMessage(\'error\', lang[\'ext_error_saving_changes\']);
                                                    }
                                                });
                                            }
                                        });
                                        return false;
                                    }

                                }
                            }
                        })
                    },{
                        header: lang[\'ext_actions\'],
                        width: 70,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(id) {
                            var out = "<center>";
                            var splitter = false;

                                out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&block="+id+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";

                                // delete
                                out += \'<img data-id="\'+id+\'" class="remove" ext:qtip="\' + lang[\'ext_delete\'] + \'"\';
                                out += \'src="\' + rlUrlHome + \'img/blank.gif"  />\';

                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });

            ListingStatus.init();
            grid.push(ListingStatus.grid);
            $(\'#gridListingStatus\').on(\'click\', \'img.remove\', deleteListingsLabel.confirm)

            // prevent of disabling the option for verify fields
            ListingStatus.grid.addListener(\'beforeedit\', function(editEvent){
                if ((editEvent.field == \'Count\' || editEvent.field == \'Days\' && editEvent.record.data.Delete == \'simple\' )
                    && editEvent.record.data.Label_type == \'verify\') {
                    editEvent.cancel = true;
                    ListingStatus.store.rejectChanges();
                }
            });
        });

        var deleteListingsLabelClass = function(){

            this.confirm = function() {
                var id = $(this).data("id");
                rlConfirm(lang[\'ext_notice_delete\'], "deleteListingsLabel.request", id);
            }

            this.request = function(index) {
                $.get(rlConfig["ajax_url"], {item: \'deleteListingsLabel\', id: index}, function (response) {
                    if(response.status == \'ok\') {
                        printMessage(\'notice\', response.message);
                        ListingStatus.init();
                    }
                    else {
                        printMessage(\'error\', response.message);
                    }

                }, \'json\');
            }
        }

        var deleteListingsLabel = new deleteListingsLabelClass();
        '; ?>

        //]]>
        </script>
    <?php endif; ?>
<?php endif; ?>
<!-- listings status end -->