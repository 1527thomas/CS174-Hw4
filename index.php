<?php

require __DIR__ . '/vendor/autoload.php';
include('./src/controllers/pageController.php');
include('./src/controllers/uploadController.php');
use cs174\hw4\controllers as C;

$uploadController = new cs174\hw4\controllers\UploadController();
$uploadController->uploadController();

$pageController = new C\PageController();
$pageController->render();