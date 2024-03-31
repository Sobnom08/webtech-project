<?php
   $conn=mysqli_connect('localhost','root','','vehicle management');
   $sql="SELECT * FROM bill ";
   $result=mysqli_query($conn,$sql);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Vehicle Management</title>
    <meta name="description">
</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br><br>
    <table id="myTable">
        <thead>
            <th>ID</th>
            <th>Total Cost</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['tcost']; ?></td>
                    <td>
                        <a href="showbill.php?id=<?php echo $row['id']; ?>">View</a>
                        <!--
                        <a href="editbill.php?id=<?php echo $row['id']; ?>">Edit</a>
                        -->
                        <a onclick="return confirm('Are you sure?')" href="deletebill.php?id=<?php echo $row['bill_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
