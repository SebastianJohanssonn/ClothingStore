<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $productId = $_PUT["productId"];

    if (isset($_SESSION["shoppingCart"])) {
        $shoppingCart = json_decode($_SESSION["shoppingCart"]);
    } else {
        $shoppingCart = json_decode("{}");
    }

    if (isset($shoppingCart->{$productId})) {
        $shoppingCart->{$productId} = $shoppingCart->{$productId} + 1;
    } else {
        $shoppingCart->{$productId} = 1;
    }

    $_SESSION['shoppingCart'] = json_encode($shoppingCart);

    echo json_encode(true);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

} else {
    http_response_code(400);
}

?>