<?php

function main_favorite()
{
    // traitement éventuel des favoris
    $fav_l = ctrl_process_fav_form();

    // étape 3 : articles sur le côté
    $fav_art = get_fav_article($fav_l);
    $side_art_html = html_listing_article( $fav_art, $fav_l, "main", "favorite" );

    return join( "\n", [
        ctrl_head(),
        $side_art_html,
        html_foot(),
    ]);
}

