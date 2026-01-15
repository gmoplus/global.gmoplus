<?php /* Smarty version 2.6.31, created on 2025-08-09 18:59:40
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/admin/manage_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/manage_item.tpl', 19, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/manage_item.tpl', 30, false),array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/manage_item.tpl', 57, false),)), $this); ?>
<!-- manage format item tpl -->

<form name="<?php echo $this->_tpl_vars['mode']; ?>
-item-form" class="manage-item-form" action="" method="post">
    <table class="form">
    <?php if ($this->_tpl_vars['mode'] == 'edit'): ?>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['key']; ?>
</td>
        <td class="field">
            <input type="text" name="key" style="width: 250px;" maxlength="60" class="disabled" readonly="readonly" />
        </td>
    </tr>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['geo_format_data'] && $this->_tpl_vars['geo_format_data']['Key'] == $this->_tpl_vars['head_level_data']['Key']): ?>
    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['mf_path']; ?>
</td>
        <td class="field">

        <?php if ($this->_tpl_vars['config']['mf_multilingual_path'] && count($this->_tpl_vars['allLangs']) > 1): ?>
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

        <?php $this->assign('system_path_field', 'Path'); ?>

        <?php if ($this->_tpl_vars['config']['mf_multilingual_path']): ?>
            <?php $this->assign('system_path_field', ((is_array($_tmp='Path_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['config']['lang']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['config']['lang']))); ?>
        <?php endif; ?>

        <?php $_from = $this->_tpl_vars['allLangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langF'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langF']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['language']):
        $this->_foreach['langF']['iteration']++;
?>
            <?php $this->assign('path_field', 'Path'); ?>

            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                <?php $this->assign('path_field', ((is_array($_tmp='Path_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['language']['Code']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['language']['Code']))); ?>
            <div class="tab_area<?php if (! ($this->_foreach['langF']['iteration'] <= 1)): ?> hide<?php endif; ?> <?php echo $this->_tpl_vars['language']['Code']; ?>
">
            <?php endif; ?>

            <?php if ($this->_tpl_vars['config']['mf_geo_subdomains']): ?>
                <span class="field_description_noicon" style="padding: 0;"><?php echo ''; ?><?php echo $this->_tpl_vars['domain_info']['scheme']; ?><?php echo '://&nbsp;'; ?><?php if ($this->_tpl_vars['level']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['config']['mf_geo_subdomains_type'] == 'mixed'): ?><?php echo '<span class="parent-path-cont">'; ?><?php if ($this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]['host']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]['host']; ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]['host']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]['host']; ?><?php echo ''; ?><?php endif; ?><?php echo '</span>'; ?><?php elseif ($this->_tpl_vars['config']['mf_geo_subdomains_type'] == 'combined'): ?><?php echo '<span class="parent-path-cont" style="margin-right: 10px;">'; ?><?php if ($this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]): ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']])) ? $this->_run_mod_handler('replace', true, $_tmp, '/', '-') : smarty_modifier_replace($_tmp, '/', '-')); ?><?php echo '-'; ?><?php elseif ($this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]): ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']])) ? $this->_run_mod_handler('replace', true, $_tmp, '/', '-') : smarty_modifier_replace($_tmp, '/', '-')); ?><?php echo '-'; ?><?php endif; ?><?php echo '</span>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (( $this->_tpl_vars['config']['mf_geo_subdomains_type'] == 'mixed' && ! $this->_tpl_vars['level'] ) || $this->_tpl_vars['config']['mf_geo_subdomains_type'] != 'mixed'): ?><?php echo '<input type="text" name="path_'; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '" value="" /><span class="copy-phrase hide"></span>'; ?><?php endif; ?><?php echo '<span '; ?><?php if ($this->_tpl_vars['config']['mf_geo_subdomains_type'] == 'mixed' && $this->_tpl_vars['level']): ?><?php echo 'style="padding: 0;"'; ?><?php endif; ?><?php echo ' class="field_description_noicon">.'; ?><?php echo $this->_tpl_vars['domain_info']['host']; ?><?php echo '</span>'; ?><?php if ($this->_tpl_vars['config']['mf_geo_subdomains_type'] == 'mixed' && $this->_tpl_vars['level']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]['dir']): ?><?php echo '/'; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]['dir']; ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]['dir']): ?><?php echo '/'; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]['dir']; ?><?php echo ''; ?><?php endif; ?><?php echo '/<input type="text" name="path_'; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '" value="" /><span class="copy-phrase hide"></span>'; ?><?php endif; ?><?php echo '/'; ?>
</span>
            <?php else: ?>
                <span class="field_description_noicon" style="padding: 0;"><?php echo ''; ?><?php echo (defined('RL_URL_HOME') ? @RL_URL_HOME : null); ?><?php echo ''; ?><?php if ($this->_tpl_vars['level']): ?><?php echo '<span class="parent-path-cont" style="margin-right: 10px;">'; ?><?php if ($this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['path_field']]; ?><?php echo '/'; ?><?php elseif ($this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]): ?><?php echo ''; ?><?php echo $this->_tpl_vars['parent_path'][$this->_tpl_vars['system_path_field']]; ?><?php echo '/'; ?><?php endif; ?><?php echo '</span>'; ?><?php endif; ?><?php echo '<input type="text" name="path_'; ?><?php echo $this->_tpl_vars['language']['Code']; ?><?php echo '" style="width: 220px;" value="" /><span class="copy-phrase hide"></span>'; ?>
</span>
            <?php endif; ?>

            <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
            </div>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

        </td>
    </tr>
    <?php endif; ?>

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
                <input name="name_<?php echo $this->_tpl_vars['language']['Code']; ?>
" type="text" style="width: 250px;" />
                <?php if (count($this->_tpl_vars['allLangs']) > 1): ?>
                    <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['name']; ?>
 (<b><?php echo $this->_tpl_vars['language']['name']; ?>
</b>)</span>
                </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </td>
    </tr>

    <?php if ($this->_tpl_vars['config']['mf_nearby_distance'] && $this->_tpl_vars['geo_format_data']['Key'] == $this->_tpl_vars['head_level_data']['Key']): ?>
        <tr>
            <td class="name"><?php echo $this->_tpl_vars['lang']['mf_coordinates']; ?>
</td>
            <td class="field">
                <input type="text" name="lat" value="" class="w130" />,<input type="text" name="lng" value="" class="w130" />
            </td>
        </tr>
    <?php endif; ?>

    <tr>
        <td class="name"><?php echo $this->_tpl_vars['lang']['status']; ?>
</td>
        <td class="field">
            <select name="status"<?php if ($this->_tpl_vars['parent_info']['Status'] == 'approval'): ?> disabled="disabled"<?php endif; ?>>
                <option value="active" selected="selected"><?php echo $this->_tpl_vars['lang']['active']; ?>
</option>
                <option value="approval"><?php echo $this->_tpl_vars['lang']['approval']; ?>
</option>
            </select>
            <?php if ($this->_tpl_vars['parent_info']['Status'] == 'approval'): ?>
                <span class="field_description_noicon"><?php echo $this->_tpl_vars['lang']['mf_inactive_parent_status_hint']; ?>
</span>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td class="field">
            <input type="submit" name="item_submit" value="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['mode']]; ?>
" data-phrase="<?php echo $this->_tpl_vars['lang'][$this->_tpl_vars['mode']]; ?>
" />
            <a onclick="$('#<?php echo $this->_tpl_vars['mode']; ?>
_item').slideUp('normal')" href="javascript:void(0)" class="cancel"><?php echo $this->_tpl_vars['lang']['close']; ?>
</a>
        </td>
    </tr>
    </table>
</form>

<!-- manage format item tpl end -->