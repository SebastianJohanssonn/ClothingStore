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

            $query = $this->database->getConnection()->prepare("SELECT * FROM orders;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }

        function getShippingOptions() {
            $statement = $this->database->getConnection()->prepare("SELECT * FROM courier");
            $statement->execute();
            $res = $statement->fetchAll();
            return $res;
        }

        function placeOrder($userID, $adress, $shippingOption) {
            $statement = $this->database->getConnection()->prepare("INSERT INTO orders (courierName, adress, UserID) VALUES ( :shippingOption, :adress, :userID)");
            $statement->bindParam(':shippingOption', $shippingOption);
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':adress', $adress);
            $statement->execute();
            
            $stmt2 = $this->database->getConnection()->prepare("SELECT * FROM orders WHERE UserId = :userID ORDER BY orderID DESC LIMIT 1");
            $stmt2->bindParam(':userID', $userID);
            $stmt2->execute();
            $res = $stmt2->fetchAll();
            return $res;
        }

        function updateOrder($orderId, $productId, $amount) {
            $statement = $this->database->getConnection()->prepare("INSERT INTO orderrow (orderId, productId, numberOfProducts) VALUES ( :orderId, :productId, :numberOfProducts)");
            $statement->bindParam(':orderId', $orderId);
            $statement->bindParam(':productId', $productId);
            $statement->bindParam(':numberOfProducts', $amount);
            $statement->execute();

            $statement = $this->database->getConnection()->prepare("UPDATE products SET unitsInStock = (unitsInStock - :amount) WHERE productId = :productId");
            $statement->bindParam(':amount', $amount);
            $statement->bindParam(':productId', $productId);
            $statement->execute();
        }
}

?>