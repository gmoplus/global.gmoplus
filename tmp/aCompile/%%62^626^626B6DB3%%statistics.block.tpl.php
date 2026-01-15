<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:52
         compiled from blocks/statistics.block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'json_encode', 'blocks/statistics.block.tpl', 7, false),)), $this); ?>
<!-- statistics block -->

<div id="statistics-box">
    <div class="block_loading" style="height: 190px; overflow-y: auto;"></div>
</div>

<script>flynax.adminBoxesHandler('statistics', flynax.loadStatisticsBox, '<?php echo json_encode($this->_tpl_vars['plugin_statistics']); ?>
');</script>

<!-- statistics block end -->