<?php
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'vehicle management');
    $sql = "SELECT * FROM bill WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $bill = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Welcome</title>
</head>
<body>
    <br><br><br>
    <?php include 'navbar_admin.php'; ?>
    <table>
        <tr>
            <td><a href="indexbill.php">Bill List</a></td>
        </tr>
        <tr>
            <td>
                <h2>Billing Information</h2>
                <hr>
                <table>
                    <tr>
                        <th>Service Charge:</th>
                        <td><?php echo $bill['salary']; ?></td>
                    </tr>
                    <tr>
                        <th>Equipment:</th>
                        <td><?php echo $bill['equipment']; ?></td>
                    </tr>
                    <tr>
                        <th>Oil:</th>
                        <td><?php echo $bill['oil']; ?></td>
                    </tr>
                    <tr>
                        <th>Total Cost:</th>
                        <td><?php echo $bill['tcost']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
