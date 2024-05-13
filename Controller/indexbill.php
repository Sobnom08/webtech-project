<?php
require_once '../MODEL/model.php';
$sql = "SELECT * FROM bill";
$result = mysqli_query($connection, $sql);
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Welcome to Vehicle Management</title>
  <meta name="description" content="Basic CSS and JavaScript.">
  <style>
    /* Add your basic CSS styles here */
    table {
      border-collapse: collapse;
      width: 100%;
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

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
  </style>
</head>

<body>
  <?php include 'navbar_admin.php'; ?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="page header">
        <h3 style="text-align: center;">Billing List</h3>
      </div>
      <table id="myTable">
        <thead>
          <th>ID</th>
          <th>Total Cost</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td> <?php echo $row['id'] ?> </td>
              <td> <?php echo $row['tcost'] ?> </td>
              <td>
                <a href="showbill.php?id=<?php echo $row['id']; ?>">View</a>
                <!--
                  <a href="editbill.php?id=<?php echo $row['id']; ?>">Edit</a>
                -->
                <a onclick="return confirm('Are u sure?')"
                  href="deletebill.php?id=<?php echo $row['bill_id']; ?>">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Add your basic JavaScript here
    document.addEventListener("DOMContentLoaded", function () {
      var table = document.getElementById("myTable");
      if (table) {
        table.classList.add("table", "table-bordered");
      }
    });
  </script>
</body>

</html>