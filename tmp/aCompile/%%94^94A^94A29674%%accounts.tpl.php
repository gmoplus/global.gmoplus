<?php /* Smarty version 2.6.31, created on 2025-08-20 18:11:58
         compiled from controllers/accounts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rlHook', 'controllers/accounts.tpl', 5, false),array('function', 'pageUrl', 'controllers/accounts.tpl', 670, false),array('function', 'phrase', 'controllers/accounts.tpl', 671, false),array('function', 'mapsAPI', 'controllers/accounts.tpl', 919, false),array('modifier', 'cat', 'controllers/accounts.tpl', 30, false),array('modifier', 'replace', 'controllers/accounts.tpl', 434, false),array('modifier', 'count', 'controllers/accounts.tpl', 511, false),array('modifier', 'regex_replace', 'controllers/accounts.tpl', 519, false),array('modifier', 'strstr', 'controllers/accounts.tpl', 655, false),array('modifier', 'date_format', 'controllers/accounts.tpl', 856, false),array('modifier', 'escape', 'controllers/accounts.tpl', 934, false),array('modifier', 'in_array', 'controllers/accounts.tpl', 996, false),)), $this); ?>
<!-- accounts tpl -->

<!-- navigation bar -->
<div id="nav_bar">
    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsNavBar'), $this);?>


    <?php if (! $_GET['action']): ?>
        <a href="javascript:void(0)" onclick="show('search')" class="button_bar"><span class="left"></span><span class="center_search"><?php echo $this->_tpl_vars['lang']['search']; ?>
</span><span class="right"></span></a>

        <?php if ($this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['add']): ?>
            <a href="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=add" class="button_bar"><span class="left"></span><span class="center-add"><?php echo $this->_tpl_vars['lang']['add_account']; ?>
</span><span class="right"></span></a>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($_GET['action'] == 'view' && $this->_tpl_vars['seller_info'] && $this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['edit'] == 'edit'): ?>
        <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&amp;action=edit&amp;account=<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
" class="button_bar"><span class="left"></span><span class="center_edit"><?php echo $this->_tpl_vars['lang']['edit_account']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <?php if (( $_GET['action'] == 'view' || $_GET['action'] == 'edit' ) && $this->_tpl_vars['aRights'][$this->_tpl_vars['cKey']]['delete'] == 'delete'): ?>
        <a href="javascript:void(0)" onclick="xajax_prepareDeleting('<?php if ($_GET['userid']): ?><?php echo $_GET['userid']; ?>
<?php else: ?><?php echo $_GET['account']; ?>
<?php endif; ?>')" class="button_bar"><span class="left"></span><span class="center_remove"><?php echo $this->_tpl_vars['lang']['delete_account']; ?>
</span><span class="right"></span></a>
    <?php endif; ?>

    <a href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=<?php echo $_GET['controller']; ?>
" class="button_bar"><span class="left"></span><span class="center_list"><?php echo $this->_tpl_vars['lang']['accounts_list']; ?>
</span><span class="right"></span></a>
</div>
<!-- navigation bar end -->

<!-- search -->
<?php if (! $_GET['action']): ?>
    <div id="search" class="hide">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['search'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <table>
        <tr>
            <td valign="top">
                <table class="form">
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['username']; ?>
</td>
                    <td class="field">
                        <input type="text" id="username" maxlength="60" />
                    </td>
                </tr>
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['first_name']; ?>
</td>
                    <td>
                        <input type="text" id="first_name" maxlength="60" />
                    </td>
                </tr>
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['last_name']; ?>
</td>
                    <td class="field">
                        <input type="text" id="last_name" maxlength="60" />
                    </td>
                </tr>
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['mail']; ?>
</td>
                    <td class="field">
                        <input type="text" id="email" maxlength="60" />
                    </td>
                </tr>

                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsSearch1'), $this);?>


                <tr>
                    <td></td>
                    <td class="field">
                        <input id="search_button" type="submit" value="<?php echo $this->_tpl_vars['lang']['search']; ?>
" />
                        <input type="button" value="<?php echo $this->_tpl_vars['lang']['reset']; ?>
" id="reset_filter_button" />

                        <a class="cancel" href="javascript:void(0)" onclick="show('search')"><?php echo $this->_tpl_vars['lang']['cancel']; ?>
</a>
                    </td>
                </tr>
                </table>
            </td>
            <td style="width: 50px;"></td>
            <td valign="top">
                <table class="form">
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
</td>
                    <td class="field">
                        <select id="account_type" style="width: 200px;">
                            <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                            <?php $_from = $this->_tpl_vars['ap_account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
                                <option value="<?php echo $this->_tpl_vars['type']['Key']; ?>
" <?php if ($this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['type']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['type']['name']; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
                    <td class="field">
                        <select id="search_status" style="width: 200px;">
                            <option value="">- <?php echo $this->_tpl_vars['lang']['all']; ?>
 -</option>
                            <?php $_from = $this->_tpl_vars['statuses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user_status']):
?>
                                <option value="<?php echo $this->_tpl_vars['user_status']; ?>
" <?php if ($this->_tpl_vars['user_status'] == $_GET['status']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['user_status']]; ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="name w130"><?php echo $this->_tpl_vars['lang']['join_date']; ?>
</td>
                    <td class="field" style="white-space: nowrap;">
                        <input class="date-calendar"
                            type="text"
                            value="<?php echo $_POST['date_from']; ?>
"
                            size="12"
                            maxlength="10"
                            id="date_from"
                            autocomplete="off" />
                        <img class="divider" alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
                        <input class="date-calendar"
                            type="text"
                            value="<?php echo $_POST['date_to']; ?>
"
                            size="12"
                            maxlength="10"
                            id="date_to"
                            autocomplete="off" />
                    </td>
                </tr>

                <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsSearch2'), $this);?>


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

    var sFields = new Array(\'username\', \'first_name\', \'last_name\', \'email\', \'account_type\', \'search_status\', \'date_from\', \'date_to\');
    var cookie_filters = new Array();

    $(document).ready(function(){
        $(function(){
            $(\'#date_from\').datepicker({
                showOn: \'both\',
                buttonImage    : \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\',
                buttonText     : \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\',
                buttonImageOnly: true,
                dateFormat     : \'yy-mm-dd\',
                changeMonth    : true,
                changeYear     : true,
                yearRange      : \'-100:+30\'
            }).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);

            $(\'#date_to\').datepicker({
                showOn: \'both\',
                buttonImage    : \''; ?>
<?php echo $this->_tpl_vars['rlTplBase']; ?>
<?php echo 'img/blank.gif\',
                buttonText     : \''; ?>
<?php echo $this->_tpl_vars['lang']['dp_choose_date']; ?>
<?php echo '\',
                buttonImageOnly: true,
                dateFormat     : \'yy-mm-dd\',
                changeMonth    : true,
                changeYear     : true,
                yearRange      : \'-100:+30\'
            }).datepicker($.datepicker.regional[\''; ?>
<?php echo (defined('RL_LANG_CODE') ? @RL_LANG_CODE : null); ?>
<?php echo '\']);
        });

        if ( readCookie(\'accounts_sc\') )
        {
            $(\'#search\').show();
            cookie_filters = readCookie(\'accounts_sc\').split(\',\');

            for (var i in cookie_filters)
            {
                if ( typeof(cookie_filters[i]) == \'string\' )
                {
                    var item = cookie_filters[i].split(\'||\');
                    $(\'#\'+item[0]).selectOptions(item[1]);
                }
            }

            cookie_filters.push(new Array(\'search\', 1));
        }

        $(\'#search_button\').click(function(){
            var sValues = new Array();
            var filters = new Array();
            var save_cookies = new Array();

            for(var si = 0; si < sFields.length; si++)
            {
                sValues[si] = $(\'#\'+sFields[si]).val();
                filters[si] = new Array(sFields[si], $(\'#\'+sFields[si]).val());
                save_cookies[si] = sFields[si]+\'||\'+$(\'#\'+sFields[si]).val();
            }

            // save search criteria
            createCookie(\'accounts_sc\', save_cookies, 1);

            filters.push(new Array(\'search\', 1));

            accountsGrid.filters = filters;
            accountsGrid.reload();
        });

        $(\'#reset_filter_button\').click(function(){
            eraseCookie(\'accounts_sc\');
            accountsGrid.reset();

            $("#search select option[value=\'\']").attr(\'selected\', true);
            $("#search input[type=text]").val(\'\');
        });

        /* autocomplete js */
        $(\'#username\').rlAutoComplete();
    });

    '; ?>


    <?php if ($_GET['status']): ?>
        cookie_filters = new Array();
        cookie_filters[0] = new Array('search_status', '<?php echo $_GET['status']; ?>
');
        cookie_filters.push(new Array('search', 1));
    <?php endif; ?>

    <?php if ($_GET['account_type']): ?>
        cookie_filters = new Array();
        cookie_filters[0] = new Array('account_type', '<?php echo $_GET['account_type']; ?>
');
        cookie_filters.push(new Array('search', 1));
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsSearchJS'), $this);?>


    </script>
<?php endif; ?>
<!-- search end -->

<!-- delete account block -->
<div id="delete_block" class="hide">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['delete_account'])));
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
    <?php if ($this->_tpl_vars['config']['trash']): ?>
        var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_drop_empty_account']; ?>
