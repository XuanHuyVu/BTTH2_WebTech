<?php
declare(strict_types=1);
require_once 'models/User.php';
class UserController {
    public function index() {

    }

    public function create() {
        require_once 'views/users/create.php';
    }

    public function update() {
        require_once 'views/users/update.php';
    }

    public function delete() {
        require_once 'views/users/delete.php';
    }

    public function show() {
        require_once 'views/users/show.php';
    }
}
?>