<?php include ('api/registerFunctions.php'); ?>
<?php include ('includes/header.php') ?>

<body onload="updateNumberNextToCartIcon()">
<?php
$id = $_GET['id'];
?>
<input  id="category" type="hidden" value="<?php echo $id ?>">

<div class="mainBody">
    

    <div class="container container-products">
        <div id="page-content">
        </div>
    </div>
</div>
</body>
<script src="script/get-category.js"></script>
<script src="script/get-single-product.js"></script>


<?php include ('includes/footer.php') ?>
