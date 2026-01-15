<?php /* Smarty version 2.6.31, created on 2025-07-28 09:55:01
         compiled from controllers/blocks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/blocks.tpl', 5, false),array('function', 'fckEditor', 'controllers/blocks.tpl', 122, false),array('function', 'phrase', 'controllers/blocks.tpl', 259, false),array('modifier', 'strpos', 'controllers/blocks.tpl', 21, false),array('modifier', 'cat', 'controllers/blocks.tpl', 26, false),array('modifier', 'count', 'controllers/blocks.tpl', 46, false),array('modifier', 'ceil', 'controllers/blocks.tpl', 151, false),array('modifier', 'in_array', 'controllers/blocks.tpl', 258, false),array('modifier', 'regex_replace', 'controllers/blocks.tpl', 281, false),array('modifier', 'implode', 'controllers/blocks.tpl', 314, false),array('modifier', 'json_encode', 'controllers/blocks.tpl', 383, false),)), $this); ?>
<!-- blocks tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBlocksNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['action'] != 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_block']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['blocks_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>
    <?php $this->assign('sPost', $_POST); ?>

        <?php if (((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'ltcategories_') : strpos($_tmp, 'ltcategories_')) === 0 || ((is_array($_tmp=$this->_tpl_vars['block']['Key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'ltsb_') : strpos($_tmp, 'ltsb_')) === 0 || $this->_tpl_vars['block']['Key'] === 'my_profile_sidebar' || $this->_tpl_vars['block']['Key'] === 'more_news_block'): ?>
        <?php $this->assign('preventChangeBoxPosition', true); ?>
    <?php endif; ?>

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

            <?php if (! $this->_tpl_vars['block']['Readonly']): ?>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['block_type']; ?>
</td>
                <td class="field">
                    <select <?php if (! empty ( $this->_tpl_vars['block']['Plugin'] ) && $this->_tpl_vars['block']['Type'] != 'html'): ?>disabled="disabled"<?php endif; ?> onchange="block_banner('btype_'+$(this).val(), '#btypes div');" name="type" class="<?php if (! empty ( $this->_tpl_vars['block']['Plugin'] ) && $this->_tpl_vars['block']['Type'] != 'html'): ?>disabled<?php endif; ?>">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['l_block_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['types_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['types_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tKey'] => $this->_tpl_vars['block_type']):
        $this->_foreach['types_f']['iteration']++;
?>
                        <option value="<?php echo $this->_tpl_vars['tKey']; ?>
" <?php if ($this->_tpl_vars['tKey'] == $this->_tpl_vars['sPost']['type']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['block_type']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <?php if (! empty ( $this->_tpl_vars['block']['Plugin'] ) && $this->_tpl_vars['block']['Type'] != 'html'): ?><input type="hidden" name="type" value="<?php echo $this->_tpl_vars['sPost']['type']; ?>
" /><?php endif; ?>
                </td>
            </tr>
            <?php endif; ?>
            </table>

            <div id="btypes">

            <div id="btype_other" class="hide">
                <table class="form">
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['content']; ?>
</td>
                    <td class="field">
                        <textarea <?php if ($this->_tpl_vars['block']['Readonly']): ?>readonly="readonly"<?php endif; ?> rows="6" cols="" name="content" class="<?php if ($this->_tpl_vars['block']['Readonly']): ?>disabled<?php endif; ?>"><?php echo $this->_tpl_vars['sPost']['content']; ?>
</textarea>
                    </td>
                </tr>
                </table>
            </div>

            <div class="hide" id="btype_html">
                <table class="form">
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['content']; ?>
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
                            <?php $this->assign('dCode', ((is_array($_tmp='html_content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                            <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='html_content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                </table>
            </div>

            </div>

            <table class="form">
            <?php if (! empty ( $this->_tpl_vars['pages_list'] )): ?>
                <tr <?php if ($this->_tpl_vars['preventChangeBoxPosition']): ?>class="hide"<?php endif; ?>>
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
                                        <?php $_from = $this->_tpl_vars['pages_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pagesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pagesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['pagesF']['iteration']++;
?>
                                        <?php $this->assign('pId', $this->_tpl_vars['page']['ID']); ?>
                                        <div style="padding: 2px 8px;">
                                            <input data-key="<?php echo $this->_tpl_vars['page']['Key']; ?>
" data-controller="<?php echo $this->_tpl_vars['page']['Controller']; ?>
" class="checkbox" <?php if (isset ( $this->_tpl_vars['bPages'][$this->_tpl_vars['pId']] )): ?>checked="checked"<?php endif; ?> id="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
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
                                    <?php if ($this->_tpl_vars['allowPageSticky']): ?>
                                        <label>
                                            <input id="show_on_all"
                                                   <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>checked="checked"<?php endif; ?>
                                                   type="checkbox"
                                                   name="show_on_all"
                                                   value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>

                                        </label>
                                    <?php endif; ?>
                                    <span id="pages_nav" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>class="hide"<?php endif; ?>>
                                        <span onclick="$('#pages_cont input').prop('checked', true);" class="green_10">
                                            <?php echo $this->_tpl_vars['lang']['check_all']; ?>

                                        </span>
                                        <span class="divider"> | </span>
                                        <span onclick="$('#pages_cont input').prop('checked', false);" class="green_10">
                                            <?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>

                                        </span>
                                    </span>
                                </div>
                            </div>
                        </fieldset>

                        <script type="text/javascript"><?php echo '
                        $(document).ready(function(){
                            $(\'#legend_pages\').click(function(){
                                fieldset_action(\'pages\');
                            });

                            $(\'input#show_on_all\').click(function(){
                                $(\'#pages_cont\').slideToggle();
                                $(\'#pages_nav\').fadeToggle();
                            });

                            // box_sticky_type_categories_only option handler
                            var boxStickyTypeCategoriesOnlyHandler = function(){
                                $(\'#box_sticky_type_categories_only\')[
                                    $(\'#pages_cont input[data-controller=listing_type]:checked\').length
                                    ? \'removeClass\'
                                    : \'addClass\'
                                ](\'hide\');
                            }

                            $(\'#pages_cont input[name^=pages]\').change(function(){
                                boxStickyTypeCategoriesOnlyHandler();
                            });

                            boxStickyTypeCategoriesOnlyHandler();
                        });
                        '; ?>
</script>
                    </td>
                </tr>
            <?php endif; ?>

            <?php if (! empty ( $this->_tpl_vars['sections'] )): ?>
                <tr <?php if ($this->_tpl_vars['preventChangeBoxPosition']): ?>class="hide"<?php endif; ?>>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['show_in_categories']; ?>
</td>
                    <td class="field">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, "categories_tree.tpl") : smarty_modifier_cat($_tmp, "categories_tree.tpl")), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </td>
                </tr>
            <?php endif; ?>

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

            <?php if ($this->_tpl_vars['block_options']): ?>
                <?php $_from = $this->_tpl_vars['block_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option_key'] => $this->_tpl_vars['option']):
?>
                <tr id="box_option_<?php echo $this->_tpl_vars['option_key']; ?>
"<?php if ($this->_tpl_vars['main_group_type'] && $this->_tpl_vars['block']['Key'] != $this->_tpl_vars['main_group_type'] && ((is_array($_tmp=$this->_tpl_vars['option_key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['dynamic_box_options']) : in_array($_tmp, $this->_tpl_vars['dynamic_box_options'])) && $this->_tpl_vars['block_options']['group_categories']['default']): ?> class="hide"<?php endif; ?>>
                    <td class="name"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='blocks+option+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['option_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['option_key']))), $this);?>
</td>
                    <td class="field">
                        <?php if ($this->_tpl_vars['option']['type'] == 'boolean'): ?>
                            <label><input <?php if ($this->_tpl_vars['option']['default']): ?>checked="checked"<?php endif; ?> type="radio" name="options[<?php echo $this->_tpl_vars['option_key']; ?>
]" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <label><input <?php if (! $this->_tpl_vars['option']['default']): ?>checked="checked"<?php endif; ?> type="radio" name="options[<?php echo $this->_tpl_vars['option_key']; ?>
]" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        <?php elseif ($this->_tpl_vars['option']['type'] == 'select'): ?>
                            <select name="options[<?php echo $this->_tpl_vars['option_key']; ?>
]">
                                <?php $_from = $this->_tpl_vars['option']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                                <option value="<?php echo $this->_tpl_vars['value']; ?>
" <?php if ($this->_tpl_vars['value'] == $this->_tpl_vars['option']['default']): ?>selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='blocks+option_value+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['value']))), $this);?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php elseif ($this->_tpl_vars['option']['type'] == 'number'): ?>
                            <input type="text" value="<?php echo $this->_tpl_vars['option']['default']; ?>
" name="options[<?php echo $this->_tpl_vars['option_key']; ?>
]" class="numeric wauto"<?php if ($this->_tpl_vars['option']['values']): ?> size="<?php echo $this->_tpl_vars['option']['values']; ?>
"<?php endif; ?> />
                        <?php endif; ?>

                        <?php $this->assign('option_hint', ((is_array($_tmp='blocks+option_hint+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['option_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['option_key']))); ?>

                        <?php if ($this->_tpl_vars['option_key'] == 'group_categories'): ?>
                            <?php if ($this->_tpl_vars['main_group_type'] && $this->_tpl_vars['block']['Key'] != $this->_tpl_vars['main_group_type']): ?>
                                <?php $this->assign('edit_box_link', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rlBaseC'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'action=edit&block=') : smarty_modifier_cat($_tmp, 'action=edit&block=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['main_group_type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['main_group_type']))); ?>
                                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['edit_box_link']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['edit_box_link'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                                <span class="field_description group_categories_hint<?php if (! $this->_tpl_vars['block_options']['group_categories']['default']): ?> hide<?php endif; ?>">
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['group_categories_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>

                                </span>
                            <?php endif; ?>
                        <?php elseif ($this->_tpl_vars['lang'][$this->_tpl_vars['option_hint']]): ?>
                            <span class="field_description"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['option_hint']]; ?>
</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>

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

        <?php if ($this->_tpl_vars['main_group_type'] && $this->_tpl_vars['block']['Key'] != $this->_tpl_vars['main_group_type']): ?>
        <script type="text/javascript">
        var group_option_ids = '#box_option_<?php echo ((is_array($_tmp=',#box_option_')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['dynamic_box_options']) : implode($_tmp, $this->_tpl_vars['dynamic_box_options'])); ?>
';
        <?php echo '
        $(function(){
            var $groupOption = $(\'[name="options[group_categories]"]\');
            $groupOption.change(function(){
                $(group_option_ids)[
                    $groupOption.filter(\':checked\').val() == \'1\' ? \'addClass\' : \'removeClass\'
                ](\'hide\');

                $(\'.group_categories_hint\')[
                    $groupOption.filter(\':checked\').val() == \'1\' ? \'removeClass\' : \'addClass\'
                ](\'hide\');
            });
        });
        '; ?>

        </script>
        <?php endif; ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- add new block end -->

    <!-- select category action -->
    <script type="text/javascript">

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

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBlocksAction'), $this);?>


<?php else: ?>

    <script type="text/javascript">
    // blocks sides list
    var block_sides = [
    <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
        ['<?php echo $this->_tpl_vars['sKey']; ?>
', '<?php echo $this->_tpl_vars['block_side']; ?>
']<?php if (! ($this->_foreach['sides_f']['iteration'] == $this->_foreach['sides_f']['total'])): ?>,<?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    ];
    </script>

    <!-- blocks grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var blocksGrid;
    var sides_to_remove = ['integrated_banner', 'header_banner'];
    var box_prefixes = <?php if ($this->_tpl_vars['l_block_excluded']): ?><?php echo json_encode($this->_tpl_vars['l_block_excluded']); ?>
<?php else: ?>[]<?php endif; ?>;

    <?php echo '
    $(document).ready(function(){

        blocksGrid = new gridObj({
            key: \'blocks\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/blocks.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_blocks_manager\'],
            fields: [
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Tpl\', mapping: \'Tpl\'},
                {name: \'Header\', mapping: \'Header\'},
                {name: \'Side\', mapping: \'Side\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'deny_side\', mapping: \'deny_side\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    id: \'rlExt_item_bold\',
                    width: 40
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    id: \'rlExt_item\',
                    width: 10
                },{
                    header: lang[\'ext_block_side\'],
                    dataIndex: \'Side\',
                    width: 10,
                    editor: new Ext.form.ComboBox({
                        store: block_sides,
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus: true
                    }),
                    renderer: function(val, ext, row){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_block_header\'],
                    dataIndex: \'Header\',
                    width: 10,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'1\', lang[\'ext_yes\']],
                            [\'0\', lang[\'ext_no\']]
                        ],
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
                    header: lang[\'ext_block_style\'],
                    dataIndex: \'Tpl\',
                    width: 10,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'1\', lang[\'ext_yes\']],
                            [\'0\', lang[\'ext_no\']]
                        ],
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
                        selectOnFocus:true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";
                        var splitter = false;

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&block="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deleteBlock\\", \\""+Array(data)+"\\", \\"section_load\\" )\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBlocksGrid'), $this);?>
<?php echo '

        blocksGrid.init();
        grid.push(blocksGrid.grid);

        var banners_removed = false;

        blocksGrid.grid.addListener(\'beforeedit\', function(editEvent){
            if (\'Side\' == editEvent.field) {
                var column = editEvent.grid.colModel.columns[2];

                var pattern = new RegExp(\'^(\' + box_prefixes.join(\'|\') + \')\');
                if (pattern.test(editEvent.record.data.Key) ) {
                    var items = column.editor.getStore().data.items;
                    var items_ids = [];
                    for (var i = 0; i < items.length; i++) {
                        if (sides_to_remove.indexOf(items[i].data.field1) >= 0) {
                            items_ids.push(i);
                        }
                    }

                    if (items_ids.length) {
                        for (var i in items_ids.reverse()) {
                            column.editor.getStore().removeAt(items_ids[i])
                        }

                        banners_removed = true;
                    }
                } else {
                    if (banners_removed) {
                        column.editor = new Ext.form.ComboBox({
                            store: block_sides,
                            displayField: \'value\',
                            valueField: \'key\',
                            typeAhead: true,
                            mode: \'local\',
                            triggerAction: \'all\',
                            selectOnFocus: true
                        });
                        banners_removed = false;
                    }
                }
            }
        });
    });
    '; ?>

    //]]>
    </script>
    <!-- blocks grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBlocksBottom'), $this);?>

<?php endif; ?>

<!-- blocks tpl end -->