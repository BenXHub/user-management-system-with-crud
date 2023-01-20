<?php
include 'connections/connection.php';

extract($_POST);

if(isset($_POST['firstnameSend']) && ($_POST['lastnameSend']) && ($_POST['courseSend'])){
    $sql = "INSERT INTO `crud` (firstname,lastname,course) values ('$firtnameSend','$lastnameSend','$courseSend')";

    $result=mysqli_query($con,$sql);
}

?>