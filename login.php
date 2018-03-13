<?php
  include "connect.php";
  session_start();
  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
  if(isset($_POST["sub"])) {
    $usrname=$_POST["uname"];
    $pass=md5($_POST["psw"]);
       
    $qry = "SELECT * FROM `user` WHERE  `username`='$usrname' AND `pwd`='$pass'";
    $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
    $res=mysqli_fetch_assoc($sql);
    //echo $res['id'];
    if(mysqli_num_rows($sql)>0) {
            
        //$row=mysqli_fetch_array($sql);
        echo $res['user_id'];
        $_SESSION["id"]=$res['user_id'];
        $_SESSION["user"]=$res['username'];
        $_SESSION["password"] = $res['pwd'];
        header('location:home.php');
         print_r($_SESSION);
    } else {
        phpAlert(   "Please register"   );
        //header('location:register.php');
    }
  } 

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>VOTER LOGIN</h2>
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
    <a href="register.php">Register</a>
  </form>
</div>


</body>
</html>