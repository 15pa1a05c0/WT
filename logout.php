<?php 
// call session_start()
session_start();
// destroy the session by calling session_destroy()
session_unset();
session_destroy();
// redirect to login.php page
header('location:index.php');
?>