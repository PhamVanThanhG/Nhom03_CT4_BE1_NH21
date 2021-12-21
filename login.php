<?php
session_start();
require("config.php");
require("models/db.php");
include("models/customer.php");
$cus = new Customer();
if (isset($_POST['username'])) {
	$getEmail = $cus->getEmail();
	$user = $_POST['username'];
	$gmail = $_POST['gmail'];
	$pass = md5($_POST['password']);
	$phone = $_POST['phonenumber'];
	$birthday = $_POST['birthday'];
	$xet = true;
	//Kiem tra gmail da duoc tao tai khoan chua
	foreach ($getEmail as $value) {
		if ($value['Email'] == $gmail) {
			$xet = false;
		}
	}
	//Xu ly thong bao khi gmail da duoc tao tai khoan roi
	if ($xet) {
		$cus->insertAccountCustomer($user, $gmail, $pass, $phone, $birthday);
		header("Location: register.php?user=" . $user);
	} else {
		//Xuat form thong bao gmail da tao tai khoan roi
?>
		<html>
		<div id="dialog" class="hienra">
			<br>
			<h1 style="text-transform: uppercase; color: #d30f0f; font-weight: 700;">registration error!</h1>
			<div class="noidung" style="font-size: larger;">
				Email "<?php echo $gmail ?>" was used to create an account! <br> <span>Please use another email</span>
				<br>
				<br>
				<button id="close" style="cursor: pointer; padding: 10px 10px;"><span style="font-size: 20px;">Close</span></button>
			</div>
		</div>

		</html>
		<script>
			document.getElementById('close').onclick = function(e) {
				document.getElementById("dialog").style.display = 'none';
			}
		</script>
	<?php
	}
}
if (isset($_POST['sub'])) {
	$getAccount = $cus->getAccount($_POST['emailL']);
	//kiem tra gmail da tao chua
	if (sizeof($getAccount) == 0) {
		//Xuat form tai khoan khong ton tai
	?>
		<html>
		<div id="dialog1" class="hienra">
			<br>
			<h1 style="text-transform: uppercase; color: #d30f0f; font-weight: 700;">Wrong email!</h1>
			<div class="noidung" style="font-size: larger;">
				Email "<?php echo $_POST['emailL'] ?>" never created an account! <br> <span>Please use another email</span>
				<br>
				<br>
				<button id="close1" style="cursor: pointer; padding: 10px 10px;"><span style="font-size: 20px;">Close</span></button>
			</div>
		</div>

		</html>
		<script>
			document.getElementById('close1').onclick = function(e) {
				document.getElementById("dialog1").style.display = 'none';
			}
		</script>
		<?php
	} else {
		//Kiem tra dung mat khau chua
		if ($getAccount[0]['Password'] == md5($_POST['passwordL'])) {
			$_SESSION['username'] = $getAccount[0]['Username'];
			$_SESSION['cus_id'] = $getAccount[0]['Cus_Id'];
			//Luu permission
			if($getAccount[0]['Permission'] == "Admin"){
				$_SESSION['admin'] = true;
                $_SESSION['xet'] = 1;
                header("location: Admin/index.php");
			}else{
                $_SESSION['xet'] = 1;
                header("location: index.php");
            }
		} else {
		?>
			<html>
			<div id="dialog2" class="hienra" style="height: 350px; top: 29%;">
				<br>
				<h1 style="text-transform: uppercase; color: #d30f0f; font-weight: 700;">Wrong password!</h1>
				<div class="noidung" style="font-size: larger;">
					<span>Please use another password</span>
					<p style="text-align: left; margin-left: 170px;"><a href="resetpassword.php">forgot password?</a></p>
					<br>
					<br>
					<button id="close2" style="cursor: pointer; padding: 10px 10px;"><span style="font-size: 20px;">Close</span></button>
				</div>
			</div>

			</html>
			<script>
				document.getElementById('close2').onclick = function(e) {
					document.getElementById("dialog2").style.display = 'none';
				}
			</script>
<?php
		}
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
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->

	<link href="css/box.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Style -->
	<link rel="stylesheet" href="css/stylelogin.css" type="text/css" media="all">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<!-- //Fonts -->

	<style>
		.hienra {
			position: fixed;
			top: 29%;
			left: 27%;
			background-color: white;
			color: black;
			width: 600px;
			height: 400px;
			visibility: visible;
		}
	</style>

</head>
<!-- //Head -->

<!-- Body -->

<body>
	<h1 style="font-weight: bolder; color: greenyellow;">FEANE LOGIN FORM</h1>

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
				<form action="" method="post">
					<div class="form-sub-w3ls">
						<input placeholder="User Name" type="text" required="" name="username">
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
						<input placeholder="Password" type="password" required="" name="password">
						<div class="icon-agile">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-sub-w3ls">
						<input placeholder="Phone number" type="text" required="" name="phonenumber">
						<div class="icon-agile">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
					</div>
					<div>
						<p style="font-weight: bolder; text-align: left; padding-left: 30px;">   Birthday:</p>
						 <input style="background-color: white;color: black;" placeholder="Birthday" type="date" required="" name="birthday" style="width: 10px; height: 35px;">
					</div>
					<div class="login-check">
						<label class="checkbox"><input type="checkbox" id="checkbox1" name="checkbox" checked="">I Accept <a style="color: yellow; text-decoration: underline" href="term&Condition.html">Terms & Conditions</a></label>
					</div>
					<div class="submit-w3l">
						<input type="submit" id="submit1" value="Register" name="submit">
					</div>
					<script>
						document.getElementById('submit1').onclick = function(e) {
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