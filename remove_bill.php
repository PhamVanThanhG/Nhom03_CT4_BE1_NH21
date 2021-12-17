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
    require "models/db_bill.php";
    require "models/db_bill_products.php";

    if(isset($_GET['id_bill'])){
        $Bill = new Bill;
        $BillProduct = new BillProduct;
        $removeBill = $Bill->removeProduct($_GET['id_bill']);
        $removeProduct = $BillProduct->removeItem($_GET['id_bill']);
        header('location: cart.php');
    }
?>