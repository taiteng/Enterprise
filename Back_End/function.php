<?php
session_start();

function random_id_gen($length){
    //the characters you want in your id
    $characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    $max = strlen($characters) - 1;
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }

    $_SESSION['sid'] = $string;
    return $string;
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

        header("Location: ../Front_End/quotation.php");
        die;
    }
    else{
        //redirect to login
        header("Location: ../Front_End/home.php");
        die;
    }
}