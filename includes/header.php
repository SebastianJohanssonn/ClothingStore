<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Clothing Store</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/pc.css">
    <link rel="stylesheet" type="text/css" href="css/mobil.css">
    <link rel="stylesheet" type="text/css" href="css/shoppingcart.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script src="./script/newsletter.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="script/cart.js"></script>
    <script>
        $(document).ready(function(){
            $("#dropbtn1").click(function(){
                $("#dropdown-content1").toggle();
            });
            $(".mainBody, h1, footer").click(function(){
                $("#dropdown-content1").hide();
            })
        });
    </script>
</head>

<header>
    <div id="headerInfo">

        <div id="userInfo">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
            <?php 
                unset($_SESSION['success']);
            ?>
            <?php endif ?>
            <!-- logged in user information -->
            <?php  if (isset($_SESSION['user'])) : ?>
            <?php echo $_SESSION['user']['username']; ?>
            (<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
            <div id="loggedIn">
                <a href="index.php?logout='1'">Logout</a>
            </div>
            <?php endif ?>
        </div>

        <div id="shoppingCart">
            <a id="cartLink "href="cart.php"><i id="cart" class="fas fa-shopping-cart fa-2x"><div><p id="numberOfAllChosenProduct"></p></div></i></a>
        </div>

    </div>

    <a href="index.php"><img id="logo" src="img/clothingstore_logo.svg" alt="clothingstore"></a>

    <nav>
        <div class="dropdown">
            <i id="dropbtn1" class="dropbtn fas fa-bars"></i>
        </div>
        <div id="dropdown-content1" class="dropdown-content">
            <a href="category.php?id=4">Clothes</a>
            <a href="category.php?id=3">Accesories</a>
            <a href="category.php?id=2">Shoes</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </nav>
</header>