<?php
// Kết nối với NewsController để xử lý dữ liệu form
require_once "../../../controllers/NewsController.php";
$newsController = new NewsController();

// Kiểm tra xem form có được gửi đi hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $created_at = $_POST['created_at'];
    $category_id = $_POST['category_id'];

    // Xử lý upload file
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "../../../public/assets/images/";
        $target_file = $target_dir . basename($image);

        // Kiểm tra nếu file có phải là hình ảnh hợp lệ
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Gọi phương thức addNews từ controller để thêm tin tức vào cơ sở dữ liệu
            $newsController->addNews($title, $content, $image, $created_at, $category_id);
        } else {
            echo "<script>alert('Có lỗi khi tải hình ảnh!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management System | Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm tin tức</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung:</label>
                <textarea id="content" name="content" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Ngày đăng:</label>
                <input type="text" id="created_at" name="created_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Thể loại:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>