<?php
include("config.php");
include("models/db.php");
include("models/toppings.php");
$toppings = new Topping();
if(isset($_POST['submit'])){
    $topping = $_POST['topping'];
    $price = $_POST['price'];
    $toppings->addTopping($topping, $price);
    //header("location: sizes.php");
}
header("location: toppings.php");