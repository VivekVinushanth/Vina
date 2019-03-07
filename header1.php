<?php
	if(isset($_GET['signout'])&&$_GET['signout']=='true'){
		setcookie("guest", "", time() - 3600);
		setcookie("user", "", time() - 3600);
		setcookie("pass", "", time() - 3600);
		setcookie("customer", "", time() - 3600);
		
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
	}
	if(!(isset($_COOKIE['customer'])||isset($_COOKIE['user'])&&isset($_COOKIE['pass']))){
		echo '<meta http-equiv="refresh" content="0;url=index.php">';
		exit();
	}else{
		$user_id = $_COOKIE['customer'];
	}
	
	$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
	
?>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="home.php">
  <img src="images/logo.jpg" style="width:75px;height:50px;display: inline-block">
  </a>
 

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" aria-expanded="true" href="#" data-toggle="dropdown">Services <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="trans.php">View Translations</a></li>
            <li><a href="userview.php">View Users</a></li>
            <li><a href="schema2.php">View Schemas</a></li>
            
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
	  
		<li>Welcome <?php $temp = isset($_COOKIE['user'])?$_COOKIE['user']: $user_id; echo $temp;?></li>
		
		 <li><a href='?signout=true'>Sign Out</a></li>
		 
      </ul>
    </div>
  </div>
</nav>

	</body>