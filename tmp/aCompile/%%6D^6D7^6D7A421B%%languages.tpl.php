<?php /* Smarty version 2.6.31, created on 2025-07-28 12:49:58
         compiled from controllers/languages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'controllers/languages.tpl', 12, false),array('modifier', 'replace', 'controllers/languages.tpl', 143, false),array('function', 'rlHook', 'controllers/languages.tpl', 56, false),)), $this); ?>
<!-- languages tpl -->

<?php if ($_GET['action'] == 'edit'): ?>

    <!-- navigation bar -->
    <div id="nav_bar">
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['languages_list']; ?>
</span><span class="right"></span></a>
    </div>
    <!-- navigation bar end -->

    <!-- edit language -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=edit&amp;lang=<?php echo $_GET['lang']; ?>
" method="post">
        <input type="hidden" name="submit" value="1" />
        <input type="hidden" name="fromPost" value="1" />

        <?php $this->assign('sPost', $_POST); ?>
        <table class="form">
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['iso_code']; ?>
</td>
            <td class="field">
                <input readonly="readonly" class="disabled" name="code" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['code']; ?>
" maxlength="2" />
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['locale_code']; ?>
</td>
            <td class="field">
                <input name="locale" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['locale']; ?>
" maxlength="25" />
                <span class="field_description"><?php echo $this->_tpl_vars['lang']['locale_code_hint']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['lang_direction']; ?>
</td>
            <td class="field">
                <label title="<?php echo $this->_tpl_vars['lang']['ltr_direction_title']; ?>
"><input <?php if ($this->_tpl_vars['sPost']['direction'] == 'ltr'): ?>checked="checked"<?php endif; ?> value="ltr" type="radio" name="direction" title="<?php echo $this->_tpl_vars['lang']['ltr_direction_title']; ?>
" /> <?php echo $this->_tpl_vars['lang']['ltr_direction']; ?>
</label>
                <label title="<?php echo $this->_tpl_vars['lang']['rtl_direction_title']; ?>
"><input <?php if ($this->_tpl_vars['sPost']['direction'] == 'rtl'): ?>checked="checked"<?php endif; ?> value="rtl" type="radio" name="direction" title="<?php echo $this->_tpl_vars['lang']['rtl_direction_title']; ?>
" /> <?php echo $this->_tpl_vars['lang']['rtl_direction']; ?>
</label>
            </td>
        </tr>

        <tr>
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>

            </td>
            <td class="field">
                <input class="text" type="text" name="name" value="<?php echo $this->_tpl_vars['sPost']['name']; ?>
" style="width: 250px;" maxlength="50" />
            </td>
        </tr>

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['date_format']; ?>
</td>
            <td class="field">
                <input name="date_format" type="text" value="<?php echo $this->_tpl_vars['sPost']['date_format']; ?>
" style="width: 100px;" maxlength="50" />
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesEditField'), $this);?>


        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
            <td class="field">
                <select name="status"
                    <?php if (( $this->_tpl_vars['count_active_langs'] == 1 && $this->_tpl_vars['sPost']['status'] == 'active' ) || $this->_tpl_vars['sPost']['code'] === $this->_tpl_vars['config']['lang']): ?>class="disabled" disabled="disabled"<?php endif; ?>
                >
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
    <!-- edit language end -->

<?php elseif (isset ( $_POST['compare'] )): ?>

    <!-- navigation bar -->
    <div id="nav_bar">
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['languages_list']; ?>
</span><span class="right"></span></a>
    </div>
    <!-- navigation bar end -->

    <!-- compare -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('flexible' => true,'block_caption' => $this->_tpl_vars['lang']['languages_compare'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;compare" method="post">
    <input type="hidden" name="compare" value="true" />
    <table class="form">
    <tr>
        <td class="name" style="width: 150px;"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['compare']; ?>
</td>
        <td class="field">
            <select name="lang_1" id="lang_1">
            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_list']):
?>
                <option <?php if ($_POST['lang_1'] == $this->_tpl_vars['lang_list']['Code']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['lang_list']['Code']; ?>
"><?php echo $this->_tpl_vars['lang_list']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <?php echo $this->_tpl_vars['lang']['with']; ?>

            <select name="lang_2" id="lang_2">
            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_list']):
?>
                <option <?php if ($_POST['lang_2'] == $this->_tpl_vars['lang_list']['Code']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['lang_list']['Code']; ?>
"><?php echo $this->_tpl_vars['lang_list']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['compare_mode']; ?>
</td>
        <td class="field">
            <select name="compare_mode">
                <option <?php if ($_POST['compare_mode'] == 'phrases'): ?>selected="selected"<?php endif; ?> value="phrases"><?php echo $this->_tpl_vars['lang']['by_phrases_exist']; ?>
</option>
                <option <?php if ($_POST['compare_mode'] == 'translation'): ?>selected="selected"<?php endif; ?> value="translation"><?php echo $this->_tpl_vars['lang']['by_translation_different']; ?>
</option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="field">
            <input type="submit" value="<?php echo $this->_tpl_vars['lang']['compare']; ?>
" />
        </td>
    </tr>
    </table>
    </form>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if ($this->_tpl_vars['compare_lang1'] || $this->_tpl_vars['compare_lang2']): ?>

        <?php $this->assign('code_1', $this->_tpl_vars['compare_lang1']['Code']); ?>
        <?php $this->assign('code_2', $this->_tpl_vars['compare_lang2']['Code']); ?>

        <?php $this->assign('replace_lang1', ('{')."lang1".('}')); ?>
        <?php $this->assign('replace_lang2', ('{')."lang2".('}')); ?>

        <div id="compare_area_1">
            <div style="padding: 7px 0">
                <?php if ($this->_tpl_vars['compare_lang1']['diff']): ?>
                    <?php if ($_POST['compare_mode'] == 'phrases'): ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_result_info'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])); ?>
<br />
                        <input style="margin-top: 5px;" id="copy_button_1" onclick="xajax_copyPhrases(1, 2);$('#loading_1').fadeIn('normal');" type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_copy_phrases'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])); ?>
" />
                        <div class="grey_loader" id="loading_1"></div>
                    <?php else: ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_translation_result_info'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])); ?>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div id="compare_grid1" style="clear: both;"></div>
        </div>

        <div id="compare_area_2">
            <div style="padding: 20px 0 7px 0">
                <?php if ($this->_tpl_vars['compare_lang2']['diff']): ?>
                    <?php if ($_POST['compare_mode'] == 'phrases'): ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_result_info'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])); ?>
<br />
                        <input style="margin-top: 5px;" id="copy_button_2" onclick="xajax_copyPhrases(2, 1);$('#loading_2').fadeIn('normal');" type="button" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_copy_phrases'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])); ?>
" />
                        <div class="grey_loader" id="loading_2"></div>
                    <?php else: ?>
                        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['compare_translation_result_info'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang1'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_lang2'], $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name'])); ?>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div id="compare_grid2" style="clear: both;"></div>
        </div>

        <!-- compare grids creation -->
        <script type="text/javascript">
        var compare_mode = '<?php echo $_POST['compare_mode']; ?>
';

        <?php if ($this->_tpl_vars['compare_lang1']['diff']): ?>
            var lang_1 = '<?php echo $this->_tpl_vars['code_1']; ?>
';
            var lang1_name = ': <?php echo $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_1']]['name']; ?>
';
            var compareGrid1;

            <?php echo '
            $(document).ready(function(){

                compareGrid1 = new gridObj({
                    key: \'compare1\',
                    id: \'compare_grid1\',
                    ajaxUrl: rlUrlHome + \'controllers/languages.inc.php?q=compare&grid=1&compare_mode=\'+compare_mode,
                    defaultSortField: \'Value\',
                    title: lang[\'ext_phrases_manager\'] + lang1_name,
                    checkbox: true,
                    actions: [
                        [lang[\'ext_delete\'], \'delete\']
                    ],
                    fields: [
                        {name: \'Module\', mapping: \'Module\'},
                        {name: \'Key\', type: \'string\'},
                        {name: \'Value\', mapping: \'Value\', type: \'string\'}
                    ],
                    columns: [
                        {
                            header: lang[\'ext_key\'],
                            dataIndex: \'Key\',
                            width: 30
                        },{
                            id: \'rlExt_item\',
                            header: lang[\'ext_value\'],
                            dataIndex: \'Value\',
                            width: 60,
                            editor: new Ext.form.TextArea({
                                allowBlank: false
                            }),
                            renderer: function(val){
                                return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                            }
                        },{
                            header: lang[\'ext_side\'],
                            dataIndex: \'Module\',
                            width: 15,
                            editor: new Ext.form.ComboBox({
                                store: [
                                    [\'common\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_common']; ?>
'<?php echo '],
                                    [\'frontEnd\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_frontEnd']; ?>
'<?php echo '],
                                    [\'admin\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_admin']; ?>
'<?php echo '],
                                    [\'category\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_category']; ?>
'<?php echo '],
                                    [\'system\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_system']; ?>
'<?php echo '],
                                    [\'box\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_box']; ?>
'<?php echo ']
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
                        }
                    ]
                });

                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesCompareGrid1'), $this);?>
<?php echo '

                compareGrid1.init();
                grid.push(compareGrid1.grid);

                // actions listener
                compareGrid1.actionButton.addListener(\'click\', function()
                {
                    var sel_obj = compareGrid1.checkboxColumn.getSelections();
                    var action = compareGrid1.actionsDropDown.getValue();

                    if (!action)
                    {
                        return false;
                    }

                    for( var i = 0; i < sel_obj.length; i++ )
                    {
                        compareGrid1.ids += sel_obj[i].id;
                        if ( sel_obj.length != i+1 )
                        {
                            compareGrid1.ids += \'|\';
                        }
                    }

                    if ( action == \'delete\' )
                    {
                        Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_delete\'], function(btn){
                            if ( btn == \'yes\' )
                            {
                                xajax_massDelete( compareGrid1.ids, \'lang_1\', 1 );
                                compareGrid1.reload();
                            }
                        });

                        compareGrid1.checkboxColumn.clearSelections();
                        compareGrid1.actionsDropDown.setVisible(false);
                        compareGrid1.actionButton.setVisible(false);
                    }
                });

            });

            '; ?>

        <?php endif; ?>

        <?php if ($this->_tpl_vars['compare_lang2']['diff']): ?>
            var lang_2 = '<?php echo $this->_tpl_vars['code_2']; ?>
';
            var lang2_name = ': <?php echo $this->_tpl_vars['langs_info'][$this->_tpl_vars['code_2']]['name']; ?>
';
            var compareGrid2;

            <?php echo '
            $(document).ready(function(){

                compareGrid2 = new gridObj({
                    key: \'compare2\',
                    id: \'compare_grid2\',
                    ajaxUrl: rlUrlHome + \'controllers/languages.inc.php?q=compare&grid=2&compare_mode=\'+compare_mode,
                    defaultSortField: \'Value\',
                    title: lang[\'ext_phrases_manager\'] + lang2_name,
                    checkbox: true,
                    actions: [
                        [lang[\'ext_delete\'], \'delete\']
                    ],
                    fields: [
                        {name: \'Module\', mapping: \'Module\'},
                        {name: \'Key\', type: \'string\'},
                        {name: \'Value\', mapping: \'Value\', type: \'string\'}
                    ],
                    columns: [
                        {
                            header: lang[\'ext_key\'],
                            dataIndex: \'Key\',
                            width: 30
                        },{
                            id: \'rlExt_item\',
                            header: lang[\'ext_value\'],
                            dataIndex: \'Value\',
                            width: 60,
                            editor: new Ext.form.TextArea({
                                allowBlank: false
                            }),
                            renderer: function(val){
                                return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                            }
                        },{
                            header: lang[\'ext_side\'],
                            dataIndex: \'Module\',
                            width: 15,
                            editor: new Ext.form.ComboBox({
                                store: [
                                    [\'common\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_common']; ?>
'<?php echo '],
                                    [\'frontEnd\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_frontEnd']; ?>
'<?php echo '],
                                    [\'admin\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_admin']; ?>
'<?php echo '],
                                    [\'category\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_category']; ?>
'<?php echo '],
                                    [\'system\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_system']; ?>
'<?php echo '],
                                    [\'box\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_box']; ?>
'<?php echo ']
                                ],
                                typeAhead: true,
                                mode: \'local\',
                                triggerAction: \'all\',
                                selectOnFocus:true
                            }),
                            renderer: function(val){
                                return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                            }
                        }
                    ]
                });

                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesCompareGrid2'), $this);?>
<?php echo '

                compareGrid2.init();
                grid.push(compareGrid2.grid);

                // actions listener
                compareGrid2.actionButton.addListener(\'click\', function()
                {
                    var sel_obj = compareGrid2.checkboxColumn.getSelections();
                    var action = compareGrid2.actionsDropDown.getValue();

                    if (!action)
                    {
                        return false;
                    }

                    for( var i = 0; i < sel_obj.length; i++ )
                    {
                        compareGrid2.ids += sel_obj[i].id;
                        if ( sel_obj.length != i+1 )
                        {
                            compareGrid2.ids += \'|\';
                        }
                    }

                    if ( action == \'delete\' )
                    {
                        Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_delete\'], function(btn){
                            if ( btn == \'yes\' )
                            {
                                xajax_massDelete( compareGrid2.ids, \'lang_1\', 2 );
                                compareGrid2.reload();
                            }
                        });

                        compareGrid2.checkboxColumn.clearSelections();
                        compareGrid2.actionsDropDown.setVisible(false);
                        compareGrid2.actionButton.setVisible(false);
                    }
                });

            });

            '; ?>

        <?php endif; ?>
        </script>
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesCompareBottom'), $this);?>


<?php else: ?>

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <a href="javascript:void(0)" onclick="show('lang_add_phrase', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_phrase']; ?>
</span><span class="right"></span></a>
        <a href="javascript:void(0)" onclick="show('import', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_import"><?php echo $this->_tpl_vars['lang']['import']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit']): ?>
        <a href="javascript:void(0)" onclick="show('compare', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_compare"><?php echo $this->_tpl_vars['lang']['compare']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <a href="javascript:void(0)" onclick="show('lang_add_container', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_language']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<div id="action_blocks">

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
    <!-- add language form -->
    <div id="lang_add_container" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['add_language'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="" method="post" onsubmit="return false;">
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                <td class="field">
                    <input type="text" id="language_name" style="width: 150px;" maxlength="30" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['iso_code']; ?>
</td>
                <td class="field">
                    <input type="text" id="iso_code" style="width: 150px;" maxlength="2" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['locale_code']; ?>
</td>
                <td class="field">
                    <input type="text" id="locale" style="width: 150px;" maxlength="25" />
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['locale_code_hint']; ?>
</span>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['lang_direction']; ?>
</td>
                <td class="field">
                    <label title="<?php echo $this->_tpl_vars['lang']['ltr_direction_title']; ?>
"><input checked="checked" value="ltr" class="direction" type="radio" name="direction" title="<?php echo $this->_tpl_vars['lang']['ltr_direction_title']; ?>
" /> <?php echo $this->_tpl_vars['lang']['ltr_direction']; ?>
</label>
                    <label title="<?php echo $this->_tpl_vars['lang']['rtl_direction_title']; ?>
"><input value="rtl" class="direction" type="radio" name="direction" title="<?php echo $this->_tpl_vars['lang']['rtl_direction_title']; ?>
" /> <?php echo $this->_tpl_vars['lang']['rtl_direction']; ?>
</label>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['date_format']; ?>
</td>
                <td class="field">
                    <input type="text" id="date_format" style="width: 80px; text-align: center;" maxlength="12" value="%d.%m.%Y" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['copy_from']; ?>
</td>
                <td class="field">
                    <select class="<?php if ($this->_tpl_vars['langCount'] < 2): ?>disabled<?php endif; ?>" id="source" <?php if ($this->_tpl_vars['langCount'] < 2): ?>disabled<?php endif; ?>>
                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lang_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lang_foreach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['languages']):
        $this->_foreach['lang_foreach']['iteration']++;
?>
                        <option value="<?php echo $this->_tpl_vars['languages']['Code']; ?>
" <?php if ((defined('RL_LANG_CODE') ? @RL_LANG_CODE : null) == $this->_tpl_vars['languages']['Code']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['languages']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['translate_phrases_by_google']; ?>
</td>
                <td class="field">
                    <label>
                        <input type="radio"
                               name="translate"
                               value="1"
                               class="translate"
                               <?php if (! $this->_tpl_vars['_isTranslatorConfigured']): ?> disabled class="disabled"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['yes']; ?>

                    </label>
                    <label>
                        <input checked="checked"
                               type="radio"
                               name="translate"
                               value="0"
                               class="translate"
                               <?php if (! $this->_tpl_vars['_isTranslatorConfigured']): ?> disabled class="disabled"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['no']; ?>

                    </label>

                    <?php if (! $this->_tpl_vars['_isTranslatorConfigured']): ?>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['translate_phrases_by_google_hint']; ?>
</span>
                    <?php endif; ?>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesAddField'), $this);?>


            <tr>
                <td></td>
                <td class="field">
                    <input id="add_language_button" onclick="return rlCheck(Array(Array('language_name', '<?php echo $this->_tpl_vars['lang']['name_field_empty']; ?>
'), Array('iso_code', '<?php echo $this->_tpl_vars['lang']['iso_code_incorrect_number']; ?>
', '==^2'), Array('date_format', '<?php echo $this->_tpl_vars['lang']['language_incorrect_date_format']; ?>
', '>^3'), Array('source', '<?php echo $this->_tpl_vars['lang']['language_no_selected']; ?>
'), Array('.direction', '<?php echo $this->_tpl_vars['lang']['notice_lang_direction_missed']; ?>
'), Array('locale', '<?php echo $this->_tpl_vars['lang']['locale_code_incorrect']; ?>
', '>=^5'), Array('.translate')), 'xajax_addLanguage', 'add_language_button', true);" type="submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" data-default-phrase="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
                    <a class="cancel" href="javascript:void(0)" onclick="show('lang_add_container')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>
            </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- add language form end -->
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
    <!-- add phrase form -->
    <div id="lang_add_phrase" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['add_phrase'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="" method="post" onsubmit="return false;">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
                <td class="field">
                    <input type="text" id="phrase_key" style="width: 200px;" maxlength="60" />
                </td>
            </tr>

            <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['phrase_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['phrase_foreach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['languages']):
        $this->_foreach['phrase_foreach']['iteration']++;
?>
            <tr>
                <td class="name">
                    <span><span class="red">*</span><?php echo $this->_tpl_vars['lang']['value']; ?>
 <span class="green_10">(<b><?php echo $this->_tpl_vars['languages']['name']; ?>
</b>)</span></span>
                </td>
                <td class="field">
                    <textarea rows="3" cols="" style="height: 50px;" name="<?php echo $this->_tpl_vars['languages']['Code']; ?>
"></textarea>
                </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['side']; ?>
</td>
                <td class="field">
                    <select id="phrase_side">
                        <option value="common" selected="selected"><?php echo $this->_tpl_vars['lang']['module_common']; ?>
</option>
                        <option value="frontEnd"><?php echo $this->_tpl_vars['lang']['module_frontEnd']; ?>
</option>
                        <option value="admin"><?php echo $this->_tpl_vars['lang']['module_admin']; ?>
</option>
                        <option value="category"><?php echo $this->_tpl_vars['lang']['module_category']; ?>
</option>
                        <option value="system"><?php echo $this->_tpl_vars['lang']['module_system']; ?>
</option>
                        <option value="box"><?php echo $this->_tpl_vars['lang']['module_box']; ?>
</option>
                    </select>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesAddPhraseField'), $this);?>


            <tr>
                <td></td>
                <td class="field">
                    <input id="add_phrase_submit" onclick="return rlCheck(Array(Array('phrase_key', '<?php echo $this->_tpl_vars['lang']['incorrect_phrase_key']; ?>
', '>^2' ), Array( 'phrase_side', '<?php echo $this->_tpl_vars['lang']['language_incorrect_date_format']; ?>
')), 'js_addPhrase', 'add_phrase_submit', true);" type="submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
                    <a class="cancel" href="javascript:void(0)" onclick="show('lang_add_phrase')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>
            </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- add phrase form end -->
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
    <!-- import -->
    <div id="import" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['import'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;import" method="post" enctype="multipart/form-data">
            <input type="hidden" name="import" value="true" />
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['sql_dump']; ?>
</td>
                <td class="field">
                    <input type="file" id="import_file" name="dump" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" value="<?php echo $this->_tpl_vars['lang']['go']; ?>
" />
                    <a class="cancel" href="javascript:void(0)" onclick="show('import')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>
            </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- import end -->
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit']): ?>
    <!-- compare -->
    <div id="compare" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['languages_compare'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;compare" method="post">
        <input type="hidden" name="compare" value="true" />
        <table class="form">
        <tr>
            <td class="name" style="width: 150px;"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['compare']; ?>
</td>
            <td class="field">
                <select name="lang_1" id="lang_1">
                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_list']):
?>
                    <option <?php if ($_POST['lang_1'] == $this->_tpl_vars['lang_list']['Code']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['lang_list']['Code']; ?>
"><?php echo $this->_tpl_vars['lang_list']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <?php echo $this->_tpl_vars['lang']['with']; ?>

                <select name="lang_2" id="lang_2">
                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_list']):
?>
                    <option <?php if ($_POST['lang_2'] == $this->_tpl_vars['lang_list']['Code']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['lang_list']['Code']; ?>
"><?php echo $this->_tpl_vars['lang_list']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['compare_mode']; ?>
</td>
            <td class="field">
                <select name="compare_mode">
                    <option <?php if ($_POST['compare_mode'] == 'phrases'): ?>selected="selected"<?php endif; ?> value="phrases"><?php echo $this->_tpl_vars['lang']['by_phrases_exist']; ?>
</option>
                    <option <?php if ($_POST['compare_mode'] == 'translation'): ?>selected="selected"<?php endif; ?> value="translation"><?php echo $this->_tpl_vars['lang']['by_translation_different']; ?>
</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['compare']; ?>
" />
                <a class="cancel" href="javascript:void(0)" onclick="show('compare')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
            </td>
        </tr>
        </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- compare end -->
    <?php endif; ?>

</div>

<?php if (isset ( $_GET['import'] )): ?>
<script type="text/javascript">
<?php echo '
    $(document).ready(function(){
        show(\'import\', \'#action_blocks div\');
    });
'; ?>

</script>
<?php endif; ?>

<!-- languages grid create -->
<div id="grid"></div>
<script>
var languagesGrid;
lang.warning                 = '<?php echo $this->_tpl_vars['lang']['warning']; ?>
';
lang.removing_english_notice = '<?php echo $this->_tpl_vars['lang']['removing_english_notice']; ?>
';
<?php echo '
/**
 * Prevent the losing phrases from English language
 * Offer to admin to compare them with other languages before removing
 *
 * @since 4.7.2 - Added new "action" parameter to first position
 *              - Changed type of "languageID" to mixed and name to "language"
 * @since 4.7.1
 *
 * @param {string} action      - remove|set_default
 * @param {mixed}  language    - ID/Code of language
 * @param {string} deleteMode  - Removing method (delete/trash)
 * @param {string} loadSection - Section which will be closed in end
 */
