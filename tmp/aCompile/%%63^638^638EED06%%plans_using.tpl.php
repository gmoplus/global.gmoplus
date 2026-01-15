<?php /* Smarty version 2.6.31, created on 2025-08-29 19:29:27
         compiled from controllers/plans_using.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/plans_using.tpl', 5, false),array('modifier', 'cat', 'controllers/plans_using.tpl', 19, false),)), $this); ?>
<!-- plans using tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingNavBar'), $this);?>

    
    <?php if (! $_GET['action']): ?>
        <a href="javascript:void(0)" onclick="show('search', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
        <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['grant_plan']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['plans_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'add'): ?>
    <!-- add new entry -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;section=<?php echo $_GET['section']; ?>
<?php endif; ?>" method="post">
        <input type="hidden" name="submit" value="1" />

        <table class="form">
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
            <td class="field">
                <input name="account_id" type="text" value="" maxlength="30" />
                <script type="text/javascript">
                var account_id = <?php if ($_POST['account_id']): ?><?php echo $_POST['account_id']; ?>
<?php else: ?>false<?php endif; ?>;
                <?php echo '
                
                $(document).ready(function(){
                    $(\'input[name=account_id]\').rlAutoComplete({
                        add_id    : true,
                        add_type  : true,
                        id        : account_id,
                        afterload : function(account) {
                            var a_type    = account && account.Type ? account.Type : null;
                            var $packages = $(\'#packages option\');

                            $packages.addClass(\'hide\');

                            if (a_type) {
                                $(\'#packages\').removeClass(\'disabled\').removeAttr(\'disabled\');
                                $packages.eq(0).text(\''; ?>
<?php echo $this->_tpl_vars['lang']['select']; ?>
<?php echo '\').removeClass(\'hide\');

                                $packages.each(function(){
                                    if ($(this).val()) {
                                        var allow_for = $(this).data(\'allowFor\');

                                        if ((allow_for && allow_for.indexOf(a_type) >= 0) || allow_for == \'\') {
                                            $(this).removeClass(\'hide\');
                                        }
                                    }
                                });
                            }
                        }
                    });
                });

                '; ?>

                </script>
            </td>
        </tr>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['package_plan_short']; ?>
</td>
            <td class="field">
                <select id="packages" name="package_id" class="disabled" disabled="disabled">
                    <option value=""><?php echo $this->_tpl_vars['lang']['grant_plan_fill_username']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['plan']):
?>
                        <option <?php if ($this->_tpl_vars['plan']['ID'] == $_POST['package_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" data-allow-for="<?php echo $this->_tpl_vars['plan']['Allow_for']; ?>
" class="hide">
                            <?php echo $this->_tpl_vars['plan']['name']; ?>

                        </option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        
        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingAddField'), $this);?>

        
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
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
    <!-- add new entry end -->
<?php else: ?>
    <div id="action_blocks">
        <!-- search -->
        <div id="search" class="hide">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            
            <form method="post" onsubmit="return false;" id="search_form" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
">
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
                <td><input type="text" id="Username" /></td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['plan']; ?>
</td>
                <td class="field">
                    <select id="Plan_ID" style="width: 200px;">
                    <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                    <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['plan']):
?>
                        <option value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
"><?php echo $this->_tpl_vars['plan']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['plan_type']; ?>
</td>
                <td class="field">
                    <select id="Type" style="width: 200px;">
                        <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                        <option value="package"><?php echo $this->_tpl_vars['lang']['package_plan']; ?>
</option>
                        <option value="limited"><?php echo $this->_tpl_vars['lang']['limited_plan']; ?>
</option>
                    </select>
                </td>
            </tr>
            
            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingSearchField'), $this);?>

            
            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" class="button lang_add" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" id="search_button" />
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_search_button" />
            
                    <a class="cancel" href="javascript:void(0)" onclick="show('search')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
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
        
        <script type="text/javascript">
        <?php echo '
        
        var search = new Array();
        var write_filters = new Array();
        var cookie_filters = false;
    
        $(document).ready(function(){
            /* read cookies filters */
            if ( readCookie(\'plans_using_sc\') )
            {
                $(\'#search\').show();
                cookie_filters = readCookie(\'plans_using_sc\').split(\',\');
                
                for (var i in cookie_filters)
                {
                    if ( typeof(cookie_filters[i]) == \'string\' )
                    {
                        var item = cookie_filters[i].split(\'||\');
                        $(\'#\'+item[0]).selectOptions(item[1]);
                    }
                }
            }
            
            /* on search button click */
            $(\'#search_form\').submit(function(){
                
                if ( $(\'#ac_hidden\').val() != undefined )
                {
                    search.push(new Array(\'Username\', $(\'#Username\').val()));
                    write_filters.push(\'Username||\'+$(\'#Username\').val());
                }
                search.push(new Array(\'Plan_ID\', $(\'#Plan_ID\').val()));
                search.push(new Array(\'Type\', $(\'#Type\').val()));
                search.push(new Array(\'action\', \'search\'));
                
                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingSearchJS'), $this);?>
<?php echo '
                
                write_filters.push(\'Plan_ID||\'+$(\'#Plan_ID\').val());
                write_filters.push(\'Type||\'+$(\'#Type\').val());
                write_filters.push(\'action||search\');
                
                // save search criteria
                createCookie(\'plans_using_sc\', write_filters, 1);
                
                plansUsingGrid.filters = search;
                plansUsingGrid.reload();
            });
            
            $(\'#reset_search_button\').click(function(){
                plansUsingGrid.reload();
                eraseCookie(\'plans_using_sc\');

                $(\'#search input[type="text"]\').each(function() {
                    $(this).val(\'\');
                });
                $("#search select option:selected").attr(\'selected\', false);
            });
            
            /* autocomplete js */
            $(\'#Username\').rlAutoComplete({add_id: true});
        });
        
        '; ?>

        
        <?php if ($_GET['plan_id']): ?>
            cookie_filters = new Array();
            cookie_filters[0] = new Array('Plan_ID', '<?php echo $_GET['plan_id']; ?>
');
            cookie_filters.push(new Array('action', 'search'));
        <?php endif; ?>
        
        </script>
        <!-- search end -->
    </div>
    
    <!-- plans using grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var plansUsingGrid;
    
    <?php echo '
    $(document).ready(function(){
        
        plansUsingGrid = new gridObj({
            key: \'plansUsing\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/plans_using.inc.php?q=ext\',
            defaultSortField: \'ID\',
            defaultSortType: \'DESC\',
            filters: cookie_filters,
            title: lang[\'ext_plans_using_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'Username\', mapping: \'Username\', type: \'string\'},
                {name: \'Account_ID\', mapping: \'Account_ID\', type: \'int\'},
                {name: \'Plan_name\', mapping: \'Plan_name\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Type_key\', mapping: \'Type_key\'},
                {name: \'Price\', mapping: \'Price\'},
                {name: \'Listings_remains\', mapping: \'Listings_remains\'},
                {name: \'Standard_remains\', mapping: \'Standard_remains\'},
                {name: \'Featured_remains\', mapping: \'Featured_remains\'},
                {name: \'Advanced_mode\', mapping: \'Advanced_mode\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 3,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_username\'],
                    dataIndex: \'Username\',
                    width: 20,
                    id: \'rlExt_item\',
                    renderer: function(username, ext, row){
                        if ( username )
                        {
                            return "<span ext:qtip=\'"+lang[\'ext_click_to_view_details\']+"\' style=\'cursor: pointer;\' onClick=\'location.href=\\""+rlUrlHome+"index.php?controller=accounts&action=view&userid="+row.data.Account_ID+"\\"\'>"+username+"</span>"
                        }
                        else
                        {
                            return \'<span class="delete">'; ?>
<?php echo $this->_tpl_vars['lang']['account_removed']; ?>
<?php echo '</span>\';
                        }
                    }
                },{
                    header: lang[\'ext_plan\'],
                    dataIndex: \'Plan_name\',
                    width: 20
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    width: 10
                },{
                    header: lang[\'ext_price\']+\' (\'+rlCurrency+\')\',
                    dataIndex: \'Price\',
                    width: 8
                },{
                    header: lang[\'ext_balance\'],
                    dataIndex: \'Listings_remains\',
                    width: 8,
                    css: \'font-weight: bold;\',
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_standard_remains\'],
                    dataIndex: \'Standard_remains\',
                    width: 8,
                    css: \'font-weight: bold;\',
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val, ext, row){
                        var out;
                        if ( parseInt(row.data.Advanced_mode) )
                        {
                            out = \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                        else
                        {
                            out = \'<span ext:qtip="\'+lang[\'ext_not_available_for_this_plan\']+\'">\'+lang[\'ext_not_available\']+\'</span>\';
                        }
                        
                        return out;
                    }
                },{
                    header: lang[\'ext_featured_remains\'],
                    dataIndex: \'Featured_remains\',
                    width: 8,
                    css: \'font-weight: bold;\',
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val, ext, row){
                        var out;
                        if ( parseInt(row.data.Advanced_mode) )
                        {
                            out = \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                        else
                        {
                            out = \'<span ext:qtip="\'+lang[\'ext_not_available_for_this_plan\']+\'">\'+lang[\'ext_not_available\']+\'</span>\';
                        }
                        
                        return out;
                    }
                },{
                    header: lang[\'ext_date\'],
                    dataIndex: \'Date\',
                    width: 8,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                },{
                    header: lang[\'ext_actions\'],
                    width: 50,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(data) {
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            return "<center><img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deletePlanUsing\\", \\""+data+"\\", \\"load\\" )\' /></center>"
                        }
                    }
                }
            ]
        });
        
        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingGrid'), $this);?>
<?php echo '
        
        plansUsingGrid.init();
        grid.push(plansUsingGrid.grid);

        plansUsingGrid.grid.addListener(\'beforeedit\', function(editEvent) {
            if ((editEvent.field == \'Listings_remains\' || editEvent.field == \'Standard_remains\' || editEvent.field == \'Featured_remains\') && editEvent.record.data.Type_key == \'account\') {
                return false;
            }
        });
        
    });
    '; ?>

    //]]>
    </script>
    <!-- plans using grid end -->
    
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPlansUsingBottom'), $this);?>

    
<?php endif; ?>

<!-- plans using end tpl -->