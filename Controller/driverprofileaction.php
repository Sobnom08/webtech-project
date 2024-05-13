<?php
require_once '../MODEL/model.php';
session_start();

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $drname = $_POST['drname'];
  $drjoin = $_POST['drjoin'];
  $drmobile = $_POST['drmobile'];
  $drnid = $_POST['drnid'];
  $drlicense = $_POST['drlicense'];
  $drlicensevalid = $_POST['drlicensevalid'];
  $draddress = $_POST['draddress'];


  $dr_available = $_POST['dr_available'];

  // Perform SQL insertion query
  $sql = "INSERT INTO `driver` (drname, drjoin, drmobile, drnid, drlicense, drlicensevalid, draddress, drphoto, dr_available) 
            VALUES ('$drname', '$drjoin', '$drmobile', '$drnid', '$drlicense', '$drlicensevalid', '$draddress', '$drphoto', '$dr_available')";

  if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
    // Redirect to a specific page after insertion
    header('Location: driverlist.php');
    exit;
  } else {
    // Insertion failed, handle the error accordingly
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}

// Close the connection
mysqli_close($connection);
?>