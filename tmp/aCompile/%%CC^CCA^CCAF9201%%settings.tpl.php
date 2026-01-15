<?php /* Smarty version 2.6.31, created on 2025-08-20 18:10:20
         compiled from /home/gmoplus/global.gmoplus.com/plugins/appsManager/admin/settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', '/home/gmoplus/global.gmoplus.com/plugins/appsManager/admin/settings.tpl', 17, false),array('modifier', 'explode', '/home/gmoplus/global.gmoplus.com/plugins/appsManager/admin/settings.tpl', 156, false),array('modifier', 'ceil', '/home/gmoplus/global.gmoplus.com/plugins/appsManager/admin/settings.tpl', 164, false),array('function', 'phrase', '/home/gmoplus/global.gmoplus.com/plugins/appsManager/admin/settings.tpl', 48, false),)), $this); ?>
<!-- App manager custom settings tpl -->
<table class="hide">
    <tr id="app_account_type_settings">
        <td colspan="2">
        <table class="form">
        <?php $_from = $this->_tpl_vars['appAccountTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['aTypeName'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['aTypeName']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['aType']):
        $this->_foreach['aTypeName']['iteration']++;
?>
            <tr <?php if ($this->_foreach['aTypeName']['iteration']%2 != 0): ?> class="highlight"<?php endif; ?>>
                <td class="name" style="width: 210px;">
                    <?php echo $this->_tpl_vars['aType']['name']; ?>

                </td>
                <td class="field">
                    <div class="inner_margin" style="padding-top: 6px;">
                        <label>
                            <input type="radio"
                                   name="app_account_type[<?php echo $this->_tpl_vars['aType']['Key']; ?>
]"
                                   value="1"
                                   <?php if (((is_array($_tmp=$this->_tpl_vars['aType']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['appSelectedAccountTypes']) : in_array($_tmp, $this->_tpl_vars['appSelectedAccountTypes']))): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['yes']; ?>

                        </label>

                        <label>
                            <input type="radio"
                                   name="app_account_type[<?php echo $this->_tpl_vars['aType']['Key']; ?>
]"
                                   value="0"
                                   <?php if (! ((is_array($_tmp=$this->_tpl_vars['aType']['Key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['appSelectedAccountTypes']) : in_array($_tmp, $this->_tpl_vars['appSelectedAccountTypes']))): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['no']; ?>

                        </label>
                    </div>
                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
    </td>
</tr>
</table>


<table class="hide">
    <tr id="app_banners">
        <td colspan="2">
         <table class="form">
            <tr  class="highlight">
                <td class="name" style="width: 210px;">
                    <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'config+name+app_banners_android'), $this);?>

                </td>
                <td class="field">
                    <div class="inner_margin" style="padding-top: 6px;">
                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_android][value]"
                                   value="1"
                                   <?php if ($this->_tpl_vars['config']['app_banners_android']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['yes']; ?>

                        </label>

                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_android][value]"
                                   value="0"
                                   <?php if (! $this->_tpl_vars['config']['app_banners_android']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['no']; ?>

                        </label>
                        
                        <div <?php if (! $this->_tpl_vars['config']['app_banners_android']): ?>class='hide'<?php endif; ?>>
                            <input type="text" value="<?php echo $this->_tpl_vars['config']['app_banners_android_key']; ?>
" name="post_config[app_banners_android_key][value]">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="name" style="width: 210px;">
                    <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'config+name+app_banners_ios'), $this);?>

                </td>
                <td class="field">
                    <div class="inner_margin" style="padding-top: 6px;">
                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_ios][value]"
                                   value="1"
                                   <?php if ($this->_tpl_vars['config']['app_banners_ios']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['yes']; ?>

                        </label>

                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_ios][value]"
                                   value="0"
                                   <?php if (! $this->_tpl_vars['config']['app_banners_ios']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['no']; ?>

                        </label>
                        
                        <div <?php if (! $this->_tpl_vars['config']['app_banners_ios']): ?>class='hide'<?php endif; ?>>
                            <input type="text" value="<?php echo $this->_tpl_vars['config']['app_banners_ios_key']; ?>
" name="post_config[app_banners_ios_key][value]">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="highlight">
                <td class="name" style="width: 210px;">
                    <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'config+name+app_banners_in_grid'), $this);?>

                </td>
                <td class="field">
                    <div class="inner_margin" style="padding-top: 6px;">
                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_in_grid][value]"
                                   value="1"
                                   <?php if ($this->_tpl_vars['config']['app_banners_in_grid']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['yes']; ?>

                        </label>

                        <label>
                            <input type="radio"
                                   name="post_config[app_banners_in_grid][value]"
                                   value="0"
                                   <?php if (! $this->_tpl_vars['config']['app_banners_in_grid']): ?>
                                   checked="checked"
                                   <?php endif; ?> />
                            <?php echo $this->_tpl_vars['lang']['no']; ?>

                        </label>
                        <div <?php if (! $this->_tpl_vars['config']['app_banners_in_grid']): ?>class='hide'<?php endif; ?>>
                            <select name="post_config[app_banners_in_grid_interation][value]" >
                                <?php unset($this->_sections['column_numbers']);
$this->_sections['column_numbers']['name'] = 'column_numbers';
$this->_sections['column_numbers']['start'] = (int)3;
$this->_sections['column_numbers']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['column_numbers']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['column_numbers']['show'] = true;
$this->_sections['column_numbers']['max'] = $this->_sections['column_numbers']['loop'];
if ($this->_sections['column_numbers']['start'] < 0)
    $this->_sections['column_numbers']['start'] = max($this->_sections['column_numbers']['step'] > 0 ? 0 : -1, $this->_sections['column_numbers']['loop'] + $this->_sections['column_numbers']['start']);
else
    $this->_sections['column_numbers']['start'] = min($this->_sections['column_numbers']['start'], $this->_sections['column_numbers']['step'] > 0 ? $this->_sections['column_numbers']['loop'] : $this->_sections['column_numbers']['loop']-1);
if ($this->_sections['column_numbers']['show']) {
    $this->_sections['column_numbers']['total'] = min(ceil(($this->_sections['column_numbers']['step'] > 0 ? $this->_sections['column_numbers']['loop'] - $this->_sections['column_numbers']['start'] : $this->_sections['column_numbers']['start']+1)/abs($this->_sections['column_numbers']['step'])), $this->_sections['column_numbers']['max']);
    if ($this->_sections['column_numbers']['total'] == 0)
        $this->_sections['column_numbers']['show'] = false;
} else
    $this->_sections['column_numbers']['total'] = 0;
if ($this->_sections['column_numbers']['show']):

            for ($this->_sections['column_numbers']['index'] = $this->_sections['column_numbers']['start'], $this->_sections['column_numbers']['iteration'] = 1;
                 $this->_sections['column_numbers']['iteration'] <= $this->_sections['column_numbers']['total'];
                 $this->_sections['column_numbers']['index'] += $this->_sections['column_numbers']['step'], $this->_sections['column_numbers']['iteration']++):
$this->_sections['column_numbers']['rownum'] = $this->_sections['column_numbers']['iteration'];
$this->_sections['column_numbers']['index_prev'] = $this->_sections['column_numbers']['index'] - $this->_sections['column_numbers']['step'];
$this->_sections['column_numbers']['index_next'] = $this->_sections['column_numbers']['index'] + $this->_sections['column_numbers']['step'];
$this->_sections['column_numbers']['first']      = ($this->_sections['column_numbers']['iteration'] == 1);
$this->_sections['column_numbers']['last']       = ($this->_sections['column_numbers']['iteration'] == $this->_sections['column_numbers']['total']);
?>
                                    <?php $this->assign('column_number', $this->_sections['column_numbers']['index']); ?>
                                    <option value="<?php echo $this->_tpl_vars['column_number']; ?>
" <?php if ($this->_tpl_vars['config']['app_banners_in_grid_interation'] == $this->_tpl_vars['column_number']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['column_number']; ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="name" style="width: 210px;">
                    <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'config+name+app_banners_pages'), $this);?>

                </td>
                <td class="field">
                   <fieldset class="light">
                        <?php $this->assign('pages_phrase', 'admin_controllers+name+pages'); ?>
                        <legend id="legend_pages" class="up"><?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['pages_phrase']]; ?>
</legend>
                        <div id="pages">
                            <div id="pages_cont" >
                                <?php $this->assign('appPostPages', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['config']['app_banners_pages']) : explode($_tmp, $this->_tpl_vars['config']['app_banners_pages']))); ?>
                                <table class="sTable" style="margin-bottom: 15px;">
                                <tr>
                                    <td valign="top">
                                    <?php $_from = $this->_tpl_vars['appPages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pagesF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pagesF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['page']):
        $this->_foreach['pagesF']['iteration']++;
?>
                                    <div style="padding: 2px 8px;">
                                        <label class="cLabel" for="page_<?php echo $this->_tpl_vars['key']; ?>
" ><input class="checkbox " <?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['appPostPages']) : in_array($_tmp, $this->_tpl_vars['appPostPages']))): ?>checked="checked"<?php endif; ?> id="page_<?php echo $this->_tpl_vars['key']; ?>
" type="checkbox" name="app_banners_pages[]" value="<?php echo $this->_tpl_vars['key']; ?>
" /> <?php echo $this->_tpl_vars['page']; ?>
</label>
                                    </div>
                                    <?php $this->assign('perCol', ((is_array($_tmp=$this->_foreach['pagesF']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>

                                    <?php if ($this->_foreach['pagesF']['iteration'] % $this->_tpl_vars['perCol'] == 0): ?>
                                        </td>
                                        <td valign="top">
                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </td>
                                </tr>
                                </table>
                            </div>

                            <div class="grey_area" style="margin: 0 0 5px;">
                                <span id="pages_nav" <?php if ($this->_tpl_vars['sPost']['show_on_all']): ?>class="hide"<?php endif; ?>>
                                    <span onclick="$('#pages_cont input').prop('checked', true);" class="green_10"><?php echo $this->_tpl_vars['lang']['check_all']; ?>
</span>
                                    <span class="divider"> | </span>
                                    <span onclick="$('#pages_cont input').prop('checked', false);" class="green_10"><?php echo $this->_tpl_vars['lang']['uncheck_all']; ?>
</span>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <script type="text/javascript">
                    <?php echo '

                    $(document).ready(function(){
                        $(\'#legend_pages\').click(function(){
                            fieldset_action(\'pages\');
                        });

                        $(\'input#show_on_all\').click(function(){
                            $(\'#pages_cont\').slideToggle();
                            $(\'#pages_nav\').fadeToggle();
                        });
                    });

                    '; ?>

                    </script>
                </td>
            </tr>
         </table>
        </td>
    </tr>
</table>

<script>
<?php echo '

$(function(){
    var $containerItems = $(\'#app_account_type_settings\');
    var $container = $(\'input[name="post_config[app_account_types][value]"]\').closest(\'tr\');
    $container.after($containerItems);
    $container.hide();

    var $containerBItems = $(\'#app_banners\');
    var $containerB = $(\'input[name="post_config[app_banners_provider][value]"]\').closest(\'tr\');
    $containerB.after($containerBItems);
    
    $containerBItems.find(\'input[type=radio]\').change(function(){
        var is_checked = parseInt($(this).filter(\':checked\').val());
        var $containerTmp = $(this).closest(\'div\');
        $containerTmp.find(\'div\')[is_checked ? \'removeClass\' : \'addClass\'](\'hide\');
    })
});
'; ?>

</script>

<!-- App manager custom settings tpl end -->