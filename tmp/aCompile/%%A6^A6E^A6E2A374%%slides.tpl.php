<?php /* Smarty version 2.6.31, created on 2025-08-26 15:40:28
         compiled from controllers/slides.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/slides.tpl', 4, false),array('modifier', 'cat', 'controllers/slides.tpl', 17, false),array('modifier', 'count', 'controllers/slides.tpl', 51, false),)), $this); ?>
<!-- content slides -->

<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSlidesNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['action'] != 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['items_list']; ?>
</span><span class="right"></span></a>
</div>

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new/edit item -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&slide=<?php echo $_GET['slide']; ?>
<?php endif; ?>" 
              method="post"
              enctype="multipart/form-data">
            <input type="hidden" name="submit" value="1" />
            
            <?php if ($_GET['action'] == 'edit'): ?>
                <input type="hidden" name="fromPost" value="1" />
            <?php endif; ?>

            <table class="form">
            <tr>
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['photo']; ?>

                </td>
                <td class="field_tall">
                    <input class="file" type="file" name="picture" />

                    <?php if ($this->_tpl_vars['tpl_settings']['home_page_slides_size']): ?>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['recommended_resolution']; ?>
: <?php echo $this->_tpl_vars['tpl_settings']['home_page_slides_size']; ?>
 px</span>
                    <?php endif; ?>

                    <?php if ($this->_tpl_vars['item_info']['Picture']): ?>
                        <div style="padding: 15px 0;">
                            <img style="max-width: 200px;max-height: 200px;" src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
slides/<?php echo $this->_tpl_vars['item_info']['Picture']; ?>
" />
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['title']; ?>

                </td>
                <td>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                        <ul class="tabs">
                            <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" 
                                <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>
                                class="active"
                                <?php endif; ?>
                                ><?php echo $this->_tpl_vars['language']['name']; ?>
</li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    <?php endif; ?>
                    
                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                        <input type="text" name="title[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['title'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="128" style="width: 100%;max-width: 650px;" />
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                                <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['title']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['description']; ?>
</td>
                <td class="field">
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                        <ul class="tabs">
                            <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <li lang="<?php echo $this->_tpl_vars['language']['Code']; ?>
" <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['language']['name']; ?>
</li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    <?php endif; ?>
                    
                    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                        <textarea cols="" rows="" name="description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['sPost']['description'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['url']; ?>
</td>
                <td class="field">
                    <input name="url" type="text" value="<?php echo $this->_tpl_vars['sPost']['url']; ?>
" placeholder="https://" maxlength="256" class="w350" />
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSlidesForm'), $this);?>

            
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select name="status">
                        <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['add']; ?>
<?php endif; ?>" />
                </td>
            </tr>
            </table>
        </form>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <!-- add new/edit item end -->
<?php else: ?>
    <!-- grid -->
    <div id="grid"></div>

    <script>
    var slidesGrid;
    
    <?php echo '
    $(function(){
        var expanderTpl = \'<div style="margin: 0 0px 5px 44px"><img style="max-width: 200px;max-height: 100px;" src="{src}" /></div>\';

        slidesGrid = new gridObj({
            key: \'slides\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/slides.inc.php?q=ext\',
            defaultSortField: \'ID\',
            title: lang[\'ext_manager\'],
            expander: true,
            expanderTpl: expanderTpl,
            fields: [
                {name: \'Title\', mapping: \'Title\', type: \'string\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Picture\', mapping: \'Picture\', type: \'string\'},
                {name: \'src\', mapping: \'src\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'ID\', mapping: \'ID\', type: \'int\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 40,
                    fixed: true,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_title\'],
                    dataIndex: \'Title\',
                    width: 40,
                    editor: new Ext.form.TextField({
                        allowBlank: false,
                        maxLength: 128,
                        autoCreate: {
                            tag: \'input\',
                            type: \'text\',
                            maxlength: \'128\'
                        }
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 100,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 100,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang.active],
                            [\'approval\', lang.approval]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus:true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 80,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(id) {
                        var $out = $(\'<center>\');

                        if (rights[cKey].indexOf(\'edit\') >= 0) {
                            $out.append(
                                $(\'<a>\')
                                    .attr(\'href\', rlUrlController + \'&action=edit&slide=\' + id)
                                    .append(
                                        $(\'<img>\')
                                            .addClass(\'edit\')
                                            .attr(\'ext:qtip\', lang[\'ext_edit\'])
                                            .attr(\'src\', rlUrlHome + \'img/blank.gif\')
                                    )
                            );
                        }

                        if (rights[cKey].indexOf(\'delete\') >= 0) {
                            $out.append(
                                $(\'<img>\')
                                    .addClass(\'remove\')
                                    .attr(\'ext:qtip\', lang[\'ext_delete\'])
                                    .attr(\'src\', rlUrlHome + \'img/blank.gif\')
                                    .attr(\'data-id\', id)
                            );
                        }
                        
                        return $out.prop(\'outerHTML\');
                    }
                }
            ]
        });
        
        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplslidesGrid'), $this);?>
<?php echo '
        
        slidesGrid.init();
        grid.push(slidesGrid.grid);

        // Delete item handler
        $(\'#grid\').on(\'click\', \'img.remove\', function(){
            var id = $(this).data(\'id\');

            if (!id) {
                return;
            }

            rlConfirm(lang[\'ext_notice_\' + delete_mod], \'deleteSlide\', [id]);
        });
    });

    var deleteSlide = function(id){
        flynax.sendAjaxRequest(\'removeSlide\', {id: id}, function(response){
            if (response.status == \'OK\') {
                slidesGrid.reload();
            }
        });
    }

    '; ?>

    </script>
    <!-- grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplSlidesBottom'), $this);?>

<?php endif; ?>

<!-- content slides end -->