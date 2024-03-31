<?php 
  require_once '../MODEL/model.php';
   // $connection=mysqli_connect("localhost","root","","vehicle management");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Management System</title>
     
    <?php include 'navbar.php'; ?>
</head>
<body>
    <h1>Vehicle Management System</h1>
    <p>A management system where you can easily manage vehicles</p>
 
    <?php if (isset($_SESSION['username'])) { ?>
        <a href="../VIEW/booking.php" style="text-align: center;">Book a Vehicle</a>
        <a href="trip_detailsCus.php" style="text-align: center;">Check trip cost</a>
    <?php } else { ?>
        <a href="login.php" style="text-align: center;">Login To Book A Vehicle</a>
    <?php } ?>
</body>
</html>
