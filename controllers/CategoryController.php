<?php
require_once '../../../services/CategoryService.php';
    class CategoryController {
        public function index() {
            //Gọi dữ liệu từ thằng CategoryService
            $categoryService = new CategoryService();
            $categories = $categoryService->getALLCategories();
            //Render dữ liệu ra
            require '../../../views/admin/categories/index.php';
            return $categories;
        }
    }
?>