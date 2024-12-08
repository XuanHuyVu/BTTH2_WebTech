<?php
// Kết nối với NewsController để xử lý dữ liệu form
require_once "../../../controllers/CategoryController.php";
$categoryController = new CategoryController();

// Kiểm tra xem form có được gửi đi hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['name'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Management System | Add Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Thêm danh mục</h1>
    <form action="" method="name" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tên danh mục</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
