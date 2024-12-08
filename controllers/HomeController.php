<?php
declare(strict_types=1);
require_once '../services/NewsService.php';
class HomeController {
    public function indexHome() {
        //Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        //Render dữ liệu ra HomePage
        require_once '../public/index.php';
        return $newsList;
    }
}