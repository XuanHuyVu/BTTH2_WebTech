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

    public function addUser($username, $password, $role){
        $host = "localhost";
        $dbname = "baitapthuchanh2";
        $password = '';
        $username = 'root';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Chuẩn bị câu lệnh SQL để thêm tin tức vào cơ sở dữ liệu
            $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");

            // Gắn giá trị cho các tham số
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }catch (PDOException $e){
        }
    }
}
?>