";
    <?php else: ?>
        var delete_conform_phrase = "<?php echo $this->_tpl_vars['lang']['notice_delete_empty_account']; ?>
";
    <?php endif; ?>

    <?php echo '

    function delete_chooser(method, id, username)
    {
        if (method == \'delete\')
        {
            rlPrompt(delete_conform_phrase.replace(\'{username}\', username), \'xajax_deleteAccount\', id);
        }
        else if (method == \'replace\')
        {
            $(\'#top_buttons\').slideUp(\'slow\');
            $(\'#bottom_buttons\').slideDown(\'slow\');
            $(\'#replace_content\').slideDown(\'slow\');
        }
    }

    '; ?>

    //]]>
    </script>
</div>
<!-- delete account block end -->

<?php if ($_GET['action'] == 'add' || $_GET['action'] == 'edit'): ?>
    <?php $this->assign('sPost', $_POST); ?>
    <?php $this->assign('selected_atype', ''); ?>

    <?php if ($this->_tpl_vars['ap_account_types'] && $this->_tpl_vars['sPost']['profile']): ?>
        <?php $_from = $this->_tpl_vars['ap_account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['a_type']):
?>
            <?php if ($this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['a_type']['ID'] || $this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['a_type']['Key']): ?>
                <?php $this->assign('selected_atype', $this->_tpl_vars['a_type']); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>

    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
ckeditor/ckeditor.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.textareaCounter.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>

    <!-- add/edit account -->
    <form name="account_reg_form"
          action="<?php echo $this->_tpl_vars['rlBaseC']; ?>
action=<?php echo $_GET['action']; ?>
<?php if ($_GET['action'] == 'edit'): ?>&account=<?php echo $_GET['account']; ?>
<?php endif; ?>"
          method="post"
          enctype="multipart/form-data">

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['profile_information'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <input type="hidden" name="form_submit" value="1" />
    <?php if ($_GET['action'] == 'edit'): ?>
        <input type="hidden" name="fromPost" value="1" />
    <?php endif; ?>

    <table class="form">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['account_type']; ?>
 <span class="red">*</span></td>
        <td class="field">
            <select name="profile[type]" id="type_selector">
                <option value=""><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                <?php $_from = $this->_tpl_vars['ap_account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type']):
?>
                    <option value="<?php echo $this->_tpl_vars['type']['ID']; ?>
" <?php if ($this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['type']['ID'] || $this->_tpl_vars['sPost']['profile']['type'] == $this->_tpl_vars['type']['Key']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['type']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
            <span id="type_change_loading" class="loader"></span>

            <script type="text/javascript">
            var account_types = new Array();

            <?php $_from = $this->_tpl_vars['ap_account_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['account_type']):
?>
                account_types[<?php echo $this->_tpl_vars['account_type']['ID']; ?>
] = new Array();
                account_types[<?php echo $this->_tpl_vars['account_type']['ID']; ?>
]['Own_location'] = <?php if ($this->_tpl_vars['account_type']['Own_location']): ?>1<?php else: ?>0<?php endif; ?>;
                account_types[<?php echo $this->_tpl_vars['account_type']['ID']; ?>
]['Key'] = '<?php echo $this->_tpl_vars['account_type']['Key']; ?>
';
            <?php endforeach; endif; unset($_from); ?>
            </script>

            <?php if ($_GET['action'] == 'edit'): ?>
                <script type="text/javascript">
                var account_id = <?php if ($this->_tpl_vars['aInfo']['ID']): ?><?php echo $this->_tpl_vars['aInfo']['ID']; ?>
<?php else: ?>false<?php endif; ?>;
                var account_type_id = <?php if ($this->_tpl_vars['aInfo']['Account_type_ID']): ?><?php echo $this->_tpl_vars['aInfo']['Account_type_ID']; ?>
<?php else: ?>false<?php endif; ?>;
                var change_type_notice = "<?php echo $this->_tpl_vars['lang']['admin_change_account_type_notice']; ?>
";
                <?php echo '

                $(document).ready(function(){
                    $(\'select#type_selector\').change(function(){
                        var id = $(this).val();
                        var at_key = id ? account_types[id][\'Key\'] : \'\';

                        if ( id != \'\' )
                        {
                            rlConfirm( change_type_notice, "type_change", id, \'type_change_loading\', false, \'type_revert\');
                            '; ?>
<?php if ($this->_tpl_vars['config']['membership_module']): ?><?php echo '
                            // handle membership plans
                            handleMembershipPlans(account_types[id][\'Key\']);
                            '; ?>
<?php endif; ?><?php echo '
                        }

                        agreementFieldsHandler(at_key);
                    });
                });

                var type_revert = function()
                {
                    $(\'#type_selector option[value=\'+ account_type_id +\']\').attr(\'selected\', true);
                }

                var type_change = function(id)
                {
                    if ( account_types[id][\'Own_location\'] )
                    {
                        $(\'#personal_address_field\').slideDown();
                    }
                    else
                    {
                        $(\'#personal_address_field\').slideUp();
                    }
                    xajax_updateAccountFields(id, account_id);
                }

                '; ?>

                </script>
            <?php else: ?>
                <script type="text/javascript">
                <?php echo '

                $(document).ready(
                    function (){
                        $(\'#type_selector\').change(
                            function(){
                                var id     = $(this).val();
                                var at_key = id ? account_types[id][\'Key\'] : \'\';

                                if (id != \'\' && account_types[id][\'Own_location\']) {
                                    $(\'#personal_address_field\').slideDown();
                                } else {
                                    $(\'#personal_address_field\').slideUp();
                                }

                                // reload additional fields block
                                $(\'#reg_step2\').fadeOut(\'slow\', function(){
                                    $(\'#additional_fields\').html(\'\');
                                });

                                // show next button
                                $(\'#next1\').slideDown(\'normal\');

                                '; ?>
<?php if ($this->_tpl_vars['config']['membership_module']): ?><?php echo '
                                // handle membership plans
                                handleMembershipPlans(id ? account_types[id][\'Key\'] : \'\');
                                '; ?>
<?php endif; ?><?php echo '

                                agreementFieldsHandler(at_key);
                            }
                        );
                    }
                );
                '; ?>

                </script>
            <?php endif; ?>
        </td>
    </tr>
    </table>

    <script type="text/javascript"><?php echo '
    /**
     * Show/hide related agreement fields
     * @param  {sting} at_key - Key of selected account type
     */
    var agreementFieldsHandler = function(at_key) {
        var $agFields = $(\'tr.ag_fields\');

        $agFields.find(\'input\').attr(\'disabled\', true);
        $agFields.addClass(\'hide\');

        if (at_key) {
            $agFields.each(function(){
                var at_types = $(this).data(\'types\');

                if (at_types.indexOf(at_key) != -1 || at_types == \'\') {
                    $(this).removeClass(\'hide\');
                    $(this).find(\'input\').removeAttr(\'disabled\');
                }
            });
        }
    }
    '; ?>
</script>

    <?php if ($_GET['action'] == 'add'): ?>
        <div id="personal_address_field"<?php if (( $this->_tpl_vars['selected_atype'] && ! $this->_tpl_vars['ap_account_types'][$this->_tpl_vars['selected_atype']['ID']]['Own_location'] ) || ! $this->_tpl_vars['selected_atype']): ?> class="hide"<?php endif; ?>>
            <table class="form" style="margin: 5px 0;">
            <tr>
                <td valign="top" style="padding-top: 8px;" class="name"><?php echo $this->_tpl_vars['lang']['personal_address']; ?>
 <span class="red">*</span></td>
                <td class="field">
                    <?php if ($this->_tpl_vars['config']['account_wildcard']): ?>
                        <?php echo $this->_tpl_vars['scheme']; ?>
://<input type="text" style="width: 90px;" maxlength="30" name="profile[location]" <?php if ($_POST['profile']['location']): ?>value="<?php echo $_POST['profile']['location']; ?>
"<?php endif; ?> />.<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'www.', '') : smarty_modifier_replace($_tmp, 'www.', '')); ?>

                    <?php else: ?>
                        <?php echo $this->_tpl_vars['scheme']; ?>
://<?php echo $this->_tpl_vars['domain']; ?>
/<?php if ((defined('RL_DIR') ? @RL_DIR : null)): ?><?php echo (defined('RL_DIR') ? @RL_DIR : null); ?>
<?php endif; ?><input type="text" style="width: 90px;" maxlength="30" name="profile[location]" <?php if ($_POST['profile']['location']): ?>value="<?php echo $_POST['profile']['location']; ?>
"<?php endif; ?> />/
                    <?php endif; ?>
                    <div class="notice_message"><?php echo $this->_tpl_vars['lang']['latin_characters_only']; ?>
</div>
                </td>
            </tr>
            </table>
        </div>
    <?php else: ?>
        <div id="personal_address_field"<?php if (( $this->_tpl_vars['selected_atype'] && ! $this->_tpl_vars['ap_account_types'][$this->_tpl_vars['selected_atype']['ID']]['Own_location'] ) || ! $this->_tpl_vars['selected_atype']): ?> class="hide"<?php endif; ?>>
            <table class="form" <?php if (! $this->_tpl_vars['aInfo']['Own_address']): ?>style="margin: 5px 0;"<?php endif; ?>>
            <tr>
                <td valign="top" style="padding-top: 8px;" class="name"><?php echo $this->_tpl_vars['lang']['personal_address']; ?>
 <span class="red">*</span></td>
                <td class="field">
                    <?php if ($this->_tpl_vars['aInfo']['Own_address']): ?>
                        <div id="current_location">
                            <a target="_blank" href="<?php echo $this->_tpl_vars['scheme']; ?>
://<?php if ($this->_tpl_vars['config']['account_wildcard']): ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
.<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'www.', '') : smarty_modifier_replace($_tmp, 'www.', '')); ?>
<?php else: ?><?php echo $this->_tpl_vars['domain']; ?>
/<?php if ((defined('RL_DIR') ? @RL_DIR : null)): ?><?php echo (defined('RL_DIR') ? @RL_DIR : null); ?>
<?php endif; ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
<?php endif; ?>/">
                                <?php echo $this->_tpl_vars['scheme']; ?>
://<?php if ($this->_tpl_vars['config']['account_wildcard']): ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
.<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'www.', '') : smarty_modifier_replace($_tmp, 'www.', '')); ?>
<?php else: ?><?php echo $this->_tpl_vars['domain']; ?>
/<?php if ((defined('RL_DIR') ? @RL_DIR : null)): ?><?php echo (defined('RL_DIR') ? @RL_DIR : null); ?>
<?php endif; ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
<?php endif; ?>/</a>
                            <img onclick="$('#current_location').hide();$('#edit_location').show();" class="edit middle" alt="" src="<?php echo $this->_tpl_vars['rlTplBase']; ?>
img/blank.gif" />
                        </div>
                    <?php endif; ?>

                    <div id="edit_location" <?php if ($this->_tpl_vars['aInfo']['Own_address']): ?>class="hide"<?php endif; ?>>
                        <?php if ($this->_tpl_vars['config']['account_wildcard']): ?>
                            <?php echo $this->_tpl_vars['scheme']; ?>
://<input type="text" style="width: 90px;" maxlength="30" name="profile[location]" value="<?php if ($_POST['profile']['location']): ?><?php echo $_POST['profile']['location']; ?>
<?php else: ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
<?php endif; ?>" />.<?php echo ((is_array($_tmp=$this->_tpl_vars['domain'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'www.', '') : smarty_modifier_replace($_tmp, 'www.', '')); ?>

                        <?php else: ?>
                            <?php echo $this->_tpl_vars['scheme']; ?>
://<?php echo $this->_tpl_vars['domain']; ?>
/<?php if ((defined('RL_DIR') ? @RL_DIR : null)): ?><?php echo (defined('RL_DIR') ? @RL_DIR : null); ?>
<?php endif; ?><input type="text" style="width: 90px;" maxlength="30" name="profile[location]" value="<?php if ($_POST['profile']['location']): ?><?php echo $_POST['profile']['location']; ?>
<?php else: ?><?php echo $this->_tpl_vars['aInfo']['Own_address']; ?>
<?php endif; ?>" />/
                        <?php endif; ?>
                        <div class="notice_message"><?php echo $this->_tpl_vars['lang']['latin_characters_only']; ?>
</div>
                    </div>
                </td>
            </tr>
            </table>
        </div>
    <?php endif; ?>

    <!-- membership plans -->
    <?php if ($this->_tpl_vars['config']['membership_module']): ?>
    <fieldset class="light">
        <legend id="legend_plans" class="up" onclick="fieldset_action('plans');"><?php echo $this->_tpl_vars['lang']['plan']; ?>
</legend>
        <?php if (! empty ( $this->_tpl_vars['plans'] )): ?>
            <div id="plans"<?php if (! $_POST['profile']['type']): ?> class="hide"<?php endif; ?>>
                <?php if ($_GET['action'] == 'add'): ?>
                <!-- undefine plan -->
                <div class="plan_item" plan-id="0" plan-available="">
                    <table class="sTable">
                        <tr>
                            <td align="center" style="width: 30px"><input accesskey="" style="margin: 0 10px 0 0;" id="plan_0" type="radio" name="profile[plan]" value="0" <?php if (! $_POST['profile']['plan']): ?>checked="checked"<?php endif; ?> /></td>
                            <td>
                                <label for="plan_0" class="blue_11_normal">
                                    <?php echo $this->_tpl_vars['lang']['select_plan_later']; ?>

                                </label>
                                <div class="desc"></div>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- end undefine plan -->
                <?php endif; ?>
                <?php $_from = $this->_tpl_vars['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fPlan'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fPlan']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['plan']):
        $this->_foreach['fPlan']['iteration']++;
?>
                    <div class="plan_item<?php if ($_GET['action'] == 'edit' && $this->_tpl_vars['plan']['ID'] != $_POST['profile']['plan']): ?> hide<?php endif; ?>" plan-id="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" plan-available="<?php echo $this->_tpl_vars['plan']['Allow_for']; ?>
">
                        <table class="sTable">
                        <tr>
                            <td align="center" style="width: 30px"><input accesskey="<?php echo $this->_tpl_vars['plan']['Cross']; ?>
" style="margin: 0 10px 0 0;" id="plan_<?php echo $this->_tpl_vars['plan']['ID']; ?>
" type="radio" name="profile[plan]" value="<?php echo $this->_tpl_vars['plan']['ID']; ?>
" <?php if ($this->_tpl_vars['plan']['ID'] == $_POST['profile']['plan']): ?>checked="checked"<?php endif; ?> /></td>
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
                            </td>
                        </tr>
                        </table>
                    </div>
                <?php endforeach; endif; unset($_from); ?>

                <?php if ($_GET['action'] == 'edit' && ( count($this->_tpl_vars['plans']) > 1 || ! $_POST['profile']['plan'] )): ?>
                    <input id="manage_plans" type="button" value="<?php echo $this->_tpl_vars['lang']['manage']; ?>
" />
                <?php endif; ?>
            </div>
            <div id="plans-notice" <?php if ($_POST['profile']['type']): ?> class="hide"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['need_select_account_type']; ?>
</div>
        <?php else: ?>
            <div id="plans-notice">
                <?php $this->assign('replace', ((is_array($_tmp=((is_array($_tmp='<a href="')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['add_plan_link']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['add_plan_link'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '">$1</a>') : smarty_modifier_cat($_tmp, '">$1</a>'))); ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['not_membership_plans'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace']) : smarty_modifier_regex_replace($_tmp, '/\[(.*)\]/', $this->_tpl_vars['replace'])); ?>

            </div>
        <?php endif; ?>
        <?php if ($_GET['action'] == 'edit'): ?>
            <script type="text/javascript">
            <?php echo '
            var plans_expand = false;
            $(document).ready(function(){
                $(\'#manage_plans\').click(function() {
                    if (plans_expand) {
                        plans_expand = false;
                        $(\'div#plans div.plan_item\').each(function() {
                            var is_checked = $(this).find(\'input[type="radio"]\').is(\':checked\');
                            if (!is_checked) {
                                $(this).fadeOut();
                            }
                        });
                        $(this).val(\''; ?>
<?php echo $this->_tpl_vars['lang']['manage']; ?>
<?php echo '\');
                    } else {
                        plans_expand = true;
                        $(this).val(\''; ?>
<?php echo $this->_tpl_vars['lang']['apply']; ?>
<?php echo '\');

                        var type_id = $(\'#type_selector option:selected\').val();
                        handleMembershipPlans(type_id ? account_types[type_id][\'Key\'] : \'\');
                    }
                });
            });
            '; ?>

            </script>
        <?php endif; ?>
    </fieldset>
    <script type="text/javascript">
    <?php echo '
    var plans_expand = false;
    $(document).ready(function(){
        '; ?>
<?php if ($_GET['action'] == 'add'): ?><?php echo '
        if ($(\'#type_selector option:selected\').val() != \'\') {
            handleMembershipPlans($(\'#type_selector option:selected\').val());
        }
        '; ?>
<?php endif; ?><?php echo '
    });

    var handleMembershipPlans = function(type) {
        if (account_types[type]) {
            type = account_types[type][\'Key\'];
        }
        if (type) {
            $(\'#plans\').removeClass(\'hide\');
            $(\'#plans-notice\').addClass(\'hide\');
        } else {
            if (!$(\'#plans\').hasClass(\'hide\')) {
                $(\'#plans\').addClass(\'hide\');
            }
            $(\'#plans-notice\').removeClass(\'hide\');
        }
        var plan_count = 0;
        $(\'div#plans div.plan_item\').each(function() {
            if ($(this).attr(\'plan-available\').indexOf(type) >= 0 || $(this).attr(\'plan-available\') == \'\') {
                $(this).fadeIn();
                plan_count++;
            } else {
                $(this).fadeOut();
                $(this).find(\'input[type="radio"]\').prop(\'checked\', false);
            }
        });
        if (plan_count == 0) {
            $(\'#plans-notice\').removeClass(\'hide\');
        }
    }
    '; ?>

    </script>
    <?php endif; ?>
    <!-- end membership plans -->

    <table class="form">
    <?php if ($this->_tpl_vars['config']['account_login_mode'] == 'email'): ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
 <span class="red">*</span></td>
            <td class="field">
                <input type="text" name="profile[mail]" value="<?php echo $this->_tpl_vars['sPost']['profile']['mail']; ?>
" style="width: 250px;" maxlength="50" />
            </td>
        </tr>
    <?php else: ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['username']; ?>
 <span class="red">*</span></td>
            <td class="field">
                <input <?php if ($_GET['action'] == 'edit'): ?>readonly="readonly"<?php endif; ?> class="<?php if ($_GET['action'] == 'edit'): ?>disabled<?php endif; ?>" name="profile[username]" type="text" style="width: 150px;" value="<?php echo $this->_tpl_vars['sPost']['profile']['username']; ?>
" maxlength="30" />
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td class="name">
            <div style="margin-left: 10px;"><?php if ($_GET['action'] == 'edit'): ?><?php echo $this->_tpl_vars['lang']['new_password']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['password']; ?>
<?php endif; ?> <span class="red">*</span></div>
        </td>
        <td class="field">
            <input type="password" name="profile[password]" value="<?php echo $this->_tpl_vars['sPost']['profile']['password']; ?>
" style="width: 250px;" maxlength="50" />
        </td>
    </tr>
    <tr>
        <td class="name">
            <div style="margin-left: 10px;"><?php echo $this->_tpl_vars['lang']['password_repeat']; ?>
 <span class="red">*</span></div>
        </td>
        <td class="field">
            <input type="password" name="profile[password_repeat]" value="<?php echo $this->_tpl_vars['sPost']['profile']['password_repeat']; ?>
" style="width: 250px;" maxlength="50" />
        </td>
    </tr>
    <?php if ($this->_tpl_vars['config']['account_login_mode'] != 'email'): ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mail']; ?>
 <span class="red">*</span></td>
            <td class="field">
                <input type="text" name="profile[mail]" value="<?php echo $this->_tpl_vars['sPost']['profile']['mail']; ?>
" style="width: 250px;" maxlength="50" />
            </td>
        </tr>
    <?php endif; ?>
    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['profile_lang']; ?>
 </td>
        <td class="field">
            <select name="profile[lang]">
                <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_item']):
?>
                    <option <?php if ($this->_tpl_vars['lang_item']['Code'] == $this->_tpl_vars['sPost']['profile']['lang']): ?>selected="selected"<?php endif; ?> value="<?php echo $this->_tpl_vars['lang_item']['Code']; ?>
"><?php echo $this->_tpl_vars['lang_item']['name']; ?>
</option>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </td>
    </tr>
    <?php endif; ?>
    <tr>
        <td></td>
        <td class="field" <?php if ($_GET['action'] != 'add'): ?>style="height: 36px;"<?php endif; ?> valign="top">
            <label><input value="1" type="checkbox" <?php if ($this->_tpl_vars['sPost']['profile']['display_email']): ?>checked="checked"<?php endif; ?> name="profile[display_email]" /> <?php echo $this->_tpl_vars['lang']['display_email']; ?>
</label>
        </td>
    </tr>

    <!-- Agreement fields -->
    <?php $_from = $this->_tpl_vars['agreement_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ag_field']):
?>
        <tr class="ag_fields <?php echo ''; ?><?php if (! $this->_tpl_vars['selected_atype'] || ( $this->_tpl_vars['ag_field']['Values'] && $this->_tpl_vars['selected_atype'] && ((is_array($_tmp=$this->_tpl_vars['ag_field']['Values'])) ? $this->_run_mod_handler('strstr', true, $_tmp, $this->_tpl_vars['selected_atype']['Key']) : strstr($_tmp, $this->_tpl_vars['selected_atype']['Key'])) == false )): ?><?php echo 'hide'; ?><?php endif; ?><?php echo ''; ?>
"
            data-types="<?php echo $this->_tpl_vars['ag_field']['Values']; ?>
">
            <td></td>
            <td class="field" valign="top">
                <label>
                    <input value="1"
                        type="checkbox"
                        name="profile[accept][<?php echo $this->_tpl_vars['ag_field']['Key']; ?>
]"
                        <?php if ($this->_tpl_vars['sPost']['profile']['accept'][$this->_tpl_vars['ag_field']['Key']]): ?>checked="checked"<?php endif; ?>
                        <?php if ($_GET['action'] == 'edit'): ?>disabled="disabled"<?php endif; ?> />
                    &nbsp;<?php echo $this->_tpl_vars['lang']['agree']; ?>


                    <a target="_blank" href="<?php echo $this->_plugins['function']['pageUrl'][0][0]->pageUrl(array('key' => $this->_tpl_vars['ag_field']['Default']), $this);?>
">
                        <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => ((is_array($_tmp='pages+name+')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['ag_field']['Default']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['ag_field']['Default']))), $this);?>

                    </a>
                </label>
            </td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
    <!-- Agreement fields end -->

    <?php if ($_GET['action'] == 'edit'): ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['preview_image']; ?>
</td>
            <td class="field">
                <?php if ($this->_tpl_vars['aInfo']['Photo']): ?>
                    <div style="margin: 0 0 5px 0;" id="photo_object">
                        <img align="middle" title="<?php echo $this->_tpl_vars['lang']['your_photo']; ?>
" alt="<?php echo $this->_tpl_vars['lang']['your_photo']; ?>
" src="<?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['aInfo']['Photo']; ?>
" /><br />
                        <span onclick='rlConfirm( "<?php echo $this->_tpl_vars['lang']['delete_confirm']; ?>
", "xajax_delAccountFile", Array("\"Photo\"", <?php echo $_GET['account']; ?>
, "\"photo_object\"" ), "photo_loading", "smarty" );' class="label" title="<?php echo $this->_tpl_vars['lang']['delete']; ?>
" style="text-transform: capitalize; text-decoration: underline;">
                            <?php echo $this->_tpl_vars['lang']['delete']; ?>
</span><span class="label"> | </span>
                        <span onclick="show('thumbnail');" class="label" title="<?php echo $this->_tpl_vars['lang']['manage']; ?>
" style="text-transform: capitalize; text-decoration: underline;"><?php echo $this->_tpl_vars['lang']['manage']; ?>
</span><br />
                        <span class="loading" id="photo_loading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </div>
                <?php endif; ?>
                <div id="thumbnail" <?php if (! empty ( $this->_tpl_vars['aInfo']['Photo'] )): ?>class="hide"<?php endif; ?>>
                    <input class="" type="file" name="thumbnail" size="1" />
                </div>
            </td>
        </tr>
    <?php endif; ?>
    </table>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsForm'), $this);?>


    <?php if ($_GET['action'] == 'edit'): ?>
    <table class="form">
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
 <span class="red">*</span></td>
        <td class="field">
            <select name="profile[status]">
                <option value="active" <?php if ($this->_tpl_vars['sPost']['profile']['status'] == 'active'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                <option value="approval" <?php if ($this->_tpl_vars['sPost']['profile']['status'] == 'approval'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
                <?php if ($this->_tpl_vars['sPost']['profile']['status'] == 'pending'): ?><option value="pending" selected="selected"><?php echo $this->_tpl_vars['lang']['pending']; ?>
</option><?php endif; ?>
                <?php if ($this->_tpl_vars['sPost']['profile']['status'] == 'incomplete'): ?><option value="incomplete" selected="selected"><?php echo $this->_tpl_vars['lang']['incomplete']; ?>
</option><?php endif; ?>
                <?php if ($this->_tpl_vars['sPost']['profile']['status'] == 'expired'): ?><option value="expired" selected="selected"><?php echo $this->_tpl_vars['lang']['expired']; ?>
</option><?php endif; ?>
            </select>
        </td>
    </tr>
    </table>
    <?php endif; ?>

    <div id="next1" <?php if (! empty ( $this->_tpl_vars['fields'] )): ?>class="hide"<?php endif; ?>>
    <?php if ($_GET['action'] == 'add'): ?>
        <table class="form">
        <tr>
            <td class="name no_divider"></td>
            <td class="field">
                <input type="button" onclick="xajax_getAccountFields($('#type_selector').val()); $('#step1_loading').fadeIn('normal');" value="<?php echo $this->_tpl_vars['lang']['next']; ?>
" />
                <span class="loader" id="step1_loading"></span>
            </td>
        </tr>
        </table>
        <script>
        <?php echo '

        $(function(){
            $(\'form[name=account_reg_form]\').submit(function(e){
                if ($(\'#next1\').is(\':visible\')) {
                    $(\'#next1 input[type=button]\').trigger(\'click\');

                    return false;
                } else {
                    return submitHandler();
                }
            });
        });

        '; ?>

        </script>
    <?php elseif ($_GET['action'] == 'edit'): ?>
        <table class="form">
        <tr>
            <td class="name no_divider"></td>
            <td class="field"><input type="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" /></td>
        </tr>
        </table>
    <?php endif; ?>
    </div>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <div id="account_field_area" <?php if (empty ( $this->_tpl_vars['fields'] )): ?>class="hide"<?php endif; ?>>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array('block_caption' => $this->_tpl_vars['lang']['account_information'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <div id="additional_fields">
                <?php if (! empty ( $this->_tpl_vars['fields'] )): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'account_field.tpl') : smarty_modifier_cat($_tmp, 'account_field.tpl')), 'smarty_include_vars' => array('fields' => $this->_tpl_vars['fields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endif; ?>
            </div>

            <table class="form">
            <tr>
                <td class="name no_divider"></td>
                <td class="field"><input type="submit" value="<?php echo $this->_tpl_vars['lang']['save']; ?>
" /></td>
            </tr>
            </table>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    </form>

    <!-- qtips randerer -->
    <script type="text/javascript" src="<?php echo (defined('RL_LIBS_URL') ? @RL_LIBS_URL : null); ?>
jquery/jquery.qtip.js?rev=<?php echo $this->_tpl_vars['config']['static_files_revision']; ?>
"></script>
    <script type="text/javascript">
    <?php echo '
    $(document).ready(function(){
        $(\'.qtip\').each(function(){
            $(this).qtip({
                content: $(this).attr(\'title\'),
                show: \'mouseover\',
                hide: \'mouseout\',
                position: {
                    corner: {
                        target: \'topRight\',
                        tooltip: \'bottomLeft\'
                    }
                },
                style: {
                    width: 150,
                    background: \'#8e8e8e\',
                    color: \'white\',
                    border: {
                        width: 7,
                        radius: 5,
                        color: \'#8e8e8e\'
                    },
                    tip: \'bottomLeft\'
                }
            });
        }).attr(\'title\', \'\');

        flynax.deleteFile();
    });
    '; ?>

    </script>
    <!-- qtips randerer end -->

    <!-- add/edit account end -->

<?php elseif ($_GET['action'] == 'view' && ( ! empty ( $_GET['username'] ) || ! empty ( $_GET['userid'] ) ) && $this->_tpl_vars['seller_info']): ?>

    <ul class="tabs" style="margin-top: 15px;">
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

    <div class="tab_area seller listing_details">
        <table class="sTable">
        <tr>
            <td valign="top" style="width: 170px;text-align: right;padding-right: 20px;">
                <a title="<?php echo $this->_tpl_vars['lang']['visit_owner_page']; ?>
" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&amp;action=view&amp;userid=<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
">
                    <img style="<?php echo 'display:inline;width: '; ?><?php if ($this->_tpl_vars['seller_info']['Thumb_width']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['seller_info']['Thumb_width']; ?><?php echo ''; ?><?php else: ?><?php echo '110'; ?><?php endif; ?><?php echo 'px;'; ?>
"
                        <?php if (! empty ( $this->_tpl_vars['seller_info']['Photo'] )): ?>class="thumbnail"<?php endif; ?>
                        alt="<?php echo $this->_tpl_vars['lang']['seller_thumbnail']; ?>
"
                        src="<?php if (! empty ( $this->_tpl_vars['seller_info']['Photo'] )): ?><?php echo (defined('RL_FILES_URL') ? @RL_FILES_URL : null); ?>
<?php echo $this->_tpl_vars['seller_info']['Photo']; ?>
<?php else: ?><?php echo $this->_tpl_vars['rlTplBase']; ?>
img/no-account.png<?php endif; ?>" />
                </a>

                <ul class="info">
                    <?php if ($this->_tpl_vars['config']['messages_module']): ?><li><input id="contact_owner" type="button" value="<?php echo $this->_tpl_vars['lang']['contact_owner']; ?>
" /></li><?php endif; ?>
                    <?php if ($this->_tpl_vars['seller_info']['Own_page']): ?>
                        <li><a title="<?php echo $this->_tpl_vars['lang']['other_owner_listings']; ?>
" onclick="$('ul.tabs li[lang=listings]').trigger('click');" href="<?php echo $this->_tpl_vars['rlBase']; ?>
index.php?controller=accounts&amp;action=view&amp;userid=<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
#listings"><?php echo $this->_tpl_vars['lang']['account_listings']; ?>
</a> <span class="counter">(<?php echo $this->_tpl_vars['seller_info']['Listings_count']; ?>
)</span></li>
                    <?php endif; ?>
                </ul>
            </td>
            <td valign="top">
                <div class="username"><?php echo $this->_tpl_vars['seller_info']['Full_name']; ?>
</div>

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

                    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsUserInfoField'), $this);?>

                </table>

                <?php if ($this->_tpl_vars['seller_info']['Fields']): ?>
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

                <?php if ($this->_tpl_vars['config']['map_module'] && $this->_tpl_vars['location']['direct']): ?>
                    <fieldset class="light" style="margin-top: 20px;">
                        <legend id="legend_group_map_system" class="up" onclick="fieldset_action('group_map_system');"><?php echo $this->_tpl_vars['lang']['map']; ?>
</legend>
                        <div id="group_map_system" class="tree">
                            <div id="map_container" style="height: 30vw;"></div>
                        </div>
                    </fieldset>

                    <?php echo $this->_plugins['function']['mapsAPI'][0][0]->adminMapsAPI(array(), $this);?>


                    <script>
                    <?php echo '

                    var isMap   = false;
                    var initMap = function(){
                        if (isMap) {
                            return;
                        }

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

                        isMap = true;
                    }

                    $(function(){
                        if (flynax.getHash() != \'listings\') {
                            initMap();
                        }

                        $(\'ul.tabs li[lang=seller]\').click(function(){
                            initMap();
                        });
                    });

                    '; ?>

                    </script>
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

    <div class="tab_area listings listing_details hide">
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

        //]]>
        </script>

        <!-- listings grid create -->
        <div id="grid"></div>
        <script type="text/javascript">//<![CDATA[
        var account_username = '<?php echo ((is_array($_tmp=$this->_tpl_vars['seller_info']['Username'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
';
        var account_id       = <?php echo $this->_tpl_vars['seller_info']['ID']; ?>
;
        var mass_actions     = [
            [lang['ext_activate'], 'activate'],
            [lang['ext_suspend'], 'approve'],
            [lang['ext_renew'], 'renew'],
            <?php if (((is_array($_tmp='delete')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['aRights']['listings']) : in_array($_tmp, $this->_tpl_vars['aRights']['listings']))): ?>[lang['ext_delete'], 'delete'],<?php endif; ?>
            [lang['ext_move'], 'move'],
            [lang['ext_make_featured'], 'featured'],
            [lang['ext_annul_featured'], 'annul_featured']
        ];

        <?php echo '

        var grid_subtract_width = 72;//because the grid placed in a custom area (div>div)
        var listingsGrid;
        $(document).ready(function(){
            if (flynax.getHash() === \'listings\') {
                setTimeout(function() {
                    $(\'ul.tabs li[lang=listings]\').trigger(\'click\');
                }, 1);
            }

            listingsGrid = new gridObj({
                key: \'accountListings\',
                id: \'grid\',
                ajaxUrl: rlUrlHome + \'controllers/listings.inc.php?q=ext&f_Account=\'+ account_username,
                defaultSortField: \'Date\',
                defaultSortType: \'DESC\',
                remoteSortable: false,
                checkbox: true,
                actions: mass_actions,
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
                            return "<a target=\'_blank\' ext:qtip=\'" + lang[\'ext_click_to_view_details\']
                                + "\' href=\'" + rlUrlHome
                                + "index.php?controller=accounts&action=view&userid=" + row.data.Account_ID
                                + "\'>" + username + "</a>";
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
                            selectOnFocus: true
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

            var grid_exist = false;

            $(\'ul.tabs li[lang=listings]\').click(function() {
                if (!grid_exist) {
                    '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsListingsGrid'), $this);?>
<?php echo '

                    $(\'div.listings\').show();

                    listingsGrid.init();
                    grid.push(listingsGrid.grid);
                    grid_exist = true;

                    // actions listener
                    listingsGrid.actionButton.addListener(\'click\', function() {
                        var sel_obj = listingsGrid.checkboxColumn.getSelections();
                        var action = listingsGrid.actionsDropDown.getValue();

                        if (!action) {
                            return false;
                        }

                        for (var i = 0; i < sel_obj.length; i++) {
                            listingsGrid.ids += sel_obj[i].id;
                            if (sel_obj.length != i + 1) {
                                listingsGrid.ids += \'|\';
                            }
                        }

                        if (action == \'delete\') {
                            Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_notice_\'+delete_mod], function(btn) {
                                if (btn == \'yes\') {
                                    xajax_massActions(listingsGrid.ids, action);
                                    listingsGrid.store.reload();
                                }
                            });
                        } else if (action == \'featured\') {
                            $(\'#make_featured\').fadeIn(\'slow\');
                            return false;
                        } else if (action == \'annul_featured\') {
                            $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                            Ext.MessageBox.confirm(\'Confirm\', lang[\'ext_annul_featued_notice\'], function(btn) {
                                if (btn == \'yes\') {
                                    xajax_annulFeatured(listingsGrid.ids);
                                }
                            });

                            return false;
                        } else if (action == \'move\') {
                            $(\'#mass_areas div.scroll\').fadeOut(\'fast\');
                            $(\'#move_area\').fadeIn(\'slow\');
                            return false;
                        } else {
                            $(\'#make_featured,#move_area\').fadeOut(\'fast\');
                            xajax_massActions( listingsGrid.ids, action );
                            listingsGrid.store.reload();
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

                    listingsGrid.grid.addListener(\'afteredit\', function(editEvent) {
                        if (editEvent.field == \'Plan_ID\') {
                            listingsGrid.reload();
                        }
                    });
                }
            });
        });
        '; ?>

        //]]>
        </script>
    </div>

    <?php if (isset ( $this->_tpl_vars['seller_info']['Agents_count'] )): ?>
        <div class="tab_area agents listing_details hide">
            <!-- agents grid -->
            <div id="agents-grid"></div>
            <script><?php echo '
                $(function () {
                    if (flynax.getHash() === \'agents\') {
                        setTimeout(function () {
                            $(\'ul.tabs li[lang=agents]\').trigger(\'click\');
                        }, 1);
                    }

                    let agentsGrid = new gridObj({
                        key    : \'agents\',
                        id     : \'agents-grid\',
                        ajaxUrl: rlUrlHome
                                    + \'controllers/accounts.inc.php?q=ext&agency=\'
                                    + \''; ?>
<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
<?php echo '\'
                                    + \'&search=1\',
                        defaultSortField: \'Date\',
                        title           : lang.ext_accounts_manager,
                        expander        : true,
                        expanderTpl     : \'<div style="margin: 0 5px 5px 83px">\'
                            + \'<table><tr><td>{thumbnail}</td><td>{fields}</td></tr></table><div>\',
                        remoteSortable: true,
                        fields: [
                            {name: \'Username\', mapping: \'Username\', type: \'string\'},
                            {name: \'Name\', mapping: \'Name\', type: \'string\'},
                            {name: \'Mail\', mapping: \'Mail\', type: \'string\'},
                            {name: \'Status\', mapping: \'Status\'},
                            {name: \'Type\', mapping: \'Type\', type: \'string\'},
                            {name: \'Type_name\', mapping: \'Type_name\', type: \'string\'},
                            {name: \'thumbnail\', mapping: \'thumbnail\', type: \'string\'},
                            {name: \'fields\', mapping: \'fields\', type: \'string\'},
                            {name: \'ID\', mapping: \'ID\', type: \'int\'},
                            {name: \'Plan_ID\', mapping: \'Plan_ID\', type: \'int\'},
                            {name: \'Plan_name\', mapping: \'Plan_name\', type: \'string\'},
                            {name: \'Plan_info\', mapping: \'Plan_info\'},
                            {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'}
                        ],
                        columns: [{
                                header: lang.ext_id,
                                dataIndex: \'ID\',
                                width: 40,
                                fixed: true,
                                id: \'rlExt_black_bold\'
                            },{
                                header: lang.ext_username,
                                dataIndex: \'Username\',
                                width: 13
                            },{
                                header: lang.ext_name,
                                dataIndex: \'Name\',
                                width: 15,
                                id: \'rlExt_item_bold\',
                                renderer: function(val, ext, row){
                                    return \'<a href="\' + rlUrlHome + \'index.php?controller=accounts&action=view&userid=\'
                                        + row.data.ID
                                        + \'">\'+ val +\'</a>\';
                                }
                            },'; ?>
<?php if ($this->_tpl_vars['config']['membership_module']): ?><?php echo '{
                                header: lang.ext_plan,
                                dataIndex: \'Plan_name\',
                                width: 15,
                                renderer: function (val, obj, row){
                                    if (val != \'\') {
                                        return \'<img class="info" ext:qtip="\' + row.data.Plan_info
                                            + \'" alt="" src="\' + rlUrlHome
                                            + \'img/blank.gif" />&nbsp;&nbsp;<span>\' + val + \'</span>\';
                                    } else {
                                        return \'<span class="delete" style="margin-left: 25px;">\'
                                            + lang.ext_no_plan_set + \'</span>\';
                                    }
                                }
                            },'; ?>
<?php endif; ?><?php echo '{
                                header: lang.ext_email,
                                dataIndex: \'Mail\',
                                width: 22,
                                id: \'rlExt_item\',
                                editor: new Ext.form.TextField({allowBlank: false, inputType: \'mail\'}),
                                renderer: function(val) {
                                    return \'<span ext:qtip="\' + lang.ext_click_to_edit + \'">\' + val + \'</span>\';
                                }
                            },{
                                header: lang.ext_type,
                                dataIndex: \'Type_name\',
                                width: 13
                            },{
                                header: lang.ext_join_date,
                                dataIndex: \'Date\',
                                width: 13,
                                renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                            },{
                                header: lang.ext_status,
                                dataIndex: \'Status\',
                                width: 100,
                                fixed: true,
                                editor: new Ext.form.ComboBox({
                                    store: [[\'active\', lang.active], [\'approval\', lang.approval]],
                                    displayField: \'value\',
                                    valueField: \'key\',
                                    typeAhead: true,
                                    mode: \'local\',
                                    triggerAction: \'all\',
                                    selectOnFocus: true
                                })
                            },{
                                header: lang.ext_actions,
                                width: 100,
                                fixed: true,
                                dataIndex: \'ID\',
                                sortable: false,
                                renderer: function(data, ext, row) {
                                    let out = "<center>"
                                        + "<a href=\'" + rlUrlHome + "index.php?controller="
                                        + controller + "&action=view&userid=" + data
                                        + "\'><img class=\'view\' ext:qtip=\'" + lang.ext_view
                                        + "\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";

                                    if (rights[cKey].indexOf(\'edit\') >= 0) {
                                        out += "<a href=\'" + rlUrlHome + "index.php?controller="
                                            + controller+"&action=edit&account=" + data
                                            + "\'><img class=\'edit\' ext:qtip=\'" + lang.ext_edit
                                            + "\' src=\'" + rlUrlHome + "img/blank.gif\' /></a>";
                                    }
                                    if (rights[cKey].indexOf(\'delete\') >= 0) {
                                        out += "<img class=\'remove\' ext:qtip=\'" + lang.ext_delete + "\' src=\'"
                                            + rlUrlHome + "img/blank.gif\' onclick=\'xajax_prepareDeleting("
                                            + row.data.ID + ")\' />";
                                    }
                                    out += "</center>";

                                    return out;
                                }
                            }
                        ]
                    });

                    let agentsGridInit = false;
                    $(\'ul.tabs li[lang=agents]\').click(function () {
                        if (agentsGridInit) {
                            return;
                        }

                        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAgentsGrid'), $this);?>
<?php echo '

                        $(\'div.agents\').show();
                        agentsGrid.init();
                        grid.push(agentsGrid.grid);
                        agentsGridInit = true;

                        agentsGrid.grid.on(\'validateedit\', function(e) {
                            if (e.field === \'Mail\' && e.originalValue != e.value) {
                                let data = {\'lookIn\': \'accounts\', \'byField\': \'Mail\', \'value\': e.value};

                                flynax.sendAjaxRequest(\'isUserExist\', data, function() {
                                    Ext.Ajax.request({
                                        url   : agentsGrid.ajaxUrl,
                                        method: agentsGrid.ajaxMethod,
                                        params: {\'action\': \'update\', \'id\': e.record.id, \'field\': \'Mail\', \'value\': e.value}
                                    });

                                    agentsGrid.reload();
                                });

                                return false;
                            }
                        });
                    });
                });
            '; ?>
</script>
            <!-- agents grid end -->
        </div>

        <div class="tab_area invites listing_details hide">
            <!-- invites grid -->
            <div id="invites-grid"></div>
            <script><?php echo '
                $(function () {
                    if (flynax.getHash() === \'invites\') {
                        setTimeout(function () {
                            $(\'ul.tabs li[lang=invites]\').trigger(\'click\');
                        }, 1);
                    }

                    let invitesGrid = new gridObj({
                        key    : \'invites\',
                        id     : \'invites-grid\',
                        ajaxUrl: rlUrlHome
                                    + \'controllers/accounts.inc.php?q=ext&agency=\'
                                    + \''; ?>
<?php echo $this->_tpl_vars['seller_info']['ID']; ?>
<?php echo '\'
                                    + \'&search=1&invites=1\',
                        title: \''; ?>
<?php echo $this->_tpl_vars['lang']['invites']; ?>
<?php echo '\',
                        fields: [
                            {name: \'ID\', mapping: \'ID\', type: \'int\'},
                            {name: \'Name_Email\', mapping: \'Agent_Email\', type: \'string\'},
                            {name: \'Agent\', mapping: \'Agent\', type: \'array\'},
                            {name: \'Created_Date\', mapping: \'Created_Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                            {name: \'Accepted_Date\', mapping: \'Accepted_Declined_Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                            {name: \'Status\', mapping: \'Status\', type: \'string\'},
                        ],
                        columns: [{
                                header: lang.ext_id,
                                dataIndex: \'ID\',
                                width: 40,
                                fixed: true,
                                id: \'rlExt_black_bold\'
                            },{
                                header: \''; ?>
<?php echo $this->_tpl_vars['lang']['name']; ?>
/<?php echo $this->_tpl_vars['lang']['mail']; ?>
<?php echo '\',
                                dataIndex: \'Name_Email\',
                                width: 13,
                                renderer: function (email, row, store) {
                                    return store.data.Agent && store.data.Agent.Full_name
                                        ? (`<a href="${rlUrlController}`
                                            + `&action=view&userid=${store.data.Agent.ID}">`
                                            + `${store.data.Agent.Full_name}</a>`
                                        )
                                        : email;
                                }
                            },{
                                header: lang.ext_join_date,
                                dataIndex: \'Created_Date\',
                                width: 13,
                                renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                            },{
                                header: lang.accepted_date + \'/\' + lang.declined_date,
                                dataIndex: \'Accepted_Declined_Date\',
                                width: 13,
                                renderer: function(date, row, store) {
                                    if (store.json.Status === \'accepted\' && store.json.Accepted_Date) {
                                        return Ext.util.Format.dateRenderer(
                                            rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\')
                                        )(store.json.Accepted_Date);
                                    } else if (store.json.Status === \'declined\' && store.json.Declined_Date) {
                                        return Ext.util.Format.dateRenderer(
                                            rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\')
                                        )(store.json.Declined_Date);
                                    } else {
                                        return lang.ext_not_available;
                                    }
                                },
                            },{
                                header: lang.ext_status,
                                dataIndex: \'Status\',
                                width: 100,
                                fixed: true,
                                renderer: function(status, param1) {
                                    if (status === \'accepted\') {
                                        param1.style += \'background: #d2e798;\';
                                    } else if (status === \'declined\') {
                                        param1.style += \'background: #fbc4c4;\';
                                    } else if (status === \'pending\') {
                                        param1.style += \'background: #c0ecee;\';
                                    }

                                    return lang[status];
                                },
                            },
                        ]
                    });

                    let invitesGridInit = false;
                    $(\'ul.tabs li[lang=invites]\').click(function () {
                        if (invitesGridInit) {
                            return;
                        }

                        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplInvitesGrid'), $this);?>
<?php echo '

                        $(\'div.invites\').show();
                        invitesGrid.init();
                        grid.push(invitesGrid.grid);
                        invitesGridInit = true;
                    });
                });
            '; ?>
</script>
            <!-- agents grid end -->
        </div>
    <?php endif; ?>

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsTabsArea'), $this);?>


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

    </div>

<?php else: ?>
    <!-- accounts grid -->
    <div id="grid"></div>
    <script type="text/javascript">//<![CDATA[
    var mass_actions = [
        [lang['ext_activate'], 'activate'],
        [lang['ext_suspend'], 'approve'],
        ["<?php echo $this->_tpl_vars['lang']['resend_activation_link']; ?>
", 'resend_link']
    ];
    var listingGroupsGrid;

    <?php echo '
    $(document).ready(function(){
        accountsGrid = new gridObj({
            key: \'accounts\',
            id: \'grid\',
            ajaxUrl: rlUrlHome + \'controllers/accounts.inc.php?q=ext\',
            defaultSortField: \'Date\',
            title: lang[\'ext_accounts_manager\'],
            checkbox: true,
            actions: mass_actions,
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
            remoteSortable: true,
            filters: cookie_filters,
            fields: [
                {name: \'Username\', mapping: \'Username\', type: \'string\'},
                {name: \'Name\', mapping: \'Name\', type: \'string\'},
                {name: \'Mail\', mapping: \'Mail\', type: \'string\'},
                {name: \'Status\', mapping: \'Status\'},
                {name: \'Type\', mapping: \'Type\', type: \'string\'},
                {name: \'Type_name\', mapping: \'Type_name\', type: \'string\'},
                {name: \'thumbnail\', mapping: \'thumbnail\', type: \'string\'},
                {name: \'fields\', mapping: \'fields\', type: \'string\'},
                {name: \'ID\', mapping: \'ID\', type: \'int\'},
                {name: \'Plan_ID\', mapping: \'Plan_ID\', type: \'int\'},
                {name: \'Plan_name\', mapping: \'Plan_name\', type: \'string\'},
                {name: \'Plan_info\', mapping: \'Plan_info\'},
                {name: \'Date\', mapping: \'Date\', type: \'date\', dateFormat: \'Y-m-d H:i:s\'},
                {name: \'Active_till\', mapping: \'Active_till\', type: \'string\'}
            ],
            columns: [
                {
                    header: lang[\'ext_id\'],
                    dataIndex: \'ID\',
                    width: 40,
                    fixed: true,
                    id: \'rlExt_black_bold\'
                },{
                    header: lang[\'ext_username\'],
                    dataIndex: \'Username\',
                    width: 13
                },{
                    header: lang[\'ext_name\'],
                    dataIndex: \'Name\',
                    width: 15,
                    id: \'rlExt_item_bold\',
                    renderer: function(val, ext, row){
                        return \'<a href="\'+rlUrlHome+\'index.php?controller=accounts&action=view&userid=\'+row.data.ID+\'">\'+ val +\'</a>\';
                    }
                },'; ?>
<?php if ($this->_tpl_vars['config']['membership_module']): ?><?php echo '{
                    header: lang[\'ext_plan\'],
                    dataIndex: \'Plan_name\',
                    width: 15,
                    renderer: function (val, obj, row){
                        if (val != \'\')
                        {
                            return \'<img class="info" ext:qtip="\'+row.data.Plan_info+\'" alt="" src="\'+rlUrlHome+\'img/blank.gif" />&nbsp;&nbsp;<span>\'+val+\'</span>\';
                        }
                        else
                        {
                            return \'<span class="delete" style="margin-left: 25px;">\'+lang[\'ext_no_plan_set\']+\'</span>\';
                        }
                    }
                },'; ?>
<?php endif; ?><?php echo '{
                    header: lang[\'ext_email\'],
                    dataIndex: \'Mail\',
                    width: 22,
                    id: \'rlExt_item\',
                    editor: new Ext.form.TextField({
                        allowBlank: false,
                        inputType: \'mail\'
                    }),
                    renderer: function(val){
                        return \'<span ext:qtip="\'+lang[\'ext_click_to_edit\']+\'">\'+val+\'</span>\';
                    }
                },{
                    header: lang[\'ext_type\'],
                    dataIndex: \'Type_name\',
                    width: 110,
                    fixed: true
                },{
                    header: lang[\'ext_join_date\'],
                    dataIndex: \'Date\',
                    width: 140,
                    fixed: true,
                    renderer: Ext.util.Format.dateRenderer(rlDateFormat.replace(/%/g, \'\').replace(\'b\', \'M\'))
                },'; ?>
<?php if ($this->_tpl_vars['config']['membership_module']): ?><?php echo '{
                    header: '; ?>
"<?php echo $this->_tpl_vars['lang']['active_till']; ?>
"<?php echo ',
                    dataIndex: \'Active_till\',
                    width: 140,
                    fixed: true
                },'; ?>
<?php endif; ?><?php echo '{
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
                    dataIndex: \'ID\',
                    sortable: false,
                    renderer: function(data, ext, row) {
                        var out = "<center>";
                        var splitter = false;

                        out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=view&userid="+data+"\'><img class=\'view\' ext:qtip=\'"+lang[\'ext_view\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";

                        if ( rights[cKey].indexOf(\'edit\') >= 0 )
                        {
                            out += "<a href=\'"+rlUrlHome+"index.php?controller="+controller+"&action=edit&account="+data+"\'><img class=\'edit\' ext:qtip=\'"+lang[\'ext_edit\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' /></a>";
                        }
                        if ( rights[cKey].indexOf(\'delete\') >= 0 )
                        {
                            out += "<img class=\'remove\' ext:qtip=\'"+lang[\'ext_delete\']+"\' src=\'"+rlUrlHome+"img/blank.gif\' onclick=\'xajax_prepareDeleting("+row.data.ID+")\' />";
                        }
                        out += "</center>";

                        return out;
                    }
                }
            ]
        });

        '; ?>
<?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsGrid'), $this);?>
<?php echo '

        accountsGrid.init();
        grid.push(accountsGrid.grid);

        accountsGrid.grid.on(\'validateedit\', function(e) {
            if (e.field == \'Mail\' && e.originalValue !== e.value) {
                var data = {
                    \'lookIn\': \'accounts\',
                    \'byField\': \'Mail\',
                    \'value\': e.value
                };

                flynax.sendAjaxRequest(\'isUserExist\', data, function() {
                    Ext.Ajax.request({
                        url: accountsGrid.ajaxUrl,
                        method: accountsGrid.ajaxMethod,
                        params: {
                            \'action\': \'update\',
                            \'id\': e.record.id,
                            \'field\': \'Mail\',
                            \'value\': e.value
                        }
                    });

                    accountsGrid.reload();
                });

                return false;
            }
        });

        // actions listener
        accountsGrid.actionButton.addListener(\'click\', function()
        {
            var sel_obj = accountsGrid.checkboxColumn.getSelections();
            var action = accountsGrid.actionsDropDown.getValue();

            if (!action)
            {
                return false;
            }

            for( var i = 0; i < sel_obj.length; i++ )
            {
                accountsGrid.ids += sel_obj[i].id;
                if ( sel_obj.length != i+1 )
                {
                    accountsGrid.ids += \'|\';
                }
            }

            $(\'#make_featured,#move_area\').fadeOut(\'fast\');
            xajax_massActions( accountsGrid.ids, action );
            accountsGrid.store.reload();

            accountsGrid.checkboxColumn.clearSelections();
            accountsGrid.actionsDropDown.setVisible(false);
            accountsGrid.actionButton.setVisible(false);
        });

    });
    '; ?>

    //]]>
    </script>
    <!-- accounts grid end -->

    <?php echo $this->_plugins['function']['rlHook'][0][0]->load(array('name' => 'apTplAccountsBottom'), $this);?>


<?php endif; ?>

<!-- accounts tpl end -->