<?php
include "../Back_End/db_conn";
session_start();

if(isset($_POST["submit"])){
    $pic = $_POST["username"];
    
    $service_id = "";
    if(isset($_GET["service_id"])){
        $service_id = $_GET["service_id"];
    }
    
    $query = "UPDATE service SET username = :$pic WHERE service_id = $service_id ";
    
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    header("Location: ../Admin_Front_End/projects.php");
    exit();
}


