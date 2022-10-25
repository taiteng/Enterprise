<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Back_End/Service_API/database.php';
include_once '../../../Back_End/Service_API/service.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$service = new service($db);
  
// set ID property of product to be edited
$service->service_id = $_POST["sid"];
  
// set product property values
$service->progress_check = $_POST["progressCompletion"];
$service->project_status = $_POST["status"];
$service->progress_desc = $_POST["progressDesc"];

// update the product
if($service->updateWorkerTask()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Worker/my_project.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Service was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update service."));
}
?>