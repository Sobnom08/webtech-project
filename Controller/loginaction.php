<?php
require_once '../MODEL/model.php';
session_start();

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query to check if the user exists and the password matches
  $sql = "SELECT * FROM `signups` WHERE username='$username'";
  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Verify if the password matches
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
}

// Close the connection
mysqli_close($connection);
?>