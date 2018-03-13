<div class="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="add.php">Add candidates</a></li>
        <li><a href="remove.php">Remove candidates</a></li>
        <li><a href="view.php">View Results</a></li>
        <?php  if(!isset($_SESSION['user'])) {    ?>
        <li><a href="register.php">Register</a></li>
        
        <li><a href="login.php">Login</a></li>
        <?php  } ?>
        <?php if(isset($_SESSION['user'])) {    ?>
        <li><a href="logout.php">Logout</a></li>
        <?php  } ?>
    </ul>
</div>