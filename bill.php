<!DOCTYPE html>
<html>
<?php include "header.php"?>
</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/style_cart.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <h1 class="text-center">My Bill</h1>
    <?php 
            $Bill = new Bill;
            $getBillByIdUser = $Bill->getBillByIDUser(1);
            foreach($getBillByIdUser as $bill):
        ?>
    <div class="container" style="margin-bottom: 60px;">
        <h3>ID bill : <?php echo $bill['id']?></h3>
        <p style="display: inline-block;">Create date: <?php echo $bill['date_create']?></p>
        <p style="display: inline-block; margin-left: 800px;">State: <?php echo $bill['state']?></p>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:0%">NO.</th>
                    <th style="width:56%">Product Name</th>
                    <th style="width:8%">Size</th>
                    <th style="width:15%">Topping</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:20%" class="text-center">Price(đ)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $BillProduct = new BillProduct;
                    $NO = 0;
                    $getAllBill = $BillProduct->getAllBill($bill['id']);
                    foreach($getAllBill as $item):
                        $NO++;
                ?>
                <tr>
                    <td data-th="NO"><?php echo $NO?></td>
                    <?php
                        $product = new ProductFood;
                        $total = 0;
                        $getProductByID = $product->getProductByID($item['id_product']);
                        foreach($getProductByID as $prod):
                            $total = $prod['Price'];
                    ?>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="./images/<?php echo $prod['image']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $prod['Name']?></h4>
                                <p><?php echo $prod['Decription']?></p>
                            </div>
                        </div>
                    </td>
                    <?php 
                        endforeach;
                        $size = new Size;
                        $getSizeByID = $size->getSizeByID($item['id_size']);
                        foreach($getSizeByID as $size):
                            $total = $total + $size['price'];

                    ?>
                    <td data-th="Size"><?php echo $size['size']?></td>
                    <?php
                        endforeach;
                        $topping = new Topping;
                        $getToppingByID = $topping->getToppingByID($item['id_topping']);
                        foreach($getToppingByID as $topping):
                            $total = $total + $topping['price'];
                    ?>
                    <td data-th="Topping"><?php echo $topping['toping']; endforeach;?></td>
                    <td data-th="Quantity"><?php echo $item['quantity']?></td>
                    <td data-th="Subtotal" class="text-center"><?php echo ($total * $item['quantity'])?> đ</td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="cart.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay về</a>
                    </td>
                    <td colspan="3" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong>
                    </td>
                    <td><a href="#" class="btn btn-success btn-block">Xác nhận <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php endforeach;?>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>
