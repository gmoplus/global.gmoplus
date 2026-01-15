<?php /* Smarty version 2.6.31, created on 2025-08-20 18:12:37
         compiled from blocks/fields/search_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/fields/search_form.tpl', 5, false),array('function', 'rlHook', 'blocks/fields/search_form.tpl', 57, false),)), $this); ?>
<!-- fields search form -->

<?php if (! isset ( $_GET['action'] )): ?>
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
            <td class="field"><input type="text" id="search_name" /></td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['field_type']; ?>
</td>
            <td class="field">
                <select id="search_type" style="width: 200px;">
                <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                <?php $_from = $this->_tpl_vars['l_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                    <option value="<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['required_field']; ?>
</td>
            <td class="field" id="search_require_td">
                <label title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
"><input title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
" type="radio" id="required_uncheck" value="" /> ...</label>
                <label><input type="radio" name="search_required" id="required_yes" value="yes" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input type="radio" name="search_required" id="required_no" value="no" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

                <script type="text/javascript">
                <?php echo '
                $(\'#required_uncheck\').click(function(){
                    $(\'#search_require_td input\').prop(\'checked\', false);
                });
                '; ?>

                </script>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['google_map']; ?>
</td>
            <td class="field" id="search_gmap_td">
                <label title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
"><input title="<?php echo $this->_tpl_vars['lang']['unmark']; ?>
" type="radio" id="gmap_uncheck" value="" /> ...</label>
                <label><input type="radio" name="search_gmap" id="gmap_yes" value="yes" /> <?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <label><input type="radio" name="search_gmap" id="gmap_no" value="no" /> <?php echo $this->_tpl_vars['lang']['no']; ?>
</label>

                <script type="text/javascript">
                <?php echo '
                $(\'#gmap_uncheck\').click(function(){
                    $(\'#search_gmap_td input\').prop(\'checked\', false);
                });
                '; ?>

                </script>
            </td>
        </tr>

        <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplFieldsSearchField'), $this);?>


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
                <input type="submit" class="button lang_add" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
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
    var grid_prefix = '<?php echo $this->_tpl_vars['grid_key']; ?>
';
    <?php echo '

    var search = new Array();
    var cookie_filters = \'\';

    $(document).ready(function(){

        if ( readCookie(\'listing_fields_sc\') )
        {
            $(\'#search\').show();
            cookie_filters = readCookie(\'listing_fields_sc\').split(\',\');

            for (var i in cookie_filters)
            {
                if ( typeof(cookie_filters[i]) == \'string\' )
                {
                    var item = cookie_filters[i].split(\'||\');
                    if ( item[0] != \'undefined\' && item[0] != \'\' )
                    {
                        if ( item[0] == \'Required\' )
                        {
                            $(\'#search input\').each(function(){
                                var val = item[1] == 1 ? \'yes\' : \'no\';
                                if ( $(this).attr(\'name\') == \'search_required\' && $(this).val() == val )
                                {
                                    $(this).prop(\'checked\', true);
                                }
                            });
                        }
                        else if ( item[0] == \'Map\' )
                        {
                            $(\'#search input\').each(function(){
                                var val = item[1] == 1 ? \'yes\' : \'no\';
                                if ( $(this).attr(\'name\') == \'search_gmap\' && $(this).val() == val )
                                {
                                    $(this).prop(\'checked\', true);
                                }
                            });
                        }
                        else
                        {
                            $(\'#search_\'+item[0].toLowerCase()).selectOptions(item[1]);
                        }
                    }
                }
            }
        }

        $(\'#search_form\').submit(function(){
            createCookie(\'listing_fields_pn\', 0, 1);

            search = new Array();
            search.push( new Array(\'Name\', $(\'#search_name\').val()) );
            search.push( new Array(\'Type\', $(\'#search_type\').val()) );

            var required = $(\'input[name=search_required]:checked\').val();
            search.push( new Array(\'Required\', required == \'yes\' ? 1 : required == \'no\' ? 0 : \'\') );

            var map = $(\'input[name=search_gmap]:checked\').val();
            search.push( new Array(\'Map\', map == \'yes\' ? 1 : map == \'no\' ? 0 : \'\') );
            search.push( new Array(\'Status\', $(\'#search_status\').val()) );

            '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplFieldsSearchJS'), $this);?>
<?php echo '

            search.push( new Array(\'action\', \'search\') );

            // save search criteria
            var save_search = new Array();
            for(var i in search)
            {
                if ( search[i][1] != \'\' && search[i][1] != undefined )
                {
                    save_search.push(search[i][0]+\'||\'+search[i][1]);
                }
            }

            createCookie(\'listing_fields_sc\', save_search, 1);

            eval(grid_prefix+\'.filters = search;\');
            eval(grid_prefix+\'.reload();\');
        });

        $(\'#reset_search_button\').click(function(){
            eraseCookie(\'listing_fields_sc\');
            eval(grid_prefix+\'.reset();\');

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
<?php endif; ?>

<!-- fields search form end -->