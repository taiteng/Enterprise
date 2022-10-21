<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class service{
  
    // database connection and table name
    private $conn;
    private $table_name = "service";
  
    // object properties
    public $service_id;
    public $site_name;
    public $site_address;
    public $site_size;
    public $username;
    public $contact;
    public $email;
    public $service_type;
    public $service_desc;
    public $event_date;
    public $event_time;
    public $no_ppl;
    public $no_chair;
    public $no_babychair;
    public $no_table;
    public $no_cup;
    public $no_cutlery;
    public $FND_name;
    public $no_FND;
    public $deco_name;
    public $fun_name;
    public $total_price;
    public $project_status;
    public $worker_name;
    public $progress_check;
    public $progress_desc;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create service
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET service_id=:service_id, site_name=:site_name, site_address=:site_address, site_size=:site_size, username=:username, contact=:contact, email=:email, service_type=:service_type, "
                . "service_desc=:service_desc, event_date=:event_date, event_time=:event_time, no_ppl=:no_ppl, no_chair=:no_chair, no_babychair=:no_babychair, no_table=:no_table, no_cup=:no_cup, no_cutlery=:no_cutlery, FND_name=:FND_name, "
                . "no_FND=:no_FND, deco_name=:deco_name, fun_name=:fun_name, total_price=:total_price, project_status=:project_status, worker_name=:worker_name, progress_check=:progress_check, progress_desc=:progress_desc";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize 
        $this->service_id=htmlspecialchars(strip_tags($this->service_id));
        $this->site_name=htmlspecialchars(strip_tags($this->site_name));
        $this->site_address=htmlspecialchars(strip_tags($this->site_address));
        $this->site_size=htmlspecialchars(strip_tags($this->site_size));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->service_type=htmlspecialchars(strip_tags($this->service_type));
        $this->service_desc=htmlspecialchars(strip_tags($this->service_desc));
        $this->event_date=htmlspecialchars(strip_tags($this->event_date));
        $this->event_time=htmlspecialchars(strip_tags($this->event_time));
        $this->no_ppl=htmlspecialchars(strip_tags($this->no_ppl));
        $this->no_chair=htmlspecialchars(strip_tags($this->no_chair));
        $this->no_babychair=htmlspecialchars(strip_tags($this->no_babychair));
        $this->no_table=htmlspecialchars(strip_tags($this->no_table));
        $this->no_cup=htmlspecialchars(strip_tags($this->no_cup));
        $this->no_cutlery=htmlspecialchars(strip_tags($this->no_cutlery));
        $this->FND_name=htmlspecialchars(strip_tags($this->FND_name));
        $this->no_FND=htmlspecialchars(strip_tags($this->no_FND));
        $this->deco_name=htmlspecialchars(strip_tags($this->deco_name));
        $this->fun_name=htmlspecialchars(strip_tags($this->fun_name));
        $this->total_price=htmlspecialchars(strip_tags($this->total_price));
        $this->project_status=htmlspecialchars(strip_tags($this->project_status));
        $this->worker_name=htmlspecialchars(strip_tags($this->worker_name));
        $this->progress_check=htmlspecialchars(strip_tags($this->progress_check));
        $this->progress_desc=htmlspecialchars(strip_tags($this->progress_desc));
        // bind values
        $stmt->bindParam(":service_id", $this->service_id);
        $stmt->bindParam(":site_name", $this->site_name);
        $stmt->bindParam(":site_address", $this->site_address);
        $stmt->bindParam(":site_size", $this->site_size);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":service_type", $this->service_type);
        $stmt->bindParam(":service_desc", $this->service_desc);
        $stmt->bindParam(":event_date", $this->event_date);
        $stmt->bindParam(":event_time", $this->event_time);
        $stmt->bindParam(":no_ppl", $this->no_ppl);
        $stmt->bindParam(":no_chair", $this->no_chair);
        $stmt->bindParam(":no_babychair", $this->no_babychair);
        $stmt->bindParam(":no_table", $this->no_table);
        $stmt->bindParam(":no_cup", $this->no_cup);
        $stmt->bindParam(":no_cutlery", $this->no_cutlery);
        $stmt->bindParam(":FND_name", $this->FND_name);
        $stmt->bindParam(":no_FND", $this->no_FND);
        $stmt->bindParam(":deco_name", $this->deco_name);
        $stmt->bindParam(":fun_name", $this->fun_name);
        $stmt->bindParam(":total_price", $this->total_price);
        $stmt->bindParam(":project_status", $this->project_status);
        $stmt->bindParam(":worker_name", $this->worker_name);
        $stmt->bindParam(":progress_check", $this->progress_check);
        $stmt->bindParam(":progress_desc", $this->progress_desc);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
    // delete the service
    function delete() {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE service_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->service_id = htmlspecialchars(strip_tags($this->service_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->service_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    // update the product
    function updateTask(){
        
        // update query
        $query = "UPDATE service 
                SET
                    worker_name = :worker_name,
                    project_status = :project_status
                WHERE
                    service_id = :service_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->service_id=htmlspecialchars(strip_tags($this->service_id));
        $this->project_status=htmlspecialchars(strip_tags($this->project_status));
        $this->worker_name=htmlspecialchars(strip_tags($this->worker_name));
        
        // bind new values
        $stmt->bindParam(':service_id', $this->service_id);
        $stmt->bindParam(':project_status', $this->project_status);
        $stmt->bindParam(':worker_name', $this->worker_name);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    
    // update the product
    function updateWorkerTask(){
        
        // update query
        $query = "UPDATE service 
                SET
                    progress_check = :progress_check,
                    progress_desc   = :progress_desc,
                    project_status = :project_status
                WHERE
                    service_id = :service_id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        $this->service_id=htmlspecialchars(strip_tags($this->service_id));
        $this->progress_check=htmlspecialchars(strip_tags($this->progress_check));
        $this->progress_desc=htmlspecialchars(strip_tags($this->progress_desc));
        $this->project_status=htmlspecialchars(strip_tags($this->project_status));
        
        // bind new values
        $stmt->bindParam(':service_id', $this->service_id);
        $stmt->bindParam(':project_status', $this->project_status);
        $stmt->bindParam(':progress_desc', $this->progress_desc);
        $stmt->bindParam(':progress_check', $this->progress_check);
        
        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}