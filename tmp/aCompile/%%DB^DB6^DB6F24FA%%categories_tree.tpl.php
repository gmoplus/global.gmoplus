<?php /* Smarty version 2.6.31, created on 2025-07-31 13:16:02
         compiled from blocks/categories_tree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/categories_tree.tpl', 11, false),array('modifier', 'count', 'blocks/categories_tree.tpl', 16, false),)), $this); ?>
<fieldset class="light">
    <legend id="legend_cats" class="up" onclick="fieldset_action('cats');"><?php echo $this->_tpl_vars['lang']['categories']; ?>
</legend>
    <div id="cats">
        <div id="cat_checkboxed" style="margin: 0 0 8px;<?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>display: none<?php endif; ?>">
            <div class="tree">
                <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
                    <fieldset class="light">
                        <legend id="legend_section_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('section_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                        <div id="section_<?php echo $this->_tpl_vars['section']['ID']; ?>
">
                            <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level_checkbox.tpl') : smarty_modifier_cat($_tmp, 'category_level_checkbox.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            <?php else: ?>
                                <div style="padding: 0 0 8px 10px;"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
                            <?php endif; ?>
                        </div>
                        <?php if ($this->_tpl_vars['section'] && $this->_tpl_vars['section']['Categories'] && count($this->_tpl_vars['section']['Categories']) > 5): ?>
                            <div class="grey_area">
                                <span>
                                    <span onclick="$('#section_<?php echo $this->_tpl_vars['section']['ID']; ?>
 input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#section_<?php echo $this->_tpl_vars['section']['ID']; ?>
 input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </span>
                            </div>
                        <?php endif; ?>
                    </fieldset>
                <?php endforeach; endif; unset($_from); ?>
            </div>

            <div style="padding: 0 0 6px 37px;">
                <label><input <?php if (! empty ( $this->_tpl_vars['sPost']['subcategories'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="subcategories" value="1" /> <?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
            </div>
        </div>

        <script type="text/javascript">
        var tree_selected = <?php if ($_POST['categories']): ?>[<?php $_from = $_POST['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postcatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postcatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['post_cat']):
        $this->_foreach['postcatF']['iteration']++;
?>['<?php echo $this->_tpl_vars['post_cat']; ?>
']<?php if (! ($this->_foreach['postcatF']['iteration'] == $this->_foreach['postcatF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
        var tree_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>['<?php echo $this->_tpl_vars['parent_point']; ?>
']<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
        <?php echo '

        $(document).ready(function(){
            flynax.treeLoadLevel(\'checkbox\', \'flynax.openTree(tree_selected, tree_parentPoints)\', \'div#cat_checkboxed\');
            flynax.openTree(tree_selected, tree_parentPoints);

            $(\'input[name=cat_sticky]\').click(function(){
                $(\'#cat_checkboxed\').slideToggle();
                $(\'#cats_nav\').fadeToggle();
            });
        });

        '; ?>

        </script>

        <div class="grey_area">
            <label><input class="checkbox" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>checked="checked"<?php endif; ?> type="checkbox" name="cat_sticky" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
            <span id="cats_nav" <?php if ($this->_tpl_vars['sPost']['cat_sticky']): ?>class="hide"<?php endif; ?>>
                <span onclick="$('#cat_checkboxed div.tree input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                <span class="divider"> | </span>
                <span onclick="$('#cat_checkboxed div.tree input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
            </span>

            <?php if ($this->_tpl_vars['cKey'] == 'blocks'): ?>
                <div id="box_sticky_type_categories_only" class="field_description hide" style="margin: 5px 0 0 0;"><?php echo $this->_tpl_vars['lang']['box_sticky_type_categories_only']; ?>
</div>
            <?php endif; ?>
        </div>

    </div>
</fieldset>