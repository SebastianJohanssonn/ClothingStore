<?php
    include "../classes/order.php";
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            if($_POST['collectionType'] == "order"){
                $orderHandler = new Order();
                if($_POST['action'] == "get"){
                    $orderResult = $orderHandler->getAllOrders();
                    echo json_encode($orderResult);
                }
                
                exit;
            }
        }
        catch(PDOException $error) {
            echo json_encode($error->getMessage());
        }
    }else {
        echo json_encode("Ingen POST");
    }

?>