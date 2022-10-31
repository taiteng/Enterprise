<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../../Admin_Back_End/api/deco_api/database.php';
include_once '../../../Admin_Back_End/api/deco_api/deco.php';
include "../../../Back_End/db_conn.php";

// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare fnd object
$deco = new deco($db);

if(isset($_POST["deleteDeco"])){
    // set deco id to be deleted
    $deco->deco_id = $_POST["deleteDeco"];
    
    $sql = "SELECT * FROM decoration WHERE deco_id = '$deco->deco_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

// delete the deco
if($deco->delete()){
    $_SESSION['deleteSuccess'] = "true";
    header("Location: ../../../Admin_Front_End/decoration.php");
    exit();
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Decoration was deleted."));
}
  
// if unable to delete the decoration
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete Decoration."));
}