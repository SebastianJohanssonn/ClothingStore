<?php
include "productHandler.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $order = new Product();

    echo json_encode($order->getAllProducts());   
}
?>