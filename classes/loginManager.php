<?php
include_once './classes/DbManager.php';

//Login Manager class
class loginManager {
 private $DbManager;

       public function login($username,$passwords){
		   $DbManager = new DbManager();
      	   $DbManager->connectdb($username,$passwords);
	   
   }
   
}
?>
