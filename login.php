<?php include('functions.php') ?>
<?php include ('includes/header.php') ?>

<<<<<<< HEAD
        </div>
        <div id="dropdown-content1" class="dropdown-content">
            <a href="clothes.php">Clothes</a>
            <a href="accesories.php">Accesories</a>
            <a href="shoes.php">Shoes</a>
            <a href="login.php" target="_bottom">Log in</a>
            <a href="register.php">Register</a>
            <a href="newsletter.html">Subscribe for newsletter</a>
        </div>
    </nav>
</header>
<div class="mainBody">
    <img src="clothingStoreImg.jpg" alt="imageHomePage">
    <button onclick="addToShoppingcart(this)" id="1">Add</button>
    <h2>Our Values</h2>
    <p id= "valuesText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium provident labore, repellendus voluptate alias quod, obcaecati vitae nihil distinctio ipsum accusamus! Nisi harum rem reprehenderit ipsam numquam voluptatum nostrum dicta?</p>
</div>
<?php
function ClothingStore($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}
=======
>>>>>>> b4b35ed80321bd72f9b5b69f6fc2b3f8465a69f6

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

</body>
<?php include ('includes/footer.php') ?>
</html>
