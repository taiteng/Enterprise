<?php
session_start();
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
  
// prepare fnd object
$item = new item($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
$id = filter_input(INPUT_POST, 'deleteItem');

//if it is an postman call
if($id == ""){
    $item->item_id = $data->item_id;
    $postman = true;
}else{ //if it is normal implementation
    // set ID property of item to be deleted
    $item->item_id = $id;
}


// delete the item
if($item->delete()){
    $_SESSION['deleteSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/item.php");
        exit();
    }
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Item was deleted."));
}
  
// if unable to delete the item
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete Item."));
}