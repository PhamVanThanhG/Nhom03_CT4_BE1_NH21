<?php
if (isset($_POST['submit'])) {
    $title = "Products";
    include("header.php");
    $Store_Name = $_POST['Store_Name'];
    //Edit store
    $edit = $store->editStore($Store_Name, $Location, $Phone_Number, $Email, $Facebook, $Twitter, $Linkedin, $Instagram, $Pinterest, $Opening_day, $Open_time, $Long_Description, $Short_Description);
}else{
    header("Location: index.php");
}
?>