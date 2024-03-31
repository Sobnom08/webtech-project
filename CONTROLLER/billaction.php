<?php
    $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');
    session_start();

    $id = $_GET['id'];
    $msg = "";

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $total_km = $_POST['total_km'];
        $oil_cost = $_POST['oil_cost'];
        $extra_cost = $_POST['extra_cost'];
        $total_cost = $_POST['total_cost'];
        
        $sql = "INSERT INTO `tripcost`(`booking_id`,`username`, `total_km`, `oil_cost`, `extra_cost`, `total_cost`) VALUES ('$id','$username','$total_km','$oil_cost','$extra_cost','$total_cost')";
        $result = mysqli_query($connection, $sql);

        if($result == true) {
            $msg = "successfully done ";
        } else {
            die('unsuccessful' . mysqli_error($connection));
        }
    }
?>

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php echo $msg; ?>
</body>
</html>

