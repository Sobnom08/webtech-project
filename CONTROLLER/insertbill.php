<?php
   $conn=mysqli_connect('localhost','root','','vehicle management');
   $sql="SELECT * FROM bill ";
   $result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert</title>
</head>
<body>
    <br><br><br>
    <form action="storebill.php?busid=<?php echo $veh_id; ?>" method="POST">
        <label for="ServiceCharge">Service Charge :</label>
        <input required type="text" name="salary" placeholder="Service Charge"><br>
        
        <label for="Equipment">Equipment :</label>
        <input type="text" name="equipment" placeholder="Equipment"><br>

        <label for="Oil">Oil :</label>
        <input type="text" name="oil" placeholder="Oil"><br>

        <label for="TotalCost">Total cost :</label>
        <input type="text" name="tcost" placeholder="Total cost"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
