<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  
// include database and object files
include_once 'database.php';
include_once 'review.php';
  
$database = new database();
$db = $database->getConnection();
  
$review = new review($db);

if($_SERVER['REQUEST_METHOD'] == "POST"){    
    if(!empty($_POST['name']) && !empty($_POST['comment'])){      
        if($_POST['rating'] ==  null){
            $_POST['rating'] = 0;
        }
        $review->name = $_POST['name'];
        $review->comment = $_POST['comment'];
        $review->rating = $_POST['rating'];
        
        // create the product
        if($review->create()){

            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Review was created."));
            
            $_SESSION['reviewCreated'] = true;
            
            header("Location: ../../Front_End/quotation.php", TRUE, 301);
            
            exit;
        }
  
        // if unable to create the product, tell the user
        else{

            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create review."));
        }
    }
    // tell the user data is incomplete
    else{

        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to create review. Data is incomplete."));

    }
}