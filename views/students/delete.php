<?php
include_once './../../vendor/autoload.php';

use Project\Controllers\Category;

$student = new Category();

$student->destroy($_GET['id']);

header('Location: ./index.php');