<?php include ('includes/header.php') ?>
<?php include ('includes/dbConnect.php') ?>


<?php
$id = $_GET['id'];


$db = new Database;

$db->query( "SELECT * FROM products RIGHT JOIN image ON products.imageID = image.imageID where productID  = $id");
$product = $db->single();

?>
<body>
<div class ="container">

    <div class="row">
        <div class="col-md-8">
            <?php echo '<img class="product-image-info " src="data:image/jpeg;base64,'.base64_encode( $product->image ).'"/>'; ?>
        </div>
        <div class="col-md-4">
            <br>
            <h2 class="product-info-name">  <?php echo $product->name?> </h2>
            <p>Lorem Ipsum är en utfyllnadstext från tryck- och förlagsindustrin.
                Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd
                boksättare tog att antal bokstäver och blandade dem för att göra
                ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden</p>
            <br>
           <h4>
               <?php echo $product->price?> kr
           </h4>
            <button class="btn btn-Dark"> Buy</button>
        </div>

    </div>

    <div>
        Photo carousel
    </div>


</div>
</body>
<?php include ('includes/footer.php') ?>

