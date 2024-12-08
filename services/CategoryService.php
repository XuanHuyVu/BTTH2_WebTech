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

    public function getAllCategories(): array {
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
            throw new Exception("Unable to fetch categories.");
        } finally {
            $this->pdo = null;
        }
    }
}
?>
