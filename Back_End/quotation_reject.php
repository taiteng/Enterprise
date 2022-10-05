<?php
session_start();

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once 'API/database.php';
include_once 'API/service.php';
  
$database = new database();
$db = $database->getConnection();

$service = new service($db);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST['serviceID'])){
        $service->service_id = $_POST['serviceID'];
        
        // create the product
        if($service->delete()){

            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Service was deleted."));

            header("Location: ../Front_End/home.php", TRUE, 301);
            exit;
        }
  
        // if unable to create the product, tell the user
        else{

            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to delete service."));
        }
    }
    // tell the user data is incomplete
    else{

        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to delete service. Data is incomplete."));
        }
}
