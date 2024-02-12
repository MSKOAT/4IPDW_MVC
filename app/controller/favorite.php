<?php

function main_favorite()
{
    return join( "\n", [
        ctrl_head(),
        html_favorite($_SESSION['favorite']),
        html_foot(),
    ]);
}