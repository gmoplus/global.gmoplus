<?php /* Smarty version 2.6.31, created on 2025-07-28 09:41:07
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'header.tpl', 9, false),array('modifier', 'lower', 'header.tpl', 37, false),array('modifier', 'escape', 'header.tpl', 82, false),array('modifier', 'in_array', 'header.tpl', 170, false),array('modifier', 'cat', 'header.tpl', 195, false),array('modifier', 'replace', 'header.tpl', 198, false),array('modifier', 'strlen', 'header.tpl', 250, false),array('function', 'rlHook', 'header.tpl', 131, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-gb" xml:lang="en-gb">
<head>

<title>
<?php echo $this->_tpl_vars['lang']['rl_admin_panel']; ?>


<?php $_from = $this->_tpl_vars['breadCrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bc_title']):
?>
    &nbsp;&raquo;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['bc_title']['name'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

<?php endforeach; endif; unset($_from); ?>
</title>

<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="viewport" content="width=1024, user-scalable=yes, initial-scale=1.0, maximum-scale=4.0, minimum-scale=0.25" />
<meta name="generator" content="Flynax Classified Software" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['config']['encoding']; ?>
" />

<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/ext/ext-all.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/ext/rlExt.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/style.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/jquery.ui.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/common.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />

<link href="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/colorpicker/css/colorpicker.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<?php if (isset ( $_GET['key'] ) || isset ( $_GET['form'] )): ?>
    <link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/builder.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<?php endif; ?>
<link type="image/x-icon" rel="shortcut icon" href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/favicon.ico?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" />

<?php if (( ( $this->_tpl_vars['tpl_settings']['category_menu_listing_type'] || $this->_tpl_vars['tpl_settings']['listing_type_form_icon'] ) && $this->_tpl_vars['cKey'] == 'listing_types' ) || ( $this->_tpl_vars['tpl_settings']['category_menu'] && $this->_tpl_vars['cKey'] == 'categories' )): ?>
    <link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/icons-manager.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<?php endif; ?>

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.ui.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/datePicker/i18n/ui.datepicker-<?php echo ((is_array($_tmp=(defined('RL_LANG_CODE') ? @RL_LANG_CODE : null))) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/numeric.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/cookie.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/lib.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<?php echo $this->_tpl_vars['ajaxJavascripts']; ?>


<script type="text/javascript">//<![CDATA[
    var rlUrlHome = '<?php echo $this->_tpl_vars['rlBase']; ?>
';
    var rlPlugins = '<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
';
    var rlDateFormat = '<?php echo (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null); ?>
';
    var rlLang = '<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
';
    var controller = '<?php echo $_GET['controller']; ?>
';
    /**
     * @since 4.7.1
     * @var string - rlUrlController
     */
    var rlUrlController = rlUrlHome + 'index.php?controller=' + controller;
    var rlCurrency = '<?php echo $this->_tpl_vars['config']['system_currency']; ?>
';

    var rlConfig                  = [];
    rlConfig.tpl_base             = '<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo (defined('ADMIN') ? @ADMIN : null); ?>
/';
    rlConfig.ajax_url             = '<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo (defined('ADMIN') ? @ADMIN : null); ?>
/request.ajax.php';
    rlConfig.ajax_frontend_url    = '<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
request.ajax.php'; // @since 4.8.0
    rlConfig.libs_url             = '<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
';
    rlConfig.files_url             = '<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
';
    rlConfig.lang                 = '<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
/';
    rlConfig.fckeditor_bar        = '<?php echo $this->_tpl_vars['config']['fckeditor_bar']; ?>
';
    rlConfig.messages_length      = '<?php echo $this->_tpl_vars['config']['messages_length']; ?>
';
    rlConfig.map_provider         = '<?php echo $this->_tpl_vars['config']['map_provider']; ?>
';
    rlConfig.frontendURL          = '<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
'; // @since 4.9.0
    rlConfig.frontendTemplateURL  = '<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
