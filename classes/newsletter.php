<?php
    include_once ("../api/databaseHandler.php");

    class Newsletter{

        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllSubscribers(){
            $query = $this->database->connection->prepare("SELECT * FROM newsletter;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }

        public function createSubscriber($email, $name){
            $query = $this->database->getConnection()->prepare("INSERT INTO newsletter
            (email, name)
            VALUES ('.$email.', '.$name.');");
            $result = $query->execute();
            if(!empty($result)){
                return "Du är nu registrerad!";
            }else {
                return "Testa igen!";
            }
            
            
        }
    }
?>