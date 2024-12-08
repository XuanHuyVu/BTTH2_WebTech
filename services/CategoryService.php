<?php
declare(strict_types=1);
require_once __DIR__.'/../models/Category.php';

class CategoryService {
    private ?PDO $pdo = null;

    private function connectCate(): void {
        if ($this->pdo === null) {
            $this->pdo = new PDO('mysql:host=localhost;dbname=newsweb', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
    }

    public function getAllCategories(): array
    {
        try {
            $this->connectCate(); // Ensure connection is established
            $sql = 'SELECT * FROM categories';
            $stmt = $this->pdo->query($sql);
            $categories = $stmt->fetchAll();
            $result = [];
            foreach ($categories as $category) {
                $result[] = new Category((int)$category['id'], $category['name']);
            }
            return $result;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return $result = null;
        } finally {
            $this->pdo = null;
        }
    }
    public function getCategoriesById(int $id): ?News
    {
        $categories = null;
        try {
            $db = $this->connect();
            $sql = 'SELECT * FROM news WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $n = $stmt->fetch();

            if ($n) {
                $categories = new News(
                    (int) $n['id'],
                    $n['name'],
                );
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return $categories;
    }

    public function addCategories(Category $category): void
    {
        try {
            $db = $this->connect();
            $sql = 'INSERT INTO news (name) VALUES (?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $category->getName(),
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    public function updateCategories(Category $category): void
    {
        try {
            $db = $this->connect();
            $sql = 'UPDATE news SET name = ? WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $category->getName(),

            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    public function deleteCategories($id)
    {
        try {
            // Cấu hình kết nối PDO
            $host = 'localhost';
            $dbname = 'newsweb';
            $username = 'root';
            $password = '';

            // Kết nối PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Xóa tin tức trong cơ sở dữ liệu
            $sql = "DELETE FROM categories WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            // Trả về true nếu xóa thành công
            return true;
        } catch (Exception $e) {
            // Nếu có lỗi, trả về false
            return false;
        }
    }
}

