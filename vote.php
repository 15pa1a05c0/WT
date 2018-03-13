<?php
  include "connect.php"; 
  session_start();
  //print_r($_SESSION);
   $uid=$_SESSION['id'];
   echo $uid;
  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
 if(isset($_POST['sub'])) {
     if(!isset($_POST['vote'])){
        phpAlert(   "Please select an option"   );
     }else{
        $id = $_POST['vote'];
        $find="SELECT *FROM vote where `user_id`=$uid";
        $sql = mysqli_query($conn,$find);
        if(mysqli_num_rows($sql)>0) {
            phpAlert(   "You cannot vote again"   );
        }else{
            echo $id."and".$uid;
            $qry="INSERT INTO `vote`(`user_id`,`cand_id`)values('$uid','$id')";
            echo $qry;
            mysqli_query($conn,$qry);
            $x="SELECT count FROM candidate where `id`='$id'";
            $sql=mysqli_query($conn,$x);
            
            $row=mysqli_fetch_array($sql);
            $c = $row['count'];
            $c=$c+1;
            $x="UPDATE `candidate` SET `count` = '$c' where `id`='$id' ";
            mysqli_query($conn,$x);
        }
    }
    //echo $row['count'];
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Add</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ONLINE VOTING</a>
    </div>
      <ul class="nav navbar-nav">
      <li><a href="logout.php">Logout</a></li>
      </ul>
  </div>
</nav>
    <form action="" method="POST">
        <?php 
        $qry = "SELECT * FROM `candidate`";
        $sql=mysqli_query($conn,$qry);
        $res=mysqli_fetch_assoc($sql);
        //echo $res['id'];
        if(mysqli_num_rows($sql)==0) {
            phpAlert(   "no candidates"   );
            return;
        }
        while($row=mysqli_fetch_assoc($sql)){
        ?>
        <input type="radio" name="vote" value ="<?php echo $row['id'];?>"><?php echo $row['name'];?> <br>
       <?php } ?>
         
         <button type="submit" class="btn btn-default" name="sub">Submit Vote</button>
    </form>
</body>
</html>