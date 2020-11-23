<?php

namespace cs174\hw4\controllers;

require_once('./src/views/layouts/htmlLayout.php');
require_once('./src/views/homePage.php');

use cs174\hw4\views as V;

class PageController {
    private $htmlLayout;

    public function render() {
        $this->htmlLayout = new \cs174\hw4\views\layouts\htmlLayout();
        $this->view = new V\homePage();
        $this->htmlLayout->htmlLayout($this->view->renderHome());
    }
}