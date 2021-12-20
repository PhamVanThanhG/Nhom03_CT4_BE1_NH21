<?php
session_start();
require("config.php");
require("models/db.php");
require("models/sizes.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sizes = new Sizes();
    $sizes->delSize($id);
    header("Location: sizes.php");
}
header("location: sizes.php");