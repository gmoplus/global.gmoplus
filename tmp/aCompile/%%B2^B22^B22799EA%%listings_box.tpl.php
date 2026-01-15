<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:39
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl', 19, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl', 33, false),array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl', 173, false),array('modifier', 'ceil', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl', 179, false),array('function', 'rlHook', '/home/gmoplus/global.gmoplus.com/plugins/listings_box/admin/listings_box.tpl', 292, false),)), $this); ?>
<!-- listings box tpl -->

<!-- navigation bar -->
<div id="nav_bar">

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['action'] != 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['listings_box_add_new_block']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['listings_box_block_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new/edit block -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form onsubmit="return submitHandler();"  action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
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
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>

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
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['block_type']; ?>
</td>
                <td class="field">
                    <select name="box_type">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['box_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['box_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['sKey']; ?>
" <?php if ($this->_tpl_vars['sKey'] == $this->_tpl_vars['sPost']['box_type']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['box_type']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
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
                            <?php if ($this->_tpl_vars['sKey'] != 'integrated_banner'): ?>
                                <option value="<?php echo $this->_tpl_vars['sKey']; ?>
" <?php if ($this->_tpl_vars['sKey'] == $this->_tpl_vars['sPost']['side']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['block_side']; ?>
</option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['use_block_header']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['header'] == '1'): ?>
                        <?php $this->assign('header_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['header'] == '0'): ?>
                        <?php $this->assign('header_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('header_yes', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['header_yes']; ?>
 class="lang_add" type="radio" name="header" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['header_no']; ?>
 class="lang_add" type="radio" name="header" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
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
                <td class="name"><?php echo $this->_tpl_vars['lang']['listings_box_display_mode']; ?>
</td>
                <td id="display_mode" class="field">

                    <?php if ($this->_tpl_vars['sPost']['display_mode'] == 'default'): ?>
                        <?php $this->assign('display_mode_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['display_mode'] == 'grid'): ?>
                        <?php $this->assign('display_mode_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('display_mode_yes', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['display_mode_yes']; ?>
 class="lang_add" type="radio" name="display_mode" value="default" /> <?php echo $this->_tpl_vars['lang']['listings_box_default']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['display_mode_no']; ?>
 class="lang_add" type="radio" name="display_mode" value="grid" /> <?php echo $this->_tpl_vars['lang']['listings_box_grid']; ?>
</label>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_box_number_of_listing']; ?>
</td>
                <td class="field">
                    <input type="text" class="numeric" name="count" value="<?php echo $this->_tpl_vars['sPost']['count']; ?>
" maxlength="2" style="width: 139px;" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listings_box_by_category']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['by_category'] == '1'): ?>
                        <?php $this->assign('by_category_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['unique'] == '0'): ?>
                        <?php $this->assign('by_category_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('by_category_no', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['by_category_yes']; ?>
 class="lang_add" type="radio" name="by_category" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['by_category_no']; ?>
 class="lang_add" type="radio" name="by_category" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['listings_box_by_category_desc']; ?>
</span>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listings_box_dublicate']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['unique'] == '1'): ?>
                        <?php $this->assign('dub_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['unique'] == '0'): ?>
                        <?php $this->assign('dub_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('dub_no', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['dub_yes']; ?>
 class="lang_add" type="radio" name="unique" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['dub_no']; ?>
 class="lang_add" type="radio" name="unique" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            <tr>
                <td class="divider_line" colspan="2">
                    <div class="inner"><?php echo $this->_tpl_vars['lang']['listings_box_listings_source']; ?>
</div>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
                <td class="field">
                    <fieldset class="light">
                        <legend id="legend_type" onclick="fieldset_action('type');" class="up"><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
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
                                    <?php if ($this->_tpl_vars['listing_type']['Photo'] || ( $this->_tpl_vars['listing_type']['Key'] == 'jobs' && $this->_tpl_vars['config']['package_name'] == 'general' ) || ( $this->_tpl_vars['listing_type']['Key'] == 'tasks' && $this->_tpl_vars['config']['package_name'] == 'service' )): ?>
                                        <div style="padding: 2px 8px;">
                                            <input class="checkbox"
                                                   <?php if ($this->_tpl_vars['sPost']['type'] && ((is_array($_tmp=$this->_tpl_vars['listing_type']['Type'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['type']) : in_array($_tmp, $this->_tpl_vars['sPost']['type']))): ?>checked="checked"<?php endif; ?>
                                                   id="type_<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
"
                                                   type="checkbox"
                                                   name="type[<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
]"
                                                   value="<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
" /> <label class="cLabel" for="type_<?php echo $this->_tpl_vars['listing_type']['Type']; ?>
"><?php echo $this->_tpl_vars['listing_type']['name']; ?>
</label>
                                        </div>
                                        <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['typeF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                        <?php if ($this->_foreach['typeF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                            </td>
                                            <td valign="top">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="grey_area" style="margin: 0 0 5px;">
                                <span>
                                    <span onclick="checkAll(true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="checkAll(false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </span>
                            </div>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr id="use_category" class="hide">
                <td class="name"><?php echo $this->_tpl_vars['lang']['listings_box_use_category']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['use_category'] == '1'): ?>
                        <?php $this->assign('use_category_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['use_category'] == '0'): ?>
                        <?php $this->assign('use_category_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('use_category_no', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['use_category_yes']; ?>
 class="lang_add" type="radio" name="use_category" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['use_category_no']; ?>
 class="lang_add" type="radio" name="use_category" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            <tr id="use_categories" class="hide">
                <td class="name"><?php echo $this->_tpl_vars['lang']['categories']; ?>
</td>
                <td class="field">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listings_box') : smarty_modifier_cat($_tmp, 'listings_box')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_box.tpl') : smarty_modifier_cat($_tmp, 'category_box.tpl')), 'smarty_include_vars' => array('mode' => 'cats')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </td>
            </tr>
            <tr>
                <td class="divider_line" colspan="2">
                    <div class="inner"><?php echo $this->_tpl_vars['lang']['listings_box_box_appearing']; ?>
</div>
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
                    });

                    '; ?>

                    </script>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['show_in_categories']; ?>
</td>
                <td class="field">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'listings_box') : smarty_modifier_cat($_tmp, 'listings_box')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_box.tpl') : smarty_modifier_cat($_tmp, 'category_box.tpl')), 'smarty_include_vars' => array('mode' => 'categories','check_all' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBlocksForm'), $this);?>

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

    <?php echo '

        var flynaxCustomTree = function () {
            var self = this;
            var selected = [];
            var parents = [];
            this.init = function(mode, catsSelected, parentsCats){
                selected[mode] = catsSelected;
                parents[mode] = parentsCats;
                self.callAction(mode);
                self.openCatTree(0, mode);
            }
            this.callAction = function(modeTmp){
                $(\'body\').on(\'click\', \'#categories_\'+modeTmp +\' .tree .tree_cat >img:not(.no_child)\', function(e){

                    var $obj = $(this);
                    var id = $obj.parent().data(\'index\');
                    mode = $obj.closest(\'.tree\').data(\'key\');
                    
                    if ( $obj.hasClass(\'opened\') )
                    {
                        $obj.removeClass(\'opened\');
                        $obj.parent().find(\'ul:first\').hide();
                    }
                    else
                    {
                        $obj.addClass(\'opened\');            
                        $obj.parent().find(\'ul:first\').show();
                    }

                    if (!$obj.hasClass(\'done\')) {
                        self.loadCats($obj, id, modeTmp);
                    }
                });
            }

            this.loadCats = function($obj, id, mode){
                var data = {
                    mode: \'listingBoxCatTree\',
                    item: \'listingBoxCatTree\',
                    lang: rlLang,
                    id: id,
                    input_mode: mode,
                }

                flUtil.ajax(data, function(response, status) {
                    if (status === \'success\' && response.status === \'ok\') {
                        var $content = $obj.parent();
                        $content.append(response.data);
                        $obj.addClass(\'done\');

                        self.openCatTree(id, mode);
                    }
                }, true);
            }

            this.openCatTree = function(parent_id, mode){

                var main_id = \'categories_\'+mode;
                if (parent_id == 0) {
                    main_id += \' .tree ul.first\';
                }
                else {
                    main_id += \' .tree .tree_cat[data-index=\'+parent_id+\']\';
                }


                if (parents[mode]) {
                    for (var i=0; i<parents[mode].length; i++) {
                        var idx = parents[mode][i];
                        var $content = $(\'#\'+main_id + \' .tree_cat[data-index=\'+idx+\']\');
                        if ($content.length > 0 && !$content.hasClass(\'done\')) {
                            $content.find(\'>img\').trigger(\'click\')
                            $content.addClass(\'done\');
                        }
                    }
                }

                if (selected[mode][0]) {
                    for (var i=0; i<selected[mode].length; i++) {
                        var $content = $(\'#\'+main_id);
                        var $current = $content.find(\'.tree_cat[data-index=\'+selected[mode][i]+\'] >label>input\');
                        $current.prop(\'checked\', true);
                    }
                }
            };
        }
        var customTree = new flynaxCustomTree();

        $(\'#type input\').on(\'change\', function() {
            _onLoadCustomCats();
        });

        $(\'input[name=use_category]\').click(function(){
           _showCustomCats();
        });

        var checkAll = function(mode){
            $(\'#list_rt input\').prop(\'checked\', mode);
            _onLoadCustomCats();
        }

        var _onLoadCustomCats = function(){
            var count = $("#type input:checked").length;
            if (count == 1) {                
                $("#use_category").removeClass(\'hide\');
            }
            else {
                $("#use_category").addClass(\'hide\');
            }
            _showCustomCats();
        }

        var _showCustomCats = function(){
            if($(\'input[name=use_category]:checked\').val() == 1 && $("#type input:checked").length == 1) {
                $(\'#use_categories\').show();
                $(\'#categories_cats input\').prop(\'checked\', false);
                var cat = $("#type input:checked").val();
                $(\'#use_categories .tree > *\').hide();
                $(\'#use_categories .tree\').find(\'[data-key=\'+cat+\']\').show();
            }
            else {
                $(\'#use_categories\').hide();
            }
        }

        $(\'input[name=cat_sticky]\').click(function(){
            $(\'#categories_categories .tree\').slideToggle();
            $(\'#cats_nav\').fadeToggle();
        });
        _onLoadCustomCats();


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
    <script type="text/javascript">
    // blocks sides list
    var block_sides = [
    <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
        <?php if ($this->_tpl_vars['sKey'] != 'integrated_banner'): ?>
            ['<?php echo $this->_tpl_vars['sKey']; ?>
', '<?php echo $this->_tpl_vars['block_side']; ?>
']<?php if (! ($this->_foreach['sides_f']['iteration'] == $this->_foreach['sides_f']['total'])): ?>,<?php endif; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    ];

    // blocks box types list
    var block_types = [
    <?php $_from = $this->_tpl_vars['box_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_types']):
        $this->_foreach['sides_f']['iteration']++;
?>
        ['<?php echo $this->_tpl_vars['sKey']; ?>
', '<?php echo $this->_tpl_vars['block_types']; ?>
']<?php if (! ($this->_foreach['sides_f']['iteration'] == $this->_foreach['sides_f']['total'])): ?>,<?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    ];

    </script>
    <div id="gridListingsBox"></div>
    <script type="text/javascript">//<![CDATA[
    lang['listings_box_number_of_listing'] = '<?php echo $this->_tpl_vars['lang']['listings_box_number_of_listing']; ?>
'
    var listingsBox;

    <?php echo '
    $(document).ready(function(){

        listingsBox = new gridObj({
            key: \'listings_box\',
            id: \'gridListingsBox\',
            ajaxUrl: rlPlugins + \'listings_box/admin/listings_box.inc.php?q=ext\',
            defaultSortField: \'ID\',
            title: lang[\'ext_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'name\', mapping: \'name\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Box_type\', mapping: \'Box_type\'},
                {name: \'Count\', mapping: \'Count\'},
                {name: \'Side\', mapping: \'Side\'},
                {name: \'Status\', mapping: \'Status\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    fixed: true,
                    width: 40
                },{
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\'
                },{
                    header: lang[\'listings_box_ext_box_type\'],
                    dataIndex: \'Box_type\',
                    width: 120,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: block_types,
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: false,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus:true
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'listings_box_number_of_listing\'],
                    dataIndex: \'Count\',
                    width: 120,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        maxValue: 30,
                        minValue: 1
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_block_side\'],
                    dataIndex: \'Side\',
                    width: 120,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: block_sides,
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus:true
                    }),
                    renderer: function(val){
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
                        selectOnFocus: true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(id) {
                        var out = \'\';

                        // edit
                        out += \'<a href="\' + rlUrlHome + \'index.php?controller=\'+controller+\'&action=edit&block=\'+id+\'">\';
                        out += \'<img class="edit ext:qtip="\' + lang[\'ext_edit\'] + \'" src="\' + rlUrlHome + \'img/blank.gif" /></a>\';

                        // delete
                        out += \'<img data-id="\'+id+\'" class="remove" ext:qtip="\' + lang[\'ext_delete\'] + \'"\';
                        out += \'src="\' + rlUrlHome + \'img/blank.gif"  />\';

                        return out;
                    }
                }
            ]
        });

        listingsBox.init();
        grid.push(listingsBox.grid);

        $(\'#gridListingsBox\').on(\'click\', \'img.remove\', deleteListingsBox.confirm)

    });

    var deleteListingsBoxClass = function(){

        this.confirm = function() {
            var id = $(this).data("id");
            rlConfirm(lang[\'ext_notice_delete\'], "deleteListingsBox.request", id);
        }

        this.request = function(index) {
            $.get(rlConfig["ajax_url"], {item: \'deleteListingsBox\', id: index}, function (response) {
                printMessage(\'notice\', response.message);
                listingsBox.init();
            }, \'json\');
        }
    }

    var deleteListingsBox = new deleteListingsBoxClass();

    '; ?>

    //]]>
    </script>
<?php endif; ?>
<!-- listings box tpl end -->