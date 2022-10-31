<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/fun_api/database.php';
include_once '../../../Admin_Back_End/api/fun_api/fun.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare fun object
$fun = new fun($db);
  
// set ID property of fun to be edited
$fun->fun_id = $_POST["id"];

// set deco property values
$fun->fun_name = $_POST["name"];
$fun->fun_desc = $_POST["desc"];
$fun->fun_price = $_POST["price"];

// update the fun
if($fun->updateFun()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/fun.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Fun was updated."));
}
  
// if unable to update the fun, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update fun."));
}
?>