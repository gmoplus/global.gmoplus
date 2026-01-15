<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/street_view/admin/js.tpl */ ?>
<!-- StreeView javascript on settings page -->

<script>
<?php echo '

(function(){
    var $provider  = $(\'select[name="post_config[street_view_provider][value]"]\');
    var $googleRow = $(\'[name="post_config[street_view_google_key][value]"]\').closest(\'tr\');
    var $yandexRow = $(\'[name="post_config[street_view_yandex_key][value]"]\').closest(\'tr\');

    var streetViewHandler = function(){
        if ($provider.val() == \'google\') {
            $yandexRow.hide();
            $googleRow.show();
        } else {
            $googleRow.hide();
            $yandexRow.show();
        }
    }

    $provider.change(function(){
        streetViewHandler();
    });

    streetViewHandler();
})();

'; ?>

</script>

<!-- StreeView javascript on settings page end -->