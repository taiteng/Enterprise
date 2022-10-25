<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class deco{
  
    // database connection and table name
    private $conn;
    private $table_name = "decoration";
  
    // object properties
    public $deco_id;
    public $deco_name;
    public $deco_desc;
    public $deco_price;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create deco
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET deco_name=:deco_name, deco_desc=:deco_desc, deco_price=:deco_price";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->deco_name=htmlspecialchars(strip_tags($this->deco_name));
        $this->deco_price=htmlspecialchars(strip_tags($this->deco_price));
        $this->deco_desc=htmlspecialchars(strip_tags($this->deco_desc));
        // bind values
        $stmt->bindParam(":deco_name", $this->deco_name);
        $stmt->bindParam(":deco_price", $this->deco_price);
        $stmt->bindParam(":deco_desc", $this->deco_desc);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // update the deco
    function updateDeco(){
        
        // update query
        $query = "UPDATE decoration 
                SET
                    deco_name = :deco_name,
                    deco_desc = :deco_desc,
                    deco_price = :deco_price
                WHERE
                    deco_id = :deco_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->deco_id=htmlspecialchars(strip_tags($this->deco_id));
        $this->deco_name=htmlspecialchars(strip_tags($this->deco_name));
        $this->deco_desc=htmlspecialchars(strip_tags($this->deco_desc));
        $this->deco_price=htmlspecialchars(strip_tags($this->deco_price));
        
        // bind new values
        $stmt->bindParam(':deco_id', $this->deco_id);
        $stmt->bindParam(':deco_name', $this->deco_name);
        $stmt->bindParam(':deco_desc', $this->deco_desc);
        $stmt->bindParam(':deco_price', $this->deco_price);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // delete the deco
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE deco_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->deco_id = htmlspecialchars(strip_tags($this->deco_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->deco_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}