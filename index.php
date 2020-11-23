<?php

require __DIR__ . '/vendor/autoload.php';
include('./src/controllers/pageController.php');

use cs174\hw4\controllers as C;

$pageController = new C\PageController();
$pageController->render();