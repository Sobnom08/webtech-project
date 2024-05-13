<?php
require_once '../MODEL/model.php';
session_start();

$msg = "";

if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $accounttype = $_POST['account_type'];




  $insert_query = "INSERT INTO `signupss`(`first_name`, `last_name`, `email`, `username`, `password`, `account_type`)  VALUES ('$firstname','$lastname','$email','$username','$password','$accounttype')";
  echo $firstname;


  $res = mysqli_query($connection, $insert_query);

  if ($res == true) {
    $msg = "Success! Signup Completed!";
    header('Location: index.html');
    exit;


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
  header(" URL=../VIEW/END.html");
  exit;
  ?>
</body>

</html>