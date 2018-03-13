<?php
  require "connect.php";
  session_start();
  function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  }
  if(isset($_POST['sub'])){
    $val=$_POST['id'];
    $qry = "SELECT * FROM `candidate` WHERE  `id`='$val'";
       $x=mysqli_query($conn,$qry);
       if(mysqli_num_rows($x)==0){
        phpAlert(   "Not exist"   );
       }else{    
          $qry="DELETE FROM `candidate` WHERE `id`='$val'";
            mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
            
       }
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
<!DOCTYPE HTML>
<html>
   <head>
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
   </head>

   <body>
<div class="container">
  <form action="" method="POST">
  
    <div class="form-group">
    <label for="id"><b>ID</b></label>
   <input type="number" class="form-control" placeholder="Enter id to delete" name="id">
    </div>
    <button type="submit"  class="btn btn-default" name="sub">DELETE</button>
  </form>
</div>
  </body> 
</html>