<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/News.php';

class NewsService
{
    private function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=newsweb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getAllNews(): array
    {
        $newsList = [];
        try {
            $db = $this->connect();
            $sql = 'SELECT * FROM news ORDER BY created_at DESC';
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $news = $stmt->fetchAll();

            foreach ($news as $n) {
                $newsList[] = new News(
                    (int) $n['id'],
                    $n['title'],
                    $n['content'],
                    $n['image'],
                    $n['created_at'],
                    (int) $n['category_id']
                );
            }
        } catch (PDOException $e) {
            // Log the error or handle it gracefully
            error_log($e->getMessage());
        }
        return $newsList;
    }

    public function getNewsById(int $id): ?News
    {
        $news = null;
        try {
            $db = $this->connect();
            $sql = 'SELECT * FROM news WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $n = $stmt->fetch();

            if ($n) {
                $news = new News(
                    (int) $n['id'],
                    $n['title'],
                    $n['content'],
                    $n['image'],
                    $n['created_at'],
                    (int) $n['category_id']
                );
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return $news;
    }

    public function addNews(News $news): void
    {
        try {
            $db = $this->connect();
            $sql = 'INSERT INTO news (title, content, image, created_at, category_id) VALUES (?, ?, ?, ?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $news->getTitle(),
                $news->getContent(),
                $news->getImage(),
                $news->getCreatedAt(),
                $news->getCategoryId()
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    public function updateNews(News $news): void
    {
        try {
            $db = $this->connect();
            $sql = 'UPDATE news SET title = ?, content = ?, image = ?, created_at = ?, category_id = ? WHERE id = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $news->getTitle(),
                $news->getContent(),
                $news->getImage(),
                $news->getCreatedAt(),
                $news->getCategoryId(),
                $news->getId()
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    // NewsService.php

    public function deleteNews($id)
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
            $sql = "DELETE FROM news WHERE id = ?";
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
