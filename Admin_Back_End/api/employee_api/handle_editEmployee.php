<?php
session_start();
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/employee_api/database.php';
include_once '../../../Admin_Back_End/api/employee_api/employee.php';
include "../../../Back_End/db_conn.php";
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare fun object
$acc = new accounts($db);
  
// set ID property of fun to be edited
$acc->id = $_POST["id"];

// set deco property values
$acc->username = $_POST["name"];
$acc->password = $_POST["pw"];
$acc->email = $_POST["email"];

// update the fun
if($acc->updateAcc()){
    $_SESSION['updateSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/employee.php");
    exit();
    
    // set response code - 200 ok
    http_response_code(200);
    
    // tell the user
    echo json_encode(array("message" => "Account was updated."));
}
  
// if unable to update the account, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update account."));
}
?>