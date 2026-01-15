<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:59
         compiled from controllers/pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/pages.tpl', 5, false),array('function', 'fckEditor', 'controllers/pages.tpl', 340, false),array('modifier', 'cat', 'controllers/pages.tpl', 24, false),array('modifier', 'count', 'controllers/pages.tpl', 175, false),array('modifier', 'explode', 'controllers/pages.tpl', 450, false),array('modifier', 'in_array', 'controllers/pages.tpl', 461, false),array('modifier', 'strpos', 'controllers/pages.tpl', 549, false),array('modifier', 'regex_replace', 'controllers/pages.tpl', 557, false),)), $this); ?>
<!-- pages tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesNavBar'), $this);?>


    <?php if (! isset ( $_GET['action'] )): ?>
        <?php echo '<a id="search_button_bar" href="#" class="button_bar"><span class="left"></span><span class="center_search">'; ?><?php echo $this->_tpl_vars['lang']['search']; ?><?php echo '</span><span class="right"></span></a>'; ?>

    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_page']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>
    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['pages_list']; ?>
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

            <form method="post" id="search_form" action="">
                <table class="form">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                    <td class="field">
                        <input type="text" id="search_name" />
                    </td>
                </tr>

                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['page_type']; ?>
</td>
                    <td class="field">
                        <select id="search_page_type" class="w200">
                            <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>

                            <?php $_from = $this->_tpl_vars['l_page_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pKey'] => $this->_tpl_vars['pType']):
?>
                                <option value="<?php echo $this->_tpl_vars['pKey']; ?>
