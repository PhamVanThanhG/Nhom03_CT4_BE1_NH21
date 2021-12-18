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
        $addProduct = $ProdPurchaseHistory->add($id, $prod['id_product'], $prod['id_size'], $prod['id_topping'], $prod['quantity']);
    }
    #remove bill
    // $removeBill = $Bill->removeProduct($_GET['id_bill']);
    // $removeProduct = $BillProduct->removeItem($_GET['id_bill']);
    header('location:http://localhost:89/Nhom03_CT4_BE1_NH21/index.php');
} else {
    echo "nothing!";
}
?>


