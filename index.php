<?php
session_start();
?>
<?php
require "config.php";
require "models/db.php";
require "models/db_product.php";
require "models/db_menu.php";
require "models/customer.php";
$menu = new Menu();
// //get ID of Pizza in database
// $name_Menu = "Pizaa";
// $IDMenuByName = $menu->getIDMenuByNameMenu($name_Menu);
// //get Products by ID got 
// $getProductsByType = $product->getProductsByType($IDMenuByName);
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Feane </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Feane
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto " style="padding-left: 100px;">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book.php">Book Table</a>
              </li>
            </ul>
            <div class="user_option"><?php #Process seach product?>
              <form class="form-inline" method="get" action="menu.php">
                <input type="search" name="key" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              <div class="dropdown">
                <i class="fa fa-user user_link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="bill.php">My bill</a>
                  <a class="dropdown-item" href="buy_history.php">Buy history</a>
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </div>
              <a class="cart_link" href="cart.php">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
              </a>
              <a href="login.php" class="order_online" id="login">
                Login
              </a>
              <a href="logout.php" class="order_online" id="logout" style="background-color: #33ff99; color: black; display: none;">
                Logout
              </a>
            </div>

          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php 
            $product = new ProductFood;
            $getFeature = $product->getProductsByFeature();
            $dem = 0;
            foreach($getFeature as $prod):
              $dem++;
          ?>
          <div class="carousel-item <?php if($dem == 1){echo "active";}?>">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <img src="images/<?php echo $prod['image']?>" alt="anh san pham" class="bd rounded" width="220px" style="margin-bottom: 20px; display: inline-block;">
                    <div style="display: inline-block; margin-left: 16px;">
                      <h2>
                        <a style="color: while; background: none; padding: 0px; margin: 0px;" href="detail.php?id=<?php echo $prod['Id']?>">
                        <?php echo $prod['Name']?>
                        </a>
                      </h2>
                      <h5 style="display: inline-block; margin-right: 30px; color: white;"><?php echo number_format($prod['Price'])?> đ</h5>
                    </div>
                    <p style="height: 80px;">
                      <?php echo $prod['Decription']?>
                    </p>
                    <div class="btn-box">
                      <a href="add_cart.php?id_product=<?php echo $prod['Id']?>" class="btn1" style="display: inline-block;">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <?php endforeach;?>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <?php
              for($i = 0; $i < $dem; $i++):
            ?>
            <!-- <li data-target="#customCarousel1" data-slide-to="0" class="active"></li> -->
            <li data-target="#customCarousel1" data-slide-to="<?php echo $i?>" <?php if($i == 0){ echo "class='active'";}?>></li>
            <!-- <li data-target="#customCarousel1" data-slide-to="2"></li> -->
            <?php endfor;?>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <?php
            $arr2ProdSale = $product->get2TopSaleProd();
          ?>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/<?php echo $arr2ProdSale[0]['image']?>" alt="" width="175" height="165">
              </div>
              <div class="detail-box">
                <h5>
                  <?php echo $arr2ProdSale[0]['Name']?>
                </h5>
              
                <h6>
                  <a href="menu_sale.php?type=<?php echo $arr2ProdSale[0]['Type_Id']?>" style="color: while; background: none; padding: 0px; margin: 0px;">
                  <span><?php echo $arr2ProdSale[0]['Sale']?>%</span> Off
                  </a>
                </h6>
              
                <a href="">
                  Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/<?php echo $arr2ProdSale[1]['image']?>" alt="" width="175" height="165">
              </div>
              <div class="detail-box">
                <h5>
                <?php echo $arr2ProdSale[1]['Name']?>
                </h5>
                <h6>
                  <a href="menu_sale.php?type=<?php echo $arr2ProdSale[0]['Type_Id']?>" style="color: while; background: none; padding: 0px; margin: 0px;">
                  <span><?php echo $arr2ProdSale[1]['Sale']?>%</span> Off
                  </a>
                </h6>
                <a href="">
                  Order Now <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z" />
                      </g>
                    </g>
                    <g>
                      <g>
                        <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                      </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <?php require "our_menu.php"; ?>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Feane
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
              the middle of text. All
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <select class="form-control nice-select wide">
                  <option value="" disabled selected>
                    How many persons?
                  </option>
                  <option value="">
                    2
                  </option>
                  <option value="">
                    3
                  </option>
                  <option value="">
                    4
                  </option>
                  <option value="">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <?php
            #process comment
            $Customer = new Customer;
            //get comment
            $arrComment = $Customer->getComment();
            for($i = 0; $i < (sizeof($arrComment) - 1); $i++){
              if($arrComment[$i]['comment_date'] == $arrComment[$i + 1]['comment_date']){
                $temp = $arrComment[$i];
                $arrComment[$i] = $arrComment[$i + 1];
                $arrComment[$i + 1] = $temp;
              }
            }
            foreach($arrComment as $comment):
          ?>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                   <?php echo $comment['Comment']?>
                </p>
                <h6>
                <?php echo $comment['Username']?>
                </h6>
                <p>
                <?php echo $comment['comment_date']?>
                </p>
              </div>
              <div class="img-box">
                <img src="images/<?php echo $comment['cus_img']?>" alt="" class="box-img">
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>
  </section>
  <form class="review-form" style="margin-left: 160px; margin-right: 160px; margin-bottom: 60px;" method="post" action="add_comment_store.php">
  <div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" placeholder="Add your comment..."></textarea>
  </div>
  <button type="submit" class="btn btn-danger" <?php if(!isset($_SESSION['cus_id'])){ echo "disabled";}?>>Submit</button>
    <?php
      if(!isset($_SESSION['cus_id'])):
    ?>
    <p> You need to login first before write your comment!</p>
    <?php endif;?>
</form>
  <!-- end client section -->

  <?php
  include("footer.php");
  ?>
    <?php
  //XU ly khi dang nhap thanh cong
  if (isset($_SESSION['username'])) {
    if (isset($_SESSION['xet'])) {
      //Xet quyen
      if ($_SESSION['admin']) {
        $per = "admin ";
      } else {
        $per = "customer ";
      }
      echo ("<script>
        alert(\"Account " . $per . $_SESSION['username'] . " is login succesfully\");
        </script>");
      unset($_SESSION['xet']);
    }
  }
  ?>