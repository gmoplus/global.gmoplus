<?php /* Smarty version 2.6.31, created on 2025-07-28 12:50:06
         compiled from /home/gmoplus/global.gmoplus.com/plugins/ref/apTplControlsForm.tpl */ ?>
<tr class="body">
    <td class="list_td"><?php echo $this->_tpl_vars['lang']['ref_rebuild']; ?>
</td>
    <td class="list_td" align="center" style="width: 200px;">
        <input id="ref_rebuild" type="button" value="<?php echo $this->_tpl_vars['lang']['rebuild']; ?>
" style="margin: 0;width: 100px;">
    </td>
</tr>
<script>
    var refLang = [];
    refLang['rebuild'] = '<?php echo $this->_tpl_vars['lang']['rebuild']; ?>
';

    <?php echo '
        $(document).ready(function(){
            var refNumber = new refNumberClass();
            refNumber.init();
        });
    '; ?>

</script>