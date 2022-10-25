<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/fnd_api/database.php';
include_once '../../../Admin_Back_End/api/fnd_api/fnd.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$fnd = new fnd($db);
  
// set ID property of product to be edited
$fnd->FND_id = $_POST["fndid"];

// set product property values
$fnd->pack_name = $_POST["name"];
$fnd->pack_desc = $_POST["desc"];
$fnd->pack_price = $_POST["price"];

// update the product
if($fnd->create()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/fnd.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Package was created."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create package."));
}
?>