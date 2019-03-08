<?php include ('includes/header.php') ?>
<?php include('functions.php') ?>

<?php  if (isset($_SESSION['user'])) : ?>

    <strong><?php echo $_SESSION['user']['username']; ?></strong>

    <small>
        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
        <br>
        <a href="index.php?logout='1'" style="color: red;">logout</a>
    </small>

<?php endif ?>

<?php
$id = $_GET['id'];
?>
<input  id="category" type="hidden" value="<?php echo $id ?>">

<div class="mainBody">
    

    <div class="container products">
        <div id="page-content" class="row">
        </div>
    </div>
</div>
</body>
<script src="js/get-category.js"></script>
<script src="js/get-single-product.js"></script>


<?php include ('includes/footer.php') ?>
