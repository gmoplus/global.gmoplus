<?php /* Smarty version 2.6.31, created on 2025-08-20 18:10:51
         compiled from controllers/membership_plans.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/membership_plans.tpl', 5, false),array('modifier', 'cat', 'controllers/membership_plans.tpl', 20, false),array('modifier', 'count', 'controllers/membership_plans.tpl', 30, false),array('modifier', 'in_array', 'controllers/membership_plans.tpl', 79, false),)), $this); ?>
<!-- membership plans tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMembershipPlansNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_membership_plan']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['membership_plans_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/colorpicker/js/colorpicker.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add/edit new plan -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;plan=<?php echo $_GET['plan']; ?>
<?php endif; ?>" method="post">
    <input type="hidden" name="submit" value="1" />
    <?php if ($_GET['action'] == 'edit'): ?>
        <input type="hidden" name="fromPost" value="1" />
    <?php endif; ?>
    <table class="form">
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>
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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350" />
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['description']; ?>
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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <textarea rows="" cols="" name="description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['sPost']['description'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['enable_for']; ?>
</td>
            <td class="field">
                <fieldset class="light">
                    <legend id="legend_accounts_tab_area" class="up" onclick="fieldset_action('accounts_tab_area');"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</legend>
                    <div id="accounts_tab_area" style="padding: 0 10px 10px 10px;">
                        <table>
                        <tr>
                            <td>
                                <table>
                                <tr>
                                <?php $this->assign('ms_add_listing', false); ?>
                                <?php $_from = $this->_tpl_vars['membership_services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ms_services'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ms_services']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['service']):
        $this->_foreach['ms_services']['iteration']++;
?>
                                    <?php if ($this->_tpl_vars['sPost']['services'] && ((is_array($_tmp=$this->_tpl_vars['service']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['services']) : in_array($_tmp, $this->_tpl_vars['sPost']['services'])) && $this->_tpl_vars['service']['Key'] == 'add_listing'): ?>
                                        <?php $this->assign('ms_add_listing', true); ?>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ac_type'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ac_type']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a_type']):
        $this->_foreach['ac_type']['iteration']++;
?>
                                    <td<?php if ($this->_tpl_vars['ms_add_listing'] && ! isset ( $this->_tpl_vars['available_account_types'][$this->_tpl_vars['a_type']['ID']] )): ?> class="hide"<?php endif; ?>>
                                        <div style="margin: 0 20px 0 0;">
                                            <input <?php if ($this->_tpl_vars['sPost']['account_type'] && ((is_array($_tmp=$this->_tpl_vars['a_type']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['account_type']) : in_array($_tmp, $this->_tpl_vars['sPost']['account_type']))): ?>checked="checked"<?php endif; ?>
                                                   style="margin-bottom: 0px;"
                                                   type="checkbox"
                                                   id="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"
                                                   value="<?php echo $this->_tpl_vars['a_type']['Key']; ?>
"
                                                   name="account_type[]"
                                                   data-agent="<?php echo $this->_tpl_vars['a_type']['Agent']; ?>
"
                                            /> <label for="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"><?php echo $this->_tpl_vars['a_type']['name']; ?>
</label>
                                        </div>
                                    </td>

                                <?php if ($this->_foreach['ac_type']['iteration']%3 == 0 && ! ($this->_foreach['ac_type']['iteration'] == $this->_foreach['ac_type']['total'])): ?>
                                </tr>
                                <tr>
                                <?php endif; ?>

                                <?php endforeach; endif; unset($_from); ?>
                                </tr>
                                </table>
                            </td>
                            <td>
                                <span class="field_description"><?php echo $this->_tpl_vars['lang']['info_account_type_mplans']; ?>
</span>
                            </td>
                        </tr>
                        </table>

                        <div class="grey_area" style="margin: 8px 0 0;">
                            <span onclick="$('#accounts_tab_area input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                            <span class="divider"> | </span>
                            <span onclick="$('#accounts_tab_area input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                        </div>
                    </div>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['label_bg_color']; ?>
</td>
            <td class="field">
                <div style="padding: 0 0 5px 0;">
                    <input type="hidden" name="color" value="<?php echo $this->_tpl_vars['sPost']['color']; ?>
" />
                    <div id="colorSelector" class="colorSelector"><div style="background-color: #<?php if ($this->_tpl_vars['sPost']['color']): ?><?php echo $this->_tpl_vars['sPost']['color']; ?>
<?php else: ?>d8cfc4<?php endif; ?>"></div></div>
                </div>

                <script type="text/javascript">
                var bg_color = '<?php if ($this->_tpl_vars['sPost']['color']): ?><?php echo $this->_tpl_vars['sPost']['color']; ?>
<?php else: ?>d8cfc4<?php endif; ?>';
                <?php echo '

                $(document).ready(function(){

                    $(\'#colorSelector\').ColorPicker({
                        color: \'#\'+bg_color,
                        onShow: function (colpkr) {
                            $(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            $(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            $(\'#colorSelector div\').css(\'backgroundColor\', \'#\' + hex);
                            $(\'input[name=color]\').val(hex);
                        }
                    });

                });

                '; ?>

                </script>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['price']; ?>
</td>
            <td class="field">
                <input type="text" name="price" value="<?php echo $this->_tpl_vars['sPost']['price']; ?>
" class="numeric" style="width: 50px; text-align: center;" /> <span class="field_description_noicon">&nbsp;<?php echo $this->_tpl_vars['config']['system_currency']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['membership_plan_live_for']; ?>
</td>
            <td class="field">
                <input type="text" name="plan_period" value="<?php echo $this->_tpl_vars['sPost']['plan_period']; ?>
" class="numeric" style="width: 50px; text-align: center;" />
                <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['days']; ?>
</span>
                <span class="field_description"><?php echo $this->_tpl_vars['lang']['membership_plan_live_for_hint']; ?>
</span>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['limit_use_of_ms_plan']; ?>
</td>
            <td class="field">
                <input type="text" name="limit" value="<?php echo $this->_tpl_vars['sPost']['limit']; ?>
" class="numeric" style="width: 50px; text-align: center;" />
                <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['times']; ?>
</span>
                <span class="field_description"><?php echo $this->_tpl_vars['lang']['limit_use_of_ms_plan_hint']; ?>
</span>
            </td>
        </tr>
    </table>

    <div id="services_area">
        <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['membership_services']; ?>
</td>
                <td class="field">
                    <fieldset class="light">
                        <legend id="legend_services_settings" class="up" onclick="fieldset_action('services_settings');"><?php echo $this->_tpl_vars['lang']['settings']; ?>
</legend>
                        <div id="services_settings" style="padding: 0 10px 10px 10px;">
                            <table>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                            <?php $_from = $this->_tpl_vars['membership_services']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ms_services'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ms_services']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['service']):
        $this->_foreach['ms_services']['iteration']++;
?>
                                                <td>
                                                    <div style="padding: 4px 8px 4px 0;">
                                                         <label>
                                                             <input id="ms_<?php echo $this->_tpl_vars['service']['Key']; ?>
"
                                                                    <?php if ($this->_tpl_vars['sPost']['services'] && ((is_array($_tmp=$this->_tpl_vars['service']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['services']) : in_array($_tmp, $this->_tpl_vars['sPost']['services']))): ?>checked="checked"<?php endif; ?>
                                                                    style="margin-bottom: 0px;"
                                                                    type="checkbox"
                                                                    value="<?php echo $this->_tpl_vars['service']['ID']; ?>
"
                                                                    item-data="<?php echo $this->_tpl_vars['service']['Key']; ?>
"
                                                                    name="services[]"
                                                             /> <?php echo $this->_tpl_vars['service']['name']; ?>

                                                         </label>
                                                    </div>
                                                </td>

                                            <?php if ($this->_foreach['ms_services']['iteration']%1 == 0 && ! ($this->_foreach['ms_services']['iteration'] == $this->_foreach['ms_services']['total'])): ?>
                                            </tr>
                                            <tr>
                                            <?php endif; ?>

                                            <?php endforeach; endif; unset($_from); ?>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <div class="grey_area" style="margin: 8px 0 0;">
                                <span onclick="$('#services_settings input').prop('checked', true); checkAccountTypes(true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                <span class="divider"> | </span>
                                <span onclick="$('#services_settings input').prop('checked', false); checkAccountTypes(false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                            </div>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            <?php echo '
            $(document).ready(function(){
                listingAreaControl();
                agentHandler($(\'#ms_agency\').is(\':checked\'));

                $(\'#services_settings input[type="checkbox"]\').click(function() {
                    if ($(this).attr(\'item-data\') == \'add_listing\') {
                        checkAccountTypes($(this).is(\':checked\'));
                    }

                    if ($(this).attr(\'item-data\') === \'agency\') {
                        agentHandler($(this).is(\':checked\'));
                    }
                });
            });

            /**
             * Controller is activate/deactivate account types which cannot have ability to have subaccounts.
             * They already have enabled "Agent" option.
             *
             * @since 4.9.0
             *
             * @param isChecked
             */
            let agentHandler = function (isChecked) {
                let $accountTypes = $(\'[name="account_type[]"]\');

                if (isChecked) {
                    $accountTypes.each(function () {
                        if ($(this).data(\'agent\') === 1) {
                            $(this).prop(\'checked\', false).prop(\'disabled\', true).addClass(\'disabled\');
                        }
                    });
                } else {
                    $accountTypes.each(function () {
                        if ($(this).is(\':disabled\')) {
                            $(this).prop(\'checked\', false).prop(\'disabled\', false).removeClass(\'disabled\');
                        }
                    });
                }
            }

            var checkAccountTypes = function(is_checked) {
                if (is_checked) {
                    $.getJSON(rlConfig[\'ajax_url\'], {item: \'checkAccountTypes\'}, function(response){
                        if (response) {
                            if (response.count > 0) {
                                var not_allowed = \'\';
                                $(\'#accounts_tab_area input[type="checkbox"]\').each(function() {
                                    var allowed = false;
                                    for (var i = 0; i < response.data.length; i++) {
                                        if ($(this).val() == response.data[i][\'Key\']) {
                                            allowed = true;
                                        }
                                    }
                                    if (allowed) {
                                        $(this).parent().parent().removeClass(\'hide\');
                                    } else {
                                        if ($(this).is(\':checked\')) {
                                            not_allowed = not_allowed ? \', \' + $(this).next(\'label\').text() : $(this).next(\'label\').text();
                                        }
                                        $(this).prop(\'checked\', false);
                                        $(this).parent().parent().addClass(\'hide\');
                                    }
                                });
                                if (not_allowed) {
                                    not_allowed_message = \''; ?>
<?php echo $this->_tpl_vars['lang']['account_type_not_allow_add_listing']; ?>
<?php echo '\';
                                    printMessage(\'alert\', not_allowed_message.replace(\'{type}\', not_allowed));
                                }
                            } else {
                                $(\'#ms_add_listing\').prop(\'checked\', false);
                                printMessage(\'error\', response.message);

                            }
                            listingAreaControl();
                        }
                    });
                } else {
                    $(\'#accounts_tab_area input[type="checkbox"]\').each(function() {
                        $(this).parent().parent().removeClass(\'hide\');
                    });
                    listingAreaControl();
                }
            }

            var listingAreaControl = function() {
                if ($(\'#ms_add_listing\').is(\':checked\')) {
                    $(\'#listings_area\').removeClass(\'hide\');
                } else {
                    $(\'#listings_area\').addClass(\'hide\');
                }
            }
            '; ?>

        </script>
    </div>

    <div id="listings_area">
        <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listing_number']; ?>
</td>
                <td class="field">
                    <div id="listing_number_area">
                        <input type="text" name="listing_number" value="<?php echo $this->_tpl_vars['sPost']['listing_number']; ?>
" class="numeric" style="width: 50px; text-align: center;" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['featured_option_advanced_hint']; ?>
</span>
                        &nbsp;<a id="featured_advanced_switcher" href="javascript:void(0)" class="static hide"><?php echo $this->_tpl_vars['lang']['advanced_mode']; ?>
</a>
                        <input type="hidden" name="advanced_mode" value="<?php if ($this->_tpl_vars['sPost']['advanced_mode']): ?><?php echo $this->_tpl_vars['sPost']['advanced_mode']; ?>
<?php else: ?>0<?php endif; ?>" />
                    </div>
                </td>
            </tr>
        </table>

        <div id="featured_advanced_area" class="hide">
            <table class="form">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['featured_type_standard']; ?>
 <span class="red">*</span></td>
                    <td class="field">
                        <input type="text" name="standard_listings" value="<?php echo $this->_tpl_vars['sPost']['standard_listings']; ?>
" class="numeric margin" style="width: 50px; text-align: center;" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['featured_option_advanced_hint']; ?>
</span>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['featured_type_featured']; ?>
 <span class="red">*</span></td>
                    <td class="field">
                        <input type="text" name="featured_listings" value="<?php echo $this->_tpl_vars['sPost']['featured_listings']; ?>
" class="numeric margin" style="width: 50px; text-align: center;" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['featured_option_advanced_hint']; ?>
</span>
                    </td>
                </tr>
            </table>
        </div>
        <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listing_options']; ?>
</td>
                <td class="field">
                    <fieldset class="light" style="margin-top: 5px;">
                        <legend id="legend_listing_settings" class="up" onclick="fieldset_action('listing_settings');"><?php echo $this->_tpl_vars['lang']['options_per_listing']; ?>
</legend>
                        <div id="listing_settings" style="padding: 2px 10px 5px;">
                            <table class="form wide">
                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['featured_option']; ?>
</td>
                                    <td class="field">
                                        <div id="featured_settings">
                                            <?php $this->assign('checkbox_field', 'featured_listing'); ?>

                                            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                                                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                                            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                                                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                            <?php else: ?>
                                                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                            <?php endif; ?>

                                            <input <?php echo $this->_tpl_vars['featured_listing_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                            <input <?php echo $this->_tpl_vars['featured_listing_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                                        </div>

                                        <script type="text/javascript">
                                        var plans_featured_advanced = <?php if ($this->_tpl_vars['sPost']['advanced_mode']): ?>true<?php else: ?>false<?php endif; ?>;
                                        var phrase_set_unlimited = "<?php echo $this->_tpl_vars['lang']['set_unlimited']; ?>
";
                                        var phrase_unset_unlimited = "<?php echo $this->_tpl_vars['lang']['unset_unlimited']; ?>
";

                                        <?php echo '

                                        $(document).ready(function(){
                                            plans_handler();
                                            featuredAdvancedNav();
                                            featuredAdvancedSwitcher();
                                            featuredAdvancedCounter();
                                        });

                                        var plans_handler = function(){
                                            $(\'input[name=featured_listing]\').click(function(){
                                                featuredAdvancedNav();
                                            });

                                            $(\'#featured_advanced_switcher\').click(function(){
                                                featuredAdvancedArea();
                                            });

                                            $(\'#featured_advanced_area input\').keyup(function(){
                                                featuredAdvancedCounter();
                                            });
                                        }

                                        var featuredAdvancedNav = function(){
                                            var option = parseInt($(\'input[name=featured_listing]:checked\').val());

                                            if (option) {
                                                $(\'#featured_advanced_switcher\').fadeIn(\'normal\');
                                                featuredAdvancedSwitcher(\'show\');
                                            } else {
                                                $(\'#featured_advanced_switcher\').fadeOut(\'normal\')
                                                featuredAdvancedSwitcher(\'hide\');
                                            }

                                            $(\'#using_limit\').slideUp(\'normal\');
                                            $(\'#plan_live, #not_featured, #featured_area\').slideDown(\'normal\');
                                        };

                                        var featuredAdvancedArea = function() {
                                            if ( plans_featured_advanced )
                                            {
                                                $(\'#featured_advanced_switcher\').css(\'font-weight\', \'normal\');
                                                plans_featured_advanced = false;
                                                $(\'input[name=advanced_mode]\').val(0);
                                                $(\'#featured_advanced_area\').slideUp(\'normal\');
                                                $(\'input[name=listing_number]\').attr(\'readonly\', false).parent().attr(\'class\', \'input\');
                                            }
                                            else
                                            {
                                                $(\'#featured_advanced_switcher\').css(\'font-weight\', \'bold\');
                                                plans_featured_advanced = true;
                                                $(\'input[name=advanced_mode]\').val(1);
                                                $(\'#featured_advanced_area\').slideDown(\'normal\');
                                                $(\'input[name=listing_number]\').attr(\'readonly\', true).parent().attr(\'class\', \'input_disabled\');
                                            }
                                        };

                                        var featuredAdvancedSwitcher = function(mode) {
                                            if ( mode == \'hide\' && plans_featured_advanced )
                                            {
                                                $(\'#featured_advanced_switcher\').css(\'font-weight\', \'normal\');
                                                $(\'#featured_advanced_area\').slideUp(\'normal\');
                                                $(\'input[name=listing_number]\').attr(\'readonly\', false).parent().attr(\'class\', \'input\');
                                            }
                                            else if ( mode == \'show\' && plans_featured_advanced )
                                            {
                                                $(\'#featured_advanced_switcher\').css(\'font-weight\', \'bold\');
                                                $(\'#featured_advanced_area\').slideDown(\'normal\');
                                                $(\'input[name=listing_number]\').attr(\'readonly\', true).parent().attr(\'class\', \'input_disabled\');

                                                featuredAdvancedCounter();
                                            }
                                        };

                                        var featuredAdvancedCounter = function() {
                                            if ( plans_featured_advanced )
                                            {
                                                var standard = $(\'#featured_advanced_area input[name=standard_listings]\').val();
                                                var featured = $(\'#featured_advanced_area input[name=featured_listings]\').val();

                                                standard = standard != \'\' ? parseInt(standard) : 0;
                                                featured = featured != \'\' ? parseInt(featured) : 0;

                                                var total = standard + featured;
                                                $(\'input[name=listing_number]\').val(total);
                                            }
                                        }

                                        '; ?>

                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['images_number']; ?>
</td>
                                    <td class="field">
                                        <table class="infinity">
                                        <tr>
                                            <td><input accesskey="<?php echo $this->_tpl_vars['sPost']['images']; ?>
" type="text" name="images" value="<?php echo $this->_tpl_vars['sPost']['images']; ?>
" class="numeric" style="width: 50px; text-align: center;" /></td>
                                            <td>
                                                <span title="<?php if ($this->_tpl_vars['sPost']['images_unlimited']): ?><?php echo $this->_tpl_vars['lang']['unset_unlimited']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['set_unlimited']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['sPost']['images_unlimited']): ?>active<?php else: ?>inactive<?php endif; ?>"></span>
                                                <input name="images_unlimited" type="hidden" value="<?php if ($this->_tpl_vars['sPost']['images_unlimited']): ?>1<?php else: ?>0<?php endif; ?>" />
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['number_of_videos']; ?>
</td>
                                    <td class="field">
                                        <table class="infinity">
                                        <tr>
                                            <td><input accesskey="<?php echo $this->_tpl_vars['sPost']['video']; ?>
" type="text" name="video" value="<?php echo $this->_tpl_vars['sPost']['video']; ?>
" class="numeric" style="width: 50px; text-align: center;" /></td>
                                            <td>
                                                <span title="<?php if ($this->_tpl_vars['sPost']['video_unlimited']): ?><?php echo $this->_tpl_vars['lang']['unset_unlimited']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['set_unlimited']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['sPost']['video_unlimited']): ?>active<?php else: ?>inactive<?php endif; ?>"></span>
                                                <input name="video_unlimited" type="hidden" value="<?php if ($this->_tpl_vars['sPost']['video_unlimited']): ?>1<?php else: ?>0<?php endif; ?>" />
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['cross_listing']; ?>
</td>
                                    <td>
                                        <input type="text" name="cross" value="<?php echo $this->_tpl_vars['sPost']['cross']; ?>
" class="numeric" style="width: 50px; text-align: center;" />
                                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['cross_listing_hint']; ?>
</span>

                                        <?php if ($_GET['action'] == 'edit'): ?>
                                        <script type="text/javascript">
                                        var current_cross_value = <?php if ($this->_tpl_vars['plan_info']['Cross']): ?><?php echo $this->_tpl_vars['plan_info']['Cross']; ?>
<?php else: ?>false<?php endif; ?>;
                                        var remove_cross_value_notice = "<?php echo $this->_tpl_vars['lang']['remove_plan_crossed_option_notice']; ?>
";
                                        <?php echo '

                                        $(document).ready(function(){
                                            if ( !current_cross_value )
                                                return;

                                            $(\'input[name=cross]\').keyup(function(){
                                                if (parseInt($(this).val()) == 0 && current_cross_value) {
                                                    rlConfirm(remove_cross_value_notice, function(){}, false, false, false, \'crossedValueHandler\');
                                                }
                                            });
                                        });

                                        var crossedValueHandler = function(){
                                            $(\'input[name=cross]\').val(current_cross_value);
                                        }

                                        '; ?>

                                        </script>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>

    <!-- subscription options -->
    <div id="subscription_area">
        <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['subscription_box']; ?>
</td>
                <td class="field">
                    <fieldset class="light" style="margin-top: 5px;">
                        <legend id="legend_subscription_settings" class="up" onclick="fieldset_action('subscription_settings');"><?php echo $this->_tpl_vars['lang']['settings']; ?>
</legend>
                        <div id="subscription_settings" style="padding: 2px 10px 5px;">
                            <table class="form wide">
                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['subscription_enable']; ?>
</td>
                                    <td class="field">
                                        <?php $this->assign('checkbox_field', 'subscription'); ?>

                                        <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                                            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                                        <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                                            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                        <?php else: ?>
                                            <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                        <?php endif; ?>

                                        <input <?php echo $this->_tpl_vars['subscription_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" class="subscription-status" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                        <input <?php echo $this->_tpl_vars['subscription_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" class="subscription-status" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

                                        <div class="clearfix hide" id="subscribers_area" style="padding: 15px 0;"></div>
                                    </td>
                                </tr>
                            </table>
                            <table id="subscription_settings_list" class="form wide<?php if (! $this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']]): ?> hide<?php endif; ?>">
                                <tr>
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['subscription_period']; ?>
</td>
                                    <td class="field">
                                        <select name="period" id="subscription_period">
                                            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                            <?php $_from = $this->_tpl_vars['subscription_periods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['period']):
?>
                                                <option value="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['sPost']['period'] == $this->_tpl_vars['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['period']; ?>
</option>
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="subscription_period_total">
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['subscription_period_total']; ?>
</td>
                                    <td class="field">
                                        <select name="period_total" id="period_total">
                                            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                        </select>
                                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['subscription_period_total_hint']; ?>
</span>
                                        <script type="text/javascript">
                                            var subscription_period = $('#subscription_period option:selected').val();
                                            var period_total = '<?php echo $this->_tpl_vars['sPost']['period_total']; ?>
';
                                            <?php echo '

                                            var getListIterationsByPeriod = function(period) {
                                                var list = new Array();

                                                if (!period) {
                                                    return list;
                                                }

                                                switch(period) {
                                                    case \'day\' :
                                                        list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
                                                        break;

                                                    case \'week\' :
                                                        list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
                                                        break;

                                                    case \'month\' :
                                                        list = [1, 3, 6, 12, 18, 24];
                                                        break;

                                                    case \'year\' :
                                                        list = [1, 2, 3, 4, 5];
                                                        break;
                                                }

                                                $(\'#period_total\').empty();
                                                $(\'#period_total\').append($(\'<option value="">'; ?>
<?php echo $this->_tpl_vars['lang']['select']; ?>
<?php echo '</option>\'));
                                                for (var i = 0; i < list.length; i++) {
                                                    if (list[i] == period_total) {
                                                        $(\'#period_total\').append($(\'<option value="\'+list[i]+\'" selected="selected">\'+list[i]+\'</option>\'));
                                                    } else {
                                                        $(\'#period_total\').append($(\'<option value="\'+list[i]+\'">\'+list[i]+\'</option>\'));
                                                    }
                                                }
                                            }

                                            if (subscription_period) {
                                                getListIterationsByPeriod(subscription_period);
                                            }

                                            $(document).ready(function(){
                                                $(\'#subscription_period\').change(function() {
                                                    getListIterationsByPeriod($(this).val());
                                                });
                                            });
                                            '; ?>

                                        </script>
                                    </td>
                                </tr>
                                <?php $_from = $this->_tpl_vars['subscription_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
                                    <?php if ($this->_tpl_vars['option']['Type'] == 'text'): ?>
                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['option']['name']; ?>
</td>
                                            <td class="field">
                                                <input type="text" name="sop[<?php echo $this->_tpl_vars['option']['Key']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['sop'][$this->_tpl_vars['option']['Key']]; ?>
" />
                                            </td>
                                        </tr>
                                    <?php elseif ($this->_tpl_vars['option']['Type'] == 'numeric'): ?>
                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['option']['name']; ?>
</td>
                                            <td class="field">
                                                <input type="text" name="sop[<?php echo $this->_tpl_vars['option']['Key']; ?>
]" class="numeric" value="<?php echo $this->_tpl_vars['sPost']['sop'][$this->_tpl_vars['option']['Key']]; ?>
" style="width: 50px; text-align: center;" />
                                            </td>
                                        </tr>
                                    <?php elseif ($this->_tpl_vars['option']['Type'] == 'bool'): ?>
                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['option']['name']; ?>
</td>
                                            <td class="field">
                                                <?php $this->assign('checkbox_field', $this->_tpl_vars['option']['Key']); ?>

                                                <?php if ($this->_tpl_vars['sPost']['sop'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                                                <?php elseif ($this->_tpl_vars['sPost']['sop'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                                                <?php else: ?>
                                                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                                                <?php endif; ?>

                                                <input <?php echo $this->_tpl_vars['subscription_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="sop[<?php echo $this->_tpl_vars['checkbox_field']; ?>
]" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                                                <input <?php echo $this->_tpl_vars['subscription_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="sop[<?php echo $this->_tpl_vars['checkbox_field']; ?>
]" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                                            </td>
                                        </tr>
                                    <?php elseif ($this->_tpl_vars['option']['Type'] == 'select'): ?>
                                        <tr>
                                            <td class="name"><?php echo $this->_tpl_vars['option']['name']; ?>
</td>
                                            <td class="field">
                                                <select name="sop[<?php echo $this->_tpl_vars['option']['Key']; ?>
]">
                                                    <?php $_from = $this->_tpl_vars['option']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ovalue']):
?>
                                                        <option value="<?php echo $this->_tpl_vars['ovalue']['key']; ?>
" <?php if ($this->_tpl_vars['sPost']['sop'][$this->_tpl_vars['option']['Key']] == $this->_tpl_vars['ovalue']['key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['ovalue']['name']; ?>
</option>
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                            </table>
                        </div>
                    </fieldset>
                    <script type="text/javascript">
                        <?php echo '
                        $(document).ready(function(){
                            $(\'input.subscription-status\').change(function() {
                                if ($(this).val() == 0 && $(this).is(\':checked\')) {
                                    $(\'#subscription_settings_list\').addClass(\'hide\');
                                    '; ?>
<?php if ($_GET['action'] == 'edit' && $_POST['subscription']): ?><?php echo '
                                    $(\'#subscription_no\').next().after(\'<img src="'; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/loader.gif" />\');
                                    flynax.getSubscribersByPlan(\''; ?>
<?php echo $this->_tpl_vars['plan_info']['ID']; ?>
<?php echo '\', \'membership\');
                                    '; ?>
<?php endif; ?><?php echo '
                                } else {
                                    $(\'#subscription_settings_list\').removeClass(\'hide\');
                                }
                            });
                        });
                        '; ?>

                    </script>
                </td>
            </tr>
        </table>
    </div>
    <!-- subscription options end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMembershipPlansForm'), $this);?>


    <table class="form">
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
    </table>

    <table class="form">
        <tr>
            <td class="no_divider"></td>
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
    <!-- add/edit new plan end -->

<?php else: ?>

    <!-- delete plan block -->
    <div id="delete_block" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['delete_plan'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div id="delete_container">
                <?php echo $this->_tpl_vars['lang']['detecting']; ?>

            </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <script type="text/javascript">//<![CDATA[
        <?php if ($this->_tpl_vars['config']['trash']): ?>
            var delete_confirm_phrase = "<?php echo $this->_tpl_vars['lang']['notice_dro_membershipp_plan']; ?>
";
        <?php else: ?>
            var delete_confirm_phrase = "<?php echo $this->_tpl_vars['lang']['notice_delete_membership_plan']; ?>
";
        <?php endif; ?>

        <?php echo '

        function delete_chooser(method, key, username)
        {
            if (method == \'delete\')
            {
                rlPrompt(delete_confirm_phrase.replace(\'{username}\', username), \'xajax_deletePlan\', key);
            }
            else if (method == \'replace\')
            {
                $(\'#top_buttons\').slideUp(\'slow\');
                $(\'#bottom_buttons\').slideDown(\'slow\');
                $(\'#replace_content\').slideDown(\'slow\');
            }
        }

        '; ?>

        //]]>
        </script>
    </div>
    <!-- delete plan block end -->

    <!-- listing plans grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var MembershipPlansGrid;

    <?php echo '
    $(document).ready(function(){

        MembershipPlansGrid = new gridObj({
            key: \'MembershipPlans\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/membership_plans.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_membership_plans_manager\'],
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'Key\', mapping: \'Key\', type: \'string\'},
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Price\', mapping: \'Price\', type: \'float\'},
                {name: \'Plan_period\', mapping: \'Plan_period\', type: \'int\'},
                {name: \'Image\', mapping: \'Image\'},
                {name: \'Image_unlim\', mapping: \'Image_unlim\'},
                {name: \'Cross\', mapping: \'Cross\'},
                {name: \'Video\', mapping: \'Video\'},
                {name: \'Video_unlim\', mapping: \'Video_unlim\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Subscription\', mapping: \'Subscription\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 17,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_price\']+\' (\'+rlCurrency+\')\',
                    dataIndex: \'Price\',
                    width: 7,
                    css: \'font-weight: bold;\',
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: true
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['plan_live_for']; ?>
 (<?php echo $this->_tpl_vars['lang']['days']; ?>
)<?php echo '\',
                    dataIndex: \'Plan_period\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val, obj, row){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['images_number']; ?>
<?php echo '\',
                    dataIndex: \'Image\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val, obj, row){
                        val = row.data.Image_unlim == \'1\' && row.data.Image == 0  ? \''; ?>
<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
<?php echo '\' : val;
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: \''; ?>
<?php echo $this->_tpl_vars['lang']['number_of_videos']; ?>
<?php echo '\',
                    dataIndex: \'Video\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val, obj, row){
                        val = row.data.Video_unlim == \'1\' && row.data.Video == 0 ? \''; ?>
<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
<?php echo '\' : val;
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 6,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_subscription\'],
                    dataIndex: \'Subscription\',
                    width: 6,
                    renderer: function(val) {
                        return \'<span>\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 100,
                    fixed: true,
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
                    width: 70,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data, ext, row) {
                        var out = "<center>";

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&plan="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }

                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'xajax_prepareDeleting("+row.data.ID+")\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMembershipPlansGrid'), $this);?>
<?php echo '

        MembershipPlansGrid.init();
        grid.push(MembershipPlansGrid.grid);

    });
    '; ?>

    //]]>
    </script>
    <!-- listing plans grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMembershipPlansBottom'), $this);?>


<?php endif; ?>
<!-- listing plans tpl end -->