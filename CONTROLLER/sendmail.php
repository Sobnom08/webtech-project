<?php
    $connection = mysqli_connect("localhost", "root", "", "vehicle management");
    session_start();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM `booking` WHERE booking_id='$id'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);

    if (isset($_POST['email'])) {
        $email_to = $row['email'];
        $first_name = $row['name'];
        $email_from = "iafbd24@gmail.com";
        $telephone = $row['mobile'];
        $driver_id = $_POST['driverid'];
        $veh_reg = $_POST['veh_reg'];

        $sql2 = "SELECT * FROM `driver` WHERE driverid='$driver_id'";
        $res2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $driver_name = $row2['drname'];
        $driver_mobile = $row2['drmobile'];

        $email_message = " This is an email form RUET Vehicle Management to confirm your vehicle. Details are given below.\n\n";//(/n mean  Escape Sequence. Description)
        $email_message .= "first Name: " . $first_name . "\n";
        $email_message .= "Email: " . $email_from . "\n";
        $email_message .= "Phone: " . $telephone . "\n\n";
        $email_message .= "Driver's Name: " . $driver_name . "\n";
        $email_message .= "Vehicle Regitration: " . $veh_reg . "\n";
        $email_message .= "Driver's Phone Number: " . $driver_mobile . "\n";

        $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        $update_query = "UPDATE `booking` SET `confirmation`='1',`veh_reg`='$veh_reg',`driverid`='$driver_id' WHERE booking_id='$id'; UPDATE `vehicle` SET `veh_available`='1' WHERE veh_reg='$veh_reg';UPDATE `driver` SET `dr_available`='1' WHERE driverid='$driver_id'";
        
        $res3 = mysqli_multi_query($connection, $update_query);
    }
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>success</title>
 </head>
 <body>
    <?php include 'navbar_admin.php'; ?>
    <br><br><br><br><br>
    <strong>Success!</strong> Mail has been sent successfully.
    <br>
    <a href="bookinglist.php">Go Back</a>
 </body>
 </html>
