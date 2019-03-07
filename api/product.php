<?php
class Product{
    // database connection and table name
    private $conn;
    private $table_name = "products";

    // object properties
    public $productId;
    public $name;
    public $description;
    public $price;
    public $categoryId;
    public $category_name;
    public $created;
    public $imageSrc;
    public $imageName;


    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
        // select all query
        $query = "SELECT products.productId, products.price, products.name, products.categoryId, image.imageName, image.imageSrc 
        FROM products JOIN image ON products.imageID = image.imageID";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function getCategory(){
        // query to read single record
        $query = "SELECT products.productId,products.price, products.name, image.imageSrc 
         FROM products 
         JOIN image ON products.imageID = image.imageID
                    WHERE
                        categoryId = ? ";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // set values to object properties
        $this->productId = $row['productId'];
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->imageSrc = $row['imageSrc'];
    }


    // used when filling up the updatez product form
    function getOne(){
        // query to read single record
        $query = "SELECT products.productId,products.price, products.name, image.imageSrc 
         FROM products 
         JOIN image ON products.imageID = image.imageID
                    WHERE
                        productID = ? 

                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // set values to object properties
        $this->productId = $row['productId'];
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->imageSrc = $row['imageSrc'];
    }
}