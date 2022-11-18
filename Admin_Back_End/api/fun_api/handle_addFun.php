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
// get posted data
$data = json_decode(file_get_contents("php://input"));

$name = filter_input(INPUT_POST, 'name');
$desc = filter_input(INPUT_POST, 'desc');
$price = filter_input(INPUT_POST, 'price');


//if it is an postman call
if($name == "" && $price == "" && $desc == ""){
    $fun->fun_name = $data->fun_name;
    $fun->fun_desc = $data->fun_desc;
    $fun->fun_price = $data->fun_price;
    $postman = true;
}else{ //if it is normal implementation
    // set item property values
    $fun->fun_name = $name;
    $fun->fun_price = $price;
    $fun->fun_desc = $desc;
}

// update the fun
if($fun->create()){
    $_SESSION['createSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/fun.php");
        exit();
    }
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Fun was created."));
}
  
// if unable to update the fun, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create fun."));
}
?>