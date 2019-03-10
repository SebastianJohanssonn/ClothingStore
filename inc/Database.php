<?php
class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass ="";
    private $dbname = "clothingstore";
    private $dbh;
    private $error;
    private $stmt;
    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set Options
        $options = array(
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instance
        try{
            $this->dbh = new PDO ($dsn, $this->user, $this->pass, $options);
            $this->dbh->exec("set names utf8");
        } // Catch any errors
        catch ( PDOException $e ) {
            $this->error = $e->getMessage();
        }
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    public function execute(){
        return $this->stmt->execute();
    }
    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>