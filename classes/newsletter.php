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
    }
?>