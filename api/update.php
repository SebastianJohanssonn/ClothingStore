<?php
    include "../classes/product.php";
    //parse_str(file_get_contents("php://input"), $_PUT);
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            if($_POST['collectionType'] == "products"){
                $productHandler = new Product();
                if($_POST['action'] == "update"){
                                
                    $productResult = $productHandler->updateStock($_POST['prodId'], $_POST['amount']);

                    echo json_encode($productResult);
                }
                exit;
                }
            }catch(PDOException $error) {
                echo json_encode($error->getMessage());
            }
        }else {
            echo json_encode("Ingen PUT");
        }
?>