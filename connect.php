<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "voting" ;


$conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " . mysql_connect());
if(!$conn){
    echo 'failed to connect';
}
mysqli_select_db($conn,$db);

?>