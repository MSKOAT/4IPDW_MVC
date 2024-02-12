<?php

function html_image($id)
{
    $image = "illustration".$id.".jpg";
    $image_path = "./asset/media_article/$image";
    $image_html = "";
    if(file_exists($image_path))
    {
        $image_html = <<< HTML
            <img alt="illustration" src="$image_path">
         HTML;
    }
    return $image_html;
}

function html_breaking_article($art)
{
    $image_html = html_image($art['id']);
    return <<< HTML
        <article class="breaking">
            <a href="?page=article&id={$art['id']}">
                $image_html
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
                <a href="?page=article&id={$art['id']}">
                    <h4>{$art['title']}</h4>
                </a>    
                <form action="?page=press" method="get">
                    <button type="submit">
                        ajouter au panier                    
                    </button>
                </form>        
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
    $image_html = html_image($art['id']);
    return <<< HTML
    <main>
        <article class="main_article">
            <h1>{$art['title']}</h1>
            $image_html
            <h2>{$art['hook']}</h2>
            <section>{$art['contents']}</section>
        </article>
    </main>
HTML;

}
