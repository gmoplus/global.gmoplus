<?php /* Smarty version 2.6.31, created on 2025-10-17 19:56:56
         compiled from /home/gmoplus/global.gmoplus.com/plugins/ipgeo/admin/ipgeo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'version_compare', '/home/gmoplus/global.gmoplus.com/plugins/ipgeo/admin/ipgeo.tpl', 39, false),array('modifier', 'replace', '/home/gmoplus/global.gmoplus.com/plugins/ipgeo/admin/ipgeo.tpl', 61, false),array('modifier', 'cat', '/home/gmoplus/global.gmoplus.com/plugins/ipgeo/admin/ipgeo.tpl', 66, false),)), $this); ?>
<!-- ipgeo tpl -->

<style><?php echo '
.ipgeo-p {
    font-size: 14px;
    line-height: 20px;
}
.ipgeo .red {
    font-size: 14px;
}
.ipgeo .loading-interface {
    border-top: 1px #cccccc solid;
    margin-top: 10px;
    padding-top: 18px;
    display: none;
}
.ipgeo .progress-bar {
    max-width: 600px;
    height: 5px;
    background: #e2e2e2;
    margin: 10px 0;
}
.ipgeo .progress-bar > div {
    height: 100%;
    width: 0;
    background: #748645;
    transition: width 0.2s ease;
}
.ipgeo .progress-error-message {
    margin-top: 15px;
    display: none;
}
.ipgeo .progress-error-message > li:not(:first-child) {
    padding-top: 2px;
}
'; ?>
</style>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'blocks/m_block_start.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('compared_version', ((is_array($_tmp=$this->_tpl_vars['config']['ipgeo_database_version'])) ? $this->_run_mod_handler('version_compare', true, $_tmp, '1.0.0') : version_compare($_tmp, '1.0.0'))); ?>

<div class="ipgeo">
    <p class="ipgeo-p">
        <?php if ($this->_tpl_vars['compared_version'] < 0): ?>
            <?php echo $this->_tpl_vars['lang']['ipgeo_remote_install_text']; ?>

        <?php else: ?>
            <?php echo $this->_tpl_vars['lang']['ipgeo_remote_update_text']; ?>

        <?php endif; ?>
    </p>

    <?php $this->assign('replace_var', ('{')."percent".('}')); ?>

    <div>
        <input id="install_database"
                <?php if ($this->_tpl_vars['compared_version'] >= 0): ?> accesskey="update"<?php endif; ?>
                type="button"
                value="<?php if ($this->_tpl_vars['compared_version'] < 0): ?><?php echo $this->_tpl_vars['lang']['install']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['update']; ?>
<?php endif; ?>" />
    </div>
    <div class="loading-interface">
        <div class="progress"><?php echo $this->_tpl_vars['lang']['ipgeo_preparing']; ?>
</div>
        <div class="progress-bar"><div></div></div>
        <div class="progress-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['lang']['ipgeo_remote_update_status'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['replace_var'], '<span>0</span>') : smarty_modifier_replace($_tmp, $this->_tpl_vars['replace_var'], '<span>0</span>')); ?>
</div>
        <ul class="progress-error-message red"></ul>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp='blocks')) ? $this->_run_mod_handler('cat', true, $_tmp, (defined('RL_DS') ? @RL_DS : null)) : smarty_modifier_cat($_tmp, (defined('RL_DS') ? @RL_DS : null))))) ? $this->_run_mod_handler('cat', true, $_tmp, 'm_block_end.tpl') : smarty_modifier_cat($_tmp, 'm_block_end.tpl')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script><?php echo '
$(function() {
    let $loadingInterface      = $(\'.ipgeo .loading-interface\');
    let $progressBar           = $loadingInterface.find(\'.progress-bar > div\'),
        $errorArea             = $loadingInterface.find(\'.progress-error-message\'),
        $progressDump          = $loadingInterface.find(\'.progress\'),
        $progressInfo          = $loadingInterface.find(\'.progress-info > span\'),
        currentFile            = 0,
        totalFiles             = 0,
        inProgress             = false,
        failTimeout            = 60000, // 60 seconds
        failRequest            = 0,     // Count of the failed requests
        failRequestCountToStop = 15;

    $.ajaxSetup({cache: false});

    var ipGeoDownloadFile = function() {
        $.getJSON(rlConfig.ajax_url, {item: \'ipGeoDownloadFile\', file: currentFile}, function(response) {
            if (response.error) {
                if (response.retry && failRequest < failRequestCountToStop) {
                    failRequest++;
                    setTimeout(function() { ipGeoDownloadFile(); }, failTimeout);
                } else {
                    ipGeoError(lang.ipgeo_too_many_failed_requests);
                }
            } else if (response.status === \'OK\') {
                if (response.action === \'next_file\') {
                    currentFile++;
                    $progressDump.text(
                        lang.ipgeo_file_download_info.replace(\'{files}\', totalFiles).replace(\'{file}\', currentFile)
                    );
                    response.progress = response.progress > 100 ? 100 : response.progress;
                    $progressBar.width(response.progress + \'%\');
                    $progressInfo.text(response.progress);

                    ipGeoDownloadFile();
                } else if (response.action === \'end\') {
                    $progressBar.width(\'100%\');
                    $progressInfo.text(100);

                    inProgress = false;
                    printMessage(\'notice\', lang.ipgeo_import_completed);
                    $progressDump.text(lang.ipgeo_import_completed);
                }
            } else {
                ipGeoError(response.data);
            }
        });
    }

    var ipGeoError = function(data) {
        $errorArea.append($(\'<li>\').text(data)).show();
        $progressBar.css(\'width\', \'0\');
        inProgress = false;
    }

    $(\'#install_database\').click(function() {
        if ($(this).attr(\'accesskey\') === \'update\') {
            $(this).val(lang.loading);
            var self = this;

            $.getJSON(rlConfig.ajax_url, {item: \'ipgeoCheckUpdate\'}, function(response) {
                if (response.data === \'NO\') {
                    $(self).val(lang.update);
                    printMessage(\'notice\', lang.ipgeo_db_uptodate);
                } else {
                    $(self).removeAttr(\'accesskey\');
                    $(self).trigger(\'click\');
                }
            });
        }
        // import mode
        else {
            $(this).parent().fadeOut(function() {
                $loadingInterface.fadeIn(function() {
                    $.getJSON(rlConfig.ajax_url, {item: \'ipGeoPrepare\'}, function(response) {
                        if (response.status === \'OK\') {
                            inProgress = true;
                            totalFiles = response.data.calc;
                            $progressDump.text(
                                lang.ipgeo_file_download_info
                                    .replace(\'{files}\', totalFiles)
                                    .replace(\'{file}\', currentFile)
                            );
                            ipGeoDownloadFile();
                        } else {
                            ipGeoError(response.data);
                        }
                    });
                });
            });
        }
    });

    $(window).bind(\'beforeunload\', function() {
        if (inProgress) {
            return \'Uploading the data is in process; closing the page will stop the process.\';
        }
    });
});
'; ?>
</script>

<!-- ipgeo tpl end -->