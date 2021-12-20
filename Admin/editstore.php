<?php
if (isset($_POST['submitEdit'])) {
    session_start();
    require("config.php");
    require("models/db.php");
    require("models/store.php");
    $store = new Store();
    $title = "Products";
    $Store_Name = $_POST['Store_Name'];
    $Location = $_POST['Location'];
    $Phone_Number = $_POST['Phone_Number'];
    $Email = $_POST['Email'];
    $Facebook = $_POST['Facebook'];
    $Twitter = $_POST['Twitter'];
    $Linkedin = $_POST['Linkedin'];
    $Instagram = $_POST['Instagram'];
    $Pinterest = $_POST['Pinterest'];
    $Opening_day = $_POST['Open_day'];
    $Open_time = $_POST['Open_time'];
    $Short_Description = $_POST['Short_Description'];
    $Long_Description = $_POST['Long_Description'];
    //Edit store
    $edit = $store->editStore($Store_Name, $Location, $Phone_Number, $Email, $Facebook, $Twitter, $Linkedin, $Instagram, $Pinterest, $Opening_day, $Open_time, $Long_Description, $Short_Description);
    $_SESSION['edit'] = true;
    header("Location: index.php");
} else {
    header("Location: index.php");
}
