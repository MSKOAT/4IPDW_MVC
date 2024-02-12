<?php

function html_favorite($fav_a)
{
    $html = "<ul>";
    foreach($fav_a as $fav)
    {
        $html .= "<li>$fav</li>";
    }
    $html .= "</ul>";
    return $html;
}