var apOfferComparePhrases = function(action, language, deleteMode, loadSection) {
    switch (action) {
        case \'remove\':
            if (!readCookie(\'ap_removing_english_notice\')) {
                createCookie(\'ap_removing_english_notice\', true);
                Ext.MessageBox.confirm(
                    lang.warning,
                    lang.removing_english_notice,
                    function(btn){
                        if (btn == \'yes\') {
                            Ext.MessageBox.hide();
                            $(\'#nav_bar .center_compare\').parent(\'a\').click();
                        } else {
                            rlConfirm(lang[\'ext_notice_\' + deleteMode], \'xajax_deleteLang\', language, loadSection);
                        }
                    }
                );
            } else {
                rlConfirm(lang[\'ext_notice_\' + deleteMode], \'xajax_deleteLang\', language, loadSection);
            }
            break;
        case \'set_default\':
            flynax.sendAjaxRequest(\'getCountMissingPhrases\', {language: language}, function(response) {
                if (response.status == \'OK\') {
                    if (response.count > 0) {
                        $(\'body\').flModal({
                            click  : false,
                            width  : 550,
                            height : \'auto\',
                            caption: \''; ?>
<?php echo $this->_tpl_vars['lang']['comparing_phrases_popup_title']; ?>
<?php echo '\',
                            content: \'<div id="modal_content">\' + lang.loading + \'</div>\',
                            onReady: function() {
                                var $closeButton = $(\'div.modal-window div span:last\');

                                var text = \''; ?>
<?php echo $this->_tpl_vars['lang']['comparing_phrases_popup_content']; ?>
<?php echo '\';
                                text = text.replace(\'{count}\', response.count);

                                var modalContent = text;
                                modalContent += \'<p><input type="button" name="ok" value="\';
                                modalContent += \''; ?>
<?php echo $this->_tpl_vars['lang']['import']; ?>
<?php echo '\' + \'">\';
                                modalContent += \'<a href="javascript://" class="cancel">\' + lang.cancel + \'</a></p>\';

                                $(\'#modal_content\').html(modalContent);

                                $(\'#modal_content [name="ok"]\').click(function () {
                                    $(this).val(lang.loading).prop(\'disabled\', true);
                                    $(\'#modal_content a.cancel\').hide();

                                    flynax.sendAjaxRequest(\'importMissingPhrases\', {language: language},
                                        function(response) {
                                            createCookie(\'ap_removing_english_notice\', true);
                                            $closeButton.click();
                                            xajax_setDefault(\'langs_container\', language);
                                        }
                                    );
                                });

                                $(\'#modal_content a.cancel\').click(function () {
                                    $closeButton.click();
                                });
                            }
                        });
                    } else {
                        xajax_setDefault(\'langs_container\', language);
                    }
                }
            });
            break;
    }
};

$(document).ready(function(){
    Ext.grid.defaultColumn = function(config){
        Ext.apply(this, config);
        if(!this.id){
            this.id = Ext.id();
        }
        this.renderer = this.renderer.createDelegate(this);
    };

    Ext.grid.defaultColumn.prototype = {
        init: function(grid) {
            this.grid = grid;
            this.grid.on(\'render\', function(){
                var view = this.grid.getView();
                view.mainBody.on(\'mousedown\', this.onMouseDown, this);
            }, this);
        },
        onMouseDown: function(e, t) {
            if (t.className && t.className.indexOf(\'x-grid3-cc-\' + this.id) != -1) {
                e.stopEvent();
                let index  = this.grid.getView().findRowIndex(t);
                let record = this.grid.store.getAt(index);

                if (!record.data[this.dataIndex] && record.data.Code) {
                    apOfferComparePhrases(\'set_default\', record.data.Code);
                }
            }
        },
        renderer : function(v, p, record){
            if (record.data.Status_key === \'approval\') {
                return \'\';
            }

            p.css += \' x-grid3-check-col-td\';
            return \'<div \'
                + (!v ? (\'ext:qtip="\' + lang.ext_set_default + \'"\') : \'\')
                + \' class="x-grid3-check-col\'
                + (v ? \'-on\' : \'\')
                + \' x-grid3-cc-\'
                + this.id
                + \'">&#160;</div>\';
        }
    };

    var defaultColumn = new Ext.grid.defaultColumn({
        header: lang[\'ext_default\'],
        dataIndex: \'Default\',
        width: 60,
        fixed: true
    });

    languagesGrid = new gridObj({
        key: \'languages\',
        id: \'grid\',
        ajaxUrl: rlUrlHome + \'controllers/languages.inc.php?q=ext_list\',
        defaultSortField: \'name\',
        title: lang[\'ext_languages_manager\'],
        fields: [
            {name: \'ID\', mapping: \'ID\', type: \'int\'},
            {name: \'Data\', mapping: \'Data\', type: \'string\'},
            {name: \'Code\', mapping: \'Code\', type: \'string\'},
            {name: \'name\', mapping: \'name\', type: \'string\'},
            {name: \'Default\', mapping: \'Default\', type: \'boolean\'},
            {name: \'Number\', mapping: \'Number\', type: \'string\'},
            {name: \'Direction\', mapping: \'Direction\', type: \'string\'},
            {name: \'Status\', mapping: \'Status\'},
            {name: \'Status_key\', mapping: \'Status_key\', type: \'string\'},
        ],
        columns: [
            {
                id: \'rlExt_item\',
                header: lang[\'ext_name\'],
                dataIndex: \'name\',
                width: 50
            },
            defaultColumn,
            {
                header: lang[\'ext_text_direction\'],
                dataIndex: \'Direction\',
                width: 10,
                editor: new Ext.form.ComboBox({
                    store: ['; ?>

                        ['ltr', '<?php echo $this->_tpl_vars['lang']['ltr_direction_title']; ?>
'],
                        ['rtl', '<?php echo $this->_tpl_vars['lang']['rtl_direction_title']; ?>
']
                    <?php echo '],
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
                header: lang[\'ext_phrases_number\'],
                dataIndex: \'Number\',
                width: 12,
                id: \'rlExt_item_bold\',
                renderer: function(data, param1, param2) {
                    data += \' <a onclick="phrasesManager(\'+param2.id+\')" class="green_11_bg" href="javascript:void(0)">'; ?>
<?php echo $this->_tpl_vars['lang']['manage_phrases']; ?>
<?php echo '</a>\';
                    return data;
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
                width: 80,
                fixed: true,
                dataIndex: \'Data\',
                sortable: false,
                renderer: function(data, column, row) {
                    data = data.split(\'|\');
                    var out = \'\';

                    if (rights[cKey].indexOf(\'edit\') >= 0) {
                        out += "<a href=\'" + rlUrlHome + "index.php?controller=" + controller;
                        out += "&action=export&lang=" + data[0] + "\'><img class=\'export\' ext:qtip=\'";
                        out += lang[\'ext_export\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' /></a>";

                        out += "<a href=\'" + rlUrlHome + "index.php?controller=" + controller;
                        out += "&action=edit&lang=" + data[0] + "\'><img class=\'edit\' ext:qtip=\'";
                        out += lang[\'ext_edit\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' /></a>";
                    }

                    if (rights[cKey].indexOf(\'delete\') >= 0 && !row.data.Default) {
                        var onclickFunction = \'\';

                        if (row.json.Code == \'en\') {
                            onclickFunction = "apOfferComparePhrases(\'remove\', \'";
                            onclickFunction += Array(data[0]) + "\', \'" + delete_mod + "\', \'admin_load\')";
                        } else {
                            onclickFunction = "rlConfirm(\'" + lang[\'ext_notice_\' + delete_mod] + "\', ";
                            onclickFunction += "\'xajax_deleteLang\'" + ", \'" + Array(data[0]) + "\', ";
                            onclickFunction += "\'admin_load\'" + \')\';
                        }

                        out += $(\'<a>\')
                                    .attr({
                                        href   : \'javascript:void(0)\',
                                        onclick: onclickFunction
                                    }).append(
                                        $(\'<img>\')
                                            .addClass(\'remove\')
                                            .attr({
                                                \'ext:qtip\': lang.ext_delete,
                                                src       : rlUrlHome + \'img/blank.gif\'})
                                    )[0].outerHTML;
                    }

                    return out;
                }
            }
        ]
    });

    languagesGrid.plugins.push(defaultColumn);

    '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesGrid'), $this);?>
<?php echo '

    languagesGrid.init();
    grid.push(languagesGrid.grid);

    // disallow to disable last active language
    languagesGrid.grid.addListener(\'beforeedit\', function(editEvent) {
        if (editEvent.field == \'Status\' && editEvent.value == lang.active) {
            // Prevent disabling the default language
            if (editEvent.record.data.Default) {
                return false;
            }

            // Prevent disabling all active languages
            if (languagesGrid.store.data.items) {
                var count_active_lang = 0;
                for (var i = languagesGrid.store.data.items.length - 1; i >= 0; i--) {
                    if (languagesGrid.store.data.items[i].data.Status ==  lang.active) {
                        count_active_lang++;
                    }
                }

                if (count_active_lang == 1) {
                    printMessage(\'error\', lang[\'ext_disallow_disable_lang\']);
                    return false;
                }
            }
        }
    });
});
'; ?>
</script>
<!-- languages grid create end -->

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesMiddle'), $this);?>


<!-- search button -->
<?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit']): ?>
<div class="aright" style="padding: 10px 0;">
    <a href="javascript:void(0)" onclick="show('lang_search_block');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
</div>
<?php endif; ?>
<!-- search button end -->

<!-- search block -->
<?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit']): ?>
<div id="lang_search_block" class="hide">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <table class="form">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['phrase']; ?>
</td>
        <td class="field">
            <input type="text" id="phrase" style="width:400px;max-width:400px;"/>
            <label style="display:block;padding: 5px 0;"><input type="checkbox" id="exact_match" /> <?php echo $this->_tpl_vars['lang']['keyword_search_opt3']; ?>
</label>
        </td>
    </tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['search_in']; ?>
</td>
        <td class="field">
            <label><input name="criteria" type="radio" id="in_value" checked="checked" /> <?php echo $this->_tpl_vars['lang']['phrase_text']; ?>
</label>
            <label><input name="criteria" type="radio" id="in_key" /> <?php echo $this->_tpl_vars['lang']['phrase_key']; ?>
</label>
        </td>
    </tr>
    <tr>
        <td class="name" style="text-transform: capitalize;"><?php echo $this->_tpl_vars['lang']['language']; ?>
</td>
        <td class="field">
            <select class="<?php if ($this->_tpl_vars['langCount'] < 2): ?>disabled<?php endif; ?>" id="in_language" <?php if ($this->_tpl_vars['langCount'] < 2): ?>disabled<?php endif; ?>>
            <?php if ($this->_tpl_vars['langCount'] > 1): ?><option value="all"><?php echo $this->_tpl_vars['lang']['all']; ?>
</option><?php endif; ?>
            <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lang_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lang_foreach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['languages']):
        $this->_foreach['lang_foreach']['iteration']++;
?>
                <option value="<?php echo $this->_tpl_vars['languages']['Code']; ?>
"><?php echo $this->_tpl_vars['languages']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['search_in_plugins']; ?>
</td>
        <td class="field">
            <label><input name="search_in_plugins" type="radio" value="0" checked /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            <label><input name="search_in_plugins" type="radio" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
        </td>
    </tr>
    </table>

    <div class="hide" id="plugins_list" style="margin-left: 185px;">
        <select id="in_plugin">
            <option value="all"><?php echo $this->_tpl_vars['lang']['all']; ?>
</option>
            <?php $_from = $this->_tpl_vars['plugins_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin']):
?>
                <option value="<?php echo $this->_tpl_vars['plugin']['Key']; ?>
"><?php echo $this->_tpl_vars['plugin']['Name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>

    <table class="form">
    <tr>
        <td class="name no_divider"></td>
        <td class="field">
            <input id="search_button" type="button" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
            <div class="loader" id="search_load"></div> <a class="cancel" href="javascript:void(0)" onclick="show('lang_search_block')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
        </td>
    </tr>
    </table>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>
<!-- search block end -->

<!-- phrases grid -->
<div id="phrases"></div>
<script type="text/javascript">//<![CDATA[
var phrasesGrid;

<?php echo '
$(document).ready(function(){

    phrasesGrid = new gridObj({
        key: \'phrases\',
        id: \'phrases\',
        ajaxUrl: rlUrlHome + \'controllers/languages.inc.php?q=ext\',
        updateMethod: \'POST\',
        defaultSortField: \'Value\',
        title: lang[\'ext_phrases_manager\'],
        fields: [
            {name: \'Module\', mapping: \'Module\'},
            {name: \'Key\', type: \'string\'},
            {name: \'JS\', mapping: \'JS\'},
            {name: \'Direction\', mapping: \'Direction\'},
            {name: \'Value\', mapping: \'Value\', type: \'string\'}
        ],
        columns: [
            {
                header: lang[\'ext_key\'],
                dataIndex: \'Key\',
                width: 30
            },{
                id: \'rlExt_item\',
                header: lang[\'ext_value\'],
                dataIndex: \'Value\',
                width: 60,
                editor: new Ext.form.TextArea({
                    allowBlank: false,
                    listeners: {
                        beforeshow: function(ext){
                            $(\'#\' + ext.id).css(\'direction\', ext.gridEditor.record.data.Direction);
                        }
                    }
                }),
                renderer: function(val, ext, row){
                    return \'<span dir="\' + row.data.Direction + \'" ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + val + \'</span>\';
                }
            },{
                header: \'JS\',
                dataIndex: \'JS\',
                fixed: true,
                width: 70,
                editor: new Ext.form.ComboBox({
                    store: [
                        [\'1\', lang[\'ext_yes\']],
                        [\'0\', lang[\'ext_no\']]
                    ],
                    displayField: \'value\',
                    valueField: \'key\',
                    emptyText: lang[\'ext_not_available\'],
                    typeAhead: true,
                    mode: \'local\',
                    triggerAction: \'all\',
                    selectOnFocus: true
                }),
                renderer: function(val){
                    return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                }
            },{
                header: lang[\'ext_side\'],
                dataIndex: \'Module\',
                width: 15,
                editor: new Ext.form.ComboBox({
                    store: [
                        [\'common\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_common']; ?>
'<?php echo '],
                        [\'frontEnd\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_frontEnd']; ?>
'<?php echo '],
                        [\'admin\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_admin']; ?>
'<?php echo '],
                        [\'category\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_category']; ?>
'<?php echo '],
                        [\'system\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_system']; ?>
'<?php echo '],
                        [\'box\', '; ?>
'<?php echo $this->_tpl_vars['lang']['module_box']; ?>
'<?php echo ']
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
            }
        ]
    });

    $(\'input[name=search_in_plugins]\').click(function() {
        if (parseInt($(this).val()))
            $(\'#plugins_list\').slideDown(\'fast\');
        else
            $(\'#plugins_list\').slideUp(\'fast\');
    });

    $(\'input#search_button\').click(function(){
        current_lang_id = false;

        var phrase = $(\'#phrase\').val();
        var search_lang= $(\'#in_language\').val();
        var criteria = $(\'#in_value\').is(\':checked\') ? \'in_value\' : \'in_key\';
        var exact_match = $(\'input#exact_match\').is(\':checked\') ? 1 : 0;
        var search_in_plugins = parseInt($(\'input[name=search_in_plugins]:checked\').val());
        var plugin = $(\'select#in_plugin\').val();

        if ( phrase != \'\' || (search_in_plugins && plugin != \'all\') )
        {
            var search = new Array();
            search.push( new Array(\'action\', \'search\') );
            search.push( new Array(\'criteria\', criteria) );
            search.push( new Array(\'phrase\', phrase) );
            search.push( new Array(\'lang_code\', search_lang) );
            search.push( new Array(\'exact_match\', exact_match) );

            //
            if (search_in_plugins)
                search.push( new Array(\'plugin\', plugin) );

            phrasesGrid.filters = search;

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesPhrasesGrid'), $this);?>
<?php echo '

            if ( !phrasesGridPush )
            {
                phrasesGrid.init();
                grid.push(phrasesGrid.grid)
                phrasesGridPush = true;
            }
            else
            {
                phrasesGrid.reload();
            }
        }
    });
});

var phrasesGridPush = false;
var current_lang_id = false;
var phrasesManager = function(id){
    if ( current_lang_id != id )
    {
        phrasesGrid.filters = new Array();
        phrasesGrid.filters[0] = [\'lang_id\', id];
        current_lang_id = id;

        if ( !phrasesGridPush )
        {
            phrasesGrid.init();
            grid.push(phrasesGrid.grid)
            phrasesGridPush = true;
        }
        else
        {
            phrasesGrid.resetPage();
            phrasesGrid.reload();
        }
    }
};

/**
 * @since 4.9.1
 */
let translationPopup;

/**
 * @since 4.9.1
 *
 * @param translated - Count of translated phrases
 * @param target     - Target language code (for example "fr" for french)
 * @param source     - Source language code (for example "en" for english)
 */
const translatePhrases = function (translated, target, source) {
    // Adapt parameters from rlConfirm() function call
    if (typeof translated === \'object\' && !target && !source) {
        target     = translated[1];
        translated = translated[0];
    }

    if (Number(translated) === 0) {
        translationPopup = flynax.buildProgressPopup(lang.translate_phrases_popup_title);
    }

    flynax.sendAjaxRequest(
        \'translatePhrases\',
        {translated: translated, target: target, source: source},
        function(response) {
            if (response.action === \'next\') {
                translationPopup.updateProgress(response.progress / 100);
                translatePhrases(response.translated, target);
            } else {
                translationPopup.updateProgress(1);
                languagesGrid.reload();

                setTimeout(function () {
                    printMessage(\'notice\', lang.translate_phrases_completed);
                    translationPopup.hide();
                }, 1000);
            }
        },
        function (response) {
            translationPopup.hide();
            printMessage(\'error\', response.message ? response.message : lang.system_error);
        }
    );
}

'; ?>

//]]>
</script>
<!-- phrases grid end -->

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLanguagesBottom'), $this);?>


<?php endif; ?>

<!-- languages tpl end -->