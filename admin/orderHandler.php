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
            $result = $query->execute();
            
            echo "<div id='memberDiv'>
                    <table id='ordersTable'>
                        <tr>
                            <th>Order ID</th>
                            <th>Courier Id</th>
                            <th>adress ID</th>
                            <th>produkt ID</th>
                            <th>User ID</th>
                        </tr>
                </div>";

            if($result > 0)
            {
                while($row = $query->fetch(PDO::FETCH_ASSOC))
                {
                    echo "
                        <tr>
                            <td>".$row['orderID']."</td>
                            <td>".$row['courierId']."</td>
                            <td>".$row['adressID']."</td>
                            <td>".$row['produktID']."</td>
                            <td>".$row['UserID']."</td>
                            <td>
                                <input type='checkbox' id='order" . $row["orderID"] . "' value='".$row['orderID']."'>
                                <button>Bekräfta</button>
                            </td>
                        </tr>
                    ";
                }   
            }
        }
    }

?>