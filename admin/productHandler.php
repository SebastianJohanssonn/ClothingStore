<?php
    include_once ("../api/databaseHandler.php");

    class Product {
        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllProducts(){
            $query = $this->database->connection->prepare("SELECT * FROM products;");
            $result = $query->execute();

            echo "<h1>Befintliga produkter</h1><br><div id='adminProds'><ul>";
            if($result > 0) {
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='prodList'>
                            <li><strong>Product name:</strong> " .$row['name']."</li>
                            <li><strong>Product cat:</strong> " .$row['categoryId']. "</li>
                            <li><strong>Image:</strong>" . $row['imageId'] . "</li>
                        </div>";
                }
                
            }
        }
    }

?>