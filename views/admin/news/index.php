<?php
require_once "../../../controllers/NewsController.php";
$newsController = new NewsController();
$newsList = $newsController->index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-gear"></i>
                </div>
                <div class="sidebar-brand-text mx-3">News Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - News -->
            <li class="nav-item">
                <a class="nav-link" href="../news/index.php">
                    <i class="fas fa-newspaper" style="color: #ffffff;"></i>
                    <span>News</span></a>
            </li>

            <!-- Nav Item - Categories -->
            <li class="nav-item">
                <a class="nav-link" href="../categories/cate.php">
                    <i class="fas fa-list" style="color: #ffffff;"></i>
                    <span>Categories</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Vũ Xuân Huy</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn đăng xuất khỏi
                                        hệ thống quản lý?
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Chọn "Log Out" nếu bạn muốn đóng phiên làm việc của mình!</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="../login.php">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="add.php" class="btn btn-primary"><i class="fas fa-circle-plus"></i> Thêm tin tức</a>
                    <div>

                    </div>
                    <table class="table table-striped table-hover align-middle table-responsive table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="align-middle">Mã</th>
                                <th class="align-middle">Tiêu đề</th>
                                <th class="align-middle">Nội dung</th>
                                <th class="align-middle">Hình ảnh</th>
                                <th class="align-middle">Ngày đăng</th>
                                <th class="align-middle">Thể loại</th>
                                <th class="align-middle">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newsList as $news): ?>
                                <tr>
                                    <td><?php echo $news->getId(); ?></td>
                                    <td><?php echo htmlspecialchars($news->getTitle()); ?></td>
                                    <td title="<?php echo htmlspecialchars($news->getContent()); ?>">
                                        <?php echo htmlspecialchars(substr($news->getContent(), 0, 50)) . (strlen($news->getContent()) > 50 ? '...' : ''); ?>
                                    </td>
                                    <td class="text-center">
                                        <img src="../../../public/assets/images/<?php echo htmlspecialchars($news->getImage()); ?>"
                                            alt="<?php echo htmlspecialchars($news->getTitle()); ?>"
                                            class="rounded admin-img" width="100px">
                                    </td>
                                    <td><?php echo htmlspecialchars($news->getCreatedAt()); ?></td>
                                    <td><?php echo $news->getCategoryId(); ?></td>
                                    <td>
                                        <div class="row d-flex">
                                            <a href="edit.php?controller=news&action=edit&id=<?php echo $news->getId(); ?>"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pen-to-square"></i></a>
                                            <form action="delete.php" method="post" class="d-inline-block">
                                                <input type="hidden" name="id" value="<?= $news->getId() ?>">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc muốn xóa tin tức này không?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php
                require_once "../../../utilities/footer.php";
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
    <script src="../../../public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../public/assets/js/sb-admin-2.min.js"></script>
    <script src="../../../public/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../../../public/assets/js/demo/chart-area-demo.js"></script>
    <script src="../../../public/assets/js/demo/chart-pie-demo.js"></script>
</body>

</html>