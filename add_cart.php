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

    if(isset($_GET['id_product']) && isset($_SESSION['cus_id'])){
        if(isset($_POST['quantity'])){
            $Cart = new Cart;
            $check = $Cart->checkExistedProd($_GET['id_product']);
            if(sizeof($check) == 0){
                $addCart = $Cart->addProduct($_GET['id_product'],1,5,$_POST['quantity'],$_SESSION['cus_id']);
                if(isset($_GET['key'])){
                    if($_GET['key'] == 2){
                        header('location: detail.php?id='.$_GET['id_product']);
                    }else if($_GET['key'] == 1){
                        header('location: index.php');
                    }else{
                        header('location: index.php');
                    }
                }else{
                    header('location: index.php');
                }
            }else{
                if(isset($_GET['key'])){
                    if($_GET['key'] == 2){
                        header('location: detail.php?id='.$_GET['id_product']);
                    }else if($_GET['key'] == 1){
                        header('location: index.php');
                    }else{
                        header('location: index.php');
                    }
                }else{
                    header('location: index.php');
                }
            }
        }else{
            $Cart = new Cart;
            $check = $Cart->checkExistedProd($_GET['id_product']);
            if(sizeof($check) == 0){
                $addCart = $Cart->addProduct($_GET['id_product'],1,5,1,$_SESSION['cus_id']);
                if(isset($_GET['key'])){
                    if($_GET['key'] == 2){
                        header('location: detail.php?id='.$_GET['id_product']);
                    }else if($_GET['key'] == 1){
                        header('location: index.php');
                    }else{
                        header('location: index.php');
                    }
                }else{
                    header('location: index.php');
                }
            }else{
                if(isset($_GET['key'])){
                    if($_GET['key'] == 2){
                        header('location: detail.php?id='.$_GET['id_product']);
                    }else if($_GET['key'] == 1){
                        header('location: index.php');
                    }else{
                        header('location: index.php');
                    }
                }else{
                    header('location: index.php');
                }
            }
        }
    }else{
        echo "ERRO: CAN'T GET DATE!";
    }
?>