<?php
declare(strict_types=1);
require_once '../../../services/UserService.php';
require_once '../../../models/User.php';

class UsersController{
    public function indexUser(){
        $userService = new UserService();
        $users = $userService->getAllUsers();

        require_once '../../../views/admin/users/index.php';
        return $users;
    }
}
?>

