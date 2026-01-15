<?php /* Smarty version 2.6.31, created on 2025-08-19 09:12:24
         compiled from controllers/browse.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/browse.tpl', 7, false),array('modifier', 'cat', 'controllers/browse.tpl', 33, false),array('modifier', 'is_array', 'controllers/browse.tpl', 196, false),array('modifier', 'in_array', 'controllers/browse.tpl', 419, false),)), $this); ?>
<!-- listings tpl -->

<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div class="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseNavBar'), $this);?>


    <?php if ($this->_tpl_vars['category']['ID'] && $this->_tpl_vars['aRights']['categories']['edit']): ?>
        <a id="locked_button" href="javascript:void(0)" onclick="xajax_lockCategory('<?php echo $this->_tpl_vars['category']['ID']; ?>
', '<?php if ($this->_tpl_vars['category']['Lock']): ?>unlock<?php else: ?>lock<?php endif; ?>');" class="button_bar"><span class="left"></span><span class="center_<?php if ($this->_tpl_vars['category']['Lock']): ?>unlock<?php else: ?>lock<?php endif; ?>" id="locked_button_phrase"><?php if ($this->_tpl_vars['category']['Lock']): ?><?php echo $this->_tpl_vars['lang']['unlock_category']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['lock_category']; ?>
<?php endif; ?></span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights']['categories']['add']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=categories&amp;action=add&amp;parent_id=<?php echo $this->_tpl_vars['category']['ID']; ?>
" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_category']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['category']['ID']): ?>
        <?php if ($this->_tpl_vars['aRights']['categories']['edit']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=categories&amp;action=build&amp;form=submit_form&amp;key=<?php echo $this->_tpl_vars['category']['Key']; ?>
" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['build_category']; ?>
</span><span class="right"></span></a>

            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=categories&amp;action=edit&amp;key=<?php echo $this->_tpl_vars['category']['Key']; ?>
&amp;parent_id=<?php echo $this->_tpl_vars['category']['Parent_ID']; ?>
&amp;redirect_id=<?php echo $this->_tpl_vars['category']['ID']; ?>
" class="button_bar"><span class="left"></span><span class="center_edit"><?php echo $this->_tpl_vars['lang']['edit_category']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['aRights']['categories']['delete']): ?>
            <a href="javascript:void(0)" onclick="<?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['category']['Type']]['Cat_general_cat'] == $this->_tpl_vars['category']['ID']): ?>rlConfirm( '<?php echo $this->_tpl_vars['lang']['notice_delete_general']; ?>
', 'xajax_prepareDeleting', '<?php echo $this->_tpl_vars['category']['ID']; ?>
')<?php else: ?>xajax_prepareDeleting('<?php echo $this->_tpl_vars['category']['ID']; ?>
')<?php endif; ?>" class="button_bar"><span class="left"></span><span class="center_remove"><?php echo $this->_tpl_vars['lang']['delete_category']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    <?php endif; ?>
</div>
<!-- navigation bar end -->

<!-- delete category block -->
<div id="delete_block" class="hide">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['delete_category'])));
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
    var category_key = ''; // assigns in rlCategories -> ajaxPrepareDeleting()
    var category_name = ''; // assigns in rlCategories -> ajaxPrepareDeleting()
    var replace_category_id = 0;

    var notice_phrase = "<?php if ($this->_tpl_vars['config']['trash']): ?><?php echo $this->_tpl_vars['lang']['notice_drop_empty_category']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['notice_delete_empty_category']; ?>
<?php endif; ?>";
    var delete_conform_phrase = "<?php if ($this->_tpl_vars['config']['trash']): ?><?php echo $this->_tpl_vars['lang']['notice_drop_empty_category']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['notice_delete_empty_category']; ?>
<?php endif; ?>";

    <?php echo '

    function OnCategorySelect(id, name) {
        replace_category_id = parseInt(id);
    }

    function OnButtonClick() {
        if (replace_category_id > 0) {
            rlConfirm(notice_phrase.replace(\'{category}\', category_name), \'replaceCategory\', category_key);
        }
    }

    function delete_chooser(method, key, name)
    {
        if (method == \'delete\')
        {
            rlConfirm(delete_conform_phrase.replace(\'{category}\', name), \'xajax_deleteCategory\', key);
        }
        else if (method == \'replace\')
        {
            $(\'#top_buttons\').slideUp(\'slow\');
            $(\'#bottom_buttons\').slideDown(\'slow\');
            $(\'#replace_content\').slideDown(\'slow\');
        }
    }

    function cat_chooser(id)
    {
        $(\'#replace_category\').val(id);
    }

    function replaceCategory(key)
    {
            xajax_deleteCategory(key, replace_category_id);
    }

    '; ?>

    //]]>
    </script>
</div>
<!-- delete category block end -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="categories">
    <?php if (! empty ( $this->_tpl_vars['categories'] )): ?>
        <?php if ($_GET['id']): ?>

            <table class="sTable">
            <tr>
            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fCats'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fCats']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['fCats']['iteration']++;
?>
                <td style="width: <?php echo $this->_tpl_vars['width']; ?>
%;" valign="top">
                    <div class="item">
                        <a class="category" title="<?php echo $this->_tpl_vars['cat']['name']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;id=<?php echo $this->_tpl_vars['cat']['ID']; ?>
"><?php if ($this->_tpl_vars['cat']['name']): ?><?php echo $this->_tpl_vars['cat']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['not_available']; ?>
<?php endif; ?></a>
                        <span class="category_listings_count"><?php echo $this->_tpl_vars['cat']['Count']; ?>
</span>

                        <?php if (! empty ( $this->_tpl_vars['cat']['sub_categories'] )): ?>
                        <div class="sub_categories">
                            <?php $_from = $this->_tpl_vars['cat']['sub_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subCatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subCatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sub_cat']):
        $this->_foreach['subCatF']['iteration']++;
?>
                                <a title="<?php echo $this->_tpl_vars['sub_cat']['name']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;id=<?php echo $this->_tpl_vars['sub_cat']['ID']; ?>
" class="sub_category"><?php if ($this->_tpl_vars['sub_cat']['name']): ?><?php echo $this->_tpl_vars['sub_cat']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['not_available']; ?>
<?php endif; ?></a><?php if (! ($this->_foreach['subCatF']['iteration'] == $this->_foreach['subCatF']['total'])): ?>, <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </td>

                <?php if ($this->_foreach['fCats']['iteration']%3 == 0 && $this->_foreach['fCats']['iteration'] != $this->_foreach['fCats']['total']): ?>
                </tr>
                <tr>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            </tr>
            </table>

        <?php else: ?>

            <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['secF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['secF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['section']):
        $this->_foreach['secF']['iteration']++;
?>
                <fieldset class="light">
                    <legend id="legend_section_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('section_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                    <div id="section_<?php echo $this->_tpl_vars['section']['ID']; ?>
">
                        <table class="sTable" style="table-layout: fixed;">
                        <tr>
                            <?php $_from = $this->_tpl_vars['section']['Categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['catF']['iteration']++;
?>
                            <td valign="top">
                                <div class="item">
                                    <a class="category<?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['cat']['Type']]['Cat_general_cat'] == $this->_tpl_vars['cat']['ID']): ?> general_cat<?php endif; ?>" title="<?php echo $this->_tpl_vars['cat']['name']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;id=<?php echo $this->_tpl_vars['cat']['ID']; ?>
"><?php if ($this->_tpl_vars['cat']['name']): ?><?php echo $this->_tpl_vars['cat']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['not_available']; ?>
<?php endif; ?></a>
                                    <span class="category_listings_count"><?php echo $this->_tpl_vars['cat']['Count']; ?>
</span>

                                    <?php if (! empty ( $this->_tpl_vars['cat']['sub_categories'] )): ?>
                                    <div class="sub_categories">
                                        <?php $_from = $this->_tpl_vars['cat']['sub_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['subCatF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['subCatF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sub_cat']):
        $this->_foreach['subCatF']['iteration']++;
?>
                                            <a title="<?php echo $this->_tpl_vars['sub_cat']['name']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;id=<?php echo $this->_tpl_vars['sub_cat']['ID']; ?>
" class="sub_category<?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['cat']['Type']]['Cat_general_cat'] == $this->_tpl_vars['sub_cat']['ID']): ?> general_cat<?php endif; ?>"><?php if ($this->_tpl_vars['sub_cat']['name']): ?><?php echo $this->_tpl_vars['sub_cat']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['not_available']; ?>
<?php endif; ?></a><?php if (! ($this->_foreach['subCatF']['iteration'] == $this->_foreach['subCatF']['total'])): ?>, <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <?php if ($this->_foreach['catF']['iteration']%3 == 0 && $this->_foreach['catF']['iteration'] != $this->_foreach['catF']['total']): ?>
                            </tr>
                            <tr>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                        </tr>
                        </table>
                    </div>
                </fieldset>
            <?php endforeach; endif; unset($_from); ?>

        <?php endif; ?>
    <?php else: ?>
        <?php echo $this->_tpl_vars['lang']['no_subcategories']; ?>

    <?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- navigation bar -->
<?php if ($this->_tpl_vars['category']['ID']): ?>
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseListingsNavBar'), $this);?>


    <div id="nav_bar">
        <a href="javascript:void(0)" onclick="show('filters', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['filters']; ?>
</span><span class="right"></span></a>

        <?php if ($this->_tpl_vars['aRights']['listings']['add']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=listings&amp;action=add&amp;category=<?php echo $this->_tpl_vars['category']['ID']; ?>
" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_listing']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    </div>
<?php endif; ?>
<!-- navigation bar end -->

<div id="action_blocks">

    <?php if (! isset ( $_GET['action'] )): ?>
        <!-- filters -->
        <div id="filters" class="hide">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['filter_by'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <table>
            <tr>
                <td valign="top">
                    <table class="form">
                    <?php $_from = $this->_tpl_vars['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['filter']):
?>
                    <tr>
                        <td class="name w130"><?php echo $this->_tpl_vars['filter']['phrase']; ?>
</td>
                        <td class="field">
                            <select class="filters w200" id="<?php echo $this->_tpl_vars['field']; ?>
">
                            <option value=""><?php if ($this->_tpl_vars['field'] == 'Category_ID'): ?><?php echo $this->_tpl_vars['lang']['choose_listing_type']; ?>
<?php else: ?>- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -<?php endif; ?></option>
                            <?php $_from = $this->_tpl_vars['filter']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['item']):
?>
                                <option <?php if (((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp)) && $this->_tpl_vars['item']['type']): ?>id="option_<?php echo $this->_tpl_vars['item']['type']; ?>
_<?php echo $this->_tpl_vars['value']; ?>
"<?php endif; ?> <?php if (((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp)) && $this->_tpl_vars['item']['margin']): ?><?php if ($this->_tpl_vars['item']['margin'] == 5): ?>class="highlight_opt"<?php endif; ?> style="margin-left: <?php echo $this->_tpl_vars['item']['margin']; ?>
px;"<?php endif; ?>value="<?php echo $this->_tpl_vars['value']; ?>
" <?php if (isset ( $this->_tpl_vars['status'] ) && $this->_tpl_vars['field'] == 'Status' && $this->_tpl_vars['value'] == $this->_tpl_vars['status']): ?>selected="selected"<?php endif; ?>><?php if (((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php echo $this->_tpl_vars['item']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['item']; ?>
<?php endif; ?></option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>

                    <tr>
                        <td></td>
                        <td class="field">
                            <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['filter']; ?>
" id="filter_button" />
                            <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_filter_button" />
                            <a class="cancel" href="javascript:void(0)" onclick="show('filters')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                        </td>
                    </tr>
                    </table>
                </td>
                <td style="width: 50px;"></td>
                <td valign="top">
                    <table class="form">
                    <tr>
                        <td class="name w130"><?php echo $this->_tpl_vars['lang']['listing_id']; ?>
</td>
                        <td class="field">
                            <input class="filters" type="text" id="listing_id" maxlength="60" />
                        </td>
                    </tr>
                    <tr>
                        <td class="name w130"><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
                        <td class="field">
                            <input class="filters" type="text" maxlength="255" id="Account" />
                        </td>
                    </tr>
                    <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                        <td class="field">
                            <input class="filters" type="text" id="name" maxlength="60" />
                        </td>
                    </tr>
                    <tr>
                        <td class="name w130"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
                        <td class="field">
                            <input class="filters" type="text" id="email" maxlength="60" />
                        </td>
                    </tr>
                    <tr>
                        <td class="name w130"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</td>
                        <td class="field">
                            <select class="filters w200" id="account_type">
                                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                <?php $_from = $this->_tpl_vars['account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
                                    <option value="<?php echo $this->_tpl_vars['type']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['type']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['type']['name']; ?>
</option>
                                <?php endforeach; endif; unset($_from); ?>
                            </select>
                        </td>
                    </tr>

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseListingsSearch'), $this);?>


                    </table>
                </td>
            </tr>
            </table>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <script type="text/javascript">
        <?php echo '
        var filters = new Array();
        var step = 0;
        var category_selected = null;

        $(document).ready(function(){

            if ( readCookie(\'listings_sc\') )
            {
                $(\'#filters\').show();
                var cookie_filters = readCookie(\'listings_sc\').split(\',\');

                for (var i in cookie_filters)
                {
                    if ( typeof(cookie_filters[i]) == \'string\' )
                    {
                        var item = cookie_filters[i].split(\'||\');
                        $(\'#\'+item[0]).val(item[1]);

                        if ( item[0] == \'Category_ID\' ) {
                            category_selected = item[1];
                        }
                    }
                }
            }

            $(\'#filter_button\').click(function(){
                filters = new Array();
                write_filters = new Array();

                createCookie(\'listings_pn\', 0, 1);

                $(\'.filters\').each(function(){
                    if ($(this).val()) {
                        filters.push(new Array($(this).attr(\'id\'), $(this).val()));
                        write_filters.push($(this).attr(\'id\')+\'||\'+$(this).val());
                    }
                });

                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseSearchJS'), $this);?>
<?php echo '

                // save search criteria
                createCookie(\'listings_sc\', write_filters, 1);

                // reload grid
                listingsGrid.filters = filters;
                listingsGrid.reload();
            });

            $(\'#reset_filter_button\').click(function(){
                eraseCookie(\'listings_sc\');
                listingsGrid.reset();

                $("#filters select option[value=\'\']").attr(\'selected\', true);
                $("#filters input[type=text]").val(\'\');

                $(\'#Category_ID\').trigger(\'reset\');
            });

            /* autocomplete js */
            $(\'#Account\').rlAutoComplete();

            $(\'#Category_ID\').categoryDropdown({
                listingType: \'#Type\',
                default_selection: category_selected,
                phrases: { '; ?>

                    no_categories_available: "<?php echo $this->_tpl_vars['lang']['no_categories_available']; ?>
",
                    select: "<?php echo $this->_tpl_vars['lang']['select']; ?>
",
                    select_category: "<?php echo $this->_tpl_vars['lang']['select_category']; ?>
"
                <?php echo ' }
            });
        });
        '; ?>

        </script>
        <!-- filters end -->
    <?php endif; ?>

    <!-- categories list -->
    <div id="new_listing" class="hide">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="mc_title"><?php echo $this->_tpl_vars['lang']['choose_category']; ?>
