<?php
  include "config.php";
  session_start();

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/post.php");
  }
?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <style>
      body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: #34495e;
  }
  .box{
    background: #191919;
    text-align: center;
  }
  label{
    color:#fff;
    text-transform: uppercase;
  }
  .form-control{
    border:0;
    background: none;
    display: block;
    margin: 10px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 14px 10px;
    width: 200px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
  }
  .box input[type = "text"]:focus,.box input[type = "password"]:focus{
    width: 280px;
    border-color: #2ecc71;
  }
  .box input[type = "submit"]{
    border:0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
  }
  .box input[type = "submit"]:hover{
    background: #2ecc71;
  }
  a{
    border:0;
    background: none;
    display: block;
    margin: 10px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 7px  15px;
    outline: none;
    color: white;
    border-radius: 15px;
    transition: 0.25s;
    cursor: pointer;
  }
   a:hover{
    background: #fff;

  }
</style>
    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row" >
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.png">
                        <h3 class="heading" style="color:white;text-align:center;">Login with your username & password</h3>
                        <!-- Form Start -->
                        <form class="box"action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <h3 class="heading" style="color:white;">new user? <a href="../sign-up.php" >Sign-up</a></h3>

                        <!-- /Form  End -->
                        <?php
                          if(isset($_POST['login'])){
                            include "config.php";
                            if(empty($_POST['username']) || empty($_POST['password'])){
                              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                              $password = md5($_POST['password']);

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                  session_start();
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];

                                  header("Location: {$hostname}/admin/post.php");
                                }

                              }else{
                              echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                            }
                          }
                          }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
