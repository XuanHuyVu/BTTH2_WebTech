<?php
declare(strict_types=1);
require_once 'models/User.php';
class AuthController {
    public function login() {
        require_once 'views/auth/login.php';
    }

    public function register() {
        require_once 'views/auth/register.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=home&action=index');
    }

    public function authenticate() {

    }

    public function store() {

    }
}
?>