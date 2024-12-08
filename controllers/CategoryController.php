<?php
require_once '../../../services/CategoryService.php';
require_once '../../../models/Category.php';
class CategoryController
{
    public function index()
    {
        //Gọi dữ liệu từ thằng CategoryService
        $CategoryService = new CategoryService();
        $categories = $CategoryService->getAllCategories();
        //Render dữ liệu ra
        require '../../../views/admin/categories/cate.php';
        return $categories;
    }

    public function addCategories($name)
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
            $stmt = $pdo->prepare("INSERT INTO articles name VALUES :name");

            // Gắn giá trị cho các tham số
            $stmt->bindParam(':title', $name);


            // Thực thi câu lệnh SQL
            $stmt->execute();

        } catch (PDOException $e) {
            // Nếu có lỗi xảy ra trong kết nối hoặc truy vấn, hiển thị thông báo lỗi
            echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
        }
    }

}