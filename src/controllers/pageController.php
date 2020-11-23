<?php

namespace cs174\hw4\controllers;

require_once('./src/views/homePage.php');
require_once('./src/views/jigsawPage.php');
require_once('./src/views/layouts/htmlLayout.php');

use cs174\hw4\views as V;

class PageController {
    private $htmlLayout;
    private $view;

    public function render() {
        $this->htmlLayout = new \cs174\hw4\views\layouts\HtmlLayout();

        if(isset($_POST["a"])) {
            $action = $_POST["a"];
            switch($action) {
                case "addJigsaw":
                    $this->view = new V\JigsawPage();
                    $this->htmlLayout->htmllayout($this->view->renderJigsaw());
                    break;
            }
        }
        else {
            $this->view = new V\HomePage();
            $this->htmlLayout = new \cs174\hw4\views\layouts\HtmlLayout();
            $this->htmlLayout->htmlLayout($this->view->renderHome());
        }
        

    }
}