<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class discount{
  
    // database connection and table name
    private $conn;
    private $table_name = "discount";
  
    // object properties
    public $discount_id;
    public $discount_name;
    public $discount_status;
    public $discount_percent;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create discount
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET discount_name=:discount_name, discount_status=:discount_status, discount_percent=:discount_percent";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->discount_name=htmlspecialchars(strip_tags($this->discount_name));
        $this->discount_status=htmlspecialchars(strip_tags($this->discount_status));
        $this->discount_percent=htmlspecialchars(strip_tags($this->discount_percent));
        // bind values
        $stmt->bindParam(":discount_name", $this->discount_name);
        $stmt->bindParam(":discount_status", $this->discount_status);
        $stmt->bindParam(":discount_percent", $this->discount_percent);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // update the discount
    function updateDiscount(){
        
        // update query
        $query = "UPDATE discount 
                SET
                    discount_status = :discount_status,
                    discount_name = :discount_name,
                    discount_percent = :discount_percent
                WHERE
                    discount_id = :discount_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->discount_id=htmlspecialchars(strip_tags($this->discount_id));
        $this->discount_status=htmlspecialchars(strip_tags($this->discount_status));
        $this->discount_name=htmlspecialchars(strip_tags($this->discount_name));
        $this->discount_percent=htmlspecialchars(strip_tags($this->discount_percent));
        
        // bind new values
        $stmt->bindParam(':discount_id', $this->discount_id);
        $stmt->bindParam(':discount_status', $this->discount_status);
        $stmt->bindParam(':discount_name', $this->discount_name);
        $stmt->bindParam(':discount_percent', $this->discount_percent);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // delete the discount
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE discount_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->discount_id = htmlspecialchars(strip_tags($this->discount_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->discount_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}