<?php
require("config.php");
require("models/db.php");
require("models/product.php");
$product = new ProductFood();
if(isset($_GET['id'])){
    $getProductById = $product->getProductById($_GET['id']);
    $del = $product->deleteProduct($_GET['id']);
    unlink("../images/". $getProductById[0]['image']);
}
header("location: products.php")
?>