<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/cookiesPolicy/admin/js.tpl */ ?>
<!-- cookiesPolicy javascript on settings page -->

<script>
<?php echo '

$(document).ready(function(){
    var $select = $(\'select[name="post_config[cookiesPolicy_view][value]"]\');
    var onChangeView = function(){
        $(\'[name="post_config[cookiesPolicy_position][value]"],[name="post_config[cookiesPolicy_hide_icon][value]"],[name="post_config[cookiesPolicy_redirect_url][value]"]\').closest(\'tr\')[
            $select.val() == \'banner\' ? \'hide\' : \'show\'
        ]();
    }

    onChangeView();

    $select.change(function(){
        onChangeView();
    });
});

'; ?>

</script>

<!-- cookiesPolicy javascript on settings page end -->