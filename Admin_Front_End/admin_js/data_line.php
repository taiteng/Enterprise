<?php
session_start();
include '../../Back_End/db_conn.php';

$query = sprintf("SELECT event_date, SUM(total_price) AS total_price FROM service GROUP BY event_date ORDER BY event_date");

$result = mysqli_query($conn, $query);


$data = array();
foreach($result as $row){
    $data[] = $row;
}

$result->close();

print json_encode($data);