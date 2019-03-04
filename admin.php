<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/adminStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
    <script src="./script/adminScript.js"></script>
    <title>Admin Page</title>
</head>
<body>
<?php
    include "includes/header.php";
    ?>
    <h1>Välkommen till Admin sidan!</h1>
    <div id="buttons">
        <button onclick=viewOrders()>Titta ordrar</button>
        <button onclick=viewProducts()>Produkt lista</button>
        <button onclick=viewSubscribers()>Prenumeranter</button>
        <button onclick=logOut()>Logga ut</button>
    </div>
    <div id="content">
    
    </div>
<?php
    include "includes/footer.php";
?>
</body>
</html>