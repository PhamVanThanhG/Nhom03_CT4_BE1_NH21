<?php
include("config.php");
include("models/db.php");
include("models/Product_type.php");
$type = new ProductType();
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $type->addTypes($name);
    header("location: product_types.php");
}
header("location: product_types.php");