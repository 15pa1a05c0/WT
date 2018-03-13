<!DOCTYPE HTML>
<html>
 <head>
    <title>VOTE</title>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ONLINE VOTING</a>
    </div>
      <ul class="nav navbar-nav">
      <li><a href="logout.php">Logout</a></li>
      <li><a href="vote.php">Vote</a></li>
      </ul>
  </div>
</nav>
<form action="" method="POST">
<button type="submit" name="submit">view candidates</button>
  </form>
  
   
 </body>
</html>
<?php
    require "connect.php";
    session_start();
    //$q = intval($_GET['q']);
    $uid=$_SESSION['id'];    
    echo $uid;
    if(isset($_POST['submit'])){
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
    }
?>
