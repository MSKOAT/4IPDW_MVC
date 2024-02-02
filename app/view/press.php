<?php

function html_breaking_article($art)
{
    return <<< HTML
        <div class="breaking">
            {$art['title']}        
        </div>
HTML;
}