"><?php echo $this->_tpl_vars['pType']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </td>
                </tr>

                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesSearch'), $this);?>


                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                    <td class="field">
                        <select id="search_status" class="w200">
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
                        <input type="reset" id="reset_search_input" class="hide">

                        <a id="cancel_button" class="cancel" href="#"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
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

        <script type="text/javascript"><?php echo '
        var search         =  new Array();
        var cookie_filters = readCookie(\'pages_sc\') ? readCookie(\'pages_sc\').split(\',\') : new Array();

        $(document).ready(function(){
            // fill search form
            if (cookie_filters.length > 0) {
                show(\'search\');

                for (var i in cookie_filters) {
                    if (typeof(cookie_filters[i]) == \'string\') {
                        var item = cookie_filters[i].split(\'||\');

                        if (item[0] != \'undefined\' && item[0] != \'\') {
                            $(\'#search_\' + item[0].toLowerCase()).val(item[1]);
                        }
                    }
                }
            }

            // search pages by selected criteria
            $(\'#search_form\').submit(function(event){
                event.preventDefault();

                search = new Array();
                search.push(new Array(\'action\', \'search\'));
                search.push(new Array(\'Name\', $(\'#search_name\').val()));
                search.push(new Array(\'Page_type\', $(\'#search_page_type\').val()));
                search.push(new Array(\'Status\', $(\'#search_status\').val()));

                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesSearchJS'), $this);?>
<?php echo '

                // save search criteria
                var save_search = new Array();
                for (var i in search) {
                    if (typeof(search[i][1]) != \'undefined\' && search[i][1] != \'\') {
                        save_search.push(search[i][0] + \'||\' + search[i][1]);
                    }
                }
                createCookie(\'pages_sc\', save_search, 1);

                pagesGrid.filters = search;
                pagesGrid.reload();
            });

            // show search form
            $(\'#search_button_bar\').on(\'click\', function(){
                if ($(\'#search\').is(\':visible\')) {
                    eraseCookie(\'pages_sc\');
                }

                show(\'search\', \'#action_blocks div\');
            });

            // close search form
            $(\'#cancel_button\').on(\'click\', function(){
                show(\'search\');
                eraseCookie(\'pages_sc\');
            });

            // reset search form and reload grid
            $(\'#reset_search_button\').on(\'click\', function(){
                eraseCookie(\'pages_sc\');
                pagesGrid.reset();
                $(\'#reset_search_input\').trigger(\'click\');
            });
        });
        '; ?>
</script>
        <!-- search end -->
    <?php endif; ?>
</div>

<?php if ($_GET['action']): ?>

    <?php $this->assign('sPost', $_POST); ?>

    <!-- add/edit new page -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form onsubmit="return submitHandler()"
        action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit<?php endif; ?>&page=<?php echo $_GET['page']; ?>
"
        method="post">
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
        <td class="name">
            <?php echo $this->_tpl_vars['lang']['h1_heading']; ?>

        </td>
        <td class="field">
            <div<?php if (! $this->_tpl_vars['config']['home_page_h1'] && $_GET['page'] == 'home'): ?> id="h1_hidden_content" class="hide"<?php endif; ?>>
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
                    <input type="text" name="h1_heading[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['h1_heading'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350" class="w350" />
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                            <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['h1_heading']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </div>

            <?php if (! $this->_tpl_vars['config']['home_page_h1'] && $_GET['page'] == 'home'): ?>
                <div id="h1_hint">
                    <div style="padding: 2px 0 4px;">
                        <a href="javascript://" class="button" style="margin: 0;text-transform: capitalize;"><?php echo $this->_tpl_vars['lang']['enabled']; ?>
</a> <span class="field_description"><?php echo $this->_tpl_vars['lang']['h1_heading_restriction_note']; ?>
</span>
                    </div>
                </div>

                <script>
                <?php echo '

                $(document).ready(function(){
                    $(\'#h1_hint a.button\').click(function(){
                        $.post(rlConfig[\'ajax_url\'], {item: \'configUpdate\', key: \'home_page_h1\', value: 1}, function(response){
                            if (response.status == \'OK\') {
                                $(\'#h1_hint\').slideUp(\'normal\', function(){
                                    $(\'#h1_hidden_content\').slideDown();
                                });
                            } else {
                                printMessage(\'error\', lang[\'system_error\']);
                            }
                        }, \'json\');
                    });
                });

                '; ?>

                </script>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td class="name">
            <span class="red">*</span><?php echo $this->_tpl_vars['lang']['title']; ?>

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
" maxlength="350" class="w350" />
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
                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                <textarea cols="" rows="" name="meta_description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['sPost']['meta_description'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['meta_keywords']; ?>
</td>
        <td>
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
                <textarea cols="" rows="" name="meta_keywords[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['sPost']['meta_keywords'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <tr <?php if ($this->_tpl_vars['sPost']['key'] == 'home' && $_GET['action'] == 'edit'): ?>class="hide"<?php endif; ?>>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['page_type']; ?>
</td>
        <td class="field">
            <select name="page_type" id="page_types">
            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
            <?php $_from = $this->_tpl_vars['l_page_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pKey'] => $this->_tpl_vars['pType']):
?>
                <option value="<?php echo $this->_tpl_vars['pKey']; ?>
" <?php if ($this->_tpl_vars['sPost']['page_type'] == $this->_tpl_vars['pKey']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['pType']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    </table>

    <div id="ptypes">
        <div class="hide" id="ptype_static">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['page_content']; ?>
</td>
                <td class="field ckeditor">
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
                        <?php $this->assign('dCode', ((is_array($_tmp='content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
                        <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => ((is_array($_tmp='content_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code'])),'width' => '100%','height' => '140','value' => $this->_tpl_vars['sPost'][$this->_tpl_vars['dCode']]), $this);?>

                        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            </table>
        </div>

        <div class="hide" id="ptype_system">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['page_controller']; ?>
</td>
                <td class="field">
                    <input name="controller" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['controller']; ?>
" maxlength="25" />
                    <?php if ($_GET['action'] == 'edit'): ?>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['change_controller_notice']; ?>
</span>
                    <?php endif; ?>
                </td>
            </tr>
            </table>
        </div>

        <div class="hide" id="ptype_external">
            <table class="form">
            <tr>
                <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['external_url']; ?>
</td>
                <td class="field">
                    <input name="external_url" type="text" style="width: 250px;" value="<?php if ($this->_tpl_vars['sPost']['external_url']): ?><?php echo $this->_tpl_vars['sPost']['external_url']; ?>
<?php else: ?>http://<?php endif; ?>" />
                </td>
            </tr>
            </table>
        </div>
    </div>

    <div id="page_url">
        <table class="form">
        <tr <?php if ($this->_tpl_vars['sPost']['key'] == 'home' && $_GET['action'] == 'edit'): ?>class="hide"<?php endif; ?>>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['page_url']; ?>
</td>
            <td class="field">
                <table>
                <tr>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths'] && ! in_array ( $this->_tpl_vars['sPost']['key'] , $this->_tpl_vars['nonMultilingualPages'] )): ?>
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
                        <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths'] && ! in_array ( $this->_tpl_vars['sPost']['key'] , $this->_tpl_vars['nonMultilingualPages'] )): ?>
                            <div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
">
                        <?php endif; ?>

                        <span style="padding: 0 5px 0 0;" class="field_description_noicon">
                            <?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php if ($this->_tpl_vars['language']['Code'] !== $this->_tpl_vars['config']['lang']): ?><?php echo $this->_tpl_vars['language']['Code']; ?>
/<?php endif; ?>
                        </span>
                        <input name="path[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" type="text" value="<?php echo $this->_tpl_vars['sPost']['path'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="40" />
                        <span class="field_description_noicon">.html</span>

                        <?php if ($this->_tpl_vars['config']['multilingual_paths'] && in_array ( $this->_tpl_vars['sPost']['key'] , $this->_tpl_vars['nonMultilingualPages'] )): ?>
                            <span class="field_description"><?php echo $this->_tpl_vars['lang']['multilingual_path_denied']; ?>
</span>
                        <?php endif; ?>

                        <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths'] && ! in_array ( $this->_tpl_vars['sPost']['key'] , $this->_tpl_vars['nonMultilingualPages'] )): ?>
                            </div>
                        <?php endif; ?>

                        <?php if (! $this->_tpl_vars['config']['multilingual_paths'] || in_array ( $this->_tpl_vars['sPost']['key'] , $this->_tpl_vars['nonMultilingualPages'] )): ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['login_only']; ?>
</td>
            <td class="field">
                <?php if ($this->_tpl_vars['sPost']['login'] == '1'): ?>
                    <?php $this->assign('login_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['login'] == '0'): ?>
                    <?php $this->assign('login_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('login_no', 'checked="checked"'); ?>
                <?php endif; ?>

                <?php if ($_GET['action'] == 'edit' && in_array ( $this->_tpl_vars['sPost']['controller'] , $this->_tpl_vars['login_required_page_controllers'] )): ?>
                    <?php $this->assign('login_required', 'disabled="disabled"'); ?>
                    <input type="hidden" name="login" value="1" />
                <?php endif; ?>

                <label><input <?php echo $this->_tpl_vars['login_yes']; ?>
 <?php echo $this->_tpl_vars['login_required']; ?>
 class="lang_add" type="radio" name="login" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['login_no']; ?>
 <?php echo $this->_tpl_vars['login_required']; ?>
 class="lang_add" type="radio" name="login" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

                <?php if ($this->_tpl_vars['login_required']): ?>
                    <span class="field_description"><?php echo $this->_tpl_vars['lang']['page_login_required_hint']; ?>
</span>
                <?php endif; ?>
            </td>
        </tr>
        </table>
    </div>

    <table class="form">
    <tr <?php if ($_GET['action'] == 'edit' && in_array ( $_GET['page'] , explode(',', 'add_listing,edit_listing') )): ?>class="hide"<?php endif; ?>>
        <td class="name"><?php echo $this->_tpl_vars['lang']['deny_access_for']; ?>
</td>
        <td class="field">
            <fieldset class="light">
                <?php $this->assign('account_types_phrase', 'admin_controllers+name+account_types'); ?>
                <legend id="legend_account_types" class="up" onclick="fieldset_action('account_types');"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['account_types_phrase']]; ?>
</legend>
                <div id="account_types">
                <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ac_type'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ac_type']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['a_type']):
        $this->_foreach['ac_type']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['a_type']['Key'] != 'visitor'): ?>
                        <div style="padding: 2px 0 2px 5px;">
                            <input <?php if ($this->_tpl_vars['sPost']['deny'] && ((is_array($_tmp=$this->_tpl_vars['a_type']['ID'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['sPost']['deny']) : in_array($_tmp, $this->_tpl_vars['sPost']['deny']))): ?>checked="checked"<?php endif; ?>
                                   style="margin-bottom: 0px;"
                                   type="checkbox"
                                   id="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"
                                   value="<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"
                                   name="deny[]"
                            /> <label for="account_type_<?php echo $this->_tpl_vars['a_type']['ID']; ?>
"><?php echo $this->_tpl_vars['a_type']['name']; ?>
</label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                </div>
            </fieldset>

            <div class="grey_area" style="margin-bottom: 10px;">
                <span onclick="$('#account_types input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                <span class="divider"> | </span>
                <span onclick="$('#account_types input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
            </div>
        </td>
    </tr>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['no_follow']; ?>
</td>
        <td class="field">
            <?php if ($this->_tpl_vars['sPost']['no_follow'] == '1'): ?>
                <?php $this->assign('no_follow_yes', 'checked="checked"'); ?>
            <?php elseif ($this->_tpl_vars['sPost']['no_follow'] == '0'): ?>
                <?php $this->assign('no_follow_no', 'checked="checked"'); ?>
            <?php else: ?>
                <?php $this->assign('no_follow_no', 'checked="checked"'); ?>
            <?php endif; ?>
            <label><input <?php echo $this->_tpl_vars['no_follow_yes']; ?>
 class="lang_add" type="radio" name="no_follow" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
            <label><input <?php echo $this->_tpl_vars['no_follow_no']; ?>
 class="lang_add" type="radio" name="no_follow" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
        </td>
    </tr>
    </table>

    <div id="tpl_cont">
        <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['use_tpl']; ?>
</td>
            <td class="field">
                <?php if ($this->_tpl_vars['sPost']['tpl'] == '1'): ?>
                    <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['tpl'] == '0'): ?>
                    <?php $this->assign('tpl_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('tpl_yes', 'checked="checked"'); ?>
                <?php endif; ?>
                <label><input <?php echo $this->_tpl_vars['tpl_yes']; ?>
 class="lang_add" type="radio" name="tpl" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['tpl_no']; ?>
 class="lang_add" type="radio" name="tpl" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            </td>
        </tr>
        </table>
    </div>

    <table class="form">
    <tr>
        <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['show_in_menu']; ?>
</td>
        <td class="field">
            <fieldset class="light">
                <legend id="legend_menus" class="up" onclick="fieldset_action('menus');"><?php echo $this->_tpl_vars['lang']['menus']; ?>
</legend>
                <div id="menus" class="menus">
                    <?php $this->assign('cMenu', $this->_tpl_vars['sPost']['menus']); ?>
                    <?php $_from = $this->_tpl_vars['l_menu_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mType'] => $this->_tpl_vars['menu']):
?>
                        <div style="padding: 2px 0 2px 5px;">
                            <input <?php if ($this->_tpl_vars['mType'] == $this->_tpl_vars['cMenu'][$this->_tpl_vars['mType']]): ?>checked="checked"<?php endif; ?> class="lang_add" type="checkbox" name="menus[<?php echo $this->_tpl_vars['mType']; ?>
]" value="<?php echo $this->_tpl_vars['mType']; ?>
" id="m_<?php echo $this->_tpl_vars['mType']; ?>
" /> <label for="m_<?php echo $this->_tpl_vars['mType']; ?>
"><?php echo $this->_tpl_vars['menu']; ?>
</label><br />
                        </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
            </fieldset>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesMenus'), $this);?>


            <div class="grey_area" style="margin-bottom: 10px;">
                <span onclick="$('.menus input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                <span class="divider"> | </span>
                <span onclick="$('.menus input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
            </div>
        </td>
    </tr>


    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesForm'), $this);?>


    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
        <td class="field">
            <select name="status" <?php if (((is_array($_tmp=$this->_tpl_vars['sPost']['key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'lt') : strpos($_tmp, 'lt')) === 0 && $_GET['action'] == 'edit'): ?>disabled class="disabled"<?php endif; ?>>
                <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
            </select>

            <?php if (((is_array($_tmp=$this->_tpl_vars['sPost']['key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'lt') : strpos($_tmp, 'lt')) === 0 && $_GET['action'] == 'edit'): ?>
                <input type="hidden" name="status" value="<?php echo $this->_tpl_vars['sPost']['status']; ?>
" />
                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a target="_blank" href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['rlBase']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['rlBase'])))) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=listing_types">$1</a>') : smarty_modifier_cat($_tmp, 'index.php?controller=listing_types">$1</a>'))); ?>
                <span class="field_description"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['prevent_disabling_lt_page'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>
 </span>
            <?php endif; ?>
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
    <!-- add new page end -->

    <!-- additional JS -->
    <?php if ($_POST['page_type']): ?>
    <script type="text/javascript">
    <?php echo '
    $(document).ready(function(){
        show(\'ptype_'; ?>
<?php echo $_POST['page_type']; ?>
<?php echo '\', \'#ptypes div\');
    });
    '; ?>

    </script>
    <?php endif; ?>

    <script type="text/javascript">
    <?php echo '
    var page_type_change = function(val){
        if (val == \'external\') {
            $(\'#page_url\').slideUp(\'slow\');
        } else {
            $(\'#page_url\').slideDown(\'slow\');
        }

        if (val == \'system\') {
            $(\'#tpl_cont\').slideUp(\'slow\');
        } else {
            $(\'#tpl_cont\').slideDown(\'slow\');
        }
    }
    $(\'#page_types\').change(function(){
        show(\'ptype_\'+$(this).val(), \'#ptypes div\');

        page_type_change($(this).val());
    });
    page_type_change($(\'#page_types\').val());
    '; ?>

    </script>
    <!-- additional JS end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesAction'), $this);?>


<?php else: ?>

    <!-- pages grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var pagesGrid;

    <?php echo '
    $(document).ready(function(){

        pagesGrid = new gridObj({
            key: \'pages\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/pages.inc.php?q=ext\',
            defaultSortField: \'name\',
            title: lang[\'ext_pages_manager\'],
            filters: cookie_filters,
            fields: [
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Page_type\', mapping: \'Page_type\'},
                {name: \'Login\', mapping: \'Login\'},
                {name: \'Key\', mapping: \'Key\'},
                {name: \'No_follow\', mapping: \'No_follow\'},
                {name: \'Login_required\', mapping: \'Login_required\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    id: \'rlExt_item_bold\',
                    width: 50
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Page_type\',
                    id: \'rlExt_item\',
                    width: 15
                },{
                    header: lang[\'ext_need_login\'],
                    dataIndex: \'Login\',
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
                    renderer: function(val, ext, row){
                        return \'<span ext:qtip="\'+lang[row.data.Login_required ? \'page_login_required_hint\' : \'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_no_follow\'],
                    dataIndex: \'No_follow\',
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
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 10,
                    editor: new Ext.form.NumberField({
                        allowBlank: false,
                        allowDecimals: false
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 15,
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
                        selectOnFocus:true,
                        listeners: {
                            beforeselect: function(combo){
                                // prevent of the disabling system listing type pages
                                if (combo.gridEditor.record.data.Key.indexOf(\'lt_\') === 0) {
                                    var notice = \''; ?>
<?php echo $this->_tpl_vars['lang']['prevent_disabling_lt_page']; ?>
<?php echo '\';
                                    var url    = rlUrlHome + \'index.php?controller=listing_types\';

                                    printMessage(
                                        \'error\',
                                        notice.replace(/\\[(.*)\\]/i, \'<a target="_blank" href="\' + url + \'">$1</a>\')
                                    );
                                    return false;
                                }
                            }
                        }
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 70,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data) {
                        var out = "<center>";
                        var splitter = false;

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&page="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_\'+delete_mod]+"\\", \\"xajax_deletePage\\", \\""+Array(data)+"\\", \\"page_load\\" )\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesGrid'), $this);?>
<?php echo '

        pagesGrid.init();
        grid.push(pagesGrid.grid);

        pagesGrid.grid.addListener(\'beforeedit\', function(editEvent){
            if (editEvent.field == \'Login\' && editEvent.record.data.Login_required) {
                editEvent.cancel = true;
                pagesGrid.store.rejectChanges();
            }
        });

    });
    '; ?>

    //]]>
    </script>
    <!-- pages grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplPagesBottom'), $this);?>


<?php endif; ?>

<!-- pages end -->