<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class fun{
  
    // database connection and table name
    private $conn;
    private $table_name = "fun";
  
    // object properties
    public $fun_id;
    public $fun_name;
    public $fun_desc;
    public $fun_price;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create fun
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET fun_name=:fun_name, fun_desc=:fun_desc, fun_price=:fun_price";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->fun_name=htmlspecialchars(strip_tags($this->fun_name));
        $this->fun_price=htmlspecialchars(strip_tags($this->fun_price));
        $this->fun_desc=htmlspecialchars(strip_tags($this->fun_desc));
        // bind values
        $stmt->bindParam(":fun_name", $this->fun_name);
        $stmt->bindParam(":fun_price", $this->fun_price);
        $stmt->bindParam(":fun_desc", $this->fun_desc);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // update the fun
    function updateFun(){
        
        // update query
        $query = "UPDATE fun 
                SET
                    fun_name = :fun_name,
                    fun_desc = :fun_desc,
                    fun_price = :fun_price
                WHERE
                    fun_id = :fun_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->fun_id=htmlspecialchars(strip_tags($this->fun_id));
        $this->fun_name=htmlspecialchars(strip_tags($this->fun_name));
        $this->fun_desc=htmlspecialchars(strip_tags($this->fun_desc));
        $this->fun_price=htmlspecialchars(strip_tags($this->fun_price));
        
        // bind new values
        $stmt->bindParam(':fun_id', $this->fun_id);
        $stmt->bindParam(':fun_name', $this->fun_name);
        $stmt->bindParam(':fun_desc', $this->fun_desc);
        $stmt->bindParam(':fun_price', $this->fun_price);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // delete the fun
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE fun_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fun_id = htmlspecialchars(strip_tags($this->fun_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->fun_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}