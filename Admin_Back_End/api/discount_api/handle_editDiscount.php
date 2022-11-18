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
  
// prepare discount object
$discount = new discount($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
$id = filter_input(INPUT_POST, 'discountid');
$name = filter_input(INPUT_POST, 'name');
$percent = filter_input(INPUT_POST, 'percent');
$status = filter_input(INPUT_POST, 'status');

//if it is an postman call
if($id == ""){
    $discount->discount_id = $data->discount_id;
    $discount->discount_name = $data->discount_name;
    $discount->discount_percent = $data->discount_percent;
    $discount->discount_status = $data->discount_status;
    $postman = true;
}else{ //if it is normal implementation
    // set ID property of item to be deleted
    $discount->discount_id = $id;
    $discount->discount_name = $name;
    $discount->discount_percent = $percent;
    $discount->discount_status = $status;
}

// update the discount
if($discount->updateDiscount()){
    $_SESSION['updateSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/discount.php");
        exit();
    }
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Discount was updated."));
}
  
// if unable to update the discount, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update discount."));
}
?>