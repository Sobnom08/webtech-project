<?php
require_once '../MODEL/model.php';
session_start();

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $veh_reg = $_POST['veh_reg'];
  $brand = $_POST['brand'];
  $veh_color = $_POST['veh_color'];
  $veh_regdate = $_POST['veh_regdate'];
  $veh_description = $_POST['veh_description'];
  $veh_photo = $_POST['veh_photo'];
  $chesisno = $_POST['chesisno'];

  // Perform SQL insertion query
  $sql = "INSERT INTO `vehicle` (veh_reg, brand, veh_color, veh_regdate, veh_description, veh_photo, chesisno) 
            VALUES ('$veh_reg', '$brand', '$veh_color', '$veh_regdate', '$veh_description', '$veh_photo', '$chesisno')";

  if (mysqli_query($connection, $sql)) {

    echo "New record created successfully";
    header('buslist.php');

  } else {
    // Insertion failed, handle the error accordingly
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}

// Close the connection
mysqli_close($connection);
?>