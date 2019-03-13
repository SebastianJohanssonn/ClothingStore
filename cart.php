<?php include ('includes/header.php') ?>
<body onload="getAndDisplayShoppingcart()">
<div class="mainBody">
    <h2>Shopping Cart</h2>
    <div id="divOfChosenProducts">
        
    </div>
    <div>
        <h2>Shipping</h2>
        <div id="shippingOptions">

        </div>
        <input type="text" placeholder="Your shipping adress" id="orderAdress"><br>
        <button onclick="placeOrder()" id="orderBtn" type="button" class="btn btn-success">Place Order</button>
    </div>
</div>
</body>
<?php include ('includes/footer.php') ?>