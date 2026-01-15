<?php /* Smarty version 2.6.31, created on 2025-08-20 18:12:45
         compiled from controllers/account_types.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/account_types.tpl', 7, false),array('function', 'fckEditor', 'controllers/account_types.tpl', 96, false),array('modifier', 'cat', 'controllers/account_types.tpl', 44, false),array('modifier', 'count', 'controllers/account_types.tpl', 63, false),array('modifier', 'in_array', 'controllers/account_types.tpl', 168, false),array('modifier', 'replace', 'controllers/account_types.tpl', 173, false),array('modifier', 'regex_replace', 'controllers/account_types.tpl', 188, false),)), $this); ?>
<!-- account types tpl -->

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.caret.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountTypesNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_type']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit'] && $_GET['action'] == 'build'): ?>
        <?php if ($_GET['form'] != 'reg_form'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=account_types&amp;action=build&amp;form=reg_form&amp;key=<?php echo $this->_tpl_vars['category_info']['Key']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['registration_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'search_form'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=account_types&amp;action=build&amp;form=search_form&amp;key=<?php echo $this->_tpl_vars['category_info']['Key']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['search_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'short_form'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=account_types&amp;action=build&amp;form=short_form&amp;key=<?php echo $this->_tpl_vars['category_info']['Key']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['short_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] !== 'grid_form'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=account_types&action=build&form=grid_form&key=<?php echo $this->_tpl_vars['category_info']['Key']; ?>
"
               class="button_bar"
            >
                <span class="left"></span>
                <span class="center_build"><?php echo $this->_tpl_vars['lang']['grid_form']; ?>
</span>
                <span class="right"></span>
            </a>
        <?php endif; ?>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['types_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add/edit new type -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;type=<?php echo $_GET['type']; ?>
<?php endif; ?>" method="post">
    <input type="hidden" name="submit" value="1" />
    <?php if ($_GET['action'] == 'edit'): ?>
        <input type="hidden" name="fromPost" value="1" />
    <?php endif; ?>
    <table class="form">
    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
        <td class="field">
            <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled<?php endif; ?>" name="key" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['key']; ?>
" maxlength="30" />
        </td>
    </tr>

    <tr>
        <td class="name">
            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>

        </td>
        <td class="field">
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
        <td class="name"><?php echo $this->_tpl_vars['lang']['description']; ?>
</td>
        <td class="field ckeditor">
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
                <?php $this->assign('dCode', ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <?php if ($_GET['action'] == 'edit'): ?>
        <?php $_from = $this->_tpl_vars['meta_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['meta_field']):
?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['meta_field']]; ?>
</td>
            <td class="field">
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
                        <?php if ($this->_tpl_vars['meta_field'] == 'account_meta_description'): ?>
                            <textarea cols="50" rows="2" name="<?php echo $this->_tpl_vars['meta_field']; ?>
[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['sPost'][$this->_tpl_vars['meta_field']][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                        <?php else: ?>
                            <input type="text" name="<?php echo $this->_tpl_vars['meta_field']; ?>
[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost'][$this->_tpl_vars['meta_field']][$this->_tpl_vars['language']['Code']]; ?>
" size="80" class="wauto" />
                        <?php endif; ?>
                        <div>
                        <select>
                            <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                                <option value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input type="button" class="add_variable_button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
"/>
                        </div>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['alphabetic_field']; ?>
</td>
        <td class="field">
            <select name="alphabetic_field" <?php if (! $this->_tpl_vars['alphabetic_fields']): ?>class="disabled" disabled="disabled"<?php endif; ?>>
                <option value="" <?php if (! $this->_tpl_vars['sPost']['alphabetic_field']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['username']; ?>
</option>

                <?php $_from = $this->_tpl_vars['alphabetic_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['alphabetic_field_key'] => $this->_tpl_vars['alphabetic_field']):
?>
                    <?php $this->assign('accont_field_name', ((is_array($_tmp='account_fields+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['alphabetic_field_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['alphabetic_field_key']))); ?>
                    <option value="<?php echo $this->_tpl_vars['alphabetic_field_key']; ?>
" <?php if ($this->_tpl_vars['sPost']['alphabetic_field'] == $this->_tpl_vars['alphabetic_field_key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['accont_field_name']]; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>

            <span class="field_description"><?php echo $this->_tpl_vars['lang']['alphabetic_field_desc']; ?>
</span>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['abilities']; ?>
</td>
        <td class="field">
            <fieldset class="light" style="margin-top: 5px;">
                <legend id="legend_account_abb" class="up" onclick="fieldset_action('account_abb');"><?php echo $this->_tpl_vars['lang']['abilities']; ?>
</legend>
                <div id="account_abb">
                    <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                        <?php if ($_GET['action'] == 'edit' && ! $this->_tpl_vars['l_type']['Deny_uncheck_ability']): ?>
                            <input checked="checked" type="hidden" name="abilities[]" value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
" />
                        <?php endif; ?>

                        <div class="option_padding">
                            <?php $this->assign('replace', ('{')."type".('}')); ?>
                            <label>
                                <input <?php if ($this->_tpl_vars['sPost']['abilities'] && ((is_array($_tmp=$this->_tpl_vars['l_type']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['abilities']) : in_array($_tmp, $this->_tpl_vars['sPost']['abilities']))): ?>checked="checked"<?php endif; ?>
                                       type="checkbox"
                                       name="abilities[]"
                                       value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"
                                        <?php if ($_GET['action'] == 'edit' && ! $this->_tpl_vars['l_type']['Deny_uncheck_ability']): ?>class="disabled" disabled="disabled"<?php endif; ?>
                                /> <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['ability_to_add'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['l_type']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['l_type']['name'])); ?>

                            </label>
                        </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php if ($_GET['type'] != 'visitor'): ?>
                        <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <div class="option_padding">
                                    <label><input <?php if ($this->_tpl_vars['sPost']['page']): ?>checked="checked"<?php endif; ?> type="checkbox" name="page" value="1" /> <?php echo $this->_tpl_vars['lang']['account_type_custom_page']; ?>
</label>
                                </div>
                            </td>
                            <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['page']): ?>
                                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=pages&amp;action=edit&amp;page=at_') : smarty_modifier_cat($_tmp, 'index.php?controller=pages&amp;action=edit&amp;page=at_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['type']) : smarty_modifier_cat($_tmp, $_GET['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                                <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['individual_page_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                            <?php endif; ?>
                        </tr>
                        </table>

                        <div class="option_padding">
                            <?php if ($this->_tpl_vars['config']['account_wildcard']): ?>
                                <?php $this->assign('replace', $this->_tpl_vars['lang']['sub_domain']); ?>
                            <?php else: ?>
                                <?php $this->assign('replace', $this->_tpl_vars['lang']['sub_directory']); ?>
                            <?php endif; ?>
                            <?php $this->assign('s_type', ('{')."type".('}')); ?>
                            <label><input <?php if ($this->_tpl_vars['sPost']['own_location']): ?>checked="checked"<?php endif; ?> type="checkbox" name="own_location" value="1" /> <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['account_type_own_location'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['s_type'], $this->_tpl_vars['replace']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['s_type'], $this->_tpl_vars['replace'])); ?>
</label>
                        </div>

                        <div class="option_padding">
                            <?php if (! $this->_tpl_vars['allow_change_quick_registration']): ?>
                                <input type="hidden" name="quick_registration" value="1" />
                            <?php endif; ?>

                            <label><input <?php if ($this->_tpl_vars['sPost']['quick_registration'] || $_GET['action'] == 'add'): ?>checked="checked"<?php endif; ?> type="checkbox" name="quick_registration" value="1" <?php if ($_GET['action'] == 'edit' && ! $this->_tpl_vars['allow_change_quick_registration']): ?>class="disabled" disabled="disabled"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['atype_quick_registration_option']; ?>
</label>
                        </div>

                        <div class="option_padding">
                            <label<?php if ($this->_tpl_vars['sPost']['agent'] || $this->_tpl_vars['config']['membership_module'] || ( isset ( $this->_tpl_vars['sPost']['isAllowDisableAgency'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgency'] === false )): ?> class="disabled"<?php endif; ?>
                            >
                                <input checked="checked" type="hidden" name="agency" value="<?php echo $this->_tpl_vars['sPost']['agency']; ?>
" />
                                <input <?php if ($this->_tpl_vars['sPost']['agency'] && ! $this->_tpl_vars['config']['membership_module']): ?>checked="checked"<?php endif; ?>
                                       <?php if ($this->_tpl_vars['sPost']['agent'] || $this->_tpl_vars['config']['membership_module'] || ( isset ( $this->_tpl_vars['sPost']['isAllowDisableAgency'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgency'] === false )): ?>disabled="disabled" class="disabled"<?php endif; ?>
                                       type="checkbox"
                                       name="agency"
                                       value="1"
                                />&nbsp;<?php echo $this->_tpl_vars['lang']['atype_agency_option']; ?>

                            </label>

                            <?php if ($this->_tpl_vars['config']['membership_module']): ?>
                                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=membership_services">$1</a>') : smarty_modifier_cat($_tmp, 'index.php?controller=membership_services">$1</a>'))); ?>
                                <span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['atype_agency_option_membership'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span>
                            <?php endif; ?>
                        </div>

                        <div class="option_padding">
                            <label<?php if ($this->_tpl_vars['sPost']['agency'] && ! $this->_tpl_vars['config']['membership_module'] || ( isset ( $this->_tpl_vars['sPost']['isAllowDisableAgent'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgent'] === false )): ?> class="disabled"<?php endif; ?>>
                                <input checked="checked" type="hidden" name="agent" value="<?php echo $this->_tpl_vars['sPost']['agent']; ?>
" />
                                <input <?php if ($this->_tpl_vars['sPost']['agent']): ?>checked="checked"<?php endif; ?>
                                       <?php if ($this->_tpl_vars['sPost']['agency'] && ! $this->_tpl_vars['config']['membership_module'] || ( isset ( $this->_tpl_vars['sPost']['isAllowDisableAgent'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgent'] === false )): ?>disabled="disabled" class="disabled"<?php endif; ?>
                                       type="checkbox"
                                       name="agent"
                                       value="1"
                                />&nbsp;<?php echo $this->_tpl_vars['lang']['atype_agent_option']; ?>

                            </label>
                        </div>

                        <script>
                            let isAllowDisableAgency = <?php if (isset ( $this->_tpl_vars['sPost']['isAllowDisableAgency'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgency'] === false): ?>false<?php else: ?>true<?php endif; ?>;
                            let isAllowDisableAgent  = <?php if (isset ( $this->_tpl_vars['sPost']['isAllowDisableAgent'] ) && $this->_tpl_vars['sPost']['isAllowDisableAgent'] === false): ?>false<?php else: ?>true<?php endif; ?>;

                            <?php echo '
                            $(function(){
                                $(\'input[name=page]\').click(function(){
                                    ownPageControl();
                                });

                                $(\'[name=agency][type=checkbox],[name=agent][type=checkbox]\').click(function () {
                                    agencyControl();
                                });

                                ownPageControl();
                                agencyControl();
                            });

                            const ownPageControl = function() {
                                if ($(\'input[name=page]:checked\').length>0) {
                                    $(\'input[name=own_location]\').attr(\'disabled\', false).parent().removeClass(\'disabled\');
                                } else {
                                    $(\'input[name=own_location]\').prop(\'checked\', false).attr(\'disabled\', true).parent().addClass(\'disabled\');
                                }
                            }

                            const agencyControl = function () {
                                let $agency       = $(\'[name=agency][type=checkbox]\');
                                let $agencyHidden = $(\'[name=agency][type=hidden]\');
                                let $agent        = $(\'[name=agent][type=checkbox]\');
                                let $agentHidden  = $(\'[name=agent][type=hidden]\');

                                if (isAllowDisableAgent) {
                                    $agent.prop(\'disabled\', $agency.is(\':checked\'));
                                    $agentHidden.val($agent.is(\':checked\') ? \'1\' : \'0\');
                                    $agent[$agency.is(\':checked\') ? \'addClass\' : \'removeClass\'](\'disabled\');
                                    $agent.closest(\'label\')[$agency.is(\':checked\') ? \'addClass\' : \'removeClass\'](\'disabled\');
                                }

                                if (isAllowDisableAgency && !rlConfig.membershipModule) {
                                    $agency.prop(\'disabled\', $agent.is(\':checked\'));
                                    $agencyHidden.val($agency.is(\':checked\') ? \'1\' : \'0\');
                                    $agency[$agent.is(\':checked\') ? \'addClass\' : \'removeClass\'](\'disabled\');
                                    $agency.closest(\'label\')[$agent.is(\':checked\') ? \'addClass\' : \'removeClass\'](\'disabled\');
                                }
                            }
                        '; ?>
</script>
                    <?php endif; ?>
                </div>
            </fieldset>

            <div class="grey_area" style="margin-bottom: 10px;">
                <span onclick="aTypeAbilitiesHandler(true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                <span class="divider"> | </span>
                <span onclick="aTypeAbilitiesHandler(false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
            </div>

            <script><?php echo '
                const aTypeAbilitiesHandler = function(isCheck) {
                    $(\'#account_abb input\').each(function () {
                        if (!$(this).is(\':disabled\')) {
                            $(this).prop(\'checked\', isCheck);

                            '; ?>

                            <?php if ($_GET['type'] != 'visitor'): ?>
                                ownPageControl();
                                agencyControl();
                            <?php endif; ?>
                            <?php echo '
                        } else {
                            if (isCheck === false) {
                                $(this).prop(\'checked\', isCheck);
                            }
                        }
                    });
                }
            '; ?>
</script>
        </td>
    </tr>

    <?php if ($_GET['type'] != 'visitor'): ?>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['reg_settings']; ?>
</td>
        <td class="field">
            <fieldset class="light" style="margin-top: 5px;">
                <legend id="legend_account_settings" class="up" onclick="fieldset_action('account_settings');"><?php echo $this->_tpl_vars['lang']['reg_settings']; ?>
</legend>
                <div id="account_settings">
                    <?php $_from = $this->_tpl_vars['account_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['account_setting']):
?>
                        <div class="option_padding">
                            <label><input <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['account_setting']['key']]): ?>checked="checked"<?php endif; ?> type="checkbox" name="<?php echo $this->_tpl_vars['account_setting']['key']; ?>
" value="1" /> <?php echo $this->_tpl_vars['account_setting']['name']; ?>
</label>
                        </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </fieldset>

            <script type="text/javascript"><?php echo '
            $(document).ready(function(){
                $(\'#account_settings input\').click(function(){
                    ATsettingsControl();
                });

                ATsettingsControl();

                $(\'input.add_variable_button\').click(function(){
                    var variable = $(this).prev().val();
                    if (variable != \'0\' && variable) {
                        var text_obj = $(this).parent().parent().find(\'input[type=text]:visible,textarea:visible\');

                        var text = text_obj.val();

                        var caret = text_obj.getSelection();
                        var new_text = text.substring(0, caret.start) + \'{\' + variable + \'}\' + text.substring(caret.end, text.length);

                        text_obj.val(new_text).focus();
                        text_obj.setCursorPosition(caret.start+variable.length+2);
                    }
                });
            });

            var ATsettingsControl = function(){
                if ($(\'#account_settings input[name=admin_confirmation]:checked\').length > 0
                    || $(\'#account_settings input[name=email_confirmation]:checked\').length > 0
                ) {
                    $(\'#account_settings input[name=auto_login]\').prop(\'checked\', false).attr(\'disabled\', true).parent().addClass(\'disabled\');
                } else {
                    $(\'#account_settings input[name=auto_login]\').attr(\'disabled\', false).parent().removeClass(\'disabled\');
                }
            }
            '; ?>
</script>
        </td>
    </tr>

    <tr>
        <?php $this->assign('dimensions_config_name', 'config+name+account_thumb_divider'); ?>
        <?php $this->assign('dimensions_width_name', 'config+name+account_thumb_width'); ?>
        <?php $this->assign('dimensions_height_name', 'config+name+account_thumb_height'); ?>

        <td class="name"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['dimensions_config_name']]; ?>
</td>
        <td class="field">
            <fieldset class="light" style="margin-top: 5px;">
                <legend id="legend_dimensions_settings" class="up" onclick="fieldset_action('dimensions_settings');">
                    <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['dimensions_config_name']]; ?>

                </legend>

                <div id="dimensions_settings">
                    <table class="form">
                        <tbody>
                            <tr>
                                <td class="name"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['dimensions_width_name']]; ?>
</td>
                                <td class="field">
                                    <input class="numeric" name="dimensions[width]" type="text" style="width: 25px;"
                                        value="<?php if ($this->_tpl_vars['sPost']['dimensions']['width']): ?><?php echo $this->_tpl_vars['sPost']['dimensions']['width']; ?>
<?php else: ?>110<?php endif; ?>"
                                        maxlength="3" />
                                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['thumb_width_desc']; ?>
</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="name"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['dimensions_height_name']]; ?>
</td>
                                <td class="field">
                                    <input class="numeric" name="dimensions[height]" type="text" style="width: 25px;"
                                        value="<?php if ($this->_tpl_vars['sPost']['dimensions']['height']): ?><?php echo $this->_tpl_vars['sPost']['dimensions']['height']; ?>
<?php else: ?>100<?php endif; ?>"
                                        maxlength="3" />
                                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['thumb_height_desc']; ?>
</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </td>
    </tr>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['config']['membership_module']): ?>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['featured_settings']; ?>
</td>
        <td class="field">
            <fieldset class="light">
                <legend id="legend_featured_settings" class="up" onclick="fieldset_action('featured_settings');"><?php echo $this->_tpl_vars['lang']['featured_settings']; ?>
</legend>
                <div id="featured_settings">

                    <table class="form wide">
                        <tr>
                            <td class="name"><?php echo $this->_tpl_vars['lang']['featured_blocks']; ?>
</td>
                            <td class="field">
                                <?php $this->assign('checkbox_field', 'featured_blocks'); ?>

                                <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                                <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                <?php else: ?>
                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                <?php endif; ?>

                                <table>
                                    <tr>
                                        <td>
                                            <input <?php echo $this->_tpl_vars['featured_blocks_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                            <input <?php echo $this->_tpl_vars['featured_blocks_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                                        </td>
                                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']]): ?>
                                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=blocks&amp;action=edit&amp;block=atfb_') : smarty_modifier_cat($_tmp, 'index.php?controller=blocks&amp;action=edit&amp;block=atfb_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['type']) : smarty_modifier_cat($_tmp, $_GET['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['featured_blocks_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                                        <?php endif; ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </fieldset>
        </td>
    </tr>
    <?php endif; ?>
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountTypesForm'), $this);?>


    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
        <td class="field">
            <?php if (! $this->_tpl_vars['allow_change_quick_registration']): ?>
                <input type="hidden" name="status" value="<?php echo $this->_tpl_vars['sPost']['status']; ?>
" />
            <?php endif; ?>

            <select name="status" <?php if (! $this->_tpl_vars['allow_change_quick_registration']): ?>class="disabled" disabled="disabled"<?php endif; ?>>
                <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
            </select>

            <?php if (! $this->_tpl_vars['allow_change_quick_registration']): ?>
                <span class="field_description"><?php echo $this->_tpl_vars['lang']['account_type_disabling_warning']; ?>
</span>
            <?php endif; ?>
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
    <!-- add/edit type end -->

<?php elseif ($_GET['action'] == 'build'): ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder.tpl') : smarty_modifier_cat($_tmp, 'builder.tpl')), 'smarty_include_vars' => array('no_groups' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>

    <!-- build reqest -->
    <?php if ($_GET['request'] == 'build'): ?>
        <script type="text/javascript">
        var request_type_key = '<?php echo $_GET['key']; ?>
';
        var request_account_notice = "<?php echo $this->_tpl_vars['lang']['suggest_account_type_building']; ?>
";
        <?php echo '

        $(document).ready(function(){
            rlConfirm(request_account_notice, \'requestRedirect\', null, null, null, \'cancelRedirect\');
        });

        var requestRedirect = function(){
            location.href = rlUrlHome+\'index.php?controller=\'+controller+\'&action=build&form=reg_form&key=\'+request_type_key;
        };

        var cancelRedirect = function(){
            window.history.pushState(null, null, rlUrlHome+\'index.php?controller=\'+controller);
        };

        '; ?>

        </script>
    <?php endif; ?>
    <!-- build reqest end -->

    <!-- rebuild avatars -->
    <?php if ($_GET['rebuild_pictures']): ?>
        <script>
        lang['rebuild_avatars_promt'] = "<?php echo $this->_tpl_vars['lang']['rebuild_avatars_promt']; ?>
";
        lang['resize_in_progress'] = "<?php echo $this->_tpl_vars['lang']['resize_in_progress']; ?>
";
        lang['resize_completed'] = "<?php echo $this->_tpl_vars['lang']['resize_completed']; ?>
";
        rlConfig['rebuild_avatars_type'] = "<?php echo $_GET['rebuild_pictures']; ?>
";
        <?php echo '

        $(function(){
            rlConfirm(lang[\'rebuild_avatars_promt\'], \'flynax.initRebuildAccountPictures\');
        });

        '; ?>

        </script>
    <?php endif; ?>
    <!-- rebuild avatars end -->

    <!-- pre delete block -->
    <div id="delete_block" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['delete_account_type'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div id="delete_container"><?php echo $this->_tpl_vars['lang']['detecting']; ?>
</div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <script type="text/javascript">//<![CDATA[
        <?php if ($this->_tpl_vars['config']['trash']): ?>
            var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_drop_empty_account_type']; ?>
";
        <?php else: ?>
            var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_delete_empty_account_type']; ?>
";
        <?php endif; ?>

        <?php echo '
        function delete_chooser(method, id, type)
        {
            if (method == \'delete\')
            {
                rlPrompt(delete_conform_phrase.replace(\'{type}\', type), \'xajax_deleteAccountType\', id);
            }
            else if (method == \'replace\')
            {
                $(\'#top_buttons\').slideUp(\'slow\');
                $(\'#bottom_buttons\').slideDown(\'slow\');
                $(\'#replace_content\').slideDown(\'slow\');
            }
        }

        '; ?>

        //]]>
        </script>
    </div>
    <!-- pre delete block end -->

    <!-- account types grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var accountTypesGrid;
    <?php echo '

    var list = [{
        text: lang.ext_build_reg_form,
        href: `${rlUrlHome}index.php?controller=${controller}&action=build&form=reg_form&key={key}`
    }, {
        text: lang.ext_build_short_form,
        href: `${rlUrlHome}index.php?controller=${controller}&action=build&form=short_form&key={key}`
    }, {
        text: lang.ext_search_form,
        href: `${rlUrlHome}index.php?controller=${controller}&action=build&form=search_form&key={key}`
    }, {
        text: lang.build_account_grid_form,
        href: `${rlUrlHome}index.php?controller=${controller}&action=build&form=grid_form&key={key}`
    }];

    $(document).ready(function(){
        accountTypesGrid = new gridObj({
            key: \'accountTypes\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/account_types.inc.php?q=ext\',
            defaultSortField: \'name\',
            remoteSortable: false,
            title: lang[\'ext_account_types_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Accounts_count\', mapping: \'Accounts_count\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'Quick_registration\', mapping: \'Quick_registration\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    fixed: true,
                    width: 25
                },
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 60,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_accounts\'],
                    dataIndex: \'Accounts_count\',
                    width: 8,
                    renderer: function(val, ext, row){
                        //return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        if ( val )
                        {
                            var out = \'<a ext:qtip="\'+lang[\'ext_click_to_view_details\']+\'" target="_blank" href="\'+rlUrlHome+\'index.php?controller=accounts&account_type=\'+row.data.Key+\'"><b>\'+val+\'</b> (\'+lang[\'ext_view\']+\')</a>\';
                        }
                        else
                        {
                            var out = val;
                        }

                        return out;
                    }
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 8,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 10,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang.active],
                            [\'approval\', lang.approval]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus:true,
                        listeners: {
                            beforeselect: function(combo, record){
                                var index  = combo.gridEditor.row;
                                var row    = accountTypesGrid.grid.store.data.items
                                && accountTypesGrid.grid.store.data.items[index]
                                    ? accountTypesGrid.grid.store.data.items[index]
                                    : null;
                                var atype  = row && row.data ? row.data : null;

                                // show popup for admin with notice about active accounts/listings uses this type
                                if (atype
                                    && record.data.field1 == \'approval\'
                                    && row.data.Status != \''; ?>
<?php echo $this->_tpl_vars['lang']['approval']; ?>
<?php echo '\'
                                    && parseInt(atype.Accounts_count) > 0
                                    && atype.Key != \'visitor\'
                                ) {
                                    Ext.MessageBox.confirm(
                                        \''; ?>
<?php echo $this->_tpl_vars['lang']['warning']; ?>
<?php echo '\',
                                        \''; ?>
<?php echo $this->_tpl_vars['lang']['confirm_deactivate_account_type']; ?>
<?php echo '\',
                                        function(btn){
                                            if (btn == \'yes\') {
                                                $.getJSON(
                                                    rlConfig[\'ajax_url\'],
                                                    {item: \'accountTypeDeactivation\', key: atype.Key},
                                                    function(response) {
                                                        if (response && response.status && response.message) {
                                                            var message = response.message;
                                                            var type    = \'\';

                                                            if (response.status == \'OK\') {
                                                                accountTypesGrid.reload();
                                                                type = \'notice\';
                                                            } else {
                                                                type = \'error\';
                                                            }

                                                            printMessage(type, message);
                                                        }
                                                    }
                                                );

                                            }
                                        }
                                    );

                                    return false;
                                }
                            }
                        }
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 90,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data, ext, row) {
                        var out = "<center>";
                        var splitter = false;

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            if ( row.data.Key != \'visitor\' )
                            {
                                out += \'<img onclick="flynax.extModal(this, \\\'\'+data+\'\\\');" class="build" ext:qtip="\'+lang[\'ext_build\']+\'" src="\'+rlUrlHome+\'img/blank.gif" />\';
                            }
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&type="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 && row.data.Key != \'visitor\' )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'";
                            out += rlUrlHome + "img/blank.gif\' onclick=\'";

                            if (checkAbilityDisablingType(row.data.Key)) {
                                out += "xajax_preAccountTypeDelete(\\"" + row.data.Key + "\\") ";
                            } else {
                                out += "printMessage(\\"error\\", \\"'; ?>
<?php echo $this->_tpl_vars['lang']['account_type_disabling_warning']; ?>
<?php echo '\\") ";
                            }

                            out += "\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountTypesGrid'), $this);?>
<?php echo '

        accountTypesGrid.init();
        grid.push(accountTypesGrid.grid);

        // disallow to disable/remove last account type with enabled "Quick registration" option
        accountTypesGrid.grid.addListener(\'beforeedit\', function(editEvent) {
            if (editEvent.field == \'Status\' && editEvent.value == lang.active) {
                if (!checkAbilityDisablingType(editEvent.record.data.Key)) {
                    printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['account_type_disabling_warning']; ?>
<?php echo '\');
                    return false;
                }
            }
        });

        /**
         * Checking value of option "Sign-Up" in other account types to diallow disable/remove current type
         *
         * @param {object} key - Key of current account type
         */
        var checkAbilityDisablingType = function(key){
            if (accountTypesGrid.store.data.items) {
                var count_active_types = 0;
                var quick_type_key     = \'\';

                for (var i = accountTypesGrid.store.data.items.length - 1; i >= 0; i--) {
                    if (accountTypesGrid.store.data.items[i].data.Quick_registration ==  \'1\') {
                        quick_type_key = accountTypesGrid.store.data.items[i].data.Key;
                        count_active_types++;
                    }
                }

                if (count_active_types == 1 && key == quick_type_key) {
                    return false;
                } else {
                    return true;
                }
            }
        }
    });
    '; ?>

    //]]>
    </script>
    <!-- account types grid end -->

<?php endif; ?>

<!-- account types end tpl -->