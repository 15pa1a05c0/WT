<?php
  include "connect.php";
  session_start();

  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }

  if(isset($_POST["sub"])) {
    $usrname=$_POST["uname"];
    $pass=md5($_POST["psw"]);

    if(($usrname == "kiran") && ($pass == MD5('kiran'))){
        //echo "logged in";   
        $_SESSION["user"]=$usrname;
        //$_SESSION["email"] = $email;
        $_SESSION["password"] = $pass;
        header('location:admin.php');
    }
    else {
        phpAlert(   "Invalid login!!!....Please Register"   );         
        header('location:index.php');
    }
  } 


?>

<!DOCTYPE HTML>
<html>
<head>
    <title>ADMIN LOGIN</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    


<div class="container">
  <h2>ADMIN LOGIN</h2>
  <form action="" method="POST">
    <div class="form-group">
    <label for="uname"><b>Username</b></label>
        <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="form-group">
    <label for="psw"><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
    </div>
    <button type="submit"  class="btn btn-default" name="sub">Login</button>
  </form>
</div>




</body>
</html>