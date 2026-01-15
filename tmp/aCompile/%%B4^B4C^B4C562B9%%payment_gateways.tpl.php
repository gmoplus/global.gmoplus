<?php /* Smarty version 2.6.31, created on 2025-08-20 21:26:02
         compiled from /home/gmoplus/global.gmoplus.com/plugins/bankWireTransfer/admin/payment_gateways.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/gmoplus/global.gmoplus.com/plugins/bankWireTransfer/admin/payment_gateways.tpl', 11, false),array('function', 'fckEditor', '/home/gmoplus/global.gmoplus.com/plugins/bankWireTransfer/admin/payment_gateways.tpl', 21, false),array('function', 'phrase', '/home/gmoplus/global.gmoplus.com/plugins/bankWireTransfer/admin/payment_gateways.tpl', 26, false),)), $this); ?>
<div id="payment_credentials">
    <input type="hidden" name="post_config[bankWireTransfer_payment_details]">

    <?php $_from = $this->_tpl_vars['gateway_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['configItem']):
?>
        <?php if ($this->_tpl_vars['configItem']['Key'] === 'bankWireTransfer_payment_details'): ?>
            <?php $this->assign('paymentCredentials', $this->_tpl_vars['configItem']['Default']); ?>
            <?php break; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

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
        <?php echo $this->_plugins['function']['fckEditor'][0][0]->fckEditor(array('name' => "bwt_payment_details_content_".($this->_tpl_vars['language']['Code']),'width' => '100%','height' => '140','value' => $this->_tpl_vars['paymentCredentials'][$this->_tpl_vars['language']['Code']]), $this);?>

        <?php if (count($this->_tpl_vars['allLangs']) > 1): ?></div><?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <div class="field_description" style="margin-top: 15px;">
        <?php echo $this->_plugins['function']['phrase'][0][0]->getPhrase(array('key' => 'bwt_payment_details_notice','db_check' => true), $this);?>

        (<a href="javascript://" class="bwt-for-example"><?php echo $this->_tpl_vars['lang']['bwt_for_example']; ?>
</a>)
    </div>
</div>
<script>
<?php echo '

var popupPaymentDetails;

var ruLang = \'\';

if (rlLang == \'ru\') {
    ruLang = \'_ru\';
}

$(document).ready(function(){
    $(\'textarea[name="post_config[bankWireTransfer_payment_details]"]\').parent().html($(\'#payment_credentials\'));
    $(\'#bankWireTransfer_payment_details\').attr(\'name\', \'post_config[bankWireTransfer_payment_details]\');
    $(document).on(\'click\', \'.bwt-for-example\', function() {
        bwtloadPopup();
    });
});

var bwtloadPopup = function() {
        var popupContent = $(\'<div>\', {
                class: \'x-hidden\',
                \'id\': \'bwt-for-example\'}
            )
            .append($(\'<div>\', {
                class: \'x-window-body\',
                \'style\': \'padding: 10px 15px\',
                \'align\': \'center\'})
                .append($(\'<img>\', {
                    \'width\': \'650\',
                    \'src\': \''; ?>
<?php echo (defined('RL_PLUGINS_URL') ? @RL_PLUGINS_URL : null); ?>
<?php echo 'bankWireTransfer/static/for_example\' + ruLang + \'.png\'})
                )
            );

    $(\'body\').after(popupContent);

    popupPaymentDetails = new Ext.Window({
        title: \''; ?>
<?php echo $this->_tpl_vars['lang']['bwt_for_example']; ?>
<?php echo '\',
        applyTo: \'bwt-for-example\',
        layout: \'fit\',
        width: 700,
        height: \'auto\',
        plain: true,
        modal: false,
        closable: true,
        closeAction : \'hide\'
    });

    popupPaymentDetails.show();
}

'; ?>

</script>