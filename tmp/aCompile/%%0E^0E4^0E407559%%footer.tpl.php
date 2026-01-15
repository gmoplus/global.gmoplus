<?php /* Smarty version 2.6.31, created on 2025-07-28 09:41:07
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'footer.tpl', 71, false),)), $this); ?>
    </td>
</tr>
<!-- footer -->
<tr>
    <td id="footer" valign="bottom">
        <div>&copy; <a href="<?php echo $this->_tpl_vars['lang']['flynax_url']; ?>
"><?php echo $this->_tpl_vars['lang']['copy_rights']; ?>
</a> <b><?php echo $this->_tpl_vars['lang']['version']; ?>
 <?php echo $this->_tpl_vars['config']['rl_version']; ?>
</b></div>
    </td>
</tr>
<!-- footer end -->
</table>
<!-- additional JS -->
<script type="text/javascript">
var menu_collapsed = <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>true<?php else: ?>false<?php endif; ?>;
var error_fields = Array();
<?php if (! empty ( $this->_tpl_vars['error_fields'] )): ?>
    <?php $_from = $this->_tpl_vars['error_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error_field']):
?>
        error_fields.push('<?php echo $this->_tpl_vars['error_field']; ?>
');
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php echo '
$(document).ready(function(){
    $("input.numeric").numeric();
    flynax.tabs('; ?>
<?php if ($_GET['action'] == 'view'): ?>true<?php endif; ?><?php echo ');
    flynax.copyPhrase();

    var pattern = /[\\w]+\\[(\\w{2})\\]/i;

    /* force error fields */
    for( var i = 0; i < error_fields.length; i++ )
    {
        if ( pattern.test(error_fields[i]) )
        {
            $(\'input[name="\'+error_fields[i]+\'"]\').parent().parent().find(\'ul.tabs li[lang=\'+error_fields[i].match(pattern)[1]+\']\').addClass(\'error\');
            $(\'input[name="\'+error_fields[i]+\'"]\').click(function(){
                $(this).parent().parent().find(\'ul.tabs li[lang=\'+$(this).attr(\'name\').match(pattern)[1]+\']\').removeClass(\'error\');
            });
            $(\'textarea[name="\'+error_fields[i]+\'"]\').parent().parent().parent().find(\'ul.tabs li[lang=\'+error_fields[i].match(pattern)[1]+\']\').addClass(\'error\');
            $(\'textarea[name="\'+error_fields[i]+\'"]\').click(function(){
                $(this).parent().parent().parent().find(\'ul.tabs li[lang=\'+$(this).attr(\'name\').match(pattern)[1]+\']\').removeClass(\'error\');
            });
        }

        $(\'input[name="\'+error_fields[i]+\'"],textarea[name="\'+error_fields[i]+\'"],select[name="\'+error_fields[i]+\'"]\').addClass(\'error\');
        $(\'input[name="\'+error_fields[i]+\'"],textarea[name="\'+error_fields[i]+\'"],select[name="\'+error_fields[i]+\'"]\').focus(function(){
            $(this).removeClass(\'error\');
        });

        if ( $(\'input[name^="\'+error_fields[i]+\'"]:last\').attr(\'type\') == \'checkbox\' || $(\'input[name^="\'+error_fields[i]+\'"]:last\').attr(\'type\') == \'radio\' )
        {
            $(\'input[name^="\'+error_fields[i]+\'"]:last\').closest(\'table:not(.form,.sTable)\').addClass(\'error\');
            $(\'input[name^="\'+error_fields[i]+\'"]:last\').closest(\'table:not(.form,.sTable)\').click(function(){
                $(this).removeClass(\'error\');
            });
        }
    }
});
'; ?>

</script>
<!-- additional JS end -->

<script src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/util.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script>flUtil.init();</script>

<script>
    $('select.select-autocomplete').each(function () {
        flynax.addAutocompleteForDropdown($(this));
    });
</script>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplFooter'), $this);?>


</body>
</html>