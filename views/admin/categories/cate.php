<?php
require_once '../../../controllers/CategoryController.php';
$categoryController = new CategoryController();
$categories = $categoryController->indexCategory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Categories Management System | Categories</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <a href="add.php" class="btn btn-primary"><i class="fas fa-circle-plus"></i> Thêm tin tức</a>
                    <table class="table table-striped table-hover align-middle table-responsive table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Mã</th>
                                <th class="align-middle">Tên danh mục</th>
                                <th colspan="2" class="align-middle">Thao tác</th>
                            </tr>
                            <tr>
                                <th>Sửa</th>
                                <th>Xoá</th>
                            </tr>
                        </thead>
                        <tbody class="table-border">
                            <?php if (empty($categories)): ?>
                                <tr>
                                    <td colspan="3" class="text-center">Không có thể loại nào!.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo $category->getId(); ?></td>
                                        <td class="text-center align-middle"><?php echo $category->getName(); ?></td>
                                        <td class="text-center align-middle">
                                            <a href="edit.php?id=<?php echo $category->getId(); ?>" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i> Sửa</a>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="delete.php?id=<?php echo $category->getId(); ?>" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i> Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                    </table>
                </div>
            </div>

        </div>

    </div>
    Scroll to Top Button
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../../../public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../public/assets/js/sb-admin-2.min.js"></script>
    <script src="../../../public/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../../../public/assets/js/demo/chart-area-demo.js"></script>
    <script src="../../../public/assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>