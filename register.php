<?php
require("config.php");
require("models/db.php");
include("models/customer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-image: url("images/bg1.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container{
            margin: 70px 150px;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container">
         <p style="text-align: center;"><img src="images/success.png" alt="">
         <br>
         <h1 style="text-align: center;">REGISTRATION SUCCESSFUL</h1>
         <h1 style="color: darkred; text-align: center;">Thank <?php echo $_GET['user'] ?> used our service!</h1>
         <br>
         <h2 style="text-align: center;"><a href="login.php">Login</a> to order food now</h2>
        </p>
        
    </div>
</body>

</html>