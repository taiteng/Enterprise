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

if(isset($_POST["deleteFun"])){
    // set fun id to be deleted
    $fun->fun_id = $_POST["deleteFun"];
    
    $sql = "SELECT * FROM fun WHERE fun_id = '$fun->fun_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// delete the fun
if($fun->delete()){
    $_SESSION['deleteSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/fun.php");
    exit();
  
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