<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ATN COMPANY</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/banner.css" rel="stylesheet">

</head>
<!--/head-->
<?php
Session_Start();
include_once("connection.php");
?>

<!-- The dots/circles -->
<div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
</div>

<body>
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> (+84) 220 8604</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> kieungann0711@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->
		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="">
						<div class="logo">
							<a href="?page=content"><img src="image/logoatn.jpg" style="width: 20%; display: block; margin-left: auto; margin-right: auto;" alt=""></a>
						</div>
					</div>
					<div class="col-sm-8 pull-right">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
								if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
								?>
									<li><a class="tm-nav-link" href="?page=update_customer"><i class="fa fa-user"></i>Hi,&nbsp;<?php echo $_SESSION['username']; ?> </a>
									</li>
									</li>
									<li><a class="tm-nav-link" href="?page=logout">
											<i class="fa fa-crosshairs"></i>Logout</a></li>
								<?php
								} else {
								?>
									<li class="tm-nav-li"><a href="?page=login" class="tm-nav-link"><i class="fa fa-user"></i>Login</a></li>
									<li><a href="?page=Register"><i class="fa fa-lock"></i> Register</a></li>

								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
</div>
		</div>
		<!--/header-middle-->
		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								
								<?php
								if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
								?>
								<li class="dropdown"><a href="?page=shop">Shop</a>
								</li>
									<li class="dropdown"><a href="#">Product<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="?page=add_product">Add Product</a></li>
											<li><a href="?page=product_management"> Product management</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="?page=Add_Category">Add Category</a></li>
											<li><a href="?page=category_management">Category Management</a></li>

										</ul>
									</li>
								<?php
								} else {
								?>
										<li class="nav-item"><a href="?page=shop">Shop</a></li>
								<?php
								}
								?>

						</div>
						<div class="container">
							<form action="Search_Product.php" method="POST">
								<div class="col-sm-3  pull-right">
									<div class="search_box pull-right">
										<input type="text" name="txtSearch" placeholder="Search" />
										<button class="btn btn-success search" type="submit" name="search" style=" background-color: #; border-color: #ffffff;">Search</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--/header-bottom-->
	</header>
	<!--/header-->
	<?php
	if (isset($_GET['page'])) {

		$page = $_GET['page'];
		if ($page == "Register") {
			include_once("Register.php");
		} elseif ($page == "login") {
			include_once("Login.php");
		}else if ($page == "shop") {
			include_once("shop.php");
		} elseif ($page == "search") {
			include_once("Search_Product.php");
		} elseif ($page == "category_management") {
			include_once("Category_Management.php");
		} elseif ($page == "product_management") {
			include_once("Product_Management.php");
		} else if ($page == "update_category") {
			include_once("Update_Category.php");
		} else if ($page == "add_product") {
			include_once("Add_Product.php");
		} else if ($page == "update_product") {
			include_once("Update_Product.php");
		} else if ($page == "logout") {
			include_once("Logout.php");
		} else if ($page == "Add_Category") {
		include_once("Add_Category.php");
		} else {
			include_once("content.php");
		}
	}


	?>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © 2021 ATN COMPANY. All rights reserved.</p>
			</div>
		</div>
	</div>


	</footer>
	<!--/Footer-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>

</html>