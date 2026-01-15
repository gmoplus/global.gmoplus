<?php /* Smarty version 2.6.31, created on 2025-09-11 20:22:53
         compiled from controllers/listing_types.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/listing_types.tpl', 5, false),array('modifier', 'cat', 'controllers/listing_types.tpl', 19, false),array('modifier', 'count', 'controllers/listing_types.tpl', 38, false),array('modifier', 'regex_replace', 'controllers/listing_types.tpl', 116, false),array('modifier', 'replace', 'controllers/listing_types.tpl', 221, false),array('modifier', 'explode', 'controllers/listing_types.tpl', 865, false),)), $this); ?>
<!-- listing types tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesNavBar'), $this);?>


    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_type']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['types_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add/edit type -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;key=<?php echo $_GET['key']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="submit" value="1" />
    <?php if ($_GET['action'] == 'edit'): ?>
        <input type="hidden" name="fromPost" value="1" />
    <?php endif; ?>
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
        <td class="name">
            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['name']; ?>

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
" class="w250" maxlength="50" /> <span class="field_description_noicon">
                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                    </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <?php if ($this->_tpl_vars['tpl_settings']['listing_type_color']): ?>
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/colorpicker/js/colorpicker.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['color']; ?>
</td>
        <td class="field">
            <?php $this->assign('default_color', 'cccccc'); ?>

            <div style="padding: 0 0 5px 0;">
                <input type="hidden" name="color" value="<?php echo $this->_tpl_vars['sPost']['color']; ?>
" />
                <div id="default_color" class="colorSelector">
                    <div style="background-color: #<?php if ($this->_tpl_vars['sPost']['color']): ?><?php echo $this->_tpl_vars['sPost']['color']; ?>
<?php else: ?><?php echo $this->_tpl_vars['default_color']; ?>
<?php endif; ?>"></div>
                </div>
            </div>

            <script type="text/javascript">
            <?php echo '

            $(function(){
                var $defaultColor = $(\'#default_color\');

                $defaultColor.ColorPicker({
                    color: \''; ?>
#<?php if ($this->_tpl_vars['sPost']['color']): ?><?php echo $this->_tpl_vars['sPost']['color']; ?>
<?php else: ?><?php echo $this->_tpl_vars['default_color']; ?>
<?php endif; ?><?php echo '\',
                    onChange: function (hsb, hex, rgb) {
                        $defaultColor.find(\'> *\').css(\'backgroundColor\', \'#\' + hex);
                        $(\'input[name=color]\').val(hex);
                    }
                });
            });

            '; ?>

            </script>
        </td>
    </tr>
    <?php endif; ?>
    </table>

    <div class="individual_add_listing_page">
        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['individual_add_listing_page']; ?>
</td>
            <td class="field">
                <?php $this->assign('checkbox_field', 'add_page'); ?>

                <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                <?php endif; ?>

                <table>
                <tr>
                    <td>
                        <input <?php echo $this->_tpl_vars['add_page_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <input <?php echo $this->_tpl_vars['add_page_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                    <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']]): ?>
                        <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=pages&amp;action=edit&amp;page=al_') : smarty_modifier_cat($_tmp, 'index.php?controller=pages&amp;action=edit&amp;page=al_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                        <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['add_listing_page_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                    <?php endif; ?>
                </tr>
                </table>
            </td>
        </tr>
        </table>
    </div>

    <table class="form">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['apply_pictures']; ?>
</td>
        <td class="field">
            <?php $this->assign('checkbox_field', 'photo'); ?>

            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php endif; ?>

            <input <?php echo $this->_tpl_vars['photo_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <input <?php echo $this->_tpl_vars['photo_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

            <span>
                <label><input type="checkbox" name="photo_required" value="1" <?php if ($this->_tpl_vars['sPost']['photo_required']): ?>checked="checked"<?php endif; ?>/> <?php echo $this->_tpl_vars['lang']['required_field']; ?>
</label>
            </span>

            <script>
            <?php echo '

            $(document).ready(function(){
                $(\'input[name="photo"]\').change(function(){
                    photoRequiredHandler();
                });

                photoRequiredHandler();
            });

            var photoRequiredHandler = function(){
                if ($(\'input[name="photo"]:checked\').val() == "1") {
                    $(\'input[name="photo_required"]\').closest(\'span\').fadeIn();
                } else {
                    $(\'input[name="photo_required"]\').closest(\'span\').fadeOut(\'fast\');
                }
            }

            '; ?>

            </script>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['apply_video']; ?>
</td>
        <td class="field">
            <?php $this->assign('checkbox_field', 'video'); ?>

            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php endif; ?>

            <input <?php echo $this->_tpl_vars['video_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <input <?php echo $this->_tpl_vars['video_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </td>
    </tr>

    <tr class="admin_only_row">
        <td class="name"><?php echo $this->_tpl_vars['lang']['admin_only']; ?>
</td>
        <td class="field">
            <?php $this->assign('checkbox_field', 'admin'); ?>

            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php endif; ?>

            <table>
            <tr>
                <td>
                    <input <?php echo $this->_tpl_vars['admin_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['admin_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
                <?php if ($_GET['action'] == 'edit' && ! $this->_tpl_vars['sPost']['admin']): ?>
                    <?php if ($this->_tpl_vars['config']['one_my_listings_page']): ?>
                        <?php $this->assign('myPageKey', 'my_all_ads'); ?>
                        <?php $this->assign('myPageName', $this->_tpl_vars['lang']['listings']); ?>
                    <?php else: ?>
                        <?php $this->assign('myPageKey', ((is_array($_tmp='my_')) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key']))); ?>
                        <?php $this->assign('myPageName', $this->_tpl_vars['sPost']['name'][(defined('RL_LANG_CODE') ? @RL_LANG_CODE : null)]); ?>
                    <?php endif; ?>

                    <?php $this->assign('replace_ind', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=pages&action=edit&page=') : smarty_modifier_cat($_tmp, 'index.php?controller=pages&action=edit&page=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['myPageKey']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['myPageKey'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                    <?php $this->assign('replace_type', ('{')."type".('}')); ?>
                    <td>
                        <span class="field_description">
                            <span class="my-ads-common">
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['my_listings_page_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace_ind']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace_ind'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_type'], $this->_tpl_vars['myPageName']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_type'], $this->_tpl_vars['myPageName'])); ?>

                            </span>
                        </span>
                    </td>

                    <script><?php echo '
                    $(function() {
                        $(\'input[name="admin"]\').change(function(){
                            adminOnlyHandler();
                        });

                        adminOnlyHandler();
                    });

                    var adminOnlyHandler = function() {
                        if ($(\'input[name="admin"]:checked\').val() === \'1\') {
                            $(\'.individual_add_listing_page\').slideUp();
                            $(\'.admin_only_row .field_description\').hide();
                        } else {
                            $(\'.individual_add_listing_page\').slideDown();
                            $(\'.admin_only_row .field_description\').show();
                        }
                    }
                    '; ?>
</script>
                <?php endif; ?>
            </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['show_cents']; ?>
</td>
        <td class="field">
            <?php $this->assign('radio_field', 'show_cents'); ?>

            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['radio_field']] == '1'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['radio_field']] == '0'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php endif; ?>

            <input <?php echo $this->_tpl_vars['show_cents_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['radio_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['radio_field']; ?>
" value="1" />
            <label for="<?php echo $this->_tpl_vars['radio_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <input <?php echo $this->_tpl_vars['show_cents_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['radio_field']; ?>
_no" name="<?php echo $this->_tpl_vars['radio_field']; ?>
" value="0" />
            <label for="<?php echo $this->_tpl_vars['radio_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['show_in_stat_block']; ?>
</td>
        <td class="field">
            <?php $this->assign('radio_field', 'statistics'); ?>

            <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['radio_field']] == '1'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['radio_field']] == '0'): ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['radio_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
            <?php endif; ?>

            <input <?php echo $this->_tpl_vars['statistics_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['radio_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['radio_field']; ?>
" value="1" />
            <label for="<?php echo $this->_tpl_vars['radio_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <input <?php echo $this->_tpl_vars['statistics_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['radio_field']; ?>
_no" name="<?php echo $this->_tpl_vars['radio_field']; ?>
" value="0" />
            <label for="<?php echo $this->_tpl_vars['radio_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </td>
    </tr>

    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['links_type']; ?>
</td>
        <td class="field">
            <table>
            <tr>
                <td>
                    <select name="links_type">
                        <option value="full" <?php if ($this->_tpl_vars['sPost']['links_type'] == 'full' || ! $this->_tpl_vars['sPost']['links_type']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['lt_links_full']; ?>
</option>
                        <option value="short" <?php if ($this->_tpl_vars['sPost']['links_type'] == 'short'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['lt_links_short']; ?>
</option>
                        <option value="subdomain" <?php if ($this->_tpl_vars['sPost']['links_type'] == 'subdomain'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['lt_links_subdomain']; ?>
</option>
                    </select>
                </td>
                <td>
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['lt_links_subdomain_hint']; ?>
</span>
                </td>
            </tr>
            </table>

            <script><?php echo '
            $(document).ready(function(){
                $(\'select[name="links_type"]\').change(function(){
                    linksTypeHandler();
                });

                linksTypeHandler();
            });

            var linksTypeHandler = function(){
                if ($(\'select[name="links_type"] option:selected\').val() == \'subdomain\') {
                    $(\'select[name="links_type"]\').closest(\'tr\').find(\'span.field_description\').fadeIn();
                } else {
                    $(\'select[name="links_type"]\').closest(\'tr\').find(\'span.field_description\').fadeOut(\'fast\');
                }
            }
            '; ?>
</script>
        </td>
    </tr>

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

    <?php if ($this->_tpl_vars['tpl_settings']['category_menu_listing_type'] || $this->_tpl_vars['tpl_settings']['listing_type_form_icon']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/icon_manager.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesForm'), $this);?>


    </table>

    <div class="individual_page_item">
        <div id="cat_settings">
            <table class="form" style="margin-top: 5px;">
            <tr>
                <td class="divider" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['category_settings']; ?>
</div></td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['general_category']; ?>
</td>
                <td class="field">
                    <select name="general_cat" <?php if ($_GET['action'] == 'add'): ?>disabled="disabled" class="disabled"<?php endif; ?>>
                        <option <?php if ($this->_tpl_vars['sPost']['general_cat']): ?>value="<?php echo $this->_tpl_vars['sPost']['general_cat']; ?>
" selected="selected"<?php else: ?>value=""<?php endif; ?>><?php if ($_GET['action'] == 'add'): ?><?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['select_category']; ?>
<?php endif; ?></option>
                    </select>
                    <span class="field_description" id="build_general_cat_hint">
                        <?php if ($_GET['action'] == 'add'): ?>
                            <?php echo $this->_tpl_vars['lang']['general_category_hint']; ?>

                        <?php else: ?>
                            <?php $this->assign('replace', '<a target="_blank" class="static" href="javascript:void(0)">$1</a>'); ?>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['general_category_manage_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>

                        <?php endif; ?>
                    </span>

                    <?php if ($_GET['action'] == 'edit'): ?>
                        <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
                        <script>
                        var category_selected = <?php if ($this->_tpl_vars['sPost']['general_cat']): ?><?php echo $this->_tpl_vars['sPost']['general_cat']; ?>
<?php else: ?>null<?php endif; ?>;
                        var general_cat_href = '<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=categories&action=build&form=submit_form&id=[id]';

                        <?php echo '

                        $(document).ready(function(){
                            $(\'select[name=general_cat]\').categoryDropdown({
                                listingTypeKey: \''; ?>
<?php echo $this->_tpl_vars['sPost']['key']; ?>
<?php echo '\',
                                default_selection: category_selected,
                                onChange: generalCatHandler,
                                phrases: { '; ?>

                                    no_categories_available: "<?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
",
                                    select: "<?php echo $this->_tpl_vars['lang']['select']; ?>
",
                                    select_category: "<?php echo $this->_tpl_vars['lang']['select_category']; ?>
"
                                <?php echo ' }
                            });
                            generalCatHandler();
                        });

                        function generalCatHandler(general_cat_id, parent_id) {
                            general_cat_id = general_cat_id ? general_cat_id : parent_id;

                            if (general_cat_id) {
                                $(\'#build_general_cat_hint a\').attr(\'href\', general_cat_href.replace(\'[id]\', general_cat_id));
                                $(\'#build_general_cat_hint\').fadeIn();
                            } else {
                                $(\'#build_general_cat_hint\').fadeOut(\'fast\');
                            }
                        }
                        '; ?>

                        </script>
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['hide_empty_cats']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'cat_hide_empty'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <input <?php echo $this->_tpl_vars['cat_hide_empty_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['cat_hide_empty_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['display_postfix']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'html_postfix'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <input <?php echo $this->_tpl_vars['html_postfix_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['html_postfix_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['category_order']; ?>
</td>
                <td class="field">
                    <select name="category_order">
                        <?php $_from = $this->_tpl_vars['category_order_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat_order_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['cat_order_type']['key']; ?>
" <?php if ($this->_tpl_vars['cat_order_type']['key'] == $this->_tpl_vars['sPost']['category_order']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cat_order_type']['name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['allow_subcategories']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'allow_subcategories'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <input <?php echo $this->_tpl_vars['allow_subcategories_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <input <?php echo $this->_tpl_vars['allow_subcategories_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['category_block_on_page']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'category_block_on_page'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['category_block_on_page_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['category_block_on_page_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>

                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['category_block_on_page']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=blocks&action=edit&block=ltcategories_') : smarty_modifier_cat($_tmp, 'index.php?controller=blocks&action=edit&block=ltcategories_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['featured_blocks_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesFormCategory'), $this);?>


            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['additional_cat_block']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'additional_cat_block'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['additional_cat_block_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['additional_cat_block_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>

                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['additional_cat_block']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=blocks&action=edit&block=ltcb_') : smarty_modifier_cat($_tmp, 'index.php?controller=blocks&action=edit&block=ltcb_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['featured_blocks_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesFormCategoryAddBlock'), $this);?>

            </table>
        </div>

        <div id="search_settings">
            <table class="form" style="margin-top: 5px;">
            <tr>
                <td class="divider" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['search_settings']; ?>
</div></td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['search_form']; ?>
</td>
                <td valign="top" class="field">
                    <?php $this->assign('checkbox_field', 'search_form'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['search_form_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['search_form_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>
                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['search_form']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=search_forms&action=build&form=') : smarty_modifier_cat($_tmp, 'index.php?controller=search_forms&action=build&form=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_quick">$1</a>') : smarty_modifier_cat($_tmp, '_quick">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>

                    <div style="padding: 10px 0 4px 1px;"><label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_home']): ?>checked="checked"<?php endif; ?> name="search_home" value="1" /> <?php echo $this->_tpl_vars['lang']['search_form_on_home']; ?>
</label></div>
                    <div style="padding: 6px 0 4px 1px;"><label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_page']): ?>checked="checked"<?php endif; ?> name="search_page" value="1" /> <?php echo $this->_tpl_vars['lang']['search_form_on_search']; ?>
</label></div>

                    <div style="padding: 6px 0 4px 1px;">
                        <?php $this->assign('type_page_key', ((is_array($_tmp='pages+name+lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sPost']['key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sPost']['key']))); ?>
                        <?php $this->assign('type_replace', ('{')."listing_type".('}')); ?>

                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['key'] && $this->_tpl_vars['lang'][$this->_tpl_vars['type_page_key']]): ?>
                            <?php $this->assign('type_page_key', $this->_tpl_vars['lang'][$this->_tpl_vars['type_page_key']]); ?>
                            <?php $this->assign('type_page_key', ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_on_type_page'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['type_replace'], $this->_tpl_vars['type_page_key']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['type_replace'], $this->_tpl_vars['type_page_key']))); ?>
                        <?php else: ?>
                            <?php $this->assign('type_page_key', ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_on_type_page'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['type_replace'], $this->_tpl_vars['lang']['listing_type']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['type_replace'], $this->_tpl_vars['lang']['listing_type']))); ?>
                        <?php endif; ?>

                        <label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_type']): ?>checked="checked"<?php endif; ?> name="search_type" value="1" /> <?php echo $this->_tpl_vars['type_page_key']; ?>
</label>
                    </div>

                    <div style="padding: 6px 0 4px 1px;"><label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_account']): ?>checked="checked"<?php endif; ?> name="search_account" value="1" /> <?php echo $this->_tpl_vars['lang']['search_form_on_account']; ?>
</label></div>

                    <div style="padding: 4px 0 4px 1px;"><label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_multi_categories']): ?>checked="checked"<?php endif; ?> name="search_multi_categories" value="1" /> <?php echo $this->_tpl_vars['lang']['search_multi_categories']; ?>
</label></div>
                </td>
            </tr>
            </table>

            <div id="multi_categories_levels">
                <table class="form" style="margin-top: 5px;">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['number_of_levels']; ?>
</td>
                    <td class="field">
                        <select name="search_multicat_levels" style="width:40px">
                            <?php unset($this->_sections['multicats_number']);
$this->_sections['multicats_number']['name'] = 'multicats_number';
$this->_sections['multicats_number']['start'] = (int)2;
$this->_sections['multicats_number']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['multicats_number']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['multicats_number']['show'] = true;
$this->_sections['multicats_number']['max'] = $this->_sections['multicats_number']['loop'];
if ($this->_sections['multicats_number']['start'] < 0)
    $this->_sections['multicats_number']['start'] = max($this->_sections['multicats_number']['step'] > 0 ? 0 : -1, $this->_sections['multicats_number']['loop'] + $this->_sections['multicats_number']['start']);
else
    $this->_sections['multicats_number']['start'] = min($this->_sections['multicats_number']['start'], $this->_sections['multicats_number']['step'] > 0 ? $this->_sections['multicats_number']['loop'] : $this->_sections['multicats_number']['loop']-1);
if ($this->_sections['multicats_number']['show']) {
    $this->_sections['multicats_number']['total'] = min(ceil(($this->_sections['multicats_number']['step'] > 0 ? $this->_sections['multicats_number']['loop'] - $this->_sections['multicats_number']['start'] : $this->_sections['multicats_number']['start']+1)/abs($this->_sections['multicats_number']['step'])), $this->_sections['multicats_number']['max']);
    if ($this->_sections['multicats_number']['total'] == 0)
        $this->_sections['multicats_number']['show'] = false;
} else
    $this->_sections['multicats_number']['total'] = 0;
if ($this->_sections['multicats_number']['show']):

            for ($this->_sections['multicats_number']['index'] = $this->_sections['multicats_number']['start'], $this->_sections['multicats_number']['iteration'] = 1;
                 $this->_sections['multicats_number']['iteration'] <= $this->_sections['multicats_number']['total'];
                 $this->_sections['multicats_number']['index'] += $this->_sections['multicats_number']['step'], $this->_sections['multicats_number']['iteration']++):
$this->_sections['multicats_number']['rownum'] = $this->_sections['multicats_number']['iteration'];
$this->_sections['multicats_number']['index_prev'] = $this->_sections['multicats_number']['index'] - $this->_sections['multicats_number']['step'];
$this->_sections['multicats_number']['index_next'] = $this->_sections['multicats_number']['index'] + $this->_sections['multicats_number']['step'];
$this->_sections['multicats_number']['first']      = ($this->_sections['multicats_number']['iteration'] == 1);
$this->_sections['multicats_number']['last']       = ($this->_sections['multicats_number']['iteration'] == $this->_sections['multicats_number']['total']);
?>
                                <?php $this->assign('cnumber', $this->_sections['multicats_number']['index']); ?>
                                <option value="<?php echo $this->_tpl_vars['cnumber']; ?>
" <?php if ($this->_tpl_vars['sPost']['search_multicat_levels'] == $this->_tpl_vars['cnumber']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cnumber']; ?>
</option>
                            <?php endfor; endif; ?>
                        </select>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['search_multicat_levels_hint']; ?>
</span>

                        <div style="padding: 10px 0 4px 1px;"><label><input type="checkbox" <?php if ($this->_tpl_vars['sPost']['search_multicat_phrases']): ?>checked="checked"<?php endif; ?> name="search_multicat_phrases" value="1" /> <?php echo $this->_tpl_vars['lang']['use_custom_phrases']; ?>
</label></div>
                    </td>
                </tr>
                </table>
            </div>

            <div id="multi_categories_phrases">
                <table class="form">
                <?php $this->assign('replace', ('{')."number".('}')); ?>
                <?php unset($this->_sections['multicats_number']);
$this->_sections['multicats_number']['name'] = 'multicats_number';
$this->_sections['multicats_number']['start'] = (int)1;
$this->_sections['multicats_number']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['multicats_number']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['multicats_number']['show'] = true;
$this->_sections['multicats_number']['max'] = $this->_sections['multicats_number']['loop'];
if ($this->_sections['multicats_number']['start'] < 0)
    $this->_sections['multicats_number']['start'] = max($this->_sections['multicats_number']['step'] > 0 ? 0 : -1, $this->_sections['multicats_number']['loop'] + $this->_sections['multicats_number']['start']);
else
    $this->_sections['multicats_number']['start'] = min($this->_sections['multicats_number']['start'], $this->_sections['multicats_number']['step'] > 0 ? $this->_sections['multicats_number']['loop'] : $this->_sections['multicats_number']['loop']-1);
if ($this->_sections['multicats_number']['show']) {
    $this->_sections['multicats_number']['total'] = min(ceil(($this->_sections['multicats_number']['step'] > 0 ? $this->_sections['multicats_number']['loop'] - $this->_sections['multicats_number']['start'] : $this->_sections['multicats_number']['start']+1)/abs($this->_sections['multicats_number']['step'])), $this->_sections['multicats_number']['max']);
    if ($this->_sections['multicats_number']['total'] == 0)
        $this->_sections['multicats_number']['show'] = false;
} else
    $this->_sections['multicats_number']['total'] = 0;
if ($this->_sections['multicats_number']['show']):

            for ($this->_sections['multicats_number']['index'] = $this->_sections['multicats_number']['start'], $this->_sections['multicats_number']['iteration'] = 1;
                 $this->_sections['multicats_number']['iteration'] <= $this->_sections['multicats_number']['total'];
                 $this->_sections['multicats_number']['index'] += $this->_sections['multicats_number']['step'], $this->_sections['multicats_number']['iteration']++):
$this->_sections['multicats_number']['rownum'] = $this->_sections['multicats_number']['iteration'];
$this->_sections['multicats_number']['index_prev'] = $this->_sections['multicats_number']['index'] - $this->_sections['multicats_number']['step'];
$this->_sections['multicats_number']['index_next'] = $this->_sections['multicats_number']['index'] + $this->_sections['multicats_number']['step'];
$this->_sections['multicats_number']['first']      = ($this->_sections['multicats_number']['iteration'] == 1);
$this->_sections['multicats_number']['last']       = ($this->_sections['multicats_number']['iteration'] == $this->_sections['multicats_number']['total']);
?>
                <tr>
                    <td class="name"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['level_number'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_sections['multicats_number']['iteration']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_sections['multicats_number']['iteration'])); ?>
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
                            <input type="text" name="multicat_phrases[<?php echo $this->_sections['multicats_number']['iteration']; ?>
][<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['multicat_phrases'][$this->_sections['multicats_number']['iteration']][$this->_tpl_vars['language']['Code']]; ?>
" class="w250" maxlength="50" /> <span class="field_description_noicon">
                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </td>
                </tr>
                <?php endfor; endif; ?>
                </table>
            </div>

            <table class="form" style="margin-top: 5px;">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['advanced_search']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'advanced_search'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['advanced_search_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['advanced_search_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>
                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['advanced_search']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=search_forms&action=build&form=') : smarty_modifier_cat($_tmp, 'index.php?controller=search_forms&action=build&form=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_advanced">$1</a>') : smarty_modifier_cat($_tmp, '_advanced">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>
                </td>
            </tr>

            <?php if ($this->_tpl_vars['tpl_settings']['search_on_map_page']): ?>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['on_map_search']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'on_map_search'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['on_map_search_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['on_map_search_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>
                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['on_map_search']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=search_forms&action=build&form=') : smarty_modifier_cat($_tmp, 'index.php?controller=search_forms&action=build&form=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_on_map">$1</a>') : smarty_modifier_cat($_tmp, '_on_map">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['myads_search']; ?>
</td>
                <td class="field">
                    <?php $this->assign('checkbox_field', 'myads_search'); ?>

                    <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                    <?php else: ?>
                        <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                    <?php endif; ?>

                    <table>
                    <tr>
                        <td>
                            <input <?php echo $this->_tpl_vars['myads_search_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                            <input <?php echo $this->_tpl_vars['myads_search_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                        </td>
                        <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost']['myads_search']): ?>
                            <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=search_forms&action=build&form=') : smarty_modifier_cat($_tmp, 'index.php?controller=search_forms&action=build&form=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_myads">$1</a>') : smarty_modifier_cat($_tmp, '_myads">$1</a>'))); ?>
                            <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['search_form_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                        <?php endif; ?>
                    </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['submit_method']; ?>
</td>
                <td class="field">
                    <select name="refine_search_type">
                        <?php $_from = $this->_tpl_vars['refine_search_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['refine_search_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['refine_search_type']['key']; ?>
" <?php if ($this->_tpl_vars['refine_search_type']['key'] == $this->_tpl_vars['sPost']['refine_search_type']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['refine_search_type']['name']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesFormSearch'), $this);?>

            </table>

            <script type="text/javascript">
            <?php echo '

            $(document).ready(function(){
                $(\'input[name=search_form]\').click(function(){
                    searchFormTracker();
                });

                searchFormTracker();
            });

            var searchFormTracker = function() {
                var disabled = $(\'input[name=search_form]:checked\').val() == \'1\' ? false : true;
                var class_name = $(\'input[name=search_form]:checked\').val() == \'1\' ? \'selector\' : \'selector_disabled\';

                $(\'input[name=advanced_search]\').attr(\'disabled\', disabled);
                $(\'select[name=refine_search_type]\').attr(\'disabled\', disabled);
                $(\'select[name=refine_search_type]\').parent().attr(\'class\', class_name);
                $(\'input[name=search_home]\').attr(\'disabled\', disabled);
                $(\'input[name=search_page]\').attr(\'disabled\', disabled);
            }

            '; ?>

            </script>
        </div>
    </div>

    <div id="featured_settings">
        <table class="form" style="margin-top: 5px;">
        <tr>
            <td class="divider" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['featured_settings']; ?>
</div></td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['featured_blocks']; ?>
</td>
            <td class="field">
                <?php $this->assign('checkbox_field', 'featured_blocks'); ?>

                <?php if ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '1'): ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']] == '0'): ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_no') : smarty_modifier_cat($_tmp, '_no')), 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign(((is_array($_tmp=$this->_tpl_vars['checkbox_field'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_yes') : smarty_modifier_cat($_tmp, '_yes')), 'checked="checked"'); ?>
                <?php endif; ?>

                <table>
                <tr>
                    <td>
                        <input <?php echo $this->_tpl_vars['featured_blocks_yes']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="1" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                        <input <?php echo $this->_tpl_vars['featured_blocks_no']; ?>
 type="radio" id="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no" name="<?php echo $this->_tpl_vars['checkbox_field']; ?>
" value="0" /> <label for="<?php echo $this->_tpl_vars['checkbox_field']; ?>
_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                    </td>
                    <?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['sPost'][$this->_tpl_vars['checkbox_field']]): ?>
                        <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='<a target="_blank" class="static" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=blocks&amp;action=edit&amp;block=ltfb_') : smarty_modifier_cat($_tmp, 'index.php?controller=blocks&amp;action=edit&amp;block=ltfb_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['key']) : smarty_modifier_cat($_tmp, $_GET['key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                        <td><span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['featured_blocks_hint'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
</span></td>
                    <?php endif; ?>
                </tr>
                </table>
            </td>
        </tr>
        </table>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesFormFeatured'), $this);?>

    </div>

   <div>
        <table class="form" style="margin-top: 5px;">
        <tr>
            <td class="divider" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['arrange_settings']; ?>
</div></td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['arrange_by_field']; ?>
</td>
            <td class="field">
                <?php if ($_GET['action'] == 'add'): ?>
                    <?php echo $this->_tpl_vars['lang']['not_available']; ?>
 <span class="field_description"><?php echo $this->_tpl_vars['lang']['general_category_hint']; ?>
</span>
                <?php else: ?>
                    <select name="arrange_field">
                        <option value="0">- <?php echo $this->_tpl_vars['lang']['disabled']; ?>
 -</option>
                        <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                        <?php $this->assign('type_phrase', ((is_array($_tmp='type_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field']['Type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field']['Type']))); ?>
                        <option value="<?php echo $this->_tpl_vars['field']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['arrange_field'] == $this->_tpl_vars['field']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['field']['name']; ?>
 (<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['type_phrase']]; ?>
)</option>
                        <?php endforeach; else: ?>
                        <option value="0"><?php echo $this->_tpl_vars['lang']['no_fields_available']; ?>
</option>
                        <?php endif; unset($_from); ?>
                    </select>
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['arrange_by_field_hint']; ?>
</span>
                <?php endif; ?>
            </td>
        </tr>
        </table>

        <?php if ($_GET['action'] == 'edit'): ?>
            <div id="arrange_area" class="hide">
                <table class="form" style="margin-top: 5px;">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['apply_to']; ?>
</td>
                    <td class="field">
                        <div class="individual_page_item">
                            <div style="padding: 6px 0 4px;" id="arrange_search">
                                <label><input class="modules" type="checkbox" <?php if ($this->_tpl_vars['sPost']['is_arrange_search']): ?>checked="checked"<?php endif; ?> name="is_arrange_search" value="1" /> <?php echo $this->_tpl_vars['lang']['arrange_search_form']; ?>
</label>
                                <div class="area hide">
                                    <div style="padding: 5px 0;">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="padding: 4px 0;" id="arrange_featured">
                            <label><input class="modules" type="checkbox" <?php if ($this->_tpl_vars['sPost']['is_arrange_featured']): ?>checked="checked"<?php endif; ?> name="is_arrange_featured" value="1" /> <?php echo $this->_tpl_vars['lang']['arrange_featured_block']; ?>
</label>
                            <div class="area hide">
                                <div style="padding: 5px 0;">

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </table>
            </div>
        <?php endif; ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesFormArrange'), $this);?>

    </div>

    <?php if ($_GET['action'] == 'edit'): ?>
        <script type="text/javascript">//<![CDATA[
        var arrange_langs = new Array();
        var langs_list = new Array();
        <?php $this->assign('exp_values', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['fields'][$this->_tpl_vars['sPost']['arrange_field']]['Values']) : explode($_tmp, $this->_tpl_vars['fields'][$this->_tpl_vars['sPost']['arrange_field']]['Values']))); ?>
        <?php $this->assign('arrange_key', $this->_tpl_vars['fields'][$this->_tpl_vars['sPost']['arrange_field']]['Key']); ?>
        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['languages']):
        $this->_foreach['lF']['iteration']++;
?>
        langs_list['<?php echo $this->_tpl_vars['languages']['Code']; ?>
'] = '<?php echo $this->_tpl_vars['languages']['name']; ?>
';

        arrange_langs['<?php echo $this->_tpl_vars['arrange_key']; ?>
_<?php echo $this->_tpl_vars['languages']['Code']; ?>
'] = [
            [<?php $_from = $this->_tpl_vars['exp_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['valueF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['valueF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['valueF']['iteration']++;
?><?php if ($this->_tpl_vars['sPost']['arrange_search'][$this->_tpl_vars['arrange_key']][$this->_tpl_vars['value']][$this->_tpl_vars['languages']['Code']]): ?>'<?php echo $this->_tpl_vars['sPost']['arrange_search'][$this->_tpl_vars['arrange_key']][$this->_tpl_vars['value']][$this->_tpl_vars['languages']['Code']]; ?>
'<?php else: ?>false<?php endif; ?><?php if (! ($this->_foreach['valueF']['iteration'] == $this->_foreach['valueF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>],
            [<?php $_from = $this->_tpl_vars['exp_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['valueF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['valueF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['valueF']['iteration']++;
?><?php if ($this->_tpl_vars['sPost']['arrange_featured'][$this->_tpl_vars['arrange_key']][$this->_tpl_vars['value']][$this->_tpl_vars['languages']['Code']]): ?>'<?php echo $this->_tpl_vars['sPost']['arrange_featured'][$this->_tpl_vars['arrange_key']][$this->_tpl_vars['value']][$this->_tpl_vars['languages']['Code']]; ?>
'<?php else: ?>false<?php endif; ?><?php if (! ($this->_foreach['valueF']['iteration'] == $this->_foreach['valueF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]
        ];
        <?php endforeach; endif; unset($_from); ?>
        var arrange_modules = ['arrange_search', 'arrange_featured'];
        var arrange_names = ['<?php echo $this->_tpl_vars['lang']['arrange_tab_name']; ?>
', '<?php echo $this->_tpl_vars['lang']['arrange_box_name']; ?>
', '<?php echo $this->_tpl_vars['lang']['arrange_col_name']; ?>
'];


        var fields = new Array();
        <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
            <?php $this->assign('exp_values', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['field']['Values']) : explode($_tmp, $this->_tpl_vars['field']['Values']))); ?>
            fields['<?php echo $this->_tpl_vars['field']['Key']; ?>
'] = [
                '<?php echo $this->_tpl_vars['field']['Type']; ?>
',
                '<?php echo $this->_tpl_vars['field']['Values']; ?>
',
                [<?php $_from = $this->_tpl_vars['exp_values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['valueF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['valueF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['valueF']['iteration']++;
?><?php $this->assign('val_phrase', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='listing_fields+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['field']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['field']['Key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '_') : smarty_modifier_cat($_tmp, '_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['value']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['value']))); ?><?php if ($this->_tpl_vars['field']['Type'] == 'bool'): ?>'<?php if ($this->_tpl_vars['value']): ?><?php echo $this->_tpl_vars['lang']['yes']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['no']; ?>
<?php endif; ?>'<?php else: ?>'<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['val_phrase']]; ?>
'<?php endif; ?><?php if (! ($this->_foreach['valueF']['iteration'] == $this->_foreach['valueF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]
            ];
        <?php endforeach; endif; unset($_from); ?>

        <?php echo '

        $(document).ready(function(){
            $(\'select[name=arrange_field]\').change(function(){
                arrangeField();
            });

            arrangeField();

            $(\'#arrange_area input.modules\').click(function(){
                arrangeOpen(this);
            })
            $(\'#arrange_area input.modules:checked\').each(function(){
                arrangeOpen(this);
            });
        });

        var arrangeOpen = function(obj){
            if ($(obj).is(\':checked\')) {
                $(obj).parent().next().slideDown();
            } else {
                $(obj).parent().next().slideUp();
            }
        };

        var arrangeField = function(){
            var key = $(\'select[name=arrange_field]\').val();

            if (key != \'0\') {
                $(\'#arrange_area\').slideDown();
                $(\'#arrange_area input.tmp\').prop(\'checked\', true).removeClass(\'tmp\').parent().next().slideDown();
            } else {
                $(\'#arrange_area\').slideUp();
                $(\'#arrange_area input.modules:checked\').prop(\'checked\', false).addClass(\'tmp\').parent().next().slideUp();
                return;
            }

            arrangeBuild(key);
        };

        var arrangeBuild = function(key){
            var tabs = \'<ul class="tabs">\';
            var first_tab = true;
            for (var lng in langs_list) {
                if (typeof(langs_list[lng]) != \'function\') {
                    var active = first_tab ? \' class="active"\' : \'\';
                    tabs+= \'<li\'+active+\' lang="\'+lng+\'">\'+langs_list[lng]+\'</li> \';
                    first_tab = false;
                }
            }
            tabs += \'</ul>\';

            for (var j=0; j<arrange_modules.length;j++) {
                var module = arrange_modules[j];
                var values = fields[key][1].split(\',\');
                var html = tabs;

                first_tab = true;
                for (var lng in langs_list) {
                    if (typeof(langs_list[lng]) != \'function\') {
                        var hide = first_tab ? \'\' : \' hide\';
                        html += \'<div class="tab_area \'+lng+\' \'+hide+\'">\';
                        html += \'<table style="margin-left: 20px;" class="frame"><tr>\';
                        for (var i=0; i<values.length; i++) {
                            if (!arrange_langs[key+\'_\'+lng]) {
                                var set = fields[key][2][i];
                            } else {
                                var set = arrange_langs[key+\'_\'+lng][j][i] ? arrange_langs[key+\'_\'+lng][j][i] : fields[key][2][i];
                            }
                            html += \'<td class="name">\'+arrange_names[j].replace(\'{name}\', fields[key][2][i])+\'</td><td class="field ckeditor"><input type="text" name="\'+module+\'[\'+key+\'][\'+values[i]+\'][\'+lng+\']" value="\'+set+\'" /> <span class="field_description_noicon">(\'+langs_list[lng]+\')</span></td></tr><tr>\';
                        }
                        html += \'</tr></table></div>\';
                        first_tab = false;
                    }
                }

                /* append search tabs fieds */
                $(\'#\'+module+\' div.area div\').html(html);
                flynax.tabs();
            }
        };
        '; ?>

        //]]>
        </script>
    <?php endif; ?>

    <script type="text/javascript"><?php echo '
    $(document).ready(function(){
        $(\'input[name=photo]\').change(function(){
            photoOpt();
        });

        photoOpt();

        // multi category option handler
        $(\'input[name=search_multi_categories]\').change(function(){
            searchMultiCat();
        });
        searchMultiCat();

        // multi category phrases handler
        $(\'input[name=search_multicat_phrases]\').change(function(){
            phrasesMultiCat();
        });
        phrasesMultiCat();

        $(\'select[name=search_multicat_levels]\').change(function(){
            phrasesLevels();
        });
        phrasesLevels();
    });

    var photoOpt = function(){
        var value = parseInt($(\'input[name=photo]:checked\').val());
    };

    var phrasesMultiCat = function(){
        if ($(\'input[name=search_multicat_phrases]\').is(\':checked\') && $(\'input[name=search_multi_categories]\').is(\':checked\')) {
            $(\'#multi_categories_phrases\').slideDown();
        } else {
            $(\'#multi_categories_phrases\').slideUp();
        }
    }
    var searchMultiCat = function(){
        if ($(\'input[name=search_multi_categories]:checked\').val()) {
            $(\'#multi_categories_levels\').slideDown();
        } else {
            $(\'#multi_categories_levels\').slideUp();
        }

        phrasesMultiCat();
    };

    var phrasesLevels = function(){
        var levels = parseInt($(\'select[name=search_multicat_levels]\').val()) - 1;
        var table = $(\'#multi_categories_phrases > table.form > tbody\');

        table.find(\'> tr\').show();
        table.find(\'> tr input[name^=multicat_phrases]\').attr(\'disabled\', false);

        table.find(\'> tr:gt(\' + levels + \')\').hide();
        table.find(\'> tr:gt(\' + levels + \') input[name^=multicat_phrases]\').attr(\'disabled\', true);
    }
    '; ?>
</script>

    <table class="form">
    <tr>
        <td style="width: 185px;"></td>
        <td class="field">
            <input class="button" type="submit" value="<?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['edit']; ?>
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
    <!-- add/edit type end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesAction'), $this);?>


<?php else: ?>

    <!-- delete listing type block -->
    <div id="delete_block" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['remove_listing_type'])));
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
            var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_drop_empty_listing_type']; ?>
";
        <?php else: ?>
            var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_delete_empty_listing_type']; ?>
";
        <?php endif; ?>

        <?php echo '

        function delete_chooser(method, key, name)
        {
            if (method == \'delete\')
            {
                rlPrompt(delete_conform_phrase.replace(\'{type}\', name), \'xajax_deleteListingType\', key);
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
    <!-- delete listing type block end -->

    <!-- listing types grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var listingTypesGrid;

    <?php echo '
    $(document).ready(function(){

        listingTypesGrid = new gridObj({
            key: \'listingTypes\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/listing_types.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_listing_types_manager\'],
            fields: [
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Admin_only\', mapping: \'Admin_only\'},
                {name: \'Order\', mapping: \'Order\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Key\', mapping: \'Key\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 50,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Order\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_admin_only\'],
                    dataIndex: \'Admin_only\',
                    width: 10,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'1\', lang[\'ext_yes\']],
                            [\'0\', lang[\'ext_no\']]
                        ],
                        displayField: \'value\',
                        valueField: \'key\',
                        emptyText: lang[\'ext_not_available\'],
                        typeAhead: true,
                        mode: \'local\',
                        triggerAction: \'all\',
                        selectOnFocus:true
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    fixed: true,
                    width: 100,
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
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&key="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }

                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'xajax_prepareDeleting(\\""+row.data.Key+"\\")\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesGrid'), $this);?>
<?php echo '

        listingTypesGrid.init();
        grid.push(listingTypesGrid.grid);

    });
    '; ?>

    //]]>
    </script>
    <!-- listing types grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingTypesBottom'), $this);?>


<?php endif; ?>

<!-- listing types tpl end -->