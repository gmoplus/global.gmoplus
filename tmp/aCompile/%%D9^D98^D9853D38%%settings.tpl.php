<?php /* Smarty version 2.6.31, created on 2025-08-25 21:31:14
         compiled from controllers/settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'controllers/settings.tpl', 36, false),array('modifier', 'escape', 'controllers/settings.tpl', 53, false),array('modifier', 'count', 'controllers/settings.tpl', 335, false),array('function', 'geoAutocompleteAPI', 'controllers/settings.tpl', 153, false),)), $this); ?>
<!-- settings tpl -->

<form method="post" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $this->_tpl_vars['cInfo']['Controller']; ?>
" onsubmit="return submitHandler();">
    <input name="group_id" value="<?php echo $_GET['group']; ?>
" type="hidden" />
    <table class="sTable" id="settings_anchor">
    <tr>
        <td style="width: 108px; border-right: 1px #667835 solid;" align="right" valign="top">
            <?php $_from = $this->_tpl_vars['configGroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fGroups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fGroups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['fGroups']['iteration']++;
?>
                <?php if (empty ( $this->_tpl_vars['group']['Plugin_status'] ) || $this->_tpl_vars['group']['Plugin_status'] == 'active'): ?>
                    <div id="ltab_<?php echo $this->_tpl_vars['group']['ID']; ?>
" title="<?php echo $this->_tpl_vars['group']['name']; ?>
" class="ltab <?php if (($this->_foreach['fGroups']['iteration'] <= 1)): ?>tabs_active<?php else: ?>tabs_inactive<?php endif; ?>" <?php if (($this->_foreach['fGroups']['iteration'] <= 1)): ?>style="margin: 0;"<?php endif; ?> onclick="location.href='<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $this->_tpl_vars['cInfo']['Controller']; ?>
&group=<?php echo $this->_tpl_vars['group']['ID']; ?>
'"><div><?php echo $this->_tpl_vars['group']['name']; ?>
</div></div>
                    <?php if ($_GET['group'] == $this->_tpl_vars['group']['ID'] || ($this->_foreach['fGroups']['iteration'] <= 1)): ?>
                        <script type="text/javascript">
                        var sKey = '<?php echo $this->_tpl_vars['group']['ID']; ?>
';
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            
            <!-- Fallback: sKey tanımlı değilse ilk görünen sekmeden belirle -->
            <script type="text/javascript">
            if (typeof sKey === 'undefined')                 }
            }
            </script>
        </td>
        <td valign="top" style="width: 1px; border-right: 1px #667835 solid;"></td>
        <td valign="top">
            <?php $_from = $this->_tpl_vars['configGroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fGroups'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fGroups']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group']):
        $this->_foreach['fGroups']['iteration']++;
?>
                <div id="larea_<?php echo $this->_tpl_vars['group']['ID']; ?>
" class="larea<?php if ($_GET['group'] == $this->_tpl_vars['group']['ID'] || ($this->_foreach['fGroups']['iteration'] <= 1)): ?> <?php else: ?> hide<?php endif; ?>">
                    <?php $this->assign('replace_group', ('{')."group".('}')); ?>

                    <div class="ltab_block_header clear"><div><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['configs_caption'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_group'], $this->_tpl_vars['group']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_group'], $this->_tpl_vars['group']['name'])); ?>
</div></div>
                    <?php $this->assign('store', $this->_tpl_vars['group']['ID']); ?>
                    <?php if (! empty ( $this->_tpl_vars['configs'][$this->_tpl_vars['store']] )): ?>
                        <div style="padding: <?php if ($this->_tpl_vars['configs'][$this->_tpl_vars['store']]['0']['Type'] != 'divider'): ?>10px<?php else: ?>0<?php endif; ?> 10px 0;">
                            <input type="hidden" name="a_config" value="update"/>
                            <table class="form">
                            <?php $_from = $this->_tpl_vars['configs'][$this->_tpl_vars['store']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['configF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['configF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['configItem']):
        $this->_foreach['configF']['iteration']++;
?>
                            <tr class="<?php if ($this->_foreach['configF']['iteration']%2 != 0 && $this->_tpl_vars['configItem']['Type'] != 'divider'): ?>highlight<?php endif; ?><?php if ($this->_tpl_vars['configItem']['Key'] == 'base_listing_plan'): ?> hide base-listing-plan<?php endif; ?>">
                                <?php if ($this->_tpl_vars['configItem']['Type'] == 'divider'): ?>
                                    <td class="divider_line" colspan="2">
                                        <div class="inner"><?php echo $this->_tpl_vars['configItem']['name']; ?>
</div>
                                    </td>
                                <?php else: ?>
                                    <td class="name" style="width: 210px;"><?php echo $this->_tpl_vars['configItem']['name']; ?>
</td>
                                    <td class="field">
                                        <div class="inner_margin">
                                            <?php if ($this->_tpl_vars['configItem']['Data_type'] == 'int'): ?><input class="text" type="hidden" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][d_type]" value="<?php echo $this->_tpl_vars['configItem']['Data_type']; ?>
" /><?php endif; ?>
                                            <input class="text" type="hidden" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

                                            <?php if ($this->_tpl_vars['configItem']['Type'] == 'text'): ?>
                                                <input class="text <?php if ($this->_tpl_vars['configItem']['Data_type'] == 'int'): ?>numeric<?php endif; ?>" type="text" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'textarea'): ?>
                                                <textarea cols="5" rows="5" class="<?php if ($this->_tpl_vars['configItem']['Data_type'] == 'int'): ?>numeric<?php endif; ?>" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]"><?php echo ((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('replace', true, $_tmp, '\r\n', (defined('PHP_EOL') ? @PHP_EOL : null)) : smarty_modifier_replace($_tmp, '\r\n', (defined('PHP_EOL') ? @PHP_EOL : null))); ?>
</textarea>
                                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'bool'): ?>
                                                <input <?php if ($this->_tpl_vars['configItem']['Default'] == 1): ?>checked="checked"<?php endif; ?> type="radio" id="<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_1" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" value="1" />
                                                <label for="<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_1"><?php echo $this->_tpl_vars['lang']['enabled']; ?>
</label>

                                                <input <?php if ($this->_tpl_vars['configItem']['Default'] == 0): ?>checked="checked"<?php endif; ?> type="radio" id="<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_0" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" value="0" />
                                                <label for="<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_0"><?php echo $this->_tpl_vars['lang']['disabled']; ?>
</label>
                                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'select'): ?>
                                                <select <?php if ($this->_tpl_vars['configItem']['Key'] == 'timezone'): ?>class="w350"<?php endif; ?> style="width: 204px;" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]"
                                                    <?php $_from = $this->_tpl_vars['configItem']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sForeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sForeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sValue']):
        $this->_foreach['sForeach']['iteration']++;
?>
                                                        <?php if (($this->_foreach['sForeach']['iteration'] <= 1)): ?>
                                                            <?php if (( $this->_foreach['sForeach']['total'] == 1 && ! is_array ( $this->_tpl_vars['sValue'] ) && $this->_tpl_vars['configItem']['Key'] != 'template' ) || ( $this->_foreach['sForeach']['total'] == 1 && $this->_tpl_vars['configItem']['Key'] == 'template' && $this->_tpl_vars['sValue'] == $this->_tpl_vars['config']['template'] )): ?> class="disabled" disabled="disabled"<?php endif; ?>
                                                        >
                                                            <?php if (is_array ( $this->_tpl_vars['sValue'] ) && ! in_array ( $this->_tpl_vars['configItem']['Key'] , $this->_tpl_vars['systemSelects'] )): ?>
                                                                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <option value="<?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php echo $this->_tpl_vars['sValue']['ID']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sValue']; ?>
<?php endif; ?>" <?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php if ($this->_tpl_vars['configItem']['Default'] == $this->_tpl_vars['sValue']['ID']): ?>selected="selected"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['sValue'] == $this->_tpl_vars['configItem']['Default']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php if (is_array ( $this->_tpl_vars['sValue'] )): ?><?php echo $this->_tpl_vars['sValue']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sValue']; ?>
<?php endif; ?></option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>
                                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'radio'): ?>
                                                <?php $this->assign('displayItem', $this->_tpl_vars['configItem']['Display']); ?>
                                                <?php $_from = $this->_tpl_vars['configItem']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rForeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rForeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rKey'] => $this->_tpl_vars['rValue']):
        $this->_foreach['rForeach']['iteration']++;
?>
                                                    <input id="radio_<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_<?php echo $this->_tpl_vars['rKey']; ?>
" <?php if ($this->_tpl_vars['rValue'] == $this->_tpl_vars['configItem']['Default']): ?>checked="checked"<?php endif; ?> type="radio" value="<?php echo $this->_tpl_vars['rValue']; ?>
" name="post_config[<?php echo $this->_tpl_vars['configItem']['Key']; ?>
][value]" /><label for="radio_<?php echo $this->_tpl_vars['configItem']['Key']; ?>
_<?php echo $this->_tpl_vars['rKey']; ?>
">&nbsp;<?php echo $this->_tpl_vars['displayItem'][$this->_tpl_vars['rKey']]; ?>
&nbsp;&nbsp;</label>
                                                <?php endforeach; endif; unset($_from); ?>
                                            <?php elseif ($this->_tpl_vars['configItem']['Type'] == 'color'): ?>                                                 <div id="<?php echo $this->_tpl_vars['configItem']['Key']; ?>
ColorSelector" class="colorSelector">
                                                    <div style="background-color: rgb(<?php if (((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?>255,255,255<?php endif; ?>)"></div>
                                                </div>

                                                <script><?php echo '
                                                $(function() {
                                                    flUtil.loadScript(rlConfig.libs_url + \'jquery/colorpicker/js/colorpicker.js\', function() {
                                                        $(\'#'; ?>
<?php echo $this->_tpl_vars['configItem']['Key']; ?>
<?php echo 'ColorSelector\').ColorPicker({
                                                            color: \''; ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['configItem']['Default'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?>255,255,255<?php endif; ?><?php echo '\',
                                                            onShow: function (colorPicker) {
                                                                $(colorPicker).fadeIn(500);
                                                                return false;
                                                            },
                                                            onHide: function (colorPicker) {
                                                                $(colorPicker).fadeOut(500);
                                                                return false;
                                                            },
                                                            onChange: function (hsb, hex, rgb) {
                                                                rgb = rgb.r + \',\' + rgb.g + \',\' + rgb.b;
                                                                $(\'#'; ?>
<?php echo $this->_tpl_vars['configItem']['Key']; ?>
<?php echo 'ColorSelector div\').css(\'background-color\', \'rgb(\' + rgb + \')\');
                                                                $(\'[name="post_config['; ?>
<?php echo $this->_tpl_vars['configItem']['Key']; ?>
<?php echo '][value]"]\').val(rgb);
                                                            }
                                                        });
                                                    });
                                                });
                                                '; ?>
</script>
                                            <?php else: ?>
                                                <?php echo $this->_tpl_vars['configItem']['Default']; ?>

                                            <?php endif; ?>
                                            <?php if ($this->_tpl_vars['configItem']['des'] != ''): ?>
                                                <span style="<?php if ($this->_tpl_vars['configItem']['Type'] == 'textarea'): ?>line-height: 10px;<?php elseif ($this->_tpl_vars['configItem']['Type'] == 'bool'): ?>line-height: 14px;margin: 0 10px;<?php endif; ?>" class="settings_desc"><?php echo $this->_tpl_vars['configItem']['des']; ?>
</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>

                            <?php if ($this->_tpl_vars['smtpDebug']): ?>
                                <td class="divider_line" colspan="2">
                                    <div class="inner"><?php echo $this->_tpl_vars['lang']['smtp_error_log']; ?>
</div>
                                </td>
                                <tr>
                                    <td class="code" colspan="2">
                                        <pre class="code"><code><?php echo $this->_tpl_vars['smtpDebug']; ?>
</code></pre>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td></td>
                                <td><input style="margin: 10px 0 0 0;" type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" /></td>
                            </tr>
                            </table>
                        </div>
                    <?php else: ?>
                        <div style="margin: 10px 20px" class="static"><?php echo $this->_tpl_vars['lang']['confog_group_empty']; ?>
</div>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>
    </table>
</form>

<?php $this->assign('base_listing_plan_des', 'config+des+base_listing_plan'); ?>

<?php if (isset ( $this->_tpl_vars['config']['search_map_location_name'] )): ?>
    <?php echo $this->_plugins['function']['geoAutocompleteAPI'][0][0]->adminGeoAutocompleteAPI(array(), $this);?>

<?php endif; ?>

<script>
lang['resize_images_prompt'] = "<?php echo $this->_tpl_vars['lang']['resize_images_prompt']; ?>
";
lang['resize_in_progress'] = "<?php echo $this->_tpl_vars['lang']['resize_in_progress']; ?>
";
lang['resize_completed'] = "<?php echo $this->_tpl_vars['lang']['resize_completed']; ?>
";
lang['refresh_listing_pictures'] = "<?php echo $this->_tpl_vars['lang']['refresh_listing_pictures']; ?>
";
lang['refresh_account_pictures'] = "<?php echo $this->_tpl_vars['lang']['refresh_account_pictures']; ?>
";

rlConfig['refreshListingImages'] = <?php if ($_GET['refreshListingImages']): ?>true<?php else: ?>false<?php endif; ?>;
rlConfig['refreshAccountImages'] = <?php if ($_GET['refreshAccountImages']): ?>true<?php else: ?>false<?php endif; ?>;
rlConfig['default_coordinates'] = '<?php echo $this->_tpl_vars['config']['search_map_location']; ?>
';

var popupListingPlan;
<?php echo '

$(function() {
    if ($(\'input[name="post_config[membership_module][value]"]\').is(\':checked\') && $(\'input[name="post_config[membership_module][value]"]\').val() == 0) {
        $(\'input[name="post_config[membership_module][value]"]\').parent().parent().parent(\'tr\').next(\'tr\').addClass(\'hide\');
    }
    $(\'input[name="post_config[membership_module][value]"]\').change(function() {
        if ($(this).is(\':checked\') && $(this).val() == 0) {
            $(this).parent().parent().parent(\'tr\').next(\'tr\').addClass(\'hide\');
            $.getJSON(rlConfig[\'ajax_url\'], {item: \'checkListingsByMembership\'}, function(response){
                if (response) {
                    if (response.count > 0) {
                        assignListingsToPlan(response.message);
                    }
                }
            });
        } else {
            $(\'input[name="post_config[base_listing_plan][value]"]\').val(\'\');
            $(this).parent().parent().parent(\'tr\').next(\'tr\').removeClass(\'hide\');
        }
    });
    $(document).on(\'click\', \'.apply-plan\', function(event) {
        if ($(\'#listing_plans option:selected\').val() > 0) {
            $(\'input[name="post_config[base_listing_plan][value]"]\').val($(\'#listing_plans option:selected\').val());
            $(\'#settings_anchor\').parent(\'form\').submit();
        } else {
            printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['mp_not_selected_package']; ?>
<?php echo '\');
            $(\'#membership_module_1\').prop(\'checked\', \'checked\');
            $(\'#membership_module_1\').closest(\'tr\').next(\'tr\').removeClass(\'hide\');
            $(\'input[name="post_config[base_listing_plan][value]"]\').val(\'\');
            flynax.slideTo(\'body\');
        }
        popupListingPlan.close();
    });
    $(document).on(\'click\', \'.cancel-plan\', function(event) {
        $(\'#membership_module_1\').prop(\'checked\', \'checked\');
        $(\'#membership_module_1\').parent().parent().parent(\'tr\').next(\'tr\').removeClass(\'hide\')
        $(\'input[name="post_config[base_listing_plan][value]"]\').val(\'\');
        popupListingPlan.close();
    });
    $(\'form\').submit(function(){
        $(\'input[type=text],[type=hidden]\').each(function(){
            if( $(this).val().match(/http(s)?/) && !$(this).val().match(/\\[\\[http/))
            {
                var new_val = $(this).val().replace(/http(s)?/g, \'[[http$1_pref]]\');
                $(this).val(new_val);
            }
        });
    });

    $(\'#larea_\'+sKey).show();

    $(\'.ltab\').each(function(){
        if ( $(this).attr(\'class\').split(\' \')[1] == \'tabs_active\' )
        {
            $(this).removeClass(\'tabs_active\').addClass(\'tabs_inactive\');
        }
    });
    $(\'#ltab_\'+sKey).removeClass(\'tabs_inactive\').addClass(\'tabs_active\');

    $(\'.larea\').hide();

    $(\'#larea_\'+sKey).show();

    // Sağ tarafın görünür alanını değiştiren sekme tıklama handler\'ı (dayanıklı)
    $(document).off(\'click\', \'.ltab\').on(\'click\', \'.ltab\', function(){

        var yScroll;
        if (self.pageYOffset)
            yScroll = self.pageYOffset;
        else if (document.documentElement && document.documentElement.scrollTop)
            yScroll = document.documentElement.scrollTop;// Explorer 6 Strict
        else if (document.body)
            yScroll = document.body.scrollTop;// all other Explorers

        var pos = $(\'#settings_anchor\').position();

        $(\'html, body\').stop();

        if ( yScroll > pos.top )
        {
            $(\'html, body\').animate({scrollTop:pos.top-40}, \'slow\');
        }

        var cid = $(this).attr(\'id\').split(\'_\')[1];
        $(\'input[name=group_id]\').val(cid);

        $(\'.ltab\').each(function(){
            if ( $(this).attr(\'class\').split(\' \')[1] == \'tabs_active\' )
            {
                $(this).removeClass(\'tabs_active\').addClass(\'tabs_inactive\');
            }
        });
        $(\'#ltab_\'+cid).removeClass(\'tabs_inactive\').addClass(\'tabs_active\');

        $(\'.larea\').hide();
        $(\'#larea_\'+cid).show();

        // Güvenli seçenek: Sunucu tarafından doğru grubu yüklemek için URL\'e yönlendir
        try {
            if (typeof rlUrlController !== \'undefined\') {
                window.location = rlUrlController + \'&group=\' + cid;
            }
        } catch (e) {}
    });

    // Refresh listing/account pictures
    var refresh_method = \'\';
    if (rlConfig[\'refreshListingImages\'] && rlConfig[\'refreshAccountImages\']) {
        refresh_method = \'flynax.initRebuildPictures\';
    } else if (rlConfig[\'refreshListingImages\']) {
        refresh_method = \'flynax.initRebuildListingPictures\';
    } else if (rlConfig[\'refreshAccountImages\']) {
        refresh_method = \'flynax.initRebuildAccountPictures\';
    }

    if (refresh_method) {
        rlConfirm(lang[\'resize_images_prompt\'], refresh_method);
    }

    // Static Maps
    $(\'select[name="post_config[static_map_provider][value]"]\').on(\'change\', function(){
        $(\'input[name="post_config[google_map_key][value]"]\').closest(\'tr\')[
            $(this).val() == \'google\' ? \'removeClass\' : \'addClass\'
        ](\'hide\');
    }).trigger(\'change\');

    // Geocoding
    $(\'select[name="post_config[geocoding_provider][value]"]\').on(\'change\', function(){
        $(\'input[name="post_config[google_server_map_key][value]"]\').closest(\'tr\')[
            $(this).val() == \'google\' ? \'removeClass\' : \'addClass\'
        ](\'hide\');
        $(\'input[name="post_config[yandex_geocoder_api_key][value]"]\').closest(\'tr\')[
            $(this).val() == \'yandex\' ? \'removeClass\' : \'addClass\'
        ](\'hide\');

        $restrictedCountry = $(\'select[name="post_config[geocoding_restrict_by_country][value]"]\');
        $restrictedCountry.attr(\'disabled\', $(this).val() == \'yandex\');

        if ($(this).val() == \'yandex\') {
            $restrictedCountry.val(\'\');
        }
    }).trigger(\'change\');

    // Default map location autocomplete
    var $configInput =  $(\'input[type=text][name="post_config[search_map_location_name][value]"]\')
    if ($configInput.length) {
        var defaultLat = \'\';
        var defaultLng = \'\';

        if (rlConfig[\'default_coordinates\'].indexOf(\',\') > 0) {
            var defaultCoordinates = rlConfig[\'default_coordinates\'].split(\',\');
            defaultLat = defaultCoordinates[0];
            defaultLng = defaultCoordinates[1];
        }

        $configInput.after(\'<input type="hidden" name="search_map_default[lat]" value="\'+defaultLat+\'" />\');
        $configInput.after(\'<input type="hidden" name="search_map_default[lng]" value="\'+defaultLng+\'" />\');

        $configInput.geoAutocomplete({
            onSelect: function(name, lat, lng){
                $(\'input[name="search_map_default[lat]"]\').val(lat);
                $(\'input[name="search_map_default[lng]"]\').val(lng);
            }
        });
    }

    '; ?>
<?php if (count($this->_tpl_vars['allLangs']) < 2): ?>
        $('[name="post_config[multilingual_paths][value]"]').prop('disabled', true);
    <?php endif; ?><?php echo '

    var $bannerGridOption = $(\'select[name="post_config[banner_in_grid_position][value]"]\');

    '; ?>
<?php if ($this->_tpl_vars['config']['banner_in_grid_position_option'] === '0'): ?>
        $bannerGridOption.attr('disabled', true);
    <?php endif; ?><?php echo '

    $(\'input[name="post_config[banner_in_grid_position_option][value]"]\').change(function() {
        $bannerGridOption.attr(
            \'disabled\',
            Number($(this).val()) === 0 ? true : false
        );
    });

    /**
     * Translation API
     * @since 4.9.3
     */
    $(\'select[name="post_config[translation_api][value]"]\').on(\'change\', function() {
        $(\'input[name="post_config[google_translation_api_key][value]"]\').closest(\'tr\')[
            $(this).val() == \'google\' ? \'removeClass\' : \'addClass\'
        ](\'hide\');
        $(\'input[name="post_config[deepl_translation_api_key][value]"]\').closest(\'tr\')[
            $(this).val() == \'deepl\' ? \'removeClass\' : \'addClass\'
        ](\'hide\');
    }).trigger(\'change\');
});

