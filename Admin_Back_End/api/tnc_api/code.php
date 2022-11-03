<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $tnc_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM tnc WHERE tnc_id='$tnc_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "TNC Deleted Successfully";
        header("Location: ../../../Admin_Front_End/tnc.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "TNC Not Deleted";
        header("Location: ../../../Admin_Front_End/tnc.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $tnc_id = mysqli_real_escape_string($con, $_POST['tnc_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    
    $query = "UPDATE tnc SET tnc_desc='$name' WHERE tnc_id='$tnc_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "TNC Updated Successfully";
        header("Location: ../../../Admin_Front_End/tnc.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "TNC Not Updated";
        header("Location: ../../../Admin_Front_End/tnc.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    

    $query = "INSERT INTO tnc (tnc_desc) VALUES ('$name')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "TNC Created Successfully";
        header("Location: TNCcreate.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "TNC Not Created";
        header("Location: TNCcreate.php");
        exit(0);
    }
}

?>
