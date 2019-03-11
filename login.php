<?php include('api/registerFunctions.php') ?>
<?php include ('includes/header.php') ?>

<div class="mainBody">

<h1>Log in form</h1>

<<<<<<< HEAD

<?php echo display_error(); ?>
<div class="container">

    <form method="post" action="login.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
                <button type="submit" class="text-center btn btn-primary" style="margin-left:auto;margin-right:auto;margin-bottom:20px;" name="login_btn">Login</button>
        </div>
    </form>

=======
    <form method="post" action="login.php">

        <?php echo display_error(); ?>


        <div class="input-group" id="username-input">
            <label>Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_btn">Login</button> 
        </div>
    </form>
    
>>>>>>> e4f4b55b63be279ef4079ca06bcd222004d07491
</div>

</body>
<?php include ('includes/footer.php') ?>
</html>
