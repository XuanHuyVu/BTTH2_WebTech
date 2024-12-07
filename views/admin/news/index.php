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
        <?php
        require_once "../../../utilities/sidebar.php";
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php
                    require_once "../../../utilities/topbar.php";
                    ?>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a href="add.php" class="btn btn-primary">Add News</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Category id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newsList as $news): ?>
                                <tr>
                                    <td><?php echo $news->getId(); ?></td>
                                    <td><?php echo $news->getTitle(); ?></td>
                                    <td><?php echo $news->getContent(); ?></td>
                                    <td><img src="<?php echo $news->getImage(); ?>" alt="" width="100"></td>
                                    <td><?php echo $news->getCreatedAt(); ?></td>
                                    <td><?php echo $news->getCategoryId(); ?></td>
                                    <td>
                                        <a href="edit.php?controller=news&action=edit&id=<?php echo $news->getId(); ?>"
                                            class="btn btn-warning">Edit</a>
                                        <a href="index.php?controller=news&action=delete&id=<?php echo $news->getId(); ?>"
                                            class="btn btn-danger">Delete</a>
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