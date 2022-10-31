<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../../../BackEnd/API/database.php';
include_once '../../../BackEnd/API/service.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$service = new service($db);
  
// query products
$stmt = $service->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // products array
    $service_arr=array();
    $service_arr["records"]=array();
  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        
        $service_item=array(
            "id" => $service_id,
            "name" => $site_name,
            "image" => $site_address,
            "description" => $site_size,
            "length" => $username,
            "time" => $contact,
            "date" => $email,
            "priceAdult" => $service_type,
            "priceKid" => $service_desc,
            "location" => $event_date,
            "id" => $event_time,
            "name" => $no_ppl,
            "image" => $no_chair,
            "description" => $no_babychair,
            "length" => $no_table,
            "time" => $no_cup,
            "date" => $no_cutlery,
            "priceAdult" => $FND_name,
            "priceKid" => $no_FND,
            "location" => $deco_name,
            "priceAdult" => $fun_name,
            "priceKid" => $total_price
        );
        
  
        array_push($service_arr["records"], $service_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($service_arr);
}
  
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no products found
    echo json_encode(
        array("message" => "No service found.")
    );
}
