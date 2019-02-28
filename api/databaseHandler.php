<?php
     class Database {
        
        function __construct()
        {
            try {
                $dsn = "mysql:host=localhost;dbname=clothingstore;";
                $user = "root";
                $password = "";

                $this->connection = new PDO($dsn, $user, $password, NULL);
                $this->connection->exec('set names utf8');
            } 
            catch(PDOException $error) {
                throw $error;
            }
        }
    }
?>