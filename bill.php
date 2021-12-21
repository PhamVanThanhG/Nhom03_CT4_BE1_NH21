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
    //show all item of bill
    if(isset($_SESSION['cus_id'])):
        $Bill = new Bill;
        $getBillByIdUser = $Bill->getBillByIDUser($_SESSION['cus_id']);//get all bill by id user
        $idBill = 0;
        foreach($getBillByIdUser as $bill):
    ?>
    <div class="container border rounded border-primary" style="margin-bottom: 60px; margin-top: 60px;">
        <h2 class="text-center">Bill <?php echo $bill['id']?></h2>
        <p style="display: inline-block;">Create date: <?php echo $bill['date_create']?></p>
        <p style="display: inline-block; margin-left: 800px;">State: <?php echo $bill['state']?></p>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th colspan="2" style="width:0%">NO.</th>
                    <th style="width:56%;">Product Name</th>
                    <th style="width:8%" class="text-center">Size</th>
                    <th style="width:15%" class="text-center">Topping</th>
                    <th style="width:8%" class="text-center">Quantity</th>
                    <th style="width:20%" class="text-center">Price(đ)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //process bill
                    $BillProduct = new BillProduct;
                    $NO = 0;
                    $totalPrice = 0;
                    $getAllBill = $BillProduct->getByID($bill['id']);//get all product of bill
                    foreach($getAllBill as $item):
                        $NO++;
                ?>
                <tr>
                    <td colspan="2" data-th="NO"><?php echo $NO?></td>
                    <?php
                    //show info product
                        $product = new ProductFood;
                        $total = 0;
                        $getProductByID = $product->getProductByID($item['id_product']);
                        foreach($getProductByID as $prod):
                            if($prod['Sale'] > 0){
                                $total = $prod['Price']*(100 - $prod['Sale'])/100;
                            }else{
                                $total = $prod['Price'];
                            }
                    ?>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="./images/<?php echo $prod['image']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">
                                    <?php echo $prod['Name']?>
                                    <?php if($getProductByID[0]['Sale'] > 0):?>
                                    <span style="margin-left: 8px; color: #D10024; font-size: 70%; font-weight: 600; border: 2px solid; padding: 2px 4px; font-size: 10px;">- <?php echo $getProductByID[0]['Sale']?>%</span>
                                    <?php endif;?>
                                </h4>
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
                    <td data-th="Size" class="text-center"><?php echo $size['size']?></td>
                    <?php
                        endforeach;
                        $topping = new Topping;
                        $getToppingByID = $topping->getToppingByID($item['id_topping']);
                        foreach($getToppingByID as $topping):
                            $total = $total + $topping['price'];
                    ?>
                    <td data-th="Topping" class="text-center"><?php echo $topping['toping']; endforeach;?></td>
                    <td data-th="Quantity" class="text-center"><?php echo $item['quantity']?></td>
                    <td data-th="Subtotal" class="text-center"><?php echo number_format($total * $item['quantity']); $totalPrice += ($total * $item['quantity']);?> đ</td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="hidden-xs"></td>
                    <td colspan="2" class="hidden-xs text-center"><strong>Total price: <?php echo number_format($totalPrice)?> đ</strong></td>
                    <td>
                        <a href="#" <?php if($bill['state'] == "Deliver successfully"){ echo "hidden";}?> id="remove<?php echo $bill['id']?>" class="btn btn-danger btn-block" onclick="notify<?php echo $bill['id']?>()">Countermand <i class="fa fa-times"></i></a>
                    </td>
                    <td>
                        <a href="#" <?php if($bill['state'] == "Deliver successfully"){ echo "hidden";}?> id="confirm<?php echo $bill['id']?>" class="btn btn-success btn-block" onclick="confirmBill<?php echo $bill['id']?>()">Confirm <i class="fa fa-check"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php endforeach; endif;?>
    <script src="js/jquery-1.11.1.min.js"></script>
<script>
    // function loadXMLDoc() {
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("link-wrapper").innerHTML =
    //             this.responseText;
    //         }   
    //     };
    //     xhttp.open("GET", "bill_sever.php", true);
    //     xhttp.send();
    // }
    // setInterval(function(){
    //     loadXMLDoc();
    // }, 1000)
    // window.onload = loadXMLDoc;
    <?php foreach($getBillByIdUser as $bill):?>
    function notify<?php echo $bill['id']?>(){
        var a = document.getElementById('remove<?php echo $bill['id']?>');
        var state = "<?php echo $bill['state']?>";
        if(state === "Waiting for approval"){
            if(confirm("Are you agree to remove the order '<?php echo $bill['id']?>'?")){
                a.href = "remove_bill.php?id_bill=<?php echo $bill['id']?>";
            }else{
                a.href = "";
            }
        }else{
            alert("Products are being delivered! Please, wait a few more minutes!");
        }  
    }
    
    function confirmBill<?php echo $bill['id']?>(){
        var a = document.getElementById('confirm<?php echo $bill['id'];?>');
        var state = "<?php echo $bill['state'];?>";
        if(state === "Being processed"){
            if(confirm("Are you agree to confirm the order '<?php echo $bill['id']?>'?")){
                a.href = "add_history.php?id_bill=<?php echo $bill['id']?>";
            }else{
                a.href = "#";
            }
        }else{
            alert("The product is waiting for admin to censor! You can't confirm!");
        }  
    }
    <?php endforeach;?>
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
