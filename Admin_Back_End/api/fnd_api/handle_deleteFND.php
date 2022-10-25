<?php
session_start();
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
  
// prepare fnd object
$fnd = new fnd($db);

if(isset($_POST["deleteFND"])){
    // set fnd id to be deleted
    $fnd->FND_id = $_POST["deleteFND"];
    
    $sql = "SELECT * FROM fnd WHERE FND_id = '$fnd->FND_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// delete the product
if($fnd->delete()){
    $_SESSION['deleteSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/fnd.php");
    exit();
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "FND was deleted."));
}
  
// if unable to delete the product
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete FND."));
}