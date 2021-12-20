<?php
require("config.php");
require("models/db.php");
require("models/product.php");
$product = new ProductFood();
if (isset($_POST['submit'])) {
    $getProductById = $product->getProductById($_GET['id']);
    $id = $_GET['id'];
    $name = $_POST['name'];
    $type_id = $_POST['type_id'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $feature = $_POST['feature'];
    $sale = $_POST['sale'];
    $image = $_FILES['image']['name'];
    $xet = false;
    if (strlen($image) == 0) {
        $image = $getProductById[0]['image'];
        $xet = false;
    } else {
        $xet = true;
    }
    //Sua product
    $editproduct = $product->editProductsById($id, $name, $type_id, $desc, $image, $price, $sale, $feature);
    //Neu co chinh sua hinh anh
    if ($xet) {
        //Xoa hinh cu
        unlink("../images/". $getProductById[0]['image']);
        //upload hinh
        $target_dir = "../images/";
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
                header("location: products.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    header("location: products.php");
} else {
    header("location: products.php");
}
