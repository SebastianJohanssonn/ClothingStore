<?php
    include "../classes/newsletter.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            if($_POST['collectionType'] == "subscribers"){
                $newsHandler = new Newsletter();
                if($_POST['action'] == "get"){
                    $newsResult = $newsHandler->getAllSubscribers();
                    
                    echo json_encode($newsResult);
                    
                }
                if($_POST['action'] == "create"){
                    $newsResult = $newsHandler->createSubscriber($_POST['signUpEmail'], $_POST['signUpName']);
                    
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