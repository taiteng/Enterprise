<?php
  
// include database and object files
include_once 'database.php';
include_once 'service.php';
  
$database = new database();
$db = $database->getConnection();
  
$service = new service($db);

if($_SERVER['REQUEST_METHOD'] == "POST"){    
    if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['size']) && !empty($_POST['username']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['type']) && !empty($_POST['description'])
            && !empty($_POST['date']) && !empty($_POST['startTime']) && !empty($_POST['endTime']) && !empty($_POST['noppl']) && !empty($_POST['nochair']) && !empty($_POST['nobabychair']) && !empty($_POST['notable']) && !empty($_POST['nocup']) && !empty($_POST['nocutlery'])
            && !empty($_POST['selectFND']) && !empty($_POST['noFND']) && !empty($_POST['selectDeco']) && !empty($_POST['selectFun'])  && !empty($_POST['sid']) &&  !empty($_POST['totalprice']) &&  !empty($_POST['projectstatus'])
                    &&  !empty($_POST['workername']) &&  !empty($_POST['progresscheck']) &&  !empty($_POST['progressdescription'])){        
        
        $time = $_POST['startTime'] ." to ". $_POST['endTime'];
        
        $service->service_id = $_POST['sid'];
        $service->site_name = $_POST['name'];
        $service->site_address = $_POST['address'];
        $service->site_size = $_POST['size'];
        $service->username = $_POST['username'];
        $service->contact = $_POST['contact'];
        $service->email = $_POST['email'];
        $service->service_type = $_POST['type'];
        $service->service_desc = $_POST['description'];
        $service->event_date = $_POST['date'];
        $service->event_time = $time;
        $service->no_ppl = $_POST['noppl'];
        $service->no_chair = $_POST['nochair'];
        $service->no_babychair = $_POST['nobabychair'];
        $service->no_table = $_POST['notable'];
        $service->no_cup = $_POST['nocup'];
        $service->no_cutlery = $_POST['nocutlery'];
        $service->FND_name = $_POST['selectFND'];
        $service->no_FND = $_POST['noFND'];
        $service->deco_name = $_POST['selectDeco'];
        $service->fun_name = $_POST['selectFun'];
        $service->total_price = $_POST['totalprice'];
        $service->project_status = $_POST['projectstatus'];
        $service->worker_name = $_POST['workername'];
        $service->progress_check = $_POST['progresscheck'];
        $service->progress_desc = $_POST['progressdescription'];
        
        // create the product
        if($service->create()){

            // set response code - 201 created
            http_response_code(201);

            // tell the user
            echo json_encode(array("message" => "Service was created."));

            header("Location: ../../Front_End/quotation.php", TRUE, 301);
            exit;
        }
  
        // if unable to create the product, tell the user
        else{

            // set response code - 503 service unavailable
            http_response_code(503);

            // tell the user
            echo json_encode(array("message" => "Unable to create service."));
        }
    }
    // tell the user data is incomplete
    else{

        // set response code - 400 bad request
        http_response_code(400);

        // tell the user
        echo json_encode(array("message" => "Unable to create service. Data is incomplete."));

    }
}