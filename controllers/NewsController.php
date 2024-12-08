<?php
require_once '../../../services/NewsService.php';
require_once '../../../models/News.php'; // Đảm bảo lớp News đã được định nghĩa

class NewsController
{
    public function index()
    {
        // Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        // Render dữ liệu ra News page
        require_once '../../../views/admin/news/index.php';
        return $newsList;
    }

    public function addNews($title, $content, $image, $created_at, $category_id)
    {
        // Cấu hình kết nối PDO
        $host = 'localhost'; // Thay đổi nếu cần
        $dbname = 'newsweb'; // Thay đổi theo tên cơ sở dữ liệu của bạn
        $username = 'root'; // Tên người dùng cơ sở dữ liệu
        $password = ''; // Mật khẩu người dùng cơ sở dữ liệu

        try {
            // Kết nối PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Chuẩn bị câu lệnh SQL để thêm tin tức vào cơ sở dữ liệu
            $stmt = $pdo->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (:title, :content, :image, :created_at, :category_id)");

            // Gắn giá trị cho các tham số
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':created_at', $created_at);
            $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                echo "<script>alert('Tin tức đã được thêm thành công!');</script>";
            } else {
                echo "<script>alert('Có lỗi khi thêm tin tức!');</script>";
            }

        } catch (PDOException $e) {
            // Nếu có lỗi xảy ra trong kết nối hoặc truy vấn, hiển thị thông báo lỗi
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

    public function updateNews(News $news)
    {
        // Cấu hình kết nối PDO
        $host = 'localhost';
        $dbname = 'newsweb';
        $username = 'root';
        $password = '';

        // Kết nối PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cập nhật tin tức vào cơ sở dữ liệu
        $sql = "UPDATE news SET title = ?, content = ?, image = ?, created_at = ?, category_id = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $news->getTitle(),
            $news->getContent(),
            $news->getImage(),
            $news->getCreatedAt(),
            $news->getCategoryId(),
            $news->getId()
        ]);
    }


    // NewsController.php

    public function delete()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $newsService = new NewsService();
            return $newsService->deleteNews($id);

            // Lưu thông báo vào session
            if ($deleteSuccess) {
                $_SESSION['message'] = 'Xóa tin tức thành công!';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Không thể xóa tin tức!';
                $_SESSION['message_type'] = 'danger';
            }

            // Chuyển hướng về trang danh sách tin tức sau khi xóa
            header("Location: index.php");
            exit();
        }
    }


}