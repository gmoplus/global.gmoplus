<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:25
         compiled from controllers/data_formats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/data_formats.tpl', 5, false),array('modifier', 'cat', 'controllers/data_formats.tpl', 25, false),array('modifier', 'count', 'controllers/data_formats.tpl', 42, false),array('modifier', 'in_array', 'controllers/data_formats.tpl', 231, false),)), $this); ?>
<!-- data formats tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <?php if ($_GET['mode']): ?>
            <a href="javascript:void(0)" onclick="show('new_item');$('#edit_item').slideUp('fast');" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_item']; ?>
</span><span class="right"></span></a>
        <?php elseif (! $_GET['action']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_format']; ?>
</span><span class="right"></span></a>
        <?php elseif ($_GET['action'] == 'edit'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
mode=manage&amp;format=<?php echo $_GET['format']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['manage']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['formats_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;format=<?php echo $_GET['format']; ?>
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
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>
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
" style="width: 250px;" maxlength="50" />
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
            <td class="name"><?php echo $this->_tpl_vars['lang']['order_type']; ?>
</td>
            <td class="field">
                <select name="order_type">
                    <option value="alphabetic" <?php if ($this->_tpl_vars['sPost']['order_type'] == 'alphabetic'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['alphabetic_order']; ?>
</option>
                    <option value="position" <?php if ($this->_tpl_vars['sPost']['order_type'] == 'position'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['position_order']; ?>
</option>
                </select>
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsAddFormatField'), $this);?>


        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
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
            <td class="name"><?php echo $this->_tpl_vars['lang']['enable_conversion']; ?>
</td>
            <td class="field">
                <?php if ($this->_tpl_vars['sPost']['conversion'] == '1'): ?>
                    <?php $this->assign('conv_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['conversion'] == '0'): ?>
                    <?php $this->assign('conv_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('conv_no', 'checked="checked"'); ?>
                <?php endif; ?>
                <label><input <?php echo $this->_tpl_vars['conv_yes']; ?>
 class="lang_add" type="radio" name="conversion" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['conv_no']; ?>
 class="lang_add" type="radio" name="conversion" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
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
    <!-- add end -->

<?php else: ?>
    <?php if ($_GET['mode'] === 'manage'): ?>
        <!-- add new item -->
        <div id="new_item" class="hide">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['add_item'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <form onsubmit="addItem();$('input[name=item_submit]').val('<?php echo $this->_tpl_vars['lang']['loading']; ?>
');return false;" action="" method="post">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
                <td class="field">
                    <input type="text" id="ni_key" style="width: 200px;" maxlength="60" />
                </td>
            </tr>

            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['value']; ?>
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
                        <input id="ni_<?php echo $this->_tpl_vars['language']['Code']; ?>
" type="text" style="width: 250px;" />
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsAddItemField'), $this);?>


            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select id="ni_status">
                        <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['default']; ?>
</td>
                <td class="field">
                    <input type="checkbox" id="ni_default" value="1" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" name="item_submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" />
                    <a onclick="$('#new_item').slideUp('normal')" href="javascript:void(0)" class="cancel"><?php echo $this->_tpl_vars['lang']['close']; ?>
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
        <!-- add new item end -->

        <!-- edit item -->
        <div id="edit_item" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['edit_item'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div id="prepare_edit_area">
                <div id="ei_loading" class="open_load" style="margin: 6px 0 0 10px;"><?php echo $this->_tpl_vars['lang']['preparing']; ?>
</div>
            </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <!-- edit item end -->
    <?php endif; ?>

    <?php echo '
    <script type="text/javascript">
    var addItem = function(){
    '; ?>

        var names = new Array();

        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['languages']):
?>
        names['<?php echo $this->_tpl_vars['languages']['Code']; ?>
'] = $('#ni_<?php echo $this->_tpl_vars['languages']['Code']; ?>
').val();
        <?php endforeach; endif; unset($_from); ?>

        xajax_addItem($('#ni_key').val(), names, $('#ni_status').val(), '<?php echo $_GET['format']; ?>
', $('#ni_default:checked').val());
    <?php echo '
    }
    </script>
    '; ?>


    <?php echo '
    <script type="text/javascript">
    var editItem = function(key){
    '; ?>

        var names = new Array();

        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['languages']):
?>
        names['<?php echo $this->_tpl_vars['languages']['Code']; ?>
'] = $('#ei_<?php echo $this->_tpl_vars['languages']['Code']; ?>
').val();
        <?php endforeach; endif; unset($_from); ?>

        xajax_editItem(key, names, $('#ei_status').val(), '<?php echo $_GET['format']; ?>
', $('#ei_default:checked').val());
    <?php echo '
    }
    </script>
    '; ?>

    <!-- add new item end -->

    <!-- data formats grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    <?php if ($_GET['mode'] == 'manage'): ?>
        var itemsGrid;
        var format = '<?php echo $_GET['format']; ?>
';

        var mass_actions = [
            [lang['ext_activate'], 'activate'],
            [lang['ext_suspend'], 'approve'],
            <?php if (((is_array($_tmp='delete')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['aRights']['listings']) : in_array($_tmp, $this->_tpl_vars['aRights']['listings']))): ?>[lang['ext_delete'], 'delete']<?php endif; ?>
            ];

        <?php echo '
        $(document).ready(function(){

            Ext.grid.defaultColumn = function(config){
                Ext.apply(this, config);
                if(!this.id){
                    this.id = Ext.id();
                }
                this.renderer = this.renderer.createDelegate(this);
            };

            Ext.grid.defaultColumn.prototype = {
                init : function(grid){
                    this.grid = grid;
                    this.grid.on(\'render\', function(){
                        var view = this.grid.getView();
                        view.mainBody.on(\'mousedown\', this.onMouseDown, this);
                    }, this);
                },
                onMouseDown : function(e, t){
                    if( t.className && t.className.indexOf(\'x-grid3-cc-\'+this.id) != -1 )
                    {
                        e.stopEvent();
                        var index = this.grid.getView().findRowIndex(t);
                        var record = this.grid.store.getAt(index);
                        record.set(this.dataIndex, !record.data[this.dataIndex]);
                        Ext.Ajax.request({
                            waitMsg: \'Saving changes...\',
                            url: rlUrlHome + \'controllers/data_formats.inc.php?q=ext\',
                            method: \'GET\',
                            params:
                            {
                                action: \'update\',
                                id: record.id,
                                field: this.dataIndex,
                                value: record.data[this.dataIndex]
                            },
                            failure: function()
                            {
                                Ext.MessageBox.alert(\'Error saving changes...\');
                            },
                            success: function()
                            {
                                itemsGrid.store.commitChanges();
                                itemsGrid.reload();
                            }
                        });
                    }
                },
                renderer : function(v, p, record){
                    p.css += \' x-grid3-check-col-td\';
                    return \'<div ext:qtip="\'+lang[\'ext_set_default\']+\'" class="x-grid3-check-col\'+(v?\'-on\':\'\')+\' x-grid3-cc-\'+this.id+\'">&#160;</div>\';
                }
            };

            var defaultColumn = new Ext.grid.defaultColumn({
                header: lang[\'ext_default\'],
                dataIndex: \'Default\',
                width: 60,
                fixed: true
            });

            itemsGrid = new gridObj({
                key: \'data_items\',
                id: \'grid\',
                ajaxUrl: rlUrlHome + \'controllers/data_formats.inc.php?q=ext&format=\'+format,
                defaultSortField: \'name\',
                remoteSortable: true,
                checkbox: true,
                actions: mass_actions,
                title: lang[\'ext_format_items_manager\'],
                fields: [
                    {name: \'name\', mapping: \'name\', type: \'string\'},
                    {name: \'Position\', mapping: \'Position\', type: \'int\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Key\', mapping: \'Key\'},
                    {name: \'Rate\', mapping: \'Rate\', xtype: \'float\', format:\'0.000\'},
                    {name: \'Default\', mapping: \'Default\'}
                ],
                columns: [
                    {
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        width: 40,
                        id: \'rlExt_item_bold\'
                    },'; ?>
<?php if ($this->_tpl_vars['format_info']['Conversion']): ?><?php echo '{
                        header: lang[\'ext_conversion_rate\'],
                        dataIndex: \'Rate\',
                        width: 70,
                        fixed: true,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowDecimals: true,
                            decimalPrecision: 10
                        }),
                        renderer: function(val){
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },'; ?>
<?php endif; ?>
                    <?php if ($this->_tpl_vars['format_info']['Order_type'] == 'position'): ?><?php echo '{
                        header: lang[\'ext_position\'],
                        dataIndex: \'Position\',
                        width: 70,
                        fixed: true,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowDecimals: false
                        }),
                        renderer: function(val){
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },'; ?>
<?php endif; ?><?php echo '
                    defaultColumn,
                    {
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 80,
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
                        width: 70,
                        fixed: true,
                        dataIndex: \'Key\',
                        sortable: false,
                        renderer: function(data) {
                            var out = "<center>";

                            if ( rights[cKey].indexOf(\'edit\') >= 0 )
                            {
                                out += "<img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'xajax_prepareEdit(\\""+data+"\\", \\""+format+"\\");$(\\"#edit_item\\").slideDown(\\"normal\\");$(\\"#new_item\\").slideUp(\\"fast\\");$(\\"#ei_loading\\").fadeIn(\\"fast\\")\' />";
                            }
                            if ( rights[cKey].indexOf(\'delete\') >= 0 )
                            {
                                out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'ext_notice_delete\']+"\\", \\"xajax_deleteItem\\", \\""+Array(data,format)+"\\" )\' />";
                            }
                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });

            itemsGrid.plugins.push(defaultColumn);

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsItemsGrid'), $this);?>
<?php echo '

            itemsGrid.init();
            grid.push(itemsGrid.grid);

            // actions listener
            itemsGrid.actionButton.addListener(\'click\', function()
            {
                var sel_obj = itemsGrid.checkboxColumn.getSelections();
                var action = itemsGrid.actionsDropDown.getValue();

                if (!action)
                {
                    return false;
                }

                for( var i = 0; i < sel_obj.length; i++ )
                {
                    itemsGrid.ids += sel_obj[i].id;
                    if ( sel_obj.length != i+1 )
                    {
                        itemsGrid.ids += \'|\';
                    }
                }

                switch (action){
                    case \'delete\':
                        Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn){
                            if ( btn == \'yes\' )
                            {
                                xajax_dfItemsMassActions( itemsGrid.ids, action );
                                itemsGrid.store.reload();
                            }
                        });

                        break;
                    default:
                        xajax_dfItemsMassActions( itemsGrid.ids, action );
                        itemsGrid.store.reload();
                        break;
                }

                itemsGrid.checkboxColumn.clearSelections();
                itemsGrid.actionsDropDown.setVisible(false);
                itemsGrid.actionButton.setVisible(false);
            });

        });
        '; ?>

    <?php else: ?>
        <?php echo '

        var dataFormatGrid;

        $(document).ready(function(){

            dataFormatGrid = new gridObj({
                key: \'data_formats\',
                id: \'grid\',
                ajaxUrl: rlUrlHome + \'controllers/data_formats.inc.php?q=ext\',
                defaultSortField: \'name\',
                title: lang[\'ext_data_formats_manager\'],
                fields: [
                    {name: \'name\', mapping: \'name\', type: \'string\'},
                    {name: \'Order_type\', mapping: \'Order_type\', type: \'string\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Key\', mapping: \'Key\'}
                ],
                columns: [
                    {
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        width: 40,
                        id: \'rlExt_item_bold\'
                    },{
                        header: '; ?>
'<?php echo $this->_tpl_vars['lang']['order_type']; ?>
'<?php echo ',
                        dataIndex: \'Order_type\',
                        width: 90,
                        fixed: true,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'alphabetic\', '; ?>
'<?php echo $this->_tpl_vars['lang']['alphabetic_order']; ?>
'<?php echo '],
                                [\'position\', '; ?>
'<?php echo $this->_tpl_vars['lang']['position_order']; ?>
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
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 80,
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
                        width: 90,
                        fixed: true,
                        dataIndex: \'Key\',
                        sortable: false,
                        renderer: function(data) {
                            var manage_link = data == \'years\' ? "eval(Ext.MessageBox.alert(\\""+lang[\'ext_notice\']+"\\", \\""+lang[\'ext_data_format_auto\']+"\\"))" : \'\';
                            var manage_href = data == \'years\' ? "javascript:void(0)" : rlUrlHome+"index.php?controller="+controller+"&mode=manage&format="+data;
                            var out = "<center>";
                            var splitter = false;

                            if ( rights[cKey].indexOf(\'edit\') >= 0 )
                            {
                                out += "<a href="+manage_href+" onclick=\'"+manage_link+"\'><img class=\'manage\' ext:qtip=\'"+lang[\'ext_manage\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                                out += "<a href="+rlUrlHome+"index.php?controller="+controller+"&action=edit&format="+data+"><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            }

                            if ( rights[cKey].indexOf(\'delete\') >= 0 )
                            {
                                out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deleteFormat\\", \\""+data+"\\" )\' />";
                            }
                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsGrid'), $this);?>
<?php echo '

            dataFormatGrid.init();
            grid.push(dataFormatGrid.grid);

        });
        '; ?>

    <?php endif; ?>
    //]]>
    </script>
    <!-- data formats grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDataFormatsBottom'), $this);?>

<?php endif; ?>

<!-- data formats tpl end -->