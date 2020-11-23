<?php

namespace cs174\hw4\views\layouts;

class htmlLayout{
    function htmlLayout($htmlPage)
        {
            ?><!DOCTYPE html>
            <html>
            <head><title>Community Jigsaw</title></head>
            <body>
            <?php
            $htmlPage;
            ?>
            </body>
            
        </html><?php
        }
}