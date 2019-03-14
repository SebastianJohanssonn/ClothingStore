<?php 
include('api/registerFunctions.php');
if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
    }
 ?> 
<?php include('includes/header.php') ?>
<body onload="updateNumberNextToCartIcon()">
    <div class="mainBody">

    <h1>User Page</h1>
    <h2> Development </h2>
       
        
    </div>

</body>
<?php include ('includes/footer.php') ?>
</html>
