<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
</head>

<body>

    <?php
    //session_start();
    // include_once './store.php';
    include_once './../../vendor/autoload.php';

    use Project\Controllers\Category;
    $categoryObj = new Category();

    $categories=$categoryObj->index();

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>

    <a href="./create.php">Create </a>
    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sl=0;
            // print_r($categories);
            // die();
            foreach ($categories as $category) { ?>
                <tr> 
                    <td> <?= ++$sl ?> </td>
                   
                    <td><?= $category['category_id'] ?></td>
                    <td><?= $category['category_name'] ?></td>
                    <td>
                        <a href="show.php?id=<?= $category['category_id'] ?>">Show</a>
                        <a href="edit.php?id=<?= $category['category_id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $category['category_id'] ?>" onclick="return confirm('Are You Sure Want to Delete ?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>