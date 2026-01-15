<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:24
         compiled from controllers/database.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/database.tpl', 5, false),array('modifier', 'cat', 'controllers/database.tpl', 16, false),)), $this); ?>
<!-- database -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDatabaseNavBar'), $this);?>

    
    <a href="javascript:void(0)" onclick="show('import', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_import"><?php echo $this->_tpl_vars['lang']['import']; ?>
</span><span class="right"></span></a>
</div>

<div class="clear" style="*margin: -3px 0; *height: 1px;"></div>
<!-- navigation bar end -->

<div id="action_blocks">
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
</div>

<!-- query area -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div style="padding: 5px 10px 0 10px;">
    <table class="form">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['sql_query']; ?>
</td>
        <td class="field" align="right">
            <textarea cols="" rows="" style="height: 80px;" id="query">SELECT * FROM `<?php echo (defined('RL_DBPREFIX') ? @RL_DBPREFIX : null); ?>
config` WHERE 1</textarea>

            <a style="padding: 0 15px 0 15px;" href="javascript:void(0)" onclick="$('#query').val('');" class="cancel"><?php echo $this->_tpl_vars['lang']['reset']; ?>
</a>
            <input id="run_button" type="button" value="<?php echo $this->_tpl_vars['lang']['go']; ?>
" onclick="xajax_runSqlQuery($('#query').val());$(this).val('<?php echo $this->_tpl_vars['lang']['loading']; ?>
');" />
        </td>
    </tr>
    </table>    
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- query area end -->

<div id="grid"></div>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplDatabaseBottom'), $this);?>


<!-- database end -->