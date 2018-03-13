<!DOCTYPE HTML>
<html>
 <head>
    <title>VOTE</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <h1>RESULT</h1>
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
     <style>
        table {
           margin:10% 25%; 
           width: 50%;
        }
        table, td, th {
            border: 1px solid black;
            padding: 3px;
        }

        th {text-align:center;}
    </style>
 </head>
 <body>
 </body>
</html>
<?php
    require "connect.php";
    session_start();
    //$q = intval($_GET['q']);
        $sql="SELECT * FROM candidate";
        $result = mysqli_query($conn,$sql);

        echo "<table>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>count</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>"; 
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['count'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conn); 
    
?>