<!DOCTYPE html>
<?php
include "header.php"
?>

</html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Menu</a></li>
						<li><a href="#"><?php $TypeProduct = new TypeProduct; if(isset($_GET['id'])){$getNameType = $TypeProduct->getNameTypeByID($_GET['id']);} foreach($getNameType as $value){echo $value['Name'];}  ?></a></li>
						<li class="active"><?php $Product = new ProductFood; if(isset($_GET['id'])){$getProductByID = $Product->getProductByID($_GET['id']);} foreach($getProductByID as $value){echo $value['Name'];}?></li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<?php
				if (isset($_GET['id'])) :
					$ImageArray = new ImageArray;
					$Rating = new Rating;
					$Size = new Size;
					$Topping = new Topping;
					$History = new PurchaseHistory;
					$check = 0;
					if(sizeof($History->getByIDUser(1)) > 0){
						$check = 1;
					}else{
						$check = 0;
					}
					$id = $_GET['id'];
					$quantity = 1;
					$countRating = $Rating->countRatingByID($id);
					$getImageArray = $ImageArray->getImageArrayByID($id);
					foreach ($getProductByID as $value) :
						foreach ($getImageArray as $img) :
							$arrIMG = explode(",", $img['image']);
				?>
							<div class="col-md-5 col-md-push-2">
								<div id="product-main-img">
									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[0] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[1] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[2] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[0] ?>" alt="">
									</div>
								</div>
							</div>
							<!-- /Product main img -->

							<!-- Product thumb imgs -->
							<div class="col-md-2  col-md-pull-5">
								<div id="product-imgs">
									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[0] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[1] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[2] ?>" alt="">
									</div>

									<div class="product-preview">
										<img src="./images/<?php echo $arrIMG[0] ?>" alt="">
									</div>
								</div>
							</div>
							<!-- /Product thumb imgs -->
						<?php endforeach; ?>
						<!-- Product details -->
						<div class="col-md-5">
							<div class="product-details">
								<h2 class="product-name"><?php echo $value['Name'] ?></h2>
								<div>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<a class="review-link" data-toggle="tab" href="#tab3"><?php foreach ($countRating as $rating){echo $rating['COUNT(id)'];} ?> Review(s) | Add your review</a>
								</div>
								<div>
									<h3 class="product-price"><?php echo number_format($value['Price']) ?> đ <?php if ($value['Sale'] > 0) : ?><del class="product-old-price">$990.00 VND</del><?php endif; ?></h3>
								</div>
								<p><?php echo $value['Decription'] ?></p>
								<div class="product-options">

								</div>

								<div class="add-to-cart">
									<div class="qty-label">
										Qty
										<div class="input-number">
											<input type="number" value="1">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<a href="add_cart.php?id_product=<?php echo $value['Id']?>&quantity=<?php echo $quantity?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
								</div>

								<ul class="product-btns">
									<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
									<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
								</ul>

								<ul class="product-links">
									<li>Category:</li>
									<li><a href="#">Headphones</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>

								<ul class="product-links">
									<li>Share:</li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-envelope"></i></a></li>
								</ul>

							</div>
						</div>
						<!-- /Product details -->

						<!-- Product tab -->
						<div class="col-md-12">
							<div id="product-tab">
								<!-- product tab nav -->
								<ul class="tab-nav">
									<li <?php if(!isset($_GET['review'])){ echo "class='active'";}?>><a data-toggle="tab" href="#tab1">Description</a></li>
									<li><a data-toggle="tab" href="#tab2">Details</a></li>
									<li <?php if(isset($_GET['review'])){ echo "class='active'";}?>><a data-toggle="tab" href="#tab3">Reviews (<?php echo $countRating[0]['COUNT(id)']?>)</a></li>
								</ul>
								<!-- /product tab nav -->

								<!-- product tab content -->
								<div class="tab-content">
									<!-- tab1  -->
									<div id="tab1" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											</div>
										</div>
									</div>
									<!-- /tab1  -->

									<!-- tab2  -->
									<div id="tab2" class="tab-pane fade in">
										<div class="row">
											<div class="col-md-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											</div>
										</div>
									</div>
									<!-- /tab2  -->

									<!-- tab3  -->
									<div id="tab3" class="tab-pane fade in">
										<div class="row">
											<!-- Rating -->
											<div class="col-md-3">
												<div id="rating">
													<div class="rating-avg">
														<span>
															<?php
																//average rating
																$average = 0;
																if($countRating[0]['COUNT(id)'] == 0){
																	echo 0;
																}else{
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		$average += $rating['rating_value'];
																	}
																	$average = $average/$countRating[0]['COUNT(id)'];
																	$average = str_split(str_split($average, 4)[0]);
																	if(sizeof($average)>3){
																		if($average[3] > 5){
																			$average[2]++;
																		}
																	}
																	if(sizeof($average) == 1){
																		echo "".$average[0];
																	}else if(sizeof($average) == 2){
																		echo "".$average[0].$average[1];
																	}else if(sizeof($average) == 3){
																		echo "".$average[0].$average[1].$average[2];
																	}
																}
															?>
														</span>
														<?php
															if($countRating[0]['COUNT(id)'] == 0):?>
																<div class="rating-stars">
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															<?php endif;?>
														<?php
															if($countRating[0]['COUNT(id)'] > 0):														
														?>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star<?php if($average < 2){echo "-o";}?>"></i>
															<i class="fa fa-star<?php if($average < 3){echo "-o";}?>"></i>
															<i class="fa fa-star<?php if($average < 4){echo "-o";}?>"></i>
															<i class="fa fa-star<?php if($average < 5){echo "-o";}?>"></i>
														</div>
														<?php endif;?>
													</div>
													<?php
														if($countRating[0]['COUNT(id)'] == 0):
													?>
													<ul class="rating">
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 0%;"></div>
															</div>
															<span class="sum">
																0
															</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 0%;"></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 0%;"></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 0%;"></div>
															</div>
															<span class="sum">0</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<div style="width: 0%;"></div>
															</div>
															<span class="sum">0</span>
														</li>
													</ul>
													<?php endif;?>
													<?php if($countRating[0]['COUNT(id)'] > 0):?>
													<ul class="rating">
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="rating-progress">
																<?php 
																	$sumRating5 = 0;
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		if($rating['rating_value'] == 5){
																			$sumRating5++;
																		}
																	}
																?>
																<div style="width: <?php echo ($sumRating5/$countRating[0]['COUNT(id)'])*100?>%;"></div>
															</div>
															<span class="sum">
																<?php echo $sumRating5;?>
															</span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<?php 
																	$sumRating4 = 0;
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		if($rating['rating_value'] == 4){
																			$sumRating4++;
																		}
																	}
																?>
																<div style="width: <?php echo ($sumRating4/$countRating[0]['COUNT(id)'])*100?>%;"></div>
															</div>
															<span class="sum"><?php echo $sumRating4;?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<?php 
																	$sumRating3 = 0;
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		if($rating['rating_value'] == 3){
																			$sumRating3++;
																		}
																	}
																?>
																<div style="width: <?php echo ($sumRating3/$countRating[0]['COUNT(id)'])*100?>%;"></div>
															</div>
															<span class="sum"><?php echo $sumRating3;?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<?php 
																	$sumRating2 = 0;
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		if($rating['rating_value'] == 2){
																			$sumRating2++;
																		}
																	}
																?>
																<div style="width: <?php echo ($sumRating2/$countRating[0]['COUNT(id)'])*100?>%;"></div>
															</div>
															<span class="sum"><?php echo $sumRating2;?></span>
														</li>
														<li>
															<div class="rating-stars">
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
																<i class="fa fa-star-o"></i>
															</div>
															<div class="rating-progress">
																<?php 
																	$sumRating1 = 0;
																	foreach($Rating->getRatingByIDProduct($id) as $rating){
																		if($rating['rating_value'] == 1){
																			$sumRating1++;
																		}
																	}
																?>
																<div style="width: <?php echo ($sumRating1/$countRating[0]['COUNT(id)'])*100?>%;"></div>
															</div>
															<span class="sum"><?php echo $sumRating1;?></span>
														</li>
													</ul>
													<?php endif;?>
												</div>
											</div>
											<!-- /Rating -->

											<!-- Reviews -->
											<div class="col-md-6">
												<div id="reviews">
													<?php if($countRating[0]['COUNT(id)'] > 0):?>
													<ul class="reviews">
													<?php
														
														// $CheckForComment = 1;
														// $quantityCmtToShow = 3;
														// $arrayComment = $Rating->get3Comments($CheckForComment, $quantityCmtToShow);
														// // function date_sort($a, $b) {
														// // 	return strtotime($b['date']) - strtotime($a['date']);
														// // }
														// // usort($arrayComment, "date_sort");
														// $dem = 0;
														// foreach($arrayComment as $ra):
														// 	$dem++;
														$total = $countRating[0]['COUNT(id)'];
														$url = $_SERVER['PHP_SELF']."?id=".$id;
														$page = isset($_GET['page'])?$_GET['page']:1;
														$perPage = 3;
														foreach($Rating->get3Comments($id, $page, $perPage) as $ra):
													?>
														<li>
															<div class="review-heading">
																<h5 class="name"><?php //lấy từ bảng customer name, cắt chuỗi và lấy end aray
																echo "UNKNOWN";?></h5>
																<p class="date"><?php echo $ra['date']?></p>
																<div class="review-rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star<?php if($ra['rating_value'] < 2){echo "-o empty";}?>"></i>
																	<i class="fa fa-star<?php if($ra['rating_value'] < 3){echo "-o empty";}?>"></i>
																	<i class="fa fa-star<?php if($ra['rating_value'] < 4){echo "-o empty";}?>"></i>
																	<i class="fa fa-star<?php if($ra['rating_value'] < 5){echo "-o empty";}?>"></i>
																</div>
															</div>
															<div class="review-body">
																<p><?php echo $ra['comment']?></p>
															</div>
														</li>
													<?php endforeach;?>
													</ul>
													<ul class="reviews-pagination">
														<?php	
															if($total > 3){
															  echo $Rating->paginateComment($url, $total, $perPage);
															}
														?>
														<!-- <li class="active">1</li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#">4</a></li>
														<li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
													</ul>
													<?php endif;?>
													<?php if($countRating[0]['COUNT(id)'] == 0):?>
														<p>There are no comments yet!</p>
													<?php endif;?>
												</div>
											</div>
											<!-- /Reviews -->

											<!-- Review Form -->
											<div class="col-md-3">
												<div id="review-form">
													<form id="add-review" class="review-form" method="post" action="<?php if($check > 0){ echo "add_review.php?id_product=".$id;}?>">
														<textarea class="input" name="comment" placeholder="Your Review"></textarea>
														<div class="input-rating">
															<span>Your Rating: </span>
															<div class="stars">
																<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
																<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
															</div>
														</div>
														<button type="submit" class="primary-btn" <?php if($check == 0){ echo "disabled";}?>>Submit</button>
														<?php
															if($check == 0){
																echo "<label style='color: #ff8484;'>You must purchase the product before write a review!</label>";
															}
														?>
													</form>
												</div>
											</div>
											<!-- /Review Form -->
										</div>
									</div>
									<!-- /tab3  -->
								</div>
								<!-- /product tab content  -->
							</div>
						</div>
						<!-- /product tab -->
			</div>
	<?php endforeach;
				endif; ?>
	<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>
				<?php
				//products show in a page
				$perPage = 4;

				//get current page
				$page = isset($_GET['page']) ? $_GET['page'] : 1;

				$type_id = $TypeProduct->getTypeID($id);
				$getProductsByTypeID = $Product->getProductsByType($type_id);
				$total = count($getProductsByTypeID);
				$url = $_SERVER['PHP_SELF']."?id=".$_GET['id'];
				$arrProducts = $Product->getProductsForPage($type_id, $page, $perPage);
				foreach ($arrProducts as $prod) :
				?>
					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./images/<?php echo $prod['image'] ?>" alt="">
								<div class="product-label">
									<span class="sale">-30%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#"><?php echo $prod['Name'] ?></a></h3>
								<h4 class="product-price"><?php echo number_format($prod['Price']) ?> VND <?php if ($prod['Sale'] > 0) : ?><del class="product-old-price">$990.00 VND</del><?php endif; ?></del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>
						</div>
					</div>
					<!-- /product -->
				<?php endforeach; ?>
				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<ul class="store-pagination">
						<?php
						if ($total > 4) {
							echo $Product->paginateForRelatedProducts($url, $total, $perPage);
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->

	<!-- jQuery Plugins -->
	<script src="js/js/jquery.min.js"></script>
	<script src="js/js/bootstrap.min.js"></script>
	<script src="js/js/slick.min.js"></script>
	<script src="js/js/nouislider.min.js"></script>
	<script src="js/js/jquery.zoom.min.js"></script>
	<script src="js/js/main.js"></script>
</body>

</html>

<html><?php include "footer.php" ?>