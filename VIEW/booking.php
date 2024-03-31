<?php
require_once '../MODEL/model.php'; 
    if(!isset($_SESSION)) {
        session_start();
    } 
   // $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');

    $username = $_SESSION['username'];

    $query = "SELECT `first_name`, `last_name`, `email` FROM `user` WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
</head>
<body>
    <?php// header("Location:../CONTROLLER/navbar.php");
    //include 'navbar.php'; ?>
    <br>
    <h1 style="text-align:center;">Booking</h1>
    <form action="../CONTROLLER/bookingaction.php" method="post">
        <label for="name">name:</label>
        <input id="name" type="text" name="name" value="<?php echo $row['first_name']." ". $row['last_name']; ?>" required><br><br>
        <label>TYPE:</label>
        <label><input type="radio" name="type" value="car">Car</label>&nbsp;
        <label><input type="radio" name="type" value="bus">Bus</label><br><br>
        <label for="req_date">the day the car will be nedded:</label>
        <input id="req_date" type="date" name="req_date" placeholder="Day the car is needed" required> <br><br>
        <label for="req_time">the time the car will be needed:</label>
        <input type="text" name="req_time" id="req_time" /><br><br>
        <label for="return_date">the day the car will be return:</label>
        <input id="return_date" type="date" name="return_date" placeholder="Day the car is returned" required> <br><br>
        <label for="return_time">the time the car will be return:</label>
        <input type="text" name="return_time" id="return_time" /><br><br>
        <label for="desnitation">destination:</label>
        <input id="destination" type="text" name="destination" placeholder="Car Destination" required><br><br>
        <label for="pickup">pickup:</label>
        <input id="pickup" type="text" name="pickup" placeholder="pickup"><br><br>
        <label for="reason">reason to book:</label>
        <input id="reason" type="text" name="reason" placeholder="Reason of booking the vehicle"><br><br>
        <label for="email">email:</label>
        <input id="email" type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <label for="mobile">mobile no:</label>
        <input id="mobile" type="text" name="mobile" placeholder="Mobile No" required><br><br>
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="submit" name="submit">
    </form>
</body>
</html>
