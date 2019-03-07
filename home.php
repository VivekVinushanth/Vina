<?php
require_once 'header.php';
require_once 'schema.php';
if(isset($_GET['signout'])&&$_GET['signout']=='true'){
	setcookie("user", "", time() - 3600);
	setcookie("pass", "", time() - 3600);
	setcookie("customer", "", time() - 3600);
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
if(!(isset($_COOKIE['customer'])||isset($_COOKIE['user'])&&isset($_COOKIE['pass']))){
	header("Location: index.php");
	exit();
}
else{
	$user_id = $_COOKIE['customer'];
}
$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
?>
<html lang="en">
<head>
<title>Vina | Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">

</head>

<body>


<?php
require_once 'footer.php';
?>
</body>

</html>