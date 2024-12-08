<?php
declare(strict_types=1);
require_once '../../../models/Category.php';
class CategoryService{
    public function getALLCategories(): ?array
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=newsweb', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM categories";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll();
            $category = [];
            foreach ($categories as $a) {
                $category[] = new Category($a['id'], $a['name']);
            }
            return $category;
        }
        catch(PDOException $e){
            return $category = [];
        }
    }
}
?>