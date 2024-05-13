<?php
require_once '../MODEL/model.php';
session_start();

$id = $_GET['id'];
$msg = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $total_km = $_POST['total_km'];
    $oil_cost = $_POST['oil_cost'];
    $extra_cost = $_POST['extra_cost'];
    $total_cost = $_POST['total_cost'];

    $sql = "INSERT INTO `tripcost`( `total_km`, `oil_cost`, `extra_cost`, `total_cost`) VALUES ('$total_km','$oil_cost','$extra_cost','$total_cost')";
    $result = mysqli_query($connection, $sql);

    if ($result == true) {
        $msg = "successfully done ";
        header('Location: End.html');
        exit;
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