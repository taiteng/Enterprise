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
   $searchQuery .= " and (service_id like '%".$searchValue."%' or
            service_type like '%".$searchValue."%' or
            service_desc like '%".$searchValue."%' or
            worker_name like '%".$searchValue."%' or
            project_status like'%".$searchValue."%' ) ";
}

#Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from service");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

#Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from service WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

#Fetch records
$serviceQuery = "SELECT * FROM service WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$serviceRecords = mysqli_query($conn, $serviceQuery);

$data = array();
 
while($row = mysqli_fetch_assoc($serviceRecords)){
    if($row['project_status'] == "Open"){
        $worker_name = $row['worker_name'];
        $workerarray = "$worker_name";
        $data[] = array(
                "service_id"=>$row['service_id'],
                "service_type"=>'<p class="fw-normal mb-1">'.$row['service_type'].'</p>',
                "service_desc"=>'<p class="text-muted mb-0">'.$row['service_desc'].'</p>',
                "worker_name"=>$workerarray,
                "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:green"></i> '.$row["project_status"].'',
                "progress_check"=>$row['progress_check'],
                "progress_desc"=>'<i class="viewProgressBtn 	fa fa-arrows-alt" aria-hidden="true" data-id="'.$row["progress_desc"].'" data-bs-toggle="modal" data-bs-target="#progressModal"></i>',
                "quotation"=>'<form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="fa fa-download fa-2x" aria-hidden="true"></i></button></form>',
                "actions"=>'<i id="myEditId" class="editBtn fa fa-pencil-square-o fa-2x " aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#assignModal"></i>'
                    . '<i id="myDeleteId" class="deleteBtn fa fa-trash fa-2x" aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>'
                );
    }else if($row['project_status'] == "In-Progress"){
        $worker_name = $row['worker_name'];
        $workerarray = "$worker_name";
        $data[] = array(
                "service_id"=>$row['service_id'],
                "service_type"=>'<p class="fw-normal mb-1">'.$row['service_type'].'</p>',
                "service_desc"=>'<p class="text-muted mb-0">'.$row['service_desc'].'</p>',
                "worker_name"=>$workerarray,
                "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:orange"></i> '.$row["project_status"].'',
                "progress_check"=>$row['progress_check'],
                "progress_desc"=>'<i class="viewProgressBtn 	fa fa-arrows-alt" aria-hidden="true" data-id="'.$row["progress_desc"].'" data-bs-toggle="modal" data-bs-target="#progressModal"></i>',
                "quotation"=>'<form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="fa fa-download fa-2x" aria-hidden="true"></i></button></form>',
                "actions"=>'<i id="myEditId" class="editBtn fa fa-pencil-square-o fa-2x " aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#assignModal"></i>'
                    . '<i id="myDeleteId" class="deleteBtn fa fa-trash fa-2x" aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>'
                );
    }else{
        $worker_name = $row['worker_name'];
        $workerarray = "$worker_name";
        $data[] = array(
                "service_id"=>$row['service_id'],
                "service_type"=>'<p class="fw-normal mb-1">'.$row['service_type'].'</p>',
                "service_desc"=>'<p class="text-muted mb-0">'.$row['service_desc'].'</p>',
                "worker_name"=>$workerarray,
                "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:red"></i> '.$row["project_status"].'',
                "progress_check"=>$row['progress_check'],
                "progress_desc"=>'<i class="viewProgressBtn 	fa fa-arrows-alt" aria-hidden="true" data-id="'.$row["progress_desc"].'" data-bs-toggle="modal" data-bs-target="#progressModal"></i>',
                "quotation"=>'<form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="fa fa-download fa-2x" aria-hidden="true"></i></button></form>',
                "actions"=>'<i id="myEditId" class="editBtn fa fa-pencil-square-o fa-2x " aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#assignModal"></i>'
                    . '<i id="myDeleteId" class="deleteBtn fa fa-trash fa-2x" aria-hidden="true" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>'
                );
    }
    
    
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