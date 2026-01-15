<?php /* Smarty version 2.6.31, created on 2025-07-28 09:54:42
         compiled from /home/gmoplus/global.gmoplus.com/plugins/dataEntriesImport/admin/dataEntriesImport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/dataEntriesImport/admin/dataEntriesImport.tpl', 3, false),array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/dataEntriesImport/admin/dataEntriesImport.tpl', 15, false),array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/dataEntriesImport/admin/dataEntriesImport.tpl', 32, false),)), $this); ?>
<!-- dataEntriesImport tpl -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_start.tpl') : smarty_modifier_cat($_tmp, 'm_block_start.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('sPost', $_POST); ?>
<style>
<?php echo '
.flexdiv-container {
    display:flex;
}
.flex-item {
    margin:5px;
}
'; ?>

</style>
<form action="<?php echo ((is_array($_tmp=$this->_tpl_vars['rlBaseC'])) ? $this->_run_mod_handler('replace', true, $_tmp, '&amp;', '') : smarty_modifier_replace($_tmp, '&amp;', '')); ?>
" method="post" enctype="multipart/form-data"
      onsubmit="return submit_form(this);">
    <input type="hidden" name="upload" value="1"/>

    <table class="form">
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_import_to']; ?>
</td>
            <td class="field">
                <input  type="radio" id="import_to_new" name="import_to" value="new"/>
                <label for="import_to_new"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_import_to_new']; ?>
</label>
                <input  type="radio" id="import_to_exists" name="import_to" checked="checked"  value="exists"/>
                <label for="import_to_exists"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_import_to_exists']; ?>
</label>
            </td>
        </tr>
        <tr class="data_entry_new">
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
"
                                <?php if (($this->_foreach['langF']['iteration'] <= 1)): ?>class="active"<?php endif; ?>><?php echo $this->_tpl_vars['language']['name']; ?>
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
]"
                            value="<?php echo $this->_tpl_vars['sPost']['name'][$this->_tpl_vars['language']['Code']]; ?>
" maxlength="350"/>
                    <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                        <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
        <tr class="data_entry_new">
            <td class="name"><?php echo $this->_tpl_vars['lang']['order_type']; ?>
</td>
            <td class="field">
                <select name="order_type">
                    <option value="alphabetic"
                            <?php if ($this->_tpl_vars['sPost']['order_type'] == 'alphabetic'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['alphabetic_order']; ?>
</option>
                    <option value="position"
                            <?php if ($this->_tpl_vars['sPost']['order_type'] == 'position'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['position_order']; ?>
</option>
                </select>
            </td>
        </tr>
        <tr class="data_entry_exists">
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['dataEntriesImport_data_entry']; ?>

            </td>
            <td class="field">
                <input type="hidden" name="import_to_parent" value="0"/>
                <div>
                    <?php $this->assign('isExistMultiFields', false); ?>
                    <select name="df_zero_level" class="df_level_1">
                        <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                        <?php $_from = $this->_tpl_vars['data_formats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
                            <?php if ('' != $this->_tpl_vars['entry']['name']): ?>
                                <option
                                    <?php if ($this->_tpl_vars['sPost']['data_entry_exists'] == $this->_tpl_vars['entry']['ID']): ?>selected<?php endif; ?>
                                    <?php if ($this->_tpl_vars['entry']['mf']): ?>
                                        disabled
                                        <?php $this->assign('isExistMultiFields', true); ?>
                                    <?php endif; ?>
                                    value="<?php echo $this->_tpl_vars['entry']['ID']; ?>
"><?php echo $this->_tpl_vars['entry']['name']; ?>
<?php if ($this->_tpl_vars['entry']['mf']): ?> *<?php endif; ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <?php if ($this->_tpl_vars['isMFInstalled'] && $this->_tpl_vars['isExistMultiFields']): ?>
                        <span class="field_description"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_mf_notice']; ?>
</span>
                    <?php endif; ?>
                </div>
            </td>
        </tr>

        <tr>
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['dataEntriesImport_source']; ?>

            </td>
            <td class="field">
                <input type="file" class="file" name="source"/>
                <span class="field_description"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_extensions_desc']; ?>
</span>
            </td>
        </tr>
        <tr id="source_delimiter" class="hide">
            <td class="name">
                <span class="red">*</span><?php echo $this->_tpl_vars['lang']['dataEntriesImport_delimiter']; ?>

            </td>
            <td class="field">
                <select name="delimiter">
                    <option <?php if ($this->_tpl_vars['sPost']['delimiter'] == 'new_line'): ?>selected="selected"<?php endif; ?>
                            value="new_line"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_delimiter_new_line']; ?>
</option>
                    <option <?php if ($this->_tpl_vars['sPost']['delimiter'] == 'tab'): ?>selected="selected"<?php endif; ?>
                            value="tab"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_delimiter_tab']; ?>
</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_ignoreDuplicates']; ?>
</td>
            <td class="field">
                <input checked type="radio" id="ignore_yes" name="ignore_duplicates" value="1"/>
                <label for="ignore_yes"><?php echo $this->_tpl_vars['lang']['yes']; ?>
</label>
                <input type="radio" id="ignore_no" name="ignore_duplicates" value="0"/>
                <label for="ignore_no"><?php echo $this->_tpl_vars['lang']['no']; ?>
</label>
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="field">
                <input class="submit" type="submit" value="<?php echo $this->_tpl_vars['lang']['dataEntriesImport_upload']; ?>
"/>
            </td>
        </tr>
    </table>

</form>
<table class="form" style="margin: 5px 0 0;">
    <tr>
        <td class="divider" colspan="3"><div class="inner"><?php echo $this->_tpl_vars['lang']['dataEntriesImport_sample']; ?>
</div></td>
    </tr>
    <tr>
        <td>
            <div class="flexdiv-container">
                <img class="flex-item" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
dataEntriesImport/admin/static/import-csv.jpg" alt="" title=""/>
                <img class="flex-item" src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
dataEntriesImport/admin/static/sample-xls.jpg" alt="" title=""/>
                <img class="flex-item"src="<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
dataEntriesImport/admin/static/sample-txt.jpg" alt="" title=""/>
            </div>
        </td>
    </tr>
</table>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
    var import_to_id = 0;
    var df_level = 0;
    var tmp_df_list = [];
    var languages = [];
    var dfLevelChanged;
    var current_df_mode = 1; // 0 = new, 1 = exists

    <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['language']):
?>
    languages.push(['<?php echo $this->_tpl_vars['language']['Code']; ?>
', '<?php echo $this->_tpl_vars['language']['name']; ?>
']);
    <?php endforeach; endif; unset($_from); ?>

    <?php echo '
    $(document).ready(function () {
        $(\'.data_entry_new\').css(\'display\',\'none\');
        $(\'input[name="import_to"]\').click(function () {
            if ($(this).val() === \'exists\') {
                    $(\'.data_entry_exists\').css(\'display\',\'table-row\');
                    $(\'.data_entry_new\').css(\'display\',\'none\');
                current_df_mode = 1;
            } else {
                    $(\'.data_entry_exists\').css(\'display\',\'none\');
                    $(\'.data_entry_new\').css(\'display\',\'table-row\');
                current_df_mode = 0;
            }
        });

        $(\'input[name="source"]\').change(function () {
            var sourceExtension = $(this).val().split(\'.\').pop();

            if (sourceExtension !== \'xls\' && sourceExtension !== \'xlsx\' && sourceExtension !== \'csv\' ) {
                $(\'tr#source_delimiter\').show();
            } else {
                $(\'tr#source_delimiter\').hide();
            }
        });

        $(\'select[name=df_zero_level], select[name=df_zero_level_new]\').change(dfLevelChanged);
    });

    // pos: 0 = left, 1 = right
    function getModePrefix(pos) {
        return current_df_mode ? \'\' : (pos ? \'new_\' : \'_new\');
    }

    function getDfLevelFromClass(s_class) {
        return parseInt(s_class.replace(current_df_mode ? \'df_level_\' : \'df_new_level_\', \'\'));
    }

    dfLevelChanged = function (sel) {
        var df_level = getDfLevelFromClass($(sel.target).attr(\'class\'));

        if ($(sel.target).val() !== "0") {
            import_to_id = $(sel.target).val();
            $(\'input[name="import_to_parent\' + getModePrefix(0) + \'"]\').val(import_to_id);

            '; ?>
<?php if ($this->_tpl_vars['isMFInstalled']): ?><?php echo '
            var isMFEntry = $(sel.target).find(\'option:selected\').attr(\'data-mf\') === \'1\';

            if (tmp_df_list[import_to_id] !== undefined) {
                dfLevelHandler(df_level);
            } else if (isMFEntry || df_level > 1) {
                $.post(rlConfig.ajax_url, {
                    \'item\': \'dataEntriesImport_getChildEntries\',
                    \'parent\': import_to_id
                }, function (response) {
                    if (response.status === \'OK\') {
                        if (response.entries && response.entries.length) {
                            tmp_df_list[import_to_id] = response.entries;
                            dfLevelHandler(df_level);
                        } else {
                            clearDfLevels(df_level)
                        }
                    }
                }, \'json\')
            } else {
                clearDfLevels(df_level);
            }
            '; ?>
<?php endif; ?><?php echo '
        } else {
            clearDfLevels(df_level);
            $(\'input[name="import_to_parent\' + getModePrefix(0) + \'"]\').val($(sel.target).attr(\'parent\'));
        }
    };

    function clearDfLevels(skip_level) {
        // current_df_mode = 0; // 0 = new, 1 = exists
        $(\'select[class^=df_\' + getModePrefix(1) + \'level_]\').each(function () {
            if (getDfLevelFromClass($(this).attr(\'class\')) > skip_level) {
                $(this).parent().remove();
            }
        });
    }

    //
    function dfLevelHandler(level) {
        clearDfLevels(level);
        df_level = $(\'select[class^=df_\' + getModePrefix(1) + \'level_]\').length + 1;

        var new_level_select = \'<div style="padding-top:5px;"><select class="df_\' + getModePrefix(1) + \'level_\' + df_level + \'" parent="\' + import_to_id + \'">\';
        new_level_select += \'<option value="0">'; ?>
<?php echo $this->_tpl_vars['lang']['select']; ?>
<?php echo '</option>\';

        for (var i = 0; i < tmp_df_list[import_to_id].length; i++) {
            new_level_select += \'<option value="\' + tmp_df_list[import_to_id][i].ID + \'">\' + tmp_df_list[import_to_id][i].name + \'</option>\';
        }
        new_level_select += \'</select></div>\';

        $(\'select.df_\' + getModePrefix(1) + \'level_\' + level).parent().after(new_level_select);
        $(\'select.df_\' + getModePrefix(1) + \'level_\' + df_level).bind(\'change\', dfLevelChanged);
    }

    // actions before submit
    function submit_form(form) {
        var fields = [];
        var errorMessage = \'\';

        if ($(form).attr(\'disabled\')) {
            return false;
        }

        var deImport = $(\'input[name="import_to"]:checked\').val();
        if (deImport === \'exists\' && $(\'input[name="import_to_parent"]\').val() === \'0\') {
            errorMessage += '; ?>
"<?php echo $this->_tpl_vars['lang']['notice_field_empty']; ?>
".replace('<?php echo '{field}'; ?>
', '<b><?php echo $this->_tpl_vars['lang']['dataEntriesImport_data_entry']; ?>
</b>') + '<br />';<?php echo '
            fields.push(\'df_zero_level\');
        }

        var source = $(\'input[name="source"]\').val();

        if (source === \'\') {
            errorMessage += '; ?>
"<?php echo $this->_tpl_vars['lang']['notice_field_empty']; ?>
".replace('<?php echo '{field}'; ?>
', '<b><?php echo $this->_tpl_vars['lang']['dataEntriesImport_source']; ?>
</b>') + '<br />';<?php echo '
            fields.push(\'source\');
        } else {
            var allowExtensions = [\'txt\', \'csv\', \'xls\', \'xlsx\'];
            var sourceExtension = source.split(\'.\').pop();
            if (allowExtensions.indexOf(sourceExtension) === -1) {
                errorMessage += '; ?>
"<?php echo $this->_tpl_vars['lang']['notice_bad_file_ext']; ?>
".replace('<?php echo '{ext}'; ?>
', '<b>' + sourceExtension + '</b>') + '<br />';<?php echo '
                fields.push(\'source\');
            }
        }

        if (fields.length > 0) {
            printMessage(\'error\', errorMessage);
            highlightFields(fields);
            return false;
        }

        $(form).attr(\'disabled\', true);

        return true;
    }

    // show error fields
    function highlightFields(fields) {
        var pattern = /[\\w]+\\[(\\w{2})\\]/i;
        for (var i = 0; i < fields.length; i++) {
            if (fields[i] !== \'source\') {

                if (pattern.test(fields[i])) {
                    $(\'input[name="\' + fields[i] + \'"]\').parent().parent().find(\'ul.tabs li[lang=\' + fields[i].match(pattern)[1] + \']\').addClass(\'error\');
                    $(\'input[name="\' + fields[i] + \'"]\').click(function () {
                        $(this).parent().parent().find(\'ul.tabs li[lang=\' + $(this).attr(\'name\').match(pattern)[1] + \']\').removeClass(\'error\');
                    });
                    $(\'textarea[name="\' + fields[i] + \'"]\').parent().parent().parent().find(\'ul.tabs li[lang=\' + fields[i].match(pattern)[1] + \']\').addClass(\'error\');
                    $(\'textarea[name="\' + fields[i] + \'"]\').click(function () {
                        $(this).parent().parent().parent().find(\'ul.tabs li[lang=\' + $(this).attr(\'name\').match(pattern)[1] + \']\').removeClass(\'error\');
                    });
                }

                $(\'input[name="\' + fields[i] + \'"],select[name="\' + fields[i] + \'"]\').addClass(\'error\');
                $(\'input[name="\' + fields[i] + \'"],select[name="\' + fields[i] + \'"]\').focus(function () {
                    $(this).removeClass(\'error\');
                });
            }
        }
    }

    '; ?>

</script>

<!-- dataEntriesImport tpl end -->