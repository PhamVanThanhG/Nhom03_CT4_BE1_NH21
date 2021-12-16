<?php
session_start();
require("config.php");
require("models/db.php");
require("models/bill.php");
$bills = new Bill();
if(isset($_GET['id'])){
    $getBillByID = $bills->getBillById($_GET['id']);
    if ($getBillByID[0]['state'] == "Đang giao hàng") {
        $_SESSION['deliver'] = true;
    }else{
        $bills->deliverBill($_GET['id']);
    }
}
header("location: bills.php")
?>