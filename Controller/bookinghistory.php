<?php
require_once '../MODEL/model.php';
session_start();

// Check if vehicle ID is provided in the URL
if (isset($_GET['busid'])) {
  $booking_id = $_GET['booking_id'];

  // Query to fetch vehicle data based on vehicle ID
  $sql = "SELECT * FROM `booking` WHERE booking_id='$booking_id'";
  $res = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($res);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Booking Information</title>




  <meta charset="UTF-8">
  <title>List of Booking</title>
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
            <h1 class="animated bounceIn" style="text-align: center;">Booking History</h1>
          </div>
          <table class="table">
            <thead>
              <th>Customer Name</th>
              <th>Request date</th>
              <th>Request Time</th>

            </thead>
            <?php
            // Query to fetch vehicle data
            $sql = "SELECT * FROM `booking`";
            $res = mysqli_query($connection, $sql);

            // Check if there are any vehicles in the database
            if (mysqli_num_rows($res) > 0) {
              while ($row = mysqli_fetch_assoc($res)) { ?>
                <tbody>
                  <tr>
                    <!-- Displaying vehicle registration numbers -->
                    <td><?php echo $row["name"]; ?>
                    </td>
                    <td><?php echo $row["req_date"]; ?></td>
                    <td><?php echo $row["req_time"]; ?></td>
                  </tr>
                </tbody>
              <?php }
            } else { ?>
              <tbody>
                <tr>
                  <td colspan="2">No booking found.</td>
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