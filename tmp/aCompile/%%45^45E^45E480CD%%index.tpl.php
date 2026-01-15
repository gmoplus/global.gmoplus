<?php /* Smarty version 2.6.31, created on 2025-07-28 09:41:07
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'index.tpl', 38, false),array('modifier', 'replace', 'index.tpl', 288, false),array('modifier', 'escape', 'index.tpl', 318, false),array('modifier', 'cat', 'index.tpl', 333, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- header sliders -->
<?php if ($this->_tpl_vars['cInfo']['Controller'] == 'home'): ?>
    <div id="sliders_container">
        <div id="sliders_areas">
            <div class="hide slider_item" id="area_desktop">
                <div class="caption"><?php echo $this->_tpl_vars['lang']['desktop']; ?>
</div>
                <div class="body">
                    <table class="sTable">
                    <tr>
                        <td valign="top">
                            <fieldset>
                                <legend><?php echo $this->_tpl_vars['lang']['desktop_blocks']; ?>
</legend>
                                
                                <table class="sTable" id="ap_blocks_manager">
                                <tr class="header">
                                    <td><div><?php echo $this->_tpl_vars['lang']['name']; ?>
</div></td>
                                    <td class="divider"></td>
                                    <td align="center" style="width: 90px"><div><?php echo $this->_tpl_vars['lang']['fixed_height']; ?>
</div></td>
                                    <td class="divider"></td>
                                    <td align="center" style="width: 55px"><div><?php echo $this->_tpl_vars['lang']['show']; ?>
</div></td>
                                </tr>
                                <?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['apB'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['apB']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block']):
        $this->_foreach['apB']['iteration']++;
?>
                                <tr class="body">
                                    <td <?php if ($this->_foreach['apB']['iteration']%2 == 0): ?>class="highlighted"<?php endif; ?>><?php echo $this->_tpl_vars['block']['name']; ?>
</td>
                                    <td class="divider"></td>
                                    <td align="center" <?php if ($this->_foreach['apB']['iteration']%2 == 0): ?>class="highlighted"<?php endif; ?>>
                                        <input id="apfblock:<?php echo $this->_tpl_vars['block']['Key']; ?>
" type="checkbox" <?php if ($this->_tpl_vars['block']['Fixed']): ?>checked="checked"<?php endif; ?> />
                                    </td>
                                    <td class="divider"></td>
                                    <td align="center" <?php if ($this->_foreach['apB']['iteration']%2 == 0): ?>class="highlighted"<?php endif; ?>>
                                        <input id="apsblock:<?php echo $this->_tpl_vars['block']['Key']; ?>
" type="checkbox" <?php if ($this->_tpl_vars['block']['Status'] == 'active'): ?>checked="checked"<?php endif; ?> />
                                    </td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?>
                                
                                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderBlocksListEnd'), $this);?>

                                
                                </table>
                            </fieldset>
                        </td>
                        <td style="width: 10px;"></td>
                        <td valign="top">
                            <fieldset style="padding-bottom: 5px;">
                                <legend><?php echo $this->_tpl_vars['lang']['desktop_settings']; ?>
</legend>
                                
                                <table class="sTable" id="ap_settings">
                                <tr class="header">
                                    <td><div><?php echo $this->_tpl_vars['lang']['name']; ?>
</div></td>
                                    <td class="divider"></td>
                                    <td style="width: 105px;"><div><?php echo $this->_tpl_vars['lang']['value']; ?>
</div></td>
                                </tr>
                                <?php $_from = $this->_tpl_vars['desktop_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['apS'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['apS']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['setting']):
        $this->_foreach['apS']['iteration']++;
?>
                                <tr class="body">
                                    <td <?php if ($this->_foreach['apS']['iteration']%2 == 0): ?>class="highlighted"<?php endif; ?>><?php echo $this->_tpl_vars['setting']['Name']; ?>
</td>
                                    <td class="divider"></td>
                                    <td align="center" <?php if ($this->_foreach['apS']['iteration']%2 == 0): ?>class="highlighted"<?php endif; ?>>
                                        <?php if ($this->_tpl_vars['setting']['Type'] == 'number'): ?>
                                            <input type="text" class="numeric<?php if ($this->_tpl_vars['setting']['Deny']): ?> deny_item<?php endif; ?>" name="<?php echo $this->_tpl_vars['setting']['Key']; ?>
" value="<?php echo $this->_tpl_vars['setting']['Default']; ?>
" style="width: 58px" />
                                        <?php elseif ($this->_tpl_vars['setting']['Type'] == 'bool'): ?>
                                            <input <?php if ($this->_tpl_vars['setting']['Deny']): ?>class="deny_item"<?php endif; ?> type="checkbox"  name="<?php echo $this->_tpl_vars['setting']['Key']; ?>
" <?php if ($this->_tpl_vars['setting']['Default']): ?>checked="checked"<?php endif; ?> />
                                        <?php elseif ($this->_tpl_vars['setting']['Type'] == 'select'): ?>
                                            <select <?php if ($this->_tpl_vars['setting']['Deny']): ?>class="deny_item"<?php endif; ?> style="width: 70px;" name="<?php echo $this->_tpl_vars['setting']['Key']; ?>
">
                                                <?php $_from = $this->_tpl_vars['setting']['Values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s_option']):
?>
                                                    <option <?php if ($this->_tpl_vars['s_option']['Key'] == $this->_tpl_vars['setting']['Default']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['s_option']['Key']; ?>
"><?php echo $this->_tpl_vars['s_option']['name']; ?>
</option>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </select>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?>
                                
                                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderSettingsEnd'), $this);?>

                                
                                <tr>
                                    <td colspan="2"></td>
                                    <td align="center"><input id="save_settings" type="button" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" style="margin: 5px 0 0 0;" /></td>
                                </tr>
                                </table>
                                
                                <script type="text/javascript">
                                var loading = "<?php echo $this->_tpl_vars['lang']['loading']; ?>
";
                                <?php echo '
                                
                                $(\'input#save_settings\').click(function(){
                                    $(this).val(loading);
                                    
                                    var config = new Array();
                                    $(\'table#ap_settings input,table#ap_settings select\').each(function(){
                                        var item = new Array();
                                        item[\'key\'] = $(this).attr(\'name\');
                                        item[\'deny\'] = $(this).hasClass(\'deny_item\') ? 1 : 0;
                                        item[\'value\'] = $(this).attr(\'type\') == \'checkbox\' ? ($(this).attr(\'checked\') ? 1 : 0) : $(this).val() ;
                                        
                                        config.push(item);
                                    });
                                    xajax_saveConfig(config)
                                });
                                
                                '; ?>

                                </script>
                                
                                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderSettingsJS'), $this);?>

                                
                            </fieldset>
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
            
            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderTabsArea'), $this);?>

        </div>
        
        <div id="header_sliders" class="hide">
            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderTabs'), $this);?>

            
            <div class="header_slider" id="slider_desktop">
                <div class="left"></div>
                <div class="center"><?php echo $this->_tpl_vars['lang']['desktop']; ?>
</div>
                <div class="right"></div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    <?php echo '
    
    var slidersOpen = false;
    var currentTab = \'\';
    var slidersHome = -2;
    var activeHeight = 0;
    var slidersPadding = 30;
    
    $(document).ready(function(){
        $(\'div.header_slider\').click(function(){
            $(\'div.header_slider\').removeClass(\'active\');
            $(this).addClass(\'active\');
            slidersShow($(this).attr(\'id\').split(\'_\')[1]);
        });
        
        slidersResize();
        
        $(window).resize(function(){
            slidersResize();
        })
        
        $(\'table#ap_blocks_manager input[type=checkbox]\').click(function(){
            if ( $(this).attr(\'id\').split(\':\')[0] == \'apsblock\' )
            {
                var key = $(this).attr(\'id\').split(\':\')[1];
                var show = $(this).is(\':checked\');
                
                if ( show )
                {
                    $(\'div#apblock\\\\:\'+key).fadeIn();
                    $(\'table#ap_blocks_manager input#apfblock\\\\:\'+key).attr(\'disabled\', false);
                }
                else
                {
                    $(\'div#apblock\\\\:\'+key).fadeOut();
                    $(\'table#ap_blocks_manager input#apfblock\\\\:\'+key).attr(\'disabled\', true);
                }
                
                var blocks_status = new Array();
                $(\'table#ap_blocks_manager input[type=checkbox]\').each(function(){
                    if ( $(this).attr(\'id\').split(\':\')[0] == \'apsblock\' )
                    {
                        var key = $(this).attr(\'id\').split(\':\')[1];
                        var show = $(this).is(\':checked\');
                        
                        blocks_status.push(key+\'|\'+show);
                    }
                });
                
                createCookie(\'ap_blocks_status\', blocks_status.join(\',\'), 365);
            }
            else if (  $(this).attr(\'id\').split(\':\')[0] == \'apfblock\' )
            {
                var key = $(this).attr(\'id\').split(\':\')[1];
                var fixed = $(this).is(\':checked\');
                
                if ( fixed )
                {
                    $(\'div#apblock\\\\:\'+key+\' div.outer div.body\').css(\'height\', \'190px\').css(\'overflow-y\', \'auto\');
                }
                else
                {
                    $(\'div#apblock\\\\:\'+key+\' div.outer div.body\').css(\'height\', \'auto\');
                }
                
                var blocks_fixed = new Array();
                $(\'table#ap_blocks_manager input[type=checkbox]\').each(function(){
                    if (  $(this).attr(\'id\').split(\':\')[0] == \'apfblock\' )
                    {
                        var key = $(this).attr(\'id\').split(\':\')[1];
                        var show = $(this).is(\':checked\');
                        
                        blocks_fixed.push(key+\'|\'+show);
                    }
                });
                
                createCookie(\'ap_blocks_fixed\', blocks_fixed.join(\',\'), 365);
            }
        });
        
        $(\'table#ap_blocks_manager input[type=checkbox]\').each(function(){
            if ( $(this).attr(\'id\').split(\':\')[0] == \'apsblock\' )
            {
                var key = $(this).attr(\'id\').split(\':\')[1];
                var show = $(this).is(\':checked\');
                if ( !show )
                {
                    $(\'table#ap_blocks_manager input#apfblock\\\\:\'+key).attr(\'disabled\', true);
                }
            }
        });
    });
    
    var slidersShow = function(id){
        if ( slidersOpen && id != currentTab )
        {
            var tmp_activeHeight = activeHeight;
            
            $(\'div#area_\'+id).show();
            activeHeight = $(\'div#area_\'+id).height();
            
            $(\'div#area_\'+currentTab).hide();
            $(\'div#area_\'+id).height(tmp_activeHeight).show().animate({
                height: activeHeight
            });
            
            $(\'div#sliders_areas\').animate({
                height: activeHeight + slidersPadding
            });
    
            currentTab = id;
    
            return;
        }
        
        /* get request tab details */
        if ( !slidersOpen )
        {
            $(\'div#area_\'+id).show();
            activeHeight = $(\'div#area_\'+id).height();
            $(\'#sliders_areas\').height(activeHeight + slidersPadding).css(\'margin-top\', (activeHeight + slidersPadding + 1) * -1);
        }
        
        var new_pos_area = !slidersOpen ? -1 : (activeHeight + slidersPadding + 1) * -1;
        
        currentTab = id;
        
        $(\'div#sliders_areas\').animate({
            marginTop: new_pos_area
        }, function(){
            if ( !slidersOpen )
            {
                $(\'div#slider_\'+id).removeClass(\'active\');
                $(\'.slider_item\').hide();
            }
        });
        
        slidersOpen = !slidersOpen ? true : false;
    }
    
    '; ?>

    </script>
    
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplHeaderTabsJS'), $this);?>

<?php endif; ?>
<!-- header sliders end -->

<div class="middle_right">

    <!-- print bread crumbs -->
    <div id="bc_container"><?php echo ''; ?><?php if ($this->_tpl_vars['cInfo']['Controller'] != 'home'): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo 'index.php" class="bread_crumbs">'; ?><?php echo $this->_tpl_vars['lang']['admin_panel']; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['cInfo']['Controller'] != 'home'): ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['breadCrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bc_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bc_foreach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['bc']):
        $this->_foreach['bc_foreach']['iteration']++;
?><?php echo ''; ?><?php if (($this->_foreach['bc_foreach']['iteration'] == $this->_foreach['bc_foreach']['total'])): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo 'index.php?controller='; ?><?php if (empty ( $this->_tpl_vars['bc']['Controller'] )): ?><?php echo ''; ?><?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['QUERY_STRING'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'controller=', '') : smarty_modifier_replace($_tmp, 'controller=', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '&', '&amp;') : smarty_modifier_replace($_tmp, '&', '&amp;')); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['bc']['Controller']; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['bc']['Vars']): ?><?php echo '&amp;'; ?><?php echo $this->_tpl_vars['bc']['Vars']; ?><?php echo ''; ?><?php endif; ?><?php echo '" class="current">'; ?><?php echo $this->_tpl_vars['bc']['name']; ?><?php echo '</a>'; ?><?php $this->assign('pTitle', $this->_tpl_vars['bc']['name']); ?><?php echo ''; ?><?php else: ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['rlBase']; ?><?php echo 'index.php?controller='; ?><?php echo $this->_tpl_vars['bc']['Controller']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['bc']['Vars']): ?><?php echo '&amp;'; ?><?php echo $this->_tpl_vars['bc']['Vars']; ?><?php echo ''; ?><?php endif; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['bc']['name']; ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('pTitle', $this->_tpl_vars['breadCrumbs']['1']['name']); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
</div>

    <?php if (! empty ( $this->_tpl_vars['pTitle'] )): ?>
        <h1><?php if (empty ( $this->_tpl_vars['cpTitle'] )): ?><?php echo $this->_tpl_vars['pTitle']; ?>
