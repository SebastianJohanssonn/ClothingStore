<?php include ('../inc/dbConnect.php') ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idOfChosenProduct = $_GET["productId"];
    $db = new Database;
    $db->query( "SELECT * FROM products RIGHT JOIN image ON products.imageID = image.imageID where productId = $idOfChosenProduct");
    $products = $db->resultset();
    $returnProduct = $products[0];
    
    echo json_encode($returnProduct);

} else {
    http_response_code(400);
}

?>