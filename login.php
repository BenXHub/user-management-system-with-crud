<?php
    
    session_start();

    include_once("connections/connection.php");

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $user = $con->query($sql) or die ($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;

        if($total > 0){
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];
            echo header("Location: index.php");
        }else{
            echo "<div class='message warning'>No user found.</div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Login System</title>       
    </head>
    <body>
        <div class="main">
            <div class="container">
                <center>
                    <div class="middle">
                        <div id="login">
                                <div class="text-color text-light">
                                    <h2>Sign In</h2>
                                </div>
                                <br>
                                <!-- <div class="form-logo">
                                    <img src="img/BenjaminekeLogo.png" alt="">
                                </div> -->
                                
                                <form action="" method="post">
                                    
                                    <fieldset class="clearfix">
                                        <div class="form-element">
                                            <span class="fa fa-user"></span><input type="text" name="username" id="username" autocomplete="off" placeholder="Enter Usename" required>
                                        </div>

                                        <div class="form-element">
                                            <span class="fa fa-lock"></span><input type="password" name="password" id="password"  placeholder="Enter Password" required>
                                        </div>
                                        
                                        <button class="btn btn-secondary" style="text-align:center; width:100%;" type="submit" name="login">Login</button>
                                    </fieldset>
                                </form>
                                <div class="clearfix"></div>
                                    </div> <!-- end login -->
                                    <div class="logo">
                                        <img src="img/ACLClogo.png" alt="">  
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
        </div>

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </body>
</html>