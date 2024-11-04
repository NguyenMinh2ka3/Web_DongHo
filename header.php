<!--File cấu hình chính -->
<?php
ob_start();
session_start();
include("admin/inc/config.php");
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Nhom10_Shop.com</title>
	<!-- Thẻ meta-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

	<!-- Logo Title -->
	<link rel="icon" type="image/png" href="assets/uploads/favicon.png">

	<!-- Bảng Style -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/rating.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/tree-menu.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">


<!-- Chia sẻ -->
	  <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>
</head>
<body>


<!-- Hiệu ứng đăng nhập-->
<!-- <div id="preloader">
	<div id="status"></div>
</div> -->

<!-- Topbar -->
<div class="top">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="left">
					<ul>
						<li><i class="fa fa-envelope-o"></i> <?php echo "Nhom10shop@gmail.com"; ?></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="right">
					<ul>
						<li><a href="https://www.facebook.com/Minh.2ka3"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.instagram.com/mminhh0608/"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header">
	<div class="container">
		<div class="row inner">
			<div class="col-md-4 logo">
				<a href="index.php"><img src="assets/uploads/logoshop.png" alt="logo image"><a href="index.php"><b>Nhom10 Shop</b></a></a>
			</div>		
			<div class="col-md-5 right">
				<ul>			
					<?php
					if(isset($_SESSION['customer'])) {
						?>
						<li><i class="fa fa-user"></i> <?php echo "Thành viên" ?> <?php echo $_SESSION['customer']['kh_ten']; ?></li>
						<li><a href="caidat.php"><i class="fa fa-home"></i> <?php echo "Cài đặt"; ?></a></li>
						<?php
					} else {
						?>
						<li><a href="login.php"><i class="fa fa-sign-in"></i> <?php echo "Đăng nhập	"; ?></a></li>
						<li><a href="dangki.php"><i class="fa fa-user-plus"></i> <?php echo "Đăng kí"; ?></a></li>
						<?php	
					}
					?>
					<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <?php echo "Chi tiết giỏ hàng"; ?> </a></li>
				</ul>
			</div>
			<div class="col-md-3 search-area">
				<form class="navbar-form navbar-left" role="search" action="search.php" method="get">				
					<div class="form-group">
						<input type="text" class="form-control search-top" placeholder="<?php echo "Tìm kiếm sản phẩm" ?>" name="search_text">
					</div>
					<button type="submit" class="btn btn-default"><?php echo "Tìm kiếm"; ?></button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="nav">
	<div class="container">
		<div class="row">
			<div class="col-md-12 pl_0 pr_0">
				<div class="menu-container">
					<div class="menu">
						<ul>
							<li><a href="index.php">Trang chủ</a></li>									
							<li><a href="index.php">Về chúng tôi</a></li>
							<li><a href="index.php">FAQ</a></li>
							<li><a href="contact.php">Liên hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>