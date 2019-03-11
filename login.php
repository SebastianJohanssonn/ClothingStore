<?php include('api/registerFunctions.php') ?>
<?php include ('includes/header.php') ?>

<div class="mainBody">

<h1>Log in form</h1>

<form method="post" action="login.php">

<?php echo display_error(); ?>

    <div id="input">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
            
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
    </div>

    <button type="submit" class="btn" name="login_btn">Login</button> 

</form>
</div>

</body>
<?php include ('includes/footer.php') ?>
</html>
