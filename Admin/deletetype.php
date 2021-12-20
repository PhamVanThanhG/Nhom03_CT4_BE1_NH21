<?php
session_start();
require("config.php");
require("models/db.php");
require("models/product.php");
require("models/Product_type.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product = new ProductFood;
    $type = new ProductType;
    $getAllProductByIdType = $product->getProductsByIdType($id);
    if(sizeof($getAllProductByIdType) != 0){
        $_SESSION['del'] = true;
        header("location: product_types.php");
    }else{
        $type->delType($id);
        header("location: product_types.php");
    }
}
header("location: product_types.php");