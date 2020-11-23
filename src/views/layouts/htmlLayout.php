<?php

namespace cs174\hw4\views\layouts;

class HtmlLayout{
    function htmlLayout($htmlPage)
        {
            ?>
            <!DOCTYPE html >
            <html lang="en">
            <head>
                <title>Community Jigsaw</title>
                <link rel="stylesheet" href="./src/css/styles.css"></link>
            </head>
            <body>
            <?php
                $htmlPage;
            ?>
            </body>
            <script src="./src/js/script.js"></script>
            </html>
            <?php
        }
}