<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:29
         compiled from controllers/payment_gateways.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/payment_gateways.tpl', 6, false),array('modifier', 'cat', 'controllers/payment_gateways.tpl', 15, false),array('modifier', 'count', 'controllers/payment_gateways.tpl', 29, false),)), $this); ?>
<!-- payment gateways tpl -->

<!-- navigation bar -->
<?php if ($_GET['action']): ?>
    <div id="nav_bar">
        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPaymentGatewaysNavBar'), $this);?>

        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['payment_gateways']; ?>
</span><span class="right"></span></a>
    </div>
<?php endif; ?>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>
    <?php $this->assign('sPost', $_POST); ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;item=<?php echo $_GET['item']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="submit" value="1" />

        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
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
        
            <?php $_from = $this->_tpl_vars['gateway_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['configItem']):
?>
                <?php if ($this->_tpl_vars['configItem']['Type'] == 'text' || $this->_tpl_vars['configItem']['Type'] == 'textarea' || $this->_tpl_vars['configItem']['Type'] == 'bool' || $this->_tpl_vars['configItem']['Type'] == 'select' || $this->_tpl_vars['configItem']['Type'] == 'radio'): ?>
                <tr>
                    <td class="name"><?php if ($this->_tpl_vars['configItem']['required']): ?><span class="red">*</span><?php endif; ?><?php echo $this->_tpl_vars['configItem']['name']; ?>
</td>
                    <td class="field">
                        <div class="inner_margin">
                            <?php if ($this->_tpl_vars['configItem']['Type'] == 'text'): ?>
                                <input name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
]" class="<?php if ($this->_tpl_vars['configItem']['Data_type'] == 'int'): ?>numeric<?php endif; ?>" type="text" value="<?php if ($this->_tpl_vars['sPost']['post_config'][$this->_tpl_vars['configItem']['Key']]): ?><?php echo $this->_tpl_vars['sPost']['post_config'][$this->_tpl_vars['configItem']['Key']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['configItem']['Default']; ?>
<?php endif; ?>" maxlength="255" />
                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'bool'): ?>
                                <label><input type="radio" <?php if ($this->_tpl_vars['configItem']['Default'] == 1): ?>checked="checked"<?php endif; ?> name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
]" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                                <label><input type="radio" <?php if ($this->_tpl_vars['configItem']['Default'] == 0): ?>checked="checked"<?php endif; ?> name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
]" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'textarea'): ?>
                                <textarea cols="5" rows="5" class="<?php if ($this->_tpl_vars['configItem']['Data_type'] == 'int'): ?>numeric<?php endif; ?>" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
]"><?php if ($this->_tpl_vars['sPost']['post_config'][$this->_tpl_vars['configItem']['Key']]): ?><?php echo $this->_tpl_vars['sPost']['post_config'][$this->_tpl_vars['configItem']['Key']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['configItem']['Default']; ?>
<?php endif; ?></textarea>
                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'select'): ?>
                                <select <?php if ($this->_tpl_vars['configItem']['Key'] == 'timezone'): ?>class="w350"<?php endif; ?> style="width: 204px;" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
]" <?php if (count($this->_tpl_vars['configItem']['Values']) < 2): ?> class="disabled" disabled="disabled"<?php endif; ?>>
                                    <?php if (count($this->_tpl_vars['configItem']['Values']) > 1): ?>
                                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                    <?php endif; ?>
                                    <?php $_from = $this->_tpl_vars['configItem']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sForeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sForeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sValue']):
        $this->_foreach['sForeach']['iteration']++;
?>
                                        <option value="<?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php echo $this->_tpl_vars['sValue']['ID']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sValue']; ?>
