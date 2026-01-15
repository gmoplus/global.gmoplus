<?php /* Smarty version 2.6.31, created on 2025-09-05 09:06:38
         compiled from /home/gmoplus/global.gmoplus.com/plugins/FAQs/admin/faqs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', '/home/gmoplus/global.gmoplus.com/plugins/FAQs/admin/faqs.tpl', 5, false),array('function', 'fckEditor', '/home/gmoplus/global.gmoplus.com/plugins/FAQs/admin/faqs.tpl', 65, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/FAQs/admin/faqs.tpl', 19, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/FAQs/admin/faqs.tpl', 31, false),)), $this); ?>
<!-- faqs tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplFAQsNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['faq_add_faqs']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['faq_faqs_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add faq  -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;faqs=<?php echo $_GET['faqs']; ?>
<?php endif; ?>" method="post">
    <input type="hidden" name="submit" value="1" />
    <?php if ($_GET['action'] == 'edit'): ?>
        <input type="hidden" name="fromPost" value="1" />
    <?php endif; ?>
    <table class="form">
    <tr>
        <td class="name">
            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['title']; ?>

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
" maxlength="350" class="w350" />
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
        <td class="name">
            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['content']; ?>

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
                <?php $this->assign('dCode', ((is_array($_tmp='content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['faq_page_url']; ?>
</td>
        <td class="field">
            <table>
            <tr>
                <td><span style="padding: 0 5px 0 0;" class="field_description_noicon"><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo $this->_tpl_vars['pages']['faqs']; ?>
/</span></td>
                <td><input name="path" type="text" value="<?php echo $this->_tpl_vars['sPost']['path']; ?>
" maxlength="250" /></td>
                <td><span class="field_description_noicon">.html</span></td>
            </tr>
            </table>
        </td>
    </tr>

    <?php if ($_GET['action'] == 'edit'): ?>
    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['date']; ?>
</td>
        <td class="field">
            <input class="date" name="date" type="text" value="<?php echo $this->_tpl_vars['sPost']['date']; ?>
" style="width: 120px;" maxlength="40" />
        </td>
    </tr>
    <?php endif; ?>

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
    <!-- add faq end -->

<?php else: ?>

    <!-- faqs grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var faqsGrid;

    <?php echo '
    $(document).ready(function(){

        faqsGrid = new gridObj({
            key: \'faqs\',
            id: \'grid\',
            ajaxUrl: rlPlugins + \'FAQs/admin/faqs.inc.php?q=ext\',
            defaultSortField: \'Date\',
            defaultSortType: \'DESC\',
            title: lang[\'ext_faqs_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\'},
                {name: \'title\', mapping: \'title\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
            ],
            columns: [
                {
                    header: lang[\'ext_title\'],
                    dataIndex: \'title\',
                    width: 60,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_add_date\'],
                    dataIndex: \'Date\',
                    width: 15,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\')),
                    editor: new Ext.form.DateField({
                        format: \'Y-m-d H:i:s\'
                    })
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 100,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\' + lang[\'ext_click_to_edit\'] + \'">\' + val + \'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 12,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang[\'ext_active\']],
                            [\'approval\', lang[\'ext_approval\']]
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
                    renderer: function(id) {
                        var out = "<center>";
                        var splitter = false;

                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&faqs="+id+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";

                            out += \'<img data-id="\'+id+\'" class="remove" ext:qtip="\' + lang[\'ext_delete\'] + \'"\';
                                out += \'src="\' + rlUrlHome + \'img/blank.gif"  />\';


                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        faqsGrid.init();
        grid.push(faqsGrid.grid);
        $(\'#grid\').on(\'click\', \'img.remove\', deleteFAQs.confirm)

    });

    var deleteFAQsClass = function(){

            this.confirm = function() {
                var id = $(this).data("id");
                rlConfirm(lang[\'ext_notice_delete\'], "deleteFAQs.request", id);
            }

            this.request = function(index) {
                $.get(rlConfig["ajax_url"], {item: \'deleteFAQs\', id: index}, function (response) {
                    if(response.status == \'ok\') {
                        printMessage(\'notice\', response.message);
                        faqsGrid.reload();
                    }
                }, \'json\');
            }
        }

        var deleteFAQs = new deleteFAQsClass();

    '; ?>

    //]]>
    </script>
    <!-- faqs grid end -->

<?php endif; ?>
<!-- news tpl end -->