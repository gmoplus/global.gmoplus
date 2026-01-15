<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl', 13, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl', 25, false),array('modifier', 'version_compare', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl', 89, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl', 135, false),array('function', 'phrase', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/settings.tpl', 25, false),)), $this); ?>
<!-- Multifield custom settings tpl -->

<table class="hide">
<tr id="mf_filtering_settings">
    <td colspan="2">
        <input type="hidden" name="post_config[mf_geo_force][value]" value="1" />

        <table class="form">
        <?php $this->assign('new_group', false); ?>

        <?php $_from = $this->_tpl_vars['mf_available_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['page']):
        $this->_foreach['pages']['iteration']++;
?>

        <?php if (((is_array($_tmp=$this->_tpl_vars['page']['Controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_predefine_controllers']) : in_array($_tmp, $this->_tpl_vars['mf_predefine_controllers'])) && ! $this->_tpl_vars['new_group']): ?>
            <?php $this->assign('new_group', true); ?>

        <tr>
            <td class="divider_line" colspan="2">
                <div class="inner"><?php echo $this->_tpl_vars['lang']['mf_geo_prefilling_group']; ?>
</div>
            </td>
        </tr>
        <?php endif; ?>

        <tr<?php if ($this->_foreach['pages']['iteration']%2 == 0): ?> class="highlight"<?php endif; ?>>
            <td class="name"<?php if (($this->_foreach['pages']['iteration'] <= 1)): ?> style="width: 210px;"<?php endif; ?>>
                <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='pages+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['page']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['page']['Key']))), $this);?>

            </td>
            <td class="field">
                <div class="inner_margin" style="padding-top: 6px;">
                    <label>
                        <input type="radio"
                               name="mf_config[<?php echo $this->_tpl_vars['page']['Key']; ?>
][filtration]"
                               value="1"
                               <?php if (((is_array($_tmp=$this->_tpl_vars['page']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_filtering_pages']) : in_array($_tmp, $this->_tpl_vars['mf_filtering_pages']))): ?>
                               checked="checked"
                               <?php endif; ?> />
                        <?php echo $this->_tpl_vars['lang']['enabled']; ?>

                    </label>

                    <label>
                        <input type="radio"
                               name="mf_config[<?php echo $this->_tpl_vars['page']['Key']; ?>
][filtration]"
                               value="0"
                               <?php if (! ((is_array($_tmp=$this->_tpl_vars['page']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_filtering_pages']) : in_array($_tmp, $this->_tpl_vars['mf_filtering_pages']))): ?>
                               checked="checked"
                               <?php endif; ?> />
                        <?php echo $this->_tpl_vars['lang']['disabled']; ?>

                    </label>

                    <?php if (! ((is_array($_tmp=$this->_tpl_vars['page']['Controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_predefine_controllers']) : in_array($_tmp, $this->_tpl_vars['mf_predefine_controllers'])) && $this->_tpl_vars['config']['mod_rewrite']): ?>
                        <label class="mf-opt-label<?php if (! ((is_array($_tmp=$this->_tpl_vars['page']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_filtering_pages']) : in_array($_tmp, $this->_tpl_vars['mf_filtering_pages']))): ?> mf-disabled<?php endif; ?>">
                            <input type="checkbox"
                                   name="mf_config[<?php echo $this->_tpl_vars['page']['Key']; ?>
][url]"
                                   value="1"
                                   <?php if (! ((is_array($_tmp=$this->_tpl_vars['page']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_filtering_pages']) : in_array($_tmp, $this->_tpl_vars['mf_filtering_pages']))): ?>
                                   disabled="disabled"
                                   <?php endif; ?>
                                   <?php if (((is_array($_tmp=$this->_tpl_vars['page']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mf_location_url_pages']) : in_array($_tmp, $this->_tpl_vars['mf_location_url_pages']))): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['mf_apply_location_to_url']; ?>

                        </label>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>

        <p class="mf-hint"><i><?php echo $this->_tpl_vars['lang']['mf_preselect_data_hint']; ?>
</i></p>
    </td>
</tr>
</table>

<script>
var mf_group_id   = <?php echo $this->_tpl_vars['mf_group_id']; ?>
;
var mf_geo_filter = <?php if ($this->_tpl_vars['mf_geo_filter']): ?>true<?php else: ?>false<?php endif; ?>;
var ref_url_enabled = <?php if ($this->_tpl_vars['ref_url_enabled']): ?>true<?php else: ?>false<?php endif; ?>;
lang['mf_no_geo_filtering_format'] = '<?php echo $this->_tpl_vars['lang']['mf_no_geo_filtering_format']; ?>
';
rlConfig['mf_allow_subdomain'] = <?php if ($this->_tpl_vars['mf_allow_subdomain']): ?>true<?php else: ?>false<?php endif; ?>;

<?php if ($this->_tpl_vars['plugins']['sitemap']): ?>
    rlConfig.mf_urls_in_sitemap        = <?php if ($this->_tpl_vars['config']['mf_urls_in_sitemap']): ?>true<?php else: ?>false<?php endif; ?>;
    lang.mf_sitemap_dryrun_box_content = '<?php echo $this->_tpl_vars['lang']['mf_sitemap_dryrun_box_content']; ?>
';
    lang.mf_sitemap_rebuilding         = '<?php echo $this->_tpl_vars['lang']['mf_sitemap_rebuilding']; ?>
';
    lang.sm_xml_rebuilt                = '<?php echo $this->_tpl_vars['lang']['sm_xml_rebuilt']; ?>
';
    lang.sm_rebuild_notify_fail        = '<?php echo $this->_tpl_vars['lang']['sm_rebuild_notify_fail']; ?>
';
    lang.sm_dryrun_rebuild_fail        = '<?php echo $this->_tpl_vars['lang']['sm_dryrun_rebuild_fail']; ?>
';
    lang.sm_dryrun_rebuild_in_process  = '<?php echo $this->_tpl_vars['lang']['sm_dryrun_rebuild_in_process']; ?>
';
    rlConfig.isSitemapSupported        = <?php if (((is_array($_tmp=$this->_tpl_vars['plugins']['sitemap'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '3.0.3') : version_compare($_tmp, '3.0.3')) > 0): ?>true<?php else: ?>false<?php endif; ?>;
<?php endif; ?>
<?php echo '

$(function(){
    var $container = $(\'#mf_filtering_settings\');

    $(\'#larea_\' + mf_group_id + \' table.form tbody > tr:last\').before($container);
    $container.removeClass(\'hide\');

    $container.find(\'input[type=radio][name^=mf_config]\').change(function(){
        var is_checked = parseInt($(this).filter(\':checked\').val());
        var $container = $(this).closest(\'div\');

        $container.find(\'.mf-opt-label\')[is_checked
            ? \'removeClass\'
            : \'addClass\'
        ](\'mf-disabled\');

        $container.find(\'.mf-opt-label input\').attr(\'disabled\', !is_checked);
    });

    // No geo filtering alert
    if (!readCookie(\'mf_no_geo_filtering_format\') && !mf_geo_filter) {
        $(\'#ltab_\' + mf_group_id).click(function(){
            setTimeout(function(){
                fail_alert(\'\', lang[\'mf_no_geo_filtering_format\']);
                createCookie(\'mf_no_geo_filtering_format\', 1, 1);
            }, 1000);
        });
    }

    // Hide geo filtering related fields
    if (!mf_geo_filter) {
        $(\'input[name="post_config[mf_popular_locations_level][value]"]\').closest(\'tr\').remove();
    }

    if (ref_url_enabled) {
        $listingGeoUrls = $(\'input[name="post_config[mf_listing_geo_urls][value]"]\')
        $listingGeoUrls.attr(\'disabled\', \'disabled\');
        $listingGeoUrls.closest(\'div\').find(\'span\').text(lang[\'mf_ref_url_conflict\']);
    }
});

'; ?>


<?php if (count($this->_tpl_vars['allLangs']) === 1): ?>
<?php echo '

$(function(){
    var $inputs = $(\'input[name="post_config[mf_multilingual_path][value]"]\');

    $inputs.filter(\'[value=0]\').trigger(\'click\');
    $inputs.attr(\'disabled\', true);
});

'; ?>

<?php endif; ?>

<?php echo '

$(function(){
    var $inputs = $(\'input[name="post_config[mf_geo_subdomains][value]"]\');

    if (rlConfig[\'mf_allow_subdomain\']) {
        $inputs.parent().find(\'.settings_desc\').hide();
    } else {
        $inputs.attr(\'disabled\', true);
    }
});

$(function(){
    // Location structure mode handler
    var $subdomain = $(\'input[name="post_config[mf_geo_subdomains][value]"]\');
    var $linkType  = $(\'select[name="post_config[mf_geo_subdomains_type][value]"]\');

    var changeHandler = function($val){
        var val = parseInt($val);
        $linkType.find(\'option[value=mixed]\')[
            val ? \'show\' : \'hide\'
        ]();

        var $hints = $linkType.parent().find(\'.settings_desc > div > div\');
        $hints.hide().filter(val ? \':first\': \':last\').show();

        if (!val && $linkType.val() == \'mixed\') {
            $linkType.val(\'combined\');
        }
    }

    $subdomain.change(function(){
        changeHandler($(this).val());
    });

    changeHandler($subdomain.filter(\':checked\').val());

    // Select location mode handler
    var $selectIterface = $(\'select[name="post_config[mf_select_interface][value]"]\');
    var locationModeHandler = function(){
        $(\'select[name="post_config[mf_popular_locations_level][value]"]\').closest(\'tr\')[
            $selectIterface.val() == \'box\' ? \'hide\' : \'show\'
        ]();
    }

    $selectIterface.change(function(){
        locationModeHandler();
    });

    locationModeHandler();
});

'; ?>
<?php if ($this->_tpl_vars['plugins']['sitemap']): ?><?php echo '
    var $addHomeToSitemap       = $(\'input[name="post_config[mf_home_in_sitemap][value]"]\'),
        $urlsInSitemap          = $(\'select[name="post_config[mf_urls_in_sitemap][value]"]\'),
        $urlsInSitemapContainer = $urlsInSitemap.closest(\'tr\'),
        $locationsInListingUrls = $(\'input[name="post_config[mf_listing_geo_urls][value]"]\'),
        $urlsWithLocation       = $(\'#mf_filtering_settings label.mf-opt-label input\'),
        sitemapInProgress       = false;

    $(function(){
        addHomeToSitemapHandler($urlsInSitemap.val());

        if (!rlConfig.isSitemapSupported || !$urlsWithLocation.filter(\':checked\').length) {
            $urlsInSitemapContainer.hide();
        }

        $urlsWithLocation.change(function() {
            $urlsInSitemapContainer[$urlsWithLocation.filter(\':checked\').length ? \'show\' : \'hide\']();

            if ($(this).is(\':checked\') && $urlsWithLocation.filter(\':checked\').length) {
                dryrunSitemapHandler();
            }
        });

        $urlsInSitemap.change(function(){
            addHomeToSitemapHandler($(this).val());
            dryrunSitemapHandler();
        });

        $addHomeToSitemap.change(function(){
            if ($(this).val() === \'1\') {
                dryrunSitemapHandler();
            }
        });

        $locationsInListingUrls.change(function() {
            if ($(this).val() === \'1\') {
                dryrunSitemapHandler();
            }
        });

        $(window).bind(\'beforeunload\', function(){
            if (sitemapInProgress) {
                return lang.sm_dryrun_rebuild_in_process;
            }
        });
    });

    var addHomeToSitemapHandler = function(typeLinksInSitemap){
        $addHomeToSitemap.closest(\'tr\')[typeLinksInSitemap === \'not_empty\' ? \'show\' : \'hide\']();
    };

    var dryrunSitemapHandler = function(){
        if (!$urlsInSitemap.val()) {
            return;
        }

        Ext.MessageBox.confirm(lang.confirm_notice, lang.mf_sitemap_dryrun_box_content, function(btn){
            if (btn === \'yes\') {
                sitemapInProgress = true;

                var messageBox = Ext.MessageBox.show({
                    title: lang.mf_sitemap_rebuilding,
                    msg  : lang.loading,
                    width: 300,
                    wait : false
                });

                var mfLocationUrlPages = [];
                $urlsWithLocation.filter(\':checked\').each(function(){
                    mfLocationUrlPages.push($(this).attr(\'name\').replace(/mf_config\\[(.*)\\]\\[url\\]/, \'$1\'));
                });

                $.post(
                    rlConfig[\'ajax_url\'],
                    {
                        item                 : \'smRebuildFiles\',
                        mf_urls_in_sitemap   : $urlsInSitemap.val(),
                        mf_home_in_sitemap   : $addHomeToSitemap.filter(\':checked\').val(),
                        mf_location_url_pages: mfLocationUrlPages.join(\',\'),
                        mf_listing_geo_urls  : $locationsInListingUrls.filter(\':checked\').val(),
                    },
                    function(response) {
                        if (response && response.status) {
                        sitemapInProgress = false;
                            messageBox.hide();

                            if (response.status === \'OK\') {
                                printMessage(\'notice\', lang.sm_xml_rebuilt);
                            } else {
                                printMessage(\'error\', lang.sm_rebuild_notify_fail);
                            }
                        }
                    },
                    \'json\'
                ).fail(function() {
                    sitemapInProgress = false;
                    $urlsInSitemap.val(\'\');
                    addHomeToSitemapHandler();
                    messageBox.hide();
                    printMessage(\'error\', lang.sm_dryrun_rebuild_fail);
                    $.post(rlConfig[\'ajax_url\'], {item: \'smRestoreXmlFromBackup\'}, function(){}, \'json\');
                });
            } else {
                $urlsInSitemap.val(\'\');
                addHomeToSitemapHandler();
            }
        });
    };
'; ?>
<?php endif; ?>

</script>

<!-- Multifield custom settings tpl end -->