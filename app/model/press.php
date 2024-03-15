<?php
require_once "../asset/config/model.php";

/**
 * create and return PDO object
 * @return mixed|PDO
 */
function get_pdo()
{
    static $pdo;

    if( ! isset($pdo))
    {
        $pdo = new PDO( DSN, DATABASE_USERNAME, DATABASE_PASSWORD );
        $pdo->query("set names UTF8");
    }

    return $pdo;
}

function get_breaking_article()
{
    switch(DATABASE_TYPE) {
        case "csv":
            require "../asset/database/news.php";
            foreach( $news_a as $news )
            {
                if( $news['breaking'] )
                {
                    return $news;
                }
            }
            break;

        case "MySql":
            // Establishing Connection with Database
            $pdo = get_pdo();
            // on choisit un article au hasard
            $ident = rand(0,2924);
            $sql = <<< SQL
                SELECT 
                    ident_art AS id,
                    title_art AS title,
                    hook_art AS hook,
                    image_art AS image_name
                FROM `t_article` 
                WHERE ident_art=$ident;
SQL;
            $stmt = $pdo->query($sql);
            $row = $stmt->fetch();
            return $row;
            break;
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
    switch(DATABASE_TYPE) {
        case "csv":
            require "../asset/database/news.php";
            $outart_a = [];
            foreach ($news_a as $news) {
                if ($news['is_on_home'] and !$news['breaking']) {
                    $outart_a[] = $news;
                }
            }
            return $outart_a;
            break;
        case "MySql":
            // Establishing Connection with Database
            $pdo = get_pdo();
            $sql = <<< SQL
                SELECT 
                    ident_art AS id,
                    title_art AS title
                FROM `t_article` 
                WHERE `date_art` BETWEEN '2023-12-31 00:00:00' AND '2023-12-31 23:59:59'
                LIMIT 5;
SQL;
            $stmt = $pdo->query($sql);
            $outart_a = $stmt->fetchAll();
            return $outart_a;
            break;
    }
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
