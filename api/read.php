<?php
    include "../classes/order.php";
    include "../classes/product.php";
    
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            if($_POST['collectionType'] == "orders"){
                $orderHandler = new Order();
                if($_POST['action'] == "get"){
                    $orderResult = $orderHandler->getAllOrders();
                    echo json_encode($orderResult);
                }
                exit;
            }
            if($_POST['collectionType'] == "products"){
                $productHandler = new Product();
                if($_POST['action'] == "get"){
                    $productResult = $productHandler->getAllProducts();

                    echo json_encode($productResult);
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