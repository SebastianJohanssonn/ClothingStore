<?php include ('includes/header.php') ?>
<body>
<!DOCTYPE html>
<html lang="en">
<body>
<header>
    
		<!-- notification message -->
	<div class="inline">	<?php if (isset($_SESSION['success'])) : ?>
			
				
					<?php 
						//echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				
			
		<?php endif ?>
		<!-- logged in user information -->

				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
                </div>
			</h1>
                
</header>
<div class="mainBody">
      <img id="headerImage" src="clothingStoreImg.jpg" alt="imageHomePage">
        <img id="fullSizeImg" src="clothingStoreImg.jpg" alt="imageHomePage">
        <img id="croppedImg" src="croppedImg.png" alt="imageHomePage">

    <h2>Our Values</h2>
    <p id= "valuesText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium provident labore, repellendus voluptate alias quod, obcaecati vitae nihil distinctio ipsum accusamus! Nisi harum rem reprehenderit ipsam numquam voluptatum nostrum dicta?</p>
</div>
</body>
<?php include ('includes/footer.php') ?>
</html>

