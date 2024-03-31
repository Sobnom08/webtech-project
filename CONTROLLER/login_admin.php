<?php 
    session_start();
     require_once '../MODEL/model.php'; 
    
    $msg="";
    if(isset($_POST['submit'])){
        $username=mysqli_real_escape_string($connection,strtolower($_POST['username']));
        $password=mysqli_real_escape_string($connection,$_POST['password']); 
        
        $login_query="SELECT * FROM `admin` WHERE username='$username' and password='$password'";
        
        $login_res=mysqli_query($connection,$login_query);
        
        if(mysqli_num_rows($login_res)>0){ 
            $_SESSION['username']=$username;
            header('Location:admin.php');
            exit; // Make sure to exit after redirecting
        } 
        else{
            $msg= '<p style="margin-top:30px; color:red;">
                    <strong>Unsuccessful!</strong> Login Unsuccessful.
                   </p>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title> 
</head>
<body> 
    <?php include 'navbar.php'; ?>
   
    <br>
   
    <?php echo $msg; ?>
            
    <h1 style="text-align: center;">Admin Login</h1>      
          
    <form action="" method="post" style="text-align: center;"> 
        <input id="username" type="text" name="username" placeholder="Username"><br><br>
        <input id="password" type="password" name="password" placeholder="Password"><br><br> 
        <button type="submit" name="submit">Log in</button>
    </form>  
</body>
</html>

