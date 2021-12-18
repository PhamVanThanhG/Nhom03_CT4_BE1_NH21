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
    require "models/db_bill_products.php";
    require "models/db_bill.php";
    require "models/db_cart.php";
    
    if(isset($_SESSION['cus_id'])){
        #add new bill
        $Bill = new Bill;
        $Count = $Bill->count();
        $id = 0;
        foreach($Count as $count){
            if($count['COUNT(*)'] == 0){
                $id = 1;
            }else{
                $id = $count['COUNT(*)'] + 1;
            }
        }
        $date = date("d-m-Y");
        $state = "Đang chờ duyệt";
        $addBill = $Bill->addItem($id, 1, $date, $state);

        #add new bill product
        $BillProduct = new BillProduct;
        
        //get data from cart table
        $Cart = new Cart;
        $getAllCart = $Cart->getCartByIIDUser($_SESSION['cus_id']);
        foreach($getAllCart as $cart){
            $addProduct = $BillProduct->addItem($id, $cart['id_product'], $cart['id_size'], $cart['id_topping'], $cart['quantity']);
        }
        //remove all products of cart
        $removeAllCart = $Cart->removeAllProducts();
        header('location: bill.php');
    }else{
        echo "nothing!";
    }
?>