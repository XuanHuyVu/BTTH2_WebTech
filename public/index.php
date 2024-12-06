<?php
declare(strict_types=1);
require_once '../controllers/HomeController.php';
require_once '../controllers/NewsController.php';

$homeController = new HomeController();
$homeController->index();

// $newsController = new NewsController();
// $newsController->index();