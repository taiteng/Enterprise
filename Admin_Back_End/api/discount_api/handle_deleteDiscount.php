<?php
session_start();
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

if(isset($_POST["deleteDiscount"])){
    // set discount id to be deleted
    $discount->discount_id = $_POST["deleteDiscount"];
    
    $sql = "SELECT * FROM discount WHERE discount_id = '$discount->discount_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// delete the discount
if($discount->delete()){
    $_SESSION['deleteSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/discount.php");
    exit();
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Discount was deleted."));
}
  
// if unable to delete the discount
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete discount."));
}