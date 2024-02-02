<?php

function get_breaking_article()
{
    require_once "../asset/database/news.php";

    foreach( $news_a as $news )
    {
        if( $news['breaking'] )
        {
            return $news;
        }
    }
}

