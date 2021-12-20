<!DOCTYPE html>
<html>
<?php 
include "header.php" 
?>

</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link type="text/css" rel="stylesheet" href="css/style_cart.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
                    <th style="width:8%">Quantity</th>
                    <th style="width:20%" class="text-center">Price</th>
                    <th style="width:16%"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //process cart
                if(isset($_SESSION['cus_id'])):
                $Cart = new Cart;
                $getAllCart = $Cart->getCartByIIDUser($_SESSION['cus_id']);
                $priceCart = 0;// to process total price of cart
                $CountCart = 0;// to process NO.
                $No = 0;
                //get total of number elements cart
                $CountCart = $Cart->countCart()[0]['COUNT(*)'];
                //Browser element of cart 
                foreach ($getAllCart as $value) :
                    $No++;
                ?>
                    <tr>
                        <td data-th="NO"><?php echo $No ?></td>
                        <?php
                        //show info product
                        $product = new ProductFood;
                        $total = 0;
                        $getProductByID = $product->getProductByID($value['id_product']);
                        if($getProductByID[0]['Sale'] > 0){
                            $total = $getProductByID[0]['Price']*(100 - $getProductByID[0]['Sale'])/100;
                        }else{
                            $total = $getProductByID[0]['Price'];
                        }
                        ?>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="./images/<?php echo $getProductByID[0]['image'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">
                                        <?php echo $getProductByID[0]['Name'] ?>
                                        <?php if($getProductByID[0]['Sale'] > 0):?>
                                        <span style="margin-left: 8px; color: #D10024; font-size: 70%; font-weight: 600; border: 2px solid; padding: 2px 4px; font-size: 10px;">- <?php echo $getProductByID[0]['Sale']?>%</span>
                                        <?php endif;?>
                                    </h4>
                                    <p><?php echo $getProductByID[0]['Decription'] ?></p>
                                </div>
                            </div>
                        </td>
                        <?php
                        //show info size
                        $size = new Size;
                        $getSizeByID = $size->getSizeByID($value['id_size']);
                        $getAllSize = $size->getAllSize();
                        $total = $total + $getSizeByID[0]['price'];
                        ?>
                        <form method="post" action="update_cart.php">
                            <td data-th="Size">
                                <select name="size-<?php echo $value['id_product'] ?>" id="size-<?php echo $value['id_product'] ?>" class="<?php echo $value['id_product'] ?>" disabled="disabled">
                                    <?php foreach ($getAllSize as $allSize) : ?>
                                        <option value=<?php echo $allSize['id'] ?> <?php if ($allSize['id'] == $getSizeByID[0]['id']) {echo "selected";} ?>><?php echo $allSize['size'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <?php
                            //show info topping
                            $topping = new Topping;
                            $getToppingByID = $topping->getToppingByID($value['id_topping']);
                            $getAllTopping = $topping->getAllTopping();
                            $total = $total + $getToppingByID[0]['price'];
                            ?>
                            <td data-th="Topping">
                                <select name="topping-<?php echo $value['id_product'] ?>" class="<?php echo $value['id_product'] ?>" disabled="disabled">
                                    <?php foreach ($getAllTopping as $allTopping) : ?>
                                        <option value=<?php echo $allTopping['id'] ?> <?php if ($allTopping['id'] == $getToppingByID[0]['id']) {echo "selected";} ?>><?php echo $allTopping['toping'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <?php //quantity?>
                            <td data-th="Quantity">
                                <input name="quantity-<?php echo $value['id_product'] ?>" class="<?php echo $value['id_product'] ?> form-control text-center" value=<?php echo $value['quantity'] ?> type="number" disabled="disabled">
                            </td>
                            <?php //Price?>
                            <td data-th="TotalPrice" class="text-center">
                                <?php 
                                    echo number_format($total * $value['quantity']);
                                    $priceCart = $priceCart + ($total * $value['quantity']);
                                ?> đ
                            </td>
                            <td class="actions" data-th="Action">
                                <?php //Button save?>
                                <button id="save<?php echo $value['id_product'] ?>" type="submit" class="btn btn-warning" hidden>Save</button>
                        </form>
                        <?php //button edit product?>
                        <button id="edit<?php echo $value['id_product'] ?>" 
                        class="btn btn-info btn-sm" onclick="removeClass(<?php echo $value['id_product'];?>)">
                            <i class="fa fa-edit"></i>
                        </button>
                        <?php //Button remove product?>
                        <a id="remove<?php echo $value['id_product'] ?>" href="remove_cart.php?id_product=<?php echo $value['id_product'] ?>">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr><?php // back to home?>
                    <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>  Keeping buying </a>
                    </td>
                    <td colspan="4" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Total: <?php echo number_format($priceCart) ?> đ</strong>
                    </td>
                    <?php
                    //send object data
                    // $array = json_encode($getAllCart);//encode to json
                    // $RequestArray = urlencode($array);
                    ?>
                    <?php //add bill ?>
                    <td>
                        <a id="pay" href="" onclick="notify()" class="btn btn-success btn-block confirmation" style="<?php if ($CountCart == 0) {echo "pointer-events: none ; cursor: default;";} ?>">Create bill  <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
            <?php endif;?>
        </table>
    </div>
    <!-- <script src="js/jquery-1.11.1.min.js"></script> -->
    <script>
        var check = 0;//to process notify
        //remove attribute disabled
        function removeClass(x) {
            <?php foreach ($getAllCart as $value) :?>
                if (<?php echo $value['id_product'] ?> === x) {
                    var s = document.getElementsByClassName("<?php echo $value['id_product'] ?>")[0].hasAttribute("disabled");
                    if (s === true) {
                        //remove disable
                        document.getElementsByClassName("<?php echo $value['id_product'];?>")[0].removeAttribute("disabled");
                        document.getElementsByClassName("<?php echo $value['id_product'] ?>")[1].removeAttribute("disabled");
                        document.getElementsByClassName("<?php echo $value['id_product'] ?>")[2].removeAttribute("disabled");
                        document.getElementById('edit<?php echo $value['id_product'] ?>').style.visibility = 'hidden';
                        document.getElementById('remove<?php echo $value['id_product'] ?>').style.visibility = 'hidden';
                        document.getElementById('save<?php echo $value['id_product'] ?>').removeAttribute("hidden");
                        check = 1;
                    }
                }
            <?php endforeach; ?>
        }
        //process notify when press button "create bill"
        function notify(){
            var a = document.getElementById('pay');
            if(check === 1){
                if(!confirm("Cart can not save yet! Are you want to continue?")){
                    a.href = "";
                }else{
                    a.href = "add_bill.php";
                }
            }else{
                a.href = "add_bill.php";
            }
        }
        //process when user back to page
        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        });
    </script>
    <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <?php
  if (isset($_SESSION['username'])) {
  ?>
    <script>
      document.getElementById("login").style.display = 'none';
      document.getElementById("logout").style.display = 'inline';
    </script>
  <?php
  }
  ?>
</body>

</html>