templates/<?php echo $this->_tpl_vars['config']['template']; ?>
/'; // @since 4.9.0
    rlConfig.membershipModule     = <?php if ($this->_tpl_vars['config']['membership_module']): ?>true<?php else: ?>false<?php endif; ?>; // @since 4.9.0
    rlConfig.host                 = '<?php echo $this->_tpl_vars['domain_info']['host']; ?>
'; // @since 4.9.1
    rlConfig.static_files_revision = <?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
; // @since 4.9.1

    <?php if ($this->_tpl_vars['config']['trash']): ?>
        var delete_mod = 'trash';
    <?php else: ?>
        var delete_mod = 'delete';
    <?php endif; ?>

    var lang = Array();

    <?php $_from = $this->_tpl_vars['js_keys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['js_key']):
?>
       lang['<?php echo $this->_tpl_vars['js_key']; ?>
'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lang'][$this->_tpl_vars['js_key']])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
    <?php endforeach; endif; unset($_from); ?>

    /**
     * Fallback: Add phrases with old "ext" scope to global scope
     * @todo 4.8.1 - Remove it in future major updates and remove usage from plugins
     */
    var deprecatedLang = [
        'ext_active',
        'ext_approval',
        'ext_expired',
        'ext_new',
        'ext_reviewed',
        'ext_pending',
        'ext_pending',
        'ext_replied',
        'ext_incomplete',
        'ext_canceled',
        'ext_not_installed',
    ];

    deprecatedLang.forEach(function (deprecatedKey) {
        var newKey = deprecatedKey.replace('ext_', '');
        lang[deprecatedKey] = lang[newKey];
    });

    var rights = Array();

    <?php if ($_SESSION['sessAdmin']['type'] == 'super'): ?>
        <?php $_from = $this->_tpl_vars['extended_sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aRight']):
?>
            rights["<?php echo $this->_tpl_vars['aRight']; ?>
"] = new Array(<?php $_from = $this->_tpl_vars['extended_modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modeF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modeF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mode']):
        $this->_foreach['modeF']['iteration']++;
?>"<?php echo $this->_tpl_vars['mode']; ?>
"<?php if (! ($this->_foreach['modeF']['iteration'] == $this->_foreach['modeF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
        <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
        <?php $_from = $this->_tpl_vars['aRights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rKey'] => $this->_tpl_vars['aRight']):
?>
            rights["<?php echo $this->_tpl_vars['rKey']; ?>
"] = <?php if (is_array ( $this->_tpl_vars['aRight'] )): ?>new Array(<?php $_from = $this->_tpl_vars['aRight']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modeF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modeF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mode']):
        $this->_foreach['modeF']['iteration']++;
?>"<?php echo $this->_tpl_vars['mode']; ?>
"<?php if (! ($this->_foreach['modeF']['iteration'] == $this->_foreach['modeF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>)<?php else: ?>'true'<?php endif; ?>;
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    var cKey = '<?php echo $this->_tpl_vars['cKey']; ?>
';
    var apMenu = new Array();
//]]>
</script>

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
extJs/ext-base.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
extJs/ext-all.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/ext/RowExpander.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/ext/rlGrid.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<!-- EXT js load end -->

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeader'), $this);?>


</head>
<body>

<table class="sTable">
<tr>
    <td valign="top" rowspan="2" id="sidebar" <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>style="width: 61px"<?php endif; ?>>
        <div style="min-height: 100%; width: 221px;">
            <div class="header_left" <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>style="width: 61px"<?php endif; ?>>
                <div id="outer_logo" <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>style="padding-left: 12px;"<?php endif; ?>>
                    <div id="logo" <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>style="width: 38px;"<?php endif; ?>>
                        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php" title="<?php echo $this->_tpl_vars['lang']['rl_admin_panel']; ?>
">&nbsp;</a>
                    </div>
                </div>
            </div>

            <div class="middle_left" <?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?>style="width: 61px"<?php endif; ?>>
                <?php $this->assign('sCookie', $_COOKIE); ?>

                <!-- menu nav bar -->
                <div id="menu_navbar">
                    <div id="mode_switcher"></div>
                </div>
                <!-- menu nav bar end -->

                <!-- main menu collapsed -->
                <div id="mmenu_slide"<?php if ($_COOKIE['ap_menu_collapsed'] == 'false' || ! isset ( $_COOKIE['ap_menu_collapsed'] )): ?> class="hide"<?php endif; ?>>

                    <?php $_from = $this->_tpl_vars['mMenuItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menuS'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menuS']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mItem']):
        $this->_foreach['menuS']['iteration']++;
