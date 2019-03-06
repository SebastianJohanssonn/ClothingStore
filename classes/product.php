<?php
    include_once ("../api/databaseHandler.php");

    class Product {
        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllProducts(){
            $query = $this->database->connection->prepare("SELECT * FROM products;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }
    }

?>