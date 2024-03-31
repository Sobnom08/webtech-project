<?php
    if(!isset($_SESSION)) 
    {   
        
        session_start(); 
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    

</head>
<body>
   <?php include 'navbar_admin.php'?>
   <br><br>
   
               <h1 style="text-align: center">Admin Panel</h1>
               <p>You can control your website from here.</p>

        
</body>
</html>