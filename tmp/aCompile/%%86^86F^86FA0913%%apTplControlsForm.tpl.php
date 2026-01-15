<?php /* Smarty version 2.6.31, created on 2025-07-28 12:50:06
         compiled from /home/gmoplus/global.gmoplus.com/plugins/wordpressBridge/view/admin/apTplControlsForm.tpl */ ?>
<tr class="body">
    <td class="list_td"><?php echo $this->_tpl_vars['lang']['wpb_refresh_cache_phrase']; ?>
</td>
    <td class="list_td" align="center" style="width: 200px;">
        <input id="wpb-update-cache" type="button" value="<?php echo $this->_tpl_vars['lang']['wpb_refresh']; ?>
" style="margin: 0;width: 100px;">
    </td>
</tr>

<script><?php echo '
    $(document).ready(function() {
        $(\'#wpb-update-cache\').click(function() {
            var $updateCacheButton = $(this);
            var updateCacheButtonText = $updateCacheButton.val();

            $updateCacheButton.val(lang[\'loading\']);

            WordPressBridgeCacheClass().refreshCache(function(response) {
                $updateCacheButton.val(updateCacheButtonText);
                printMessage(\'notice\', response.message);
            });
        });
    });
'; ?>
</script>