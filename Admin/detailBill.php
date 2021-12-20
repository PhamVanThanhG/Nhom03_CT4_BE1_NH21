<?php
require("config.php");
require("models/db.php");
require("models/bill.php");
$bills = new Bill();
if (isset($_GET['id'])) {
    $getBillByID = $bills->getBillById($_GET['id'])
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Bill</title>
        <style>
            body {
                background: url("../images/cong-ty-lotteria-2.jpg");
            }

            th {
                padding: 0 10px;
            }

            td {
                padding: 0 10px;
            }

            .nd {
                background-color: #ffffffdb;
                margin-top: 30px;
                margin-bottom: 30px;
                margin-left: 60px;
                margin-right: 60px;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align: center; text-transform: uppercase;">BILL</h1>
        <div class="nd">
            <ul style="display: flex;">
                <br>
                <li style="width: 35%;list-style-type: none;font-size: larger;">
                    <span style="font-weight: bolder; font-size: x-large; color: #850707;">BILL ID: </span> <?php echo ($getBillByID[0]['id']) ?>
                </li>
                <li style="width: 35%;list-style-type: none;">
                    <span style="font-weight: bolder; font-size: x-large; color: #850707;">Day created bill: </span> <?php echo ($getBillByID[0]['date_create']) ?>
                </li>
                <li style="width: 35%;list-style-type: none;">
                    <span style="font-weight: bolder; font-size: x-large; color: #850707;">Bill state: </span> <?php echo ($getBillByID[0]['state']) ?>
                </li>
            </ul>
            <h2 style="padding-left: 40px;">INFORMATION OF CUSTOMER</h2>
            <ul style="display: flex;">
                <li style="width: 30%;list-style-type: none; padding-left: 20px;">
                    <span style="font-weight: bolder; font-size: larger;">Customer ID: </span> <?php echo ($getBillByID[0]['Cus_Id']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Username: </span> <?php echo ($getBillByID[0]['Username']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Email: </span> <?php echo ($getBillByID[0]['Email']) ?>
                </li>
                <li style="width: 30%;list-style-type: none;">
                    <ul style="display: flex;">
                        <li style="width: 20%;list-style-type: none;"> <span style="font-weight: bolder; font-size: larger;">Image: </span></li>
                        <li style="width: 30%;list-style-type: none;">
                            <?php
                            if ($getBillByID[0]['cus_img'] == null) {
                                echo ("Customer have not added any pictures yet!");
                            } else {
                            ?>
                                <img src="../images/<?php echo ($getBillByID[0]['cus_img']); ?>" alt="Customer image" style="width: 130px; height: 150px;">
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </li>
                <li style="width: 30%;list-style-type: none;">
                    <span style="font-weight: bolder; font-size: larger;">Birthday: </span> <?php echo ($getBillByID[0]['Birthday']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Phone: </span> <?php echo ($getBillByID[0]['Phone']) ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Address: </span>
                    <?php
                    $address = "";
                    if ($getBillByID[0]['add_Address'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getBillByID[0]['add_Address'] . ", ";
                    }
                    if ($getBillByID[0]['wards'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getBillByID[0]['wards'] . ", ";
                    }
                    if ($getBillByID[0]['district'] == null) {
                        $address = $address . "empty, ";
                    } else {
                        $address = $address . $getBillByID[0]['district'] . ", ";
                    }
                    if ($getBillByID[0]['district'] == null) {
                        $address = $address . "empty";
                    } else {
                        $address = $address . $getBillByID[0]['province/city'];
                    }
                    if ($address == "empty, empty, empty, empty") {
                        echo ("empty");
                    } else {
                        echo ($address);
                    }
                    ?>
                    <br>
                    <br>
                    <span style="font-weight: bolder; font-size: larger;">Rank: </span> <?php echo ($getBillByID[0]['rank']) ?>
                    <br>
                    <br>
                </li>
            </ul>
            <?php
            //Lay chi tiet san pham
            $getDetailsBill = $bills->getDetailBillByBillId($_GET['id']);
            ?>
            <h2 style="padding-left: 40px;color: navy;">BILL DETAILS</h2>
            <div style="padding-left: 70px;">
                <table border="1">
                    <tr>
                        <th>Product id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Topping</th>
                        <th>Topping price</th>
                        <th>Quantity</th>
                        <th>Sale</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $tong = 0;
                    $sale = 0;
                    $total = 0;
                    $saletemp = 0;
                    foreach ($getDetailsBill as $value) {
                    ?>
                        <tr>
                            <td><?php echo ($value['id_product']) ?></td>
                            <td><?php echo ($value['Name']) ?></td>
                            <td><img src="../images/<?php echo ($value['image']); ?>" alt="Product image" style="width: 130px; height: 100px;object-fit: cover;"></td>
                            <td><?php echo ($value['size']) ?></td>
                            <td><?php
                                $tong = $value['Price']*((100 - $value['Sale']) / 100);
                                if($value['Sale'] > 0){
                                    $saletemp = $value['Price']*($value['Sale'] / 100);
                                }
                                $tong += $value['sizePrice'];
                                echo (number_format($value['Price'] + $value['sizePrice']));
                                ?> VND</td>
                            <td><?php echo ($value['toping']) ?></td>
                            <td><?php echo (number_format($value['topppingPrice'])) ?> VND</td>
                            <td><?php echo ($value['quantity']) ?></td>
                            <td><?php echo ($value['Sale']) ?> %</td>
                            <td><?php 
                            $tong +=$value['topppingPrice'];
                            $tong = $tong * $value['quantity'];
                            $saletemp = $saletemp * $value['quantity'];
                            echo (number_format($tong)) ?> VND</td>
                        </tr>
                        <?php
                        $total += $tong;
                        $sale += $saletemp;
                        $saletemp = 0;
                        $tong = 0;
                        ?>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <h2 style="padding-left: 40px;color: #6a6a6a;">Total order before discount: <?php
                                                                                    echo (number_format($sale + $total))
                                                                                    ?> VND</h2>
            <h2 style="padding-left: 40px;color: #6a6a6a;">Sale: <?php
                                                                                    echo (number_format($sale))
                                                                                    ?> VND</h2>
            <h2 style="text-transform: uppercase;padding-left: 40px;">Total orders: <?php
                                                                                    echo (number_format($total))
                                                                                    ?> VND</h2>
        </div>
        <a href="bills.php"><button style="font-size: larger;padding: 5px 5px;">Back</button></a>
    </body>

    </html>
<?php
} else {
    header("location: bills.php");
}
?>