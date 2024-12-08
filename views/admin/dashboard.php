<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header('Location: ../login.php');
    exit;
}

require_once '../../controllers/AdminController.php';
$adminController = new AdminController();
$newsList = $adminController->indexAdmin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Management System | Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        require_once "../../utilities/sidebar.php";
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php
                    require_once "../../utilities/topbar.php";
                    ?>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <table class="table table-striped table-hover align-middle table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Mã</th>
                                <th class="text-center align-middle">Tiêu đề</th>
                                <th class="text-center align-middle">Nội dung</th>
                                <th class="text-center align-middle">Hình ảnh</th>
                                <th class="text-center align-middle">Ngày đăng</th>
                                <th class="text-center align-middle">Thể loại</th>
                            </tr>
                        </thead>
                        <tbody class="table-border">
                            <?php if (empty($newsList)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Không có tin tức nào!.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($newsList as $news): ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo $news->getId(); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($news->getTitle()); ?></td>
                                        <td title="<?php echo htmlspecialchars($news->getContent()); ?>">
                                            <?php echo htmlspecialchars(substr($news->getContent(), 0, 50)) . (strlen($news->getContent()) > 50 ? '...' : ''); ?>
                                        </td>
                                        <td class="text-center">
                                            <img src="../../public/assets/images/<?php echo htmlspecialchars($news->getImage()); ?>"
                                                alt="<?php echo htmlspecialchars($news->getTitle()); ?>"
                                                class="rounded admin-img" width="100px">
                                        </td>

                                        <td class="text-center align-middle">
                                            <?php echo htmlspecialchars($news->getCreatedAt()); ?></td>
                                        <td class="text-center align-middle">
                                            <?php echo $news->getCategoryId(); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php
                require_once "../../utilities/footer.php";
                ?>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="../../public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../public/assets/js/sb-admin-2.min.js"></script>
    <script src="../../public/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../../public/assets/js/demo/chart-area-demo.js"></script>
    <script src="../../public/assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>