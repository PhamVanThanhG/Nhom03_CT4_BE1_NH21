<?php
session_start();
require("config.php");
require("models/db.php");
require("models/bill.php");
$bills = new Bill();
if(isset($_GET['id'])){
    $getBillByID = $bills->getBillById($_GET['id']);
    if ($getBillByID[0]['state'] == "Waiting for approval") {
        $bills->deliverBill($_GET['id']);
    }else if($getBillByID[0]['state'] == "Being processed"){
        $_SESSION['deliver'] = "being";
    }else{
        $_SESSION['deliver'] = "ed";
    }
}
header("location: bills.php")
?>