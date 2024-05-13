<?php
require_once '../MODEL/model.php';
session_start();

// Check if vehicle ID is provided in the URL
if (isset($_GET['driverid'])) {
    $driver_id = $_GET['driverid'];
    $driveraddress = $_GET['$draddress'];


    // Query to fetch vehicle data based on vehicle ID
    $sql = "SELECT * FROM `driver` WHERE driverid='$driver_id'";
    $res = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($res);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Profile</title>




    <meta charset="UTF-8">
    <title>List of driverss</title>
    <style>
        /* Basic CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>


    <br><br><br>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 foo">
                    <div class="page-header">
                        <h1 class="animated bounceIn" style="text-align: center;">driver List</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <th>driver Picture</th>
                            <th>driver address></th>
                        </thead>
                        <?php
                        // Query to fetch vehicle data
                        $sql = "SELECT * FROM `driver`";
                        $res = mysqli_query($connection, $sql);

                        // Check if there are any vehicles in the database
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) { ?>
                                <tbody>
                                    <tr>
                                        <!-- Displaying vehicle registration numbers -->
                                        <td><a href="driver_pictures.html?busid=<?php echo $row["driverid"]; ?>">View
                                                Profile</a>
                                        </td>
                                        <td><?php echo $row["draddress"]; ?></td>
                                    </tr>
                                </tbody>
                            <?php }
                        } else { ?>
                            <tbody>
                                <tr>
                                    <td colspan="2">No driver found.</td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>