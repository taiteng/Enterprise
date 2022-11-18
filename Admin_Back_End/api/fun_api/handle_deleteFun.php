<?php
session_start();
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
  
// prepare fnd object
$fun = new fun($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

$id = filter_input(INPUT_POST, 'deleteFun');

//if it is an postman call
if($id == ""){
    $fun->fun_id = $data->fun_id;
    $postman = true;
}else{ //if it is normal implementation
    // set ID property of item to be deleted
    $fun->fun_id = $id;
}

// delete the fun
if($fun->delete()){
    $_SESSION['deleteSuccess'] = "true";
    if($postman){
        
    }else{
        header("Location: ../../../Admin_Front_End/fun.php");
        exit();
    }
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Fun was deleted."));
}
  
// if unable to delete the fun
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete fun."));
}