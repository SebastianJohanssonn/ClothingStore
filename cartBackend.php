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
        $shoppingCart->{$productId}++;
    } else {
        $shoppingCart->{$productId} = 1;
    }

    $_SESSION['shoppingCart'] = json_encode($shoppingCart);

    echo json_encode(true);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);

    $productId = $_DELETE["productId"];
    $shoppingCart = json_decode($_SESSION['shoppingCart']);

    if ($shoppingCart->{$productId} === 1) {
        unset($shoppingCart->{$productId});
    } else {
        $shoppingCart->{$productId}--;
    }

    $_SESSION['shoppingCart'] = json_encode($shoppingCart);

    echo json_encode(true);
} else {
    http_response_code(400);
}

?>