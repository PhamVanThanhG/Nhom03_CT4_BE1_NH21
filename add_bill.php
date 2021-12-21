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
    session_start();

    
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
        $state = "Waiting for approval";
        $addBill = $Bill->addItem($id, $_SESSION['cus_id'], $date, $state);

        #add new bill product
        $Cart = new Cart;
        $Product = new ProductFood;
        $BillProduct = new BillProduct;
        // $total = $prod['Price']*(100 - $prod['Sale'])/100;
        //get data from cart table
        $Cart = new Cart;
        $product = new ProductFood;
        $getAllCart = $Cart->getCartByIIDUser($_SESSION['cus_id']);
        foreach($getAllCart as $cart){
            // var_dump($cart);
            echo $_SESSION['cus_id'];
            $item = $Cart->getCartItem($cart['id_product'], $cart['id_size'], $cart['id_topping']);
            $price = ($item[0]['Price'] * (100 - $item[0]['Sale'])/100) +  $item[0]['sizePrice'] +  $item[0]['topppingPrice'];
            $addProduct = $BillProduct->addItem($id, $cart['id_product'], $cart['id_size'], $cart['id_topping'], $cart['quantity'], ($price * $cart['quantity']));
        }
        //remove all products of cart
        $removeAllCart = $Cart->removeAllProducts();
        header('location: bill.php');
    }else{
        echo "nothing!";
    }
?>