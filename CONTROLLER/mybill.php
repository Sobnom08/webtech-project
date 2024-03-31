<?php 
  require_once '../MODEL/model.php';
    if(!isset($_SESSION)) {   
        session_start(); 
    } 
    
    $username = $_GET['id'];
   // $connection = mysqli_connect('localhost', 'root', '', 'vehicle management');

    $query = "SELECT booking.booking_id, booking.req_date, booking.ret_date, booking.destination, booking.veh_reg, booking.driverid, tripcost.total_km, tripcost.oil_cost, tripcost.extra_cost, tripcost.total_cost, tripcost.paid FROM booking LEFT JOIN tripcost ON booking.username = tripcost.username WHERE booking.username = '$username' AND booking.booking_id = tripcost.booking_id;";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1>My Bill</h1>
    <table>
        <thead>
            <tr>
                <th>Booking Id</th>
                <th>Requested Date</th>
                <th>Return Date</th>
                <th>Destination</th>
                <th>Vehicle Registration</th>
                <th>Driver</th>
                <th>Total Km</th>
                <th>Oil Cost</th>
                <th>Extra Cost</th>
                <th>Total Cost</th>
                <th>Paid</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['booking_id']; ?></td>
                    <td><?php echo $row['req_date']; ?></td>
                    <td><?php echo $row['ret_date']; ?></td>
                    <td><?php echo $row['destination']; ?></td>
                    <td><a href="busprofile.php?busid=<?php echo $row['veh_reg']; ?>"><?php echo $row['veh_reg']; ?></a></td>
                    <td><a href="driverprofile.php?driverid=<?php echo $row['driverid']; ?>"><?php echo $row['driverid']; ?></a></td>
                    <td><?php echo $row['total_km']; ?></td>
                    <td><?php echo $row['oil_cost']; ?></td>
                    <td><?php echo $row['extra_cost']; ?></td>
                    <td><?php echo $row['total_cost']; ?></td>
                    <td><?php echo $row['paid'] == '0' ? 'No' : 'Yes'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

    
            

