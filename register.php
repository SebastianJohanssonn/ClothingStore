<?php include('api/registerFunctions.php') ?>
<?php include ('includes/header.php') ?>
<div class="mainBody">
		<h2>Register</h2>
	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label class="lable">Username</label>
			<input type="text" name="username" class="label1"  value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" class="label2" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" class="label3"  >
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</div>
</body>
<?php include ('includes/footer.php') ?>
>>>>>>> 1be3cb399eb83febcf78e7b414feaf02d835bf74
