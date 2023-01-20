<?php

    include 'connections/connection.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `student_list` WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if($result){
            // echo "Deleted Successfully";
            header('location: index.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>