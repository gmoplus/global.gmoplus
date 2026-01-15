<!-- TAMI Configuration Page -->

{if $smarty.const.RL_LANG_DIR == 'ltr'}
    {assign var='side' value='left'}
{else}
    {assign var='side' value='right'}
{/if}

<!-- Header -->
<div id="nav_bar">
    {include file="blocks"$smarty.const.RL_DS|cat:"admin_navbar.tpl"}
</div>

<!-- Content -->
<div id="content">
    <div class="contentHeader">
        <img src="{$rlTplBase}img/ext/plugin.png" class="icon" />
        <span class="title">{$lang.tami_module}</span>
    </div>

    <!-- Configuration Form -->
    <form method="post" action="">
        <table class="form">
            <tr>
                <td class="name">
                    <span class="red">*</span>{$lang.tami_merchant_id}
                </td>
                <td class="field">
                    <input type="text" name="config[tami_merchant_id]" value="{$config.tami_merchant_id|default:'77013594'}" class="w350" />
                    <div class="hint">{$lang.tami_merchant_id_hint}</div>
                </td>
            </tr>
            
            <tr>
                <td class="name">
                    <span class="red">*</span>{$lang.tami_merchant_key}
                </td>
                <td class="field">
                    <input type="text" name="config[tami_merchant_key]" value="{$config.tami_merchant_key|default:'86af9ca6-03c5-4ab0-9ca9-16473f48a2f8'}" class="w350" />
                    <div class="hint">{$lang.tami_merchant_key_hint}</div>
                </td>
            </tr>
            
            <tr>
                <td class="name">
                    <span class="red">*</span>{$lang.tami_user_code}
                </td>
                <td class="field">
                    <input type="text" name="config[tami_user_code]" value="{$config.tami_user_code|default:'84013596'}" class="w350" />
                    <div class="hint">{$lang.tami_user_code_hint}</div>
                </td>
            </tr>
            
            <tr>
                <td class="name">{$lang.tami_test_mode}</td>
                <td class="field">
                    <select name="config[tami_test_mode]" class="w350">
                        <option value="false" {if $config.tami_test_mode == 'false'}selected="selected"{/if}>{$lang.no}</option>
                        <option value="true" {if $config.tami_test_mode == 'true'}selected="selected"{/if}>{$lang.yes}</option>
                    </select>
                    <div class="hint">{$lang.tami_test_mode_hint}</div>
                </td>
            </tr>
            
            <tr>
                <td class="name">{$lang.tami_payment_method}</td>
                <td class="field">
                    <select name="config[tami_payment_method]" class="w350">
                        <option value="hosted" {if $config.tami_payment_method == 'hosted'}selected="selected"{/if}>{$lang.tami_hosted_payment}</option>
                        <option value="direct" {if $config.tami_payment_method == 'direct'}selected="selected"{/if}>{$lang.tami_direct_api}</option>
                    </select>
                    <div class="hint">{$lang.tami_payment_method_hint}</div>
                </td>
            </tr>
            
            <tr>
                <td class="name">{$lang.tami_auto_detect_turkey}</td>
                <td class="field">
                    <select name="config[tami_auto_detect_turkey]" class="w350">
                        <option value="false" {if $config.tami_auto_detect_turkey == 'false'}selected="selected"{/if}>{$lang.no}</option>
                        <option value="true" {if $config.tami_auto_detect_turkey == 'true'}selected="selected"{/if}>{$lang.yes}</option>
                    </select>
                    <div class="hint">{$lang.tami_auto_detect_turkey_hint}</div>
                </td>
            </tr>
        </table>
        
        <div class="grey_area" style="margin: 20px 0;">
            <div class="center">
                <input type="submit" name="save" value="{$lang.save}" class="button" />
                <input type="submit" name="test_connection" value="{$lang.tami_test_connection}" class="button" />
            </div>
        </div>
    </form>
    
    <!-- Information Box -->
    <div class="notice_box">
        <h3>{$lang.tami_setup_guide}</h3>
        <ol>
            <li><strong>{$lang.tami_step1}:</strong> {$lang.tami_step1_desc}</li>
            <li><strong>{$lang.tami_step2}:</strong> {$lang.tami_step2_desc}</li>
            <li><strong>{$lang.tami_step3}:</strong> {$lang.tami_step3_desc}</li>
            <li><strong>{$lang.tami_step4}:</strong> {$lang.tami_step4_desc}</li>
        </ol>
        
        <h4>{$lang.tami_callback_urls}</h4>
        <ul>
            <li><strong>{$lang.tami_success_url}:</strong> <code>{$smarty.const.RL_URL_HOME}plugins/tami/success.php</code></li>
            <li><strong>{$lang.tami_fail_url}:</strong> <code>{$smarty.const.RL_URL_HOME}plugins/tami/fail.php</code></li>
            <li><strong>{$lang.tami_return_url}:</strong> <code>{$smarty.const.RL_URL_HOME}plugins/tami/return.php</code></li>
        </ul>
    </div>
</div> 