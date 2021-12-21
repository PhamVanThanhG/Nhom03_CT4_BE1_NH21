<?php
session_start();
if (!isset($_SESSION['cus_id'])) {
    header("Location: index.php");
}
require("config.php");
require("models/db.php");
require("models/customer.php");
$customer = new Customer();
if (isset($_POST['submit'])) {
    $getCusById = $customer->getCustomerById($_SESSION['cus_id']);
    $id = $_SESSION['cus_id'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $cus_img = $_FILES['image']['name'];
    $birthday = $_POST['Birthday'];
    $phone = $_POST['Phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $wards = $_POST['wards'];
    $addAd = $_POST['addAd'];
    $rank = $_POST['rank'];
    $xet = false;
    if (strlen($cus_img) == 0) {
        $cus_img = $getCusById[0]['cus_img'];
        $xet = false;
    } else {
        $xet = true;
    }
    //Sua product
    $editcus = $customer->editCustomerById($id, $username, $email, $cus_img, $birthday, $phone, $city, $district, $wards, $addAd, $rank);
    //Neu co chinh sua hinh anh
    if ($xet) {
        //Xoa hinh cu
        unlink("images/" . $getCusById[0]['cus_img']);
        //upload hinh
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    header("location: book.php");
} else {
    header("location: book.php");
}
