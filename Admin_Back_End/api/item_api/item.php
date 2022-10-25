<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class item{
  
    // database connection and table name
    private $conn;
    private $table_name = "item";
  
    // object properties
    public $item_id;
    public $item_name;
    public $item_price;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create item
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET item_name=:item_name, item_price=:item_price";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->item_name=htmlspecialchars(strip_tags($this->item_name));
        $this->item_price=htmlspecialchars(strip_tags($this->item_price));
        // bind values
        $stmt->bindParam(":item_name", $this->item_name);
        $stmt->bindParam(":item_price", $this->item_price);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // update the fnd
    function updateItem(){
        
        // update query
        $query = "UPDATE item 
                SET
                    item_name = :item_name,
                    item_price = :item_price
                WHERE
                    item_id = :item_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->item_id=htmlspecialchars(strip_tags($this->item_id));
        $this->item_name=htmlspecialchars(strip_tags($this->item_name));
        $this->item_price=htmlspecialchars(strip_tags($this->item_price));
        
        // bind new values
        $stmt->bindParam(':item_id', $this->item_id);
        $stmt->bindParam(':item_name', $this->item_name);
        $stmt->bindParam(':item_price', $this->item_price);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // delete the item
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE item_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->item_id = htmlspecialchars(strip_tags($this->item_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->item_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}