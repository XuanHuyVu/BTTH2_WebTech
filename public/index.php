<?php
declare(strict_types=1);
require_once '../services/UserService.php';

$userService = new UserService();
$users = $userService->getAllUsers();

echo "<pre>";
print_r($users);
echo "</pre>";