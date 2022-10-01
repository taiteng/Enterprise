<?php
$servername  = "localhost";
$username = "root";
$password = "";
$db = "covent";

$conn = mysqli_connect($servername, $username, $password, $db);

$sql = mysqli_query($conn, "SELECT * FROM  `service`");

$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);


exit(json_encode($result));