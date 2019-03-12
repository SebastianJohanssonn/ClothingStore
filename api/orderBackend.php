<?php

session_start();
require_once("../classes/order.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["shippingOption"])) {
        $order = new Order();
        $shippingOption = $_POST["shippingOption"];
        $adress = $_POST["adress"];
        $userID = $_SESSION["user"]["id"];
        $shoppingCart = json_decode($_SESSION["shoppingCart"]);
        $amounts =  get_object_vars($shoppingCart);
        $keys = array_keys((array)$shoppingCart);
        // add to order
        $orderData = $order->placeOrder($userID, $adress, $shippingOption);
        $orderId = $orderData[0]["orderID"];
        for ($i = 0; $i < count($keys); $i++) {
            // add to orderRow
            $productId = $keys[$i];
            $amount = $amounts[$productId];
            $order->updateOrder($orderId, $productId, $amount);
        }
        unset($_SESSION["shoppingCart"]);
    } 
    if (isset($_POST['getShippingOptions'])) {
        $order = new Order();
        echo json_encode($order->getShippingOptions());
    }

} 

?>