<!-- news block tpl -->

{if !empty($all_news)}
    <svg class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        {include file='../img/svg/view.svg'}
    </svg>

    {assign var='column_class' value='col-md-4'}

    {if $block.Side == 'middle_left' || $block.Side == 'middle_right'}
        {assign var='column_class' value='col-lg-12'}
    {elseif $block.Side == 'left'}
        {assign var='column_class' value='col-md-4 col-lg-12'}
    {/if}

    <div class="row">
    {foreach from=$all_news item='news_item'}
        {include file=$controllerDir|cat:'news/article.tpl'
                 article=$news_item
                 columnClass=$column_class
                 contentLimit=$config.news_block_content_length
                 boxMode=true}
    {/foreach}
    </div>

    <div class="text-center">
        {* WordPress Bridge aktifse "Hepsini Göster" linki *}
        {if $smarty.const.RL_WORDPRESS_BRIDGE_ENABLED && ($block.Side == 'middle' || $block.Side == 'content')}
            {* Ana sayfa tam genişlik bloğu - "Tümünü Göster" *}
            <a title="Tümünü Göster" class="button w-100 all-news-button" href="{pageUrl key='news' add_url='showall=all'}">
                <i class="fa fa-list"></i> Tümünü Göster ({$all_news|@count} Blog)
            </a>
        {elseif $smarty.const.RL_WORDPRESS_BRIDGE_ENABLED && $block.Category_ID}
            {* Kategori bazlı "Hepsini Göster" *}
            <a title="Hepsini Göster" class="button w-100 all-news-button" href="{pageUrl key='news' add_url="showall=1&category=`$block.Category_Slug`"}">
                <i class="fa fa-eye"></i> Hepsini Göster
            </a>
        {else}
            {* Standart "Tüm Haberler" linki *}
            <a title="{$lang.all_news}" class="button w-100 all-news-button" href="{pageUrl key='news'}">{$lang.all_news}</a>
        {/if}
    </div>
{else}
    {$lang.no_news}
{/if}

<!-- news block tpl end -->
