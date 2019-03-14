<?php 

	session_start();
	include ("./classes/User.php");
	
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
		$username    =  $_POST['username'];
        $email       =  $_POST['email'];
        $password    =  $_POST['password_1'];
        $password_2  =  $_POST['password_2'];
		$userHandler->registerUser($username, $email, $password, $password_2);
	}

	// call the login() function if _btn is clicked
	if (isset($_POST['login_btn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userHandler->login($username, $password);
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
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