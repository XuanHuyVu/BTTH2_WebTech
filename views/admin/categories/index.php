<?php
    require_once '../../../controllers/CategoryController.php';
    $CategoryController = new CategoryController();
    $categories = $CategoryController->index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Categories Management System</title>
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
                <a href="  " class="btn btn-primary">Add News</a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="text-center align-middle">ID</th>
                            <th scope="col" rowspan="2" class="text-center align-middle">Name</th>
                            <th scope="col" colspan="3" class="text-center align-middle w-25">Action</th>
                        </tr>
                        <tr>
                            <th scope="col" class="text-center align-middle">View</th>
                            <th scope="col" class="text-center align-middle">Edit</th>
                            <th scope="col" class="text-center align-middle">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category ): ?>
                            <td><?= $category->getID(); ?></td>
                            <td><?= $category->getName(); ?></td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
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
<script src="https://kit.fontawesome.com/e04dbf8a27.js" crossorigin="anonymous"></script>
</body>

</html>
