<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:53
         compiled from /home/gmoplus/global.gmoplus.com/plugins/online/admin/statistics_dom.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/online/admin/statistics_dom.tpl', 18, false),)), $this); ?>
<table class="fixed">
<tr>
    <td>
        <table class="stat">
        <tr class="header">
            <td colspan="3"><?php echo $this->_tpl_vars['lang']['online_statistics_text']; ?>
</td>
        </tr>
        <tr>
            <td class="line"><div><?php echo $this->_tpl_vars['lang']['online_count_last_hour_text']; ?>
</div></td>
            <td class="counter"><b><?php echo $this->_tpl_vars['onlineStatistics']['lastHour']; ?>
</b></td>
        </tr>
        <tr>
            <td class="line"><div><?php echo $this->_tpl_vars['lang']['online_count_last_day_text']; ?>
</div></td>
            <td class="counter"><b><?php echo $this->_tpl_vars['onlineStatistics']['lastDay']; ?>
</b></td>
        </tr>

        <tr class="header">
            <td colspan="3" style="padding-top: 7px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['online_count_all_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, '[number]', $this->_tpl_vars['onlineStatistics']['total']) : smarty_modifier_replace($_tmp, '[number]', $this->_tpl_vars['onlineStatistics']['total'])); ?>
</td>
        </tr>

        <tr>
            <td class="line"><div><?php echo $this->_tpl_vars['lang']['online_count_users_text']; ?>
</div></td>
            <td class="counter"><b><?php echo $this->_tpl_vars['onlineStatistics']['users']; ?>
</b></td>
        </tr>
        <tr>
            <td class="line"><div><?php echo $this->_tpl_vars['lang']['online_count_guests_text']; ?>
</div></td>
            <td class="counter"><b><?php echo $this->_tpl_vars['onlineStatistics']['guests']; ?>
</b></td>
        </tr>
        </table>
    </td>
</tr>
</table>