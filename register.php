<?php
   require "connect.php";
   session_start();
   function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
   if(isset($_POST['sub'])){
       $name=$_POST["uname"];
       $email=$_POST["email"];
       $pass=$_POST["psw"];
       $qry = "SELECT * FROM `user` WHERE  `username`='$name' OR `email`='$email'";
       $x=mysqli_query($conn,$qry);
       if(mysqli_num_rows($x)>0){
        phpAlert(   "User name already exists"   );
       }else{    
            $qry="INSERT INTO `user`(`username`,`email`,`pwd`)values('$name','$email',MD5('$pass'))";
            $sql=mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
            $res=mysqli_fetch_assoc($sql);
            $_SESSION['id']=$res['user_id'];
            $usr=$res['user_id'];
            print_r($_SESSION);
            header('location:login.php');
       }
   }

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>   
<body>
<div class="container">
<h2>VOTER REGISTRATION</h2>
  <form action="" method="POST">
    <div class="form-group">
    <label for="uname"><b>Username</b></label>
     <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="form-group">
    <label for="email"><b>Email</b></label>
     <input type="email" class="form-control" placeholder="Enter email" name="email" required>
     </div>
     <div class="form-group">
     <label for="psw"><b>Password</b></label>
     <input type="password" class="form-control" placeholder="Enter Password" name="psw" required> 
    </div>
    <button type="submit"  class="btn btn-default" name="sub">Register</button>
  </form>
</div>



</body>
</html>