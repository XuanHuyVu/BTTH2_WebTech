<?php
class AuthService {
    private $pdo;

    public function __construct() {
        // Kết nối cơ sở dữ liệu
        $this->pdo = new PDO('mysql:host=localhost;dbname=newsweb', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function login($username, $password) {
        $sql = "SELECT id, role FROM users WHERE username = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin người dùng
    }
}
?>
