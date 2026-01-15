<?php /* Smarty version 2.6.31, created on 2025-08-26 15:40:29
         compiled from controllers/contacts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/contacts.tpl', 5, false),array('function', 'fckEditor', 'controllers/contacts.tpl', 60, false),array('modifier', 'cat', 'controllers/contacts.tpl', 13, false),array('modifier', 'date_format', 'controllers/contacts.tpl', 22, false),array('modifier', 'nl2br', 'controllers/contacts.tpl', 34, false),)), $this); ?>
<!-- contacts tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContactsNavBar'), $this);?>


    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['contacts_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'view'): ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <table class="list">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
        <td class="value"><b><?php echo $this->_tpl_vars['contact']['Name']; ?>
</b></td>
    </tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['date']; ?>
</td>
        <td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['contact']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</td>
    </tr>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
        <td class="value"><a href="mailto:<?php echo $this->_tpl_vars['contact']['Email']; ?>
"><?php echo $this->_tpl_vars['contact']['Email']; ?>
</a></td>
    </tr>
    
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContactsInfo'), $this);?>

    
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['message']; ?>
</td>
        <td class="" style="padding: 15px 0 20px 0; font-size: 13px;">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['contact']['Message'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

        </td>
    </tr>
    </table>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['reply'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=view&amp;id=<?php echo $_GET['id']; ?>
" method="post" enctype="multipart/form-data">
        <input type="hidden" name="submit" value="1" />
        <input type="hidden" name="fromPost" value="1" />
        
        <table class="form">
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['subject']; ?>
</td>
            <td class="field">
                <input type="text" name="subject" class="w350" />
            </td>
        </tr>
        
        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContactsForm'), $this);?>

        
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['message']; ?>
</td>
            <td class="field">
                <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => 'message','width' => '100%','height' => '140','value' => $_POST['message']), $this);?>

            </td>
        </tr>
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" name="reply" value="<?php echo $this->_tpl_vars['lang']['reply']; ?>
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
    
<?php else: ?>

    <!-- contacts grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var contactsGrid;
    
    <?php echo '
    $(document).ready(function(){
        
        contactsGrid = new gridObj({
            key: \'contacts\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/contacts.inc.php?q=ext\',
            defaultSortField: \'Date\',
            defaultSortType: \'DESC\',
            remoteSortable: true,
            title: lang[\'ext_contacts_manager\'],
            fields: [
                {name: \'Name\', mapping: \'Name\', type: \'string\'},
                {name: \'Email\', mapping: \'Email\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Message\', mapping: \'Message\', type: \'string\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                {name: \'ID\', mapping: \'ID\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'Name\',
                    width: 60,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_email\'],
                    dataIndex: \'Email\',
                    width: 20,
                    id: \'rlExt_item\'
                },{
                    header: lang[\'ext_add_date\'],
                    dataIndex: \'Date\',
                    width: 10,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 10
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";
                        
                        out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=view&id="+data+"\'><img class=\'view\' ext:qtip=\'"+lang[\'ext_view\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deleteContact\\", \\""+Array(data)+"\\" )\' />";
                        
                        out += "</center>";
                        
                        return out;
                    }
                }
            ]
        });
        
        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContactsGrid'), $this);?>
<?php echo '
        
        contactsGrid.init();
        grid.push(contactsGrid.grid);
        
    });
    '; ?>

    //]]>
    </script>
    <!-- contacts grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContactsBottom'), $this);?>

<?php endif; ?>

<!-- contacts end tpl -->