<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/deco_api/database.php';
include_once '../../../Admin_Back_End/api/deco_api/deco.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare deco object
$deco = new deco($db);
  
// set ID property of deco to be edited
$deco->deco_id = $_POST["id"];

// set deco property values
$deco->deco_name = $_POST["name"];
$deco->deco_desc = $_POST["desc"];
$deco->deco_price = $_POST["price"];

// update the deco
if($deco->updateDeco()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/decoration.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Decoration was updated."));
}
  
// if unable to update the deco, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update decoration."));
}
?>