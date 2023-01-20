<?php

    $con=new mysqli('localhost', 'root', '01234', 'benjamineke_loginsystem_crud');

    if(!$con){
        die(mysqli_error($con));
    }

?>




    <!-- // function connection(){

    //     $host = "localhost";
    //     $username = "root";
    //     $password = "01234";
    //     $database = "benjamineke_loginsystem_crud";
    //     $con=new mysqli('localhost', 'root', '01234', 'benjamineke_loginsystem_crud');

    //     $con = false;
    //     try {
    //         $con = mysqli_connect($host, $username, $password, $database);
    //     }
    //     catch (Exception $e) {
    //         $con = mysqli_connect($host, $username, $password, $database);
    //     }

      
    //     if($con->connect_error){
    //         echo $con->connect_error;
    //     } else{

    //     return $con;

    //     }
 -->
