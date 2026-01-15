<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:52
         compiled from /home/gmoplus/global.gmoplus.com/plugins/online/admin/statistics_block.tpl */ ?>
<!-- online statistics block -->

<?php echo '
<script>

function aBlockInit()
{
    var onlineLoad = false;
    var key = \'online_block\';
    var func = \'xajax_adminStatistics()\';

    if ($(\'.block div[lang=\' + key + \']\').is(\':visible\')) {
        eval(func);
    }
    else {
        $(\'.block div[lang=\' + key + \']\').prev().find(\'div.collapse\').click(function() {
            if (!onlineLoad) {
                eval(func);
                onlineLoad = true;
            }
        });
    }

    $(\'input#apsblock\\\\\\:\' + key).click(function() {
        if (!onlineLoad && $(this).attr(\'checked\') && $(\'.block div[lang=\' + key + \']\').is(\':visible\')) {
            eval(func);
            onlineLoad = true;
        }
    });
}
aBlockInit();

</script>
'; ?>


<!-- online statistics block end -->