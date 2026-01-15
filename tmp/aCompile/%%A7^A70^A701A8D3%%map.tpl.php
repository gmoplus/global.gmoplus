<?php /* Smarty version 2.6.31, created on 2026-01-06 10:27:59
         compiled from /home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/map.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/map.tpl', 4, false),array('modifier', 'json_encode', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/map.tpl', 52, false),array('function', 'mapsAPI', '/home/gmoplus/global.gmoplus.com/plugins/locationFinder/admin/map.tpl', 9, false),)), $this); ?>
<!-- location finder tpl -->

<svg class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_ROOT') ? @RL_ROOT : null))) ? $this->_run_mod_handler('cat', true, $_tmp, 'templates/') : smarty_modifier_cat($_tmp, 'templates/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['template']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['template'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '/img/svg/userLocation.svg') : smarty_modifier_cat($_tmp, '/img/svg/userLocation.svg')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</svg>

<script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
maps/geocoder.js"></script>

<?php echo $this->_plugins['function']['mapsAPI'][0][0]->adminMapsAPI(array(), $this);?>


<tr id="lf_container"<?php if ($this->_tpl_vars['config']['locationFinder_position'] != 'top'): ?> class="hide"<?php endif; ?>>
    <td class="name">
        <?php echo $this->_tpl_vars['lang']['locationFinder_location']; ?>
 <img src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" class="qtip" title="<?php echo $this->_tpl_vars['lang']['locationFinder_hint']; ?>
" />
    </td>
    <td class="field">
        <div id="lf_map" style="height: 400px;"></div>

        <input id="lf_lat" name="f[lf][lat]" type="hidden" value="<?php echo $_POST['f']['lf']['lat']; ?>
" />
        <input id="lf_lng" name="f[lf][lng]" type="hidden" value="<?php echo $_POST['f']['lf']['lng']; ?>
" />
        <input id="lf_zoom" name="f[lf][zoom]" type="hidden" value="<?php echo $_POST['f']['lf']['zoom']; ?>
" />
    </td>
</tr>

<script class="fl-js-dynamic">
lang['locationFinder_address_hint'] = "<?php echo $this->_tpl_vars['lang']['locationFinder_address_hint']; ?>
";
lang['locationFinder_drag_notice'] = "<?php echo $this->_tpl_vars['lang']['locationFinder_drag_notice']; ?>
";

<?php echo '

$(function(){
    '; ?>

    var position    = '<?php echo $this->_tpl_vars['config']['locationFinder_position']; ?>
';
    var group       = '<?php echo $this->_tpl_vars['config']['locationFinder_group']; ?>
';
    var append_type = '<?php echo $this->_tpl_vars['config']['locationFinder_type']; ?>
';
    var options     = <?php echo ' { '; ?>

        postLat: <?php if ($_POST['f']['lf']['lat']): ?><?php echo $_POST['f']['lf']['lat']; ?>
<?php else: ?>false<?php endif; ?>,
        postLng: <?php if ($_POST['f']['lf']['lng']): ?><?php echo $_POST['f']['lf']['lng']; ?>
<?php else: ?>false<?php endif; ?>,
        postZoom: <?php if ($_POST['f']['lf']['zoom']): ?><?php echo $_POST['f']['lf']['zoom']; ?>
<?php else: ?>false<?php endif; ?>,
        defaultLocation: '<?php echo $this->_tpl_vars['config']['locationFinder_default_location']; ?>
',
        containerID: '#lf_container',
        mapElementID: '#lf_map',
        zoom: <?php echo $this->_tpl_vars['config']['locationFinder_map_zoom']; ?>
,
        useVisitorLocation: <?php if ($this->_tpl_vars['config']['locationFinder_use_location']): ?>true<?php else: ?>false<?php endif; ?>,
        useNeighborhood: <?php if ($this->_tpl_vars['config']['locationFinder_use_neighborhood']): ?>true<?php else: ?>false<?php endif; ?>,
        mapping: <?php if ($this->_tpl_vars['config']['locationFinder_mapping']): ?>true<?php else: ?>false<?php endif; ?>,
        mappingCountry: <?php if ($this->_tpl_vars['config']['locationFinder_mapping_country']): ?>'<?php echo $this->_tpl_vars['config']['locationFinder_mapping_country']; ?>
'<?php else: ?>false<?php endif; ?>,
        mappingState: <?php if ($this->_tpl_vars['config']['locationFinder_mapping_state']): ?>'<?php echo $this->_tpl_vars['config']['locationFinder_mapping_state']; ?>
'<?php else: ?>false<?php endif; ?>,
        mappingCity: <?php if ($this->_tpl_vars['config']['locationFinder_mapping_city']): ?>'<?php echo $this->_tpl_vars['config']['locationFinder_mapping_city']; ?>
'<?php else: ?>false<?php endif; ?>,
        mappingAddress: <?php if ($this->_tpl_vars['config']['locationFinder_mapping_address']): ?>'<?php echo $this->_tpl_vars['config']['locationFinder_mapping_address']; ?>
'<?php else: ?>false<?php endif; ?>,
        mappingZip: <?php if ($this->_tpl_vars['config']['locationFinder_mapping_zip']): ?>'<?php echo $this->_tpl_vars['config']['locationFinder_mapping_zip']; ?>
'<?php else: ?>false<?php endif; ?>,
        geocoding: <?php if (! isset ( $this->_tpl_vars['config']['geocoding_provider'] ) || $this->_tpl_vars['config']['geocoding_provider'] == 'google'): ?>true<?php else: ?>false<?php endif; ?>,
        mfFields: <?php if ($this->_tpl_vars['geo_fields']): ?>JSON.parse('<?php echo json_encode($this->_tpl_vars['geo_fields']); ?>
')<?php else: ?>false<?php endif; ?>
    <?php echo '
    };

    var $container  = $(\'#lf_container\');
    var $form       = $(\'#controller_area form\');

    // Assign map container
    if (position == \'bottom\'){
        $form.find(\'.fieldset, .submit-cell\').last().after($container);
    } else if (position != \'top\'){
        $(\'#group_\' + group).find(\'> table > tbody\')[append_type]($container);
    }

    // Create class object
    var locationFinder = new locationFinderClass();

    // Init plugin depending on "account address" option
    var $account_address = $(\'input[name="f[account_address_on_map]"]\');

    if (!$account_address.length
        || parseInt($account_address.filter(\':checked\').val()) == 0
    ){
        locationFinder.init(options);
    }

    $account_address.change(function(){
        if (parseInt($(this).val()) == 0){
            locationFinder.init(options);
        } else {
            locationFinder.destroy();
        }
    });
});

'; ?>

</script>
<script type="text/javascript" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
locationFinder/static/lib.js"></script>

<!-- location finder tpl end -->