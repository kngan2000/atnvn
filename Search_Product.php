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
    </header>
<!--/header-bottom-->
<?php
if (isset($_POST['txtSearch'])) {

    //Nhúng file kết nối với database
    include_once('connection.php');

    //Lấy dữ liệu từ file 
    $search   = $_POST['txtSearch'];

    $result = pg_query($conn, "SELECT productname,price,quantity,categoryid,image,shortdes FROM public.product WHERE productname LIKE '%{$search}%'");

    if ($result) {
        echo "Search with keyword: $search";
    } else
        echo "Erorr!.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            
            <thead>
                <tr>

                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row["productname"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["categoryid"]; ?></td>
                        <td>
                            <img src="image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["shortdes"]; ?></td>

                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
		
	</footer><!--/Footer-->  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>