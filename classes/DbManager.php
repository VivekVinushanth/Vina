<?php

//Login Manager class
class DbManager {

   public function connectdb($username,$passwords){
	$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
	$result0 = mysqli_query($conn, "SELECT user_id FROM users WHERE username='$username' LIMIT 1;");
	$result = mysqli_num_rows($result0);
	$result1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND passwords='$passwords' LIMIT 1;"));
	if($result==1){
		
		if($result1==1){
			$user_id = mysqli_fetch_row($result0)[0];
			setcookie("user", $username, time()+345600);
			setcookie("pass", $password, time()+345600);
			setcookie("customer", $user_id, time()+345600);
			if($username=='admin'){
				
				header("Location: adminhome.php");
			}
			else{
				header("Location: home.php");
			}
			
		}
		else{
			echo "Incorrect password, Try again!";
		}
	}
	else{
		echo "Incorrect User name!";
	}
   }


	public function signUp($name, $domain, $position_held,$username, $password){
	$conn = mysqli_connect("localhost", "public_access", "0000", "vina");
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
}
?>