<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:32
         compiled from controllers/listings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/listings.tpl', 14, false),array('function', 'mapsAPI', 'controllers/listings.tpl', 1187, false),array('modifier', 'cat', 'controllers/listings.tpl', 45, false),array('modifier', 'is_array', 'controllers/listings.tpl', 58, false),array('modifier', 'replace', 'controllers/listings.tpl', 275, false),array('modifier', 'count', 'controllers/listings.tpl', 553, false),array('modifier', 'date_format', 'controllers/listings.tpl', 1127, false),array('modifier', 'escape', 'controllers/listings.tpl', 1197, false),array('modifier', 'in_array', 'controllers/listings.tpl', 1435, false),)), $this); ?>
<!-- listings tpl -->

<?php if (! $this->_tpl_vars['deny']): ?>

    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.qtip.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script type="text/javascript">flynax.qtip(); flynax.phoneField();</script>

    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.caret.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
ckeditor/ckeditor.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

    <!-- navigation bar -->
    <div id="nav_bar">
        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsNavBar'), $this);?>


        <?php if ($_GET['action'] == 'photos'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=video&amp;id=<?php echo $_GET['id']; ?>
" class="button_bar"><span class="left"></span><span class="center_video"><?php echo $this->_tpl_vars['lang']['manage_video']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if (! isset ( $_GET['action'] )): ?>
            <a href="javascript:void(0)" onclick="show('filters', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['filters']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['action'] == 'video'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=photos&amp;id=<?php echo $_GET['id']; ?>
" class="button_bar"><span class="left"></span><span class="center_photo"><?php echo $this->_tpl_vars['lang']['manage_photos']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! isset ( $_GET['action'] )): ?>
            <a href="javascript:void(0)" onclick="show('new_listing', '#action_blocks div');" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_listing']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['action'] == 'view' && $this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit'] == 'edit'): ?>
            <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=edit&amp;id=<?php echo $this->_tpl_vars['listing_data']['ID']; ?>
" class="button_bar"><span class="left"></span><span class="center_edit"><?php echo $this->_tpl_vars['lang']['edit_listing']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['listings_list']; ?>
</span><span class="right"></span></a>
    </div>
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
                                    <option value="<?php echo $this->_tpl_vars['value']; ?>
