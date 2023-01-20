<?php

    include 'connections/connection.php';

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $course = $_POST['course'];

        $sql = "INSERT INTO `student_list`(`firstname`, `lastname`, `course`) VALUES ('$firstname','$lastname','$course')";
        $con->query($sql) or die ($con->error);
        header('location: index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link rel="shortcut icon" href="img/BenjaminekeLogo.png">
    <link rel="stylesheet" href="css/main.css">

    <title>Student Form CRUD</title>

    <style>
        body{
            background-image: url('img/BenjaminekeBG.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>

  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Course</label>
                <input type="text" class="form-control"  name="course" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php" class="btn btn-danger float-end">BACK</a>
        </form>
    </div>
  </body>
</html>