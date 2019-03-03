<?php
include_once './classes/DbManager.php';
//Login Manager class
class UserManager {
 private $DbManager;
 
   public function signUp($name, $domain, $position_held,$username, $password){
	$response ="";
	$password = MD5($password);
	
	$DbManager = new DbManager();
      	$DbManager->signUp($name, $domain, $position_held,$username, $password);
	
}
}
?>