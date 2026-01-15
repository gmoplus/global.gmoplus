<?php /* Smarty version 2.6.31, created on 2025-09-22 09:49:10
         compiled from blocks/builder/form.tpl */ ?>
<?php if (empty ( $this->_tpl_vars['relations'] )): ?>
    <div class="form_hint"><?php echo $this->_tpl_vars['lang']['drop_group_field_here']; ?>
</div>
<?php else: ?>
    <?php $_from = $this->_tpl_vars['relations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fGroups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fGroups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['fGroups']['iteration']++;
?>
    <?php if ($this->_tpl_vars['group']['Group_ID']): ?>
        <div id="group_<?php echo $this->_tpl_vars['group']['Group_ID']; ?>
" class="group_obj<?php if ($this->_tpl_vars['group']['Status'] == 'approval'): ?> group_inactive<?php endif; ?>" <?php if ($this->_tpl_vars['group']['Status'] == 'approval'): ?>title="<?php echo $this->_tpl_vars['group']['name']; ?>
 (<?php echo $this->_tpl_vars['lang']['approval']; ?>
)"<?php endif; ?>>
            <div class="group_title"><?php echo $this->_tpl_vars['group']['name']; ?>
</div>
            <div class="group_fields_container">
                <?php if ($this->_tpl_vars['group']['Fields']): ?>
                    <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fFields'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fFields']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field']):
        $this->_foreach['fFields']['iteration']++;
?>
                    <?php $this->assign('f_type', $this->_tpl_vars['field']['Type']); ?>
                        <div class="field_obj<?php if ($this->_tpl_vars['field']['Status'] == 'approval'): ?> field_inactive<?php endif; ?>" id="field_<?php echo $this->_tpl_vars['field']['ID']; ?>
">                  
                            <div class="field_title" title="<?php echo $this->_tpl_vars['field']['name']; ?>
<?php if ($this->_tpl_vars['field']['Status'] == 'approval'): ?> (<?php echo $this->_tpl_vars['lang']['approval']; ?>
)<?php endif; ?>">
                                <div class="title"><?php echo $this->_tpl_vars['field']['name']; ?>
</div>
                                <span class="b_field_type"><?php echo $this->_tpl_vars['l_types'][$this->_tpl_vars['f_type']]; ?>
</span>
                            </div>
                            
                            
                                                        
                        </div>
                    <?php endforeach; endif; unset($_from); ?>
                <?php else: ?>
                    <div class="group_hint"><?php echo $this->_tpl_vars['lang']['drop_field_here']; ?>
</div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <?php $this->assign('f_type', $this->_tpl_vars['group']['Fields']['Type']); ?>
        <div class="field_obj<?php if ($this->_tpl_vars['group']['Fields']['Status'] == 'approval'): ?> field_inactive<?php endif; ?>" id="field_<?php echo $this->_tpl_vars['group']['Fields']['ID']; ?>
">
            <div class="field_title" title="<?php echo $this->_tpl_vars['group']['Fields']['name']; ?>
<?php if ($this->_tpl_vars['group']['Fields']['Status'] == 'approval'): ?> (<?php echo $this->_tpl_vars['lang']['approval']; ?>
)<?php endif; ?>">
                <div class="title"><?php echo $this->_tpl_vars['group']['Fields']['name']; ?>
</div>
                <span class="b_field_type"><?php echo $this->_tpl_vars['l_types'][$this->_tpl_vars['f_type']]; ?>
</span>
            </div>
            
            
                    </div>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>