<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../../Back_End/Service_API/database.php';
include_once '../../../Back_End/Service_API/service.php';
include "../../../Back_End/db_conn.php";

// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$service = new service($db);

if(isset($_POST["deleteService"])){
    // set service id to be deleted
    $service->service_id = $_POST["deleteService"];
    
    $sql = "SELECT * FROM service WHERE service_id = '$service->service_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// delete the product
if($service->delete()){
    $_SESSION['deleteSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/projects.php");
    exit();
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Service was deleted."));
}
  
// if unable to delete the product
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete service."));
}