<?php
//declare(strict_types=1);
//require_once '../models/News.php';
//
//class NewsService {
//    public function getAllNews() {
//        try {
//            $db = new PDO('mysql:host=localhost;dbname=newsweb', 'root', '');
//            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $sql = 'SELECT * FROM news ORDER BY created_at DESC';
//            $stmt = $db->prepare($sql);
//            $stmt->execute();
//            $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
//            $newsList = [];
//            foreach ($news as $n) {
//                $newsList[] = new News($n['id'], $n['title'], $n['content'], $n['image'], $n['created_at'], $n['category_id']);
//            }
//            return $newsList;
//        } catch (PDOException $e) {
//            //echo $e->getMessage();
//            return $newsList;
//        }
//    }
//}
?>