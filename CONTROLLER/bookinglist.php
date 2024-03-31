<?php
    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');

    $select_query = "SELECT * FROM `booking` ORDER BY booking_id DESC";
    $result = mysqli_query($connection, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking list</title>
   
</head>
<body>
    <?php include 'navbar_admin.php'; ?>
    <br><br>
    <table id="myTable" class="table table-bordered animated bounce">
        <thead>
            <th>Booking Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Delete</th>
            <th>Release</th>
            <th>Confirm Trip</th>
            <th>Checked</th>
            <th>Finished</th>
            <th>Bill</th>
            <th>Confirm Payment</th>
            <th>Paid</th>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><a class="btn btn-danger" href="deletebooking.php?id=<?php echo $row['booking_id']; ?>">Delete</a></td>
                    <?php if($row['confirmation'] == 0 or $row['finished'] == 1) { ?>
                        <td><a class="btn btn-default disabled" href="releasebooking.php?id=<?php echo $row['booking_id']; ?>">Release Vehicle</a></td>
                    <?php } else { ?>
                        <td><a class="btn btn-default" href="releasebooking.php?id=<?php echo $row['booking_id']; ?>">Release Vehicle</a></td>
                    <?php } ?>
                    <?php if($row['confirmation'] == '0') { ?>
                        <td><a class="btn btn-success" href="confirmbooking.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                    <?php } else { ?>
                        <td><a class="btn btn-success disabled" href="confirmbooking.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                    <?php } ?>
                    <?php if($row['confirmation'] == '0') { ?>
                        <td>No</td>
                    <?php } else { ?>
                        <td>Yes</td>
                    <?php } ?>
                    <?php if($row['finished'] == '0') { ?>
                        <td>No</td>
                    <?php } else { ?>
                        <td>Yes</td>
                    <?php } ?>
                    <?php if($row['finished'] == '1' and $row['paid'] == 0) { ?>
                        <td><a class="btn btn-primary" href="bill.php?id=<?php echo $row['booking_id']; ?>">Bill</a></td>
                    <?php } else if($row['paid'] == 1) { ?>
                        <td><a class="btn btn-primary disabled" href="bill.php?id=<?php echo $row['booking_id']; ?>">Bill</a></td>
                    <?php } ?>
                    <td><a href="confirmpayment.php?id=<?php echo $row['booking_id']; ?>">Confirm</a></td>
                    <?php if($row['paid'] == '0') { ?>
                        <td>No</td>
                    <?php } else { ?>
                        <td>Yes</td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
