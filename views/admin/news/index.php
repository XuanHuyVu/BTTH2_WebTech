<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>NEWS Management System</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">NEWS Management System</h2>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>