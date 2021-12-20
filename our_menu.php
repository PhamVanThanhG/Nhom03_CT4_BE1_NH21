<!-- food section -->

<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Menu
      </h2>
    </div>
    <?php
     $Menu = new Menu;
     $getAllMenu = $Menu->getAllMenu();
    ?>
    <ul class="filters_menu">
      <li <?php if(!isset($_GET['type_id']) || (isset($_GET['type_id']) && $_GET['type_id'] == 0)){echo "class='active'";}?>><a href="index.php?type_id=0">All</a></li>
      <?php foreach($getAllMenu as $menu):?>
      <li <?php if(isset($_GET['type_id']) && $_GET['type_id'] == $menu['Type_Id']){echo "class='active'";} ?>><a href="index.php?type_id=<?php echo $menu['Type_Id']?>"><?php echo $menu['Type_Name']?></a></li>
      <?php endforeach;?>
    </ul>

    <div class="filters-content">
      <div class="row grid">
        <?php
        //var
        $Product = new ProductFood;
        $arrProducts = array();
        $total = 0;
        $url = "";

        //products show in a page
        $perPage = 6;

        //get current page
        $page = isset($_GET['page'])?$_GET['page']:1;

        //Function: process when get type or not
        if(!isset($_GET['type_id']) || $_GET['type_id'] == 0){
          $getAllproducts = $Product->getAllProducts();

          //total:  size of product
          $total = count($getAllproducts);

          //set link current
          $url = $_SERVER['PHP_SELF']."?type_id=0";

          //get array product
          $arrProducts = $Product->getSixProducts($page, $perPage);
        }else{
          $type_id = $_GET['type_id'];
          $getProductsByType = $Product->getProductsByType($type_id);

          //total number of product
          $total = count($getProductsByType);

          //get link current
          $url = $_SERVER['PHP_SELF']."?type_id=".$_GET['type_id'];

          //get array product
          $arrProducts = $Product->getProductsForPage($type_id,$page, $perPage);
        }

        //run elements of array
        foreach ($arrProducts as $value) :
        ?>
            <div class="col-sm-6 col-lg-4 all">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="images/<?php echo $value['image']; ?>" alt="">
                    <?php if($value['Sale'] > 0):?>
                    <div class="product-label">
									    <span class="sale">-<?php echo $value['Sale']?>%</span>
								    </div>
                    <?php endif;?>
                  </div>
                  <div class="detail-box">
                    <h5>
                      <a href="detail.php?id=<?php echo $value['Id']?>">
                      <?php echo $value['Name'] ?>
                      </a>
                    </h5>
                    <p>
                      <?php
                      //split String
                       $decr = str_split($value['Decription']);
                       $t = 0;
                       //print decript
                       foreach($decr as $i){
                         echo $i;
                         $t++;
                         //Condition to print continue or not
                         if($t > 50){
                           if($i == " "){
                            break;
                           }
                         }
                       }
                      ?>...<a style="font-size: 8xp; font-style: italic; font-weight: 100; color: #3a7ead;" href="<?php echo 'detail.php?id=' . $value['Id'] ?>">see more</a>
                    </p>
                    <div class="options">
                      <h6>
                        <?php 
                          if($value['Sale'] == 0){
                            echo number_format($value['Price']);
                          }else{
                            echo number_format(($value['Price']*(100 - $value['Sale']))/100);
                          }
                        ?>
                        đ
                        <?php if($value['Sale'] > 0):?>
									      <del style="font-size: 80%; font-weight: 400; color: #8D99AE;"><?php echo number_format($value['Price']);?> đ</del>
                        <?php endif;?>
                      </h6>
                      <!-- khúc này là cái cart -->
                      <a href="<?php if(isset($_SESSION['cus_id'])){ echo "add_cart.php?id_product=" . $value['Id'];}?>">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>
      </div>
    </div>
    <!-- store bottom filter -->
    <div class="store-filter clearfix">
      <ul class="store-pagination" style="margin-top: 40px;">
        <?php
        if($total > 6){
          echo $Product->paginateForMenu($url, $total, $perPage);
        }
        ?>
      </ul>
    </div>
  </div>
</section>
<!-- end food section -->