<?php 

	session_start();
	include ("./classes/User.php");
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'clothingstore');
	
	// variable declaration
	
	$errors   = array();
	$userHandler = new User(); 
	
	
	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		$userHandler->registerUser($username, $email, $password, $password_2);
	}

	// call the login() function if _btn is clicked
	if (isset($_POST['login_btn'])) {
		$userHandler->login($username, $password);
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// return user array from their id
	/* function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	} */

	// returns the id of the logged in user
	function getUserId() {
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}else{
			return false;
		}
	}

	// LOGIN USER
	/* function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
	}
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$passwordHash = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$passwordHash' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: userPage.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		} */
		

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
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