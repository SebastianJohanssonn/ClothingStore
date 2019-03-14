<?php
    include_once ("../api/databaseHandler.php");

    class Newsletter{

        function __construct()
        {
            $this->database = new Database();
        }

        public function getAllSubscribers(){
            $query = $this->database->getConnection()->prepare("SELECT * FROM newsletter;");
            $query->execute();
            $result = $query->fetchAll();

            return $result;
        }

        public function createSubscriber($email, $name){

            if(empty($name) || empty($email)){
                return "Name or email is not filled in.";
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Ingen giltig emailadress.";
            }

            $query = $this->database->getConnection()->prepare("SELECT email FROM newsletter
            WHERE email = '$email';");
            $query->execute();
            if($query->rowCount() > 0){
                return "This email already exists.";
            }

            $query2 = $this->database->getConnection()->prepare("INSERT INTO newsletter
            (email, name)
            VALUES ('$email', '$name');");
            $result = $query2->execute();
            if(!empty($result)){
                return "You are now registered!";
            }

            
        }
    }
?>