<?php /* Smarty version 2.6.31, created on 2025-08-26 14:27:39
         compiled from blocks/icon_manager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/icon_manager.tpl', 3, false),)), $this); ?>
<!-- icon manager -->

<?php $this->assign('icon_dir', ((is_array($_tmp=(defined('RL_LIBS_URL') ? @RL_LIBS_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'icons/svg-line-set/') : smarty_modifier_cat($_tmp, 'icons/svg-line-set/'))); ?>

<tr>
    <td class="name"><?php if ($this->_tpl_vars['tpl_settings']['listing_type_form_icon']): ?><?php echo $this->_tpl_vars['lang']['use_icon_in_form']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['use_icon_in_menu']; ?>
<?php endif; ?></td>
    <td class="field icon-manager-icon" style="padding-top: 10px">
        <div>
            <?php if ($this->_tpl_vars['sPost']['category_menu'] == '1'): ?>
                <?php $this->assign('category_menu_yes', 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost']['category_menu'] == '0'): ?>
                <?php $this->assign('category_menu_no', 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign('category_menu_no', 'checked="checked"'); ?>
            <?php endif; ?>
            <label><input <?php echo $this->_tpl_vars['category_menu_yes']; ?>
 type="radio" name="category_menu" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <label><input <?php echo $this->_tpl_vars['category_menu_no']; ?>
 type="radio" name="category_menu" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </div>

        <input type="hidden" name="category_menu_icon" value="<?php echo $this->_tpl_vars['sPost']['category_menu_icon']; ?>
" />

        <div class="svg-icon-row">
            <?php echo $this->_tpl_vars['lang']['svg_icon_file']; ?>
:
            <?php if ($this->_tpl_vars['sPost']['category_menu_icon']): ?>
                <img class="img-preview" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['icon_dir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sPost']['category_menu_icon']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sPost']['category_menu_icon'])); ?>
" />
            <?php endif; ?>
            <a class="icon-set" href="javascript://"><?php echo $this->_tpl_vars['lang']['manage']; ?>
</a>
            <span class="icon-reset-cont hide">
                / <a class="icon-reset" href="javascript://"><?php echo $this->_tpl_vars['lang']['reset']; ?>
</a>
            </span>
        </div>
    </td>
</tr>

<script>
lang['search'] = "<?php echo $this->_tpl_vars['lang']['search']; ?>
";
lang['choose'] = "<?php echo $this->_tpl_vars['lang']['choose']; ?>
";
lang['cancel'] = "<?php echo $this->_tpl_vars['lang']['cancel']; ?>
";
rlConfig['url_home'] = "<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
";
rlConfig['template'] = "<?php echo $this->_tpl_vars['config']['template']; ?>
";
<?php echo '

$(function(){
    var icons_dir = '; ?>
'<?php echo $this->_tpl_vars['icon_dir']; ?>
'<?php echo ';
    var $svg_cont = $(\'.icon-manager-icon .svg-icon-row\');
    var $manage   = $svg_cont.find(\'a.icon-set\');
    var $reset    = $svg_cont.find(\'a.icon-reset\');
    var $input    = $(\'input[name=category_menu_icon]\');

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
                    );
                }

                $(\'input[name=category_menu][value=1]\').trigger(\'click\');

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
    });
});

'; ?>

</script>

<!-- icon manager end -->