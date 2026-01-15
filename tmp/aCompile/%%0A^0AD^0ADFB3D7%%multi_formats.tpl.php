<?php /* Smarty version 2.6.31, created on 2025-08-09 18:59:40
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/admin/multi_formats.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/multi_formats.tpl', 24, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/multi_formats.tpl', 156, false),array('modifier', 'strtolower', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/multi_formats.tpl', 405, false),)), $this); ?>
<link href="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
multiField/static/aStyle.css" type="text/css" rel="stylesheet" />

<!-- navigation bar -->
<div id="nav_bar">
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <?php if (! $_GET['action'] && ! $_GET['parent']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="center_add"><?php echo $this->_tpl_vars['lang']['mf_add_item']; ?>
</span></a>
        <?php elseif ($_GET['parent']): ?>
            <a onclick="show('search');$('#add_item,#load_cont,#edit_item,#related_fields').slideUp('fast');" href="javascript:void(0)" class="button_bar"><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span></a>
            <a onclick="show('add_item');$('#search,#load_cont,#edit_item,#related_fields').slideUp('fast');" href="javascript:void(0)" class="button_bar"><span class="center_add"><?php echo $this->_tpl_vars['lang']['add_item']; ?>
</span></a>
            <a onclick="show('related_fields');$('#add_item,#search,#load_cont,#edit_item').slideUp('fast');" href="javascript:void(0)" class="button_bar"><span class="center_list"><?php echo $this->_tpl_vars['lang']['mf_related_fields']; ?>
</span></a>
            <a id="load_button" href="javascript:void(0)" class="button_bar"><span class="center_import"><?php echo $this->_tpl_vars['lang']['mf_import_flsource']; ?>
</span></a>
        <?php elseif ($_GET['action'] == 'edit'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
parent=<?php echo $this->_tpl_vars['item_info']['ID']; ?>
" class="button_bar"><span class="center_build"><?php echo $this->_tpl_vars['lang']['mf_manage_items']; ?>
</span></a>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($_GET['action'] == 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['mf_formats_list']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField') : smarty_modifier_cat($_tmp, 'multiField')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'import_interface.tpl') : smarty_modifier_cat($_tmp, 'import_interface.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- load from server -->
<div id="load_cont" class="hide" style="margin-top:15px">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('key' => 'fl_load','loading' => 1,'fixed' => 0,'navigation' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="white block_loading" style="height:57px" id="flsource_container"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<!-- load from server end -->

<?php if ($_GET['parent']): ?>

    <!-- search -->
    <div id="search" class="hide">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <form method="post" onsubmit="return false;" id="search_form" action="">
        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mf_name']; ?>
</td>
            <td class="field">
                <input type="text" id="search_name" />
                <label style="display:block;padding: 5px 0;"><input value="1" type="checkbox" id="search_all" /> <?php echo $this->_tpl_vars['lang']['mf_search_all_levels']; ?>
</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" id="search_button" />
                <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_search_button" />

                <a class="cancel" href="javascript:void(0)" onclick="$('#search').slideUp('fast')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
            </td>
        </tr>
        </table>
    </form>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <script type="text/javascript">
    var remote_filters = new Array();
    <?php echo '

    var search = new Array();
    var cookie_filters = new Array();

    $(document).ready(function(){
        if (readCookie(\'mf_sc\') || remote_filters.length > 0)
        {
            $(\'#search\').show();
            cookie_filters = remote_filters.length > 0 ? remote_filters : readCookie(\'mf_sc\').split(\',\');

            for (var i in cookie_filters)
            {
                if ( typeof(cookie_filters[i]) == \'string\' )
                {
                    var item = cookie_filters[i].split(\'||\');
                    if ( item[0] != \'undefined\' && item[0] != \'\' )
                    {
                        $(\'#search_\'+item[0].toLowerCase()).selectOptions(item[1]);
                    }
                }
            }
        }

        $(\'#search_form\').submit(function(){
            search = new Array();
            search.push( new Array(\'action\', \'search\') );
            search.push( new Array(\'Name\', $(\'#search_name\').val()) );
            search.push( new Array(\'Parent\', \''; ?>
<?php echo $_GET['parent']; ?>
<?php echo '\'));
            if ($(\'#search_all:checked\').val()) {
                search.push( new Array(\'Search_all_levels\', \'1\'));
            }

            var save_search = new Array();
            for(var i in search)
            {
                if ( search[i][1] != \'\' && typeof(search[i][1]) != \'undefined\'  )
                {
                    save_search.push(search[i][0]+\'||\'+search[i][1]);
                }
            }
            createCookie(\'mf_sc\', save_search, 1);

            itemsGrid.filters = search;
            itemsGrid.reload();
        });

        $(\'#reset_search_button\').click(function(){
            eraseCookie(\'mf_sc\');
            itemsGrid.reset();

            $("#search select option[value=\'\']").attr(\'selected\', true);
            $("#search input[type=text]").val(\'\');
            $("#search input").each(function(){
                if ( $(this).attr(\'type\') == \'radio\' )
                {
                    $(this).prop(\'checked\', false);
                }
            });
        });

    });

    '; ?>

    </script>
    <!-- search end -->
<?php endif; ?>

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>
    <!-- add/edit -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;item=<?php echo $_GET['item']; ?>
<?php endif; ?>" method="post">
        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>

        <div id="new_format_cont">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
                <td class="field">
                    <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled<?php endif; ?>" name="key" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['key']; ?>
" maxlength="30" />
                </td>
            </tr>
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['mf_name']; ?>
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
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
">
                        <?php endif; ?>
                        <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" style="width: 250px;" maxlength="50" />
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span></div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['mf_order_type']; ?>
</td>
                <td class="field">
                    <select name="order_type">
                        <option value="alphabetic" <?php if ($this->_tpl_vars['sPost']['order_type'] == 'alphabetic'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['alphabetic_order']; ?>
</option>
                        <option value="position" <?php if ($this->_tpl_vars['sPost']['order_type'] == 'position'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['position_order']; ?>
</option>
                    </select>
                </td>
            </tr>
            </table>
        </div>

        <table class="form">
        <?php if (! $this->_tpl_vars['geo_format_data']['Key'] || $this->_tpl_vars['geo_format_data']['Key'] == $_GET['item']): ?>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['mf_geofilter']; ?>
</td>
            <td class="field">
                <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['geo_format_data']['Key'] == $_GET['item']): ?>
                    <?php $this->assign('disabled_tag', 'disabled="disabled"'); ?>
                <?php endif; ?>

                <?php if ($this->_tpl_vars['sPost']['geo_filter'] == '1'): ?>
                    <?php $this->assign('geofilter_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['geo_filter'] == '0'): ?>
                    <?php $this->assign('geofilter_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('geofilter_no', 'checked="checked"'); ?>
                <?php endif; ?>

                <label><input <?php echo $this->_tpl_vars['geofilter_yes']; ?>
 <?php echo $this->_tpl_vars['disabled_tag']; ?>
 class="lang_add" type="radio" name="geo_filter" value="1" /> <?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['geofilter_no']; ?>
 <?php echo $this->_tpl_vars['disabled_tag']; ?>
 class="lang_add" type="radio" name="geo_filter" value="0" /> <?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
            </td>
        </tr>
        <?php endif; ?>
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
    <!-- add end -->
<?php else: ?>
    <!-- add new item -->
    <div id="add_item" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['add_item'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/manage_item.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/manage_item.tpl')), 'smarty_include_vars' => array('mode' => 'add')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <!-- edit item -->
    <div id="edit_item" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['edit_item'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/manage_item.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/manage_item.tpl')), 'smarty_include_vars' => array('mode' => 'edit')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- edit item end -->

    <script>
    if (typeof rlLang == 'undefined') var rlLang = '<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
';
    var geo_format = <?php if ($this->_tpl_vars['geo_format_data'] && $this->_tpl_vars['geo_format_data']['Key'] == $this->_tpl_vars['head_level_data']['Key']): ?>true<?php else: ?>false<?php endif; ?>;
    var parent_key = '<?php echo $this->_tpl_vars['parent_info']['Key']; ?>
';
    var system_lang = '<?php echo $this->_tpl_vars['config']['lang']; ?>
';
    var level = <?php if (is_numeric ( $this->_tpl_vars['level'] )): ?><?php echo $this->_tpl_vars['level']; ?>
<?php else: ?>null<?php endif; ?>;
    rlConfig['mf_geo_subdomains_type'] = '<?php echo $this->_tpl_vars['config']['mf_geo_subdomains_type']; ?>
';
    rlConfig['mf_multilingual_path'] = <?php if ($this->_tpl_vars['config']['mf_multilingual_path']): ?>true<?php else: ?>false<?php endif; ?>;
    rlConfig['mf_geo_subdomains'] = <?php if ($this->_tpl_vars['config']['mf_geo_subdomains']): ?>true<?php else: ?>false<?php endif; ?>;
    lang['notice_field_empty'] = "<?php echo $this->_tpl_vars['lang']['notice_field_empty']; ?>
";
    lang['item_added'] = "<?php echo $this->_tpl_vars['lang']['item_added']; ?>
";
    lang['item_edited'] = "<?php echo $this->_tpl_vars['lang']['item_edited']; ?>
";

    <?php echo '

    // Add/Edit item handler
    $(function(){
        var default_name = \'name_\' + system_lang;

        var $form = $(\'form.manage-item-form\');
        var $defaultName = $form.find(\'[name=\' + default_name + \']\');

        $defaultName.focus(function(){
            $(this).removeClass(\'error\');
        });

        $form.on(\'submit\', function(e){
            e.preventDefault();

            var errors = [];
            var form_mode = $(this).attr(\'name\').replace(\'-item-form\', \'\');
            var names = $(this).find(\'[name^="name_"]\').serializeArray();

            var $submit = $(this).find(\'input[type=submit]\');

            for (var i = 0; i < names.length; i++) {
                if (names[i].name == default_name && names[i].value.length <= 2) {
                    errors.push(lang[\'notice_field_empty\'].replace(\'{field}\', lang[\'ext_name\']));
                    $defaultName.addClass(\'error\');
                }
            }

            if (errors.length) {
                printMessage(\'error\', errors);
            } else {
                $submit.val(lang[\'loading\']).attr(\'disabled\', true);

                var data = {
                    mode: form_mode == \'add\' ? \'mfAddItem\' : \'mfEditItem\',
                    parentKey: parent_key,
                    status: $(this).find(\'[name=status]\').val(),
                    key: $(this).find(\'[name=key]\').val(),
                    names: names,
                    paths: $(this).find(\'[name^="path_"]\').serializeArray(),
                    lat: $(this).find(\'[name=lat]\').val(),
                    lng: $(this).find(\'[name=lng]\').val()
                };

                $.post(rlConfig[\'ajax_url\'], data, function(response, status){
                    if (status == \'success\') {
                        if (response.status == \'OK\') {
                            var message = form_mode == \'add\' ? lang[\'item_added\'] : lang[\'item_edited\'];
                            message = response.message ? response.message : message;

                            printMessage(\'notice\', message);
                            itemsGrid.reload();
                            $(\'#\' + form_mode + \'_item\').slideUp(\'normal\');

                            $form.find(\'input[type=text]\').val(\'\');
                        } else {
                            printMessage(\'error\', response.message);
                        }
                    } else {
                        printMessage(\'error\', lang[\'system_error\']);
                    }

                    $submit.val($submit.data(\'phrase\')).attr(\'disabled\', false);
                }, \'json\').fail(function(){
                    printMessage(\'error\', lang[\'system_error\']);
                    $submit.val($submit.data(\'phrase\')).attr(\'disabled\', false);
                });
            }

            return false;
        });
    });

    // Prepare edit
    $(function(){
        $form = $(\'form[name=edit-item-form]\');

        $(\'#grid\').on(\'click\', \'.actions-cell .edit\', function(){
            $form.find(\'input.error\').removeClass(\'error\');

            var data = {
                mode: \'mfPrepareItem\',
                key: $(this).data(\'key\')
            };
            $.post(rlConfig[\'ajax_url\'], data, function(response, status){
                $(\'#edit_item\').slideDown();

                if (status == \'success\') {
                    if (response.status == \'OK\') {
                        for (var code in response.data.names) {
                            $form.find(\'input[name=name_\' + code + \']\').val(response.data.names[code]);
                        }

                        if (geo_format) {
                            for (var item in response.data) {
                                if (item.indexOf(\'Path\') === 0) {
                                    var path = response.data[item];
                                    var field = item.toLowerCase();

                                    if (level > 0 && rlConfig[\'mf_geo_subdomains_type\'] !== \'unique\') {
                                        path = path.split(\'/\').slice(level).join(\'-\');
                                    }

                                    if (!rlConfig[\'mf_multilingual_path\']) {
                                        field += \'_\' + rlLang;
                                    }

                                    $form.find(\'input[name=\' + field + \']\').val(path);
                                }
                            }

                            $form.find(\'[name=lat]\').val(response.data.Latitude);
                            $form.find(\'[name=lng]\').val(response.data.Longitude);
                        }

                        $form.find(\'[name=key]\').val(response.data.Key);
                        $form.find(\'[name=status]\').val(response.data.Status);
                    } else {
                        printMessage(\'error\', response.message);
                    }
                } else {
                    printMessage(\'error\', lang[\'system_error\']);
                }
            }, \'json\').fail(function(){
                printMessage(\'error\', lang[\'system_error\']);
            });
        });
    });

    '; ?>

    </script>

    <!-- related fields list -->
    <div id="related_fields" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['mf_related_fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <table class="form">
        <tr>
            <td class="name" style="width:215px"><?php echo $this->_tpl_vars['lang']['mf_related_listing_fields']; ?>
</td>
            <td class="field">
                <?php $_from = $this->_tpl_vars['related_listing_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                    <div>
                        <?php echo $this->_tpl_vars['lang']['name']; ?>
: <b><?php echo $this->_tpl_vars['field']['name']; ?>
 / </b>
                        <?php echo $this->_tpl_vars['lang']['key']; ?>
: <b><?php echo $this->_tpl_vars['field']['Key']; ?>
 / </b>
                        <a href="index.php?controller=listing_fields&action=edit&field=<?php echo $this->_tpl_vars['field']['Key']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['edit'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</a>
                    </div>
                <?php endforeach; else: ?>
                    <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['mf_no_related_fields']; ?>
</span>
                <?php endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mf_related_account_fields']; ?>
</td>
            <td class="field">
                <?php $_from = $this->_tpl_vars['related_account_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                    <div>
                        <?php echo $this->_tpl_vars['lang']['name']; ?>
: <b><?php echo $this->_tpl_vars['field']['name']; ?>
 / </b>
                        <?php echo $this->_tpl_vars['lang']['key']; ?>
: <b><?php echo $this->_tpl_vars['field']['Key']; ?>
 / </b>
                        <a href="index.php?controller=account_fields&action=edit&field=<?php echo $this->_tpl_vars['field']['Key']; ?>
" target="_blank" style="margin-left:5px"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['edit'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)); ?>
</a>
                    </div>
                <?php endforeach; else: ?>
                    <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['mf_no_related_fields']; ?>
</span>
                <?php endif; unset($_from); ?>
            </td>
        </tr>
        </table>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- related fields list end -->

    <!-- multi formats grid -->
    <div id="grid"></div>
    <script type="text/javascript">
    lang['mass_action_completed'] = "<?php echo $this->_tpl_vars['lang']['mass_action_completed']; ?>
";
    lang['delete_confirm'] = "<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
";
    rlConfig.mf_parent_status = <?php if ($this->_tpl_vars['parent_info']['Status']): ?>'<?php echo $this->_tpl_vars['parent_info']['Status']; ?>
'<?php else: ?>false<?php endif; ?>;

    <?php if ($_GET['parent']): ?>
        var itemsGrid;
        var parent = '<?php echo $_GET['parent']; ?>
';

        <?php echo '
        $(document).ready(function(){
            '; ?>
<?php if (! $this->_tpl_vars['level']): ?><?php echo '
                Ext.grid.defaultColumn = function(config){
                    Ext.apply(this, config);
                    if (!this.id){
                        this.id = Ext.id();
                    }
                    this.renderer = this.renderer.createDelegate(this);
                };

                Ext.grid.defaultColumn.prototype = {
                    init : function(grid){
                        this.grid = grid;
                        this.grid.on(\'render\', function(){
                            var view = this.grid.getView();
                            view.mainBody.on(\'mousedown\', this.onMouseDown, this);
                        }, this);
                    },
                    onMouseDown : function(e, t){
                    if (t.className && t.className.indexOf(\'x-grid3-cc-\'+this.id) != -1) {
                        e.stopEvent();
                        var index = this.grid.getView().findRowIndex(t);
                        var record = this.grid.store.getAt(index);
                        record.set(this.dataIndex, !record.data[this.dataIndex]);
                            Ext.Ajax.request({
                                waitMsg: lang[\'ext_saving_changes\'],
                                url: rlPlugins + \'multiField/admin/multi_formats.inc.php?q=ext&parent=\'+parent,
                                method: \'GET\',
                                params: {
                                    action: \'update\',
                                    id: record.id,
                                    field: this.dataIndex,
                                    value: record.data[this.dataIndex]
                                },
                                failure: function() {
                                    Ext.MessageBox.alert(lang[\'ext_error_saving_changes\']);
                                },
                                success: function() {
                                    itemsGrid.store.commitChanges();
                                    itemsGrid.reload();
                                }
                            });
                        }
                    },
                    renderer : function(v, p, record){
                        p.css += \' x-grid3-check-col-td\';
                        return \'<div ext:qtip="\'+lang[\'ext_set_default\']+\'" class="x-grid3-check-col\'+(v?\'-on\':\'\')+\' x-grid3-cc-\'+this.id+\'">&#160;</div>\';
                    }
                };
                var defaultColumn = new Ext.grid.defaultColumn({
                    header: lang[\'ext_default\'],
                    dataIndex: \'Default\',
                    width: 60,
                    fixed: true
                });
            '; ?>
<?php endif; ?><?php echo '

            var mass_actions = [
                [lang[\'ext_activate\'], \'activate\'],
                [lang[\'ext_suspend\'], \'approve\'],
                [lang[\'ext_delete\'], \'delete\']
            ];

            itemsGrid = new gridObj({
                key: \'data_items\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'multiField/admin/multi_formats.inc.php?q=ext&parent=\'+parent,
                defaultSortField: \'name\',
                remoteSortable: true,
                checkbox: true,
                actions: mass_actions,
                title: lang[\'ext_multi_formats_manager\'],
                fields: [
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'name\', mapping: \'name\', type: \'string\'},
                    {name: \'Position\', mapping: \'Position\', type: \'int\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Key\', mapping: \'Key\'},
                    {name: \'Icons\', mapping: \'Icons\'},
                    {name: \'Parent_name\', mapping: \'Parent_name\', type: \'string\'},
                    '; ?>
<?php if ($this->_tpl_vars['geo_format_data'] && $this->_tpl_vars['geo_format_data']['Key'] == $this->_tpl_vars['head_level_data']['Key']): ?><?php echo '
                        {name: \'Path\', mapping: \'Path\', type: \'string\'},
                    '; ?>
<?php endif; ?><?php echo '
                    '; ?>
<?php if (! $this->_tpl_vars['level']): ?><?php echo '
                    {name: \'Default\', mapping: \'Default\'}
                    '; ?>
<?php endif; ?><?php echo '
                ],
                columns: [
                    {
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        width: 20,
                        id: \'rlExt_item_bold\'
                    },
                    '; ?>
<?php if ($this->_tpl_vars['level']): ?><?php echo '
                    {
                        header: \'Parent\',
                        dataIndex: \'Parent_name\',
                        width: 10
                    },
                    '; ?>
<?php endif; ?>
                    <?php if ($this->_tpl_vars['geo_format_data'] && $this->_tpl_vars['geo_format_data']['Key'] == $this->_tpl_vars['head_level_data']['Key']): ?><?php echo '
                    {
                        header: \'Path\',
                        dataIndex: \'Path\',
                        width: 10
                    },
                    '; ?>
<?php endif; ?>
                    <?php if ($this->_tpl_vars['order_type'] == 'position'): ?><?php echo '{
                        header: lang[\'ext_position\'],
                        dataIndex: \'Position\',
                        width: 70,
                        fixed: true,
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowDecimals: false
                        }),
                        renderer: function(val){
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },'; ?>
<?php endif; ?>
                    <?php if (! $this->_tpl_vars['level']): ?><?php echo '
                        defaultColumn,
                    '; ?>
<?php endif; ?><?php echo '
                    {
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 80,
                        fixed: true,
                        renderer: rlConfig.mf_parent_status === false || rlConfig.mf_parent_status === \'active\' ? null : function(value){
                            return \'<span ext:qtip="\' + lang.mf_inactive_parent_status_hint + \'">\' + value + \'</span>\';
                        },
                        editor: rlConfig.mf_parent_status === \'approval\' ? null : new Ext.form.ComboBox({
                            store: [
                                [\'active\', lang[\'ext_active\']],
                                [\'approval\', lang[\'ext_approval\']]
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
                        width: 75,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(val, obj, row){
                            var manage_href = rlUrlHome+"index.php?controller="+controller+"&parent="+val;

                            var out = "<div class=\'actions-cell\'>";
                            out += "<a href="+manage_href+" ><img class=\'manage\' ext:qtip=\'"+lang[\'ext_manage\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            out += "<img data-key=\'"+val+"\' class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' />";
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'ext_notice_delete_item\']+"\\", \\"xajax_deleteItem\\", \\""+val+"\\", \\"section_load\\" )\' />";
                            out += "</div>";

                            return out;
                        }
                    }
                ]
            });

            '; ?>
<?php if (! $this->_tpl_vars['level']): ?><?php echo '
                itemsGrid.plugins.push(defaultColumn);
            '; ?>
<?php endif; ?><?php echo '

            itemsGrid.init();
            grid.push(itemsGrid.grid);

            // actions listener
            itemsGrid.actionButton.addListener(\'click\', function() {
                var selected = itemsGrid.checkboxColumn.getSelections();
                var action = itemsGrid.actionsDropDown.getValue();

                if (!action) {
                    return false;
                }

                var ids = new Array();

                var doMassAction = function(){
                    $.each(selected, function(index, item){
                        ids.push(item.id);
                    });

                    ids = ids.join(\'|\');

                    var data = {
                        mode: \'mfBulkAction\',
                        ids: ids,
                        action: action
                    };
                    $.post(rlConfig[\'ajax_url\'], data, function(response, status){
                        if (response.status == \'OK\') {
                            itemsGrid.checkboxColumn.clearSelections();
                            itemsGrid.actionsDropDown.setVisible(false);
                            itemsGrid.actionButton.setVisible(false);

                            printMessage(\'notice\', lang[\'mass_action_completed\']);
                            itemsGrid.reload();
                        } else {
                            printMessage(\'error\', response.message);
                        }
                    }, \'json\').fail(function(object, status) {
                        if (status == \'abort\') {
                            return;
                        }

                        printMessage(\'error\', lang[\'system_error\']);
                    });
                }

                if (action == \'delete\') {
                    Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_delete\'], function(btn) {
                        if (btn == \'yes\') {
                            doMassAction();
                        }
                    });
                } else {
                    doMassAction();
                }
            });
        });
        '; ?>

    <?php else: ?>
        <?php echo '

        var multiFieldGrid;

        $(document).ready(function(){

            multiFieldGrid = new gridObj({
                key: \'multi_formats\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'multiField/admin/multi_formats.inc.php?q=ext\',
                defaultSortField: \'name\',
                title: lang[\'ext_multi_formats_manager\'],
                fields: [
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'name\', mapping: \'name\', type: \'string\'},
                    {name: \'Position\', mapping: \'Position\', type: \'int\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Key\', mapping: \'Key\'}
                ],
                columns: [{
                        header: lang[\'ext_name\'],
                        dataIndex: \'name\',
                        id: \'rlExt_item_bold\',
                        width: 40
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 100,
                        fixed: true,
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
                            selectOnFocus:true
                        })
                    },{
                        header: lang[\'ext_actions\'],
                        width: 75,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(val, obj, row){
                            var out = "<div>";
                            var splitter = false;
                            var format_key = row.data.Key;

                            var manage_href = rlUrlHome+"index.php?controller="+controller+"&amp;parent="+val;
                            out += "<a href="+manage_href+" ><img class=\'manage\' ext:qtip=\'"+lang[\'ext_manage\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            out += "<a href="+rlUrlHome+"index.php?controller="+controller+"&action=edit&amp;item="+format_key+"><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlConfirm( \\""+lang[\'delete_confirm\']+"\\", \\"xajax_deleteFormat\\", \\""+format_key+"\\", \\"section_load\\" )\' />";
                            out += "</div>";

                            return out;
                        }
                    }
                ]
            });

            multiFieldGrid.init();
            grid.push(multiFieldGrid.grid);

        });
        '; ?>

    <?php endif; ?>

    <?php if ($_GET['parent']): ?>
    <?php echo '
        function handleSourceActs()
        {
            $(\'#import_button\').click(function(){
                $(this).val(\''; ?>
<?php echo $this->_tpl_vars['lang']['loading']; ?>
<?php echo '\');

                var values = \'\';
                $(\'div.td_div input:checked\').each(function(){
                    values += $(this).val()+",";
                });
                xajax_importSource( values, $(\'input[name=table]\').val(), $(\'input#ignore_one:checked\').val() );
            });

            $(\'div.td_div input\').click(function(){
                if( $(\'div.td_div input:checked\').length  == 1 )
                {
                    $(\'#checked_one_hint\').fadeIn();
                }else
                {
                    $(\'#checked_one_hint\').fadeOut();
                }
            });
        }
        $(document).ready(function(){
            $.ajaxSetup({ cache: false });
        });
    '; ?>

    <?php endif; ?>
    </script>
<?php endif; ?>

<script type="text/javascript">
<?php echo '
    $(\'#load_button\').click(function(){
        if ($(\'#load_cont\').css(\'display\') == \'none\') {
            xajax_listSources(\'{$smarty.get.parent}\');
        }
        show(\'load_cont\');
        $(\'#search,#add_item,#edit_item,#related_fields\').slideUp(\'fast\');
    });
'; ?>

</script>

<script type="text/javascript" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
multiField/static/lib_admin.js"></script>