<?php /* Smarty version 2.6.31, created on 2025-07-28 09:45:06
         compiled from /home/gmoplus/global.gmoplus.com/plugins/listings_carousel/admin/listings_carousel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/listings_carousel/admin/listings_carousel.tpl', 17, false),array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/listings_carousel/admin/listings_carousel.tpl', 50, false),array('function', 'phrase', '/home/gmoplus/global.gmoplus.com/plugins/listings_carousel/admin/listings_carousel.tpl', 57, false),)), $this); ?>
<!-- listings box -->
<!-- navigation bar -->
<div id="nav_bar">
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['action'] != 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['add']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['items_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

<?php $this->assign('sPost', $_POST); ?>

    <!-- add new/edit block -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;id=<?php echo $_GET['id']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="submit" value="1" />

            <?php if ($_GET['action'] == 'edit'): ?>
                <input type="hidden" name="fromPost" value="1" />
                <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['sPost']['id']; ?>
" />
            <?php endif; ?>
            <table class="form">
            <tr style="display: none;">
                <td class="name">
                    <span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_direction']; ?>

                </td>
                <td>
                    <select id="direction" name="direction">
                        <option value="horizontal" selected="selected"><?php echo $this->_tpl_vars['lang']['listings_carousel_horizontal']; ?>
</option>
                                            </select>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_box']; ?>
</td>
                <td class="field">
                    <fieldset class="light">
                        <legend id="legend_type" onclick="fieldset_action('type');" class="up"><?php echo $this->_tpl_vars['lang']['blocks_list']; ?>
</legend>
                        <div id="type">
                            <table id="list_box">
                                <tr>
                                    <?php $_from = $this->_tpl_vars['box']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['typeF']['iteration']++;
?>
                                    <td valign="top">
                                    <div style="padding: 2px 8px;">
                                        <?php $this->assign('name', ((is_array($_tmp='blocks+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['Key']))); ?>
                                        <input <?php if ($this->_tpl_vars['item']['disabled'] && $this->_tpl_vars['sPost']['box'] && ! ((is_array($_tmp=$this->_tpl_vars['item']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['box']) : in_array($_tmp, $this->_tpl_vars['sPost']['box']))): ?>accesskey="<?php echo $this->_tpl_vars['item']['disabled']; ?>
" disabled="disabled" checked="checked"<?php endif; ?>
                                               class="checkbox"
                                               <?php if ($this->_tpl_vars['sPost']['box'] && ((is_array($_tmp=$this->_tpl_vars['item']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['box']) : in_array($_tmp, $this->_tpl_vars['sPost']['box']))): ?>checked="checked"<?php endif; ?>
                                               id="type_<?php echo $this->_tpl_vars['item']['ID']; ?>
"
                                               type="checkbox"
                                               name="box[<?php echo $this->_tpl_vars['item']['ID']; ?>
]"
                                               value="<?php echo $this->_tpl_vars['item']['ID']; ?>
"
                                        /> <label class="cLabel" for="type_<?php echo $this->_tpl_vars['item']['ID']; ?>
"><?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => $this->_tpl_vars['name'],'db_check' => 'true'), $this);?>
</label>
                                    </div>
                                    </td>

                                    <?php if ($this->_foreach['typeF']['iteration'] % 3 == 0): ?>
                                        </tr><tr>
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                </tr>
                            </table>
                            <span class="field_description" style="margin: 10px 0 10px 4px;display: inline-block;"><?php echo $this->_tpl_vars['lang']['listings_carousel_disabled_box']; ?>
</span>
                            <div class="grey_area" style="margin: 0 0 5px;">
                                <span>
                                    <span onclick="$('#list_box input:not(:disabled)').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#list_box input:not(:disabled)').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </span>
                            </div>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_number']; ?>
</td>
                <td class="field">
                    <input type="text" class="numeric" style="width: 60px; text-align: center;" name="number" value="<?php echo $this->_tpl_vars['sPost']['number']; ?>
" maxlength="2" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listings_carousel_delay']; ?>
</td>
                <td class="field">
                    <input type="text" class="numeric" style="width: 60px; text-align: center;" name="delay" value="<?php echo $this->_tpl_vars['sPost']['delay']; ?>
" maxlength="2" />
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['listings_carousel_in_sec']; ?>
</span>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_per_slide']; ?>
</td>
                <td class="field">
                    <input type="text" class="numeric" style="width: 60px; text-align: center;" name="per_slide" value="<?php echo $this->_tpl_vars['sPost']['per_slide']; ?>
" maxlength="2" />
                </td>
            </tr>
            <tr id="visible_listings" class="hide">
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_visible']; ?>
</td>
                <td class="field">
                    <input type="text" class="numeric" style="width: 60px; text-align: center;" name="visible" value="<?php echo $this->_tpl_vars['sPost']['visible']; ?>
" maxlength="2" />
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['listings_carousel_round']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['round'] == '1'): ?>
                        <?php $this->assign('round_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['round'] == '0'): ?>
                        <?php $this->assign('round_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('round_yes', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['round_yes']; ?>
 class="lang_add" type="radio" name="round" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['round_no']; ?>
 class="lang_add" type="radio" name="round" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>


            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['status']; ?>
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
    <!-- add new block end -->
    <script type="text/javascript">
        var block_id = '<?php echo $_GET['id']; ?>
';
        var boxs = new Array();
        <?php $_from = $this->_tpl_vars['box']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            boxs["<?php echo $this->_tpl_vars['item']['ID']; ?>
"] = new Array( '<?php echo $this->_tpl_vars['item']['Side']; ?>
', '<?php echo $this->_tpl_vars['item']['disabled']; ?>
', '<?php echo $this->_tpl_vars['item']['Carousel_ID']; ?>
');
        <?php endforeach; endif; unset($_from); ?>
        var vertical = new Array('left','right');
        var carusel = <?php if ($_GET['action'] == 'edit'): ?><?php echo $_GET['id']; ?>
<?php else: ?>''<?php endif; ?>;
        var diraction = $('#direction').val();
        <?php echo '

        $(document).ready(function(){
            if ( diraction == "vertical" ) {
                $(\'#visible_listings\').show();
            }
            $(\'#direction\').change(function(){
                diraction = $(this).val();
                if ( diraction == "vertical" ) {
                    $(\'#visible_listings\').show();
                }
                else if ( diraction != "vertical" ){
                    $(\'#visible_listings\').hide();
                }

                $(\'#list_box input\').each(function(){
                    var id = $(this).val();
                    $(this).removeAttr("disabled");
                    if ( diraction == "vertical" )
                    {
                        if($.inArray(boxs[id][0], vertical) > -1)
                        {
                            if(boxs[id][1]==\'1\' && block_id!=boxs[id][2])
                            {
                                $(this).attr("disabled", "disabled");
                            }
                        }
                        else
                        {
                            $(this).attr("disabled", "disabled");
                        }
                    }
                    else
                    {
                        if(boxs[id][1]==1 && boxs[id][2]!=carusel)
                        {
                            $(this).attr("disabled", "disabled");
                        }
                    }
                });
            });
            $(\'#list_box input\').each(function(){
                var id = $(this).val();
                $(this).removeAttr("disabled");
                if ( diraction == "vertical" )
                {
                    if($.inArray(boxs[id][0], vertical) > -1)
                    {
                        if(boxs[id][1]==\'1\' && block_id!=boxs[id][2])
                        {
                            $(this).attr("disabled", "disabled");
                        }
                    }
                    else
                    {
                        $(this).attr("disabled", "disabled");
                    }
                }
                else
                {
                    if(boxs[id][1]==1 && boxs[id][2]!=carusel)
                    {
                        $(this).attr("disabled", "disabled");
                        $(this).attr("checked", "checked");
                    }
                }
            });
        });

        '; ?>

        </script>

<?php else: ?>
    <div id="gridListingsCarousel"></div>
    <script type="text/javascript">//<![CDATA[
    var listingsCarousel;

    <?php echo '
    $(document).ready(function(){

        listingsCarousel = new gridObj({
            key: \'listings_carousel\',
            id: \'gridListingsCarousel\',
            ajaxUrl: rlPlugins + \'listings_carousel/admin/listings_carousel.inc.php?q=ext\',
            defaultSortField: \'ID\',
            title: lang[\'ext_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'Direction\', mapping: \'Direction\'},
                {name: \'Delay\', mapping: \'Delay\'},
                {name: \'Number\', mapping: \'Number\'},
                {name: \'Per_slide\', mapping: \'Per_slide\'},
                {name: \'Visible\', mapping: \'Visible\'},
                {name: \'Assigned_boxes\', mapping: \'Assigned_boxes\'},
                {name: \'Status\', mapping: \'Status\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 40,
                    fixed: true
                },{
                    header: lang[\'listings_carousel_box\'],
                    dataIndex: \'Assigned_boxes\',
                    width: 20
                },/*{
                    header: lang[\'listings_carousel_direction\'],
                    dataIndex: \'Direction\',
                    width: 120,
                    fixed: true
                },*/{
                    header: lang[\'listings_carousel_number\'],
                    dataIndex: \'Number\',
                    width: 160,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        maxValue: 30,
                        minValue: 1
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'listings_carousel_delay\'],
                    dataIndex: \'Delay\',
                    width: 120,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        maxValue: 30,
                        minValue: 0
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'listings_carousel_per_slide\'],
                    dataIndex: \'Per_slide\',
                    width: 160,
                    fixed: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        maxValue: 30,
                        minValue: 1
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'listings_carousel_visible\'],
                    dataIndex: \'Visible\',
                    width: 120,
                    fixed: true,
                    hidden: true,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        maxValue: 30,
                        minValue: 1
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 120,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang[\'ext_active\']],
                            [\'approval\', lang[\'ext_approval\']]
                        ],
                        mode: \'local\',
                        typeAhead: true,
                        triggerAction: \'all\',
                        selectOnFocus: true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(id) {
                        var out = "<center>";
                        var splitter = false;

                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&id="+id+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";


                            // delete
                            out += \'<img data-id="\'+id+\'" class="remove" ext:qtip="\' + lang[\'ext_delete\'] + \'"\';
                            out += \'src="\' + rlUrlHome + \'img/blank.gif"  />\';

                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        listingsCarousel.init();
        grid.push(listingsCarousel.grid);

        $(\'#gridListingsCarousel\').on(\'click\', \'img.remove\', deleteListingsCarousel.confirm)
    });

    var deleteListingsCarouselClass = function(){

        this.confirm = function() {
            var id = $(this).data("id");
            rlConfirm(lang[\'ext_notice_delete\'], "deleteListingsCarousel.request", id);
        }

        this.request = function(index) {
            $.getJSON(rlConfig["ajax_url"], {item: \'deleteListingsCarousel\', id: index}, function (response) {
                if(response.status == \'ok\') {
                    printMessage(\'notice\', response.message);
                    listingsCarousel.init();
                }
            });
        }
    }

    var deleteListingsCarousel = new deleteListingsCarouselClass();
    '; ?>

    //]]>
    </script>
<?php endif; ?>
<!-- listings box end -->