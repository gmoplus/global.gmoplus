<?php /* Smarty version 2.6.31, created on 2025-07-31 13:13:55
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'login.tpl', 42, false),array('modifier', 'replace', 'login.tpl', 43, false),array('modifier', 'escape', 'login.tpl', 89, false),array('modifier', 'regex_replace', 'login.tpl', 104, false),array('function', 'rlHook', 'login.tpl', 126, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title><?php echo $this->_tpl_vars['lang']['login_to']; ?>
 <?php echo $this->_tpl_vars['lang']['rl_admin_panel']; ?>
</title>

<meta name="generator" content="reefless_admin" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['config']['encoding']; ?>
" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/login.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/style.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/favicon.ico?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/ext/ext-all.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['rlTplBase']; ?>
css/ext/rlExt.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
" type="text/css" rel="stylesheet" />

<?php echo $this->_tpl_vars['ajaxJavascripts']; ?>


<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
extJs/ext-base.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
extJs/ext-all.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['rlBase']; ?>
js/login.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

</head>
<body>
<div id="height">
    <div id="middle">
        <div id="login_block">
            <div class="top">
                <div class="left"></div>
                <div class="center"></div>
                <div class="right"></div>
            </div>
            <div class="clear"></div>

            <div class="middle_outer">
                <div class="middle_inner">
                    <div id="logo"></div>
                    <?php if ($this->_tpl_vars['loginAttemptsLeft'] <= 0 && $this->_tpl_vars['config']['security_login_attempt_admin_module']): ?>
                        <div class="error">
                            <div class="inner">
                                <div class="icon"></div>
                                <?php $this->assign('periodVar', ('{')."period".('}')); ?>
                                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<b>')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['security_login_attempt_admin_period']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['security_login_attempt_admin_period'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '</b>') : smarty_modifier_cat($_tmp, '</b>'))); ?>
                                <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['login_attempt_error'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['periodVar'], $this->_tpl_vars['replace']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['periodVar'], $this->_tpl_vars['replace'])); ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <form name="login" action="" method="post" onsubmit="return false;">
                            <div class="relative" style="margin: 0 0 5px">
                                <input style="width: 215px;" maxlength="25" type="text" id="username" name="username" placeholder="<?php echo $this->_tpl_vars['lang']['username']; ?>
" />
                            </div>

                            <div class="relative" style="margin: 0 0 5px">
                                <input style="width: 215px;" maxlength="25" type="password" id="password" name="password" placeholder="<?php echo $this->_tpl_vars['lang']['password']; ?>
" />
                            </div>

                            <select <?php if ($this->_tpl_vars['langCount'] < 2): ?>class="disabled"<?php endif; ?> title="<?php echo $this->_tpl_vars['lang']['rl_interface']; ?>
" id="interface" style="width: 100px;" <?php if ($this->_tpl_vars['langCount'] < 2): ?>disabled="disabled"<?php endif; ?>>
                                <?php $_from = $this->_tpl_vars['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lang_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lang_foreach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['languages']):
        $this->_foreach['lang_foreach']['iteration']++;
?>
                                    <option value="<?php echo $this->_tpl_vars['languages']['Code']; ?>
" <?php if ((defined('RL_LANG_CODE') ? @RL_LANG_CODE : null) == $this->_tpl_vars['languages']['Code']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['languages']['name']; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>

                            <div style="margin-top: 20px;">
                                <input id="login_button" type="submit" name="go" value="<?php echo $this->_tpl_vars['lang']['login']; ?>
" />
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bottom">
                <div class="left"></div>
                <div class="center"></div>
                <div class="right"></div>
            </div>
        </div>
    </div>
    <div id="crosspiece"></div>
</div>

<!-- copyrights -->
<div id="login_footer">
    &copy; <a href="<?php echo $this->_tpl_vars['lang']['flynax_url']; ?>
"><?php echo $this->_tpl_vars['lang']['copy_rights']; ?>
</a> <?php echo $this->_tpl_vars['lang']['version']; ?>
 <b><?php echo $this->_tpl_vars['config']['rl_version']; ?>
</b>
</div>
<!-- copyrights end -->

<script type="text/javascript">//<![CDATA[
var lang = new Array();

lang['loading'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['loading'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
lang['alert'] = '<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['alert'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';

<?php if (isset ( $_GET['session_expired'] ) || $_GET['action'] == 'session_expired'): ?>
    fail_alert('', '<?php echo $this->_tpl_vars['lang']['session_expired']; ?>
');
<?php endif; ?>

<?php echo '

var is_visible = true;

$(document).ready(function(){

    /* submit handler */
    $(\'#login_button\').click(function(){
        jsLogin("'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['rl_empty_username'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\r\t\n]/', '<br />') : smarty_modifier_regex_replace($_tmp, '/[\r\t\n]/', '<br />')); ?>
<?php echo '", "'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['rl_empty_pass'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/[\r\t\n]/', '<br />') : smarty_modifier_regex_replace($_tmp, '/[\r\t\n]/', '<br />')); ?>
<?php echo '");
    });

    /* height handler */
    var heightHandler = function(){
        var height = Math.floor((( $(window).height() - 54 ) / 2 ) - 155);
        height = height <= 0 ? 30 : height;

        $(\'#middle\').css(\'padding-top\', height);
    };

    heightHandler();

    $(window).resize(function(){
        heightHandler();
    });
});

'; ?>

//]]>
</script>

<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplLogin'), $this);?>


</body>
</html>