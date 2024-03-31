<?php
 require_once '../MODEL/model.php'; 
session_start();
$msg = "";

if (isset ($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($connection, strtolower($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, strtolower($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, strtolower($_POST['email']));
    $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($connection, strtolower($_POST['password']));
    $account_type = mysqli_real_escape_string($connection, strtolower($_POST['account_type']));


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

    $signup_query = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `email`, `username`, `password`,account_type) VALUES ('', '$firstname', '$lastname', '$email', '$username', '$password','$account_type')";

    $check_query = "SELECT * FROM `user` WHERE username='$username' or email='$email'";
    $check_res = mysqli_query($connection, $check_query);

if ($account_type == "admin")

{
  $signup_query = "INSERT INTO `admin`(`admin_id`,  `username`, `password`) VALUES ('', '$username', '$password')";   
  $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connection, $query);
}
else{
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);
}

    if (mysqli_num_rows($check_res) > 0) {
        $msg = "Username or Email already exists.";
    } else {
        $signup_res = mysqli_query($connection, $signup_query);
        if ($signup_res) {
            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            $msg = "Registration Failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>

<body>
    <?php //header("Location:./CONTROLLER/navbar.php");
    include 'navbar.php'; ?>

    <br>
    <h1 style="text-align: center;">Sign Up</h1>

    <form action="" method="post" style="text-align: center;">
        <input id="firstname" type="text" name="firstname" placeholder="First Name"><br><br>
        <input id="lastname" type="text" name="lastname" placeholder="Last Name"><br><br>
        <input id="email" type="email" name="email" placeholder="Email"><br><br>
        <input id="username" type="text" name="username" placeholder="username"><br><br>
        <input id="password" type="password" name="password" placeholder="password"><br><br>
        <label for="account_type">Account_type:</label>
        <select id="account_type" name="account_type">
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>

        </select>

        <button type="submit" name="submit">Sign Up</button>
    </form>

    <?php echo $msg; ?>
</body>

</html>


