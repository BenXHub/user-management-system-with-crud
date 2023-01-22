<?php

include_once("connections/connection.php");
$db = mysqli_select_db($con, 'benjamineke_loginsystem_crud');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $course = $_POST['course'];

    $query = "INSERT INTO student_list (`fname`,`lname`,`course`) VALUES ('$fname','$lname','$course')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>