var assignListingsToPlan = function(message) {
    var popup_content = \'\\
        <div class="x-hidden" id="select_listing_plan_area">\\
            <div class="x-window-header">\' + lang[\'ext_confirm\'] + \'</div>\\
            <div class="x-window-body" style="padding: 10px 15px;">\\
                <div>\'+ message +\'</div>\\
                <table class="form">\\
                    <tr>\\
                        <td class="name w130">'; ?>
<?php echo $this->_tpl_vars['lang']['listing_package']; ?>
<?php echo '</td>\\
                        <td class="field">\\
                            <select id="listing_plans">\\
                                <option value="0">'; ?>
<?php echo $this->_tpl_vars['lang']['select']; ?>
<?php echo '</option>\\
                                '; ?>
<?php $_from = $this->_tpl_vars['listing_plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan']):
?><?php echo '<option value="'; ?>
<?php echo $this->_tpl_vars['plan']['ID']; ?>
<?php echo '">'; ?>
<?php echo $this->_tpl_vars['plan']['name']; ?>
<?php echo '</option>'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '\\
                            </select>\\
                        </td>\\
                    </tr>\\
                    <tr>\\
                        <td></td>\\
                        <td><input style="margin: 10px 0 0 0;" type="button" class="button apply-plan" value="'; ?>
