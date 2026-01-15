<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'geoAutocompleteAPI', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/js.tpl', 3, false),)), $this); ?>
<!-- locationFinder javascript on settings page -->

<?php echo $this->_plugins['function']['geoAutocompleteAPI'][0][0]->adminGeoAutocompleteAPI(array(), $this);?>


<script>
var locationFinder_default_location = '<?php echo $this->_tpl_vars['config']['locationFinder_default_location']; ?>
';
var locationFinder_disallow_sync = <?php if ($this->_tpl_vars['disallow_sync']): ?>true<?php else: ?>false<?php endif; ?>;
lang['locationFinder_geocoding_mismatch'] = '<?php echo $this->_tpl_vars['lang']['locationFinder_geocoding_mismatch']; ?>
';
<?php echo '

$(document).ready(function(){
    // Geolocation autocomplete
    var $input = $(\'input[name="post_config[locationFinder_search][value]"][type=text]\');

    $input.geoAutocomplete({
        onSelect: function(name, lat, lng){
            $(\'input[name="locationFinder_default_location"]\').val(lat + \',\' + lng);
        }
    });

    $input.after(\'<input type="hidden" name="locationFinder_default_location" value="\'+locationFinder_default_location+\'" />\');

    // Group position
    var field_position = $(\'select[name="post_config[locationFinder_position][value]"]\');
    var field_type = $(\'input[name="post_config[locationFinder_type][value]"]\');
    var field_group = $(\'select[name="post_config[locationFinder_group][value]"]\');

    var locationFinder_check = function(){
        var val = field_position.val();

        if (val == \'in_group\') {
            field_type.closest(\'tr\').show();
            field_group.closest(\'tr\').show();
        } else {
            field_type.closest(\'tr\').hide();
            field_group.closest(\'tr\').hide();
        }
    }

    locationFinder_check();
    field_position.change(function(){
        locationFinder_check();
    });

    if (locationFinder_disallow_sync) {
        var $opt = $(\'[name="post_config[locationFinder_mapping][value]"][type=radio]\');
        $opt.attr(\'disabled\', true);
        $opt.parent().find(\'span.settings_desc\').text(lang[\'locationFinder_geocoding_mismatch\']);
    }
});

'; ?>

</script>

<!-- locationFinder javascript on settings page end -->