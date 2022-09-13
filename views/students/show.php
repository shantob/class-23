<?php
include_once './../../vendor/autoload.php';

use Project\Controllers\Category;

$categories = new Category();

$category = $categories->details($_GET['id']);

//print_r($studentInfo);

?>

<a href="./index.php">List</a>
<h1>Student Info</h1>
<p>Id: <?= $category['category_id'] ?></p>
<p>Name: <?= $category['category_name'] ?></p>