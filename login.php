<?php include('api/registerFunctions.php') ?>
<?php include('includes/header.php') ?>
<body onload="updateNumberNextToCartIcon()">
    <div class="mainBody">

    <h1>Log in form</h1>

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
        
    </div>

</body>
<?php include ('includes/footer.php') ?>
</html>
