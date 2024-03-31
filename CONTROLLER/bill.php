<?php

    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    
    $msg="";
    $id=$_GET['id'];
    
    $query= "SELECT  `username` FROM `booking` WHERE booking_id='$id'";
    $result= mysqli_query($connection,$query);
    $row= mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill</title>
</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br><br>
        
    <h1 style="text-align: center;">Trip Details</h1>
    <?php echo $msg; ?>
           
    <form action="billaction.php?id=<?php echo $id; ?>" method="post">
        <b>Total Km</b>
        <input id="km" type="text" name="total_km" placeholder="Total Km">
        <br>
        <b>Oil Cost</b>
        <input id="oil" type="text" name="oil_cost" placeholder="Total Oil">
        <br>
        <b>Extra Cost</b>
        <input id="extra" type="text" name="extra_cost" placeholder="Extra Cost">
        <br>
        <b>Total Cost</b>
        <input id="total" type="text" name="total_cost" placeholder="Total Cost">
        <br>
        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
