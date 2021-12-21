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
    session_start();
    //Check data exist or not
    if(isset($_POST) && isset($_SESSION['cus_id'])){
        if($_POST['rating'] != "" && $_POST['comment'] != ""){
            if(isset($_GET['id_product'])){
                //process add review
                $Rating = new Rating;
                $date = $date = date("d-m-Y");
                if(sizeof($Rating->checkRatingExisted($_SESSION['cus_id'], $_GET['id_product'])) == 0){
                    $Rating->addNewRating($_POST['rating'], $_SESSION['cus_id'], $_GET['id_product'], $_POST['comment'], $date);
                    header('location: detail.php?id='.$_GET['id_product']);
                }else{
                    $Rating->updateRating($_POST['rating'], $_POST['comment'], $date, $_SESSION['cus_id'], $_GET['id_product']);
                    header('location: detail.php?id='.$_GET['id_product']);
                }
            }
        }
    }else{
        echo "ERRO: CAN'T GET DATA!";
    }
?>