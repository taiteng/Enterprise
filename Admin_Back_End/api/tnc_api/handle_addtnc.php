<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/tnc_api/database.php';
include_once '../../../Admin_Back_End/api/tnc_api/tnc.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare item object
$tnc = new tnc($db);
  
// set ID property of item to be edited
$tnc->tnc_id = $_POST["tnc_id"];
  
// set item property values
$tnc->tnc_desc = $_POST["tnc_desc"];


// update the item
if($tnc->create()){
    $_SESSION['createSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/tnc.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Item was created."));
}
  
// if unable to update the item, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create item."));
}
?>