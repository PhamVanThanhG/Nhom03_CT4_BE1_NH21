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
        if(isset($_GET['id_product'])){
            //process add review
            $Rating = new Rating;
            $date = $date = date("d-m-Y");
            $Rating->addNewRating($_POST['rating'], 7, $_GET['id_product'], $_POST['comment'], $date);
        }
    }else{
        echo "ERRO: CAN'T GET DATA!";
    }
?>