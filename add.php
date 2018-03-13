<!DOCTYPE HTML>
<html>
<head>
    <title>Add</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <style>
        table {
            margin:5% 25%; 
           width: 50%;
           border-collapse:collapse;

        }
        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }
        th {text-align: center;}
    </style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ADD CANDIDATES</a>
    </div>
      <ul class="nav navbar-nav">
      <li> <a href="admin.php">HOME</a></li>
      <li> <a href="logout.php">LOGOUT</a></li>
      </ul>
  </div>
</nav>
</head>
<body>
<div class="container">
  <h2>VOTER LOGIN</h2>
  <form action="" method="POST">
    <div class="form-group">
    <label for="name"><b>Candidate name</b></label>
        <input type="text" class="form-control" placeholder="Enter name" name="name" required>
    </div>
    <div class="form-group">
    <label for="year"><b>Year</b></label>
        <input type="number"  class="form-control" placeholder="Enter year" name="year" required>
    </div>
    <div class="form-group">
    <label for="branch"><b>Branch</b></label>
        <input type="text"  class="form-control" placeholder="Enter branch" name="branch" required>
    </div>
    <button type="submit"  class="btn btn-default" name="sub">ADD</button>
  </form>
</div>
</body>
</html>
<?php
   require "connect.php";
   session_start();
   if(isset($_POST['sub'])){
       $name=$_POST["name"];
       $year=$_POST["year"];
       $branch=$_POST["branch"];
       $qry = "SELECT * FROM `user` WHERE  `username`='$name'";
       $x=mysqli_query($conn,$qry);
      // if(mysqli_num_rows($x)>0){
      // }else{    
            $qry="INSERT INTO `candidate`(`name`,`year`,`branch`,`count`)values('$name','$year','$branch',0)";
            mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
            //header("location:add.php");
       //}
   }
   $sql="SELECT * FROM candidate";
    $result = mysqli_query($conn,$sql);
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>year</th>
    <th>branch</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>"; 
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['branch'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn); 
?>
