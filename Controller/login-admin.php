<?php
require_once '../MODEL/model.php';
session_start();

$msg = "";
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $account_type = "Admin"; // Since you're logging in as an admin, set the account type here
  #$account_type = mysqli_real_escape_string($connection, $_POST['account_type']);

  $login_query = "SELECT * FROM signupss WHERE username='$username' AND password='$password' AND account_type='$account_type'";

  $login_res = mysqli_query($connection, $login_query);

  if ($login_res && mysqli_num_rows($login_res) > 0) { // Check if query executed successfully
    $_SESSION['username'] = $username;
    header('Location: navbar_admin.php');
    exit; // Always exit after redirecting
  } else {
    $msg = '<div class="alert alert-danger alert-dismissable" style="margin-top:30px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Unsuccessful!</strong> Login Unsuccessful.
        </div>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    input[type="text"],
    input[type="password"],
    button[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }

    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }

    .close {
      float: right;
      font-size: 21px;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .2;
    }

    .close:hover {
      color: #000;
      text-decoration: none;
      opacity: .5;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    input[type="text"],
    input[type="password"],
    button[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }

    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }

    .close {
      float: right;
      font-size: 21px;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .2;
    }

    .close:hover {
      color: #000;
      text-decoration: none;
      opacity: .5;
    }
  </style>
</head>

<body>

  <div class="container">
    <?php echo $msg; ?>
    <h1 style="text-align: center;">Admin Login</h1>
    <form id="loginForm" method="post">
      <input id="username" type="text" name="username" placeholder="Username" required><br>
      <input id="password" type="password" name="password" placeholder="Password" required><br>
      <button type="submit" name="submit">Log in</button>
    </form>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", function (event) {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if (username === "" || password === "") {
        event.preventDefault();
        alert("Please fill in all fields.");
      }
    });
  </script>
</body>

</html>