<?php endif; ?>" <?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php if ($this->_tpl_vars['configItem']['Default'] == $this->_tpl_vars['sValue']['ID'] || $this->_tpl_vars['sPost']['post_config'][$this->_tpl_vars['configItem']['Key']] == $this->_tpl_vars['sValue']['ID']): ?>selected="selected"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['sValue'] == $this->_tpl_vars['configItem']['Default']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php echo $this->_tpl_vars['sValue']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sValue']; ?>
<?php endif; ?></option>
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>
                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'radio'): ?>
                                <?php $this->assign('displayItem', $this->_tpl_vars['configItem']['Display']); ?>
                                <?php $_from = $this->_tpl_vars['configItem']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rForeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rForeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rKey'] => $this->_tpl_vars['rValue']):
        $this->_foreach['rForeach']['iteration']++;
?>
                                    <input id="radio_<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_<?php echo $this->_tpl_vars['rKey']; ?>
" <?php if ($this->_tpl_vars['rValue'] == $this->_tpl_vars['configItem']['Default']): ?>checked="checked"<?php endif; ?> type="radio" value="<?php echo $this->_tpl_vars['rValue']; ?>
" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" /><label for="radio_<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_<?php echo $this->_tpl_vars['rKey']; ?>
">&nbsp;<?php echo $this->_tpl_vars['displayItem'][$this->_tpl_vars['rKey']]; ?>
&nbsp;&nbsp;</label>
                                <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                                <?php echo $this->_tpl_vars['configItem']['Default']; ?>

                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['configItem']['des'] != ''): ?>
                                <span style="<?php if ($this->_tpl_vars['configItem']['Type'] == 'textarea'): ?>line-height: 10px;<?php elseif ($this->_tpl_vars['configItem']['Type'] == 'bool'): ?>line-height: 14px;margin: 0 10px;<?php endif; ?>" class="settings_desc"><?php echo $this->_tpl_vars['configItem']['des']; ?>
</span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['gateway_info']['Recurring_editable']): ?>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['recurring']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'recurring'); ?>
                    
                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>
                    
                    <input <?php echo $this->_tpl_vars['recurring_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['recurring_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            <?php endif; ?>
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
<?php else: ?>
    <!-- payment gateways grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var paymentGatewaysGrid;

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
                        url: rlUrlHome + \'controllers/payment_gateways.inc.php?q=ext\',
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
                            paymentGatewaysGrid.store.commitChanges();
                            paymentGatewaysGrid.reload();
                        }
                    });
                }
            },
            renderer : function(v, p, record){
                if (record.data.Status_key == \'approval\') {
                    return \'\';
                }

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
        
        paymentGatewaysGrid = new gridObj({
            key: \'payment_gateways\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/payment_gateways.inc.php?q=ext\',
            defaultSortField: \'ID\',
            remoteSortable: true,
            checkbox: false,
            actions: [
                [lang[\'ext_delete\'], \'delete\']
            ],
            title: lang[\'ext_payment_gateways_manager\'],

            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'name\', mapping: \'name\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'Plugin\', mapping: \'Plugin\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\', type: \'string\'},
                {name: \'Status_key\', mapping: \'Status_key\', type: \'string\'},
                {name: \'Recurring\', mapping: \'Recurring\', type: \'string\'},
                {name: \'Default\', mapping: \'Default\'},
                {name: \'Type\', mapping: \'Type\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 3,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 20,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    width: 15
                },{
                    header: lang[\'ext_recurring\'],
                    dataIndex: \'Recurring\',
                    width: 10
                },
                defaultColumn,
                {
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 100,
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
                    width: 50,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        return "<center><a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&item="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a></center>";
                    }
                }
            ]
        });

        paymentGatewaysGrid.plugins.push(defaultColumn);

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPaymentGatewaysGrid'), $this);?>
<?php echo '

        paymentGatewaysGrid.init();
        grid.push(paymentGatewaysGrid.grid);

        paymentGatewaysGrid.grid.addListener(\'afteredit\', function(editEvent){
            if (\'Status\' == editEvent.field) {
                paymentGatewaysGrid.reload();
            }
        });
    });
    '; ?>

    //]]>
    </script>
    <!-- payment gateways grid end -->
<?php endif; ?>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPaymentGatewaysBottom'), $this);?>


<!-- payment gateways tpl end -->