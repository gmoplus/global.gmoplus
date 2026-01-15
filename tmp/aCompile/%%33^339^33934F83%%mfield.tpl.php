<?php /* Smarty version 2.6.31, created on 2025-08-20 18:11:22
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/mfield.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/multiField/mfield.tpl', 1, false),array('modifier', 'regex_replace', '/home/gmoplus/global.gmoplus.com/plugins/multiField/mfield.tpl', 3, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/multiField/mfield.tpl', 5, false),)), $this); ?>
<?php if ($this->_tpl_vars['field']['Condition'] && is_array ( $this->_tpl_vars['multi_format_keys'] ) && ((is_array($_tmp=$this->_tpl_vars['field']['Condition'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['multi_format_keys']) : in_array($_tmp, $this->_tpl_vars['multi_format_keys']))): ?>
    <?php $this->assign('field_key', $this->_tpl_vars['field']['Key']); ?>
    <?php $this->assign('head_field_key', ((is_array($_tmp=$this->_tpl_vars['field']['Key'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/(_level[0-9]+)$/', '') : smarty_modifier_regex_replace($_tmp, '/(_level[0-9]+)$/', ''))); ?>
    <?php if ($this->_tpl_vars['sf_key']): ?>
        <?php $this->assign('head_field_key', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['head_field_key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '|') : smarty_modifier_cat($_tmp, '|')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sf_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sf_key']))); ?>
    <?php endif; ?>
    <?php $this->assign('data_key', 'location_listing_fields'); ?>
    <?php if ($this->_tpl_vars['data_mode'] == 'account'): ?>
        <?php $this->assign('data_key', 'location_account_fields'); ?>
    <?php endif; ?>

    <script>
        if (typeof mfFields['<?php echo $this->_tpl_vars['head_field_key']; ?>
'] == 'undefined') <?php echo ' { '; ?>

            mfFields['<?php echo $this->_tpl_vars['head_field_key']; ?>
'] = [];
            mfFieldVals['<?php echo $this->_tpl_vars['head_field_key']; ?>
'] = [];
        <?php echo ' } '; ?>


        mfFields['<?php echo $this->_tpl_vars['head_field_key']; ?>
'].push('<?php echo $this->_tpl_vars['field_key']; ?>
');

        <?php if ($_POST[$this->_tpl_vars['mf_form_prefix']][$this->_tpl_vars['field_key']] || $_REQUEST[$this->_tpl_vars['mf_form_prefix']][$this->_tpl_vars['field_key']]): ?>
            mfFieldVals['<?php echo $this->_tpl_vars['head_field_key']; ?>
']['<?php echo $this->_tpl_vars['field_key']; ?>
'] = '<?php if ($_POST[$this->_tpl_vars['mf_form_prefix']][$this->_tpl_vars['field_key']]): ?><?php echo $_POST[$this->_tpl_vars['mf_form_prefix']][$this->_tpl_vars['field_key']]; ?>
<?php else: ?><?php echo $_REQUEST[$this->_tpl_vars['mf_form_prefix']][$this->_tpl_vars['field_key']]; ?>
<?php endif; ?>';
            <?php $this->assign('mf_data_source', 'post'); ?>
        <?php elseif ($_POST[$this->_tpl_vars['field_key']] || $_REQUEST[$this->_tpl_vars['field_key']]): ?>
            mfFieldVals['<?php echo $this->_tpl_vars['head_field_key']; ?>
']['<?php echo $this->_tpl_vars['field_key']; ?>
'] = '<?php if ($_POST[$this->_tpl_vars['field_key']]): ?><?php echo $_POST[$this->_tpl_vars['field_key']]; ?>
<?php else: ?><?php echo $_REQUEST[$this->_tpl_vars['field_key']]; ?>
<?php endif; ?>';
            <?php $this->assign('mf_data_source', 'post'); ?>
        <?php elseif ($this->_tpl_vars['geo_filter_data']['applied_location'] && $this->_tpl_vars['geo_filter_data'][$this->_tpl_vars['data_key']][$this->_tpl_vars['field_key']] && $this->_tpl_vars['geo_filter_data']['is_filtering'] && $this->_tpl_vars['mf_data_source'] != 'post'): ?>
            mfFieldVals['<?php echo $this->_tpl_vars['head_field_key']; ?>
']['<?php echo $this->_tpl_vars['field_key']; ?>
'] = '<?php echo $this->_tpl_vars['geo_filter_data'][$this->_tpl_vars['data_key']][$this->_tpl_vars['field_key']]; ?>
';
        <?php endif; ?>
    </script>
<?php endif; ?>