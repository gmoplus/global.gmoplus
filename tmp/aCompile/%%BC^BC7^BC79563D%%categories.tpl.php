<?php /* Smarty version 2.6.31, created on 2025-08-26 14:27:36
         compiled from controllers/categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/categories.tpl', 7, false),array('function', 'fckEditor', 'controllers/categories.tpl', 563, false),array('modifier', 'cat', 'controllers/categories.tpl', 18, false),array('modifier', 'replace', 'controllers/categories.tpl', 22, false),array('modifier', 'count', 'controllers/categories.tpl', 421, false),array('modifier', 'in_array', 'controllers/categories.tpl', 849, false),)), $this); ?>
<!-- listing categories tpl -->
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.caret.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
<script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.categoryDropdown.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesNavBar'), $this);?>


    <?php if (! isset ( $_GET['action'] )): ?>
        <a onclick="show('search', '#action_blocks div');" href="javascript:void(0)" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add'] && ! $_GET['action']): ?>
        <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_category']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if ($_GET['action'] == 'build'): ?>
        <?php $this->assign('action_url', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['rlBase'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'index.php?controller=categories&action=build&key=') : smarty_modifier_cat($_tmp, 'index.php?controller=categories&action=build&key=')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['category_info']['Key']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['category_info']['Key'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '&form=') : smarty_modifier_cat($_tmp, '&form='))); ?>
        <?php $this->assign('replace', ('{')."category".('}')); ?>

        <?php if ($_GET['form'] != 'submit_form'): ?>
            <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['build_submit_form'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name'])); ?>
" href="<?php echo $this->_tpl_vars['action_url']; ?>
submit_form" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['submit_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'short_form'): ?>
            <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['build_short_form'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name'])); ?>
" href="<?php echo $this->_tpl_vars['action_url']; ?>
short_form" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['short_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'listing_title'): ?>
            <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['build_listing_title_form'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name'])); ?>
" href="<?php echo $this->_tpl_vars['action_url']; ?>
listing_title" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['listing_title_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'featured_form'): ?>
            <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['build_featured_form'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name'])); ?>
" href="<?php echo $this->_tpl_vars['action_url']; ?>
featured_form" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['featured_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>

        <?php if ($_GET['form'] != 'sorting_form'): ?>
            <a title="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['build_sorting_form'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name']) : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace'], $this->_tpl_vars['category_info']['name'])); ?>
" href="<?php echo $this->_tpl_vars['action_url']; ?>
sorting_form" class="button_bar"><span class="left"></span><span class="center_build"><?php echo $this->_tpl_vars['lang']['sorting_form']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    <?php endif; ?>

    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['categories_list']; ?>
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
                <td class="name"><?php echo $this->_tpl_vars['lang']['name']; ?>
</td>
                <td class="field">
                    <input type="text" id="search_name" />
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['listing_type']; ?>
</td>
                <td class="field">
                    <select id="search_type" style="width: 200px;">
                    <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                    <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
"><?php echo $this->_tpl_vars['l_type']['name']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['parent']; ?>
</td>
                <td class="field">
                    <select id="search_parent" style="width: 200px;">
                        <option value=""><?php echo $this->_tpl_vars['lang']['choose_listing_type']; ?>
</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['locked']; ?>
</td>
                <td class="field" id="search_locked_td">
                    <label title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
"><input title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
" type="radio" id="locked_uncheck" value="" /> ...</label>
                    <label><input type="radio" name="search_locked" value="yes" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                    <label><input type="radio" name="search_locked" value="no" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

                    <script type="text/javascript">
                    <?php echo '
                    $(\'#locked_uncheck\').click(function(){
                        $(\'#search_locked_td input\').prop(\'checked\', false);
                    });
                    '; ?>

                    </script>
                </td>
            </tr>

            <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesSearch'), $this);?>


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

                    <a class="cancel" href="javascript:void(0)" onclick="show('search')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
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
            var category_selected = null;

            if ( readCookie(\'categories_sc\') || remote_filters.length > 0 )
            {
                $(\'#search\').show();
                cookie_filters = remote_filters.length > 0 ? remote_filters : readCookie(\'categories_sc\').split(\',\');

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
                                    if ( $(this).attr(\'name\') == \'search_locked\' && $(this).val() == val )
                                    {
                                        $(this).prop(\'checked\', true);
                                    }
                                });
                            }
                            else
                            {
                                if ( item[0] == \'Parent_ID\' ) {
                                    item[0] = \'parent\';
                                    category_selected = item[1];
                                }

                                $(\'#search_\'+item[0].toLowerCase()).val(item[1]);
                            }
                        }
                    }
                }
            }

            $(\'#search_form\').submit(function(){

                createCookie(\'categories_pn\', 0, 1);
                search = new Array();
                search.push( new Array(\'action\', \'search\') );
                search.push( new Array(\'Name\', $(\'#search_name\').val()) );
                search.push( new Array(\'Type\', $(\'#search_type\').val()) );
                search.push( new Array(\'Parent_ID\', $(\'#search_parent\').val()) );

                '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesSearchJS'), $this);?>
<?php echo '

                if ( $(\'input[name=search_locked]:checked\').length > 0 )
                {
                    search.push( new Array(\'Lock\', $(\'input[name=search_locked]:checked\').val() == \'yes\'? 1 : 0) );
                }
                search.push( new Array(\'Status\', $(\'#search_status\').val()) );

                // save search criteria
                var save_search = new Array();
                for(var i in search)
                {
                    if ( search[i][1] != \'\' && typeof(search[i][1]) != \'undefined\'  )
                    {
                        save_search.push(search[i][0]+\'||\'+search[i][1]);
                    }
                }
                createCookie(\'categories_sc\', save_search, 1);

                categoriesGrid.filters = search;
                categoriesGrid.reload();
            });

            $(\'#reset_search_button\').click(function(){
                eraseCookie(\'categories_sc\');
                categoriesGrid.reset();

                $("#search select option[value=\'\']").attr(\'selected\', true);
                $("#search input[type=text]").val(\'\');
                $("#search input").each(function(){
                    if ( $(this).attr(\'type\') == \'radio\' )
                    {
                        $(this).prop(\'checked\', false);
                    }
                });

                $(\'#search_parent\').trigger(\'reset\');
            });

            $(\'#search_parent\').categoryDropdown({
                listingType: \'#search_type\',
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
        <!-- search end -->
    <?php endif; ?>

</div>

<?php if (isset ( $_GET['action'] )): ?>

    <?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>

        <?php $this->assign('sPost', $_POST); ?>

        <script type="text/javascript">
        var new_option = new Array();
        <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
            new_option["<?php echo $this->_tpl_vars['item']['Key']; ?>
"] = new Array('<?php echo $this->_tpl_vars['item']['Cat_custom_adding']; ?>
');
        <?php endforeach; endif; unset($_from); ?>
        <?php echo '

        $(document).ready(function(){
            setAllowCat($(\'select#listing_type\').val());

            $(\'select#listing_type\').change(function(){
                /* clear relations */
                $(\'#category_id\').val(0);
                $(\'#category_name\').html($(\'#categories a.delete_item\').text());
                $(\'input#parent_id\').val(0);

                var type = $(this).val();
                setAllowCat(type);

                if (type != \'0\') {
                    $(\'span#listing_type_loading\').fadeIn();
                    xajax_loadType(type);
                } else {
                    cat_chooser(0, $(\'#categories a.delete_item\').text());
                    $(\'#categories\').slideUp(function(){
                        $(this).find(\'#section_listings\').remove();
                    });
                    $(\'#parent_category\').slideUp();
                }
            });
            $(\'input.add_variable_button\').click(function(){
                var variable = $(this).prev().val();
                if( variable != \'0\' && variable )
                {
                    var text_obj = $(this).parent().parent().find(\'input[type=text]:visible\');

                    var text = text_obj.val();

                    var caret = text_obj.getSelection();
                    var new_text = text.substring(0, caret.start) + \'{\' + variable + \'}\' + text.substring(caret.end, text.length);

                    text_obj.val(new_text).focus();
                    text_obj.setCursorPosition(caret.start+variable.length+2);
                }
            });
        });
        function setAllowCat( key ) {
            if (new_option[key] == 1) {
                $("#allow_subcategories").removeClass(\'hide\');
            } else {
                $("#allow_subcategories").addClass(\'hide\');
            }
        }
        '; ?>

        </script>

        <!-- select category action -->
        <script type="text/javascript">
        var cat_mode          = '<?php echo $_GET['action']; ?>
';
        var tree_selected     = <?php if ($this->_tpl_vars['parent_id']): ?>[<?php echo $this->_tpl_vars['parent_id']; ?>
]<?php else: ?>false<?php endif; ?>;
        var tree_parentPoints = <?php if ($this->_tpl_vars['parentPoints']): ?>[<?php $_from = $this->_tpl_vars['parentPoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['parentF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['parentF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['parent_point']):
        $this->_foreach['parentF']['iteration']++;
?>'<?php echo $this->_tpl_vars['parent_point']; ?>
'<?php if (! ($this->_foreach['parentF']['iteration'] == $this->_foreach['parentF']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>]<?php else: ?>false<?php endif; ?>;
        var defaultLanguage   = '<?php echo $this->_tpl_vars['config']['lang']; ?>
';

        <?php echo '
        function cat_chooser(cat_id, cat_name){
            cat_id = parseInt(cat_id);

            $(\'#category_id\').val(cat_id);
            $(\'#category_name\').html(cat_name);

            flynax.sendAjaxRequest(\'getCategoryPathsByID\', {id: cat_id}, function(response) {
                if (response.paths) {
                    Object.keys(response.paths).forEach(key => {
                        var path     = response.paths[key];
                        var langCode = key.replace(\'Path_\', \'\');

                        if (!path && response.paths[\'Path_\' + defaultLanguage]) {
                            path = response.paths[\'Path_\' + defaultLanguage];
                        }

                        path = cat_id == 0 ? \'\' : path + \'/\';
                        $(\'.ap.\' + langCode).html(path);

                        if (cat_mode == \'edit\') {
                            var $pathInput   = $(\'input[name="path[\' + langCode + \']"]\');
                            var current_path = $pathInput.val().split(\'/\');
                            $pathInput.val(current_path[current_path.length - 1]);
                        }
                    });
                }
            });
        }

        var OnCategorySelect = function(id, name) {
            cat_chooser(id, name);
        }
        var OnButtonClick = function() {
            show(\'categories\');
        }

        $(document).ready(function(){
            flynax.openTree(tree_selected, tree_parentPoints, 1);
        });

        '; ?>

        </script>

        <div id="categories" class="hide">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <div>
                <a class="delete_item" href="javascript:void(0)" onclick="cat_chooser('0', $(this).text()); $('#parent_categories ul.select-category select:first').val('').trigger('change');"><?php echo $this->_tpl_vars['lang']['no_parent']; ?>
</a>
            </div>
            <div id="parent_categories">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'categories') : smarty_modifier_cat($_tmp, 'categories')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'parent_cats_tree.tpl') : smarty_modifier_cat($_tmp, 'parent_cats_tree.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

        <!-- add/edit category -->
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <form  onsubmit="return submitHandler()" action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php if ($_GET['action'] == 'add'): ?>add<?php elseif ($_GET['action'] == 'edit'): ?>edit&amp;key=<?php echo $_GET['key']; ?>
<?php endif; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="submit" value="1" />
        <?php if ($_GET['action'] == 'edit'): ?>
            <input type="hidden" name="fromPost" value="1" />
        <?php endif; ?>

        <div id="parent_category" <?php if (! isset ( $_REQUEST['parent_id'] ) && $_GET['action'] == 'add'): ?>class="hide"<?php endif; ?>>
            <table class="form">
            <tr>
                <td class="name"><?php echo $this->_tpl_vars['lang']['parent_category']; ?>
</td>
                <td>
                    <span class="grey_middle" id="category_name"><?php echo $this->_tpl_vars['lang']['no_parent']; ?>
</span> <span class="divider">|</span> <a href="javascript:void(0)" onclick="show('categories')" class="static"><b><?php echo $this->_tpl_vars['lang']['edit']; ?>
</b></a>
                    <input id="category_id" type="hidden" name="parent_id" value="0" />
                </td>
            </tr>
            </table>
        </div>
        <!-- select category action end -->

        <table class="form">
        <tr>
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['listing_type']; ?>

            </td>
            <td class="field">
                <select name="type" id="listing_type">
                    <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['l_type']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['type'] == $this->_tpl_vars['l_type']['Key']): ?>selected="selected"<?php endif; ?>>
                            <?php echo $this->_tpl_vars['l_type']['name']; ?>

                        </option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
                <span id="listing_type_loading" style="margin-top: -2px;" class="loader">&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </td>
        </tr>
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
" class="w350" maxlength="50" />
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
            <td class="name"><?php echo $this->_tpl_vars['lang']['url']; ?>
</td>
            <td class="field">
                <?php $this->assign('type_page', ((is_array($_tmp='lt_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['type']))); ?>

                <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths']): ?>
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
                    <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths']): ?>
                        <div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
">
                    <?php endif; ?>

                    <span style="padding: 0 5px 0 0;" class="field_description_noicon"><?php echo '<span class="abase '; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['abase']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['abase']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['language']['Code'] !== $this->_tpl_vars['config']['lang']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '/'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?><?php echo ''; ?><?php if ($this->_tpl_vars['language']['Code'] !== $this->_tpl_vars['config']['lang']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '/'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '</span><span class="ab '; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '">'; ?><?php $this->assign('multilingualLTPageKey', ((is_array($_tmp='Path_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?><?php echo ''; ?><?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['type']]['Links_type'] == 'full'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['multilingual_paths'] && $this->_tpl_vars['multilingualLTPage'][$this->_tpl_vars['multilingualLTPageKey']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['multilingualLTPage'][$this->_tpl_vars['multilingualLTPageKey']]; ?><?php echo '/'; ?><?php elseif ($this->_tpl_vars['pages'][$this->_tpl_vars['type_page']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['type_page']]; ?><?php echo '/'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '</span><span class="ap '; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '"></span>'; ?>
</span>

                    <input type="text" name="path[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['path'][$this->_tpl_vars['language']['Code']]; ?>
" />

                    <span class="field_description_noicon" id="cat_postfix_el">
                        <?php if ($this->_tpl_vars['sPost']['type']): ?>
                            <?php if ($this->_tpl_vars['listing_types'][$this->_tpl_vars['sPost']['type']]['Cat_postfix']): ?>.html<?php else: ?>/<?php endif; ?>
                        <?php endif; ?>
                    </span>

                    <?php if ($_GET['action'] == 'add'): ?>
                        <span class="field_description"> <?php echo $this->_tpl_vars['lang']['regenerate_path_desc']; ?>
</span>
                    <?php endif; ?>

                    <?php if (count($this->_tpl_vars['allLangs']) > 1 && $this->_tpl_vars['config']['multilingual_paths']): ?>
                        </div>
                    <?php endif; ?>

                    <?php if (! $this->_tpl_vars['config']['multilingual_paths']): ?>
                        <?php break; ?>
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
" class="w350" maxlength="250" />
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
            <td class="name"><?php echo $this->_tpl_vars['lang']['meta_keywords']; ?>
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
                    <?php $this->assign('lMetaKeywords', $this->_tpl_vars['sPost']['meta_keywords']); ?>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?><div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
"><?php endif; ?>
                    <textarea cols="50" rows="2" name="meta_keywords[<?php echo $this->_tpl_vars['language']['Code']; ?>
]"><?php echo $this->_tpl_vars['lMetaKeywords'][$this->_tpl_vars['language']['Code']]; ?>
</textarea>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['listing_meta_description']; ?>
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
                        <input type="text" name="listing_meta_description[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['listing_meta_description'][$this->_tpl_vars['language']['Code']]; ?>
" class="w350" maxlength="255" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['listing_meta_description_des']; ?>
<?php if (count($this->_tpl_vars['allLangs']) > 1): ?> (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)<?php endif; ?></span>
                        <div>
                        <select>
                            <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                                <option value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input type="button" class="add_variable_button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
"/>
                        </div>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['listing_meta_keywords']; ?>
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
                        <input type="text" name="listing_meta_keywords[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['listing_meta_keywords'][$this->_tpl_vars['language']['Code']]; ?>
" class="w350" maxlength="255" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['listing_meta_keywords_des']; ?>
<?php if (count($this->_tpl_vars['allLangs']) > 1): ?> (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)<?php endif; ?></span>
                        <div>
                        <select>
                            <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                                <option value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input type="button" class="add_variable_button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
"/>
                        </div>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['listing_meta_title']; ?>
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
                        <input type="text" name="listing_meta_title[<?php echo $this->_tpl_vars['language']['Code']; ?>
]" value="<?php echo $this->_tpl_vars['sPost']['listing_meta_title'][$this->_tpl_vars['language']['Code']]; ?>
" class="w350" maxlength="255" />
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['listing_meta_title_des']; ?>
<?php if (count($this->_tpl_vars['allLangs']) > 1): ?> (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)<?php endif; ?></span>
                        <div>
                        <select>
                            <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                                <option value="<?php echo $this->_tpl_vars['field']['Key']; ?>
"><?php echo $this->_tpl_vars['field']['name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                        <input type="button" class="add_variable_button" value="<?php echo $this->_tpl_vars['lang']['add']; ?>
"/>
                        </div>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['lock_category']; ?>
</td>
            <td class="field">
                <?php if ($this->_tpl_vars['sPost']['lock'] == '1'): ?>
                    <?php $this->assign('locked_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['lock'] == '0'): ?>
                    <?php $this->assign('locked_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('locked_no', 'checked="checked"'); ?>
                <?php endif; ?>
                <label><input <?php echo $this->_tpl_vars['locked_yes']; ?>
 type="radio" name="lock" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['locked_no']; ?>
 type="radio" name="lock" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            </td>
        </tr>

        <tr id="allow_subcategories">
            <td class="name"><?php echo $this->_tpl_vars['lang']['allow_subcategories']; ?>
</td>
            <td class="field" id="add_mode_td">
                <?php if ($this->_tpl_vars['sPost']['allow_children'] == '1'): ?>
                    <?php $this->assign('allow_children_yes', 'checked="checked"'); ?>
                <?php elseif ($this->_tpl_vars['sPost']['allow_children'] == '0'): ?>
                    <?php $this->assign('allow_children_no', 'checked="checked"'); ?>
                <?php else: ?>
                    <?php $this->assign('allow_children_no', 'checked="checked"'); ?>
                <?php endif; ?>
                <label><input <?php echo $this->_tpl_vars['allow_children_yes']; ?>
 type="radio" name="allow_children" value="1" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input <?php echo $this->_tpl_vars['allow_children_no']; ?>
 type="radio" name="allow_children" value="0" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
                <span style="margin: 5px 10px 5px 0;">
                    <label><input <?php if (! empty ( $this->_tpl_vars['sPost']['subcategories'] )): ?>checked="checked"<?php endif; ?> type="checkbox" name="subcategories" value="1" /> <?php echo $this->_tpl_vars['lang']['include_subcats']; ?>
</label>
                </span>
            </td>
        </tr>

        <?php if ($this->_tpl_vars['tpl_settings']['category_menu']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/icon_manager.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesForm'), $this);?>


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
        <!-- add new category end -->

    <?php elseif ($_GET['action'] == 'build'): ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder.tpl') : smarty_modifier_cat($_tmp, 'builder.tpl')), 'smarty_include_vars' => array('no_groups' => $this->_tpl_vars['no_groups'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php endif; ?>

<?php else: ?>

    <!-- build reqest -->
    <?php if ($_GET['request'] == 'build'): ?>
        <script type="text/javascript">
        var request_category_key = '<?php echo $_GET['key']; ?>
';
        var request_category_notice = "<?php echo $this->_tpl_vars['lang']['suggest_category_building']; ?>
";
        <?php echo '

        $(document).ready(function(){
            rlConfirm(request_category_notice, \'requestRedirect\');
        });

        var requestRedirect = function(){
            location.href = rlUrlHome+\'index.php?controller=\'+controller+\'&action=build&form=submit_form&key=\'+request_category_key;
        };

        '; ?>

        </script>
    <?php endif; ?>
    <!-- build reqest end -->

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


        <?php if ($_GET['listing_type']): ?>
            cookie_filters = new Array();
            cookie_filters.push(new Array('Type', '<?php echo $_GET['listing_type']; ?>
'));
            cookie_filters.push(new Array('action', 'search'));
        <?php endif; ?>

        //]]>
        </script>
    </div>
    <!-- delete category block end -->

    <!-- categories grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[

    var mass_actions = [
        <?php if (((is_array($_tmp='delete')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['aRights']['categories']) : in_array($_tmp, $this->_tpl_vars['aRights']['categories']))): ?>[lang['ext_delete'], 'delete'],<?php endif; ?>
        [lang['ext_activate'], 'activate'],
        [lang['ext_suspend'], 'approve']
    ];

    var general_cats = new Array();
    var i =0;
    <?php $_from = $this->_tpl_vars['listing_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
        general_cats[i] = parseInt('<?php echo $this->_tpl_vars['item']['Cat_general_cat']; ?>
');
        i++;
    <?php endforeach; endif; unset($_from); ?>

    var categoriesGrid;
    <?php echo '

    var action_url = rlUrlHome + \'index.php?controller=\' + controller + \'&action=build&key={key}&form=\';
    var list = [
        {
            text: lang[\'ext_build_submit_form\'],
            href: action_url + \'submit_form\'
        },
        {
            text: lang[\'ext_build_short_form\'],
            href: action_url + \'short_form\'
        },
        {
            text: lang[\'ext_build_listing_title\'],
            href: action_url + \'listing_title\'
        },
        {
            text: lang[\'ext_build_featured\'],
            href: action_url + \'featured_form\'
        },
        {
            text: lang[\'ext_build_sorting\'],
            href: action_url + \'sorting_form\'
        }
    ];

    $(document).ready(function(){
        categoriesGrid = new gridObj({
            key: \'categories\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/categories.inc.php?q=ext\',
            remoteSortable: true,
            defaultSortField: \'name\',
            title: lang[\'ext_categories_manager\'],
            filters: cookie_filters,
            checkbox: true,
            actions: mass_actions,
            fields: [
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'name\', mapping: \'name\', type: \'string\'},
                {name: \'Type\', mapping: \'Type\'},
                {name: \'Count\', mapping: \'Count\'},
                {name: \'Parent\', mapping: \'Parent\', type: \'string\'},
                {name: \'Parent_ID\', mapping: \'Parent_ID\', type: \'int\'},
                {name: \'Parent_key\', mapping: \'Parent_key\', type: \'string\'},
                {name: \'Lock\', mapping: \'Lock\'},
                {name: \'Position\', mapping: \'Position\', type: \'int\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Key\', mapping: \'Key\'}
            ],
            columns: [
                {
                    header: lang[\'ext_name\'],
                    dataIndex: \'name\',
                    width: 22,
                    id: \'rlExt_item_bold\'
                },{
                    header: lang[\'ext_listings_count\'],
                    dataIndex: \'Count\',
                    width: 8,
                    renderer: function(value, ext, row){
                        value = \'<a style="display: block;" ext:qtip="\'+lang[\'ext_browse_category\']+\'" class="green_11" href="\'+ rlUrlHome +\'index.php?controller=browse&id=\'+ row.data.ID +\'"><b>\'+ value +\'</b></a>\';
                        return value;
                    }
                },{
                    header: lang[\'ext_parent\'],
                    dataIndex: \'Parent\',
                    id: \'rlExt_item\',
                    width: 15,
                    renderer: function(value, ext, row){
                        if ( row.data.Parent_ID )
                        {
                            value = \'<a ext:qtip="\'+lang[\'ext_edit_parent_category\']+\'" class="green_11" href="\'+ rlUrlHome +\'index.php?controller=categories&action=edit&key=\'+ row.data.Parent_key +\'">\'+ value +\'</a>\';
                        }
                        return value;
                    }
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type\',
                    width: 10,
                    renderer: function(value){
                        return \'<b>\'+value+\'</b>\';
                    }
                },{
                    header: lang[\'ext_locked\'],
                    dataIndex: \'Lock\',
                    width: 8,
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
                        selectOnFocus: true
                    })
                },{
                    header: lang[\'ext_position\'],
                    dataIndex: \'Position\',
                    width: 70,
                    fixed: true,
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
                    width: 100,
                    fixed: true,
                    dataIndex: \'Key\',
                    sortable: false,
                    renderer: function(data, ext, row) {
                        var out = "<center>";
                        var splitter = false;

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += \'<img onclick="flynax.extModal(this, \\\'\'+data+\'\\\');" class="build" ext:qtip="\'+lang[\'ext_build\']+\'" src="\'+rlUrlHome+\'img/blank.gif" /></a>\';
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&key="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }

                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            if (general_cats.indexOf(row.data.ID) >= 0) {
                                out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'rlConfirm( \\""+lang[\'ext_notice_delete_general\']+"\\", \\"xajax_prepareDeleting\\", \\""+row.data.ID+"\\" )\' />";

                            } else {
                                out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'xajax_prepareDeleting("+row.data.ID+");\' />";
                            }
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesGrid'), $this);?>
<?php echo '

        categoriesGrid.init();
        grid.push(categoriesGrid.grid);

        // actions listener
        categoriesGrid.actionButton.addListener(\'click\', function()
        {
            var sel_obj = categoriesGrid.checkboxColumn.getSelections();
            var action = categoriesGrid.actionsDropDown.getValue();

            if (!action)
            {
                return false;
            }

            for( var i = 0; i < sel_obj.length; i++ )
            {
                categoriesGrid.ids += sel_obj[i].id;
                if ( sel_obj.length != i+1 )
                {
                    categoriesGrid.ids += \'|\';
                }
            }

            switch (action) {
                case \'delete\':
                    Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn) {
                        if (btn == \'yes\') {
                            xajax_categoryMassActions(categoriesGrid.ids, action);
                        //  categoriesGrid.store.reload();
                        }
                    });
                    break;

                default:
                    xajax_categoryMassActions(categoriesGrid.ids, action);
                    //categoriesGrid.store.reload();
                    break;
            }

            categoriesGrid.checkboxColumn.clearSelections();
            categoriesGrid.actionsDropDown.setVisible(false);
            categoriesGrid.actionButton.setVisible(false);
        });
    });
    '; ?>

    //]]>
    </script>
    <!-- categories grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplCategoriesBottom'), $this);?>


<?php endif; ?>

<!-- listing categories tpl end -->