<?php /* Smarty version 2.6.31, created on 2025-08-20 18:12:37
         compiled from controllers/account_fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/account_fields.tpl', 5, false),array('modifier', 'cat', 'controllers/account_fields.tpl', 20, false),)), $this); ?>
    <!-- register fields tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountFieldsNavBar'), $this);?>


    <?php if (! isset ( $_GET['action'] )): ?>
        <a href="javascript:void(0)" onclick="show('search', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_field']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['fields_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<div id="action_blocks">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields') : smarty_modifier_cat($_tmp, 'fields')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'search_form.tpl') : smarty_modifier_cat($_tmp, 'search_form.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php if ($_GET['action']): ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields') : smarty_modifier_cat($_tmp, 'fields')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'add_edit_form.tpl') : smarty_modifier_cat($_tmp, 'add_edit_form.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>

    <!-- account fields grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var accountFieldsGrid;
    
    <?php echo '
    $(document).ready(function(){
        
        accountFieldsGrid = new gridObj({
            key: \'accountFields\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/account_fields.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_account_fields_manager\'],
            remoteSortable: true,
            filters: cookie_filters,
            fields: [
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Required\', mapping: \'Required\'},
                {name: \'Map\', mapping: \'Map\'},
                {name: \'Short_form\', mapping: \'Short_form\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Key\', mapping: \'Key\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 60,
                    id: \'rlExt_item_bold\'
                },{
                    id: \'rlExt_item\',
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    fixed: true,
                    width: 150,
                },{
                    header: lang[\'ext_required_field\'],
                    dataIndex: \'Required\',
                    fixed: true,
                    width: 110,
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
                        selectOnFocus:true
                    }),
                    renderer: function(val, ext, row){
                        var hint = row.data.Type != \''; ?>
<?php echo $this->_tpl_vars['lang']['type_accept']; ?>
<?php echo '\' 
                        ? lang[\'ext_click_to_edit\']
                        : lang[\'ext_accept_must_be_required\'];

                        return \'<span ext:qtip="\' + hint + \'">\' + val + \'</span>\';
                    }
                },{
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['google_map']; ?>
<?php echo '\',
                    dataIndex: \'Map\',
                    fixed: true,
                    width: 110,
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
                    width: 70,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";
                        var splitter = false;
                        
                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&field="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_delete\']+"\\", \\"xajax_deleteAField\\", \\""+Array(data)+"\\", \\"field_load\\" )\' />";
                        }
                        out += "</center>";
                        
                        return out;
                    }
                }
            ]
        });
        
        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountFieldsGrid'), $this);?>
<?php echo '
        
        accountFieldsGrid.init();
        grid.push(accountFieldsGrid.grid);

        // prevent of disabling the option "Required" for agreement fields
        accountFieldsGrid.grid.addListener(\'beforeedit\', function(editEvent){
            if (editEvent.field == \'Required\' 
                && editEvent.record.data.Type == \''; ?>
<?php echo $this->_tpl_vars['lang']['type_accept']; ?>
<?php echo '\'
            ) {
                editEvent.cancel = true;
                accountFieldsGrid.store.rejectChanges();
            }
        });
    });
    '; ?>

    //]]>
    </script>
    <!-- account fields grid end -->
    
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountFieldsBottom'), $this);?>


<?php endif; ?>

<!-- register fields tpl end -->