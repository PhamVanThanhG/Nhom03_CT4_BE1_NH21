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

    //Check data exist or not
    if(isset($_POST)){
        echo var_dump($_POST);
        if(isset($_POST['rating']) && $_POST['comment'] != ""){
            if(isset($_GET['id_product'])){
                //process add review
                $Rating = new Rating;
                // date_default_timezone_set('Asia/Ho_Chi_Minh');
                // $date = date('m/d/Y h:i:s a', time())."";
                $date = date("d-m-Y");
                $Rating->addNewRating($_POST['rating'], 7, $_GET['id_product'], $_POST['comment'], $date);
                header('location:http://localhost:89/code_cua_thanh/Nhom03_CT4_BE1_NH21/detail.php?id='.$_GET['id_product']);
            }
        }else{
            // header('location:http://localhost:89/code_cua_thanh/Nhom03_CT4_BE1_NH21/detail.php?id='.$_GET['id_product']);
        }
    }else{
        echo "ERRO: CAN'T GET DATA!";
    }
?>