<?php 

	session_start();
	include ("./classes/User.php");
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'clothingstore');
	
	// variable declaration
	$username;
	$email;
	$password;
	$password_2;
	$user_type;
	$errors   = array();
	$userHandler = new User(); 
	
	
	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		$username    =  e($_POST['username']);
        $email       =  e($_POST['email']);
        $password    =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);
		$userHandler->registerUser($username, $email, $password, $password_2);
	}

	// call the login() function if _btn is clicked
	if (isset($_POST['login_btn'])) {
		$username = e($_POST['username']);
		$password = e($_POST['password']);
		$userHandler->login($username, $password);
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>