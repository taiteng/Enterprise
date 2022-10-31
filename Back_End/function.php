<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function random_id_gen($length){
    //the characters you want in your id
    $characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $max = strlen($characters) - 1;
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    
    if (!isset($_SESSION['sid'])) {
        $_SESSION['sid'] = $string;
    }

    return $string;
}

function check_service_ID($conn, $sid){
    $query = "select * from service where service_id = '$sid'";

    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $service_data = mysqli_fetch_assoc($result);
        return $service_data;
    }
}

function check_service($conn){
    if(isset($_SESSION['sid'])){
	$sid = $_SESSION['sid'];
	$query = "select * from service where service_id = '$sid'";

	$result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $service_data = mysqli_fetch_assoc($result);
            return $service_data;
        }

    }
    else{
        header("Location: ../Front_End/home.php");
        die;
    }
}

function check_chair($conn){
    $chair = 'Chairs';
    $query = "select * from item where item_name = '$chair'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $chair_data = mysqli_fetch_assoc($result);
    }
    
    return $chair_data;
}

function check_babychair($conn){
    $babychair = 'Baby Chairs';
    $query = "select * from item where item_name = '$babychair'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $babychair_data = mysqli_fetch_assoc($result);
    }
    
    return $babychair_data;
}

function check_table($conn){
    $table = 'Tables';
    $query = "select * from item where item_name = '$table'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $table_data = mysqli_fetch_assoc($result);
    }
    
    return $table_data;
}

function check_cup($conn){
    $cup = 'Cups';
    $query = "select * from item where item_name = '$cup'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $cup_data = mysqli_fetch_assoc($result);
    }
    
    return $cup_data;
}

function check_cutlery($conn){
    $cutlery = 'Cutlery Sets';
    $query = "select * from item where item_name = '$cutlery'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $cutlery_data = mysqli_fetch_assoc($result);
    }
    
    return $cutlery_data;
}

function check_FND($FND_name, $conn){
    $FND = $FND_name;
    $query = "select * from fnd where pack_name = '$FND'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $FND_data = mysqli_fetch_assoc($result);
    }
    
    return $FND_data;
}

function check_deco($deco_name, $conn){
    $deco = $deco_name;
    $query = "select * from decoration where deco_name = '$deco'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $deco_data = mysqli_fetch_assoc($result);
    }
    
    return $deco_data;
}

function check_fun($fun_name, $conn){
    $fun = $fun_name;
    $query = "select * from fun where fun_name = '$fun'";
    $result = mysqli_query($conn, $query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $fun_data = mysqli_fetch_assoc($result);
    }
    
    return $fun_data;
}

function check_discount($conn){
    $status = 'enabled';
    $query = "select * from discount where discount_status = '$status'";

    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $discount_data = mysqli_fetch_assoc($result);
    }
    
    return $discount_data;
}