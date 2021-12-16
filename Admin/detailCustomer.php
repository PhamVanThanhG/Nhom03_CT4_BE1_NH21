<?php
require("config.php");
require("models/db.php");
require("models/customer.php");
$customer = new Customer();
if (isset($_GET['id'])) {
    $getCusById = $customer->getCustomerById($_GET['id'])
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Customer</title>
        <style>
            body {
                background: url("../images/cong-ty-lotteria-2.jpg");
            }

            .nd {
                background-color: #000000d9;
                margin-bottom: 30px;
                margin-left: 60px;
                margin-right: 60px;
                color: white;
            }
        </style>
    </head>

    <body>
    <h1 style="text-align: center; text-transform: uppercase;">Information of customer</h1>
        <div class="nd">
            <ul style="display: flex;">
                <li style="width: 50%;list-style-type: none;">
                    <span style="font-weight: bolder; font-size: larger;">Customer ID: </span> <?php echo ($getCusById[0]['Cus_Id']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Username: </span> <?php echo ($getCusById[0]['Username']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Email: </span> <?php echo ($getCusById[0]['Email']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Password: </span> <?php echo ($getCusById[0]['Password']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Image: </span> <br>
                    <?php
                    if ($getCusById[0]['cus_img'] == null) {
                        echo ("Customer have not added any pictures yet!");
                    } else {
                    ?>
                        <img src="../images/<?php echo ($getCusById[0]['cus_img']); ?>" alt="Customer image" style="width: 350px; height: 300px;object-fit: cover;">
                    <?php
                    }
                    ?>
                </li>
                <li style="width: 50%;list-style-type: none;">
                    <span style="font-weight: bolder; font-size: larger;">Birthday: </span> <?php echo ($getCusById[0]['Birthday']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Phone: </span> <?php echo ($getCusById[0]['Phone']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Address: </span>
                    <?php
                    $address = "";
                    if ($getCusById[0]['add_Address'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getCusById[0]['add_Address'] . ", ";
                    }
                    if ($getCusById[0]['wards'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getCusById[0]['wards'] . ", ";
                    }
                    if ($getCusById[0]['district'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getCusById[0]['district'] . ", ";
                    }
                    if ($getCusById[0]['district'] == null) {
                        $address = $address . "empty";
                    } else {
                        $address = $address . $getCusById[0]['province/city'];
                    }
                    if ($address == "empty, empty, empty, empty") {
                        echo ("empty");
                    } else {
                        echo ($address);
                    }
                    ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Rank: </span> <?php echo ($getCusById[0]['rank']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Comment: </span>
                    <?php
                    if ($getCusById[0]['Comment'] == null) {
                        echo ("Customers have not commented on the store yet!");
                    } else {
                        echo ($getCusById[0]['Comment']);
                    }
                    ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Day create account: </span> <?php echo ($getCusById[0]['DayCreate']) ?>
                    <br>
                    <br>
                </li>
            </ul>
        </div>
        <a href="customers.php"><button style="font-size: larger;padding: 5px 5px;">Back</button></a>
    </body>

    </html>
<?php
} else {
    header("location: customers.php");
}
?>