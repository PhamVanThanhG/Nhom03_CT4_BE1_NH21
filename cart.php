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
    <h1 class="text-center" style="margin: 40px 0px 80px 0px;">Your cart</h1>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:0%">ID</th>
                    <th style="width:40%">Name</th>
                    <th style="width:8%">Size</th>
                    <th style="width:15%">Topping</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:20%" class="text-center">Thành tiền</th>
                    <th style="width:16%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $Cart = new Cart;
                    $getAllCart = $Cart->getAllCart();
                    foreach($getAllCart as $value):
                ?>
                <tr>
                    <td data-th="ID"><?php echo $value['id_product']?></td>
                    <?php
                        $product = new ProductFood;
                        $total = 0;
                        $getProductByID = $product->getProductByID($value['id_product']);
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
                        $getSizeByID = $size->getSizeByID($value['id_size']);
                        foreach($getSizeByID as $size):
                            $total = $total + $size['price'];

                    ?>
                    <td data-th="Size"><?php echo $size['size']?></td>
                    <?php
                        endforeach;
                        $topping = new Topping;
                        $getToppingByID = $topping->getToppingByID($value['id_topping']);
                        foreach($getToppingByID as $topping):
                            $total = $total + $topping['price'];
                    ?>
                    <td data-th="Topping"><?php echo $topping['toping']; endforeach;?></td>
                    <td data-th="Quantity"><input class="form-control text-center" value=<?php echo $value['quantity']?> type="number">
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo $total?> đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="http://hocwebgiare.com/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="4" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong>
                    </td>
                    <td><a href="http://hocwebgiare.com/" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>
