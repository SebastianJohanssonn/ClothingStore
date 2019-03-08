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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/shoppingcart.css">
    <link rel="stylesheet" type="text/css" href="css/homePageDesktop.css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/newsletter.css">
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
            $("#dropbtnDesktop").hover(function(){
                $(".dropdownDesktop").show();
            });
            $(".mainBody, h1, footer").hover(function(){
                $(".dropdownDesktop").hide();
            })
            
        });
    </script>
</head>

<header>
    <a href="index.php"><img id="logo" src="img/clothingstore_logo.svg" alt="clothingstore"></a>

    <a id="cartLink "href="cart.php"><i id="cart" class="fas fa-shopping-cart"><div><p id="numberOfAllChosenProduct"></p></div></i></a>
    <nav class="mobileNav">

        <div class="dropdown">
            <i id="dropbtn1" class="dropbtn fas fa-bars"></i>
        </div>
        <div id="dropdown-content1" class="dropdown-content">
            <a href="clothes.php">Clothes</a>
            <a href="accesories.php">Accesories</a>
            <a href="shoes.php">Shoes</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </nav>
    <nav class="desktopNav">
        <a href="index.php">Home</a>
            <span id="dropbtnDesktop">Products</span>
        <div class="dropdown-content dropdownDesktop">
            <a href="clothes.php">Clothes</a>
            <a href="accesories.php">Accesories</a>
            <a href="shoes.php">Shoes</a>
        </div>
        <a href="register.php">Register</a>

    </nav>
</header>