<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/discount_api/database.php';
include_once '../../../Admin_Back_End/api/discount_api/discount.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$discount = new discount($db);
  
// set product property values
$discount->discount_percent = $_POST["percent"];
$discount->discount_name = $_POST["name"];
$discount->discount_status = $_POST["status"];

// update the discount
if($discount->create()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/discount.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Discount was created."));
}
  
// if unable to update the discount, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create discount."));
}
?>