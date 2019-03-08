<?php include ('includes/header.php') ?>
<body>
<!DOCTYPE html>
<html lang="en">
<body>
    
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        
    <?php 
        //echo $_SESSION['success']; 
        unset($_SESSION['success']);
    ?>
				
    <?php endif ?>
    
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['user'])) : ?>
    <?php echo $_SESSION['user']['username'];?>
    (<?php echo ucfirst($_SESSION['user']['user_type']); ?>)
    <br>
    <a href="index.php?logout='1'">logout</a>
    <?php endif ?> 

<div class="mainBody">
    <img id="headerImage" src="img/clothingStoreImg.jpg" alt="imageHomePage">
    <h2>Our Values</h2>
    <p id= "valuesText">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium provident labore, repellendus voluptate alias quod, obcaecati vitae nihil distinctio ipsum accusamus! Nisi harum rem reprehenderit ipsam numquam voluptatum nostrum dicta?</p>
</div>
</body>
<?php include ('includes/footer.php') ?>
</html>

