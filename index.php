<?php

    if(!isset($_SESSION)){
      session_start();
    }

    include_once("connections/connection.php");
    

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "Faculty"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "Student"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }else{
        echo header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/BenjaminekeLogo.png">
    <title>Login System with Basic CRUD</title>

  </head>
  <body>  

        <div class="container">
        <h1 style="text-align:center" class="my-1">Student List</h1>
        <a class="btn btn-primary" href="addDATA.php" role="button">Add Student</a>
        <a class="btn btn-primary" href="logout.php" role="button">Logout</a>
        <table class="table my-2">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID no.</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Course</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    
                    $sql = "SELECT * FROM `student_list`";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $firstname = $row['firstname'];
                            $lastname = $row['lastname'];
                            $course = $row['course'];
                            echo    '<tr class="bg-info">
                                        <th scope="row">' .$id. '</th>
                                        <td>' .$firstname. '</td>
                                        <td>' .$lastname. '</td>
                                        <td>' .$course. '</td>
                                        <td>
                                            <button class="btn btn-primary"><a href="editDATA.php?editDATAid=' .$id. '" class="text-light">Edit</a></button>
                                            <button class="btn btn-danger"><a href="deleteDATA.php?deleteid=' .$id. '" class="text-light">Delete</a></button>
                                        </td>
                                    </tr>';
                        }
                                    
                    }
                ?>
                
            </tbody>
        </table>
    </div>   

    <script src="main.js"></script>

    <!-- Bootstrap Javascript -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>