:</div>

    <div style="margin: 10px;">
        <?php $_from = $this->_tpl_vars['categories_form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
        <div class="grey_middle grey_line" style="margin-bottom: 6px;">
            <b><?php echo $this->_tpl_vars['section']['name']; ?>
</b>
        </div>

        <?php if (! empty ( $this->_tpl_vars['section']['Types'] )): ?>
        <ul style="margin: 5px;">
            <?php $_from = $this->_tpl_vars['section']['Types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fTypes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fTypes']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['type']):
        $this->_foreach['fTypes']['iteration']++;
?>
                <li class="grey_middle" style="margin-bottom: 5px;">
                    <?php echo $this->_foreach['fTypes']['iteration']; ?>
.
                    <a title="<?php echo $this->_tpl_vars['type']['name']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=add&amp;category=<?php echo $this->_tpl_vars['type']['ID']; ?>
" style="margin-left: 5px;text-transform: capitalize;" class="blue_11_bold_link"><?php echo $this->_tpl_vars['type']['name']; ?>
</a>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
        <?php else: ?>
            <div style="margin-left: 10px;" class="blue_middle"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
        <?php endif; ?>

        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- categories list end -->

</div>

<!-- remote actions -->
<script type="text/javascript">
<?php echo '
$(document).ready(function(){
    '; ?>

    <?php if (isset ( $_GET['status'] )): ?>
        show('filters', '#action_blocks div');
    <?php elseif (isset ( $_GET['new_listing'] )): ?>
        show('new_listing', '#action_blocks div');
    <?php endif; ?>
    <?php echo '
});
'; ?>

