<?php
require("config.php");
require("models/db.php");
require("models/sizes.php");
$sizes = new Sizes();
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $sizes->editSizeByID($id, $size, $price);
    header("location: sizes.php");
} else {
    header("location: sizes.php");
}
