<?php /* Smarty version 2.6.31, created on 2025-10-17 15:30:38
         compiled from /home/gmoplus/global.gmoplus.com/plugins/bookmarks/admin/bookmarks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/bookmarks/admin/bookmarks.tpl', 24, false),array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/bookmarks/admin/bookmarks.tpl', 306, false),array('modifier', 'ceil', '/home/gmoplus/global.gmoplus.com/plugins/bookmarks/admin/bookmarks.tpl', 313, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/bookmarks/admin/bookmarks.tpl', 411, false),)), $this); ?>
<!-- bookmarks tpl -->

<link type="text/css" rel="stylesheet" href="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
bookmarks/static/style-admin.css" />
<style>
<?php echo '
ul.networks-list > li > span.nav-icon {
    background-image: url(\''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/form.png<?php echo '\');
}
'; ?>

</style>

<!-- navigation bar -->
<div id="nav_bar">
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['bsh_add_block']; ?>
</span><span class="right"></span></a>
    <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['items_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add new/edit block -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&item=<?php echo $_GET['item']; ?>
<?php endif; ?>" method="post">
        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>
        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['bsh_bookmark_type']; ?>
</td>
            <td class="field" style="padding-top: 10px">
                <div class="bookmarks-type<?php if ($_GET['action'] == 'edit'): ?> edit-mode<?php endif; ?>">
                    <label<?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['type'] == 'floating_bar'): ?> class="hide"<?php endif; ?>>
                        <div>
                            <input
                                type="radio"
                                name="type"
                                value="inline"
                                <?php if ($this->_tpl_vars['sPost']['type'] == 'inline' || ! $this->_tpl_vars['sPost']['type']): ?>
                                checked="checked"
                                <?php endif; ?>
                                <?php if ($_GET['action'] == 'edit'): ?>
                                class="hide"
                                <?php endif; ?>
                                />

                            <?php echo $this->_tpl_vars['lang']['bsh_inline']; ?>

                        </div>
                        <img src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
bookmarks/static/inline.png" />
                    </label>

                    <label<?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['type'] == 'inline'): ?> class="hide"<?php endif; ?>>
                        <div>
                            <input
                                type="radio"
                                name="type"
                                value="floating_bar"
                                <?php if ($this->_tpl_vars['sPost']['type'] == 'floating_bar'): ?>
                                checked="checked"
                                <?php endif; ?>
                                <?php if ($_GET['action'] == 'edit'): ?>
                                class="hide"
                                <?php endif; ?>
                                />

                            <?php echo $this->_tpl_vars['lang']['bsh_floating_bar']; ?>

                        </div>
                        <img src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
bookmarks/static/floating-bar.png" />
                    </label>
                </div>

                <script>
                var bookmark_key = '<?php echo $this->_tpl_vars['block_info']['Key']; ?>
';
                <?php echo '

                $(function(){
                    "use strict";

                    var $type_input = $(\'input[name=type]\');
                    var typeChangeHandler = function(){
                        var $input = $type_input.filter(\':checked\');
                        var val = $input.val();

                        $(\'#inline_settings\')[val == \'inline\' && [\'bookmark_details\', \'bookmark_done_step\'].indexOf(bookmark_key) < 0
                            ? \'slideDown\'
                            : \'slideUp\'
                        ]();
                    }

                    typeChangeHandler();
                    $type_input.change(function(){
                        typeChangeHandler();
                    });
                });

                '; ?>

                </script>
            </td>
        </tr>
        </table>

        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['bookmarks_social_networks']; ?>
</td>
            <td class="field" style="padding: 5px 0 15px;">
                <input
                    type="hidden"
                    name="services"
                    value="<?php if ($this->_tpl_vars['sPost']['services']): ?><?php echo $this->_tpl_vars['sPost']['services']; ?>
<?php else: ?>facebook,twitter,pinterest,email,dd<?php endif; ?>"
                    />

                <div class="bookmarks-type-container" id="service_custom">
                    <div>
                        <b><?php echo $this->_tpl_vars['lang']['bookmarks_available_services']; ?>
</b>
                        <div class="bookmarks-search">
                            <input type="text" name="search" autocomplete="off" placeholder="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
                        </div>
                        <ul class="networks-list" id="available-list">
                            <?php $_from = $this->_tpl_vars['services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['services'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['services']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['service_key'] => $this->_tpl_vars['service']):
        $this->_foreach['services']['iteration']++;
?>
                                <li
                                    data-code="<?php echo $this->_tpl_vars['service_key']; ?>
"
                                    data-name="<?php echo $this->_tpl_vars['service']['name']; ?>
"
                                    <?php if ($this->_tpl_vars['service']['original']): ?>
                                    data-original="true"
                                    <?php endif; ?>
                                    >
                                    <span class="icon" style="background-color: #<?php echo $this->_tpl_vars['service']['color']; ?>
;">
                                        <img
                                            src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif"
                                            data-src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
bookmarks/static/icons/<?php echo $this->_tpl_vars['service']['icon']; ?>
.svg" />
                                    </span>
                                    <?php echo $this->_tpl_vars['service']['name']; ?>

                                    <span class="nav-icon"></span>
                                </li>
                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                    <div>
                        <b><?php echo $this->_tpl_vars['lang']['bookmarks_selected_services']; ?>
</b>
                        <ul class="networks-list" id="selected-list"></ul>
                    </div>
                </div>
            </td>
        </tr>
        </table>

        <script>
        <?php echo '

        $(function(){
            "use strict";

            var $networks = $(\'ul.networks-list\');
            var $available_list = $(\'#available-list\');
            var $selected_list = $(\'#selected-list\');
            var $items = $available_list.find(\'> li\');
            var $search_input = $(\'.bookmarks-search input\');
            var $services_input = $(\'input[name=services]\');

            var updateInput = function(){
                var codes = $selected_list.find(\'> li\')
                    .map(function(){
                        return $(this).data(\'code\');
                    })
                    .get()
                    .join(\',\');

                $services_input.val(codes);
            }

            // Search
            $search_input.on(\'keyup\', function(char){
                var val = this.value;
                var pattern = new RegExp(val, \'gi\');

                if (val == \'\') {
                    $items.removeClass(\'hide\');
                } else {
                    $items
                        .addClass(\'hide\')
                        .filter(function(index){
                            return $(this).data(\'name\').match(pattern);
                        })
                        .removeClass(\'hide\');
                }
            });

            // Management
            $networks.on(\'click\', \'span.nav-icon\', function(){
                var $item = $(this).closest(\'li\');
                var $source_cont = $(this).closest(\'.networks-list\');
                var code = $item.data(\'code\');

                // Add
                if ($source_cont.attr(\'id\') == \'available-list\') {
                    $selected_list.append($item.clone());
                    $item.addClass(\'disabled\');
                }
                // Remove
                else {
                    $item.remove();
                    $available_list.find(\'li[data-code=\' + code + \']\').removeClass(\'disabled\');
                }

                updateInput();
            });

            // Default selection
            if ($services_input.val()) {
                var default_services = $services_input.val().split(\',\');
                for (var i in default_services) {
                    $available_list.find(\'li[data-code="\' + default_services[i] + \'"] span.nav-icon\')
                        .trigger(\'click\');
                }
            }

            $selected_list.sortable({
                stop: function(event, ui){
                    updateInput();
                }
            });

            // Replace svg with it\'s content
            $networks.find(\'img\').each(function(index, item){
                $.get($(item).data(\'src\'), function(data) {
                    $(item).replaceWith($(data).find(\'svg\'));
                });
            });
        });

        '; ?>

        </script>

        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['bookmarks_theme']; ?>
</td>
            <td class="field">
                <select name="theme">
                    <?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['themes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['themes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['theme_key'] => $this->_tpl_vars['theme_name']):
        $this->_foreach['themes']['iteration']++;
?>
                        <option
                            <?php if ($this->_tpl_vars['sPost']['theme'] == $this->_tpl_vars['theme_key'] || ( $this->_tpl_vars['sPost']['theme'] && ($this->_foreach['themes']['iteration'] <= 1) )): ?>
                            selected="selected"
                            <?php endif; ?>
                            value="<?php echo $this->_tpl_vars['theme_key']; ?>
">
                            <?php echo $this->_tpl_vars['theme_name']; ?>

                        </option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        </table>

        <div id="modern_settings">
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['bookmarks_show_counters']; ?>
</td>
                <td class="field" style="padding-top: 10px;">
                    <?php $this->assign('checkbox_field', 'counter'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <input <?php echo $this->_tpl_vars['counter_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['counter_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['bookmarks_button_size']; ?>
</td>
                <td class="field">
                    <select name="button_size">
                        <?php $_from = $this->_tpl_vars['button_sizes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['size_key'] => $this->_tpl_vars['size_name']):
?>
                            <option <?php if ($this->_tpl_vars['sPost']['button_size'] == $this->_tpl_vars['size_key']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['size_key']; ?>
"><?php echo $this->_tpl_vars['size_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            </table>
        </div>

        <table class="form">
        <tr<?php if ($this->_tpl_vars['block_info']['Key'] == 'bookmark_details' || $this->_tpl_vars['block_info']['Key'] == 'bookmark_done_step'): ?> class="hide"<?php endif; ?>>
            <td class="name"><?php echo $this->_tpl_vars['lang']['show_on_pages']; ?>
</td>
            <td class="field" id="pages_obj">
                <fieldset class="light">
                    <?php $this->assign('pages_phrase', 'admin_controllers+name+pages'); ?>
                    <legend id="legend_pages" class="up"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['pages_phrase']]; ?>
</legend>
                    <div id="pages">
                        <div id="pages_cont" <?php if (! empty ( $this->_tpl_vars['sPost']['show_on_all'] )): ?>style="display: none;"<?php endif; ?>>
                            <?php $this->assign('bPages', $this->_tpl_vars['sPost']['pages']); ?>
                            <table class="sTable" style="margin-bottom: 15px;">
                            <tr>
                                <td valign="top">
                                <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pagesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pagesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['pagesF']['iteration']++;
?>
                                <?php $this->assign('pId', $this->_tpl_vars['page']['ID']); ?>
                                <div style="padding: 2px 8px;">
                                    <input class="checkbox"
                                           <?php if ($this->_tpl_vars['bPages'] && ((is_array($_tmp=$this->_tpl_vars['page']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['bPages']) : in_array($_tmp, $this->_tpl_vars['bPages']))): ?>checked="checked"<?php endif; ?>
                                           id="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
"
                                           type="checkbox"
                                           name="pages[<?php echo $this->_tpl_vars['page']['ID']; ?>
]"
                                           value="<?php echo $this->_tpl_vars['page']['ID']; ?>
"
                                    /> <label class="cLabel" for="page_<?php echo $this->_tpl_vars['page']['ID']; ?>
"><?php echo $this->_tpl_vars['page']['name']; ?>
</label>
                                </div>
                                <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['pagesF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                <?php if ($this->_foreach['pagesF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                    </td>
                                    <td valign="top">
                                <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                </td>
                            </tr>
                            </table>
                        </div>

                        <div class="grey_area" style="margin: 0 0 5px;">
                            <label><input id="show_on_all" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>checked="checked"<?php endif; ?> type="checkbox" name="show_on_all" value="true" /> <?php echo $this->_tpl_vars['lang']['sticky']; ?>
</label>
                            <span id="pages_nav" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>class="hide"<?php endif; ?>>
                                <span onclick="$('#pages_cont input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                <span class="divider"> | </span>
                                <span onclick="$('#pages_cont input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                            </span>
                        </div>
                    </div>
                </fieldset>

                <script type="text/javascript">
                <?php echo '

                $(document).ready(function(){
                    $(\'#legend_pages\').click(function(){
                        fieldset_action(\'pages\');
                    });

                    $(\'input#show_on_all\').click(function(){
                        $(\'#pages_cont\').slideToggle();
                        $(\'#pages_nav\').fadeToggle();
                    });
                });

                '; ?>

                </script>
            </td>
        </tr>

        <?php if ($_GET['action'] == 'edit'): ?>
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
        <?php endif; ?>

        </table>

        <div id="inline_settings" class="hide">
            <table class="form">
            <tr>
                <td class="divider" colspan="3">
                    <div class="inner"><?php echo $this->_tpl_vars['lang']['bookmarks_box_options']; ?>
</div>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['use_block_design']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['tpl'] == '1'): ?>
                        <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['tpl'] == '0'): ?>
                        <?php $this->assign('tpl_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('tpl_no', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['tpl_yes']; ?>
 type="radio" name="tpl" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['tpl_no']; ?>
 type="radio" name="tpl" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['use_block_header']; ?>
</td>
                <td class="field">
                    <?php if ($this->_tpl_vars['sPost']['header'] == '1'): ?>
                        <?php $this->assign('header_yes', 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost']['header'] == '0'): ?>
                        <?php $this->assign('header_no', 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign('header_no', 'checked="checked"'); ?>
                    <?php endif; ?>
                    <label><input <?php echo $this->_tpl_vars['header_yes']; ?>
 class="lang_add" type="radio" name="header" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input <?php echo $this->_tpl_vars['header_no']; ?>
 class="lang_add" type="radio" name="header" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>
            </table>

            <div id="box_name" class="hide">
                <table class="form">
                <tr>
                    <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                    <td class="field">
                        <?php if (count($this->_tpl_vars['languages']) > 1): ?>
                            <ul class="tabs">
                                <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
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

                        <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
                            <?php if (count($this->_tpl_vars['languages']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                            <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350" />
                            <?php if (count($this->_tpl_vars['languages']) > 1): ?>
                                    <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                </table>
            </div>

            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['block_side']; ?>
</td>
                <td class="field">
                    <select name="side">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['l_block_sides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sides_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sides_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sKey'] => $this->_tpl_vars['block_side']):
        $this->_foreach['sides_f']['iteration']++;
?>
                        <option value="<?php echo $this->_tpl_vars['sKey']; ?>
" <?php if ($this->_tpl_vars['sKey'] == $this->_tpl_vars['sPost']['side']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['block_side']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['bookmarks_align']; ?>
</td>
                <td class="field">
                    <select name="align">
                        <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['aligns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['align'] => $this->_tpl_vars['align_name']):
?>
                            <option <?php if ($this->_tpl_vars['sPost']['align'] == $this->_tpl_vars['align']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['align']; ?>
"><?php echo $this->_tpl_vars['align_name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            </table>
        </div>

        <script>
        <?php echo '

        $(function(){
            "use strict";

            var $header = $(\'input[name=header]\');
            var boxHeaderHandler = function(){
                $(\'#box_name\')[$header.filter(\':checked\').val() == \'1\'
                    ? \'slideDown\'
                    : \'slideUp\'
                ]();
            }

            boxHeaderHandler();
            $header.change(function(){
                boxHeaderHandler();
            });
        });

        '; ?>

        </script>

        <table class="form">
        <tr>
            <td class="name" style="background: none;"></td>
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

<?php else: ?>

    <!-- grid -->
    <div id="grid"></div>
    <script>
    lang['bookmarks_align'] = "<?php echo $this->_tpl_vars['lang']['bookmarks_align']; ?>
";
    lang['bookmark_left'] = "<?php echo $this->_tpl_vars['lang']['bookmark_left']; ?>
";
    lang['bookmark_center'] = "<?php echo $this->_tpl_vars['lang']['bookmark_center']; ?>
";
    lang['bookmark_right'] = "<?php echo $this->_tpl_vars['lang']['bookmark_right']; ?>
";
    lang['show_on_pages'] = "<?php echo $this->_tpl_vars['lang']['show_on_pages']; ?>
";
    /**
     * @todo - remove this declaration and set js=1 for that phrase once plugin compatibility will be 4.8.1
     */
    lang['bookmarks_ext_caption'] = "<?php echo $this->_tpl_vars['lang']['bookmarks_ext_caption']; ?>
