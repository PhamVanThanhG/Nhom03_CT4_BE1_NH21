<?php 
    require "config.php";
    require "models/db.php";
    require "models/customer.php";
    require "models/db_product.php";
    require "models/db_menu.php";
    require "models/db_arrayimg.php";
    require "models/db_rating.php";
    require "models/db_size.php";
    require "models/db_product_type.php";
    require "models/db_topping.php";
    require "models/db_bill_products.php";
    require "models/db_bill.php";
    require "models/db_cart.php";
    session_start();

    if(isset($_POST['comment']) && isset($_SESSION['cus_id'])){
        $Custom = new Customer;
        $date = date("d-m-Y");
        $add = $Custom->addComment($_POST['comment'], $date, $_SESSION['cus_id']);
        header('location: index.php');
    }else{
        echo "ERRO: CAN'T GET DATE!";
    }
?>