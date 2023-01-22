<?php
include_once("connections/connection.php");
$db = mysqli_select_db($con, 'benjamineke_loginsystem_crud');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $course = $_POST['course'];

        $query = "UPDATE student_list SET fname='$fname', lname='$lname', course='$course' WHERE id='$id'  ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>