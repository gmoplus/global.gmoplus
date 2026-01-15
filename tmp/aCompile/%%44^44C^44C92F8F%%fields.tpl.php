<?php /* Smarty version 2.6.31, created on 2025-09-22 09:49:10
         compiled from blocks/builder/fields.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'blocks/builder/fields.tpl', 8, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['fields'] )): ?>
    <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
        <?php if (! $this->_tpl_vars['field']['hidden']): ?>
            <?php $this->assign('f_type', $this->_tpl_vars['field']['Type']); ?>
            <div class="field_obj<?php if ($this->_tpl_vars['field']['Status'] == 'approval'): ?> field_inactive<?php endif; ?>" style="<?php if ($this->_tpl_vars['field']['hidden']): ?>display: none;<?php endif; ?>" id="field_<?php echo $this->_tpl_vars['field']['ID']; ?>
">
                <div class="field_title" title="<?php echo $this->_tpl_vars['field']['name']; ?>
<?php if ($this->_tpl_vars['field']['Status'] == 'approval'): ?> (<?php echo $this->_tpl_vars['lang']['approval']; ?>
)<?php endif; ?>">
                    <div class="title"><?php echo $this->_tpl_vars['field']['name']; ?>
</div>
                    <span class="b_field_type"><?php echo ((is_array($_tmp=$this->_tpl_vars['l_types'][$this->_tpl_vars['f_type']])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</span>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
    <div class="form_default">
        <center><?php echo $this->_tpl_vars['lang']['no_fields']; ?>
</center>
    </div>
<?php endif; ?>