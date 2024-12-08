<?php
require_once '../../../services/CategoryService.php';
require_once '../../../models/Category.php';
    class CategoryController {
        public function index() {
            //Gọi dữ liệu từ thằng CategoryService
            $CategoryService = new CategoryService();
            $categories = $CategoryService->getAllCategories();
            //Render dữ liệu ra
            require '../../../views/admin/categories/cate.php';
            return $categories;
        }
    }
?>