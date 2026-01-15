<?php /* Smarty version 2.6.31, created on 2025-08-25 12:39:38
         compiled from controllers/email_templates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/email_templates.tpl', 8, false),array('modifier', 'cat', 'controllers/email_templates.tpl', 20, false),array('modifier', 'count', 'controllers/email_templates.tpl', 37, false),)), $this); ?>
<!-- email templates tpl -->

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.caret.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
ckeditor/ckeditor.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplEmailTemplatesNavBar'), $this);?>


    <?php if (! $_GET['action']): ?><a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_template']; ?>
</span><span class="right"></span></a><?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['templates_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new template -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form  onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;tpl=<?php echo $_GET['tpl']; ?>
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
                <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled<?php endif; ?>" name="key" type="text" style="width: 250px;" value="<?php echo $this->_tpl_vars['sPost']['key']; ?>
" />
            </td>
        </tr>

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['subject']; ?>
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
" style="width: 500px;" maxlength="350" />
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
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['content_type']; ?>
</td>
            <td class="field">
                <label><input type="radio" name="type" value="plain" <?php if ($this->_tpl_vars['sPost']['type'] == 'plain' || ! $this->_tpl_vars['sPost']['type']): ?>class="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['plain_text']; ?>
</label>
                <label><input type="radio" name="type" value="html" <?php if ($this->_tpl_vars['sPost']['type'] == 'html'): ?>class="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['lang']['html_code']; ?>
</label>

                <script type="text/javascript">
                flynax.switchContentType('input[name=type]', [<?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>'body_<?php echo $this->_tpl_vars['language']['Code']; ?>
'<?php if (! ($this->_foreach['langF']['iteration'] == $this->_foreach['langF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]);
                </script>
            </td>
        </tr>

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['content']; ?>
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
                    <select id="var_sel_<?php echo $this->_tpl_vars['language']['Code']; ?>
">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['l_email_variables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var']):
?>
                        <option value="<?php echo $this->_tpl_vars['var']; ?>
"><?php echo $this->_tpl_vars['var']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <input class="caret_button no_margin" id="input_<?php echo $this->_tpl_vars['language']['Code']; ?>
" type="button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
" style="margin-left: 5px" />
                    <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['add_template_variable']; ?>
</span>
                    <div style="padding: 5px 0 0 0;">
                        <div class="hide"><?php if ($this->_tpl_vars['sPost']['type'] == 'html'): ?><?php echo $this->_tpl_vars['sPost']['description'][$this->_tpl_vars['language']['Code']]; ?>
<?php endif; ?></div>
                        <textarea id="body_<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if ($this->_tpl_vars['language']['Direction'] == 'rtl'): ?>dir="rtl"<?php endif; ?> lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" rows="9" cols="40" name="description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" style="height: 200px;"><?php if ($this->_tpl_vars['sPost']['type'] == 'plain'): ?><?php echo $this->_tpl_vars['sPost']['description'][$this->_tpl_vars['language']['Code']]; ?>
<?php endif; ?></textarea>
                    </div>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplEmailTemplatesForm'), $this);?>


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
    <!-- add new template end -->

    <script type="text/javascript"><?php echo '
    $(document).ready(function(){
        flynax.putCursorInCKTextarea(\'body_\' + $(\'.caret_button:first\').attr(\'id\').split(\'_\')[1]);

        $(\'.caret_button\').click(function(){
            var id       = $(this).attr(\'id\').split(\'_\')[1];
            var variable = $(\'#var_sel_\'+id).val();
            var type     = $(\'input[name=type]:checked\').val();

            if (type == \'plain\') {
                var text     = $(\'#body_\' + id).val();
                var caret    = $(\'#body_\' + id).getSelection();
                var new_text = text.substring(0, caret.start) + variable + text.substring(caret.end, text.length);

                $(\'#body_\' + id).val(new_text).focus();
                $(\'#body_\' + id).setCursorPosition(caret.start + variable.length);
            } else {
                var instance = CKEDITOR.instances[\'body_\' + id];
                var offset   = instance.getSelection().getRanges()[0];

                if (offset) {
                    var text = offset.startContainer.getText();

                    if (offset.startOffset > 0
                        && offset.endOffset > 0
                        && instance.getData().trim().replace(/<br \\/\\>|[\\t\\n\\r]/gi, \'\').length != text.length
                    ) {
                        offset.startContainer.setText(
                            text.substring(0, offset.startOffset) +
                            variable +
                            text.substring(offset.endOffset, text.length)
                        );
                    } else {
                        instance.setData(variable + instance.getData());
                    }
                }
            }
        });
    });
    '; ?>
</script>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplEmailTemplatesAction'), $this);?>


<?php else: ?>

    <!-- email-templates grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var emailTemplatesGrid;

    <?php echo '
    $(document).ready(function(){

        emailTemplatesGrid = new gridObj({
            key: \'emailTemplates\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/email_templates.inc.php?q=ext\',
            defaultSortField: \'ID\',
            remoteSortable: true,
            title: lang[\'ext_email_templates_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'subject\', mapping: \'subject\', type: \'string\'},
                {name: \'Position\', mapping: \'Position\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'Type\', mapping: \'Type\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    fixed: true,
                    width: 35
                },{
                    header: lang[\'ext_subject\'],
                    dataIndex: \'subject\',
                    width: 60,
                    id: \'rlExt_item\'
                },{
                    header: lang[\'ext_key\'],
                    dataIndex: \'Key\',
                    width: 30
                },{
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['content_type']; ?>
<?php echo '\',
                    dataIndex: \'Type\',
                    width: 10
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
                    width: 50,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        return "<center><a href="+rlUrlHome+"index.php?controller="+controller+"&action=edit&tpl="+data+"><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a></center>";
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplEmailTemplatesGrid'), $this);?>
<?php echo '

        emailTemplatesGrid.init();
        grid.push(emailTemplatesGrid.grid);

    });
    '; ?>

    //]]>
    </script>
    <!-- email-templates grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplEmailTemplatesBottom'), $this);?>


<?php endif; ?>

<!-- email templates tpl end -->