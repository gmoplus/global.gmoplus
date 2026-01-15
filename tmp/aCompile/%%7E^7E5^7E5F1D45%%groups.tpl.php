<?php /* Smarty version 2.6.31, created on 2025-09-25 07:21:28
         compiled from blocks/builder/groups.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['groups'] )): ?>
    <?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
        <?php if (! $this->_tpl_vars['group']['hidden']): ?>
            <div class="group_obj<?php if ($this->_tpl_vars['group']['Status'] == 'approval'): ?> group_inactive<?php endif; ?>" style="<?php if ($this->_tpl_vars['group']['hidden']): ?>display: none;<?php endif; ?>" id="group_<?php echo $this->_tpl_vars['group']['ID']; ?>
">
                <div class="group_title" <?php if ($this->_tpl_vars['group']['Status'] == 'approval'): ?>title="<?php echo $this->_tpl_vars['group']['name']; ?>
 (<?php echo $this->_tpl_vars['lang']['approval']; ?>
)"<?php endif; ?>><?php echo $this->_tpl_vars['group']['name']; ?>
</div>
                <div class="group_fields_container hide">
                    <div class="group_hint"><?php echo $this->_tpl_vars['lang']['drop_field_here']; ?>
</div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
    <div class="form_default">
        <?php echo $this->_tpl_vars['lang']['no_groups']; ?>

    </div>
<?php endif; ?>