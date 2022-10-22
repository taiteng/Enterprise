<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// include database
include_once 'db_conn.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST['serviceID']) && !empty($_POST['totalPrice'])){
        $sid = $_POST['serviceID'];
        $total = $_POST['totalPrice'];
        
        $sql = "UPDATE service SET total_price = '$total' WHERE service_id = '$sid'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            
            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Service was updated."));
            
            $_SESSION["sid"] = $sid;
            $_SESSION["total"] = $total;

            header("Location: ../Front_End/payment.php", TRUE, 301);
            exit;
            
        } else {
            echo "Error updating record: " . $conn->error;
            
            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to update service."));
        }

        $conn->close();
    }
    else {

        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to update service. Data is incomplete."));
    }
}
