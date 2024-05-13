<?php
require_once '../MODEL/model.php';
session_start();

$msg = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    $req_date = $_POST['req_date'];
    $req_time = $_POST['req_time'];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $destination = $_POST['destination'];
    $pickup = $_POST['pickup'];
    $reason = $_POST['reason'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $username = $_POST['username'];

    $insert_query = "INSERT INTO `booking`(`booking_id`, `name`, `req_date`, `req_time`, `ret_date`, `ret_time`, `destination`, `pickup_point`, `reasons`, `email`, `mobile`, `confirmation`, `veh_reg`, `driverid`, `finished`) VALUES ('','$name','$req_date','$req_time','$return_date','$return_time','$destination','$pickup','$reason','$email','$mobile','','','','')";
    echo $name;


    $res = mysqli_query($connection, $insert_query);

    if ($res == true) {
        $msg = "Success! booking Completed!";
        header('Location: bill.php');

    } else {
        die('unsuccessful' . mysqli_error($connection));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php echo $msg; ?>

    <?php

    exit;
    ?>
</body>

</html>