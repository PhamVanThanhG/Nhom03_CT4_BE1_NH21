<?php
include("config.php");
include("models/db.php");
include("models/sizes.php");
$sizes = new Sizes();
if(isset($_POST['submit'])){
    $size = $_POST['size'];
    $price = $_POST['price'];
    $sizes->addSize($size, $price);
    //header("location: sizes.php");
}
header("location: sizes.php");