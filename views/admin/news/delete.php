<?php
require_once "../../../controllers/NewsController.php"; // Đảm bảo controller đã được định nghĩa
$newsController = new NewsController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if ($newsController->delete()) {
        echo "<script>alert('Tin tức đã được xóa thành công'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Xóa tin tức thất bại'); window.location.href='index.php';</script>";
    }
}
?>
