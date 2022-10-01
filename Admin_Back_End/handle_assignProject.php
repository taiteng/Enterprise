<?php
include "../Back_End/db_conn";
session_start();

if(isset($_POST["submit"])){
    $pic = $_POST["username"];
    
    $query = "UPDATE service SET username = :$pic";
}


