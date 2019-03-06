<?php include ('includes/header.php') ?>
<?php include ('includes/dbConnect.php') ?>
<?php include('functions.php')?>

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


$db = new Database;

$db->query( "SELECT * FROM products RIGHT JOIN image ON products.imageID = image.imageID where productID  = $id");
$product = $db->single();

?>
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

<?php include ('includes/footer.php') ?>

