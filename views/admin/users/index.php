
<?php
require_once "../../../controllers/UsersController.php";
$usersController = new UsersController();
$users = $usersController->indexUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Users Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet"
          type="text/css">s
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php
        require_once "../../../utilities/sidebar.php";
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <?php
                    require_once "../../../utilities/topbar.php";
                    ?>
                </nav>

                <div class="container-fluid">
                    <a href="add.php" class="btn btn-primary"><i class="fas fa-circle-plus"></i> Thêm Người Dùng</a>
                    <div>

                    </div>
                    <table class="table table-striped table-hover align-middle table-responsive table-bordered">
                        <thead class="text-center">
                        <tr>
                            <th class="align-middle">ID</th>
                            <th class="align-middle">Tên người dùng</th>
                            <th class="align-middle">Mật khẩu</th>
                            <th class="align-middle">Vai trò</th>
                            <th class="align-middle">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $users): ?>
                            <tr>
                                <td><?php echo $users->getId(); ?></td>
                                <td><?php echo htmlspecialchars($users->getUsername()); ?></td>
                                <td><?php echo htmlspecialchars($users->getPassword()); ?></td>
                                <td><?php echo htmlspecialchars($users->getRole()); ?></td>
                                <td>
                                    <div class="row d-flex">
                                        <a href="edit.php?controller=news&action=edit&id=<?php echo $users->getId(); ?>"
                                           class="btn btn-warning btn-sm"><i class="fas fa-pen-to-square"></i></a>
                                        <form action="delete.php" method="post" class="d-inline-block">
                                            <input type="hidden" name="id" value="<?= $users->getId() ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn có chắc muốn xóa người dùng  này không?')">
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

        </div>

    </div>

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


</html>
