<?php
require("config.php");
require("models/db.php");
require("models/customer.php");
$customer = new Customer();
if(isset($_GET['id'])){
    $getcus = $customer->getCustomerById($_GET['id']);
    unlink("../images/". $getcus[0]['cus_img']);
    $del = $customer->deleteCustomer($_GET['id']);
}
header("location: customers.php");
?>