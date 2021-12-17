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
        $removeProduct = $Cart->removeProduct($_GET['id_product']);
        header('location: cart.php');
    }
?>