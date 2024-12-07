<?php
// declare(strict_types=1);
// require_once '../models/User.php';

// class UserService {
//     public function getAllUsers() {
//         try {
//             $db = new PDO('mysql:host=localhost;dbname=newsweb', 'root', '');
//             $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             $sql = 'SELECT * FROM users';
//             $stmt = $db->prepare($sql);
//             $stmt->execute();
//             $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             $usersList = [];
//             foreach ($users as $user) {
//                 $usersList[] = new User($user['id'], $user['username'], $user['password'], $user['role']);
//             }
//             return $usersList;
//         } catch (PDOException $e) {
//             //echo $e->getMessage();
//             return $usersList;
//         }
//     }
// }
?>