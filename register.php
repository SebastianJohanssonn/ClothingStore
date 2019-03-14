<?php include('api/registerFunctions.php') ?>
<?php include ('includes/header.php') ?>
<body onload="updateNumberNextToCartIcon()">
	<div class="mainBody">
		<h2>Register</h2>
		<form method="post" action="register.php">

		<?php echo display_error(); ?>

			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email">
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn">Register</button>
			</div>
			<p>
				Already a member? <a href="login.php">Log in</a>
			</p>
		</form>
	</div>
</body>
<?php include ('includes/footer.php') ?>
