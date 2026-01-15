<?php /* Smarty version 2.6.31, created on 2025-07-28 09:44:55
         compiled from /home/gmoplus/global.gmoplus.com/plugins/sitemap/admin/view/settings.tpl */ ?>
<!-- Settings handler of the Sitemap plugin tpl -->

<script><?php echo '
    let $sitemapRobotsField = $(\'[name="post_config[sm_robots_tag][value]"]\');

    $(function() {
        sitemapRobotsFieldHandler($sitemapRobotsField.filter(\':checked\').val());

        $sitemapRobotsField.change(function() {
            sitemapRobotsFieldHandler($sitemapRobotsField.filter(\':checked\').val());
        });
    });

    /**
     * Enable/disable option "Tag value for category page without ads"
     */
    const sitemapRobotsFieldHandler = function(value) {
        let $noIndexTag = $(\'[name="post_config[sm_robots_noindex][value]"]\');

        $noIndexTag[value === \'0\' ? \'addClass\' : \'removeClass\'](\'disabled\');
        $noIndexTag.prop(\'disabled\', value === \'0\' ? true : false);
    }
'; ?>
</script>

<!-- Settings handler of the Sitemap plugin tpl end -->