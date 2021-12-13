<?php
require("config.php");
require("models/db.php");
require("models/toppings.php");
$toppings = new Topping();
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $topping = $_POST['topping'];
    $price = $_POST['price'];
    $toppings->editToppingById($id, $topping, $price);
    header("location: toppings.php");
} else {
    header("location: toppings.php");
}