<?php echo $this->_tpl_vars['lang']['apply']; ?>
<?php echo '" />&nbsp;<input style="margin: 10px 0 0 0;" type="button" class="button cancel-plan" value="'; ?>
<?php echo $this->_tpl_vars['lang']['cancel']; ?>
<?php echo '" /></td>\\
                    </tr>\\
                </table>\\
            </div>\\
        </div>\';

    $(\'body\').after(popup_content);

    popupListingPlan = new Ext.Window({
        title: lang[\'ext_confirm\'],
        applyTo: \'select_listing_plan_area\',
        layout: \'fit\',
        width: 500,
        height: \'auto\',
        plain: true,
        modal: true,
        closable: false
    });

    popupListingPlan.show();
}

$(function () {
    let $watermarkOption = $(\'[name="post_config[watermark_using][value]"]\'),
        $watermarkType   = $(\'select[name="post_config[watermark_type][value]"]\');

    watermarkOptionHandler();

    $watermarkOption.change(function () {
        watermarkOptionHandler();
    });

    function watermarkOptionHandler () {
        $(\'[name^="post_config[watermark_"]\').closest(\'tr\').each(function () {
            if ($(this).find(\'input\').attr(\'name\') === \'post_config[watermark_using][value]\') {
                return;
            }

            $(this).css(\'display\', $watermarkOption.filter(\':checked\').val() === \'0\' ? \'none\' : \'\');
        });

        watermarkTypeHandler();
    }

    $watermarkType.change(function () {
        watermarkTypeHandler();
    });

    function watermarkTypeHandler () {
        if ($watermarkOption.filter(\':checked\').val() === \'0\') {
            return;
        }

        if ($watermarkType.val() === \'text\') {
            $(\'[name="post_config[watermark_image_url][value]"]\').closest(\'tr\').hide();
            $(\'[name="post_config[watermark_image_width][value]"]\').closest(\'tr\').hide();

            $(\'[name="post_config[watermark_text][value]"]\').closest(\'tr\').show();
            $(\'[name="post_config[watermark_text_font][value]"]\').closest(\'tr\').show();
            $(\'[name="post_config[watermark_text_size][value]"]\').closest(\'tr\').show();
            $(\'[name="post_config[watermark_text_color][value]"]\').closest(\'tr\').show();
        } else if ($watermarkType.val() === \'image\') {
            $(\'[name="post_config[watermark_text][value]"]\').closest(\'tr\').hide();
            $(\'[name="post_config[watermark_text_font][value]"]\').closest(\'tr\').hide();
            $(\'[name="post_config[watermark_text_size][value]"]\').closest(\'tr\').hide();
            $(\'[name="post_config[watermark_text_color][value]"]\').closest(\'tr\').hide();

            $(\'[name="post_config[watermark_image_url][value]"]\').closest(\'tr\').show();
            $(\'[name="post_config[watermark_image_width][value]"]\').closest(\'tr\').show();
        }
    }
});
'; ?>


<?php if ($this->_tpl_vars['mfSubdomainsDenied']): ?>
    printMessage('error', '<?php echo $this->_tpl_vars['lang']['mf_subdomain_denied']; ?>
');
<?php elseif ($this->_tpl_vars['cacheMethodDenied']): ?>
    printMessage('error', '<?php echo $this->_tpl_vars['lang']['cache_method_denied']; ?>
');
<?php endif; ?>

</script>
<!-- settings tpl end -->