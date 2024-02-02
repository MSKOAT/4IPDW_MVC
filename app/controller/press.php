<?php

function main_press()
{
    // étape 1 : breaking news
    $breaking_art = get_breaking_article();
    $breaking_art_html = html_breaking_article($breaking_art);

    // étape 2 : articles sur le côté
//    $side_art = get_side_article();
//    $side_art_html = html_side_article($side_art);

    return join( "\n", [
        ctrl_head(),
        $breaking_art_html,
        $side_art_html,
        html_foot(),
    ]);
}

