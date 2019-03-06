<?php include ('includes/header.php') ?>
<body onload="displayShoppingcart()">
<div class="mainBody">
    <h2>Shopping Cart</h2>
    <button id="1" onclick="deleteFromShoppingcart(this)">Delete</button>
    <div id="divOfChosenProducts">
        <div class="chosenProduct">
            <img src="clothingStoreImg.jpg">
            <h3></h3>
            <p></p>
            <button>Delete</button>
        </div>
    </div>
</div>
</body>
<?php include ('includes/footer.php') ?>