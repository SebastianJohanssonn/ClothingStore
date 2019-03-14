<?php
    include_once ('api/databaseHandler.php');

    class User {
        function __construct()
        {
            $this->database = new Database();
        }

        public function registerUser($username, $email, $password, $password_2){
            global $errors;
            
            
            // form validation: ensure that the form is correctly filled
            if (empty($username)) { 
                array_push($errors, "Username is required"); 
            }
            if (empty($email)) { 
                array_push($errors, "Email is required"); 
            }
            if (empty($password)) { 
                array_push($errors, "Password is required"); 
            }
            if ($password != $password_2) {
                array_push($errors, "The two passwords do not match");
            }

            // register user if there are no errors in the form
            if (count($errors) == 0) {
                $passwordHash = md5($password);//encrypt the password before saving in the database

                if (isset($_POST['user_type'])) {
                    $user_type = e($_POST['user_type']);
                    $query = $this->database->getConnection()->prepare("INSERT INTO users (username, email, user_type, password) 
                            VALUES('$username', '$email', '$user_type', '$passwordHash');");
                    $query->execute();
                    $_SESSION['success']  = "New user successfully created!!";
                    header('location: admin.php');
                }else{
                    $query = $this->database->getConnection()->prepare("INSERT INTO users (username, email, user_type, password) 
                            VALUES('$username', '$email', 'user', '$passwordHash');");
                    $query->execute();

                    // get id of the created user
                    $logged_in_user_id = $this->database->getConnection()->lastInsertId($this->database->getConnection());

                    $_SESSION['user'] = $this->getUserById($logged_in_user_id); // put logged in user in session
                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['user_type'] = "User";
                    $_SESSION['success']  = "You are now logged in";
                    header('location: userPage.php');				
                }

            }
    }
    public function login($username, $password){
        global $errors;
        
		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$passwordHash = md5($password);

            $query = $this->database->getConnection()->prepare("SELECT username, password, user_type FROM users 
                    WHERE username='$username' AND password='$passwordHash' LIMIT 1;");
            $result = $query->execute(); 
            
			if ($query->rowCount($result) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = $query->fetch(PDO::FETCH_ASSOC);
				if ($logged_in_user['user_type'] == 'admin') {

                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['user']['username'] = $username;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin.php');		  
				}else{
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['user']['username'] = $username;
					$_SESSION['success']  = "You are now logged in";

					header('location: userPage.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
	    }
    }
    public function getUserById($id){
		global $db;
		$query = $this->database->getConnection()->prepare("SELECT * FROM users 
        WHERE id=' $id';");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

		return $result;
    }
    public function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
    }
    public function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}
}

?>