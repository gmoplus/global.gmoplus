<?php /* Smarty version 2.6.31, created on 2025-07-28 12:50:00
         compiled from controllers/admins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/admins.tpl', 5, false),array('modifier', 'cat', 'controllers/admins.tpl', 20, false),array('modifier', 'in_array', 'controllers/admins.tpl', 110, false),)), $this); ?>
<!-- admins tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAdminsNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_admin']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['admins_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;admin=<?php echo $_GET['admin']; ?>
<?php endif; ?>" method="post">
        <!-- add/edit new admin -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['account_information'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>
        <table class="form">
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
            <td class="field">
                <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled <?php endif; ?>" name="login" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['login']; ?>
" maxlength="50" />
            </td>
        </tr>

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['password']; ?>
</td>
            <td class="field">
                <input name="password" type="password" style="width: 150px;" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['password_repeat']; ?>
</td>
            <td class="field">
                <input name="password_repeat" type="password" style="width: 150px;" maxlength="30" />
            </td>
        </tr>

        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
            <td class="field">
                <input name="name" type="text" style="width: 250px;" maxlength="100" value="<?php echo $this->_tpl_vars['sPost']['name']; ?>
" />
            </td>
        </tr>

        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
            <td class="field">
                <input name="email" type="text" style="width: 250px;" maxlength="100" value="<?php echo $this->_tpl_vars['sPost']['email']; ?>
" />
            </td>
        </tr>

        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</td>
            <td class="field">
                <input style="margin-left: 8px;" <?php if ($this->_tpl_vars['sPost']['type'] == 'super' || ! isset ( $this->_tpl_vars['sPost']['type'] )): ?>checked="checked"<?php endif; ?> class="mode" name="type" type="radio" id="type_super" value="super" /> <label for="type_super"><?php echo $this->_tpl_vars['lang']['super_admin']; ?>
</label>
                <input <?php if ($this->_tpl_vars['sPost']['type'] == 'limited'): ?>checked="checked"<?php endif; ?> class="mode" name="type" type="radio" id="type_limited" value="limited" /> <label for="type_limited"><?php echo $this->_tpl_vars['lang']['limited_account']; ?>
</label>
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAdminsForm'), $this);?>


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

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!-- add/edit admin end -->

        <!-- admin rules section -->
        <div id="super_area" <?php if ($this->_tpl_vars['sPost']['type'] == 'super' || ! isset ( $this->_tpl_vars['sPost']['type'] )): ?>class="hide"<?php endif; ?>>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['account_rules'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <?php $_from = $this->_tpl_vars['mMenuItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nParent']):
?>
                <fieldset style="margin: 5px 0;">
                    <legend id="legend_parent_<?php echo $this->_tpl_vars['nParent']['ID']; ?>
" class="up"><span onclick="fieldset_action('parent_<?php echo $this->_tpl_vars['nParent']['ID']; ?>
');"><?php echo $this->_tpl_vars['nParent']['name']; ?>
</span> (<span class="purple_12_cursor" onclick="$('#parent_<?php echo $this->_tpl_vars['nParent']['ID']; ?>
 input').prop('checked', true);"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span><label>|</label><span class="purple_12_cursor" onclick="$('#parent_<?php echo $this->_tpl_vars['nParent']['ID']; ?>
 input').prop('checked', false);"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>)</legend>
                    <div id="parent_<?php echo $this->_tpl_vars['nParent']['ID']; ?>
">
                    <?php $this->assign('pRights', $this->_tpl_vars['sPost']['rights']); ?>

                    <?php $_from = $this->_tpl_vars['nParent']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nChild']):
?>
                        <?php if ($this->_tpl_vars['nChild']['Key'] != 'home' && empty ( $this->_tpl_vars['nChild']['Vars'] )): ?>
                            <div style="margin: 7px 10px;">
                                <?php $this->assign('childKey', $this->_tpl_vars['nChild']['Key']); ?>
                                <input class="parent_input" <?php if (isset ( $this->_tpl_vars['pRights'][$this->_tpl_vars['childKey']] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="rights[<?php echo $this->_tpl_vars['nChild']['Key']; ?>
]" id="child_<?php echo $this->_tpl_vars['nChild']['Controller']; ?>
" />
                                <label for="child_<?php echo $this->_tpl_vars['nChild']['Controller']; ?>
" style="font-size: 12px;"><?php echo $this->_tpl_vars['nChild']['name']; ?>
</label>

                                <?php if (((is_array($_tmp=$this->_tpl_vars['childKey'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['extended_sections']) : in_array($_tmp, $this->_tpl_vars['extended_sections']))): ?>
                                    <div style="margin: 2px 20px;" class="rule">
                                        <div class="clear"></div>
                                        <?php $_from = $this->_tpl_vars['extended_modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mode']):
?>
                                            <div class="<?php echo $this->_tpl_vars['mode']; ?>
"><input <?php if ($this->_tpl_vars['pRights'][$this->_tpl_vars['childKey']][$this->_tpl_vars['mode']] == $this->_tpl_vars['mode']): ?>checked="checked"<?php endif; ?> name="rights[<?php echo $this->_tpl_vars['nChild']['Key']; ?>
][<?php echo $this->_tpl_vars['mode']; ?>
]" value="<?php echo $this->_tpl_vars['mode']; ?>
" id="label__<?php echo $this->_tpl_vars['childKey']; ?>
__<?php echo $this->_tpl_vars['mode']; ?>
" type="checkbox" /><label for="label__<?php echo $this->_tpl_vars['childKey']; ?>
__<?php echo $this->_tpl_vars['mode']; ?>
" style="padding: 0;"> <?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['mode']]; ?>
</label></div>
                                        <?php endforeach; endif; unset($_from); ?>
                                        <div class="clear"></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                </fieldset>
            <?php endforeach; endif; unset($_from); ?>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAdminsRules'), $this);?>


            <input style="margin-top: 10px;" type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['add']; ?>
<?php endif; ?>" />
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </form>
    <!-- admin rules section end -->

    <script type="text/javascript">
    <?php echo '

    $(document).ready(function(){
        $(\'.mode\').click(function(){
            if ( $(this).val() == \'super\' )
            {
                $(\'#super_area\').hide();
            }
            else
            {
                $(\'#super_area\').show();
            }
        });

        $(\'.parent_input\').click(function(){
            if ( $(this).attr(\'checked\') )
            {
                $(this).next().next(\'div\').children(\'div\').each(function(){
                    $(this).children(\'input\').prop(\'checked\', true);
                });
            }
        });

        $(\'.rule input\').click(function(){
            if ( $(this).attr(\'checked\') == true )
            {
                var id = $(this).attr(\'id\').split(\'__\')[1];
                $(\'#child_\'+id).prop(\'checked\', true);
            }
        });
    });

    '; ?>

    </script>

<?php else: ?>

    <!-- listing admins grid create -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var adminGrid;

    <?php echo '
    $(document).ready(function(){

        adminGrid = new gridObj({
            key: \'admins\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/admins.inc.php?q=ext\',
            defaultSortField: \'User\',
            title: lang[\'ext_admins_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\'},
                {name: \'User\', mapping: \'User\', type: \'string\'},
                {name: \'Name\', mapping: \'Name\', type: \'string\'},
                {name: \'Email\', mapping: \'Email\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Key\', mapping: \'Key\'}
            ],
            columns: [
                {
                    header: lang[\'ext_login\'],
                    dataIndex: \'User\',
                    id: \'rlExt_item_bold\',
                    width: 50,
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    id: \'rlExt_item\',
                    header: lang[\'ext_name\'],
                    dataIndex: \'Name\',
                    width: 20,
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_email\'],
                    dataIndex: \'Email\',
                    width: 20,
                    editor: new Ext.form.TextField({
                        allowBlank: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 13,
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
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";
                        var splitter = false;

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\\""+rlUrlHome+"index.php?controller="+controller+"&action=edit&admin="+data+"\\"><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            if (data == "'; ?>
<?php echo $_SESSION['sessAdmin']['user_id']; ?>
<?php echo '") {
                                var remove_notice = lang[\'ext_notice_removing_current_admin\'];
                            } else {
                                var remove_notice = lang[\'ext_notice_\'+delete_mod];
                            }
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+remove_notice+"\\", \\"xajax_deleteAdmin\\", \\""+Array(data)+"\\", \\"admin_load\\" )\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAdminsGrid'), $this);?>
<?php echo '

        adminGrid.init();
        grid.push(adminGrid.grid);

        adminGrid.grid.on(\'validateedit\', function(e) {
            if (e.field == \'Email\' && e.originalValue !== e.value) {
                var data = {
                    \'lookIn\': \'admins\',
                    \'byField\': \'Email\',
                    \'value\': e.value
                };

                flynax.sendAjaxRequest(\'isUserExist\', data, function() {
                    Ext.Ajax.request({
                        url: adminGrid.ajaxUrl,
                        method: adminGrid.ajaxMethod,
                        params: {
                            \'action\': \'update\',
                            \'id\': e.record.id,
                            \'field\': \'Email\',
                            \'value\': e.value
                        }
                    });

                    adminGrid.reload();
                });

                return false;
            }
        });

    });
    '; ?>

    //]]>
    </script>
    <!-- listing admins grid create end -->

<?php endif; ?>

<!-- admin tpl end -->