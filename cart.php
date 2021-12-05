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
    <h1 class="text-center" style="margin: 40px 0px 80px 0px;">My cart</h1>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:0%">NO.</th>
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
                    $getAllCart = $Cart->getCartByIIDUser(1);
                    $CountCart = 0;
                    $No = 0;
                    // $check = "";
                    foreach($Cart->countCart() as $count){
                        $CountCart = $count['COUNT(*)'];
                    }
                    foreach($getAllCart as $value):
                        $No++;
                ?>
                <tr>
                    <td data-th="NO"><?php echo $No?></td>
                    <?php
                        $product = new ProductFood;
                        $total = 0;
                        $getProductByID = $product->getProductByID($value['id_product']);
                        $total = $getProductByID[0]['Price'];
                    ?>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="./images/<?php echo $getProductByID[0]['image']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $getProductByID[0]['Name']?></h4>
                                <p><?php echo $getProductByID[0]['Decription']?></p>
                            </div>
                        </div>
                    </td>
                    <?php 
                        $size = new Size;
                        $getSizeByID = $size->getSizeByID($value['id_size']);
                        $getAllSize = $size->getAllSize();
                        $total = $total + $getSizeByID[0]['price'];
                    ?>
                    <form method="post" action="update_cart.php">
                    <td data-th="Size">
                        <select name="size<?php echo $value['id_product']?>" id="size-<?php echo $value['id_product']?>" class="<?php echo $value['id_product']?>" disabled="disabled">
                        <?php foreach($getAllSize as $allSize):?>
                            <option value=<?php echo $allSize['id']?> <?php if($allSize['id'] == $getSizeByID[0]['id']){echo "selected";}?>><?php echo $allSize['size']?></option>
                        <?php endforeach;?>
                        </select>
                    </td>
                    <?php
                        $topping = new Topping;
                        $getToppingByID = $topping->getToppingByID($value['id_topping']);
                        $getAllTopping = $topping->getAllTopping();
                        $total = $total + $getToppingByID[0]['price'];
                    ?>
                    <td data-th="Topping">
                        <select name="topping<?php echo $value['id_product']?>" class="<?php echo $value['id_product']?>" disabled="disabled">
                        <?php foreach($getAllTopping as $allTopping):?>
                            <option  value=<?php echo $allTopping['id']?> <?php if($allTopping['id'] == $getToppingByID[0]['id']){echo "selected";}?>><?php echo $allTopping['toping']?></option>
                        <?php endforeach;?>
                        </select>
                    </td>
                    <td data-th="Quantity">   
                        <input name="quantity<?php echo $value['id_product']?>" class="<?php echo $value['id_product']?> form-control text-center" value=<?php echo $value['quantity']?> type="number" disabled="disabled">
                    </td>
                    <td data-th="TotalPrice" class="text-center"><?php echo ($total * $value['quantity']); $Price = $total * $value['quantity'];?> đ</td>
                    <td class="actions" data-th="Action">
                        <button id="save<?php echo $value['id_product']?>" type="submit" class="btn btn-primary" hidden>Save</button>
                        </form>
                        <button id="edit<?php echo $value['id_product']?>" class="btn btn-info btn-sm" onclick="removeClass(<?php echo $value['id_product']?>)"><i class="fa fa-edit"></i></button>
                        <a id="remove<?php echo $value['id_product']?>" href="remove_cart.php?id_product=<?php echo $value['id_product']?>">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="4" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 500.000 đ</strong>
                    </td>
                    <?php
                        // $array = json_encode($getAllCart);//encode to json
                        // $RequestArray = urlencode($array);
                    ?>
                    <td>
                        <a href="add_bill.php?id_user=1" class="btn btn-success btn-block" style="<?php if($CountCart == 0){echo "pointer-events: none ; cursor: default;";}?>">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script>
        function removeClass(x) {
            <?php foreach($getAllCart as $value):?>
                if(<?php echo $value['id_product']?> === x){
                    var s = document.getElementsByClassName("<?php echo $value['id_product']?>")[0].hasAttribute("disabled");
                    if(s === false){
                        //Update database
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[0].setAttribute("disabled", "disabled"); 
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[1].setAttribute("disabled", "disabled");
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[2].setAttribute("disabled", "disabled");
                        document.getElementById('edit<?php echo $value['id_product']?>').style.visibility = 'visible';
                        document.getElementById('remove<?php echo $value['id_product']?>').style.visibility = 'visible';
                    }else{
                        //remove disable
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[0].removeAttribute("disabled"); 
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[1].removeAttribute("disabled"); 
                        document.getElementsByClassName("<?php echo $value['id_product']?>")[2].removeAttribute("disabled"); 
                        document.getElementById('edit<?php echo $value['id_product']?>').style.visibility = 'hidden';
                        document.getElementById('remove<?php echo $value['id_product']?>').style.visibility = 'hidden';
                        document.getElementById('save<?php echo $value['id_product']?>').removeAttribute("hidden")
                    }
                }
            <?php endforeach;?>
        }
    </script>
</body>

</html>
