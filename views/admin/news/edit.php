<?php
require_once '../../../services/NewsService.php';
require_once '../../../models/News.php'; // Đảm bảo lớp News đã được định nghĩa
require_once '../../../controllers/NewsController.php'; // Đảm bảo lớp NewsController đã được định nghĩa
// Kiểm tra xem id có tồn tại không
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit();
}

// Lấy id từ URL
$id = $_GET['id'];

// Khởi tạo NewsService
$newsService = new NewsService();

// Lấy thông tin tin tức
$news = $newsService->getNewsById($id);

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $created_at = $_POST['created_at'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image'];

    // Kiểm tra và xử lý việc tải ảnh
    $imagePath = $news->getImage();  // Nếu không thay đổi ảnh, giữ lại tên ảnh cũ

    if ($image['name']) {
        // Nếu có ảnh mới, xử lý tải lên
        $imageName = basename($image['name']);
        $imagePath = "../../../public/assets/images/" . $imageName;
        move_uploaded_file($image['tmp_name'], $imagePath);
    }

    // Cập nhật tin tức vào cơ sở dữ liệu
    // Cập nhật tin tức vào cơ sở dữ liệu
    $news = new News($id, $title, $content, $imagePath, $created_at, $category_id);
    $newsService->updateNews($news);


    // Chuyển hướng về trang danh sách tin tức
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Management System | Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Sửa tin tức</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo $news->getTitle(); ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung:</label>
                <textarea id="content" name="content" class="form-control"
                    required><?php echo $news->getContent(); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh:</label>
                <input type="file" id="image" name="image" class="form-control">
                <small class="text-muted">Chọn một tệp hình ảnh để tải lên (nếu có)</small>
                <br>
                <img src="../../../public/assets/images/<?php echo htmlspecialchars($news->getImage()); ?>"
                    alt="<?php echo htmlspecialchars($news->getTitle()); ?>" class="rounded admin-img" width="300px">
            </div>
            <div class="mb-3">
                <label for="created_at" class="form-label">Ngày đăng:</label>
                <input type="text" id="created_at" name="created_at" class="form-control"
                    value="<?php echo $news->getCreatedAt(); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Thể loại:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="1" <?php echo $news->getCategoryId() == 1 ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo $news->getCategoryId() == 2 ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo $news->getCategoryId() == 3 ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo $news->getCategoryId() == 4 ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo $news->getCategoryId() == 5 ? 'selected' : ''; ?>>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>