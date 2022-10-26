<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class accounts{
  
    // database connection and table name
    private $conn;
    private $table_name = "accounts";
  
    // object properties
    public $id;
    public $username;
    public $password;
    public $email;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create acc
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, password=:password, email=:email";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // update the acc
    function updateAcc(){
        
        // update query
        $query = "UPDATE accounts 
                SET
                    username = :username,
                    password = :password,
                    email = :email
                WHERE
                    id = :id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        
        // bind new values
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // delete the acc
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}