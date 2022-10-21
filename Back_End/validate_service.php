<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  
// include database and object files
include_once 'Service_API/database.php';
include_once 'Service_API/service.php';
  
$database = new database();
$db = $database->getConnection();

$service = new service($db);

if (isset($_SESSION['sid'])) {
    $service->service_id = $_SESSION['sid'];

    // create the service
    if ($service->delete()) {

        // set response code - 201 created
        http_response_code(201);

        // tell the user
//        echo json_encode(array("message" => "Service was deleted."));
    }

    // if unable to create the service, tell the user
    else {

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to delete service."));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to delete service. Data is incomplete."));
}