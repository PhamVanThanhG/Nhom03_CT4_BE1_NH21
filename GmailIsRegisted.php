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
         <p style="text-align: center;"><img src="images/fail.png" alt="" height="250" width="250">
         <br>
         <h1 style="text-align: center;">REGISTRATION FAIL</h1>
         <h1 style="color: darkred; text-align: center;">Email <?php echo($_GET['gmail']) ?> is created an account.</h1>
         <h1 style="text-align: center;">Please use another email to create an account</h1>
         <br>
         <h2 style="text-align: center;"><a href="login.php">Back to Login</a></h2>
        </p>
        
    </div>
</body>

</html>