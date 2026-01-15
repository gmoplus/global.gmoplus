<?php /* Smarty version 2.6.31, created on 2025-09-20 12:25:57
         compiled from /home/gmoplus/global.gmoplus.com/plugins/ref/admin/shortUrlsOption.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/ref/admin/shortUrlsOption.tpl', 9, false),)), $this); ?>
<!-- Ref option in listing type tpl -->

<tr class="hide" id="ref_short_urls">
    <td class="name"><?php echo $this->_tpl_vars['lang']['ref_short_urls']; ?>
</td>
    <td class="field">
        <?php $this->assign('checkbox_field', 'ref_short_urls'); ?>
        
        <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
        <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php else: ?>
            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
        <?php endif; ?>
        
        <table>
        <tr>
            <td>
                <label>
                    <input <?php echo $this->_tpl_vars['ref_short_urls_yes']; ?>
 type="radio" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" />
                    <?php echo $this->_tpl_vars['lang']['yes']; ?>

                </label>
                <label>
                    <input <?php echo $this->_tpl_vars['ref_short_urls_no']; ?>
 type="radio" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" />
                    <?php echo $this->_tpl_vars['lang']['no']; ?>

                </label>

                <span class="field_description"><?php echo $this->_tpl_vars['lang']['ref_short_urls_desc']; ?>
</span>
            </td>
        </tr>
        </table>
    </td>
</tr>

<script><?php echo '
    $(function () {
        var $refShortUrlOption = $(\'#ref_short_urls\'),
            $urlTypeOption     = $(\'select[name="links_type"]\');

        $urlTypeOption.closest(\'td.field\').parent(\'tr\').after($refShortUrlOption);

        $urlTypeOption.change(function () {
           refShortUrlHandler();
        });

        refShortUrlHandler();

        function refShortUrlHandler() {
            if ($urlTypeOption.val() === \'short\') {
                $refShortUrlOption.show();
            } else {
                $refShortUrlOption.hide();
                $refShortUrlOption.find(\'input:checked\').removeAttr(\'checked\');
                $refShortUrlOption.find(\'input[value="0"]\').attr(\'checked\', \'checked\');
            }
        }
    });
'; ?>
</script>

<!-- Ref option in listing type tpl end -->