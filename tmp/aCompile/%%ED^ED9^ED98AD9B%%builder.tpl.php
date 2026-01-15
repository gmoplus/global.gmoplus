<?php /* Smarty version 2.6.31, created on 2025-09-22 09:49:10
         compiled from blocks/builder/builder.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'blocks/builder/builder.tpl', 3, false),)), $this); ?>
<!-- category builder start -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="sTable">
<tr>
    <td style="width: 230px;" valign="top">
        <div class="build_bar">
            <a id="save_build_form" href="javascript:void(0)" class="button_bar"><span class="left"></span><span class="center"><?php echo $this->_tpl_vars['lang']['save']; ?>
</span><span class="right"></span></a>
        </div>
    </td>
    <?php if (! $this->_tpl_vars['no_groups']): ?>
    <td style="width: 230px;"></td>
    <?php endif; ?>
    <td valign="top">
        <div class="build_bar">
            <table cellpadding="0" cellspacing="0">
            <tr>
                <td valign="top">
                    <input type="text" class="float" id="fields_search" />
                </td>
                <td valign="top">
                    <div style="margin-left: 5px;">
                    <select class="float" id="type_search" style="width: 70px;">
                        <option value="0"><?php echo $this->_tpl_vars['lang']['any']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['l_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_key'] => $this->_tpl_vars['f_type']):
?>
                        <option value="<?php echo $this->_tpl_vars['f_type']; ?>
"><?php echo $this->_tpl_vars['f_type']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </div>
                </td>
                <td>
                    <a class="cancel" href="javascript:void(0)" id="reset_search"><?php echo $this->_tpl_vars['lang']['reset']; ?>
</a>
                </td>
            </tr>
            </table>
        </div>
        
        <script type="text/javascript">
        <?php echo '
        
        $(document).ready(function(){
            /* reset button handler */
            $(\'#reset_search\').click(function(){
                $(\'#fields_search\').val(\'\');
                $(\'#type_search option[value=0]\').attr(\'selected\', true);
                $(\'#fields_container div.field_obj\').show().removeClass(\'search\');
                search = \'\';
                type = 0;
            });
            
            /* search handler */
            $(\'#fields_search\').keyup(function(){
                search = $(this).val();
                
                fields_search(false);
            });
            
            /* type selector */
            $(\'#type_search\').change(function(){
                type = $(\'#type_search\').val();
                
                fields_search(true);
            }).keyup(function(){
                type = $(\'#type_search\').val();
                
                fields_search(true);
            });
        });
        
        var search = \'\';
        var type = 0;
        
        var fields_search = function( allow ){
            var pattern = new RegExp(search, \'gi\');
            var hide = false;
            
            $(\'#fields_container div.field_obj\').show().removeClass(\'search\');
            
            if ( (search.length > 2 || search.length == 0) || allow )
            {
                $(\'#fields_container div.title\').each(function(){
                    if ( pattern.test($(this).html()) && ( type == 0 || $(this).next().children(\'span\').html() == type ) )
                    {
                        $(this).parent().parent().addClass(\'search\');
                        hide = true;
                    }
                });
                
                if ( hide )
                {
                    $(\'#fields_container div.field_obj\').hide();
                    $(\'#fields_container div.search\').show();
                    hide = false;
                }
            }
        }
        
        '; ?>

        </script>
    </td>
</tr>
<tr>
    <td valign="top">
        <fieldset class="light" style="margin: 0 10px 0 0;">
        <legend id="legend_form_section" class="up" onclick="fieldset_action('form_section');"><?php echo $this->_tpl_vars['lang']['form']; ?>
</legend>
        <div id="form_section">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'form.tpl') : smarty_modifier_cat($_tmp, 'form.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        </fieldset>
    </td>
    <?php if (! $this->_tpl_vars['no_groups']): ?>
    <td valign="top">
        <fieldset class="light" style="margin: 0 10px 0 0;">
        <legend id="legend_group_section" class="up" onclick="fieldset_action('group_section');"><?php echo $this->_tpl_vars['lang']['groups_list']; ?>
</legend>
        <div id="group_section">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'groups.tpl') : smarty_modifier_cat($_tmp, 'groups.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
        <div id="group_section_tmp"></div>
        </fieldset>
    </td>
    <?php endif; ?>
    <td valign="top">
        <fieldset class="light" style="margin: 0 10px 0 0;">
        <legend id="legend_fields_section" class="up" onclick="fieldset_action('fields_section');"><?php echo $this->_tpl_vars['lang']['fields_list']; ?>
</legend>
        <div id="fields_section">
            <div id="fields_container">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'builder') : smarty_modifier_cat($_tmp, 'builder')))) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'fields.tpl') : smarty_modifier_cat($_tmp, 'fields.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <div class="clear"></div>
            </div>
            <div id="fields_container_tmp"></div>
        </div>
        </fieldset>
    </td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Listing builder start end -->

<script type="text/javascript">
var build_group_in_group_alert = "<?php echo $this->_tpl_vars['lang']['build_group_in_group_alert']; ?>
";
//<![CDATA[
<?php echo '

$(document).ready(function(){
    $(\'#form_section\').sortable({
        placeholder: \'ui-field-highlight\',
        connectWith: \'#group_section, #fields_container, .group_fields_container\',
        handle: \'.group_title, .field_title\',
        cursor: \'move\',
        forcePlaceholderSize: true,
        helper: \'clone\',
        opacity: 0.5,
        stop: function(event, ui){
            var obj = $(ui.item).attr(\'class\');
            
            /* tmp way */
            if ( obj.indexOf(\'group_obj\') >= 0 && $(ui.item).parent().hasClass(\'group_fields_container\') )
            {
                /* back fields/group to own places */
                $(ui.item).find(\'div.group_fields_container\').hide();
                $(ui.item).addClass(\'tmp\').hide();
                
                if ( $(ui.item).find(\'.group_fields_container div.field_obj\').length > 0 )
                {
                    $(ui.item).find(\'.group_fields_container div.field_obj\').addClass(\'tmp\').hide();
                    var fields = $(ui.item).find(\'.group_fields_container\').html();
                    $(ui.item).find(\'.group_fields_container\').html(\'\');
                    $(\'#fields_container\').prepend(fields);
                    $(\'#fields_container div.tmp\').fadeIn(\'slow\').removeClass(\'tmp\');
                }
                
                $(\'#group_section\').prepend($(ui.item));
                $(\'#group_section div.tmp\').fadeIn(\'slow\').removeClass(\'tmp\');
                
                printMessage(\'alert\', build_group_in_group_alert);
            }
            
            readBuilForm();
        },
        start: function(event, ui){
            clearTimeout(build_timer);
        },
        over: function(event, ui){
            $(this).find(\'div.group_hint, div.form_hint\').remove();
        }
    });

    $(\'#group_section\').sortable({
        placeholder: \'ui-field-highlight\',
        connectWith: \'#form_section\',
        handle: \'.group_title\',
        cursor: \'move\',
        /*cancel: \'.group_hint\',*/
        forcePlaceholderSize: true,
        opacity: 0.5,
        stop: function(event, ui){
            var id = $(ui.item).parent().attr(\'id\');
            
            if ( id != \'group_section\' )
            {
                $(ui.item).find(\'.group_fields_container\').show();
            }
            
            readBuilForm();
        },
        start: function(event, ui){
            clearTimeout(build_timer);
        },
        receive: function(event, ui){
            /* back fields to field section */
            $(ui.item).find(\'div.group_fields_container\').hide();
            
            if ( $(ui.item).find(\'.group_fields_container div.field_obj\').length > 0 )
            {
                $(ui.item).find(\'.group_fields_container div.field_obj\').addClass(\'tmp\').hide();
                var fields = $(ui.item).find(\'.group_fields_container\').html();
                $(ui.item).find(\'.group_fields_container\').html(\'\');
                $(\'#fields_container\').prepend(fields);
                $(\'#fields_container div.tmp\').fadeIn(\'slow\');
            }
            
            /* back fields to own section */
            var obj = $(ui.item).attr(\'class\');
            
            if ( obj.indexOf(\'field_obj\') >= 0 )
            {
                $(ui.item).hide().addClass(\'tmp\');
                $(\'#fields_container\').prepend($(ui.item));
                $(\'#fields_container\').find(\'div.tmp\').fadeIn(\'slow\').removeClass(\'tmp\');
            }
        }
    }).disableSelection();

    $(\'.group_fields_container\').sortable({
        placeholder: \'ui-field-highlight\',
        connectWith: \'#form_section, #fields_container, .group_fields_container\',
        cursor: \'move\',
        forcePlaceholderSize: true,
        helper: \'clone\',
        cancel: \'.group_hint\',
        opacity: 0.5,
        start: function(){
            clearTimeout(build_timer);
        },
        stop: function(event, ui){
            readBuilForm();
        }
    }).disableSelection();
    
    $(\'#fields_container\').sortable({
        placeholder: \'ui-field-highlight\',
        connectWith: \'#form_section, .group_fields_container\',
        cursor: \'move\',
        forcePlaceholderSize: true,
        helper: \'clone\',
        opacity: 0.5,
        start: function(){
            clearTimeout(build_timer);
        },
        stop: function(event, ui){
            readBuilForm();
        },
        receive: function(event, ui){
            var obj = $(ui.item).attr(\'class\');
            
            if ( obj.indexOf(\'field_obj\') < 0 )
            {
                /* back fields/group to own places */
                $(ui.item).find(\'div.group_fields_container\').hide();
                $(ui.item).addClass(\'tmp\').hide();
                
                if ( $(ui.item).find(\'.group_fields_container div.field_obj\').length > 0 )
                {
                    $(ui.item).find(\'.group_fields_container div.field_obj\').addClass(\'tmp\').hide();
                    var fields = $(ui.item).find(\'.group_fields_container\').html();
                    $(ui.item).find(\'.group_fields_container\').html(\'\');
                    $(\'#fields_container\').prepend(fields);
                    $(\'#fields_container div.tmp\').fadeIn(\'slow\').removeClass(\'tmp\');
                }
                
                $(\'#group_section\').prepend($(ui.item));
                $(\'#group_section div.tmp\').fadeIn(\'slow\').removeClass(\'tmp\');
            }
        }
    }).disableSelection();
    
    /* bind save button click */
    $(\'#save_build_form\').click(function(){
        if ( !build_in_progress )
        {
            clearTimeout(build_timer);
            
            $(\'#save_build_form\').addClass(\'bb_hover\').find(\'span.center\').html(lang[\'loading\']);
            build_in_progress = true;
            xajax_buildForm(build_category_id, build_form, build_no_groups);
        }
    });
    
    /* build form to further compare */
    build_form = readBuilForm(\'read\');
    
    /* expand/collapse groups */
    $(\'div.group_title\').dblclick(function(){
        if ( $(this).next().is(\':visible\') )
        {
            $(this).next().fadeOut();
            $(this).addClass(\'collapsed\');
        }
        else
        {
            $(this).next().fadeIn();
            $(this).removeClass(\'collapsed\');
        }
    });
});

var build_form = new Array();
var build_timer = false;
var build_in_progress = false;
var build_no_groups = '; ?>
<?php if ($this->_tpl_vars['no_groups']): ?>1<?php else: ?>0<?php endif; ?><?php echo ';
var build_category_id = '; ?>
<?php if ($this->_tpl_vars['category_info']['ID']): ?><?php echo $this->_tpl_vars['category_info']['ID']; ?>
<?php elseif ($this->_tpl_vars['form_info']['ID']): ?><?php echo $this->_tpl_vars['form_info']['ID']; ?>
<?php else: ?>0<?php endif; ?><?php echo ';

var readBuilForm = function( mode ){
    if ( build_in_progress )
    {
        return;
    }
    
    clearTimeout(build_timer);
    
    var tmp_build_form = new Array();
    var groups = $(\'#form_section\').sortable(\'toArray\');
    var ordering = \'\';
            
    if ( groups )
    {
        for ( var i in groups )
        {
            if ( typeof(groups[i]) != \'function\' )
            {
                ordering += groups[i]+\',\';
                
                if ( groups[i].indexOf(\'group\') == 0 )
                {
                    var fields = $(\'#form_section div#\'+groups[i]+\' div.group_fields_container\').sortable(\'toArray\');

                    tmp_build_form[groups[i]] = Array();
                    tmp_build_form[groups[i]] = fields;
                }
                else
                {
                    tmp_build_form[groups[i]] = true;
                }
            }
        }
        
        tmp_build_form[\'ordering\'] = ordering;
    }
    
    if ( mode == \'read\' )
    {
        return tmp_build_form;
    }
    
    if ( rlIsDiff(build_form, tmp_build_form) )
    {
        build_timer = setTimeout(function(){
            $(\'#save_build_form\').addClass(\'bb_hover\').find(\'span.center\').html(lang[\'loading\']);
            
            if ( !build_in_progress )
            {
                build_in_progress = true;
                xajax_buildForm(build_category_id, tmp_build_form, build_no_groups);
            }
            
        }, 3000);
        
        build_form = tmp_build_form;
    }
}

'; ?>

//]]>
</script>

<!-- category builder end -->