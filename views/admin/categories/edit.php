<?php
require_once '../../../services/CategoryService.php';
require_once '../../../models/Category.php'; // Đảm bảo lớp News đã được định nghĩa
require_once '../../../controllers/CategoryController.php'; // Đảm bảo lớp NewsController đã được định nghĩa
// Kiểm tra xem id có tồn tại không
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: cate.php");
    exit();
}

// Lấy id từ URL
$id = $_GET['id'];

// Khởi tạo CategoryService
$categoryService = new CategoryService();

// Lấy thông tin tin tức
$categories = $categoryService->getCategoriesById($id);

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];

    // Cập nhật tin tức vào cơ sở dữ liệu
    // Cập nhật tin tức vào cơ sở dữ liệu
    $categories = new Category($id, $name);
    $categoryService->updateCategories($categories);


    // Chuyển hướng về trang danh sách tin tức
    header("Location: cate.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management System | Edit Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1 class="mb-4">Sửa tin tức</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $categories->getName(); ?>"
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>