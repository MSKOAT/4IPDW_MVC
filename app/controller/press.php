<?php

function main_press()
{
    // unset($_SESSION['favorite']);

    // traitement éventuel des favoris
    if(empty($_SESSION['favorite'])) $_SESSION['favorite'] = array();
    if(isset($_GET['add_favorite']))
    {
        // on ajoute un article aux favoris
        $_SESSION['favorite'][] = $_GET["art_id"];
    }
    elseif (isset($_GET['del_favorite']))
    {
        foreach( $_SESSION['favorite'] as $i =>  $fav )
        {
            if( $fav == $_GET["art_id"] )
            {
                unset($_SESSION['favorite'][$i]);
            }
        }
    }
    $_SESSION['favorite'] = array_unique($_SESSION['favorite']);

    // étape 2 : breaking news
    $breaking_art = get_breaking_article();
    $breaking_art_html = html_breaking_article($breaking_art);

    // étape 3 : articles sur le côté
    $side_art = get_side_article();
    $side_art_html = html_side_article($side_art, $_SESSION['favorite']);

    return join( "\n", [
        ctrl_head(),
        $breaking_art_html,
        $side_art_html,
        html_foot(),
    ]);
}

