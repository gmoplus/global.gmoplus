<?php /* Smarty version 2.6.31, created on 2025-08-18 09:57:30
         compiled from /home/gmoplus/global.gmoplus.com/plugins/tag_cloud/admin/tag_cloud.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/tag_cloud/admin/tag_cloud.tpl', 24, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/tag_cloud/admin/tag_cloud.tpl', 209, false),array('function', 'fckEditor', '/home/gmoplus/global.gmoplus.com/plugins/tag_cloud/admin/tag_cloud.tpl', 241, false),)), $this); ?>
<!-- tag cloud tpl -->
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.caret.js"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <?php if (! isset ( $_GET['action'] )): ?>
        <a onclick="show('search', '#action_blocks div');" href="javascript:void(0)" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
        <a onclick="show('import', '#action_blocks div');" href="javascript:void(0)" class="button_bar"><span class="left"></span><span class="center_import"><?php echo $this->_tpl_vars['lang']['tc_import']; ?>
</span><span class="right"></span></a>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=defaults" class="button_bar"><span class="left"></span><span class="center"><?php echo $this->_tpl_vars['lang']['tc_defaults']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($_GET['action'] != 'add'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center_add"><?php echo $this->_tpl_vars['lang']['tc_add_tag']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['tc_tag_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<div id="action_blocks">
    <?php if (! isset ( $_GET['action'] )): ?>

        <!-- search -->
        <div id="search" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <form method="post" onsubmit="return false;" id="search_form" action="">
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['tc_name']; ?>
</td>
                <td class="field">
                    <input type="text" id="search_name" />
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                <td class="field">
                    <select id="search_status" style="width: 200px;">
                        <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                        <option value="active"><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval"><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" id="search_button" />
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_search_button" />

                    <a class="cancel" href="javascript:void(0)" onclick="show('search', '#action_blocks div');"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>

            </table>
        </form>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <script type="text/javascript">
        var remote_filters = new Array();
        <?php if ($_GET['type']): ?>
            remote_filters.push( 'action||search' );
            remote_filters.push( 'Type||<?php echo $_GET['type']; ?>
' );
        <?php endif; ?>

        <?php echo '

        var search = new Array();
        var cookie_filters = new Array();

        $(document).ready(function(){

            if ( readCookie(\'tags_sc\') || remote_filters.length > 0 )
            {
                $(\'#search\').show();
                cookie_filters = remote_filters.length > 0 ? remote_filters : readCookie(\'tags_sc\').split(\',\');

                for (var i in cookie_filters)
                {
                    if ( typeof(cookie_filters[i]) == \'string\' )
                    {
                        var item = cookie_filters[i].split(\'||\');
                        if ( item[0] != \'undefined\' && item[0] != \'\' )
                        {
                            if ( item[0] == \'Lock\' )
                            {
                                $(\'#search input\').each(function(){
                                    var val = item[1] == 1 ? \'yes\' : \'no\';
                                });
                            }
                            else
                            {
                                if ( item[0] == \'Parent_ID\' )
                                {
                                    item[0] = \'parent\';
                                }

                                $(\'#search_\'+item[0].toLowerCase()).selectOptions(item[1]);
                            }
                        }
                    }
                }
            }

            $(\'#search_form\').submit(function(){
                createCookie(\'tags_pn\', 0, 1);
                search = new Array();
                search.push( new Array(\'action\', \'search\') );
                search.push( new Array(\'Name\', $(\'#search_name\').val()) );
                search.push( new Array(\'Type\', $(\'#search_type\').val()) );
                search.push( new Array(\'Status\', $(\'#search_status\').val()) );

                var save_search = new Array();
                for(var i in search)
                {
                    if ( search[i][1] != \'\' && typeof(search[i][1]) != \'undefined\'  )
                    {
                        save_search.push(search[i][0]+\'||\'+search[i][1]);
                    }
                }
                createCookie(\'tags_sc\', save_search, 1);

                tagsGrid.filters = search;
                tagsGrid.reload();
            });

            $(\'#reset_search_button\').click(function(){
                eraseCookie(\'tags_sc\');
                tagsGrid.reset();

                $("#search select option[value=\'\']").attr(\'selected\', true);
                $("#search input[type=text]").val(\'\');
                $("#search input").each(function(){
                    if ( $(this).attr(\'type\') == \'radio\' )
                    {
                        $(this).prop(\'checked\', false);
                    }
                });
            });

        });

        '; ?>

        </script>
        <!-- search end -->

        <!-- import -->
        <div id="import" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['tc_import'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <form method="post" onsubmit="return false;" id="import_form" action="">
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['tc_import_field']; ?>
</td>
                <td class="field">
                    <textarea cols="50" rows="2" name="tags"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="field">
                    <input type="submit" class="button" value="<?php echo $this->_tpl_vars['lang']['import']; ?>
" id="import_button" />
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_import_button" />

                    <a class="cancel" href="javascript:void(0)" onclick="show('import', '#action_blocks div');"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                </td>
            </tr>

            </table>
        </form>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <script type="text/javascript">
        <?php echo '
            $(document).ready(function(){
                $(\'#import_form\').submit(function(){
                    xajax_importTags( $("#import textarea[name=tags]").val() );
                });

                $(\'#reset_import_button\').click(function(){
                    $("#import textarea[name=tags]").val(\'\');
                });
            });
        '; ?>

        </script>
        <!-- import end -->
    <?php endif; ?>

</div>

<?php if ($_GET['action'] == 'defaults'): ?>
    <?php $this->assign('sPost', $_POST); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <span class="field_description" style="margin:10px"><?php echo $this->_tpl_vars['lang']['tc_defaults_hint']; ?>
</span>

    <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=defaults" method="post" enctype="multipart/form-data">
    <input type="hidden" name="submit" value="1" />
    <input type="hidden" name="fromPost" value="1" />

    <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['title']; ?>
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
                        <input type="text" name="title[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['title'][$this->_tpl_vars['language']['Code']]; ?>
" class="w350" maxlength="50" />
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['title']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['h1_heading']; ?>
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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="ckeditor tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <?php $this->assign('dCode', ((is_array($_tmp='h1_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                    <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='h1_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['description']; ?>

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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="ckeditor tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <?php $this->assign('dCode', ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                    <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>

        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['meta_description']; ?>
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
                    <?php $this->assign('lMetaDescription', $this->_tpl_vars['sPost']['meta_description']); ?>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <textarea cols="50" rows="2" name="meta_description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['lMetaDescription'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="field">
                <input type="submit" value="<?php echo $this->_tpl_vars['lang']['edit']; ?>
" />
            </td>
        </tr>
        </table>
        </form>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>
        <?php $this->assign('sPost', $_POST); ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;key=<?php echo $_GET['key']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="submit" value="1" />

        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>

        <table class="form">
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['listing_type']; ?>

            </td>
            <td class="field">
                <select name="type" id="listing_type">
                    <option value="0"><?php echo $this->_tpl_vars['lang']['all']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span class="field_description"> - <?php echo $this->_tpl_vars['lang']['tc_ltype_hint']; ?>
</span>
                <span id="listing_type_loading" style="margin-top: -2px;" class="loader">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </tr>
        <tr>
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['tc_name']; ?>

            </td>
            <td class="field">
                <input type="text" name="tag" value="<?php echo $this->_tpl_vars['sPost']['tag']; ?>
" class="w350" maxlength="50" />
            </td>
        </tr>
        <tr>
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['h1_heading']; ?>

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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="ckeditor tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <?php $this->assign('dCode', ((is_array($_tmp='h1_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                    <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='h1_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['tc_tag_path']; ?>
</td>
            <td class="field">
                <?php $this->assign('type_page', ((is_array($_tmp='lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['type']))); ?>
                <table>
                <tr>
                    <td><span style="padding: 0 5px 0 0;" class="field_description_noicon"><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo $this->_tpl_vars['tags_page_path']; ?>
<span id="ab">/</span><span id="ap"></span></span></td>
                    <td><input type="text" name="path" value="<?php echo $this->_tpl_vars['sPost']['path']; ?>
" /></td>
                    <td><span class="field_description_noicon" id="cat_postfix_el"><?php if ($this->_tpl_vars['config']['tc_urls_postfix']): ?>.html<?php else: ?>/<?php endif; ?></span>
                    <span class="field_description"> - <?php echo $this->_tpl_vars['lang']['tc_path_hint']; ?>
</span></td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['title']; ?>
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
                        <input type="text" name="title[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['title'][$this->_tpl_vars['language']['Code']]; ?>
" class="w350" maxlength="50" />
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['title']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['description']; ?>

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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="ckeditor tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <?php $this->assign('dCode', ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                    <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='description_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['meta_description']; ?>
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
                    <?php $this->assign('lMetaDescription', $this->_tpl_vars['sPost']['meta_description']); ?>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <textarea cols="50" rows="2" name="meta_description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['lMetaDescription'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
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

        <tr>
            <td></td>
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
<?php else: ?>
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
        var tagsGrid;

        <?php echo '
        $(document).ready(function(){
            tagsGrid = new gridObj({
                key: \'tags\',
                id: \'grid\',
                ajaxUrl: rlPlugins + \'tag_cloud/admin/tag_cloud.inc.php?q=ext\',
                defaultSortField: \'Date\',
                defaultSortType: \'DESC\',
                remoteSortable: true,
                filters: cookie_filters,
                title: '; ?>
'<?php echo $this->_tpl_vars['lang']['tc_manager']; ?>
'<?php echo ',
                fields: [
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'name\', mapping: \'name\', type: \'string\'},
                    {name: \'Type\', mapping: \'Type\'},
                    {name: \'Count\', mapping: \'Count\'},
                    {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Key\', mapping: \'Key\'}
                ],
                columns: [
                    {
                        header: \''; ?>
<?php echo $this->_tpl_vars['lang']['tc_tag']; ?>
<?php echo '\',
                        dataIndex: \'name\',
                        width: 60,
                        id: \'rlExt_item_bold\'
                    },{
                        header: \''; ?>
<?php echo $this->_tpl_vars['lang']['tc_tag_count']; ?>
<?php echo '\',
                        dataIndex: \'Count\',
                        width: 20,
                        id: \'rlExt_item\',
                        editor: new Ext.form.NumberField({
                            allowBlank: false,
                            allowDecimals: false
                        }),
                        renderer: function(val){
                            return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                    },{
                        header: lang[\'ext_add_date\'],
                        dataIndex: \'Date\',
                        width: 10,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 10,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'active\', lang[\'ext_active\']],
                                [\'approval\', lang[\'ext_approval\']]
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
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(id, obj, row) {
                            var tag_id = row.data.ID;
                            var tag_key = row.data.Key;

                            var out = "<center>";

/*                          out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=view&key="+tag_key+"\'><img class=\'view\' ext:qtip=\'"+lang[\'ext_view\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";*/
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&key="+tag_key+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_delete\']+"\\", \\"xajax_deleteTag\\", \\""+tag_key+"\\" )\' />";

                            out += "</center>";

                            return out;
                        }
                    }
                ]
            });

            tagsGrid.init();
            grid.push(tagsGrid.grid);

        });
        '; ?>

        //]]>
    </script>
<?php endif; ?>