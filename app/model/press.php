<?php

function get_breaking_article()
{
    require "../asset/database/news.php";

    foreach( $news_a as $news )
    {
        if( $news['breaking'] )
        {
            return $news;
        }
    }
}

function get_side_article()
{
    require "../asset/database/news.php";

    $outart_a = [];
    foreach( $news_a as $news )
    {
        if( $news['is_on_home'] and ! $news['breaking'] )
        {
            $outart_a[] = $news;
        }
    }
    return $outart_a;
}

/**
 * @param $id l'if de l'article cherché
 * @return array|bool les données de l'article
 */
function get_article($id)
{
    require "../asset/database/news.php";

    foreach( $news_a as $news )
    {
        if( $id == $news['id'] )
        {
            return $news;
        }
    }

    return false;
}
