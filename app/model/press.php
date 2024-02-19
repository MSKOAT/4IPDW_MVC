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


/**
 * retourne tous les données des articles favoris
 * @return array
 */
function get_fav_article($fav_l)
{
    require "../asset/database/news.php";

    $outart_a = [];
    foreach( $news_a as $news )
    {
        if( in_array( $news['id'], $fav_l ) )
        {
            echo "news id : ".$news['id']."<br>";
            var_dump($fav_l);
            $outart_a[] = $news;
        }
    }
    return $outart_a;
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
