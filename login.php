<?php include('functions.php') ?>
<?php include ('includes/header.php') ?>
<<<<<<< HEAD
<body>
<div class="mainBody">
    <h2>Logg in </h2>
</div>
=======


<div class="mainBody">

<form method="post" action="login.php">

<?php echo display_error(); ?>

<div class="input-group">
    <label>Username</label>
    <input type="text" name="username" >
    
</div>
<div class="input-group">
    <label>Password</label>
    <input type="password" name="password">
    <button type="submit" class="btn" name="login_btn">Login</button>
    
</div>

</form>
</div>

>>>>>>> AliBranchLoginAndRegister
</body>
<?php include ('includes/footer.php') ?>
</html>
