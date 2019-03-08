<?php
    include_once ("../api/databaseHandler.php");

    class Product {
        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllProducts(){
            $query = $this->database->getConnection()->prepare("SELECT * FROM products;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }

        public function updateStock($id, $amount){
            $query = $this->database->getConnection()->prepare("UPDATE products 
            SET unitsInStock ='" .$amount. "'WHERE productId = '".$id."';");
            
            $result = $query->execute();

            return $result;
        }
    }

?>