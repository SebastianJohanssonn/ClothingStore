<?php include ('includes/header.php') ?>
<?php include ('includes/dbConnect.php') ?>

<?php
$db = new Database;

$db->query( "SELECT * FROM products RIGHT JOIN image ON products.imageID = image.imageID where categoryID  = 3");
$products = $db->resultset();
?>

<div class="mainBody">
    <div class="container">
        <div class="row landing">
            <div class="col-md-4 landing-picture" style=" background-image: url(https://www.junkyard.se/media/catalog/category/cap.jpg);">
            </div>
            <div class="col-md-8 landing-text">
                <h2>Accesories</h2>
                <p>Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin.
                    Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd
                    boksättare tog att antal bokstäver och blandade dem för att göra
                    ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden</p>
            </div>
        </div>
    </div>

    <div class="container products">
        <div class="row">
            <?php foreach ($products as $accesories) {?>
                <div class="col-md-3 product">
                    <a href="product.php?id=<?php echo $accesories->productId ?>">
                        <?php echo '<img class="product-image" src="data:image/jpeg;base64,'.base64_encode( $shoe->image ).'"/>'; ?>
                    </a>
                    <div class="product-text">
                        <?php echo $accesories->name?>
                        <div class="product-price">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <?php echo $accesories->price?> kr

                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-light"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<?php include ('includes/footer.php') ?>
