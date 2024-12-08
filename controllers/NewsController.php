<?php
require_once '../../../services/NewsService.php';
require_once '../../../models/News.php'; // Đảm bảo lớp News đã được định nghĩa

class NewsController {
    public function index() {
        // Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();
        // Render dữ liệu ra News page
        require_once '../../../views/admin/news/index.php';
        return $newsList;
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            $createdAt = $_POST['created_at'];
            $categoryId = $_POST['category_id'];

            // Xử lý upload ảnh
            $imagePath = "../../../public/assets/images/$image";
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

            // Tạo đối tượng News và thêm vào cơ sở dữ liệu
            $news = new News(0, $title, $content, $image, $createdAt, $categoryId);
            
            // Gọi phương thức addNews từ NewsService
            $newsService = new NewsService();
            $newsService->addNews($news);

            // Chuyển hướng về trang danh sách
            header("Location: cate.php");
            exit();
        }
        // Render dữ liệu ra Add News page
        require_once '../../../views/admin/news/add.php';
    }

    public function edit() {
        // Lấy id từ URL
        $id = $_GET['id'];

        // Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $news = $newsService->getNewsById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image']['name'];
            $createdAt = $_POST['created_at'];
            $categoryId = $_POST['category_id'];

            // Kiểm tra và xử lý ảnh (nếu có ảnh mới)
            if ($image) {
                $imagePath = "../../../public/assets/images/$image";
                move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
            } else {
                // Nếu không có ảnh mới, giữ ảnh cũ
                $image = $news->getImage();
            }

            // Tạo đối tượng News và cập nhật vào cơ sở dữ liệu
            $news = new News($id, $title, $content, $image, $createdAt, $categoryId);
            
            // Gọi phương thức updateNews từ NewsService
            $newsService->updateNews($news);

            // Chuyển hướng về trang danh sách
            header("Location: cate.php");
            exit();
        }
        // Render dữ liệu ra Edit News page
        require_once '../../../views/admin/news/edit.php';
    }

    public function delete() {
        // Lấy id từ URL
        $id = $_GET['id'];

        // Gọi phương thức deleteNews từ NewsService
        $newsService = new NewsService();
        $newsService->deleteNews($id);

        // Chuyển hướng về trang danh sách
        header("Location: cate.php");
        exit();
    }
}
?>
