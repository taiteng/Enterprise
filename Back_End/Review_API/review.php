<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class review{
  
    // database connection and table name
    private $conn;
    private $table_name = "review";
  
    // object properties
    public $review_id;
    public $name;
    public $comment;
    public $rating;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create review
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, comment=:comment, rating=:rating";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->comment=htmlspecialchars(strip_tags($this->comment));
        $this->rating=htmlspecialchars(strip_tags($this->rating));
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":comment", $this->comment);
        $stmt->bindParam(":rating", $this->rating);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}