<?php
session_start();
include '../../Back_End/db_conn.php';

$query = sprintf("SELECT total_price, event_date FROM service");

$result = mysqli_query($conn, $query);

$data = array();
foreach($result as $row){
    $data[] = $row;
}

$result->close();

print json_encode($data);