<?php /* Smarty version 2.6.31, created on 2025-08-26 14:27:39
         compiled from /home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strpos', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 4, false),array('modifier', 'version_compare', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 8, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 9, false),array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 35, false),array('modifier', 'regex_replace', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 35, false),array('function', 'math', '/home/gmoplus/global.gmoplus.com/plugins/categories_icons/admin/add_category_block.tpl', 45, false),)), $this); ?>
<tr>
    <td class="name"><?php echo $this->_tpl_vars['lang']['category_icon']; ?>
</td>
    <td class="field category-icon-cont">
        <?php if ($this->_tpl_vars['sPost']['icon'] && ((is_array($_tmp=$this->_tpl_vars['sPost']['icon'])) ? $this->_run_mod_handler('strpos', true, $_tmp, '.svg') : strpos($_tmp, '.svg')) !== false): ?>
            <?php $this->assign('category_is_svg', true); ?>
        <?php endif; ?>

        <?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '4.9.2', '>=') : version_compare($_tmp, '4.9.2', '>='))): ?>
            <?php $this->assign('icon_dir', ((is_array($_tmp=(defined('RL_LIBS_URL') ? @RL_LIBS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/'))); ?>

            <input type="hidden" name="category_icon_svg" value="<?php if ($this->_tpl_vars['category_is_svg']): ?><?php echo $this->_tpl_vars['sPost']['icon']; ?>
<?php endif; ?>" />

            <span class="svg-icon-row<?php if ($this->_tpl_vars['sPost']['icon'] && ! $this->_tpl_vars['category_is_svg']): ?> hide<?php endif; ?>">
                <?php if ($this->_tpl_vars['category_is_svg']): ?>
                    <img class="img-preview" style="margin-left: 0;" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['icon_dir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sPost']['icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sPost']['icon'])); ?>
" />
                <?php endif; ?>

                <a class="icon-set" href="javascript://"><?php echo $this->_tpl_vars['lang']['category_icon_choose_from_gallery']; ?>
</a>

                <span class="icon-reset-cont hide">
                    / <a class="icon-reset" href="javascript://"><?php echo $this->_tpl_vars['lang']['reset']; ?>
</a>
                </span>
            </span>

            <span class="common-interface<?php if ($this->_tpl_vars['category_is_svg']): ?> hide<?php endif; ?>" style="margin: 0 10px;"><?php echo $this->_tpl_vars['lang']['or']; ?>
</span>
        <?php endif; ?>

        <span class="common-interface<?php if ($this->_tpl_vars['category_is_svg']): ?> hide<?php endif; ?>">
            <input class="file" type="file" name="icon" />

            <span style="display: block;margin: 10px 0;" class="field_description">
                <?php $this->assign('width_replace', ('{')."width".('}')); ?>
                <?php $this->assign('height_replace', ('{')."height".('}')); ?>
                <?php $this->assign('click_replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=settings&group=') : smarty_modifier_cat($_tmp, 'index.php?controller=settings&group=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['ci_groupID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['ci_groupID'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['category_icon_notice'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['width_replace'], $this->_tpl_vars['config']['categories_icons_width']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['width_replace'], $this->_tpl_vars['config']['categories_icons_width'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['height_replace'], $this->_tpl_vars['config']['categories_icons_height']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['height_replace'], $this->_tpl_vars['config']['categories_icons_height'])))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/\[(.*)\]/", $this->_tpl_vars['click_replace']) : smarty_modifier_regex_replace($_tmp, "/\[(.*)\]/", $this->_tpl_vars['click_replace'])); ?>

            </span>
        </span>

        <?php if ($this->_tpl_vars['sPost']['icon'] && ! $this->_tpl_vars['category_is_svg']): ?>
            <div id="gallery">
                <div style="margin: 1px 0 4px 0;">
                    <fieldset style="margin: 0 0 10px 0;">
                        <legend id="legend_details" class="up" onclick="fieldset_action('details');"><?php echo $this->_tpl_vars['lang']['current_icon']; ?>
</legend>
                        <div id="fileupload" class="ui-widget">
                            <span class="item active template-download" style="width: <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['config']['categories_icons_width'],'y' => 8), $this);?>
px; height: <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['config']['categories_icons_width'],'y' => 4), $this);?>
px;">
                                <img src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['sPost']['icon']; ?>
" style="border: 2px solid #D0D0D0; border-radius: 5px 5px 5px 5px; display: block; height: <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['config']['categories_icons_width'],'y' => 4), $this);?>
; width: <?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['config']['categories_icons_width'],'y' => 4), $this);?>
px;" alt="<?php echo $this->_tpl_vars['lang']['category_icon']; ?>
" />
                                <img title="Delete" alt="Delete" class="delete" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
/img/blank.gif" onclick="xajax_deleteIcon('<?php echo $this->_tpl_vars['sPost']['key']; ?>
', '<?php if ($_GET['controller'] == 'listing_types'): ?>listing_type<?php else: ?>category<?php endif; ?>');" />
                            </span>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="loading" id="photos_loading" style="width: 100%;"></div>
        <?php endif; ?>
    </td>
</tr>

<?php if (((is_array($_tmp=$this->_tpl_vars['config']['rl_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '4.9.2', '>=') : version_compare($_tmp, '4.9.2', '>='))): ?>
<script>
lang['search'] = "<?php echo $this->_tpl_vars['lang']['search']; ?>
";
lang['choose'] = "<?php echo $this->_tpl_vars['lang']['choose']; ?>
";
lang['cancel'] = "<?php echo $this->_tpl_vars['lang']['cancel']; ?>
";
lang['load_more'] = "<?php echo $this->_tpl_vars['lang']['load_more']; ?>
";
<?php echo '

$(function(){
    var icons_dir = '; ?>
'<?php echo $this->_tpl_vars['icon_dir']; ?>
'<?php echo ';
    var $svg_cont = $(\'.category-icon-cont .svg-icon-row\');
    var $manage   = $svg_cont.find(\'a.icon-set\');
    var $reset    = $svg_cont.find(\'a.icon-reset\');
    var $input    = $(\'input[type=hidden][name=category_icon_svg]\');
    var $commonInterface = $(\'.common-interface\');

    $manage.flModal({
        width: 789,
        height: \'auto\',
        caption: lang[\'svg_icon_file\'],
        content: \'<div class=""><input name="icon-search" type="text" placeholder="\' + lang[\'search\'] + \'" /><div id="icons-manager-grid"><div>\' + lang[\'loading\'] + \'</div></div><div class="icons-manager-next invisible"><input type="button" value="\' + lang[\'load_more\'] + \'" /></div><div class="icons-manager-controls"><a class="cancel" href="javascript://">\' + lang[\'cancel\'] + \'</a><input disabled="disabled" type="button" value="\' + lang[\'choose\'] + \'" /></div></div>\',
        onReady: function(){
            var $grid = $(\'#icons-manager-grid > div\');
            var $controls = $(\'.icons-manager-controls\');
            var $next_cont = $(\'.icons-manager-next\');
            var $search = $(\'input[name=icon-search]\');
            var $next = $next_cont.find(\'input\');
            var $choose = $controls.find(\'input\');

            var stack = 0;
            var search_timer = 0;
            var search_query = \'\';
            var closeWindow = function(){
                $(\'.modal-window > div:first > span:last\').trigger(\'click\');
            }

            $grid.on(\'click\', \'.icons-manager-grid-icon\', function(){
                $(\'#icons-manager-grid\').find(\'.icon-active\').removeClass(\'icon-active\');
                $(this).addClass(\'icon-active\');
                $choose.attr(\'disabled\', false);
            });
            $controls.find(\'.cancel\').click(function(){
                closeWindow();
            });
            $choose.click(function(){
                var $active_icon = $grid.find(\'.icon-active\');

                if (!$active_icon.data(\'name\')) {
                    return;
                }

                $input.val($active_icon.data(\'name\'));

                if ($svg_cont.find(\'img.img-preview\').length) {
                    $svg_cont.find(\'img.img-preview\').attr(
                        \'src\',
                        $active_icon.find(\'img\').attr(\'src\')
                    );
                } else {
                    $svg_cont.find(\'a.icon-set\').before(
                        $(\'<img>\')
                            .attr(\'src\', $active_icon.find(\'img\').attr(\'src\'))
                            .addClass(\'img-preview\')
                            .css(\'margin-left\', \'0\')
                    );

                    $commonInterface.addClass(\'hide\');
                }

                closeWindow();
            });

            $next.click(function(){
                stack++;
                loadStack();
                $next.val(lang[\'loading\']);
            });

            $search.on(\'keyup\', function(){
                clearTimeout(search_timer);

                stack = 0;
                search_query = $search.val().length < 3 ? \'\' : $search.val();

                search_timer = setTimeout(function(){
                    loadStack();
                }, 700);
            });

            var loadStack = function(){
                var data = {
                    start: stack,
                    q: search_query
                };
                flynax.sendAjaxRequest(\'getSVGIcons\', data, function(response){
                    if (!stack) {
                        $grid.empty();
                    }

                    if (response == \'session_expired\') {
                        location.reload();
                    } else if (response.results) {
                        $.each(response.results, function(index, icon_name){
                            if (/\\.svg$/.test(icon_name)) {
                                var src = icons_dir + icon_name;
                                var class_name = $input.val() == icon_name ? \'icon-active\' : \'\';
                                var $icon = \'<div class="icons-manager-grid-icon \' + class_name + \'" data-name="\' + icon_name + \'" title="\' + icon_name.replace(\'.svg\', \'\') + \'"><img src="\' + src + \'" /></div>\';
                                $grid.append($icon);
                            }
                        });

                        $next_cont[
                            response.next ? \'removeClass\' : \'addClass\'
                        ](\'invisible\');

                        if (stack) {
                            $next.val(lang[\'load_more\']);
                            $grid.parent().animate({scrollTop: $grid.height()}, \'slow\');
                        }
                    } else {
                        $grid.append(lang[\'system_error\']);
                    }
                });
            };

            loadStack();
        }
    });

    $reset.click(function(){
        $input.val(\'\');
        $svg_cont.find(\'img.img-preview\').remove();
        $commonInterface.removeClass(\'hide\');
    });
});

'; ?>

</script>
<?php endif; ?>