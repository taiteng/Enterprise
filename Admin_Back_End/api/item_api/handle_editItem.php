<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/item_api/database.php';
include_once '../../../Admin_Back_End/api/item_api/item.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$item = new item($db);
  
// set ID property of item to be edited
$item->item_id = $_POST["id"];

// set product property values
$item->item_name = $_POST["name"];
$item->item_price = $_POST["price"];

// update the product
if($item->updateItem()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/item.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Item was updated."));
}
  
// if unable to update the item, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update item."));
}
?>