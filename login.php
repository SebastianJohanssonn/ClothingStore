<?php include('api/registerFunctions.php') ?>
<?php include ('includes/header.php') ?>

<div class="mainBody">

<h1>Log in form</h1>


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

</div>

</body>
<?php include ('includes/footer.php') ?>
</html>