?>
                        <?php $this->assign('show_menu', false); ?>
                        <?php $_from = $this->_tpl_vars['mItem']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['admMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['admMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['admMenu']['iteration']++;
?>
                            <?php $this->assign('childKey', $this->_tpl_vars['child']['Key']); ?>
                            <?php if (! $this->_tpl_vars['config']['admin_hide_denied_items'] || $this->_tpl_vars['aRights'][$this->_tpl_vars['childKey']] || $_SESSION['sessAdmin']['type'] == 'super'): ?>
                                <?php $this->assign('show_menu', true); ?>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>

                        <?php if ($this->_tpl_vars['show_menu']): ?>
                            <div lang="<?php echo $this->_tpl_vars['mItem']['Key']; ?>
" class="scaption <?php if (( $_GET['controller'] && ((is_array($_tmp=$_GET['controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) ) || ( ! $_GET['controller'] && ((is_array($_tmp='home')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) )): ?> active<?php endif; ?>" id="mssection_<?php echo $this->_tpl_vars['mItem']['ID']; ?>
">
                                <div class="outer">
                                    <div style="background-position: <?php if (( $_GET['controller'] && ((is_array($_tmp=$_GET['controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) ) || ( ! $_GET['controller'] && ((is_array($_tmp='home')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) )): ?>-18<?php else: ?>0<?php endif; ?>px <?php echo $this->_tpl_vars['menu_icons'][$this->_tpl_vars['mItem']['Key']]; ?>
px;"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMenuCollapsedEnd'), $this);?>


                </div>
                <!-- main menu collapsed end -->

                <!-- main menu full -->
                <div id="mmenu_full"<?php if ($_COOKIE['ap_menu_collapsed'] == 'true'): ?> class="hide"<?php endif; ?>>

                    <?php $_from = $this->_tpl_vars['mMenuItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menuF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menuF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mItem']):
        $this->_foreach['menuF']['iteration']++;
?>

                        <script type="text/javascript">
                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
'] = new Array();
                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['section_name'] = '<?php echo $this->_tpl_vars['mItem']['name']; ?>
';
                        </script>

                        <div id="msection_<?php echo $this->_tpl_vars['mItem']['ID']; ?>
">

                            <?php $this->assign('ma_status', ((is_array($_tmp='adMenu_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['mItem']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['mItem']['ID']))); ?>
                            <div id="lb_status_<?php echo $this->_tpl_vars['mItem']['ID']; ?>
" class="caption<?php if (( $_GET['controller'] && ((is_array($_tmp=$_GET['controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) ) || ( ! $_GET['controller'] && ((is_array($_tmp='home')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) )): ?>_active<?php endif; ?>">
                                <div class="icon" style="background-position: <?php if (( $_GET['controller'] && ((is_array($_tmp=$_GET['controller'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) ) || ( ! $_GET['controller'] && ((is_array($_tmp='home')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['mItem']['Controllers_list']) : in_array($_tmp, $this->_tpl_vars['mItem']['Controllers_list'])) )): ?>-18px<?php else: ?>0<?php endif; ?> <?php echo $this->_tpl_vars['menu_icons'][$this->_tpl_vars['mItem']['Key']]; ?>
px;"></div>
                                <div class="name"><?php echo ((is_array($_tmp=$this->_tpl_vars['mItem']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '&nbsp;') : smarty_modifier_replace($_tmp, ' ', '&nbsp;')); ?>
</div>
                            </div>

                            <?php $this->assign('m_index', ((is_array($_tmp='adMenu_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['mItem']['ID']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['mItem']['ID']))); ?>

                            <div id="lblock_<?php echo $this->_tpl_vars['mItem']['ID']; ?>
" class="ms_container clear<?php if ($this->_tpl_vars['sCookie'][$this->_tpl_vars['m_index']] == 'hide' || $_COOKIE['ap_menu_collapsed'] == 'true'): ?> hide<?php if ($_COOKIE['ap_menu_collapsed'] == 'true' && isset ( $this->_tpl_vars['sCookie'][$this->_tpl_vars['m_index']] ) && $this->_tpl_vars['sCookie'][$this->_tpl_vars['m_index']] != 'hide'): ?> tmp_visible<?php endif; ?><?php elseif (! isset ( $this->_tpl_vars['sCookie'][$this->_tpl_vars['m_index']] ) && ! ($this->_foreach['menuF']['iteration'] <= 1)): ?> hide<?php endif; ?>">

                                <!-- section content -->
                                <div class="section" id="<?php echo $this->_tpl_vars['mItem']['Key']; ?>
_section">

                                <?php $this->assign('aRights', $_SESSION['sessAdmin']['rights']); ?>
                                <?php $this->assign('itemCount', 0); ?>

                                <?php $_from = $this->_tpl_vars['mItem']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['admMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['admMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['admMenu']['iteration']++;
?>
                                    <?php $this->assign('childKey', $this->_tpl_vars['child']['Key']); ?>

                                    <?php if ($this->_tpl_vars['config']['admin_hide_denied_items'] && ( ! $this->_tpl_vars['aRights'][$this->_tpl_vars['childKey']] && $this->_tpl_vars['childKey'] != 'home' ) && $_SESSION['sessAdmin']['type'] == 'limited'): ?>
                                        <?php $this->assign('itemCount', $this->_tpl_vars['itemCount']+1); ?>
                                        <?php if (($this->_foreach['admMenu']['iteration'] == $this->_foreach['admMenu']['total']) && $this->_foreach['admMenu']['total'] == $this->_tpl_vars['itemCount']): ?>
                                            <script type="text/javascript">
                                            <?php echo '
                                            $(document).ready(function(){
                                                $(\'#msection_'; ?>
<?php echo $this->_tpl_vars['mItem']['ID']; ?>
<?php echo '\').slideUp(1);
                                            });
                                            '; ?>

                                            </script>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <script type="text/javascript">
                                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['<?php echo $this->_tpl_vars['child']['Key']; ?>
'] = new Array();
                                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['<?php echo $this->_tpl_vars['child']['Key']; ?>
']['Name'] = "<?php echo $this->_tpl_vars['child']['name']; ?>
";
                                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['<?php echo $this->_tpl_vars['child']['Key']; ?>
']['Controller'] = "<?php echo $this->_tpl_vars['child']['Controller']; ?>
";
                                        apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['<?php echo $this->_tpl_vars['child']['Key']; ?>
']['Vars'] = "<?php echo $this->_tpl_vars['child']['Vars']; ?>
";
                                        </script>

                                        <?php $this->assign('mitem_status', ''); ?>

                                        <?php if ($this->_tpl_vars['child']['Controller'] == $_GET['controller'] && $this->_tpl_vars['child']['Vars'] == ((is_array($_tmp='status=')) ? $this->_run_mod_handler('cat', true, $_tmp, $_GET['status']) : smarty_modifier_cat($_tmp, $_GET['status']))): ?>
                                            <?php $this->assign('mitem_status', ' active'); ?>
                                        <?php elseif ($this->_tpl_vars['child']['Controller'] == $_GET['controller'] && empty ( $this->_tpl_vars['child']['Vars'] ) && ! isset ( $_GET['status'] )): ?>
                                            <?php $this->assign('mitem_status', ' active'); ?>
                                        <?php elseif (! $_GET['controller'] && $this->_tpl_vars['child']['Controller'] == 'home'): ?>
                                            <?php $this->assign('mitem_status', ' active'); ?>
                                        <?php endif; ?>

                                        <script type="text/javascript">
                                            apMenu['<?php echo $this->_tpl_vars['mItem']['Key']; ?>
']['<?php echo $this->_tpl_vars['child']['Key']; ?>
']['Active'] = <?php if ($this->_tpl_vars['mitem_status'] == ' active'): ?>true<?php else: ?>false<?php endif; ?>;
                                        </script>

                                        <div class="mitem<?php echo $this->_tpl_vars['mitem_status']; ?>
" <?php if ($this->_tpl_vars['mItem']['Key'] == 'plugins' && $this->_tpl_vars['child']['Key'] != 'plugins'): ?>id="mPlugin_<?php echo $this->_tpl_vars['child']['Plugin']; ?>
"<?php endif; ?>>
                                            <a <?php if (((is_array($_tmp=$this->_tpl_vars['child']['name'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) > 22): ?>title="<?php echo $this->_tpl_vars['child']['name']; ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php<?php if ($this->_tpl_vars['child']['Controller'] != ''): ?>?controller=<?php echo $this->_tpl_vars['child']['Controller']; ?>
<?php if ($this->_tpl_vars['child']['Vars']): ?>&amp;<?php echo $this->_tpl_vars['child']['Vars']; ?>
<?php endif; ?><?php endif; ?>"><?php echo ((is_array($_tmp=$this->_tpl_vars['child']['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, ' ', '&nbsp;') : smarty_modifier_replace($_tmp, ' ', '&nbsp;')); ?>
</a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>

                                </div>
                                <!-- section content end -->

                            </div>

                        </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplMenuFullEnd'), $this);?>


                    <!-- Quote Requests Menu -->
                    <div id="custom_quote_section" class="ms_container">
                        <div class="caption">
                            <div class="icon" style="background-position: 0 -116px;"></div>
                            <div class="name">Teklif Talepleri</div>
                        </div>
                        <div class="section">
                            <div class="mitem">
                                <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=quote_requests">📋 Teklif Talepleri</a>
                            </div>
                        </div>
                    </div>
                    <!-- Quote Requests Menu End -->

                </div>
                <!-- main menu full end -->

            </div>
        </div>
    </td>
    <td id="content" valign="top">
        <div class="header_right">
            <div class="outer">
                <div class="inner">
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderNavBar'), $this);?>


                    <div id="admin_bar">
                        <span class="dark_14"><?php echo $this->_tpl_vars['lang']['welcome']; ?>
,</span>
                        <?php if ($this->_tpl_vars['aRights']['admins']['edit']): ?>
                            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=admins&amp;action=edit&amp;admin=<?php echo $_SESSION['sessAdmin']['user_id']; ?>
" class="dark_14"><?php echo $_SESSION['sessAdmin']['name']; ?>
</a>
                        <?php else: ?>
                            <span class="dark_14"><?php echo $_SESSION['sessAdmin']['name']; ?>
</span>
                        <?php endif; ?>
                        <div class="new_message">
                            <a title="<?php echo $this->_tpl_vars['lang']['my_messages']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=messages"><img class="envelope" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" alt="" /></a>
                            <?php if ($this->_tpl_vars['new_messages'] > 0): ?>
                                <a class="new" title="<?php echo $this->_tpl_vars['lang']['new_message']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=messages"><?php echo $this->_tpl_vars['new_messages']; ?>
</a>
                            <?php endif; ?>
                        </div>
                        <a class="logout" href="javascript:void(0)" onclick="xajax_logOut();"><?php echo $this->_tpl_vars['lang']['logout']; ?>
</a>
                    </div>
                    <div id="buttons_bar">&nbsp;
                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderButton'), $this);?>


                        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?system_info" target="_blank" class="button_bar"><span class="center_info"><?php echo $this->_tpl_vars['lang']['rl_system_info']; ?>
</span></a>
                        <a href="<?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
" target="_blank" class="button_bar"><span class="center_arrow"><?php echo $this->_tpl_vars['lang']['module_frontEnd']; ?>
<span></a>
                    </div>
                </div>
            </div>
        </div>