<?php include ('includes/header.php') ?>
<?php include ('includes/dbConnect.php') ?>
<?php include('functions.php') ?>

<?php  if (isset($_SESSION['user'])) : ?>

    <strong><?php echo $_SESSION['user']['username']; ?></strong>

    <small>
        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
        <br>
        <a href="index.php?logout='1'" style="color: red;">logout</a>
    </small>

<?php endif ?>

<div class="mainBody">
    <div class="container">
        <div class="row landing">
            <div class="col-md-4 landing-picture" style=" background-image: url(https://www.junkyard.se/media/catalog/category/sweaters.jpg);">
            </div>
            <div class="col-md-8 landing-text">
                <h2>Clothes</h2>
                <p>Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin.
                    Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd
                    boksättare tog att antal bokstäver och blandade dem för att göra
                    ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden</p>
            </div>
        </div>
    </div>

    <div class="container products">
        <div id="page-content" class="row">
        </div>
    </div>
</div>
</body>
<script>

</script>
<script src="js/get-products.js"></script>
<script src="js/get-single-product.js"></script>


<?php include ('includes/footer.php') ?>
