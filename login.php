<?php
session_start();
require("config.php");
require("models/db.php");
include("models/customer.php");
$cus = new Customer();
if(isset($_POST['sub'])){
	$getAccount = $cus->getAccount($_POST['emailL'], $_POST['passwordL']);
	if(sizeof($getAccount) == 0){
		echo("<script>
		alert(\"Account does not exist! Please try again.\");
	</script>");
	}else{
		$_SESSION['username'] = $getAccount[0]['Username'];
		$_SESSION['cus_id'] = $getAccount[0]['Cus_Id'];
		header("Location: http://localhost/Nhom03/index.php?dn=1");
	}
}
?>
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Feane login form</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<!-- Style --> <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1 style="font-weight: bolder; color: greenyellow">FEANE LOGIN FORM</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Login here</h2>
		<form action="" method="post">
			<input type="email" Name="emailL" placeholder="EMAIL" required="">
			<input type="password" Name="passwordL" placeholder="PASSWORD" required="">
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="LOGIN" name="sub">
				<p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<!-- for register popup -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="contact-form1">
			<div class="contact-w3-agileits">
				<h3>Register Form</h3>
				<form action="register.php" method="post">
						<div class="form-sub-w3ls">
							<input placeholder="User Name"  type="text" required="" name="username">
							<div class="icon-agile">
								<i class="fa fa-user" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input placeholder="Email" class="mail" type="email" required="" name="gmail">
							<div class="icon-agile">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-sub-w3ls">
							<input placeholder="Password"  type="password" required="" name="password">
							<div class="icon-agile">
								<i class="fa fa-unlock-alt" aria-hidden="true"></i>
							</div>
						</div>
					<div class="login-check">
						 <label class="checkbox"><input type="checkbox" id="checkbox1" name="checkbox" checked="">I Accept <a style="color: yellow; text-decoration: underline" href="term&Condition.html">Terms & Conditions</a></label>
					</div>
					<div class="submit-w3l">
						<input type="submit" id="submit1" value="Register" name="submit">
					</div>
					<script>
						document.getElementById('submit1').onclick = function(e){
							if (!document.getElementById("checkbox1").checked) {
								alert("You have not accept Temp & Condition");
								e.preventDefault();
								return;
							}
						}
					</script>
				</form>
			</div>
		</div>	
	</div>
	<!-- //for register popup -->

	
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>

</body>
<!-- //Body -->

</html>