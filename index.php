<?php 
	include('api/registerFunctions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<body>
<?php include ('includes/header.php') ?>         

<div class="mainBody">
    <img id="headerImage" src="img/clothingStoreImg.jpg" alt="imageHomePage">
    <h2>Our Values</h2>
    <p id= "valuesText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium provident labore, repellendus voluptate alias quod, obcaecati vitae nihil distinctio ipsum accusamus! Nisi harum rem reprehenderit ipsam numquam voluptatum nostrum dicta?</p>
</div>
<?php include ('includes/footer.php')?>
</body>
</html>

