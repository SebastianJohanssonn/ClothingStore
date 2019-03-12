<script src="script/adminScript.js"></script>
<?php 
    include ('api/registerFunctions.php');
    include ('includes/header.php') ;
    
    if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
?>
        <h1>Välkommen till Admin sidan!</h1>
    <div id="buttons">
        <button onclick=viewOrders()>Titta ordrar</button>
        <button onclick=viewProducts()>Produkt lista</button>
        <button onclick=viewSubscribers()>Prenumeranter</button>
        <a href="create_user.php"><button> Create New User</button></a>
    </div>
    <div id="content">
        <template id="orderTemp">
            <h3>Orders:</h3>
            <table id ="orders">
                <tr>
                    <th>OrderID</th>
                    <th>CourierID</th>
                    <th>AdressID</th>
                    <th>ProductID</th>
                    <th>UserID</th>
                </tr>
                <!-- Rows will inserted here -->
            </table>
        </template>
        <template id="productTemp">
            <h3>Products:</h3>
            <table id ="products">
                <tr>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>ImageID</th>
                    <th>categoryID</th>
                    <th>UnitsInStock</th>
                </tr>
                <!-- Rows will inserted here -->
            </table>
            <input type="text" placeholder="Välj produkt Id" id="productId">
            <input type="text" placeholder="Antal" id="units">
            <button onclick=updateStock()>Uppdatera lagersaldo</button>
        </template>
        <template id="newsTemp">
            <h3>Newsletter subscribers:</h3>
            <table id="newsletter">
                <tr>
                    <th>SignUpId</th>
                    <th>Email</th>
                    <th>UserID</th>
                    <th>Name</th>
                </tr>
                <!-- Rows will inserted here -->
            </table>
        </template>
    </div>
    </body>
    <?php include ('includes/footer.php') ?>

