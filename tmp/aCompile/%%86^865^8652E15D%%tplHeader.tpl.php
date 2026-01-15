<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/admin/tplHeader.tpl */ ?>
<!-- MultiField tpl header -->

<?php if ($this->_tpl_vars['multi_format_keys']): ?>
<script>
    var mfFields = new Array();
    var mfFieldVals = new Array();
    lang['select'] = "<?php echo $this->_tpl_vars['lang']['select']; ?>
";
    lang['not_available'] = "<?php echo $this->_tpl_vars['lang']['not_available']; ?>
";
</script>
<?php endif; ?>

<script>
    lang['any'] = "<?php echo $this->_tpl_vars['lang']['any']; ?>
";
    var mfGeoFields = new Array();
    if (typeof rlLang == 'undefined') var rlLang = '<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
';
</script>

<style>
<?php echo '

.mf-opt-label {
    margin-left: 20px;
}
.mf-opt-label.mf-disabled {
    filter: grayscale(.9);
    opacity: 0.70;
}
.mf-hint {
    padding: 15px 0;
}

'; ?>

</style>

<!-- MultiField tpl header end -->