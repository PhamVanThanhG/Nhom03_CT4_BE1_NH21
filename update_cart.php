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
        //process to get id product
        $k="";
        foreach($_POST as $key=>$data){
            $k = $key;
        }
        $arr_Str = explode("-",$k);
        $id = end($arr_Str);
        //update cart
        $Cart = new Cart;
        $updateCart = $Cart->updateProduct($_POST['size-'.$id], $_POST['topping-'.$id], $_POST['quantity-'.$id], $id);
        header('location: cart.php');
    }else{
        echo "ERRO: CAN'T GET DATA!";
    }
?>


    
