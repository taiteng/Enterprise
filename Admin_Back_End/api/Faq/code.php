<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $faq_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM faq WHERE faq_id='$faq_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "FAQ Deleted Successfully";
        header("Location: ../../../Admin_Front_End/faq.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "FAQ Not Deleted";
        header("Location: ../../../Admin_Front_End/faq.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $faq_id = $_POST['faq_id'];
    $ques = $_POST['question'];
    $answ = $_POST['answer'];
    
    $query = "UPDATE faq SET Ques = '$ques' WHERE faq_id = '$faq_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $query = "UPDATE faq SET Answ = '$answ' WHERE faq_id = '$faq_id' ";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $_SESSION['message'] = "FAQ Updated Successfully";
            header("Location: ../../../Admin_Front_End/faq.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "FAQ Not Updated";
        header("Location: FAQedit.php");
        exit(0);
    }

}

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    

    $query = "INSERT INTO faq (Ques, Answ) VALUES ('$name','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "FAQ Created Successfully";
        header("Location: ../../../Admin_Front_End/faq.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "FAQ Not Created";
        header("Location: FAQcreate.php");
        exit(0);
    }
}

?>
