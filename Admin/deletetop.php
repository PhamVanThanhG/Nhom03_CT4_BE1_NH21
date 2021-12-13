<?php
session_start();
require("config.php");
require("models/db.php");
require("models/toppings.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $toppings = new Topping();
    $toppings->deleteToping($id);
}
header("location: toppings.php");