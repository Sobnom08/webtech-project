<?php
    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');

    $select_query = "SELECT * FROM `trip_detailsCus`";
    $result = mysqli_query($connection, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trip Cost Details</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <br><br>
    <h1 style="text-align: center;">Trip Cost Details</h1>
                
    <table align="center" border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Car Cost per Hour</th>
                <th>Bus Cost per Hour</th>
                <th>Oil Cost</th>
                <th>Driver Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['car_cost']; ?></td>
                    <td><?php echo $row['bus_cost']; ?></td>
                    <td><?php echo $row['oil_cost']; ?></td>
                    <td><?php echo $row['driver_cost']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
