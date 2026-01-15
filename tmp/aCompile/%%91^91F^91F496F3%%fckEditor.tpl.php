<?php /* Smarty version 2.6.31, created on 2025-07-31 13:16:01
         compiled from blocks/fckEditor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'blocks/fckEditor.tpl', 12, false),array('modifier', 'array_reverse', 'blocks/fckEditor.tpl', 12, false),)), $this); ?>
<!-- build textarea with CKEditor -->

<?php if ($this->_tpl_vars['fckEditorParams']['fckEditorJsLoad']): ?>
    <script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
ckeditor/ckeditor.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
ckfinder/ckfinder.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<?php endif; ?>

<textarea name="<?php echo $this->_tpl_vars['fckEditorParams']['name']; ?>
" id="<?php echo $this->_tpl_vars['fckEditorParams']['name']; ?>
" rows="10" cols="80">
    <?php echo $this->_tpl_vars['fckEditorParams']['value']; ?>

</textarea>

<?php $this->assign('field_lang_code', array_reverse(((is_array($_tmp='_')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['fckEditorParams']['name']) : explode($_tmp, $this->_tpl_vars['fckEditorParams']['name'])))); ?>

<script>
var toolbar = rlConfig['fckeditor_bar'] == 'Basic'
    ? 'Basic'
    : [
        ['Source', '-', 'Bold', 'Italic', 'Underline', 'Strike'],
        ['Image', 'Flash', 'Link', 'Unlink', 'Anchor'],
        ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
        ['TextColor', 'BGColor']
    ];

var editor_<?php echo $this->_tpl_vars['fckEditorParams']['name']; ?>
 = CKEDITOR.replace('<?php echo $this->_tpl_vars['fckEditorParams']['name']; ?>
', <?php echo '{'; ?>

    language            : "<?php echo $this->_tpl_vars['field_lang_code']['0']; ?>
",
    width               : "<?php if ($this->_tpl_vars['fckEditorParams']['width'] == '100%' || ! $this->_tpl_vars['fckEditorParams']['width']): ?>100%<?php else: ?><?php echo $this->_tpl_vars['fckEditorParams']['width']; ?>
<?php endif; ?>",
    height              : "<?php if ($this->_tpl_vars['fckEditorParams']['height']): ?><?php echo $this->_tpl_vars['fckEditorParams']['height']; ?>
<?php else: ?>160<?php endif; ?>",
    toolbar             : toolbar,
    filebrowserBrowseUrl: rlConfig['libs_url'] + 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: rlConfig['libs_url'] + 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
<?php echo '}'; ?>
);
CKFinder.setupCKEditor(editor_<?php echo $this->_tpl_vars['fckEditorParams']['name']; ?>
, '../');
</script>

<!-- build textarea with CKEditor end -->