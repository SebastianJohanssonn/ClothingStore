<?php
    include "../classes/order.php";
    include "../classes/product.php";
    include "../classes/newsletter.php";
    
    
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
            if($_POST['collectionType'] == "subscribers"){
                $newsHandler = new Newsletter();
                if($_POST['action'] == "get"){
                    $newsResult = $newsHandler->getAllSubscribers();

                    echo json_encode($newsResult);
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