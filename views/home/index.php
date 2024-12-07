<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Management System | Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
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
                            <a class="btn btn-danger" href="../views/admin/login.php">Đăng nhập</a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <?php if (empty($newsList)): ?>
                            <div class="col-12 text-center">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <p class="mb-0">Không có tin tức nào!</p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($newsList as $news): ?>
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card shadow h-100">
                                        <img src="../../public/assets/images/<?php echo htmlspecialchars($news->getImage()); ?>"
                                            alt="<?php echo htmlspecialchars($news->getTitle()); ?>" class="card-img-top"
                                            style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <div class="small mb-2">
                                                <span class="badge bg-primary text-light">ID:
                                                    <?php echo htmlspecialchars($news->getId()); ?></span>
                                                <span
                                                    class="text-muted ms-2"><?php echo htmlspecialchars($news->getCreatedAt()); ?></span>
                                            </div>
                                            <h5 class="card-title"><?php echo htmlspecialchars($news->getTitle()); ?></h5>
                                            <p class="card-text">
                                                <?php echo htmlspecialchars(substr($news->getContent(), 0, 100)) . (strlen($news->getContent()) > 100 ? '...' : ''); ?>
                                            </p>
                                            <div class="mt-3">
                                                <span class="badge bg-secondary">
                                                    Category: <?php echo htmlspecialchars($news->getCategoryId()); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
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