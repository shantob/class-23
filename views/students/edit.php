<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once './../../vendor/autoload.php';

    use Project\Controllers\Category;

    $categories = new Category();

    $categoriesInfo = $categories->details($_GET['id']);

    //print_r($studentInfo);

    ?>

    <div style="width: 500px; margin:0 auto;">
        <a href="./index.php">List</a>

        <form action="./update.php?id=<?= $categoriesInfo['category_id'] ?>" method="post">
            <input name="id" value="<?= $categoriesInfo['category_id'] ?>" placeholder="Enter Student ID">
            <input name="name" value="<?= $categoriesInfo['category_name'] ?>" placeholder="Enter Student Name">
            <button>Update</button>
        </form>
    </div>
</body>

</html>