<?php
require_once "../../../controllers/UsersController.php";
$userController = new UsersController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management System | Add News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1 class="mb-4">Thêm người dùng</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tên người dùng:</label>
            <input type="text" id="title" name="title" class="form-control" required></input>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Mật khẩu:</label>
            <input id="content" name="content" class="form-control" required></input>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Vai trò:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="1">người dùng thường</option>
                <option value="2">admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary ">Thêm</button>
        <a href="index.php" class="btn btn-secondary ">Quay lại</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
