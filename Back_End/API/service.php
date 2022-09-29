<?php
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
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create service
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET site_name=:site_name, site_address=:site_address, site_size=:site_size, username=:username, contact=:contact, email=:email, service_type=:service_type, "
                . "service_desc=:service_desc, event_date=:event_date, event_time=:event_time, no_ppl=:no_ppl, no_chair=:no_chair, no_babychair=:no_babychair, no_table=:no_table, no_cup=:no_cup, no_cutlery=:no_cutlery, FND_name=:FND_name, no_FND=:no_FND, deco_name=:deco_name, fun_name=:fun_name";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
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
        // bind values
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
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}