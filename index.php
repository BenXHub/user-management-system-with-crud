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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/BenjaminekeLogo.png">
    <title>Login System with Basic CRUD</title>

  </head>
  <body>
    
     <!-- Modal -->
     <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Firstname </label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter Firstname" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label> Lastname </label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Lastname" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label> Course </label>
                            <input type="text" name="course" class="form-control" placeholder="Enter Course" autocomplete="off" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-dark">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Firstname </label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Firstname">
                        </div>

                        <div class="form-group">
                            <label> Lastname </label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Lastname">
                        </div>

                        <div class="form-group">
                            <label> Course </label>
                            <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-dark">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-dark"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 style="text-align:center;"><b> Student List </b></h1>
                <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#studentaddmodal">ADD DATA</button>
                <a class="btn btn-primary" href="logout.php" role="button">Logout</a>
                <?php
                    $connection = mysqli_connect("localhost","root","01234");
                    $db = mysqli_select_db($connection, 'benjamineke_loginsystem_crud');

                    $query = "SELECT * FROM student_list";
                    $query_run = mysqli_query($connection, $query);
                ?>
                <table id="datatableid" class="table table-bordered table-info" style="text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname </th>
                            <th scope="col"> Course </th>
                            <th scope="col"> Operations </th>
                        </tr>
                    </thead>
                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                            {
                                ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['fname']; ?> </td>
                                        <td> <?php echo $row['lname']; ?> </td>
                                        <td> <?php echo $row['course']; ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-dark editbtn"> EDIT </button>
                                            <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php           
                        }
                            }
                        else {
                            echo "No Record Found";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>


    <!-- Bootstrap Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script src="main.js"></script>

</body>
</html>
