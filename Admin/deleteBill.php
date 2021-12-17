<?php
session_start();
require("config.php");
require("models/db.php");
require("models/bill.php");
$bills = new Bill();
if(isset($_GET['id'])){
    $getBillByID = $bills->getBillById($_GET['id']);
    if ($getBillByID[0]['state'] == "Waiting for approval") {
        $_SESSION['delete'] = "wai";
    }else if($getBillByID[0]['state'] == "Being processed"){
        $_SESSION['delete'] = "being";
    }else{
        $bills->deleteBill($_GET['id']);
    }
}
header("location: bills.php")
?>