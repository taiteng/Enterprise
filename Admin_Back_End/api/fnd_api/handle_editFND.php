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

// get posted data
$data = json_decode(file_get_contents("php://input"));

$id = filter_input(INPUT_POST, 'id');
$desc = filter_input(INPUT_POST, 'desc');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');

//if it is an postman call
if($name == "" && $price == ""){
    $fnd->FND_id = $data->FND_id;
    $fnd->pack_name = $data->pack_name;
    $fnd->pack_desc = $data->pack_desc;
    $fnd->pack_price = $data->pack_price;
    $postman = true;
}else{ //if it is normal implementation
    // set item property values
    $fnd->FND_id = $id;
    $fnd->pack_name = $name;
    $fnd->pack_desc  = $desc;
    $fnd->pack_price = $price;
}

// update the product
if($fnd->updateFND()){
    $_SESSION['updateSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/fnd.php");
        exit();
    }
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Package was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update package."));
}
?>