<?php else: ?><?php echo $this->_tpl_vars['cpTitle']; ?>
<?php endif; ?></h1>
    <?php endif; ?>
    <!-- print bread crumbs end -->
    
    <!-- print system notice -->
    <div id="system_message"></div>

    <?php if ($this->_tpl_vars['pNotice'] || $this->_tpl_vars['alerts'] || $this->_tpl_vars['errors'] || $this->_tpl_vars['infos']): ?>
        <script type="text/javascript">
        $(document).ready(function()<?php echo '{ '; ?>

            <?php if ($this->_tpl_vars['pNotice']): ?>
                printMessage('notice', '<?php echo ((is_array($_tmp=$this->_tpl_vars['pNotice'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
');
            <?php elseif ($this->_tpl_vars['alerts']): ?>
                printMessage('alert', '<?php if (is_array ( $this->_tpl_vars['alerts'] )): ?><ul><?php $_from = $this->_tpl_vars['alerts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['alert']):
?><li><?php echo ((is_array($_tmp=$this->_tpl_vars['alert'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</li><?php endforeach; endif; unset($_from); ?></ul><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['alerts'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
<?php endif; ?>');
            <?php elseif ($this->_tpl_vars['errors']): ?>
                printMessage('error', '<?php if (is_array ( $this->_tpl_vars['errors'] )): ?><ul><?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?><li><?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</li><?php endforeach; endif; unset($_from); ?></ul><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['errors'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
<?php endif; ?>');
            <?php elseif ($this->_tpl_vars['infos']): ?>
                printMessage('info', '<?php if (is_array ( $this->_tpl_vars['infos'] )): ?><ul><?php $_from = $this->_tpl_vars['infos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?><li><?php echo ((is_array($_tmp=$this->_tpl_vars['info'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
</li><?php endforeach; endif; unset($_from); ?></ul><?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['infos'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
<?php endif; ?>');
            <?php endif; ?>
        <?php echo '});'; ?>

        </script>
    <?php endif; ?>
    <!-- print system notice end -->
    
    <!-- load controller -->
    <?php if ($this->_tpl_vars['cInfo']['Plugin']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=(defined('RL_PLUGINS') ? @RL_PLUGINS : null))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['cInfo']['Plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['cInfo']['Plugin'])))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'admin') : smarty_modifier_cat($_tmp, 'admin')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['cInfo']['Controller']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['cInfo']['Controller'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.tpl') : smarty_modifier_cat($_tmp, '.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='controllers')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['cInfo']['Controller']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['cInfo']['Controller'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.tpl') : smarty_modifier_cat($_tmp, '.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <!-- load controller end -->
    
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplContentBottom'), $this);?>

    
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>