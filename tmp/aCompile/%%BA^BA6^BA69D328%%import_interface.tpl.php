<?php /* Smarty version 2.6.31, created on 2025-08-09 18:59:40
         compiled from /home/gmoplus/global.gmoplus.com/plugins/multiField/admin/import_interface.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', '/home/gmoplus/global.gmoplus.com/plugins/multiField/admin/import_interface.tpl', 44, false),)), $this); ?>
<!-- import interface -->
<div class="x-hidden" id="statistic">
    <div class="x-window-header"><?php echo $this->_tpl_vars['lang']['mf_refresh_in_progress']; ?>
</div>
    <div class="x-window-body" style="padding: 10px 15px;">
        <table class="importing">
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['mf_importing']; ?>
:
            </td>
            <td class="value">
                <span id="current">1</span> of <label id="total"></label>
            </td>
        </tr>
        <tr>
            <td class="name">
                <?php echo $this->_tpl_vars['lang']['mf_import_current']; ?>
:
            </td>
            <td class="value">
                <span id="current_text"></span>
            </td>
        </tr>
        </table>
                
        <table class="sTable">
        <tr>
            <td>
                <div class="progress">
                    <div id="processing"></div>
                </div>
            </td>
            <td class="counter">
                <div id="loading_percent" class="hide">0%</div>
            </td>
        </tr>
        </table>

        <div id="dom_area">
            <table class="importing">
            <tr>
                <td class="name">
                    <?php echo $this->_tpl_vars['lang']['mf_import_subprogress']; ?>
:
                </td>
                <td class="value">
                    <label id="sub_importing"><?php echo smarty_function_math(array('x' => $this->_tpl_vars['config']['mf_import_completed'],'y' => 1,'equation' => "x+y",'assign' => 'startpos'), $this);?>
<?php echo $this->_tpl_vars['startpos']; ?>
</label>
                </td>
            </tr>
            </table>
        </div>

        <table class="sTable">
        <tr>
            <td>
                <div class="sub_progress">
                    <div id="sub_processing"></div>
                </div>
            </td>
            <td class="counter">
                <div id="sub_loading_percent" class="hide">0%</div>
            </td>
        </tr>
        </table>
    </div>
</div>

<!-- import interface end -->