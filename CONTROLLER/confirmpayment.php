<?php

    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    
    $msg="";
    $id=$_GET['id'];
    
    $query= "SELECT * FROM `tripcost` WHERE booking_id='$id'";
    $query1="UPDATE `booking` SET `paid`='1' WHERE booking_id='$id'";
    $result= mysqli_query($connection,$query);
    $result1= mysqli_query($connection,$query1);
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
        
    <h1>Trip Details</h1>
    <?php echo $msg; ?>
           
    <p><strong>Booking Id: </strong><?php echo $row['booking_id']; ?></p>    
    <p><strong>Total Km: </strong><?php echo $row['total_km']; ?></p>    
    <p><strong>Oil Cost: </strong><?php echo $row['oil_cost']; ?></p>    
    <p><strong>Extra Cost: </strong><?php echo $row['extra_cost']; ?></p>    
    <p><strong>Total Cost: </strong><?php echo $row['total_cost']; ?></p>
              
    <form action="confirmpaymentaction.php?id=<?php echo $row['booking_id']; ?>" method="post">
        <button>Confirm Payment</button>
    </form> 
</body>
</html>
