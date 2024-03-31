<?php
    $connection = mysqli_connect("localhost", "root", "", "vehicle management");
    session_start();
    
    $id = $_GET['id']; 

    $sql = "SELECT * FROM `booking` WHERE booking_id='$id'"; 
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);

    $sql1 = "SELECT * FROM `vehicle` WHERE veh_available='0'"; 
    $res1 = mysqli_query($connection, $sql1);

    $sql2 = "SELECT * FROM `driver` WHERE dr_available='0'"; 
    $res2 = mysqli_query($connection, $sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm booking</title>
</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br>
    <h1 style="text-align:center;">Confirm Booking</h1>
    <br>
    <p><strong>Booking Id: </strong><?php echo $row['booking_id']; ?></p> 
    <p><strong>Customer Name: </strong><?php echo $row['name']; ?></p> 
    <p><strong>Requested Date: </strong><?php echo $row['req_date']; ?></p> 
    <p><strong>Requested Time: </strong><?php echo $row['req_time']; ?></p> 
    <p><strong>Return Date: </strong><?php echo $row['ret_date']; ?></p> 
    <p><strong>Return Time: </strong><?php echo $row['ret_time']; ?></p> 
    <p><strong>Destination: </strong><?php echo $row['destination']; ?></p> 
    <p><strong>PickUp Point: </strong><?php echo $row['pickup_point']; ?></p> 
    <p><strong>Email: </strong><?php echo $row['email']; ?></p> 
    <p><strong>Mobile: </strong><?php echo $row['mobile']; ?></p> 
                
    <form action="sendmail.php?id=<?php echo $id; ?>" method="post">
        <label><strong>Available Cars</strong></label>
        <select name="veh_reg">
            <?php while($row1 = mysqli_fetch_assoc($res1)) { ?> 
                <option><?php echo $row1['veh_reg']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label><strong>Available Drivers</strong></label>
        <select name="driverid">
            <?php while($row2 = mysqli_fetch_assoc($res2)) { ?> 
                <option><?php echo $row2['driverid']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <button type="submit" name="email">Confirm</button>
    </form>
</body>
</html>
