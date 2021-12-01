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

    // if(isset($_GET['id_user']) && isset($_GET['id_product']) && isset($_GET['id_size']) && isset($_GET['id_topping']) && isset($_GET['quantity']) && isset($_GET['price'])){
    //     $Bill = new Bill;
    //     $Count = $Bill->count();
    //     $id = 0;
    //     foreach($Count as $count){
    //         if($count['COUNT(*)'] == 0){
    //             $id = 1;
    //         }else{
    //             $id = $count['COUNT(*)'] + 1;
    //         }
            
    //     }
    //     $date = date("d-m-Y");
    //     $state = "Đang chờ duyệt";
    //     $addBill = $Bill->addItem($id, 1, $date, $state);
    //     $BillProduct = new BillProduct;
    
    //     $addProduct = $BillProduct->addItem($id, $_GET['id_product'], $_GET['id_size'],$_GET['id_topping'],$_GET['quantity'], $_GET['price']);
    //     return;
    // }else{
    //     echo "nothing!";
    // }
    
    if(isset($_GET['id_user']) && isset($_REQUEST['array']) && isset($_GET['price'])){
        //add new bill
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

        //add new bill product
        $BillProduct = new BillProduct;
        //Decode to get array Cart
        $Decode = urldecode($_REQUEST['array']);
        $arrayCart = json_decode($Decode);
        // echo var_dump($arrayCart);
        foreach($arrayCart as $array){
            echo var_dump($array);
            $addProduct = $BillProduct->addItem($id, $array->id_product, $array->id_size, $array->id_topping, $array->quantity);
        }
        header('location:http://localhost:89/Nhom03_CT4_BE1_NH21/bill.php');
    }else{
        echo "nothing!";
    }
        

?>