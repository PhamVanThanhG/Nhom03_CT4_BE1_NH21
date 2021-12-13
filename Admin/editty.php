<?php
require("config.php");
require("models/db.php");
require("models/Product_type.php");
$type = new ProductType();
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $type->editTypeByID($id, $name);
    header("location: product_types.php");
} else {
    header("location: product_types.php");
}
