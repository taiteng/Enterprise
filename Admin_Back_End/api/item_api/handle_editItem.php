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
  
// prepare item object
$item = new item($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');

//if it is an postman call
if($id == "" && $name == "" && $price == ""){
    $item->item_id= $data->item_id;
    $item->item_name = $data->item_name;
    $item->item_price = $data->item_price;
    $postman = true;
}else{ //if it is normal implementation
    // set ID property of item to be edited
    $item->item_id = $id;
    
    // set item property values
    $item->item_name = $name;
    $item->item_price = $price;
}

// update the item
if($item->updateItem()){
    $_SESSION['updateSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/item.php");
        exit();
    }
    
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