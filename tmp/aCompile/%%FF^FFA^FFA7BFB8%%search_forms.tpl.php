<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:49
         compiled from controllers/search_forms.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/search_forms.tpl', 7, false),array('modifier', 'cat', 'controllers/search_forms.tpl', 22, false),array('modifier', 'count', 'controllers/search_forms.tpl', 63, false),)), $this); ?>
<!-- search forms tpl -->

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSearchFormsNavBar'), $this);?>


    <?php if ($_GET['action'] == 'edit'): ?><a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=build&amp;form=<?php echo $_GET['form']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['build_form']; ?>
</span><span class="right"></span></a><?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_form']; ?>
</span><span class="right"></span></a>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['forms_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if (isset ( $_GET['action'] )): ?>

    <?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

        <?php $this->assign('sPost', $_POST); ?>

        <!-- add/edit form -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <form  onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;form=<?php echo $_GET['form']; ?>
<?php endif; ?>" method="post">
                <input type="hidden" name="submit" value="1" />
                <?php if ($_GET['action'] == 'edit'): ?>
                    <input type="hidden" name="fromPost" value="1" />
                <?php endif; ?>

                <table class="form">
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['form_type']; ?>
</td>
                    <td class="field">
                        <select name="form_type" <?php if ($_GET['action'] == 'edit'): ?>disabled="disabled"<?php endif; ?>>
                            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['form_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['form_key'] => $this->_tpl_vars['form_name']):
?>
                                <option value="<?php echo $this->_tpl_vars['form_key']; ?>
" <?php if ($this->_tpl_vars['sPost']['form_type'] == $this->_tpl_vars['form_key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['form_name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <?php if ($_GET['action'] == 'edit'): ?>
                            <input type="hidden" name="form_type" value="<?php echo $this->_tpl_vars['sPost']['form_type']; ?>
" />
                        <?php endif; ?>
                    </td>
                </tr>
                </table>

                <div id="form_key" class="form-option hide">
                    <table class="form">
                    <tr>
                        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
                        <td class="field">
                            <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled<?php endif; ?>" name="key" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['key']; ?>
" maxlength="30" />
                        </td>
                    </tr>
                    </table>
                </div>

                <table class="form">
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
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
                    <td class="field">
                        <?php if ($_GET['action'] == 'add' || ! $this->_tpl_vars['sPost']['readonly']): ?>
                            <select name="type" style="width: 200px;">
                                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                                    <option value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php else: ?>
                            <input style="width: 150px" class="disabled" type="text" disabled="disabled" value="<?php echo $this->_tpl_vars['listing_types'][$this->_tpl_vars['sPost']['type']]['name']; ?>
" />
                            <input type="hidden" name="type" value="<?php echo $this->_tpl_vars['sPost']['type']; ?>
" />
                        <?php endif; ?>
                    </td>
                </tr>
                </table>

                <?php if ($_GET['action'] == 'add' || ! $this->_tpl_vars['sPost']['readonly']): ?>
                    <div id="select_category" class="form-option hide">
                        <table class="form">
                        <tr>
                            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['show_in_category']; ?>
</td>
                            <td class="field">
                                <select name="category_id" style="width: 200px;">
                                    <option value=""><?php echo $this->_tpl_vars['lang']['choose_listing_type']; ?>
</option>
                                </select>

                                <div style="padding: 10px 0 0 0;">
                                    <label style="padding-bottom: 10px;"><input <?php if (! empty ( $this->_tpl_vars['sPost']['subcategories'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="subcategories" value="1" /> <?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
                                </div>
                            </td>
                        </tr>
                        </table>
                    </div>

                    <script>
                    var category_selected = <?php if ($this->_tpl_vars['sPost']['category_id']): ?><?php echo $this->_tpl_vars['sPost']['category_id']; ?>
<?php else: ?>false<?php endif; ?>;
                    <?php echo '

                    $(document).ready(function(){
                        $(\'select[name=category_id]\').categoryDropdown({
                            listingType: \'select[name=type]\',
                            default_selection: category_selected,
                            phrases: { '; ?>

                                no_categories_available: "<?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
",
                                select: "<?php echo $this->_tpl_vars['lang']['select']; ?>
",
                                select_category: "<?php echo $this->_tpl_vars['lang']['select_category']; ?>
"
                            <?php echo ' }
                        });
                    });

                    '; ?>

                    </script>
                <?php endif; ?>

                <div id="use_groups" class="form-option hide">
                    <table class="form">
                    <tr>
                        <td class="name"><?php echo $this->_tpl_vars['lang']['use_groups']; ?>
</td>
                        <td class="field">
                            <?php if ($this->_tpl_vars['no_groups']): ?>
                                <?php echo $this->_tpl_vars['lang']['not_available']; ?>

                            <?php else: ?>
                                <label><input <?php if ($this->_tpl_vars['sPost']['groups']): ?>checked="checked"<?php endif; ?>type="radio" name="groups" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                <label><input <?php if (! $this->_tpl_vars['sPost']['groups']): ?>checked="checked"<?php endif; ?> type="radio" name="groups" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                            <?php endif; ?>
                        </td>
                    </tr>
                    </table>
                </div>

                <table class="form">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['with_picture_option']; ?>
</td>
                    <td class="field">
                        <label><input <?php if ($this->_tpl_vars['sPost']['with_picture']): ?>checked="checked"<?php endif; ?>type="radio" name="with_picture" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <label><input <?php if (! $this->_tpl_vars['sPost']['with_picture']): ?>checked="checked"<?php endif; ?> type="radio" name="with_picture" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                </tr>

                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSearchFormsForm'), $this);?>


                <tr>
                    <td class="name">
                        <?php if (! ( ! $this->_tpl_vars['tpl_settings']['search_on_map_page'] && $this->_tpl_vars['form_info']['Mode'] == 'on_map' )): ?>
                            <span class="red">*</span>
                        <?php endif; ?>
                        <?php echo $this->_tpl_vars['lang']['status']; ?>

                    </td>
                    <td class="field">
                        <?php if (! $this->_tpl_vars['tpl_settings']['search_on_map_page'] && $this->_tpl_vars['form_info']['Mode'] == 'on_map'): ?>
                            <span class="field_description" style="margin-left: 0;"><?php echo $this->_tpl_vars['lang']['template_incompatible_hint']; ?>
</span>
                        <?php else: ?>
                            <select name="status">
                                <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                                <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                            </select>
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
        <!-- add/edit form end -->

        <script>
        <?php echo '

        $(document).ready(function(){
            $(\'select[name=form_type]\').change(function(){
                formTypeChange();
            });

            formTypeChange();
        });

        var formTypeChange = function(){
            var type = $(\'select[name=form_type]\').val();


            $(\'.form-option\').slideUp();

            switch(type) {
                case \'custom\':
                    $(\'#form_key,#use_groups\').slideDown();
                    break;

                case \'in_category\':
                    $(\'#select_category\').slideDown();
                    break;
            }
        }

        '; ?>

        </script>

    <?php elseif ($_GET['action'] == 'build'): ?>

        <?php if (! $this->_tpl_vars['form_info']['Groups']): ?>
            <?php $this->assign('no_groups', true); ?>
        <?php endif; ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder.tpl') : smarty_modifier_cat($_tmp, 'builder.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php endif; ?>

<?php else: ?>

    <!-- search forms grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var with_picture_option_phrase = "<?php echo $this->_tpl_vars['lang']['with_picture_option']; ?>
";
    var searchFormsGrid;

    <?php echo '
    $(document).ready(function(){

        searchFormsGrid = new gridObj({
            key: \'searchForms\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/search_forms.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_search_forms_manager\'],
            fields: [
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Mode\', mapping: \'Mode\'},
                {name: \'Mode_key\', mapping: \'Mode_key\'},
                {name: \'Groups\', mapping: \'Groups\'},
                {name: \'With_picture\', mapping: \'With_picture\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Status_key\', mapping: \'Status_key\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'no_groups\', mapping: \'no_groups\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 50,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Mode\',
                    width: 130,
                    fixed: true,
                    id: \'rlExt_item\'
                },{
                    header: "'; ?>
<?php echo $this->_tpl_vars['lang']['listing_type']; ?>
<?php echo '",
                    dataIndex: \'Type\',
                    width: 130,
                    fixed: true,
                },{
                    header: with_picture_option_phrase,
                    dataIndex: \'With_picture\',
                    width: 130,
                    fixed: true,
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
                    })
                },{
                    header: lang[\'ext_use_groups\'],
                    dataIndex: \'Groups\',
                    width: 130,
                    fixed: true,
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
                    renderer: function(val, ext, row){
                        if (row.data.no_groups) {
                            val = lang[\'ext_not_available\'];
                        }
                        return val;
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 90,
                    fixed: true,
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
                    width: 100,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";

                        out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=build&form="+data+"\'><img class=\'build\' ext:qtip=\'"+lang[\'ext_build\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&form="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deleteSearchForm\\", \\""+Array(data)+"\\", \\"section_load\\" )\' />";

                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSearchFormsGrid'), $this);?>
<?php echo '

        searchFormsGrid.init();
        grid.push(searchFormsGrid.grid);

        // before edit event handler
        searchFormsGrid.grid.addListener(\'beforeedit\', function(editEvent){
            if (editEvent.field == \'Groups\' && editEvent.record.data.no_groups) {
                return false;
            } else if (editEvent.field == \'Status\'
                       && editEvent.record.data.Mode_key == \'on_map\'
                       && editEvent.record.data.Status_key == \'incompatible\'
            ) {
                return false;
            }
        });

    });
    '; ?>

    //]]>
    </script>
    <!-- search forms grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSearchFormsBottom'), $this);?>


<?php endif; ?>

<!-- search form tpl end -->