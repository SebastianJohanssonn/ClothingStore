<?php 
	include('api/registerFunctions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<body onload="getAndDisplayShoppingcart()">

<?php include ('includes/header.php') ?>
<?php  if (isset($_SESSION['user'])) : ?>
<?php endif ?>
<?php $id = $_GET['id']; ?>

    <input  id="category" type="hidden" value="<?php echo $id ?>">
    <div class="mainBody">
        <div class="container-products">
            <div id="page-content">
            </div>
        </div>
    </div>

<script src="script/get-category.js"></script>
<script src="script/get-single-product.js"></script>

</body>

<?php include ('includes/footer.php') ?>
