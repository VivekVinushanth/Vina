<?php
include_once './classes/loginManager.php';
include_once './classes/DbManager.php';
class User
{
    // Refer to database connection
    private $usermanager;
	private $loginManager;
    
    // Register new users
    public function signUp($name, $domain, $position_held,$username, $password)
    {
		$usermanager = new UserManager();
      	$usermanager->signUp($name, $domain, $position_held,$username, $password);
				
	}

    // Log in registered users with either their username or email and their password
    public function login($username,$passwords)
    {
        $loginManager = new loginManager();
      	$loginManager->connectdb($username,$passwords);
    }

    // Check if the user is already logged in
    public function is_logged_in() {
        // Check if user session has been set
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    // Redirect user
    public function redirect($url) {
        header("Location: $url");
    }

    // Log out user
    public function log_out() {
        // Destroy and unset active session
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }
	
	
	public function addSchema() {
        // add schema to the database
    }
	
	public function updateSchema() {
        // update schema
    }
	
	public function submit() {
        // submission of schema
    }
	
	public function translate() {
        // get the qustions translated
    }
	
	public function seeHistory() {
        // to see the history
    }
	
	public function submitfeedback() {
        // login
    }
	
	
}