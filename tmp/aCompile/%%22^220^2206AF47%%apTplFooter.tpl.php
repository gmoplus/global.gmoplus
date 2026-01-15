<?php /* Smarty version 2.6.31, created on 2025-08-21 11:32:54
         compiled from /home/gmoplus/global.gmoplus.com/plugins/priceHistory/view/apTplFooter.tpl */ ?>
<script>
    var ph_listing_id = '<?php echo $_GET['id']; ?>
';
    $('#edit_listing > fieldset').first().after('<div id="ph-container"></div>');
    $('#ph-container').load(rlPlugins + 'priceHistory/admin/price_history_edit.php?id=' + ph_listing_id);
</script>