<?php
    include_once ("../api/databaseHandler.php");
    class Order{
        private $orderId;
        private $adress;

        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllOrders(){

            $query = $this->database->connection->prepare("SELECT * FROM orders;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
    }
}

?>