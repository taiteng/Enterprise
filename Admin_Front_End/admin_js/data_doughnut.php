<?php
session_start();
include '../../Back_End/db_conn.php';

$query1 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Birthday Party'");
$query2 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Wedding Ceremony'");
$query3 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Farewell Ceremony'");
$query4 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Christmas Celebration'");
$query5 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'New Year Celebration'");
$query6 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Deepavali Celebration'");
$query7 = sprintf("SELECT COUNT(service_id) FROM service WHERE service_type = 'Raya Aidilfitri Celebration'");

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
$result5 = mysqli_query($conn, $query5);
$result6 = mysqli_query($conn, $query6);
$result7 = mysqli_query($conn, $query7);


$data = array();
foreach($result1 as $row){
    $data['Birthday Party'] = $row['COUNT(service_id)'];
}
foreach($result2 as $row){
    $data['Wedding Ceremony'] = $row['COUNT(service_id)'];
}
foreach($result3 as $row){
    $data['Farewell Ceremony'] = $row['COUNT(service_id)'];
}
foreach($result4 as $row){
    $data['Christmas Celebration'] = $row['COUNT(service_id)'];
}
foreach($result5 as $row){
    $data['New Year Celebration'] = $row['COUNT(service_id)'];
}
foreach($result6 as $row){
    $data['Deepavali Celebration'] = $row['COUNT(service_id)'];
}
foreach($result7 as $row){
    $data['Raya Aidilfitri Celebration'] = $row['COUNT(service_id)'];
}

$result1->close();
$result2->close();
$result3->close();
$result4->close();
$result5->close();
$result6->close();
$result7->close();

print json_encode($data);