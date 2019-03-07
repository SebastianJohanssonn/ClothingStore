<?php
    include "orderHandler.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $order = new Order();

        echo json_encode($order->getAllOrders());   
    }

?>