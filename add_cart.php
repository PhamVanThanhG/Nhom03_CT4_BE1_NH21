<?php 
    require "config.php";
    require "models/db.php";
    require "models/db_product.php";
    require "models/db_menu.php";
    require "models/db_arrayimg.php";
    require "models/db_rating.php";
    require "models/db_size.php";
    require "models/db_product_type.php";
    require "models/db_topping.php";
    require "models/db_cart.php";

    if(isset($_GET['id_product'])){
        $Cart = new Cart;
        if(isset($_GET['id_size']) && isset($_GET['id_topping']) && isset($_GET['quantity'])){
            $addCart = $Cart->addProduct($_GET['id_product'],$_GET['id_size'],$_GET['id_topping'],$_GET['quantity']);
            header('location:http://localhost:89/Nhom03_CT4_BE1_NH21/detail.php?id='.$_GET['id_product']);
        }else{
            $addCart = $Cart->addProduct($_GET['id_product'],1,5,1);
            header('location:http://localhost:89/Nhom03_CT4_BE1_NH21/index.php');
        }
    }
?>