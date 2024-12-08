<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/User.php';


class UserService {
    private function connect(): PDO {
        return new PDO('mysql:host=localhost;dbname=newsweb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getAllUsers(): array {
        $usersList = [];
        try {
            $db = $this->connect();
            $sql = 'SELECT * FROM users';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll();

            foreach ($users as $n) {
                $usersList[] = new User(
                    (int)$n['id'],
                    $n['username'],
                    $n['password'],
                    $n['role'],
                );
            }
        } catch (PDOException $e) {
            // Log the error or handle it gracefully
            error_log($e->getMessage());
        }
        return $usersList;
    }

    public function addUser(user $user): void {
        try {
            $db = $this->connect();
            $sql = 'INSERT INTO users (username, password, role)'
        . ' VALUES (:username, :password, :role)';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $user->getUsername(),
                $user->getPassword(),
                $user->getRole(),
            ]);
        }catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }
    public function deleteUser(user $user): void {
        try {
            $db = $this->connect();
            $sql = 'DELETE FROM users WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                'id' => $user->getId(),
            ]);

        }catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }
}
?>