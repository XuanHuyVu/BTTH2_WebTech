<?php
require_once "../../../controllers/NewsController.php";
$newsController = new NewsController();

// Kiểm tra xem form có được gửi đi hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
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
    <h1 class="mb-4">Thêm Người Dùng</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tên người dùng</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Mật khẩu</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Vai trò:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="1">Người dùng thường</option>
                <option value="2">admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
