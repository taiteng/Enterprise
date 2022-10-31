<?php
include 'db.php';
header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
$draw = $_POST['draw'];  
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery .= " and (username like '%".$searchValue."%' or
            email like'%".$searchValue."%' ) ";
}

#Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from accounts");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

#Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from accounts WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

#Fetch records
$serviceQuery = "SELECT * FROM accounts WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$serviceRecords = mysqli_query($conn, $serviceQuery);

$data = array();

while($row = mysqli_fetch_assoc($serviceRecords)){
    $data[] = array(
            "username"=>$row['username'],
            "email"=>$row['email'],
            "actions"=>'<i class="editBtn fa fa-pencil-square-o fa-2x " aria-hidden="true" data-id="'.$row["id"].'" data-name="'.$row["username"].'" data-email="'.$row["email"].'" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"></i>'
                . '<i class="deleteBtn fa fa-trash fa-2x" aria-hidden="true" data-id="'.$row["id"].'" data-name="'.$row["username"].'" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"></i>'
            );
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);

?>