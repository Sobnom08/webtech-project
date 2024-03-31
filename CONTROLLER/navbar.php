<?php
require_once '../MODEL/model.php';
include_once 'navbar.php'; // Use relative path if navbar.php is in the same directory

if(isset($_SESSION['username']) == false) {
?>
<nav>
    <button type="button" data-toggle="collapse" data-target="#myNavbar"></button>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="buslist.php">Vehicle</a></li>
        <li><a href="driverlist.php">Driver</a></li>
    </ul>
    <ul>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>
<?php } else { ?>
<nav>
    <button type="button" data-toggle="collapse" data-target="#myNavbar"></button>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="buslist.php">Vehicle</a></li>
        <li><a href="driverlist.php">Driver</a></li>
        <li><a href="mybill.php?id=<?php echo $_SESSION['username']; ?>">My Account</a></li>
    </ul>
    <ul>
        <li><a href="logout.php">Log Out</a></li>
        <li><a href="#">Welcome <?php echo $_SESSION['username']; ?></a></li>
    </ul>
</nav>
<?php } ?>

