<?php 
    //Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once '../MODEL/model.php';
    //$connection=mysqli_connect("localhost","root","","vehicle management");



    session_start();
    $msg = "";

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($connection, strtolower($_POST['username']));
        $password = mysqli_real_escape_string($connection, $_POST['password']); 
        
       // Debug: Print SQL query
        $login_query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        echo "Debug: SQL Query: " . $login_query . "<br>";
        
        $login_res = mysqli_query($connection, $login_query);
    
        if($login_res) {
            if(mysqli_num_rows($login_res) > 0){ 
                $_SESSION['username'] = $username;
                header('Location:index.php');
                exit;
            } 
            else {
                 $msg = 'Login unsuccessful. Please check your credentials and try again.';
            }
        } 
        else {
           //  Display MySQL error message
            $msg = 'MySQL Error: ' . mysqli_error($connection);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title> 
</head>
<body> 
    <?php include 'navbar.php'; ?>
   
    <br>
   
    <?php echo $msg; ?>
            
    <h1 style="text-align: center;">Login</h1>      
          
    <form action="" method="post"> 
        <input id="username" type="text" name="username" placeholder="username"><br>
        <input id="password" type="password" name="password" placeholder="Password"><br> 
        <button type="submit" name="submit">Log in</button>
    </form>  
    <br> 
    <a href="login_admin.php">Admin Login</a>
</body>
</html>
