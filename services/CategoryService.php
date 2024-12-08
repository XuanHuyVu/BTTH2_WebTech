<?php
declare(strict_types=1);
require_once __DIR__.'/../models/Category.php';
class CategoryService{

    private function connect(): PDO {
        return new PDO('mysql:host=localhost;dbname=newsweb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function getAllCategories(): array
    {
        try {
            $db = $this->connect();
            $sql = "SELECT * FROM categories";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $category = [];
            foreach ($result as $a) {
                $category[] = new Category((int)$a['id'], $a['name']);
            }
            return $category;
        }
        catch(PDOException $e){
            error_log($e->getMessage());
            return $category = [];
        }
    }
}
?>

