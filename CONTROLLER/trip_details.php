<?php
    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');

    $select_query = "SELECT * FROM `tripcost`";
    $result = mysqli_query($connection, $select_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trip Details</title>
</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br><br>
    <h1 style="text-align: center;">Trip Details</h1>
                
    <table align="center" cellpadding="10" border="1">
        <thead>
            <tr>
                <th>Booking Id</th>
                <th>Total Km</th>
                <th>Oil Cost</th>
                <th>Extra Cost</th>
                <th>Total Cost Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['total_km']; ?></td>
                    <td><?php echo $row['oil_cost']; ?></td>
                    <td><?php echo $row['extra_cost']; ?></td>
                    <td><?php echo $row['total_cost']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
