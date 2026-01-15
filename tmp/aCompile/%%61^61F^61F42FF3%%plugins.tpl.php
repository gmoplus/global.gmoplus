<?php /* Smarty version 2.6.31, created on 2025-07-28 09:41:07
         compiled from controllers/plugins.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'controllers/plugins.tpl', 23, false),array('modifier', 'replace', 'controllers/plugins.tpl', 65, false),array('function', 'phrase', 'controllers/plugins.tpl', 83, false),array('function', 'rlHook', 'controllers/plugins.tpl', 336, false),)), $this); ?>
<!-- plugins tpl -->

<script type="text/javascript" src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/plugin.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <a href="javascript:rlSearchPlugins()" class="button_bar"><?php echo '<span class="left"></span><span class="center_search" id="search_plugins">'; ?><?php echo $this->_tpl_vars['lang']['search_installed']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>

    <a href="javascript:rlBrowsePlugins()" class="button_bar"><?php echo '<span class="left"></span><span class="center_list" id="browse_plugins">'; ?><?php echo $this->_tpl_vars['lang']['more_plugins']; ?><?php echo '</span><span class="right"></span>'; ?>
</a>
</div>
<!-- navigation bar end -->

<div id="action_blocks">
    <div id="browse_area" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['available_plugins'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div id="browse_content"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div id="search_area" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <table class="form">
            <tr>
                <td class="name w130"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                <td class="field">
                    <input class="filters" type="text" id="sp_name" maxlength="60" />
                </td>
            </tr>
            <tr>
                <td class="name w130"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select class="filters w200" id="sp_status">
                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <option value="active"><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval"><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                        <option value="not_installed"><?php echo $this->_tpl_vars['lang']['plugin_not_installed']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field nowrap">
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" id="search_button" />
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_search_button" />
                    <a class="cancel" href="javascript:rlSearchPlugins()"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>
            </table>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div id="update_area" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div id="update_info">
            <?php $this->assign('replace_ver', ('{')."version".('}')); ?>
            <?php $this->assign('replace_name', ('{')."name".('}')); ?>
            <div><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['plugin_update_request_hint'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_ver'], '<b><span id="update_version"></span></b>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_ver'], '<b><span id="update_version"></span></b>')))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_name'], '<span id="update_link"></span>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_name'], '<span id="update_link"></span>')); ?>
</div>
            <input id="start_update" type="button" value="<?php echo $this->_tpl_vars['lang']['update']; ?>
" />
            <a onclick="$('#update_area').slideUp();" class="cancel" href="javascript:void(0);"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
        </div>
        <div id="update_progress" class="hide">
            <div class="dark_12"><b id="plugin_name"></b> <?php echo $this->_tpl_vars['lang']['plugin_is_updating']; ?>
</div>
            <div class="progress static" style="padding: 5px 0 0;"><?php echo $this->_tpl_vars['lang']['remote_progress_backingup']; ?>
</div>
        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>

<script type="text/javascript">
var update_plugin_key;
var plugins_loaded = false;
var plugin_filters = [];
var license_domain = '<?php echo $this->_tpl_vars['license_domain']; ?>
';
var license_number = '<?php echo $this->_tpl_vars['license_number']; ?>
';
lang['plugin_not_compatible_notice'] = "<?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'plugin_not_compatible_notice','db_check' => true), $this);?>
";
<?php echo '

$(document).ready(function(){
    $(\'#start_update\').click(function() {
        rlConfirm(lang[\'remote_plugin_update_notice\'], \'startUpdate\');
    });

    $(\'#search_button\').click(function() {
        rlSearchFetchPlugins();
    });

    $(\'#sp_name\').keypress(function(e) {
        if (e.which == 13) rlSearchFetchPlugins();
    });

    $(\'#reset_search_button\').click(function() {
        $("#sp_status option[value=\'\']").attr(\'selected\', true);
        $("#sp_name").val(\'\');

        pluginsGrid.filters = [];
        pluginsGrid.reset();
    });
});

var rlSearchFetchPlugins = function() {
    var plugin_name = $.trim($(\'#sp_name\').val());
    var plugin_status = $(\'#sp_status\').val();
    plugin_filters = [];

    if (plugin_name.length) {
        plugin_filters.push([\'plugin\', encodeURI(plugin_name)])
    }

    if (plugin_status.length) {
        plugin_filters.push([\'status\', plugin_status])
    }

    // reload grid
    pluginsGrid.filters = plugin_filters;
    pluginsGrid.reload();
}

var rlBrowsePlugins = function() {
    if (plugins_loaded) {
        $(\'#browse_area\').slideToggle();
        $(\'#update_area, #search_area\').slideUp(\'fast\');
    }
    else {
        xajax_browsePlugins();
        $(\'.button_bar > #browse_plugins\').html(lang[\'loading\']);
    }
}

var rlSearchPlugins = function() {
    $(\'#search_area\').slideToggle();
    $(\'#update_area, #browse_area\').slideUp(\'fast\');
}

var rlPluginRemoteInstall = function(){
    // install links handler
    $(\'a.remote_install\').click(function(){
        if (!plugin.actionsLocked) {
            plugin_obj = this;
            rlConfirm(lang[\'remote_plugin_install_notice\'], \'startInstallation\');
        }
    });

    // buy button handler
    $(\'a.buy_icon\').click(function(){
        startBuying($(this), $(this).text());
    });
};

var buyingInterval;
var startBuying = function(button, caption){
    var key = button.attr(\'name\');

    button.flModal({
        click: false,
        width: 515,
        height: 532,
        caption: caption,
        onClose: function(){
            setTimeout(function(){
                clearInterval(buyingInterval);
                clearTimeout(buyingInterval);
            }, 10000);
        },
        content: \'<iframe name="buy-plugin" src="https://www.flynax.com/buy-plugin.html?key=\'+key+\'&domain='; ?>
<?php echo $this->_tpl_vars['license_domain']; ?>
&license=<?php echo $this->_tpl_vars['license_number']; ?>
<?php echo '" frameborder="0" scrolling="auto" width="100%" height="100%"></iframe>\'
    });

    $(\'iframe[name=buy-plugin]\').on(\'load\', function(e){
        setTimeout(function(){
            buyingInterval = setInterval(\'updatePluginStatus("\'+key+\'")\', 10000);
        }, 10000);
    });
}

var updatePluginStatus = function(key){
    // track paid plugins
    var data = {
        item: \'updatePluginStatus\',
        key: key,
        domain: license_domain,
        license: license_number
    };
    $.getJSON(rlUrlHome+\'request.ajax.php\', data, function(status){
        // stop checking
        if ( status.status == \'paid\' || status.status == \'fail\' ) {
            clearInterval(buyingInterval);
        }

        // start plugin installation
        if ( status.status == \'paid\' ) {
            $(\'div.modal-window > div:first > span:last\').click();
            plugin_obj = $(\'ul.browse_plugins a.buy_icon[name=\'+key+\']\');
            startInstallation();
        }
    });
}

var startInstallation = function(){
    if (plugin.actionsLocked || plugin.clickLocked) {
        return;
    }

    plugin.clickLocked = true;

    hideNotices();

    var key = $(plugin_obj).attr(\'name\');
    var area = $(plugin_obj).closest(\'div.changelog_item\');
    var name = $(area).find(\'a:first\').html();
    var id = $(area).attr(\'id\');
    var height = $(area).height()-16-2;
    height = height < 55 ? \'auto\' : height;
    var width = $(area).width();

    /* set fixed height for main container */
    $(area).parent().height($(area).height());

    /* prepare HTML DOM */
    var html = \' \\
    <div style="margin: 0 10px 16px 0;height: \'+ height +\'px;width: \'+ width +\'px;position: absolute;padding: 0;" class="hide grey_area" id="\'+ id +\'_tmp"> \\
        <div style="padding: 8px 10px 10px;"> \\
            <div class="dark_13"><b>\'+ name +\'</b> \'+ lang[\'plugin_is_installing\'] +\'</div> \\
            <div class="progress static" style="padding: 5px 0 0;"></div> \\
        </div> \\
    </div>\';

    /* show progress bar */
    $(area).after(html);
    $(area).css({width: $(area).width(), position: \'absolute\'}).fadeOut();
    $(area).next().fadeIn(\'normal\', function(){
        $(area).css(\'position\', \'relative\');
        $(this).css({position: \'relative\', width: \'auto\'});
        $(this).find(\'.progress\').html(lang[\'remote_progress_connect\']);
        plugin.remoteInstall(key);

        plugin.clickLocked = false;
    });
};

var startUpdate = function(){
    $(\'#update_info\').fadeOut(function(){
        $(\'#update_progress\').fadeIn();
        plugin.remoteUpdate(update_plugin_key);
    });
};

'; ?>

</script>

<!-- plugins grid -->
<div id="grid"></div>
<script type="text/javascript">
var pluginsGrid;

<?php echo '
$(function(){
    pluginsGrid = new gridObj({
        key: \'plugins\',
        id: \'grid\',
        filters: plugin_filters,
        ajaxUrl: rlUrlHome + \'controllers/plugins.inc.php?q=ext\',
        defaultSortField: \'Name\',
        title: lang[\'ext_plugins_manager\'],
        fields: [
            {name: \'ID\', mapping: \'ID\'},
            {name: \'Name\', mapping: \'Name\', type: \'string\'},
            {name: \'Key\', mapping: \'Key\'},
            {name: \'Description\', mapping: \'Description\', type: \'string\'},
            {name: \'Version\', mapping: \'Version\'},
            {name: \'Status\', mapping: \'Status\'},
            {name: \'Compatible\', mapping: \'Compatible\'}
        ],
        columns: [
            {
                header: lang[\'ext_name\'],
                dataIndex: \'Name\',
                width: 30,
                id: \'rlExt_item_bold\'
            },{
                header: lang[\'ext_description\'],
                dataIndex: \'Description\',
                width: 60
            },{
                header: lang[\'ext_version\'],
                dataIndex: \'Version\',
                width: 12
            },{
                header: lang[\'ext_status\'],
                dataIndex: \'Status\',
                width: 12,
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
                width: 90,
                fixed: true,
                dataIndex: \'Key\',
                sortable: false,
                renderer: function(value, obj, row) {
                    var complete = value.split(\'|\');
                    var out = "<center>";

                    if (complete[1] == \'not_installed\') {
                        if (row.data.Compatible && row.data.Compatible == true) {
                            out += "<img class=\'install\' title=\'"+lang[\'ext_install\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'plugin.install(\\""+complete[0]+"\\");$(this).animate({opacity: 0.5}, \\"slow\\").attr(\\"onclick\\", \\"\\");\' />";
                        }
                    } else {
                        out += "<img class=\'update\' title=\'"+lang[\'ext_check_for_update\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'xajax_checkForUpdate(\\""+complete[0]+"\\");\' />";
                        out += "<img class=\'uninstall\' title=\'"+lang[\'ext_uninstall\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_plugin_uninstall\']+"\\", \\"xajax_unInstall\\", \\""+Array(value)+"\\" )\' />";
                    }
                    out += "</center>";

                    return out;
                }
            }
        ]
    });

    '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPluginsGrid'), $this);?>
<?php echo '

    pluginsGrid.init();
    grid.push(pluginsGrid.grid);

    pluginsGrid.grid.addListener(\'beforeedit\', function(editEvent) {
        if (editEvent.value == \'not_installed\' || editEvent.value == lang[\'plugin_not_compatible\']) {
            editEvent.cancel = true;
            pluginsGrid.store.rejectChanges();
            Ext.MessageBox.alert(
                lang[\'ext_notice\'],
                editEvent.value == \'not_installed\'
                ? lang[\'ext_need_install\']
                : lang[\'plugin_not_compatible_notice\']
            );
        }
    });

});
'; ?>

</script>
<!-- plugins grid end -->

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPluginsBottom'), $this);?>


<!-- plugins tpl end -->