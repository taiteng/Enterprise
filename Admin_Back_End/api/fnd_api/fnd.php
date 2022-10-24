<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class fnd{
  
    // database connection and table name
    private $conn;
    private $table_name = "fnd";
  
    // object properties
    public $FND_id;
    public $pack_name;
    public $pack_price;
    public $pack_desc;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create review
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET pack_name=:pack_name, pack_price=:pack_price, pack_desc=:pack_desc";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->pack_name=htmlspecialchars(strip_tags($this->pack_name));
        $this->pack_price=htmlspecialchars(strip_tags($this->pack_price));
        $this->pack_desc=htmlspecialchars(strip_tags($this->pack_desc));
        // bind values
        $stmt->bindParam(":pack_name", $this->pack_name);
        $stmt->bindParam(":pack_price", $this->pack_price);
        $stmt->bindParam(":pack_desc", $this->pack_desc);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}