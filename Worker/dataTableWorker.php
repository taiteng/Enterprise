<?php
session_start();
include '../Admin_Front_End/db.php';
header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
$count = 1;
$currentAcc = $_SESSION['name'];
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
            project_status like '%".$searchValue."%' or
            service_desc like'%".$searchValue."%' ) ";
}

#Total number of records without filtering
$sel = mysqli_query($conn,"SELECT count(*) as allcount FROM service WHERE worker_name = '$currentAcc'");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

#Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from service WHERE 1 AND worker_name = '$currentAcc' ".$searchQuery );
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

#Fetch records
$projectQuery = "SELECT * FROM service WHERE worker_name = '$currentAcc' AND 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$projectRecords = mysqli_query($conn, $projectQuery);

$data = array();

while($row = mysqli_fetch_assoc($projectRecords)){
    
    if($row["project_status"] === "Open"){
        $data[] = array(
            "service_id"    =>$row['service_id'],
            "service_type"  => '<label>Project Type:</label>
                                <p class="fw-normal">'.$row['service_type'].'</p>
                                </br>
                                <label>Description</label>
                                <p class="text-muted mb-0">'.$row['service_desc'].'</p>
                                ',
            "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:green"></i> '.$row["project_status"].'',
            "progress_desc"=>'<label>Progress % Completion: </br></label>'
                                    . '</br>'.$row['progress_check'].''
                                    . '</br></br><label>Description:</label>'
                                    . '</br><p>'.$row['progress_desc'].'</p>'
                                     
                                    ,
            "action"        => '<i class="updateBtn button-30" aria-hidden="true" data-bs-id="'.$row["progress_desc"].'" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#progressModal">Update Task</i>'
                                
                                .'</br><form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="quotationBtn button-30">View Quotation</i></button></form>'
            );
    }else if($row["project_status"] === "In-Progress"){
        $data[] = array(
            "service_id"    =>$row['service_id'],
            "service_type"  => '<label>Project Type:</label>
                                <p class="fw-normal">'.$row['service_type'].'</p>
                                </br>
                                <label>Description</label>
                                <p class="text-muted mb-0">'.$row['service_desc'].'</p>
                                ',
            "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:orange"></i> '.$row["project_status"].'',
            "progress_desc"=>'<label>Progress % Completion: </br></label>'
                                    . '</br>'.$row['progress_check'].''
                                    . '</br></br><label>Description:</label>'
                                    . '</br><p>'.$row['progress_desc'].'</p>'
                                     
                                    ,
            "action"        => '<i class="updateBtn button-30" aria-hidden="true" data-bs-id="'.$row["progress_desc"].'" data-id="'.$row["service_id"].'" data-bs-toggle="modal" data-bs-target="#progressModal">Update Task</i>'
                                
                                .'</br><form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="quotationBtn button-30">View Quotation</i></button></form>'
            );
    }else{
        $data[] = array(
            "service_id"    =>$row['service_id'],
            "service_type"  => '<label>Project Type:</label>
                                <p class="fw-normal">'.$row['service_type'].'</p>
                                </br>
                                <label>Description</label>
                                <p class="text-muted mb-0">'.$row['service_desc'].'</p>
                                ',
            "project_status"=>'<i class="fa fa-circle fa-xs" aria-hidden="true" style="color:red"></i> '.$row["project_status"].'',
            "progress_desc"=>'<label>Progress % Completion: </br></label>'
                                    . '</br>'.$row['progress_check'].''
                                    . '</br></br><label>Description:</label>'
                                    . '</br><p>'.$row['progress_desc'].'</p>'
                                     
                                    ,
            "action"        => '</br><form action="download_pdf.php" method="post"><input type="hidden" name="serviceID" value="'. $row["service_id"] .'"><button class="btn" type="submit"><i class="quotationBtn button-30">View Quotation</i></button></form>'
            );
    }
    
    
    $count = $count + 1;
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
