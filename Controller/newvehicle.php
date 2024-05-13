<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once '../MODEL/model.php';

$msg = "";

if (isset($_POST['submit'])) {
  $regno = $_POST['vehregno'];
  $type = $_POST['type'];
  $chesisno = $_POST['vehchesis'];
  $brand = $_POST['vehbrand'];
  $color = $_POST['vehcolor'];
  $regdate = $_POST['vehregdate'];
  $description = $_POST['vehdescription'];
  $photo = $_FILES['file']['name'];

  $res = false;
  $insert_query = "INSERT INTO `vehicle`(`veh_id`, `veh_reg`, `veh_type`, `chesisno`, `brand`, `veh_color`, `veh_regdate`, `veh_description`, `veh_photo`) VALUES ('','$regno','$type','$chesisno','$brand','$color','$regdate','$description','$photo')";

  $res = mysqli_query($connection, $insert_query);

  if ($res == true) {
    $msg = "<script language='javascript'>
              alert('Registration Completed!');
            </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>New Vehicle</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <script>
    /
    function setupDatepicker() {
      var datePickerInput = document.getElementById('vehregdate');
      datePickerInput.type = "date";
    }
  </script>
</head>

<body onload="setupDatepicker()">
  <?php include 'navbar_admin.php'; ?>

  < <div class="container">
    <div class="row">
      <div class="page-header">
        <h1 style="text-align: center;">New Vehicle Form</h1>
        <?php echo $msg; ?>
      </div>
      <div class="col-md-6">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div>
            <label>Registration Number:</label>
            <input type="text" name="vehregno" placeholder="Registration Number">
          </div>
          <div>
            <label>Type:</label>
            <input type="radio" name="type" value="bus">Bus
            <input type="radio" name="type" value="car">Car
          </div>
          <div>
            <label>Chesis No:</label>
            <input type="text" name="vehchesis" placeholder="Chesis No">
          </div>
          <div>
            <label>Brand:</label>
            <input type="text" name="vehbrand" placeholder="Brand">
          </div>
          <div>
            <label>Color:</label>
            <input type="text" name="vehcolor" placeholder="Color">
          </div>
          <div>
            <label>Registration Date:</label>
            <input id="vehregdate" type="text" name="vehregdate" placeholder="Registration Date">
          </div>
          <div>
            <label>Description:</label>
            <textarea rows="5" name="vehdescription" placeholder="Description"></textarea>
          </div>
          <div>
            <label>Photo:</label>
            <input type="file" name="file">
          </div>
          <div>
            <input type="submit" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
    </div>
</body>

</html>