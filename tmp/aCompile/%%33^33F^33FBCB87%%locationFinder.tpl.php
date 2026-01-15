<?php /* Smarty version 2.6.31, created on 2025-08-20 18:11:22
         compiled from /home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/locationFinder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/locationFinder.tpl', 5, false),array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/locationFinder.tpl', 66, false),array('modifier', 'regex_replace', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/locationFinder.tpl', 447, false),array('function', 'mapsAPI', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/locationFinder.tpl', 197, false),)), $this); ?>
<!-- location finder admin contoller -->

<?php if ($this->_tpl_vars['db_update']): ?>
    <?php if ($this->_tpl_vars['update_error']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="lf-instruction">
            <p class="notice"><span class="red">IMPORTANT:</span> We recommend making a back-up of the database so you could easily restore it in case of an import failure.</p>
            <p>To enjoy new capabilities of the geo mapping you should populate your database with new locations using the <b>"Multifield/Location Filter"</b> plugin; to do so please follow the instruction:</p>

            <?php $this->assign('df_phrase_key', 'admin_controllers+name+data_formats'); ?>
            <ul class="list">
                <li>Go to <a target="_blank" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=data_formats"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['df_phrase_key']]; ?>
</a> and remove the <b>"Countries"</b> data entry if you have it (Trash Box should be disabled);</li>
                <li>Go to <a target="_blank" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=multi_formats">Multi-field Plugin</a> manager and click the <b>"Add an Entry"</b> button at the right top corner;</li>
                <li>Enter the following details in the form:<br />
                - Create as: <b>New data entry</b><br />
                - Key: <b>countries</b><br />
                - Name: <b>Country</b><br />
                - Sorting order: <b>Alphabetic</b><br />
                - Geo Filtering: <b>enable or disable</b><br /> - it's up to you, enable it if you need to filter website listings by visitor location
                - Status: <b>Active</b><br /><br />
                Click the <b>"Add"</b> button;
                </li>
                <li>Find the <b>"Country"</b> data entry and click the <b>"Hammer"</b> icon to manage it;</li>
                <li>Then click the <b>"Import Data"</b> button at the right top corner;</li>
                <li>Find the <b>"World Locations - v6"</b> in a window and click the <b>"Import the entire database"</b> or <b>"Select items to be imported"</b> button;</li>
                <li><a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&action=update">Reload the page</a> once importing in the previous step is completed;</li>
            </ul>

            Click <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&action=update&fix">here</a> if you are sure your current location database is OK and you are ready to import the "geo mapping database".</b>.
        </div>

        <script>
        <?php echo '

        $(document).ready(function(){
            printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['locationFinder_incompatible_database_error']; ?>
<?php echo '\');
        });

        '; ?>

        </script>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <div class="lf-upload-interface">
            <p>
                <?php if (! $this->_tpl_vars['config']['locationFinder_db_version']): ?>
                    <?php echo $this->_tpl_vars['lang']['locationFinder_remote_install_text']; ?>

                <?php else: ?>
                    <?php echo $this->_tpl_vars['lang']['locationFinder_remote_update_text']; ?>

                <?php endif; ?>
            </p>

            <p style="padding: 10px 0 10px;">
                <span class="red"><b><?php echo $this->_tpl_vars['lang']['notice']; ?>
:</b></span> <?php echo $this->_tpl_vars['lang']['locationFinder_remote_update_notice']; ?>

            </p>

            <?php $this->assign('replace_var', ('{')."percent".('}')); ?>

            <div><input id="install_database" <?php if ($this->_tpl_vars['config']['locationFinder_db_version']): ?>accesskey="update"<?php endif; ?> type="button" value="<?php if (! $this->_tpl_vars['config']['locationFinder_db_version']): ?><?php echo $this->_tpl_vars['lang']['install']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['update']; ?>
<?php endif; ?>" /></div>
            <div class="loading-interface">
                <div class="progress"><?php echo $this->_tpl_vars['lang']['locationFinder_preparing']; ?>
</div>
                <div class="progress-bar"><div></div></div>
                <div class="progress-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['locationFinder_remote_update_status'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_var'], '<span>0</span>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_var'], '<span>0</span>')); ?>
</div>
                <ul class="progress-error-message red"></ul>
            </div>
        </div>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <script>
        lang['update'] = '<?php echo $this->_tpl_vars['lang']['update']; ?>
';

        <?php echo '

        $(document).ready(function(){
            var loading_interface = $(\'.lf-upload-interface .loading-interface\');
            var progress_bar = loading_interface.find(\'.progress-bar > div\');
            var error_area = loading_interface.find(\'.progress-error-message\');
            var progress_dump = loading_interface.find(\'.progress\');
            var progress_info = loading_interface.find(\'.progress-info > span\');
            var current_file = 1;
            var total_files = 0;
            var in_progress = false;

            $.ajaxSetup({cache: false});

            var locationFinderUploadFile = function(){
                $.post(rlConfig[\'ajax_url\'], {item: \'locationFinderUploadFile\', file: current_file}, function(response){
                    if (response.status == \'OK\') {
                        progress_dump.text(lang[\'locationFinder_file_upload_info\'].replace(\'{files}\', total_files).replace(\'{file}\', current_file));
                        locationFinderImport();
                    } else {
                        locationFinderError(response.data);
                    }
                }, \'json\');
            }

            var locationFinderImport = function(){
                $.post(rlConfig[\'ajax_url\'], {item: \'locationFinderImport\'}, function(response){
                    if (response[\'error\']) {
                        locationFinderError(Array(response[\'error\']));
                    } else if (response[\'action\'] == \'next_stack\') {
                        locationFinderImport();

                        response[\'progress\'] = response[\'progress\'] > 100 ? 100 : response[\'progress\'];
                        progress_bar.width(response[\'progress\']+\'%\');
                        progress_info.text(response[\'progress\']);
                    } else if (response[\'action\'] == \'next_file\') {
                        current_file++;
                        progress_dump.text(lang[\'locationFinder_file_download_info\'].replace(\'{files}\', total_files).replace(\'{file}\', current_file));

                        locationFinderUploadFile();
                    } else if (response[\'action\'] == \'end\') {
                        progress_bar.width(\'100%\');
                        progress_info.text(100);

                        in_progress = false;
                        printMessage(\'notice\', lang[\'locationFinder_import_completed\']);
                        progress_dump.text(lang[\'locationFinder_import_completed\']);
                    }
                }, \'json\')
            }

            var locationFinderError = function(data){
                for (var i in data) {
                    if (typeof data[i] != \'string\')
                        continue;

                    error_area.append($(\'<li>\').text(data[i]));
                }
                error_area.fadeIn();
                progress_bar.css(\'width\', \'0\');
            }

            $(\'#install_database\').click(function(){
                // update mode
                if ($(this).attr(\'accesskey\') == \'update\') {
                    $(this).val(lang[\'loading\']);
                    var self = this;

                    $.post(rlConfig[\'ajax_url\'], {item: \'locationFinderCheckUpdate\'}, function(response){
                        if (response.data.update_status == \'NO\') {
                            $(self).val(lang[\'update\']);
                            printMessage(\'notice\', lang[\'locationFinder_db_uptodate\']);
                        } else {
                            $(self).removeAttr(\'accesskey\');
                            $(self).trigger(\'click\');
                        }
                    }, \'json\');
                }
                // import mode
                else {
                    $(this).parent().fadeOut(function(){
                        loading_interface.fadeIn(function(){
                            $.post(rlConfig[\'ajax_url\'], {item: \'locationFinderPrepare\'}, function(response){
                                if (response.status == \'OK\') {
                                    in_progress = true;

                                    total_files = response.data.calc;
                                    progress_dump.text(lang[\'locationFinder_file_download_info\'].replace(\'{files}\', total_files).replace(\'{file}\', current_file));
                                    locationFinderUploadFile();
                                } else {
                                    locationFinderError(response.data);
                                }
                            }, \'json\');
                        });
                    });
                }
            });

            $(window).bind(\'beforeunload\', function() {
                if (in_progress) {
                    return \'Uploading the data is in process; closing the page will stop the process.\';
                }
            });
        });

        '; ?>

        </script>
    <?php endif; ?>
<?php else: ?>
    <?php if ($this->_tpl_vars['is_mapping_available']): ?>
    <!-- navigation bar -->
    <div id="nav_bar">
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&action=update" class="button_bar"><span class="left"></span><span class="center_import"><?php echo $this->_tpl_vars['lang']['locationFinder_update_database']; ?>
</span><span class="right"></span></a>
    </div>
    <!-- navigation bar end -->
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if ($this->_tpl_vars['is_mapping_available']): ?>
        <?php if ($this->_tpl_vars['fields']): ?>
            <?php echo $this->_plugins['function']['mapsAPI'][0][0]->adminMapsAPI(array(), $this);?>


            <script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
maps/geocoder.js"></script>

            <div class="lc-interface clearfix">
                <div>
                    <?php if ($this->_tpl_vars['plugins']['multiField']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplHeader.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplHeader.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>

                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                    <?php if ($this->_tpl_vars['plugins']['multiField']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'multiField/admin/tplFooter.tpl') : smarty_modifier_cat($_tmp, 'multiField/admin/tplFooter.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endif; ?>

                    <table class="form">
                    <tr>
                        <td style="width: 185px;"></td>
                        <td><input id="edit_button" type="button" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" /></td>
                    </tr>
                    </table>
                </div>
                <div>
                    <input id="pac-input" class="hide" type="text" placeholder="<?php echo $this->_tpl_vars['lang']['locationFinder_address_hint']; ?>
">
                    <div id="map"><span class="hint"><?php echo $this->_tpl_vars['lang']['locationFinder_default_map_hint']; ?>
</span></div>
                    <div class="hide" id="save_button"><input type="button" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" /></div>
                </div>
            </div>

            <script>
            var lfMap       = false;
            var save_button = $('#save_button');
            var pac_input   = $('#pac-input');
            var lfConfig    = new Array();

            lfConfig['locationFinder_default_location'] = "<?php echo $this->_tpl_vars['config']['locationFinder_default_location']; ?>
";
            lfConfig['phrase_not_found'] = "<?php echo $this->_tpl_vars['lang']['location_not_found']; ?>
";
            lfConfig['zoom']             = <?php if ($this->_tpl_vars['config']['locationFinder_map_zoom']): ?><?php echo $this->_tpl_vars['config']['locationFinder_map_zoom']; ?>
<?php else: ?>12<?php endif; ?>;
            lfConfig['mapping_state']    = "<?php echo $this->_tpl_vars['config']['locationFinder_mapping_state']; ?>
";
            lfConfig['place_id_sync']    = <?php echo $this->_tpl_vars['config']['locationFinder_mapping']; ?>
;

            lang['edit'] = '<?php echo $this->_tpl_vars['lang']['edit']; ?>
';
            lang['locationFinder_no_geocoder_location'] = "<?php echo $this->_tpl_vars['lang']['locationFinder_no_geocoder_location']; ?>
";

            <?php echo '

            $(document).ready(function(){
                if (!lfConfig[\'place_id_sync\']) {
                    printMessage(\'alert\', lang[\'locationFinder_place_id_sync_disabled\']);
                }

                var lfLoading = function(obj, enable){
                    if (enable) {
                        $(obj).val(lang[\'loading\']).attr(\'disabled\', true).addClass(\'disabled\');
                    } else {
                        $(obj).val(lang[\'edit\']).attr(\'disabled\', false).removeClass(\'disabled\');
                    }
                }

                var showSaveButton = function(mode){
                    if ($(\'.lc-interface select\').val() !== \'0\') {
                        save_button.slideDown();
                    }
                }

                var lfBuildMap = function(address){
                    if (lfMap) {
                        var pos = address[0].split(\',\');

                        lfMap.markers[0].setLatLng(new L.LatLng(pos[0], pos[1]))
                        lfMap.map.panTo(pos);

                        // show button for empty mapping
                        if (address[2] == \'geocoder\') {
                            showSaveButton();
                        }
                    } else {
                        flMap.init($(\'#map\'), {
                            zoom: lfConfig[\'zoom\'],
                            center: address[0],
                            geocoder: {
                                placeholder: lang[\'locationFinder_address_hint\'],
                                onSelect: function(address, lat, lng){
                                    lfMap.markers[0].setLatLng(new L.LatLng(lat, lng));
                                    showSaveButton();
                                }
                            },
                            addresses: [{
                                latLng: address[0]
                            }],
                            idle: function(map){
                                lfMap = this;

                                map.doubleClickZoom.disable();

                                this.markers[0].dragging.enable();

                                // show button for empty mapping
                                if (address[2] == \'geocoder\') {
                                    showSaveButton();
                                }

                                this.markers[0].on(\'dragend\', function(){
                                    showSaveButton();
                                });
                            }
                        });
                    }
                }

                // edit button handler
                $(\'#edit_button\').click(function(){
                    var button = this;
                    var last_select = false;
                    var address = new Array();

                    $(\'.lc-interface select\').each(function(){
                        if ($(this).val() != \'0\') {
                            last_select = $(this);
                            address.push($(this).find(\'> option:selected\').text());
                        }
                    });

                    if (last_select.length) {
                        // enable loading
                        lfLoading(this, true);

                        // get current location data if so
                        $.post(rlConfig[\'ajax_url\'], {item: \'locationFinderGetMapping\', key: last_select.val()}, function(response){
                            if (response.status == \'OK\' && response.results.Lat) {
                                address = [response.results.Lat + \',\' + response.results.Lng, address.join(\', \'), \'direct\'];
                                lfBuildMap(address);

                                // disable loading
                                lfLoading(button, false);
                            } else {
                                geocoder(address.join(\',\'), function(response, status){
                                    if (status == \'success\' && response.status == \'OK\') {
                                        address = [response.results[0].lat + \',\' + response.results[0].lng, address.join(\', \'), \'geocoder\'];
                                        lfBuildMap(address);
                                    } else {
                                        printMessage(\'error\', lang[\'locationFinder_no_geocoder_location\'].replace(\'{location}\', address.join(\', \')));
                                        $(\'.leaflet-autocomplete.leaflet-control\').focus();
                                        lfBuildMap([lfConfig[\'locationFinder_default_location\'], \'\', \'direct\']);
                                    }

                                    // disable loading
                                    lfLoading(button, false);
                                });
                            }
                        }, \'json\').fail(function(object, status) {
                            // disable loading
                            lfLoading(button, false);

                            if (status == \'abort\') {
                                return;
                            }

                            printMessage(\'error\', lang[\'system_error\']);
                            console.log(\'locationFinder: AP | get mapping ajax request failed\');
                        });
                    } else {
                        printMessage(\'error\', lang[\'locationFinder_js_location_not_selected_error\']);
                    }
                });

                // save button handler
                save_button.click(function(){
                    var self = this;
                    var last_select = false;
                    var lat = lfMap.markers[0].getLatLng().lat;
                    var lng = lfMap.markers[0].getLatLng().lng;

                    $(\'.lc-interface select\').each(function(){
                        if ($(this).val() != \'0\') {
                            last_select = $(this);
                        }
                    });

                    if (!last_select) {
                        return;
                    }

                    lfLoading($(this).find(\'input\'), true);

                    var data = {
                        latlng: lat + \',\' + lng
                    };

                    geocoder(data, function(response, status){
                        if (status == \'success\' && response.status == \'OK\') {
                            var address = response.results;
                            var place_id_city = null;
                            var place_id_neighborhood = null;

                            response.results.forEach(function(item){
                                switch(item.type) {
                                    case \'city\':
                                        place_id_city = item.place_id;
                                        break;

                                    case \'suburb\':
                                        place_id_neighborhood = item.place_id;
                                        break;
                                }
                            });

                            var data = {
                                item: \'locationFinderSaveMapping\',
                                formatKey: last_select.val(),
                                cityPlaceID: place_id_city,
                                target: last_select.attr(\'name\').indexOf(lfConfig[\'mapping_state\']) >= 0 ? \'region\' : \'city\',
                                neighborhoodPlaceID: place_id_neighborhood,
                                lat: lat,
                                lng: lng
                            };

                            // save location mapping
                            $.post(rlConfig[\'ajax_url\'], data, function(response){
                                if (response.status == \'OK\') {
                                    printMessage(\'notice\', lang[\'locationFinder_mapping_saved\']);
                                    $(save_button).slideUp();
                                }
                            }, \'json\').fail(function(object, status) {
                                if (status == \'abort\')
                                    return;

                                printMessage(\'error\', lang[\'system_error\']);
                                console.log(\'locationFinder: AP | save mapping ajax request failed\');
                            });

                            $(self).slideUp();
                            lfLoading($(self).find(\'input\'), false);
                        } else {
                            printMessage(\'error\', lang[\'system_error\']);
                        }
                    });
                });

                // location dropdowns handler
                $(\'.lc-interface select\').change(function(){
                    $(save_button).slideUp();
                });
            });

            '; ?>

            </script>
        <?php else: ?>
            <?php $this->assign('link', ((is_array($_tmp=((is_array($_tmp='<a href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['href']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['href'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['locationFinder_mapping_no_fields_mapping'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.+)\]/', $this->_tpl_vars['link']) : smarty_modifier_regex_replace($_tmp, '/\[(.+)\]/', $this->_tpl_vars['link'])); ?>

        <?php endif; ?>
    <?php else: ?>
        <?php echo $this->_tpl_vars['mapping_error']; ?>

    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<!-- location finder admin contoller end -->