<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:55
         compiled from controllers/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/news.tpl', 5, false),array('function', 'fckEditor', 'controllers/news.tpl', 279, false),array('modifier', 'cat', 'controllers/news.tpl', 36, false),array('modifier', 'count', 'controllers/news.tpl', 50, false),array('modifier', 'intval', 'controllers/news.tpl', 332, false),)), $this); ?>
<!-- news tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsNavBar'), $this);?>


    <?php if (! $_GET['mode'] || ( $_GET['mode'] === 'categories' && $_GET['action'] )): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
mode=categories" class="button_bar">
            <span class="center_list"><?php echo $this->_tpl_vars['lang']['categories']; ?>
</span>
        </a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && $_GET['mode'] === 'categories' && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
mode=categories&action=add" class="button_bar">
            <span class="center-add"><?php echo $this->_tpl_vars['lang']['add_category']; ?>
</span>
        </a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['mode']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar">
            <span class="center-add"><?php echo $this->_tpl_vars['lang']['add_news']; ?>
</span>
        </a>
    <?php endif; ?>
    <?php if (! $_GET['mode'] || $_GET['mode'] === 'categories'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
" class="button_bar">
            <span class="center_list"><?php echo $this->_tpl_vars['lang']['news_list']; ?>
</span>
        </a>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<?php if ($_GET['action']): ?>
    <?php $this->assign('sPost', $_POST); ?>

    <?php if ($_GET['mode'] === 'categories'): ?>
        <!-- add new category for news -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form onsubmit="return submitHandler()"
            action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
mode=categories&action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;id=<?php echo $_GET['id']; ?>
<?php endif; ?>"
            method="post"
            enctype="multipart/form-data"
        >
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
" maxlength="350" class="w350" />
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
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['url']; ?>
</td>
            <td class="field">
                <table>
                <tr>
                    <td><span style="padding: 0 5px 0 0;" class="field_description_noicon"><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo $this->_tpl_vars['pages']['news']; ?>
/</span></td>
                    <td><input name="path" type="text" value="<?php echo $this->_tpl_vars['sPost']['path']; ?>
" maxlength="40" /></td>
                    <td><span class="field_description_noicon">/</span></td>
                </tr>
                </table>
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsCategoryNavForm'), $this);?>


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
        <!-- add new category for news end -->
    <?php else: ?>
        <!-- add new news -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form onsubmit="return submitHandler()"
            action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;news=<?php echo $_GET['news']; ?>
<?php endif; ?>"
            method="post"
            enctype="multipart/form-data"
        >
        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>
        <table class="form">
                <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['category']; ?>
</td>
            <td class="field">
                <select name="category">
                    <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['news_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                        <option value="<?php echo $this->_tpl_vars['category']['Key']; ?>
" <?php if ($this->_tpl_vars['category']['Key'] == $this->_tpl_vars['sPost']['category']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['category']['Name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
            </select>
            </td>
        </tr>
                <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['photo']; ?>
</td>
            <td class="field_tall">
                <input class="file" type="file" name="picture" />

                <?php if ($this->_tpl_vars['news_info']['Picture']): ?>
                    <div style="padding: 15px 0;">
                        <img style="max-width: 200px;max-height: 200px;" src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
news/<?php echo $this->_tpl_vars['news_info']['Picture']; ?>
" />
                    </div>
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
                    <input type="text" name="name[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350" class="w350" />
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

        <tr>
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['content']; ?>

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

        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['page_url']; ?>
</td>
            <td class="field">
                <table>
                <tr>
                    <td><span style="padding: 0 5px 0 0;" class="field_description_noicon category-url"><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?>
<?php echo $this->_tpl_vars['pages']['news']; ?>
/</span></td>
                    <td><input name="path" type="text" value="<?php echo $this->_tpl_vars['sPost']['path']; ?>
" maxlength="40" /></td>
                    <td><span class="field_description_noicon">.html</span></td>
                </tr>
                </table>
            </td>
        </tr>

        <?php if ($_GET['action'] == 'edit'): ?>
        <tr>
            <td class="name"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['date']; ?>
</td>
            <td class="field">
                <input class="date" name="date" type="text" value="<?php echo $this->_tpl_vars['sPost']['date']; ?>
" style="width: 120px;" maxlength="40" />
            </td>
        </tr>
        <?php endif; ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsNavForm'), $this);?>


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

        <script>
        let newsCategories = [], newsPagePath = '<?php echo $this->_tpl_vars['pages']['news']; ?>
';

        <?php $_from = $this->_tpl_vars['news_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
            newsCategories[<?php echo ((is_array($_tmp=$this->_tpl_vars['category']['ID'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
] = '<?php echo $this->_tpl_vars['category']['Path']; ?>
';
        <?php endforeach; endif; unset($_from); ?>

        <?php echo '
        $(function () {
            newsPreviewUrlHandler();

            $(\'select[name="category"]\').change(function () {
                newsPreviewUrlHandler();
            });

            /**
             * Update preview of news URL by selected category
             */
            function newsPreviewUrlHandler () {
                let $category = $(\'select[name="category"] option:selected\');
                let categoryID = $category.val() ? Number($category.val()) : 0, categoryURL;

                categoryURL = rlConfig.frontendURL + newsPagePath + \'/\';

                if (newsCategories && categoryID && newsCategories[categoryID]) {
                    categoryURL += newsCategories[categoryID] + \'/\';
                }

                $(\'.category-url\').text(categoryURL);
            }
        });
        '; ?>
</script>
        <!-- add new news end -->
    <?php endif; ?>
<?php else: ?>
    <?php if ($_GET['mode'] === 'categories'): ?>
        <!-- News categories grid -->
        <div id="grid"></div>
        <script type="text/javascript">
        var newsCategoriesGrid;

        <?php echo '
        $(function() {
            newsCategoriesGrid = new gridObj({
                key             : \'news_categories\',
                id              : \'grid\',
                ajaxUrl         : `${rlUrlHome}controllers/news.inc.php?q=ext_categories`,
                defaultSortField: \'ID\',
                defaultSortType : \'DESC\',
                title           : lang.ext_categories_manager,
                fields: [
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'Name\', mapping: \'Name\'},
                    {name: \'Status\', mapping: \'Status\'},
                ],
                columns: [
                    {
                        header: lang.ext_id,
                        dataIndex: \'ID\',
                        width: 40,
                        fixed: true,
                        id: \'rlExt_black_bold\'
                    },{
                        header: lang.ext_name,
                        dataIndex: \'Name\',
                        width: 60,
                    },{
                        header: lang.ext_status,
                        dataIndex: \'Status\',
                        width: 12,
                        editor: new Ext.form.ComboBox({
                            store: [
                                [\'active\', lang.active],
                                [\'approval\', lang.approval]
                            ],
                            displayField : \'value\',
                            valueField   : \'key\',
                            typeAhead    : true,
                            mode         : \'local\',
                            triggerAction: \'all\',
                            selectOnFocus: true
                        })
                    },{
                        header: lang.ext_actions,
                        width: 70,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(data) {
                            let out = \'<center>\';

                            if (rights[cKey].indexOf(\'edit\') >= 0) {
                                let imgEdit = `<img class="edit" ext:qtip="${lang.ext_edit}" src="${rlUrlHome}img/blank.gif">`;
                                out += `<a href="${rlUrlController}&mode=categories&action=edit&id=${data}">${imgEdit}</a>`;
                            }
                            if (rights[cKey].indexOf(\'delete\') >= 0) {
                                out += `<img class="remove"
                                             ext:qtip="${lang.ext_delete}"
                                             src="${rlUrlHome}img/blank.gif"
                                             onclick="rlConfirm(\'${lang[\'ext_notice_\' + delete_mod]}\', \'deleteNewsCategory\', \'${[data]}\', \'news_load\')" />`;
                            }
                            out += \'</center>\';

                            return out;
                        }
                    }
                ]
            });

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsCategoriesNavGrid'), $this);?>
<?php echo '

            newsCategoriesGrid.init();
            grid.push(newsCategoriesGrid.grid);
        });

        /**
         * Delete news category
         *
         * @param {int} $id
        */
        var deleteNewsCategory = function(id) {
            flynax.sendAjaxRequest(\'removeNewsCategory\', {id: id}, function(response) {
                if (response.status === \'OK\') {
                    newsCategoriesGrid.reload();
                    printMessage(\'notice\', response.message);
                } else {
                    printMessage(\'error\', response.message ? response.message : lang.system_error);
                }
            });
        };
        '; ?>

        </script>
        <!-- News categories grid end -->

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsCategoriesNavBottom'), $this);?>

    <?php else: ?>
        <!-- news grid -->
        <div id="grid"></div>
        <script type="text/javascript">//<![CDATA[
        var newsGrid;

        <?php echo '
        $(document).ready(function(){
            var expanderTpl = \'<div style="margin: 0 0px 5px 44px"><img style="max-width: 200px;max-height: 100px;" src="{src}" /></div>\';

            newsGrid = new gridObj({
                key: \'news\',
                id: \'grid\',
                ajaxUrl: `${rlUrlHome}controllers/news.inc.php?q=ext`,
                defaultSortField: \'Date\',
                defaultSortType: \'DESC\',
                title: lang.ext_news_manager,
                expander: true,
                expanderTpl: expanderTpl,
                fields: [
                    {name: \'ID\', mapping: \'ID\', type: \'int\'},
                    {name: \'Category\', mapping: \'Category\'},
                    {name: \'title\', mapping: \'title\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'src\', mapping: \'src\', type: \'string\'},
                    {name: \'Views\', mapping: \'Views\'},
                ],
                columns: [
                    {
                        header: lang.ext_id,
                        dataIndex: \'ID\',
                        width: 40,
                        fixed: true,
                        id: \'rlExt_black_bold\'
                    },{
                        header: lang.ext_title,
                        dataIndex: \'title\',
                        width: 60,
                        id: \'rlExt_item_bold\'
                    },{
                        header: lang.ext_category,
                        dataIndex: \'Category\',
                        width: 15,
                    },{
                        header: lang.ext_add_date,
                        dataIndex: \'Date\',
                        width: 15,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\')),
                        editor: new Ext.form.DateField({
                            format: \'Y-m-d H:i:s\'
                        })
                    },{
                        header: lang.shows,
                        dataIndex: \'Views\',
                        width: 8,
                    },{
                        header: lang.ext_status,
                        dataIndex: \'Status\',
                        width: 12,
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
                        header: lang.ext_actions,
                        width: 70,
                        fixed: true,
                        dataIndex: \'ID\',
                        sortable: false,
                        renderer: function(data) {
                            var out = \'<center>\';

                            if (rights[cKey].indexOf(\'edit\') >= 0) {
                                let imgEdit = `<img class="edit" ext:qtip="${lang.ext_edit}" src="${rlUrlHome}img/blank.gif">`;
                                out += `<a href="${rlUrlController}&action=edit&news=${data}">${imgEdit}</a>`;
                            }
                            if (rights[cKey].indexOf(\'delete\') >= 0) {
                                out += `<img class="remove"
                                             ext:qtip="${lang.ext_delete}"
                                             src="${rlUrlHome}img/blank.gif"
                                             onclick="rlConfirm(\'${lang[\'ext_notice_\' + delete_mod]}\', \'deleteNews\', \'${[data]}\', \'news_load\')" />`;
                            }
                            out += \'</center>\';

                            return out;
                        }
                    }
                ]
            });

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsNavGrid'), $this);?>
<?php echo '

            newsGrid.init();
            grid.push(newsGrid.grid);
        });

        /**
         * Delete news
         *
         * @since 4.9.3
         *
         * @param {int} $id
        */
        var deleteNews = function(id) {
            flynax.sendAjaxRequest(\'removeNews\', {id: id}, function(response) {
                if (response.status === \'OK\') {
                    newsGrid.reload();
                    printMessage(\'notice\', response.message);
                } else {
                    printMessage(\'error\', response.message ? response.message : lang.system_error);
                }
            });
        };
        '; ?>

        //]]>
        </script>
        <!-- news grid end -->

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplNewsNavBottom'), $this);?>

    <?php endif; ?>
<?php endif; ?>

<!-- news tpl end -->