" <?php if (isset ( $this->_tpl_vars['status'] ) && $this->_tpl_vars['field'] == 'Status' && $this->_tpl_vars['value'] == $this->_tpl_vars['status']): ?>selected="selected"<?php endif; ?>><?php if (((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php if ($this->_tpl_vars['item']['name']): ?><?php echo $this->_tpl_vars['item']['name']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['item']['pName']]; ?>
<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['item']; ?>
<?php endif; ?></option>
                                <?php endforeach; endif; unset($_from); ?>
                                </select>
                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>

                        <tr>
                            <td></td>
                            <td class="field nowrap">
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

                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsSearch2'), $this);?>


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
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsSearchJS'), $this);?>
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
        <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
            <div id="new_listing" class="hide">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['select_category'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_selector.tpl') : smarty_modifier_cat($_tmp, 'category_selector.tpl')), 'smarty_include_vars' => array('namespace' => 'new','mode' => 'link')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        <?php endif; ?>
        <!-- categories list end -->

    </div>

    <?php $this->assign('sPost', $_POST); ?>

    <?php if ($_GET['action'] == 'add'): ?>

        <!-- add new listing -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['add_listing'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <!-- listing fieldset -->
        <div style="margin: 5px 10px 10px;">
            <form onsubmit="return submitHandler()" id="add_listing" method="post" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=add&amp;category=<?php echo $_GET['category']; ?>
" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add" />

                <!-- display plans -->
                <?php if (! empty ( $this->_tpl_vars['plans'] ) && ( ! $this->_tpl_vars['config']['membership_module'] || ( $this->_tpl_vars['config']['membership_module'] && $this->_tpl_vars['config']['allow_listing_plans'] ) )): ?>
                <fieldset class="light">
                    <legend id="legend_plans" class="up" onclick="fieldset_action('plans');"><?php echo $this->_tpl_vars['lang']['plans']; ?>
</legend>
                    <div id="plans">
                        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fPlan'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fPlan']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plan']):
        $this->_foreach['fPlan']['iteration']++;
?>
                            <div class="plan_item">
                                <table class="sTable">
                                <tr>
                                    <td align="center" style="width: 30px"><input accesskey="<?php echo $this->_tpl_vars['plan']['Cross']; ?>
" style="margin: 0 10px 0 0;" id="plan_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" type="radio" name="f[l_plan]" value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" <?php if ($this->_tpl_vars['plan']['ID'] == $_POST['f']['l_plan']): ?>checked="checked"<?php else: ?><?php if (($this->_foreach['fPlan']['iteration'] <= 1)): ?>checked="checked"<?php endif; ?><?php endif; ?> /></td>
                                    <td>
                                        <label for="plan_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" class="blue_11_normal">
                                            <?php $this->assign('l_type', ((is_array($_tmp=$this->_tpl_vars['plan']['Type'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_plan') : smarty_modifier_cat($_tmp, '_plan'))); ?>
                                            <?php echo $this->_tpl_vars['plan']['name']; ?>
 - <b><?php if ($this->_tpl_vars['plan']['Price'] > 0): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php echo $this->_tpl_vars['plan']['Price']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['free']; ?>
<?php endif; ?></b>
                                        </label>
                                        <div class="desc"><?php echo $this->_tpl_vars['plan']['des']; ?>
</div>
                                        <?php if ($this->_tpl_vars['plan']['Advanced_mode']): ?>
                                            <div id="featured_option_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" class="featured_option hide">
                                                <div><?php echo $this->_tpl_vars['lang']['feature_mode_caption']; ?>
</div>
                                                <label>
                                                    <input class="<?php if ($_POST['listing_type'] == 'standard' || ! $_POST['listing_type']): ?>checked<?php endif; ?>" type="radio" name="listing_type" value="standard" />
                                                    <?php echo $this->_tpl_vars['lang']['standard_listing']; ?>

                                                </label>
                                                <label>
                                                    <input class="<?php if ($_POST['listing_type'] == 'featured'): ?>checked<?php endif; ?><?php if ($this->_tpl_vars['plan']['Package_ID'] && empty ( $this->_tpl_vars['plan']['Featured_remains'] ) && $this->_tpl_vars['plan']['Featured_listings'] != 0): ?> disabled<?php endif; ?>" type="radio" name="listing_type" value="featured" />
                                                    <?php echo $this->_tpl_vars['lang']['featured_listing']; ?>

                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                </table>
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                </fieldset>
                <?php endif; ?>
                <!-- display plans end -->

                <!-- crossed categories -->
                <div id="crossed_area" class="hide">
                    <input type="hidden" name="crossed_done" value="<?php if ($_SESSION['add_listing']['crossed_done']): ?>1<?php else: ?>0<?php endif; ?>" />

                    <fieldset class="light">
                        <legend id="legend_crossed" class="up" onclick="fieldset_action('crossed');"><?php echo $this->_tpl_vars['lang']['crossed_categories']; ?>
</legend>
                        <div id="crossed">
                            <div class="auth">
                                <div style="padding: 0 0 10px 0;">
                                    <?php $this->assign('number_var', ('{')."number".('}')); ?>
                                    <div class="dark" id="cc_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['crossed_top_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['number_var'], '<b id="cc_number"></b>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['number_var'], '<b id="cc_number"></b>')); ?>
</div>
                                    <div class="dark hide" id="cc_text_denied"><?php echo $this->_tpl_vars['lang']['crossed_top_text_denied']; ?>
</div>
                                </div>

                                <!-- print sections/categories tree -->
                                <div id="crossed_tree" class="tree<?php if ($_POST['crossed_done']): ?> hide<?php endif; ?>">
                                <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
                                    <fieldset class="light">
                                        <legend id="legend_crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                                        <div id="crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="tree">
                                            <?php $this->assign('type_page_key', ((is_array($_tmp='lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['section']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['section']['Key']))); ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => $this->_tpl_vars['section']['ID'],'name' => $this->_tpl_vars['section']['name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                            <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level_crossed.tpl') : smarty_modifier_cat($_tmp, 'category_level_crossed.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                            <?php else: ?>
                                                <div class="dark"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
                                            <?php endif; ?>

                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        </div>
                                    </fieldset>
                                <?php endforeach; endif; unset($_from); ?>
                                </div>
                                <!-- print sections/categories tree end -->

                                <ul class="hide" id="crossed_selected"><li class="first dark"><b><?php echo $this->_tpl_vars['lang']['selected_crossed_categories']; ?>
</b></li></ul>
                                <input id="crossed_button" type="button" value="<?php if ($_POST['crossed_done']): ?><?php echo $this->_tpl_vars['lang']['manage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['done']; ?>
<?php endif; ?>" />
                            </div>
                        </div>
                    </fieldset>
                </div>

                <script type="text/javascript">
                var plans = Array();
                var selected_plan_id = <?php if ($_POST['f']['l_plan']): ?><?php echo $_POST['f']['l_plan']; ?>
<?php else: ?>0<?php endif; ?>;
                var last_plan_id = 0;
                var ca_post = <?php if ($this->_tpl_vars['crossed']): ?>[<?php $_from = $this->_tpl_vars['crossed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['crossedF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['crossedF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['crossed_cat']):
        $this->_foreach['crossedF']['iteration']++;
?>['<?php echo $this->_tpl_vars['crossed_cat']; ?>
']<?php if (! ($this->_foreach['crossedF']['iteration'] == $this->_foreach['crossedF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
                var cc_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>['<?php echo $this->_tpl_vars['parent_point']; ?>
']<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;

                <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan']):
?>
                plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
] = new Array();
                plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Key'] = '<?php echo $this->_tpl_vars['plan']['Key']; ?>
';
                plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Cross'] = <?php echo $this->_tpl_vars['plan']['Cross']; ?>
;
                plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Featured'] = <?php echo $this->_tpl_vars['plan']['Featured']; ?>
;
                plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Advanced_mode'] = <?php echo $this->_tpl_vars['plan']['Advanced_mode']; ?>
;
                <?php endforeach; endif; unset($_from); ?>

                <?php echo '

                $(document).ready(function(){
                    flynax.treeLoadLevel(\'crossed\', \'crossedTree\');

                    if (plans[selected_plan_id] && plans[selected_plan_id][\'Cross\']) {
                        crossCount = plans[selected_plan_id][\'Cross\'];
                        $(\'#crossed_area\').show();
                        crossedTree();
                    }

                    if (plans[selected_plan_id]) {
                        planClickHandler($(\'input#plan_\'+selected_plan_id));
                    }

                    // Plans click handler
                    $(\'input[name="f[l_plan]"]\').click(function() {
                        selected_plan_id = $(this).attr(\'id\').split(\'_\')[1];
                        crossCount = plans[selected_plan_id][\'Cross\'];

                        if (crossCount > 0) {
                            $(\'#crossed_area\').slideDown();
                            crossedTree();
                        } else {
                            $(\'#crossed_area\').slideUp();
                        }

                        planClickHandler($(this));
                    });

                    // Emulate the selection of the plan to run the plans click handler
                    $(\'input[name="f[l_plan]"]:checked\').trigger(\'click\');
                });

                var planClickHandler = function(obj) {
                    if (obj.length == 0) {
                        return;
                    }

                    selected_plan_id = $(obj).attr(\'id\').split(\'_\')[1];

                    if (last_plan_id == selected_plan_id) {
                        return;
                    }

                    last_plan_id = selected_plan_id;

                    $(\'div.featured_option\').hide();
                    $(\'div.featured_option\').prev().show();
                    $(\'div.featured_option input\').attr(\'disabled\', true);

                    if (plans[selected_plan_id][\'Featured\'] && plans[selected_plan_id][\'Advanced_mode\']) {
                        $(\'#featured_option_\'+selected_plan_id).prev().hide();
                        $(\'#featured_option_\'+selected_plan_id).show();
                        $(\'#featured_option_\'+selected_plan_id+\' input\').attr(\'disabled\', false);
                        $(\'#featured_option_\'+selected_plan_id+\' input.disabled\').attr(\'disabled\', true);
                        $(\'#featured_option_\'+selected_plan_id+\' input:not(.disabled):first\').prop(\'checked\', true);
                        $(\'#featured_option_\'+selected_plan_id+\' input.checked\').prop(\'checked\', true);
                    }
                }

                '; ?>

                </script>
                <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
javascript/crossed.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
                <!-- crossed categories end -->

                <table class="form" style="margin: 0 16px 15px;">
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['set_owner']; ?>
 <span class="red">*</span></td>
                    <td class="field">
                        <input type="text" name="account_id" id="account_id" value="<?php echo $this->_tpl_vars['requested_username']; ?>
" />
                        <script type="text/javascript">
                        var post_account_id = <?php if ($this->_tpl_vars['sPost']['account_id']): ?><?php echo $this->_tpl_vars['sPost']['account_id']; ?>
<?php else: ?>false<?php endif; ?>;
                        var post_listing_type = '<?php echo $this->_tpl_vars['sPost']['listing_type']; ?>
';
                        <?php echo '
                            $(\'#account_id\').rlAutoComplete({add_id: true, id: post_account_id});
                            '; ?>
<?php if ($this->_tpl_vars['config']['membership_module'] && ! $this->_tpl_vars['config']['allow_listing_plans']): ?><?php echo '
                            $(document).ready(function(){
                                if ($(\'#account_id\').val() != \'\') {
                                    checkMemebershipPlan($(\'#account_id\').val());
                                }
                                $(document).on(\'click\', \'#ac_interface div\', function(){
                                    var username = $(this).html().replace(/<b>/i, \'\').replace(/<\\/b>/i, \'\');
                                    checkMemebershipPlan(username);
                                });
                            });

                            var checkMemebershipPlan = function(username) {
                                var standard_checked = \'\';
                                var featured_checked = \'\';
                                $(\'table.form\').find(\'tr.listing_type\').remove();
                                $.getJSON(rlConfig[\'ajax_url\'], {item: \'checkMemebershipPlan\', username: username}, function(response){
                                    if (response.status == \'ok\') {
                                        if (response.plan.Advanced_mode == 1) {
                                            if (response.plan.Standard_listings == 0) {
                                                standard_field = \'<input type="radio" id="listing_type_standard" name="listing_type" value="standard" \'+(post_listing_type == \'standard\' || post_listing_type == \'\' ? \'checked="checked"\' : \'\')+\' /> <label for="listing_type_standard">'; ?>
<?php echo $this->_tpl_vars['lang']['standard']; ?>
<?php echo '</label>\';
                                            } else {
                                                if ((post_listing_type == \'standard\' && response.plan.Standard_remains > 0) || (post_listing_type == \'\' && (response.plan.Standard_remains > 0 || response.plan.Standard_remains == \'\'))) {
                                                    standard_checked = \'checked="checked"\';
                                                }
                                                standard_field = \'<input type="radio" id="listing_type_standard" name="listing_type" value="standard" \'+standard_checked+\' \'+(response.plan.Standard_remains <= 0 ? \' disabled="disabled"\' : \'\')+\' /> <label for="listing_type_standard">'; ?>
<?php echo $this->_tpl_vars['lang']['standard']; ?>
<?php echo ' (\'+ response.plan.Standard_remains +\')</label>\';
                                            }
                                            if (response.plan.Featured_listings == 0) {
                                                featured_field = \'<input type="radio" id="listing_type_featured" name="listing_type" value="featured" \'+(post_listing_type == \'featured\' || (post_listing_type == \'\' && response.plan.Standard_remains <= 0 && response.plan.Standard_listings > 0) ? \'checked="checked"\' : \'\')+\' /> <label for="listing_type_featured">'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo '</label>\';
                                            } else {
                                                if ((post_listing_type == \'featured\' && response.plan.Featured_remains > 0) || (post_listing_type == \'\' && (response.plan.Featured_remains > 0 || response.plan.Featured_remains == \'\'))) {
                                                    featured_checked = \'checked="checked"\';
                                                }
                                                featured_field = \'<input type="radio" id="listing_type_featured" name="listing_type" value="featured" \'+featured_checked+\' \'+(response.plan.Featured_remains <= 0 ? \' disabled="disabled"\' : \'\')+\' /> <label for="listing_type_featured">'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo ' (\'+ response.plan.Featured_remains +\')</label>\';
                                            }
                                            $(\'select[name="status"]\').parent().parent().after(\'<tr class="listing_type"><td class="name">'; ?>
<?php echo $this->_tpl_vars['lang']['listing_type']; ?>
<?php echo ' <span class="red">*</span></td><td class="field">\' +standard_field + featured_field + \'</td></tr>\');
                                        } else {
                                            $(\'table.form\').find(\'tr.listing_type\').remove();
                                        }
                                    } else {
                                        $(\'#account_id\').val(\'\');
                                        if ($(\'#ac_hidden\').length) {
                                            $(\'#ac_hidden\').val(\'\');
                                        }
                                        $(\'table.form\').find(\'tr.listing_type\').remove();
                                        printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['listing_limit_exceeded_admin']; ?>
<?php echo '\');
                                    }
                                });
                            }
                            '; ?>
<?php endif; ?><?php echo '
                        '; ?>

                        </script>
                    </td>
                </tr>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
 <span class="red">*</span></td>
                    <td class="field">
                        <select name="status" class="login_input_select">
                            <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                            <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                        </select>
                    </td>
                </tr>

                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsFormAdd'), $this);?>


                </table>

                <?php $_from = $this->_tpl_vars['form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                <?php if ($this->_tpl_vars['group']['Group_ID']): ?>
                    <?php if ($this->_tpl_vars['group']['Fields'] || ! $this->_tpl_vars['group']['Display']): ?>
                        <?php $this->assign('hide', 'false'); ?>
                    <?php else: ?>
                        <?php $this->assign('hide', 'true'); ?>
                    <?php endif; ?>

                    <fieldset>
                        <legend id="legend_group_<?php echo $this->_tpl_vars['group']['Key']; ?>
" class="up" onclick="fieldset_action('group_<?php echo $this->_tpl_vars['group']['Key']; ?>
');"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['group']['pName']]; ?>
</legend>
                        <div id="group_<?php echo $this->_tpl_vars['group']['Key']; ?>
">
                        <?php if ($this->_tpl_vars['group']['Fields']): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php else: ?>
                            <span class="blue_middle"><?php echo $this->_tpl_vars['lang']['no_items_in_group']; ?>
</span>
                        <?php endif; ?>
                        </div>
                    </fieldset>
                <?php else: ?>
                    <div style="padding: 0 0 0 16px;">
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    </div>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>

                <table class="form" style="margin: 0 16px;">
                <tr>
                    <td class="no_divider"></td>
                    <td class="field"><input type="submit" value="<?php echo $this->_tpl_vars['lang']['add_listing']; ?>
" /></td>
                </tr>
                </table>
            </form>
        </div>

        <!-- listing fieldset end -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <!-- add new listing end -->

    <?php elseif ($_GET['action'] == 'edit'): ?>

        <!-- listing fieldset -->
        <?php if (! empty ( $this->_tpl_vars['form'] )): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <form onsubmit="return submitHandler()" id="edit_listing" method="post" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=edit&amp;id=<?php echo $_GET['id']; ?>
<?php if ($_GET['ui']): ?>&amp;ui=<?php echo $_GET['ui']; ?>
<?php endif; ?><?php if ($_GET['cat_id']): ?>&amp;cat_id=<?php echo $_GET['cat_id']; ?>
<?php endif; ?>" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit" />
            <input type="hidden" name="fromPost" value="1" />
            <?php if ($this->_tpl_vars['listing_info']['Plan_type'] == 'account'): ?>
                <input type="hidden" name="f[l_plan]" value="<?php echo $this->_tpl_vars['plan_info']['ID']; ?>
" />
            <?php endif; ?>

            <!-- display plans -->
            <?php if (! empty ( $this->_tpl_vars['plans'] ) && $this->_tpl_vars['listing_info']['Plan_type'] == 'listing'): ?>
            <fieldset class="light">

                <legend id="legend_plans" class="up" onclick="fieldset_action('plans');"><?php echo $this->_tpl_vars['lang']['plans']; ?>
</legend>
                <div id="plans">
                    <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fPlan'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fPlan']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plan']):
        $this->_foreach['fPlan']['iteration']++;
?>
                        <div class="plan_item<?php if ($this->_tpl_vars['plan']['ID'] != $_POST['f']['l_plan']): ?> hide<?php endif; ?>">
                            <table class="sTable">
                            <tr>
                                <td align="center" style="width: 30px"><input accesskey="<?php echo $this->_tpl_vars['plan']['Cross']; ?>
" style="margin: 0 10px 0 0;" id="plan_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" type="radio" name="f[l_plan]" value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" <?php if ($this->_tpl_vars['plan']['ID'] == $_POST['f']['l_plan']): ?>checked="checked"<?php else: ?><?php if (($this->_foreach['fPlan']['iteration'] <= 1)): ?>checked="checked"<?php endif; ?><?php endif; ?> /></td>
                                <td>
                                    <label for="plan_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" class="blue_11_normal">
                                        <?php $this->assign('l_type', ((is_array($_tmp=$this->_tpl_vars['plan']['Type'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_plan') : smarty_modifier_cat($_tmp, '_plan'))); ?>
                                        <?php echo $this->_tpl_vars['plan']['name']; ?>
 - <b><?php if ($this->_tpl_vars['plan']['Price'] > 0): ?><?php echo $this->_tpl_vars['config']['system_currency']; ?>
<?php echo $this->_tpl_vars['plan']['Price']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['free']; ?>
<?php endif; ?></b>
                                    </label>
                                    <div class="desc"><?php echo $this->_tpl_vars['plan']['des']; ?>
</div>
                                        <?php if ($this->_tpl_vars['plan']['Advanced_mode']): ?>
                                        <div id="featured_option_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" class="featured_option hide">
                                            <div><?php echo $this->_tpl_vars['lang']['feature_mode_caption']; ?>
</div>
                                            <label>
                                                <input <?php if ($_POST['listing_type'] == 'standard' || ! $_POST['listing_type']): ?>checked="checked"<?php endif; ?> class="<?php if ($_POST['listing_type'] == 'standard' || ! $_POST['listing_type']): ?>checked<?php endif; ?>" type="radio" name="listing_type" value="standard" />
                                                <?php echo $this->_tpl_vars['lang']['standard_listing']; ?>

                                            </label>
                                            <label>
                                                <input <?php if ($_POST['listing_type'] == 'featured'): ?>checked="checked"<?php endif; ?> class="<?php if ($_POST['listing_type'] == 'featured'): ?>checked<?php endif; ?><?php if ($this->_tpl_vars['plan']['Package_ID'] && empty ( $this->_tpl_vars['plan']['Featured_remains'] ) && $this->_tpl_vars['plan']['Featured_listings'] != 0): ?> disabled<?php endif; ?>" type="radio" name="listing_type" value="featured" />
                                                <?php echo $this->_tpl_vars['lang']['featured_listing']; ?>

                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            </table>
                        </div>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php if (count($this->_tpl_vars['plans']) > 1 || ! $_POST['f']['l_plan']): ?>
                        <input id="manage_plans" type="button" value="<?php echo $this->_tpl_vars['lang']['manage']; ?>
" />
                    <?php endif; ?>
                </div>
            </fieldset>

            <script type="text/javascript">
            <?php echo '
            var plans_expand = false;
            $(document).ready(function(){
                $(\'#manage_plans\').click(function(){
                    if ( plans_expand )
                    {
                        plans_expand = false;
                        $(\'div#plans div.hide\').fadeOut();
                        $(this).val(\''; ?>
<?php echo $this->_tpl_vars['lang']['manage']; ?>
<?php echo '\');
                    }
                    else
                    {
                        plans_expand = true;
                        $(this).val(\''; ?>
<?php echo $this->_tpl_vars['lang']['apply']; ?>
<?php echo '\');
                        $(\'div#plans div.hide\').fadeIn();
                    }
                });

                $(\'div#plans div.plan_item\').click(function(){
                    $(\'div#plans div.plan_item\').addClass(\'hide\').css(\'display\', \'block\');
                    $(this).removeClass(\'hide\');
                });

                $(\'.featured_option\').click(function(){
                    $(this).closest(\'tr\').find(\'input[name="f[l_plan]"]\').attr(\'checked\',true);
                });
            });

            '; ?>

            </script>
            <?php endif; ?>
            <!-- display plans end -->

            <!-- crossed categories -->
            <div id="crossed_area" <?php if (! $this->_tpl_vars['plan_info']['Cross']): ?>class="hide"<?php endif; ?>>
                <input type="hidden" name="crossed_done" value="<?php if ($_SESSION['add_listing']['crossed_done']): ?>1<?php else: ?>0<?php endif; ?>" />

                <fieldset class="light">
                    <legend id="legend_crossed" class="up" onclick="fieldset_action('crossed');"><?php echo $this->_tpl_vars['lang']['crossed_categories']; ?>
</legend>
                    <div id="crossed">

                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => 'crossed','name' => $this->_tpl_vars['lang']['crossed_categories'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <div class="auth">
                            <div style="padding: 0 0 10px 0;">
                                <?php $this->assign('number_var', ('{')."number".('}')); ?>
                                <div class="dark" id="cc_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['crossed_top_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['number_var'], '<b id="cc_number"></b>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['number_var'], '<b id="cc_number"></b>')); ?>
</div>
                                <div class="dark hide" id="cc_text_denied"><?php echo $this->_tpl_vars['lang']['crossed_top_text_denied']; ?>
</div>
                            </div>

                            <!-- print sections/categories tree -->
                            <div id="crossed_tree" class="tree<?php if ($_POST['crossed_done']): ?> hide<?php endif; ?>">
                            <?php $_from = $this->_tpl_vars['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section']):
?>
                                <fieldset class="light">
                                    <legend id="legend_crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="up" onclick="fieldset_action('crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
');"><?php echo $this->_tpl_vars['section']['name']; ?>
</legend>
                                    <div id="crossed_<?php echo $this->_tpl_vars['section']['ID']; ?>
" class="tree">
                                        <?php $this->assign('type_page_key', ((is_array($_tmp='lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['section']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['section']['Key']))); ?>
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_header.tpl') : smarty_modifier_cat($_tmp, 'fieldset_header.tpl')), 'smarty_include_vars' => array('id' => $this->_tpl_vars['section']['ID'],'name' => $this->_tpl_vars['section']['name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                                        <?php if (! empty ( $this->_tpl_vars['section']['Categories'] )): ?>
                                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'category_level_crossed.tpl') : smarty_modifier_cat($_tmp, 'category_level_crossed.tpl')), 'smarty_include_vars' => array('categories' => $this->_tpl_vars['section']['Categories'],'first' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                        <?php else: ?>
                                            <div class="dark"><?php echo $this->_tpl_vars['lang']['no_items_in_sections']; ?>
</div>
                                        <?php endif; ?>

                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                    </div>
                                </fieldset>
                            <?php endforeach; endif; unset($_from); ?>
                            </div>
                            <!-- print sections/categories tree end -->

                            <ul class="hide" id="crossed_selected"><li class="first dark"><b><?php echo $this->_tpl_vars['lang']['selected_crossed_categories']; ?>
</b></li></ul>
                            <input id="crossed_button" type="button" value="<?php if ($_POST['crossed_done']): ?><?php echo $this->_tpl_vars['lang']['manage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['done']; ?>
<?php endif; ?>" />
                        </div>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fieldset_footer.tpl') : smarty_modifier_cat($_tmp, 'fieldset_footer.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                        <script type="text/javascript">
                        var plans = Array();
                        var selected_plan_id = <?php if ($_POST['f']['l_plan']): ?><?php echo $_POST['f']['l_plan']; ?>
<?php else: ?>0<?php endif; ?>;
                        var ca_post = <?php if ($this->_tpl_vars['crossed']): ?>[<?php $_from = $this->_tpl_vars['crossed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['crossedF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['crossedF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['crossed_cat']):
        $this->_foreach['crossedF']['iteration']++;
?>['<?php echo $this->_tpl_vars['crossed_cat']; ?>
']<?php if (! ($this->_foreach['crossedF']['iteration'] == $this->_foreach['crossedF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
                        var cc_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>['<?php echo $this->_tpl_vars['parent_point']; ?>
']<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
                        var listing_owner_id = <?php echo $this->_tpl_vars['listing_info']['Account_ID']; ?>
;

                        <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plan']):
?>
                        plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
] = new Array();
                        plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Key'] = '<?php echo $this->_tpl_vars['plan']['Key']; ?>
';
                        plans[<?php echo $this->_tpl_vars['plan']['ID']; ?>
]['Cross'] = <?php echo $this->_tpl_vars['plan']['Cross']; ?>
;
                        <?php endforeach; endif; unset($_from); ?>

                        <?php echo '

                        $(document).ready(function(){
                            flynax.treeLoadLevel(\'crossed\', \'crossedTree\');
                            flynax.deleteFile(listing_owner_id);

                            if ( plans[selected_plan_id] && plans[selected_plan_id][\'Cross\'] )
                            {
                                crossCount = plans[selected_plan_id][\'Cross\'];
                                $(\'#crossed_area\').show();
                                crossedTree();
                            }

                            /* plans click handler */
                            $(\'input[name="f[l_plan]"]\').click(function(){
                                selected_plan_id = $(this).attr(\'id\').split(\'_\')[1];
                                crossCount = plans[selected_plan_id][\'Cross\'];

                                if ( crossCount > 0 )
                                {
                                    $(\'#crossed_area\').slideDown();
                                    crossedTree();
                                }
                                else
                                {
                                    $(\'#crossed_area\').slideUp();
                                }
                            });
                        });

                        '; ?>

                        </script>
                        <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
javascript/crossed.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
                    </div>
                </fieldset>
            </div>
            <!-- crossed categories end -->

            <table class="form" style="margin: 0 16px 15px;">
            <tr>
                <td class="name">
                    <?php echo $this->_tpl_vars['lang']['set_owner']; ?>

                </td>
                <td class="field">
                    <input type="text" name="account_id" id="account_id" value="<?php echo $this->_tpl_vars['requested_username']; ?>
" />
                    <script type="text/javascript">
                    var account_id = <?php if ($this->_tpl_vars['sPost']['account_id']): ?><?php echo $this->_tpl_vars['sPost']['account_id']; ?>
<?php else: ?>false<?php endif; ?>;
                    var post_listing_type = '<?php if ($this->_tpl_vars['sPost']['listing_type']): ?><?php echo $this->_tpl_vars['sPost']['listing_type']; ?>
<?php else: ?><?php echo $this->_tpl_vars['listing_info']['Last_type']; ?>
<?php endif; ?>';
                    <?php echo '
                        $(\'#account_id\').rlAutoComplete({add_id: true, id: account_id});

                        '; ?>
<?php if ($this->_tpl_vars['config']['membership_module'] && ! $this->_tpl_vars['config']['allow_listing_plans']): ?><?php echo '
                        $(document).ready(function(){
                            '; ?>
<?php if ($this->_tpl_vars['listing_info']['Account_ID'] != $this->_tpl_vars['sPost']['account_id']): ?><?php echo '
                            if ($(\'#account_id\').val() != \'\') {
                                checkMemebershipPlan($(\'#account_id\').val());
                            }
                            '; ?>
<?php endif; ?><?php echo '
                            $(document).on(\'click\', \'#ac_interface div\', function(){
                                var username = $(this).html().replace(/<b>/i, \'\').replace(/<\\/b>/i, \'\');
                                checkMemebershipPlan(username);
                            });
                        });

                        var checkMemebershipPlan = function(username) {
                            var checked = \'\';
                            $(\'table.form\').find(\'tr.listing_type\').remove();
                            $.getJSON(rlConfig[\'ajax_url\'], {item: \'checkMemebershipPlan\', username: username, listing_type: \''; ?>
<?php echo $this->_tpl_vars['listing_info']['Last_type']; ?>
<?php echo '\', edit: true}, function(response) {
                                if (response.status == \'ok\') {
                                    if (response.plan.Advanced_mode == 1) {
                                        if (response.listing_type_not_match) {
                                            Ext.MessageBox.confirm(lang[\'warning\'], \''; ?>
<?php echo $this->_tpl_vars['lang']['confirm_change_listing_type']; ?>
<?php echo '\', function(btn) {
                                                if (btn == \'yes\') {
                                                    diaplayAdvancedMode(response.plan);
                                                }
                                                if (btn == \'no\') {
                                                    $(\'#account_id\').val(\''; ?>
<?php echo $this->_tpl_vars['listing_info']['Username']; ?>
<?php echo '\');
                                                    $(\'#ac_hidden\').val(\''; ?>
<?php echo $this->_tpl_vars['listing_info']['Account_ID']; ?>
<?php echo '\');
                                                }
                                            });
                                        } else {
                                            diaplayAdvancedMode(response.plan);
                                        }

                                    } else {
                                        $(\'table.form\').find(\'tr.listing_type\').remove();
                                    }
                                } else {
                                    $(\'#account_id\').val(\''; ?>
<?php echo $this->_tpl_vars['listing_info']['Username']; ?>
<?php echo '\');
                                    $(\'#ac_hidden\').val(\''; ?>
<?php echo $this->_tpl_vars['listing_info']['Account_ID']; ?>
<?php echo '\');
                                    $(\'table.form\').find(\'tr.listing_type\').remove();
                                    printMessage(\'error\', \''; ?>
<?php echo $this->_tpl_vars['lang']['listing_limit_exceeded_admin']; ?>
<?php echo '\');
                                }
                            });
                        }

                        var diaplayAdvancedMode = function(plan) {
                            if (plan.Standard_listings == 0) {
                                standard_field = \'<input type="radio" id="listing_type_standard" name="listing_type" value="standard" \'+(post_listing_type == \'standard\' || post_listing_type == \'\' ? \'checked="checked"\' : \'\')+\' /> <label for="listing_type_standard">'; ?>
<?php echo $this->_tpl_vars['lang']['standard']; ?>
<?php echo '</label>\';
                            } else {
                                if ((post_listing_type == \'standard\' && plan.Standard_remains > 0) || (post_listing_type == \'\' && (plan.Standard_remains > 0 || plan.Standard_remains == \'\'))) {
                                    var standard_checked = \'checked="checked"\';
                                }
                                standard_field = \'<input type="radio" id="listing_type_standard" name="listing_type" value="standard" \'+standard_checked+\' \'+(plan.Standard_remains <= 0 ? \' disabled="disabled"\' : \'\')+\' /> <label for="listing_type_standard">'; ?>
<?php echo $this->_tpl_vars['lang']['standard']; ?>
<?php echo ' (\'+ plan.Standard_remains +\')</label>\';
                            }
                            if (plan.Featured_listings == 0) {
                                featured_field = \'<input type="radio" id="listing_type_featured" name="listing_type" value="featured" \'+(post_listing_type == \'featured\' || (post_listing_type == \'\' && plan.Standard_remains <= 0 && plan.Standard_listings > 0) ? \'checked="checked"\' : \'\')+\' /> <label for="listing_type_featured">'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo '</label>\';
                            } else {
                                if ((post_listing_type == \'featured\' && plan.Featured_remains > 0) || (post_listing_type == \'\' && (plan.Featured_remains > 0 || plan.Featured_remains == \'\'))) {
                                    var featured_checked = \'checked="checked"\';
                                }
                                featured_field = \'<input type="radio" id="listing_type_featured" name="listing_type" value="featured" \'+featured_checked+\' \'+(plan.Featured_remains <= 0 ? \' disabled="disabled"\' : \'\')+\' /> <label for="listing_type_featured">'; ?>
<?php echo $this->_tpl_vars['lang']['featured']; ?>
<?php echo ' (\'+ plan.Featured_remains +\')</label>\';
                            }
                            $(\'select[name="status"]\').parent().parent().after(\'<tr class="listing_type"><td class="name">'; ?>
<?php echo $this->_tpl_vars['lang']['listing_type']; ?>
<?php echo ' <span class="red">*</span></td><td class="field">\' +standard_field + featured_field + \'</td></tr>\');
                        }
                        '; ?>
<?php endif; ?><?php echo '
                    '; ?>

                    </script>
                </td>
            </tr>
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
 <span class="red">*</span></td>
                <td class="field">
                    <select name="status" class="login_input_select">
                        <option value="active" <?php if ($this->_tpl_vars['sPost']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                        <option value="approval" <?php if ($this->_tpl_vars['sPost']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                    </select>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsFormEdit'), $this);?>


            </table>

            <?php $_from = $this->_tpl_vars['form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
            <?php if ($this->_tpl_vars['group']['Group_ID']): ?>
                <?php if ($this->_tpl_vars['group']['Fields'] || ! $this->_tpl_vars['group']['Display']): ?>
                    <?php $this->assign('hide', 'false'); ?>
                <?php else: ?>
                    <?php $this->assign('hide', 'true'); ?>
                <?php endif; ?>

                <fieldset>
                <legend id="legend_group_<?php echo $this->_tpl_vars['group']['Key']; ?>
" class="up" onclick="fieldset_action('group_<?php echo $this->_tpl_vars['group']['Key']; ?>
');"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['group']['pName']]; ?>
</legend>
                    <div id="group_<?php echo $this->_tpl_vars['group']['Key']; ?>
">
                    <?php if ($this->_tpl_vars['group']['Fields']): ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'],'itemId' => $this->_tpl_vars['listing_info']['ID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php else: ?>
                        <span><?php echo $this->_tpl_vars['lang']['no_items_in_group']; ?>
</span>
                    <?php endif; ?>
                    </div>
                </fieldset>
            <?php else: ?>
                <div style="padding: 0 16px;">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field.tpl') : smarty_modifier_cat($_tmp, 'field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['group']['Fields'],'itemId' => $this->_tpl_vars['listing_info']['ID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>

            <table class="form" style="margin: 0 16px;">
            <tr>
                <td class="no_divider"></td>
                <td class="field"><input type="submit" value="<?php echo $this->_tpl_vars['lang']['edit_listing']; ?>
" /></td>
            </tr>
            </table>
        </form>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        <!-- listing fieldset end -->
    <?php elseif ($_GET['action'] == 'photos'): ?>
        <!-- manage listing photo -->

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <!-- listing info -->
        <fieldset style="margin: 0 0 10px 0;">
            <legend id="legend_details" class="up" onclick="fieldset_action('details');"><?php echo $this->_tpl_vars['lang']['listing_details']; ?>
</legend>
            <div id="details">
                <h3 style="margin: 0 0 10px 10px;"><?php echo $this->_tpl_vars['listing']['listing_title']; ?>
</h3>
                <table class="list" style="margin: 0 10px 5px 10px;">
                <?php $_from = $this->_tpl_vars['listing']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                <?php if (! empty ( $this->_tpl_vars['item']['value'] )): ?>
                <tr>
                    <td class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
:</td>
                    <td class="value"><?php echo $this->_tpl_vars['item']['value']; ?>
</td>
                </tr>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                </table>
            </div>
        </fieldset>
        <!-- listing info end -->

        <!-- photos list -->
        <fieldset style="margin: 10px 0;">
            <legend id="legend_photos_list" class="up" onclick="fieldset_action('photos_list');"><?php echo $this->_tpl_vars['lang']['pictures_manager']; ?>
</legend>
            <div id="photos_list">
                <div style="padding: 0 10px;" id="photos_dom">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'photo_manager.tpl') : smarty_modifier_cat($_tmp, 'photo_manager.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
            </div>
        </fieldset>
        <!-- photos list end -->

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsPhotos'), $this);?>


        <style type="text/css">
        @import url("<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
cropper/cropper.css?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
");
        </style>

        <script src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
cropper/cropper.min.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

        <script>
        lang['crop_completed'] = "<?php echo $this->_tpl_vars['lang']['crop_completed']; ?>
";
        rlConfig['current_listing_id'] = <?php echo $this->_tpl_vars['listing']['ID']; ?>
;
        rlConfig['current_listing_account_id'] = <?php echo $this->_tpl_vars['listing']['Account_ID']; ?>
;
        rlConfig['img_crop_module'] = <?php echo $this->_tpl_vars['config']['img_crop_module']; ?>
;
        rlConfig['img_crop_thumbnail'] = <?php echo $this->_tpl_vars['config']['img_crop_thumbnail']; ?>
;
        rlConfig['pg_upload_thumbnail_width'] = <?php if ($this->_tpl_vars['config']['pg_upload_thumbnail_width']): ?><?php echo $this->_tpl_vars['config']['pg_upload_thumbnail_width']; ?>
<?php else: ?>120<?php endif; ?>;
        rlConfig['pg_upload_thumbnail_height'] = <?php if ($this->_tpl_vars['config']['pg_upload_thumbnail_height']): ?><?php echo $this->_tpl_vars['config']['pg_upload_thumbnail_height']; ?>
<?php else: ?>90<?php endif; ?>;
        </script>

        <script src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
js/crop.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

        <!-- file crop -->
        <div id="crop_block" class="hide">
            <fieldset style="margin: 10px 0;">
                <legend id="legend_crop_area" class="up" onclick="fieldset_action('crop_area');"><?php echo $this->_tpl_vars['lang']['pictures_manager']; ?>
</legend>
                <div id="crop_area">

                    <div class="dark"><?php echo $this->_tpl_vars['lang']['crop_notice']; ?>
</div>
                    <div id="crop_obj" style="padding: 10px 0;"></div>

                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['rl_accept']; ?>
" data-default-phrase="<?php echo $this->_tpl_vars['lang']['rl_accept']; ?>
" id="crop_accept" />
                    <input type="button" class="button" value="<?php echo $this->_tpl_vars['lang']['cancel']; ?>
" id="crop_cancel" />
                </div>
            </fieldset>
        </div>
        <!-- file crop end -->

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <!-- manage listing photo end -->
    <?php elseif ($_GET['action'] == 'video'): ?>
        <!-- add listing video -->

        <?php if ($this->_tpl_vars['listing']['Plan_video'] || $this->_tpl_vars['listing']['Video_unlim']): ?>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <!-- listing info -->
            <fieldset style="margin: 0 0 10px 0;">
                <legend id="legend_details" class="up" onclick="fieldset_action('details');"><?php echo $this->_tpl_vars['lang']['listing_details']; ?>
</legend>
                <div id="details">
                    <h3 style="margin: 0 0 10px 10px;"><?php echo $this->_tpl_vars['listing']['listing_title']; ?>
</h3>
                    <table class="list" style="margin: 0 10px 5px 10px;">
                    <?php $_from = $this->_tpl_vars['listing']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                    <?php if (! empty ( $this->_tpl_vars['item']['value'] )): ?>
                    <tr>
                        <td class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
:</td>
                        <td class="value"><?php echo $this->_tpl_vars['item']['value']; ?>
</td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </table>
                </div>
            </fieldset>
            <!-- listing info end -->

            <!-- file uploader -->
            <fieldset style="margin: 10px 0;">
                <?php if ($this->_tpl_vars['video_allow'] && ! $this->_tpl_vars['listing']['Video_unlim']): ?>
                    <?php $this->assign('replace', ('{')."number".('}')); ?>
                    <?php $this->assign('video_left', ((is_array($_tmp=$this->_tpl_vars['lang']['upload_video_left'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video_allow']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video_allow']))); ?>
                <?php else: ?>
                    <?php $this->assign('video_left', $this->_tpl_vars['lang']['upload_video']); ?>
                <?php endif; ?>

                <legend id="legend_upload_area" class="up" onclick="fieldset_action('upload_area');"><span id="video_left"><?php echo $this->_tpl_vars['video_left']; ?>
</span></legend>
                <div id="upload_area">

                    <?php if (! $this->_tpl_vars['video_allow'] && ! $this->_tpl_vars['listing']['Video_unlim']): ?>
                        <?php $this->assign('replace_count', ('{')."count".('}')); ?>
                        <?php $this->assign('replace_plan', ('{')."plan".('}')); ?>
                        <?php $this->assign('plan_key', ((is_array($_tmp='listing_plans+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['listing']['Plan_key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['listing']['Plan_key']))); ?>
                        <div class="grey_middle" style="padding: 0 0 5px 10px"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['lang']['no_more_videos'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_count'], $this->_tpl_vars['listing']['Plan_video']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_count'], $this->_tpl_vars['listing']['Plan_video'])))) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_plan'], $this->_tpl_vars['lang'][$this->_tpl_vars['plan_key']]) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_plan'], $this->_tpl_vars['lang'][$this->_tpl_vars['plan_key']])); ?>
</div>
                    <?php endif; ?>

                    <div id="protect" <?php if (! $this->_tpl_vars['video_allow'] && ! $this->_tpl_vars['listing']['Video_unlim']): ?>class="hide"<?php endif; ?>>
                    <form method="post" action="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
&amp;action=video&amp;id=<?php echo $_GET['id']; ?>
" enctype="multipart/form-data">
                        <input name="upload" value="true" type="hidden" />
                        <div style="margin: 0 0 5px 10px;">
                            <table class="form" id="upload_fields">
                            <tr>
                                <td class="name w130"><?php echo $this->_tpl_vars['lang']['video_type']; ?>
:</td>
                                <td class="field">
                                    <select id="type_selector" name="type" >
                                        <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                                        <option <?php if ($_POST['type'] == 'local'): ?>selected="selected"<?php endif; ?> value="local"><?php echo $this->_tpl_vars['lang']['local']; ?>
</option>
                                        <option <?php if ($_POST['type'] == 'youtube'): ?>selected="selected"<?php endif; ?> value="youtube"><?php echo $this->_tpl_vars['lang']['youtube']; ?>
</option>
                                    </select>
                                </td>
                            </tr>
                            </table>

                            <div id="local_video" class="upload<?php if ($_POST['type'] != 'local'): ?> hide<?php endif; ?>">
                                <table class="form">
                                <tr>
                                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['file']; ?>
:</td>
                                    <td class="field">
                                        <input class="file" type="file" name="video" />
                                        <table>
                                        <tr>
                                            <td><?php echo $this->_tpl_vars['lang']['max_file_size']; ?>
:</td>
                                            <td><b><em><?php echo $this->_tpl_vars['max_file_size']; ?>
</em></b></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $this->_tpl_vars['lang']['available_file_type']; ?>
:</td>
                                            <td>
                                                <?php $_from = $this->_tpl_vars['l_player_file_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['file_typesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['file_typesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['f_type'] => $this->_tpl_vars['item']):
        $this->_foreach['file_typesF']['iteration']++;
?>
                                                <b><em><?php echo $this->_tpl_vars['f_type']; ?>
</em></b><?php if (! ($this->_foreach['file_typesF']['iteration'] == $this->_foreach['file_typesF']['total'])): ?>,<?php endif; ?>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['preview_image']; ?>
:</td>
                                    <td class="field">
                                        <input class="file" type="file" name="preview" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="button" type="submit" value="<?php echo $this->_tpl_vars['lang']['upload']; ?>
" />
                                    </td>
                                </tr>
                                </table>
                            </div>

                            <div id="youtube_video" class="upload<?php if ($_POST['type'] != 'youtube'): ?> hide<?php endif; ?>">
                                <table class="form">
                                <tr>
                                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['embed']; ?>
:</td>
                                    <td class="field">
                                        <textarea style="width: 500px; height: 80px;" cols="" rows="" name="youtube_embed"><?php echo $_POST['youtube_embed']; ?>
</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input class="button" type="submit" value="<?php echo $this->_tpl_vars['lang']['upload']; ?>
" />
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </fieldset>
            <!-- file uploader end -->

            <!-- video list -->
            <fieldset style="margin: 10px 0;">
                <legend id="legend_video_area" class="up" onclick="fieldset_action('video_area');"><?php echo $this->_tpl_vars['lang']['listing_video']; ?>
</legend>
                <div id="video_area" style="padding: 0 0 4px 10px;">
                    <?php if (empty ( $this->_tpl_vars['videos'] )): ?>
                        <div class="grey_middle"><?php echo $this->_tpl_vars['lang']['no_video_uploaded']; ?>
</div>
                    <?php else: ?>
                        <?php $this->assign('replace', ('{')."key".('}')); ?>
                        <ul class="items" id="uploaded_video">
                        <?php $_from = $this->_tpl_vars['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['video']):
?>
                            <li id="video_<?php echo $this->_tpl_vars['video']['ID']; ?>
">
                                <?php if ($this->_tpl_vars['video']['Type'] == 'local'): ?>
                                    <?php $this->assign('preview_url', ((is_array($_tmp=(defined('RL_FILES_URL') ? @RL_FILES_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['video']['Video']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['video']['Video']))); ?>
                                    <video controls>
                                         <source src="<?php echo $this->_tpl_vars['preview_url']; ?>
" type="video/mp4">
                                    </video>
                                <?php else: ?>
                                    <?php $this->assign('preview_url', ((is_array($_tmp=$this->_tpl_vars['l_youtube_thumbnail'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video']['Preview']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video']['Preview']))); ?>
                                    <img class="preview_item" src="<?php echo $this->_tpl_vars['preview_url']; ?>
" alt="" />
                                <?php endif; ?>

                                <img title="<?php echo $this->_tpl_vars['lang']['remove']; ?>
" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" id="remove_<?php echo $this->_tpl_vars['video']['ID']; ?>
" class="remove_item" alt="" />
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </fieldset>
            <!-- video list end -->

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsVideo'), $this);?>


            <script type="text/javascript">//<![CDATA[
            var video_listing_id = <?php echo $this->_tpl_vars['listing']['ID']; ?>
;
            var sort_save = false;
            <?php echo '

            $(\'div#video_area ul.items\').sortable({
                placeholder: \'hover\',
                stop: function(event, obj){
                    /* save sorting */
                    var sort = \'\';
                    var count = 0;
                    $(\'div#video_area ul.items li\').each(function(){
                        var id = $(this).attr(\'id\').split(\'_\')[1];
                        count++;
                        var pos = $(\'div#video_area ul.items li\').index($(this))+1;
                        sort += id+\',\'+pos+\';\';
                    });

                    if ( sort.length > 0 && count > 1 && sort_save != sort )
                    {
                        sort_save = sort;
                        sort = rtrim(sort, \';\');
                        xajax_reorderVideo(video_listing_id, sort);
                    }
                }
            });

            $(document).ready(function(){
                $(\'#type_selector\').change(function(){
                    var id = $(this).val().split(\'_\')[0];
                    $(\'div.upload\').slideUp();
                    $(\'div#\'+id+\'_video\').slideDown(\'slow\');
                });

                $(\'img.remove_item\').click(function(){
                    rlConfirm("'; ?>
<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
<?php echo '", \'xajax_deleteVideo\', $(this).attr(\'id\').split(\'_\')[1]);
                });
            });

            '; ?>

            //]]>
            </script>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php endif; ?>

        <!-- add listing video end -->

    <?php elseif ($_GET['action'] == 'view'): ?>
        <ul class="tabs">
            <?php $_from = $this->_tpl_vars['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tab']):
        $this->_foreach['tabsF']['iteration']++;
?>
            <li lang="<?php echo $this->_tpl_vars['tab']['key']; ?>
" <?php if (($this->_foreach['tabsF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['tab']['name']; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>

        <div class="tab_area listing listing_details">
            <table class="sTable">
            <tr>
                <td class="sidebar">
                    <?php if ($this->_tpl_vars['photos']): ?>
                        <ul class="media">
                        <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['photosF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['photosF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['photo']):
        $this->_foreach['photosF']['iteration']++;
?>
                            <li class="media-<?php echo $this->_tpl_vars['photo']['Type']; ?>
">
                                <?php if ($this->_tpl_vars['photo']['Video_type'] == 'local'): ?>
                                    <video><source src="<?php echo $this->_tpl_vars['photo']['Thumbnail']; ?>
" type="video/mp4"></source></video>
                                <?php else: ?>
                                    <img src="<?php if (($this->_foreach['photosF']['iteration'] <= 1) && $this->_tpl_vars['photo']['Type'] == 'image'): ?><?php echo $this->_tpl_vars['photo']['Photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['photo']['Thumbnail']; ?>
<?php endif; ?>" />
                                <?php endif; ?>
                             </li>
                        <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    <?php endif; ?>

                    <ul class="statistics"<?php if (! $this->_tpl_vars['photos']): ?> style="padding-top: 0;"<?php endif; ?>>
                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingBeforeStats'), $this);?>


                        <li><span class="name"><?php echo $this->_tpl_vars['lang']['category']; ?>
:</span> <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=browse&amp;id=<?php echo $this->_tpl_vars['listing_data']['Category_ID']; ?>
" target="_blank"><?php echo $this->_tpl_vars['listing_data']['category_name']; ?>
</a></li>
                        <?php if ($this->_tpl_vars['config']['count_listing_visits']): ?><li><span class="name"><?php echo $this->_tpl_vars['lang']['shows']; ?>
:</span> <?php echo $this->_tpl_vars['listing_data']['Shows']; ?>
</li><?php endif; ?>
                        <?php if ($this->_tpl_vars['config']['display_posted_date']): ?><li><span class="name"><?php echo $this->_tpl_vars['lang']['posted']; ?>
:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['listing_data']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</li><?php endif; ?>

                        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingAfterStats'), $this);?>

                    </ul>
                </td>
                <td valign="top">
                    <!-- listing info -->
                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apListingDetailsPreFields'), $this);?>


                    <?php $_from = $this->_tpl_vars['listing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
                        <?php if ($this->_tpl_vars['group']['Group_ID']): ?>
                            <?php $this->assign('hide', true); ?>
                            <?php if ($this->_tpl_vars['group']['Fields'] && $this->_tpl_vars['group']['Display']): ?>
                                <?php $this->assign('hide', false); ?>
                            <?php endif; ?>

                            <?php $this->assign('value_counter', '0'); ?>
                            <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['groupsF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['groupsF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['group_values']):
        $this->_foreach['groupsF']['iteration']++;
?>
                                <?php if ($this->_tpl_vars['group_values']['value'] == '' || ! $this->_tpl_vars['group_values']['Details_page']): ?>
                                    <?php $this->assign('value_counter', $this->_tpl_vars['value_counter']+1); ?>
                                <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>

                            <?php if (! empty ( $this->_tpl_vars['group']['Fields'] ) && ( $this->_foreach['groupsF']['total'] != $this->_tpl_vars['value_counter'] )): ?>
                                <fieldset class="light">
                                    <legend id="legend_group_<?php echo $this->_tpl_vars['group']['ID']; ?>
" class="up" onclick="fieldset_action('group_<?php echo $this->_tpl_vars['group']['ID']; ?>
');"><?php echo $this->_tpl_vars['group']['name']; ?>
</legend>
                                    <div id="group_<?php echo $this->_tpl_vars['group']['ID']; ?>
" class="tree">

                                        <table class="list">
                                        <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fListings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fListings']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['field'] => $this->_tpl_vars['item']):
        $this->_foreach['fListings']['iteration']++;
?>
                                            <?php if (! empty ( $this->_tpl_vars['item']['value'] ) && $this->_tpl_vars['item']['Details_page']): ?>
                                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field_out.tpl') : smarty_modifier_cat($_tmp, 'field_out.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                        </table>

                                    </div>
                                </fieldset>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if ($this->_tpl_vars['group']['Fields']): ?>
                                <table class="list">
                                <?php $_from = $this->_tpl_vars['group']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                    <?php if (! empty ( $this->_tpl_vars['item']['value'] ) && $this->_tpl_vars['item']['Details_page']): ?>
                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'field_out.tpl') : smarty_modifier_cat($_tmp, 'field_out.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                    <?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                </table>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>

                    <?php if ($this->_tpl_vars['config']['map_module'] && $this->_tpl_vars['location']['direct']): ?>
                        <fieldset class="light">
                            <legend id="legend_group_map_system" class="up" onclick="fieldset_action('group_map_system');"><?php echo $this->_tpl_vars['lang']['map']; ?>
</legend>
                            <div id="group_map_system" class="tree">
                                <div id="map_container" style="height: 30vw;"></div>
                            </div>
                        </fieldset>

                        <?php echo $this->_plugins['function']['mapsAPI'][0][0]->adminMapsAPI(array(), $this);?>


                        <script>
                        <?php echo '

                        $(function(){
                            flMap.init($(\'#map_container\'), {
                                zoom: '; ?>
<?php echo $this->_tpl_vars['config']['map_default_zoom']; ?>
<?php echo ',
                                addresses: [{
                                    latLng: \''; ?>
<?php echo $this->_tpl_vars['location']['direct']; ?>
',
                                    content: '<?php echo ((is_array($_tmp=$this->_tpl_vars['location']['show'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
<?php echo '\'
                                }]
                            });
                        });

                        '; ?>

                        </script>
                    <?php endif; ?>
                    <!-- listing info end -->
                </td>
            </tr>
            </table>

            <script type="text/javascript">
            let galleryData = [];

            <?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['photosF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['photosF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['photo']):
        $this->_foreach['photosF']['iteration']++;
?>
                galleryData.push(<?php echo '{'; ?>

                    type: '<?php if ($this->_tpl_vars['photo']['Type'] == 'video'): ?><?php if ($this->_tpl_vars['photo']['Original'] == 'youtube'): ?>iframe<?php else: ?>html5video<?php endif; ?><?php else: ?>image<?php endif; ?>',
                    src: '<?php if ($this->_tpl_vars['photo']['Type'] == 'video'): ?><?php if ($this->_tpl_vars['photo']['Original'] == 'youtube'): ?>https://www.youtube.com/embed/<?php echo $this->_tpl_vars['photo']['Photo']; ?>
?rel=0<?php else: ?><?php echo $this->_tpl_vars['photo']['Thumbnail']; ?>
<?php endif; ?><?php else: ?><?php echo $this->_tpl_vars['photo']['Photo']; ?>
<?php endif; ?>',
                    thumb: '<?php if ($this->_tpl_vars['photo']['Type'] == 'video' && $this->_tpl_vars['photo']['Original'] != 'youtube'): ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/play.svg<?php else: ?><?php echo $this->_tpl_vars['photo']['Thumbnail']; ?>
<?php endif; ?>',
                    caption: "<?php if ($this->_tpl_vars['photo']['Description']): ?><?php echo $this->_tpl_vars['photo']['Description']; ?>
<?php else: ?><?php echo $this->_tpl_vars['pageInfo']['name']; ?>
<?php endif; ?>",
                    youtubeKey: "<?php if ($this->_tpl_vars['photo']['Type'] == 'video' && $this->_tpl_vars['photo']['Original'] == 'youtube'): ?><?php echo $this->_tpl_vars['photo']['Photo']; ?>
<?php endif; ?>",
                <?php echo '}'; ?>
);
            <?php endforeach; endif; unset($_from); ?>
            <?php echo '

            $(function(){
                flUtil.loadStyle(rlConfig.libs_url + \'fancyapps/fancybox.css\');
                flUtil.loadScript(rlConfig.libs_url + \'fancyapps/fancybox.umd.js\', function(){
                    var $media = $(\'ul.media > li\');

                    $media.click(function(){
                        let index = $media.index(this)

                        Fancybox.show(galleryData, {
                            startIndex: index
                        });
                    });
                });
            });

            '; ?>

            </script>
        </div>

        <div class="tab_area seller listing_details hide">
            <table class="sTatic">
            <tr>
                <td valign="top" style="width: 170px;text-align: right;padding-right: 20px;">
                    <a title="<?php echo $this->_tpl_vars['lang']['visit_owner_page']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&amp;action=view&amp;userid=<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
">
                        <img style="display: inline;width: auto;" <?php if (! empty ( $this->_tpl_vars['seller_info']['Photo'] )): ?>class="thumbnail"<?php endif; ?> alt="<?php echo $this->_tpl_vars['lang']['seller_thumbnail']; ?>
" src="<?php if (! empty ( $this->_tpl_vars['seller_info']['Photo'] )): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['seller_info']['Photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/no-account.png<?php endif; ?>" />
                    </a>

                    <ul class="info">
                        <?php if ($this->_tpl_vars['config']['messages_module']): ?><li><input id="contact_owner" type="button" value="<?php echo $this->_tpl_vars['lang']['contact_owner']; ?>
" /></li><?php endif; ?>
                        <?php if ($this->_tpl_vars['seller_info']['Own_page']): ?>
                            <li><a target="_blank" title="<?php echo $this->_tpl_vars['lang']['visit_owner_page']; ?>
" href="<?php echo $this->_tpl_vars['seller_info']['Personal_address']; ?>
"><?php echo $this->_tpl_vars['lang']['visit_owner_page']; ?>
</a></li>
                            <li><a title="<?php echo $this->_tpl_vars['lang']['other_owner_listings']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&amp;action=view&amp;userid=<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
#listings"><?php echo $this->_tpl_vars['lang']['other_owner_listings']; ?>
</a> <span class="counter">(<?php echo $this->_tpl_vars['seller_info']['Listings_count']; ?>
)</span></li>
                        <?php endif; ?>
                    </ul>
                </td>
                <td valign="top">
                    <div class="username"><?php echo $this->_tpl_vars['seller_info']['Full_name']; ?>
</div>
                    <?php if ($this->_tpl_vars['seller_info']['Fields']): ?>
                        <table class="list" style="margin-bottom: 20px;">
                            <tr id="si_field_username">
                                <td class="name"><?php echo $this->_tpl_vars['lang']['username']; ?>
:</td>
                                <td class="value first"><?php echo $this->_tpl_vars['seller_info']['Username']; ?>
</td>
                            </tr>
                            <tr id="si_field_date">
                                <td class="name"><?php echo $this->_tpl_vars['lang']['join_date']; ?>
:</td>
                                <td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['seller_info']['Date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null)) : smarty_modifier_date_format($_tmp, (defined('RL_DATE_FORMAT') ? @RL_DATE_FORMAT : null))); ?>
</td>
                            </tr>
                            <tr id="si_field_email">
                                <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
:</td>
                                <td class="value"><a href="mailto:<?php echo $this->_tpl_vars['seller_info']['Mail']; ?>
"><?php echo $this->_tpl_vars['seller_info']['Mail']; ?>
</a></td>
                            </tr>

                            <?php if ($this->_tpl_vars['seller_info']['Personal_address']): ?>
                                <tr id="si_field_personal_address">
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['personal_address']; ?>
:</td>
                                    <td class="value">
                                        <a target="_blank" href="<?php echo $this->_tpl_vars['seller_info']['Personal_address']; ?>
">
                                            <?php echo $this->_tpl_vars['seller_info']['Personal_address']; ?>

                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if ($this->_tpl_vars['seller_info']['Agency_Info']): ?>
                                <tr id="si_field_agency">
                                    <td class="name"><?php echo $this->_tpl_vars['lang']['agency']; ?>
:</td>
                                    <td class="value">
                                        <a target="_blank" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&action=view&userid=<?php echo $this->_tpl_vars['seller_info']['Agency_Info']['ID']; ?>
">
                                            <?php echo $this->_tpl_vars['seller_info']['Agency_Info']['Full_name']; ?>

                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsUserInfo'), $this);?>

                        </table>

                        <table class="list">
                        <?php $_from = $this->_tpl_vars['seller_info']['Fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sellerF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sellerF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['sellerF']['iteration']++;
?>
                            <?php if (! empty ( $this->_tpl_vars['item']['value'] )): ?>
                            <tr id="si_field_<?php echo $this->_tpl_vars['item']['Key']; ?>
">
                                <td class="name"><?php echo $this->_tpl_vars['item']['name']; ?>
:</td>
                                <td class="value">
                                    <?php if ($this->_tpl_vars['item']['Type'] === 'phone'): ?>
                                        <span class="mr-3">
                                            <a href="tel:<?php echo $this->_tpl_vars['item']['value']; ?>
"><?php echo $this->_tpl_vars['item']['value']; ?>
</a>
                                        </span>

                                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/field_out_phone_messengers.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                    <?php else: ?>
                                        <?php echo $this->_tpl_vars['item']['value']; ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                        </table>
                    <?php endif; ?>
                </td>
            </tr>
            </table>

            <script type="text/javascript">
            var owner_id = <?php if ($this->_tpl_vars['seller_info']['ID']): ?><?php echo $this->_tpl_vars['seller_info']['ID']; ?>
<?php else: ?>false<?php endif; ?>
            <?php echo '

            $(document).ready(function(){
                $(\'#contact_owner\').click(function(){
                    rlPrompt(\''; ?>
<?php echo $this->_tpl_vars['lang']['contact_owner']; ?>
<?php echo '\', \'xajax_contactOwner\', owner_id, true);
                });
            });

            '; ?>

            </script>
        </div>

        <?php if ($this->_tpl_vars['videos']): ?>
            <div class="tab_area video listing_details hide">
                <script>var videos_source = new Array();</script>
                <?php $this->assign('replace', ('{')."key".('}')); ?>

                <ul class="media media-video">
                <?php $_from = $this->_tpl_vars['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['video']):
?>
                    <script>
                    videos_source.push(<?php echo '{'; ?>

                        ID: '<?php echo $this->_tpl_vars['video']['ID']; ?>
',
                        Video: '<?php echo $this->_tpl_vars['video']['Original']; ?>
',
                        Preview: '<?php if ($this->_tpl_vars['video']['Original'] == 'youtube'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['l_youtube_direct'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video']['Photo']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['video']['Photo'])); ?>
<?php else: ?><?php echo $this->_tpl_vars['video']['Thumbnail']; ?>
<?php endif; ?>',
                        Type: '<?php if ($this->_tpl_vars['video']['Original'] == 'youtube'): ?>youtube<?php else: ?>local<?php endif; ?>',
                        Width: '<?php echo $this->_tpl_vars['config']['video_width']; ?>
',
                        Height: '<?php echo $this->_tpl_vars['config']['video_height']; ?>
'
                    <?php echo '}'; ?>
);
                    </script>

                    <li id="video_<?php echo $this->_tpl_vars['video']['ID']; ?>
">
                        <?php if ($this->_tpl_vars['video']['Type'] == 'local'): ?>
                            <?php $this->assign('preview_url', ((is_array($_tmp=(defined('RL_FILES_URL') ? @RL_FILES_URL : null))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['video']['Video']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['video']['Video']))); ?>
                            <video controls>
                                 <source src="<?php echo $this->_tpl_vars['preview_url']; ?>
" type="video/mp4">
                            </video>
                        <?php else: ?>
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $this->_tpl_vars['video']['Preview']; ?>
" frameborder="0" allow="accelerometer;encrypted-media; gyroscope;" allowfullscreen></iframe>
                        <?php endif; ?>
                    </li>
                <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsTabsArea'), $this);?>

    <?php else: ?>
        <?php if (! $this->_tpl_vars['config']['cron_last_run']): ?>
        <script type="text/javascript">
            printMessage('alert', '<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['cron_not_configured'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
');
        </script>
        <?php endif; ?>

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

        var ui = typeof( rl_ui ) != 'undefined' ? '&ui='+rl_ui : '';
        var ui_cat_id = typeof( cur_cat_id ) != 'undefined' ? '&cat_id='+cur_cat_id : '';

        /* read cookies filters */
        var cookies_filters = false;

        if ( readCookie('listings_sc') )
            cookies_filters = readCookie('listings_sc').split(',');

        <?php if (isset ( $this->_tpl_vars['status'] )): ?>
            cookies_filters = new Array();
            cookies_filters[0] = new Array('Status', '<?php echo $this->_tpl_vars['status']; ?>
');
        <?php endif; ?>

        <?php if ($_GET['username']): ?>
            cookies_filters = new Array();
            cookies_filters[0] = new Array('Account', '<?php echo $_GET['username']; ?>
');
        <?php endif; ?>

        <?php if ($_GET['account_type']): ?>
            cookies_filters = new Array();
            cookies_filters[0] = new Array('account_type', '<?php echo $_GET['account_type']; ?>
');
        <?php endif; ?>

        <?php if ($_GET['listing_type']): ?>
            cookies_filters = new Array();
            cookies_filters[0] = new Array('Type', '<?php echo $_GET['listing_type']; ?>
');
        <?php endif; ?>

        <?php if ($_GET['plan_id']): ?>
            cookies_filters = new Array();
            cookies_filters[0] = new Array('Plan_ID', '<?php echo $_GET['plan_id']; ?>
');
        <?php endif; ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsRemoteFilter'), $this);?>


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
                ajaxUrl: rlUrlHome + \'controllers/listings.inc.php?q=ext\',
                defaultSortField: \'Date\',
                defaultSortType: \'DESC\',
                remoteSortable: false,
                checkbox: true,
                actions: mass_actions,
                filters: cookies_filters,
                filtersPrefix: true,
                title: lang[\'ext_listings_manager\'],
                expander: true,
                expanderTpl: \'<div style="margin: 0 5px 5px 83px"> \\
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
                    {name: \'Plan_type\', mapping: \'Plan_type\'},
                    {name: \'Featured_ID\', mapping: \'Featured_ID\', type: \'int\'},
                    {name: \'Plan_info\', mapping: \'Plan_info\'},
                    {name: \'Cat_ID\', mapping: \'Cat_ID\', type: \'int\'},
                    {name: \'Cat_custom\', mapping: \'Cat_custom\', type: \'int\'},
                    {name: \'Status\', mapping: \'Status\'},
                    {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Pay_date\', mapping: \'Pay_date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Expired_date\', mapping: \'Expired_date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'Featured_expired_date\', mapping: \'Featured_expired_date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                    {name: \'thumbnail\', mapping: \'thumbnail\', type: \'string\'},
                    {name: \'fields\', mapping: \'fields\', type: \'string\'},
                    {name: \'data\', mapping: \'data\', type: \'string\'},
                    {name: \'Status_value\', mapping: \'Status_value\'},
                    {name: \'Allow_photo\', mapping: \'Allow_photo\', type: \'int\'},
                    {name: \'Allow_video\', mapping: \'Allow_video\', type: \'int\'}
                ],
                columns: [
                    {
                        header: lang[\'ext_id\'],
                        dataIndex: \'ID\',
                        width: 50,
                        fixed: true,
                        id: \'rlExt_black_bold\'
                    },{
                        header: lang[\'ext_title\'],
                        dataIndex: \'title\',
                        width: 23,
                        renderer: function(val, ext, row){
                            var out = \'<a href="\'+rlUrlHome+\'index.php?controller=listings&action=view&id=\'+row.data.ID+\'">\'+val+\'</a>\';
                            return out;
                        }
                    },{
                        header: lang[\'ext_owner\'],
                        dataIndex: \'Username\',
                        width: 120,
                        fixed: true,
                        id: \'rlExt_item_bold\',
                        renderer: function(username, ext, row){
                            return "<a target=\'_blank\' ext:qtip=\'"+lang[\'ext_click_to_view_details\']+"\' href=\'"+rlUrlHome+"index.php?controller=accounts&action=view&userid="+row.data.Account_ID+"\'>"+username+"</a>"
                        }
                    },{
                        header: `${lang.ext_type}/${lang.ext_category}`,
                        dataIndex: \'Type\',
                        width: 14
                    },{
                        header: lang[\'ext_add_date\'],
                        dataIndex: \'Date\',
                        width: 10,
                        hidden: true,
                        renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                    },{
                        header: lang[\'ext_payed\'],
                        dataIndex: \'Pay_date\',
                        width: 90,
                        fixed: true,
                        renderer: function(val){
                            if (!val) {
                                return \'<span class="delete" ext:qtip="\'+lang[\'ext_click_to_set_pay\']+\'">\'+lang[\'ext_not_payed\']+\'</span>\';
                            } else {
                                let date = Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))(val);
                                return \'<span class="build" ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+date+\'</span>\';
                            }
                        },
                        editor: new Ext.form.DateField({
                            format: \'Y-m-d H:i:s\'
                        })
                    },{
                        header: \''; ?>
<?php echo $this->_tpl_vars['lang']['active_till']; ?>
<?php echo '\',
                        dataIndex: \'Expired_date\',
                        width: 90,
                        fixed: true,
                        renderer: function(date, row, store) {
                            if (store.json.Pay_date === store.json.Expired_date) {
                                return \''; ?>
<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
<?php echo '\';
                            } else {
                                return date
                                    ? \'<span ext:qtip="\' + lang.deny_change_ex_date + \'">\'
                                        + Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))(date)
                                        + \'</span>\'
                                    : lang.ext_not_available;
                            }
                        }
                    },{
                        header: \''; ?>
<?php echo $this->_tpl_vars['lang']['featured_till']; ?>
<?php echo '\',
                        dataIndex: \'Featured_expired_date\',
                        width: 90,
                        fixed: true,
                        renderer: function(date, row, store) {
                            if (store.json.Featured_date === store.json.Featured_expired_date) {
                                return \''; ?>
<?php echo $this->_tpl_vars['lang']['unlimited']; ?>
<?php echo '\';
                            } else {
                                return date
                                    ? \'<span ext:qtip="\' + lang.deny_change_ex_date + \'">\'
                                        + Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))(date)
                                        + \'</span>\'
                                    : lang.ext_not_available;
                            }
                        }
                    },{
                        header: lang[\'ext_plan\'],
                        dataIndex: \'Plan_ID\',
                        width: 140,
                        fixed: true,
                        editor: new Ext.form.ComboBox({
                            store: listing_plans,
                            mode: \'local\',
                            triggerAction: \'all\'
                        }),
                        renderer: function (val, obj, row){
                            if (row.data.Plan_type == \'account\') {
                                var qtip = lang[\'ext_uneditable\'];
                            } else {
                                var qtip = lang[\'ext_click_to_edit\'];
                            }
                            if (val != \'\') {
                                var f_class = row.data.Featured_ID > 0 ? \' featured\' : \'\';
                                return \'<img class="info\'+f_class+\'" ext:qtip="\'+row.data.Plan_info+\'" alt="" src="\'+rlUrlHome+\'img/blank.gif" />&nbsp;&nbsp;<span ext:qtip="\'+qtip+\'">\'+val+\'</span>\';
                            } else {
                                return \'<span class="delete" ext:qtip="\'+qtip+\'" style="margin-left: 21px;">\'+lang[\'ext_no_plan_set\']+\'</span>\';
                            }
                        }
                    },{
                        header: lang[\'ext_status\'],
                        dataIndex: \'Status\',
                        width: 100,
                        fixed: true,
                        editor: rights[cKey].indexOf(\'edit\') >= 0 ? new Ext.form.ComboBox({
                            store: [
                                [\'active\', lang.active],
                                [\'approval\', lang.approval]
                            ],
                            mode: \'local\',
                            typeAhead: true,
                            triggerAction: \'all\',
                            selectOnFocus: true,
                            listeners: {
                                beforeselect: function(combo, record){
                                    var index = combo.gridEditor.row;
                                    var row = listingsGrid.grid.store.data.items[index];

                                    if (record.data.field1 == \'active\' && row.data.Plan_type == \'account\' && row.data.Status_value == \'expired\') {
                                        Ext.MessageBox.confirm(lang[\'warning\'], \''; ?>
<?php echo $this->_tpl_vars['lang']['confirm_change_listing_status']; ?>
<?php echo '\', function(btn) {
                                            if (btn == \'yes\') {
                                                $.getJSON(rlConfig[\'ajax_url\'], {item: \'changeListingStatus\', id: row.data.ID, value: record.data.field1, membership_upgarde: true}, function(response) {
                                                    if (response) {
                                                        if (response.status == \'ok\') {
                                                            listingsGrid.reload();
                                                        } else {
                                                            printMessage(\'error\', lang[\'ext_error_saving_changes\']);
                                                        }
                                                    }
                                                });
                                            }
                                        });

                                        return false;
                                    }
                                }
                            }
                        }) : false
                    },{
                        header: lang[\'ext_actions\'],
                        width: 120,
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
                            out += "<a href=\'"+rlUrlHome+"index.php?controller=listings&action=view&id="+id+"\'><img class=\'view\' ext:qtip=\'"+lang[\'ext_view_details\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
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
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsGrid'), $this);?>
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

                listingsGrid.ids = \'\';

                for( var i = 0; i < sel_obj.length; i++ )
                {
                    listingsGrid.ids += sel_obj[i].id;
                    if ( sel_obj.length != i+1 )
                    {
                        listingsGrid.ids += \'|\';
                    }
                }

                switch (action){
                    case \'delete\':
                        Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn){
                            if ( btn == \'yes\' )
                            {
                                xajax_massActions( listingsGrid.ids, action );
                                listingsGrid.store.reload();
                            }
                        });

                        break;

                    case \'featured\':
                        $(\'#make_featured\').fadeIn(\'slow\');
                        return false;

                        break;

                    case \'annul_featured\':
                        $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                        Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_annul_featued_notice\'], function(btn){
                            if ( btn == \'yes\' )
                            {
                                xajax_annulFeatured( listingsGrid.ids );
                            }
                        });
                        return false;

                        break;

                    case \'move\':
                        $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                        $(\'#move_area\').fadeIn(\'slow\');
                        return false;

                        break;

                    default:
                        $(\'#make_featured,#move_area\').fadeOut(\'fast\');
                        xajax_massActions( listingsGrid.ids, action );
                        listingsGrid.store.reload();

                        break;
                }

                listingsGrid.checkboxColumn.clearSelections();
                listingsGrid.actionsDropDown.setVisible(false);
                listingsGrid.actionButton.setVisible(false);
            });

            listingsGrid.grid.addListener(\'beforeedit\', function(editEvent) {
                if (editEvent.field == \'Plan_ID\' && editEvent.record.data.Plan_type == \'account\') {
                    return false;
                }
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

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsMiddle'), $this);?>


        <div id="mass_areas">

            <!-- make featured -->
            <div id="make_featured" style="margin-top: 10px;" class="hide scroll">

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['make_featured'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <table class="form">
                <tr>
                    <td class="name w130"><span class="red">*</span><?php echo $this->_tpl_vars['lang']['plan']; ?>
</td>
                    <td class="field">
                        <select id="featured_plan">
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
                    <td class="w130"></td>
                    <td class="field">
                        <input type="button" onclick="xajax_makeFeatured(listingsGrid.ids, $('#featured_plan').val());" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" />
                        <a class="cancel" href="javascript:void(0)" onclick="$('#make_featured').fadeOut();"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
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
                var move_clicked = false;
                <?php echo '
                function moveOnCategorySelect(id, name) {
                    move_category_id = id;
                }

                function moveOnButtonClick() {
                    if (listingsGrid.ids.length > 0 && move_category_id > 0) {
                        if(!move_clicked) {
                            $(\'div.namespace-move a.button\').text(lang[\'loading\']);
                            xajax_moveListing(listingsGrid.ids, move_category_id);
                            move_clicked = true;
                        }
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

        </div>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplListingsBottom'), $this);?>


    <?php endif; ?>

    <?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>
        <script type="text/javascript">
            <?php echo '
                $(document).ready(function(){
                     flynax.onMapHandler();
                });
            '; ?>

        </script>
    <?php endif; ?>
<?php endif; ?>

<!-- listings tpl end -->