</script>

<!-- remote actions end -->

<?php if ($this->_tpl_vars['category']['ID']): ?>

    <script type="text/javascript">//<![CDATA[
    // collect plans
    var listing_plans = [
        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['plans_f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['plans_f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plan']):
        $this->_foreach['plans_f']['iteration']++;
?>
            ['<?php echo $this->_tpl_vars['plan']['ID']; ?>
', '<?php echo $this->_tpl_vars['plan']['name']; ?>
']<?php if (! ($this->_foreach['plans_f']['iteration'] == $this->_foreach['plans_f']['total'])): ?>,<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    ];

    //var filters_url = '';
    var ui = typeof( rl_ui ) != 'undefined' ? '&ui='+rl_ui : '';
    var ui_cat_id = typeof( cur_cat_id ) != 'undefined' ? '&cat_id='+cur_cat_id : '';

    /* read cookies filters */
    var cookies_filters = false;

    if ( readCookie('listings_sc') )
        cookies_filters = readCookie('listings_sc').split(',');

    //]]>
    </script>

    <!-- listings grid create -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var mass_actions = [
        [lang['ext_activate'], 'activate'],
        [lang['ext_suspend'], 'approve'],
        [lang['ext_renew'], 'renew'],
        <?php if (((is_array($_tmp='delete')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['aRights']['listings']) : in_array($_tmp, $this->_tpl_vars['aRights']['listings']))): ?>[lang['ext_delete'], 'delete'],<?php endif; ?>
        [lang['ext_move'], 'move'],
        [lang['ext_make_featured'], 'featured'],
        [lang['ext_annul_featured'], 'annul_featured']
    ];

    <?php echo '

    var listingsGrid;
    $(document).ready(function(){

        listingsGrid = new gridObj({
            key: \'listings\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/listings.inc.php?q=ext&f_Category_ID='; ?>
<?php echo $this->_tpl_vars['category']['ID']; ?>
<?php echo '\',
            defaultSortField: \'Date\',
            defaultSortType: \'DESC\',
            remoteSortable: false,
            checkbox: true,
            actions: mass_actions,
            filters: cookies_filters,
            filtersPrefix: true,
            title: lang[\'ext_listings_manager\'],
            expander: true,
            expanderTpl: \'<div style="margin: 0 5px 5px 80px"> \\
                <table> \\
                <tr> \\
                <td>{thumbnail}</td> \\
                <td>{fields}</td> \\
                </tr> \\
                </table> \\
                <div> \\
            \',
            affectedObjects: \'#make_featured,#move_area\',
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'title\', mapping: \'title\', type: \'string\'},
                {name: \'Username\', mapping: \'Username\', type: \'string\'},
                {name: \'Account_ID\', mapping: \'Account_ID\', type: \'int\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Type_key\', mapping: \'Type_key\'},
                {name: \'Plan_name\', mapping: \'Plan_name\'},
                {name: \'Plan_ID\', mapping: \'Plan_name\'},
                {name: \'Plan_info\', mapping: \'Plan_info\'},
                {name: \'Cat_title\', mapping: \'Cat_title\', type: \'string\'},
                {name: \'Cat_ID\', mapping: \'Cat_ID\', type: \'int\'},
                {name: \'Cat_custom\', mapping: \'Cat_custom\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                {name: \'Pay_date\', mapping: \'Pay_date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                {name: \'thumbnail\', mapping: \'thumbnail\', type: \'string\'},
                {name: \'fields\', mapping: \'fields\', type: \'string\'},
                {name: \'data\', mapping: \'data\', type: \'string\'},
                {name: \'Allow_photo\', mapping: \'Allow_photo\', type: \'int\'},
                {name: \'Allow_video\', mapping: \'Allow_video\', type: \'int\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 3,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_title\'],
                    dataIndex: \'title\',
                    width: 25,
                    id: \'rlExt_item\'
                },{
                    header: lang[\'ext_owner\'],
                    dataIndex: \'Username\',
                    width: 8,
                    id: \'rlExt_item_bold\',
                    renderer: function(username, ext, row){
                        return "<a target=\'_blank\' ext:qtip=\'"+lang[\'ext_click_to_view_details\']+"\' href=\'"+rlUrlHome+"index.php?controller=accounts&action=view&userid="+row.data.Account_ID+"\'>"+username+"</a>"
                    }
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    width: 8,
                    renderer: function(val, obj, row){
                        var out = \'<a target="_blank" ext:qtip="\'+lang[\'ext_click_to_view_details\']+\'" href="\'+rlUrlHome+\'index.php?controller=listing_types&action=edit&key=\'+row.data.Type_key+\'">\'+val+\'</a>\';
                        return out;
                    }
                },{
                    header: lang[\'ext_category\'],
                    dataIndex: \'Cat_title\',
                    width: 9,
                    renderer: function(val, obj, row){
                        var link = row.data.Cat_custom ? rlUrlHome+\'index.php?controller=custom_categories\' : rlUrlHome+\'index.php?controller=browse&id=\'+row.data.Cat_ID;
                        var out = \'<a target="_blank" ext:qtip="\'+lang[\'ext_click_to_view_details\']+\'" href="\'+link+\'">\'+val+\'</a>\';
                        return out;
                    }
                },{
                    header: lang[\'ext_add_date\'],
                    dataIndex: \'Date\',
                    width: 10,
                    hidden: true,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                },{
                    header: lang[\'ext_payed\'],
                    dataIndex: \'Pay_date\',
                    width: 8,
                    renderer: function(val){
                        if (!val)
                        {
                            var date = \'<span class="delete" ext:qtip="\'+lang[\'ext_click_to_set_pay\']+\'">\'+lang[\'ext_not_payed\']+\'</span>\';
                        }
                        else
                        {
                            var date = Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))(val);
                            date = \'<span class="build" ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+date+\'</span>\';
                        }
                        return date;
                    },
                    editor: new Ext.form.DateField({
                        format: \'Y-m-d H:i:s\'
                    })
                },{
                    header: lang[\'ext_plan\'],
                    dataIndex: \'Plan_ID\',
                    width: 11,
                    editor: new Ext.form.ComboBox({
                        store: listing_plans,
                        mode: \'local\',
                        triggerAction: \'all\'
                    }),
                    renderer: function (val, obj, row){
                        if (val != \'\')
                        {
                            return \'<img class="info" ext:qtip="\'+row.data.Plan_info+\'" alt="" src="\'+rlUrlHome+\'img/blank.gif" />&nbsp;&nbsp;<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                        }
                        else
                        {
                            return \'<span class="delete" ext:qtip="\'+lang[\'ext_click_to_edit\']+\'" style="margin-left: 21px;">\'+lang[\'ext_no_plan_set\']+\'</span>\';
                        }
                    }
                },{
                    header: lang[\'ext_status\'],
                    dataIndex: \'Status\',
                    width: 5,
                    editor: new Ext.form.ComboBox({
                        store: [
                            [\'active\', lang.active],
                            [\'approval\', lang.approval]
                        ],
                        mode: \'local\',
                        typeAhead: true,
                        triggerAction: \'all\',
                        selectOnFocus: true
                    })
                },{
                    header: lang[\'ext_actions\'],
                    width: 100,
                    fixed: true,
                    dataIndex: \'data\',
                    sortable: false,
                    resizeable: false,
                    renderer: function(id, obj, row){
                        var out = "<div style=\'text-align: right\'>";
                        var splitter = false;

                        if ( cKey == \'browse\' )
                        {
                            cKey = \'listings\';
                        }
                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            if ( row.data.Allow_photo )
                            {
                                out += "<a href=\'"+rlUrlHome+"index.php?controller=listings&action=photos&id="+id+"\'><img class=\'photo\' ext:qtip=\'"+lang[\'ext_manage_photo\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            }
                            if ( row.data.Allow_video )
                            {
                                out += "<a href=\'"+rlUrlHome+"index.php?controller=listings&action=video&id="+id+"\'><img class=\'video\' ext:qtip=\'"+lang[\'ext_manage_video\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                            }
                        }
                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\\""+rlUrlHome+"index.php?controller=listings&action=edit&id="+id+ui+ui_cat_id+"\\"><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onClick=\'rlPrompt( \\""+lang[\'ext_notice_\'+delete_mod]+"\\",  \\"xajax_deleteListing\\", \\""+id+"\\" )\' />";
                        }
                        out += "</div>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseListingsGrid'), $this);?>
<?php echo '

        listingsGrid.init();
        grid.push(listingsGrid.grid);

        // actions listener
        listingsGrid.actionButton.addListener(\'click\', function()
        {
            var sel_obj = listingsGrid.checkboxColumn.getSelections();
            var action = listingsGrid.actionsDropDown.getValue();

            if (!action)
            {
                return false;
            }

            for( var i = 0; i < sel_obj.length; i++ )
            {
                listingsGrid.ids += sel_obj[i].id;
                if ( sel_obj.length != i+1 )
                {
                    listingsGrid.ids += \'|\';
                }
            }

            if ( action == \'delete\' )
            {
                Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn){
                    if ( btn == \'yes\' )
                    {
                        xajax_massActions( listingsGrid.ids, action );
                        listingsGrid.store.reload();
                    }
                });
            }
            else if( action == \'featured\' )
            {
                $(\'#make_featured\').fadeIn(\'slow\');
                return false;
            }
            else if( action == \'annul_featured\' )
            {
                $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_annul_featued_notice\'], function(btn){
                    if ( btn == \'yes\' )
                    {
                        xajax_annulFeatured( listingsGrid.ids );
                    }
                });

                return false;
            }
            else if( action == \'move\' )
            {
                $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                $(\'#move_area\').fadeIn(\'slow\');
                return false;
            }
            else
            {
                $(\'#make_featured,#move_area\').fadeOut(\'fast\');
                xajax_massActions( listingsGrid.ids, action );
                listingsGrid.store.reload();
            }

            listingsGrid.checkboxColumn.clearSelections();
            listingsGrid.actionsDropDown.setVisible(false);
            listingsGrid.actionButton.setVisible(false);
        });

        listingsGrid.grid.addListener(\'afteredit\', function(editEvent)
        {
            if ( editEvent.field == \'Plan_ID\' )
            {
                listingsGrid.reload();
            }
        });

    });
    '; ?>

    //]]>
    </script>

    <!-- make featured -->
    <div id="make_featured" style="margin-top: 10px;" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="mc_title"><?php echo $this->_tpl_vars['lang']['make_featured']; ?>
</div>
        <table class="sTable">
        <tr>
            <td style="width: 180px" class="td_splitter"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['plan']; ?>
</td>
            <td>
                <select class="lang_add" id="featured_plan">
                    <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['featured_plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['featured_plan']):
?>
                        <option value="<?php echo $this->_tpl_vars['featured_plan']['ID']; ?>
"><?php echo $this->_tpl_vars['featured_plan']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" onclick="xajax_makeFeatured(listingsGrid.ids, $('#featured_plan').val());" class="button lang_add" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
            </td>
        </tr>
        </table>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- make featured end -->

    <!-- move listing block -->
    <div id="move_area" style="margin-top: 10px;" class="hide scroll">
        <script type="text/javascript">
        var move_category_id = 0;

        <?php echo '
        function moveOnCategorySelect(id, name) {
            move_category_id = id;
        }

        function moveOnButtonClick() {
            if (listingsGrid.ids.length > 0 && move_category_id > 0) {
                $(\'div.namespace-move a.button\').text(lang[\'loading\']);
                xajax_moveListing(listingsGrid.ids, move_category_id);
            }
        }
        '; ?>

        </script>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['move_listings'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_selector.tpl') : smarty_modifier_cat($_tmp, 'category_selector.tpl')), 'smarty_include_vars' => array('namespace' => 'move','button' => $this->_tpl_vars['lang']['move'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <!-- move listing block end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplBrowseBottom'), $this);?>


<?php endif; ?>

<!-- listings tpl end -->