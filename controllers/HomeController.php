<?php
declare(strict_types=1);
require_once '../services/UserService.php';
class HomeController {
    public function index() {
        //Gọi dữ liệu từ UserService
        $userService = new UserService();
        $users = $userService->getAllUsers();
        //Render dữ liệu ra HomePage
        require_once 'views/home/index.php';
    }
}