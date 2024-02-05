<?php

function html_breaking_article($art)
{
    $id = $art['id'];
    $image = "illustration".$id.".webp";
    return <<< HTML
        <article class="breaking">
            <a href="?page=article&id=$id">
                <img src="./asset/media_article/$image">
                <h2>{$art['title']}</h2>
                <h4>{$art['hook']}</h4>
            </a>
        </article>
HTML;
}

function html_side_article($art_a)
{
    $html_s = <<< HTML
        <aside>
HTML;
    foreach( $art_a as $art)
    {
        $html_s .= <<< HTML
            <article class="side">
                <h4>{$art['title']}</h4>            
            </article>
HTML;
    }
    $html_s .= <<< HTML
        </aside>
HTML;
    return $html_s;
}

function html_article($art)
{
    $image = "illustration".$art['id'].".webp";
    return <<< HTML
    <main>
        <article class="main_article">
            <h1>{$art['title']}</h1>
            <img src="./asset/media_article/$image">
            <h2>{$art['hook']}</h2>
            <section>{$art['contents']}</section>
        </article>
    </main>
HTML;

}