";
    <?php echo '

    var systemBoxKeys = [\'bookmark_details\', \'bookmark_done_step\'];
    var listingGroupsGrid;

    $(document).ready(function(){
        bookmarkGrid = new gridObj({
            key: \'bookmarks\',
            id: \'grid\',
            ajaxUrl: rlConfig[\'ajax_url\'] + \'?item=bookmarks_fetch\',
            defaultSortField: \'Name\',
            title: lang[\'bookmarks_ext_caption\'],
            remoteSortable: false,
            fields: [
                {name: \'Name\', mapping: \'Name\', type: \'string\'},
                {name: \'Key\', mapping: \'Key\', typr: \'string\'},
                {name: \'Status\', mapping: \'Status\', type: \'string\'},
                {name: \'ID\', mapping: \'ID\'},
                {name: \'Type\', mapping: \'Type\', type: \'string\'},
                {name: \'Type_name\', mapping: \'Type_name\', type: \'string\'},
                {name: \'Align\', mapping: \'Align\', type: \'string\'},
                {name: \'Tpl\', mapping: \'Tpl\', type: \'string\'},
                {name: \'Header\', mapping: \'Header\', type: \'string\'},
                {name: \'Pages\', mapping: \'Pages\', type: \'string\'},
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'Name\',
                    width: 20,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'show_on_pages\'],
                    dataIndex: \'Pages\',
                    width: 20
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type_name\',
                    width: 180,
                    fixed: true,
                    id: \'rlExt_item\'
                },{
                    header: lang[\'bookmarks_align\'],
                    dataIndex: \'Align\',
                    width: 140,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'left\', lang[\'bookmark_left\']],
                            [\'center\', lang[\'bookmark_center\']],
                            [\'right\', lang[\'bookmark_right\']]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus: true
                    }),
                    renderer: function(val, data, row){
                        return row.data.Type == \'floating_bar\' || systemBoxKeys.indexOf(row.data.Key) >= 0
                            ? lang[\'ext_not_available\']
                            : \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_block_header\'],
                    dataIndex: \'Header\',
                    width: 140,
                    fixed: true
                },{
                    header: lang[\'ext_block_style\'],
                    dataIndex: \'Tpl\',
                    width: 140,
                    fixed: true,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'1\', lang[\'ext_yes\']],
                            [\'0\', lang[\'ext_no\']]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus: true
                    }),
                    renderer: function(val, data, row){
                        return row.data.Type == \'floating_bar\' || systemBoxKeys.indexOf(row.data.Key) >= 0
                            ? lang[\'ext_not_available\']
                            : \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    fixed: true,
                    width: 100,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang[\'ext_active\']],
                            [\'approval\', lang[\'ext_approval\']]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus: true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(id, data, row) {
                        var out = "<center>";
                        out += "<a href=\'" + rlUrlHome + "index.php?controller=" + controller + "&action=edit&item=" + id +"\'>";
                        out += "<img class=\'edit\' ext:qtip=\'" + lang[\'ext_edit\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' />";
                        out += "</a>";
                        if (systemBoxKeys.indexOf(row.data.Key) < 0) {
                            out += "<img class=\'remove\' ext:qtip=\'" + lang[\'ext_delete\'] + "\' src=\'" + rlUrlHome + "img/blank.gif\' data-id=" + id + " />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        bookmarkGrid.init();
        grid.push(bookmarkGrid.grid);

        bookmarkGrid.grid.addListener(\'beforeedit\', function(editEvent){
            if ((
                [\'Align\', \'Header\', \'Tpl\'].indexOf(editEvent.field) >= 0
                && (editEvent.record.data.Type == \'floating_bar\'
                    || systemBoxKeys.indexOf(editEvent.record.data.Key) >= 0)
                )
                || (editEvent.field == \'Header\' && editEvent.record.data.Type == \'inline\')
            ) {
                editEvent.cancel = true;
                bookmarkGrid.store.rejectChanges();
            }
        });

        // Remove handler
        $(\'#grid\').on(\'click\', \'center img.remove\', function(){
            var id = $(this).data(\'id\');

            Ext.MessageBox.confirm(lang[\'confirm\'], lang[\'ext_notice_delete\'], function(btn){
                if (btn == \'yes\') {
                    var data = {
                        item: \'bookmarks_delete\',
                        id: id
                    };
                    $.post(rlConfig[\'ajax_url\'], data, function(response, status){
                        if (status == \'success\' && response.status == \'OK\') {
                            bookmarkGrid.reload();
                            printMessage(\'notice\', response.message);
                        } else if (response.status == \'ERROR\' && response.redirect) {
                            location.href = response.redirect;
                        } else {
                            printMessage(\'error\', lang[\'system_error\']);
                        }
                    }, \'json\').fail(function(object, status){
                        if (status == \'abort\') {
                            return;
                        }

                        printMessage(\'error\', status);
                    });
                }
            });
        });
    });

    '; ?>

    </script>
    <!-- grid end -->
<?php endif; ?>

<!-- bookmarks tpl end -->