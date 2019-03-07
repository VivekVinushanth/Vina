<?php 
if(isset($_POST['name'])){
		$name = $_POST['name'];
		$domain = $_POST['domain'];
		$position_held = $_POST['position_held'];
		$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
	if(isset($_POST['account'])&&$_POST['account']==true){
		$username = $_POST['username'];
		$password = $_POST['password'];
		signup($name, $domain, $position_held, $conn, $username, $password);
	}
}

function signup($name, $domain, $position_held,$conn, $username, $password){
	$response ="";
	$password = MD5($password);
	$query = mysqli_prepare($conn,"INSERT INTO users (name,domains,position_held,username,passwords)VALUES (?,?,?,?,?)");
	$query0=mysqli_stmt_bind_param($query, "sssss", $name, $domain, $position_held, $username, $password);
	$result =mysqli_stmt_execute($query);
	$cus_ID = mysqli_fetch_row(mysqli_query($conn, "SELECT LAST_INSERT_ID();"))[0];
	if($result){
		setcookie("customer", $cus_ID, time()+345600);
		$response=$response+"You have signed up successfully. ";
		if(!$cus_que){
			setcookie("username", $username, time()+345600);
			setcookie("password", $passwords, time()+345600);
		}
		header("Location: home.php");
	}	
	else{
		die("something went wrong.");
	}
	return $response;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Vina | Sign-up </title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">

</head>

<body>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="logo"><a href="index.php">Vina</a></div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix" style="margin-top:-35px;">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo"><a href="index.php">Vina</a></div>
		</header>

        <!-- Header Area End -->
		<div align="center" style="margin:-100px 0 0 50px;">
			<div class="cart-table-area" style="padding:0 100px 100px 100px;">
				<div class="container-fluid">
					<div class="row">
						<div class="">
							<div class="checkout_details_area mt-50 clearfix">

								<div class="cart-title">
									<h2>Sign Up </h2>
								</div>
								
									<form action="#" method="post">
										<div class="row">
											<div class="col-12 mb-3"">
												<input type="text" class="form-control" id="name" name="name" value="" placeholder="Name" required>
											</div>
											<div class="col-12 mb-3"">
												<input type="text" class="form-control" id="domain" name="domain"value="" placeholder="The Domain you work in" required>
											</div>
											<div class="col-12 mb-3">
												<input type="text" class="form-control" id="position_held" name="position_held"placeholder="Position held in office" value="" required>
											</div>
											<div class="col-12 mb-3">
												<input type="email" class="form-control" id="username" name="username" placeholder="Username" value="" hidden="True">
											</div>
											<div class="col-12 mb-3">
												<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" hidden="True">
											</div>
											
											<div class="col-12" align="left">
												<div class="custom-control custom-checkbox d-block mb-2">
													<input type="checkbox" class="custom-control-input" name="account" id="createaccount">
													<label class="custom-control-label" for="createaccount">Create an accout</label>
												</div>
											</div>
										</div>
										<div class="container-login100-form-btn m-t-17">
											<button class="login100-form-btn"> 
											Sign-up
											</button>
										</div>
										</br>
										<a href="index.php" class="txt2">
											Login
										</a>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="position_held" class="newsletter_input" required="required" placeholder="Enter your position_held address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">Vina</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start"  align="center">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
	
	
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
	<!-- Custom js -->
    <script src="js/custom_signup.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
	<!-- Custom js -->
    <script type="text/JavaScript" src="js/custom_signup.js"></script>
</body>

</html>