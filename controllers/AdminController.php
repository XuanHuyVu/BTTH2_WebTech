<?php
declare(strict_types=1);
require '../../services/NewsService.php';
class AdminController {
    public function indexAdmin() {
        //Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        //Render dữ liệu ra dashboard
        require_once '../../views/admin/dashboard.php';
        return $newsList;
    }
}