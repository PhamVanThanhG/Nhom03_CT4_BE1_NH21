<?php
require "config.php";
require "models/db.php";
require "models/db_product.php";
require "models/db_menu.php";
require "models/db_arrayimg.php";
require "models/db_rating.php";
require "models/db_size.php";
require "models/db_bill.php";
require "models/db_bill_products.php";
require "models/db_history.php";
require "models/db_history_products.php";
require("models/customer.php");
session_start();
if (isset($_GET['id_bill']) && isset($_SESSION['cus_id'])) {
    #add new Purchase history
    $PurchaseHistory = new PurchaseHistory;
    $ProdPurchaseHistory = new ProductPurchaseHistory;
    $Bill = new Bill;
    $BillProduct = new BillProduct;
    $Count = $PurchaseHistory->count();
    $id = 0;
    foreach ($Count as $count) {
        if ($count['COUNT(*)'] == 0) {
            $id = 1;
        } else {
            $id = $count['COUNT(*)'] + 1;
        }
    }
    $date_create = "";
    $date_confirm = date("d-m-Y");
    $getAllBill = $Bill->getBillByIDUser($_SESSION['cus_id']);
    foreach ($getAllBill as $bill) {
        if ($bill['id'] == $_GET['id_bill']) {
            $date_create = $bill['date_create'];
        }
    };
    $addPurchaseHistory = $PurchaseHistory->add($id, $_SESSION['cus_id'], $date_create, $date_confirm);

    #add new product of purchase history
    //get data from bill table
    $getProd = $BillProduct->getByID($_GET['id_bill']);
    foreach ($getProd as $prod) {
        $addProduct = $ProdPurchaseHistory->add($id, $prod['id_product'], $prod['id_size'], $prod['id_topping'], $prod['quantity'], $prod['price']);
    }
    #remove bill
    // $removeBill = $Bill->removeProduct($_GET['id_bill']);
    // $removeProduct = $BillProduct->removeItem($_GET['id_bill']);
    //change state bill
    $changeState = $Bill->deliverBill($_GET['id_bill']);
    //Xep rank cho khach hang
    //Xep rank cho khach hang
$cus = new Customer();
$rank = "bb";
$getMoney = $cus->getMoneyAmoutByCusID($_SESSION['cus_id']);
if (($getMoney[0]['Money'] > 500000 && $getMoney[0]['Money'] < 1000000) && $getMoney['0']['rank'] != "Silver") {
    $rank = "Silver";
    $cus->editRank($_SESSION['cus_id'], $rank);
} else if (($getMoney[0]['Money'] > 1000000 && $getMoney[0]['Money'] < 2000000) && $getMoney['0']['rank'] != "Gold") {
    $rank = "Gold";
    $cus->editRank($_SESSION['cus_id'], $rank);
} else if (($getMoney[0]['Money'] > 2000000 && $getMoney[0]['Money'] < 5000000) && $getMoney['0']['rank'] != "Plantium") {
    $rank = "Plantium";
    $cus->editRank($_SESSION['cus_id'], $rank);
}else if ($getMoney[0]['Money'] > 5000000 && $getMoney['0']['rank'] != "Diamond") {
    $rank = "Diamond";
    $cus->editRank($_SESSION['cus_id'], $rank);
}
    header('location: bill.php');
} else {
    echo "nothing!";
}
