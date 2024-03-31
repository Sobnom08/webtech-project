<?php
    session_start();
?>


<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Welcome to Vehicle Management</title>   
</head>


<body style="margin:80px auto">
<?php include 'navbar.php';?>  

<h3 style="text-align:center;">Permanent Bus Schedule</h3>

<table>  
    <thead>  
        <tr>  
            <th>NO</th> 
            <th><PERIOD</th> 
            <th> FIRST </th>  
           <th>SECOND</th>  
            <th>THIRD</th>  
        </tr>  
    </thead>  
    <tbody>  
        <tr>  
            <td><br>01<br></td>   
            <td> <br>1st JANUARY to 31st JANUARY<br></td>  
            <td><br>3-45<br></td>  
            <td><br>4-45<br></td>  
            <td><br>6-15<br></td>  
        </tr> 
        <!-- More rows here -->
    </tbody>  
</table>

</body>  
</html>
