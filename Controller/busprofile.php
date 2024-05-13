<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vehicle Management System</title>
  <style>
    /* CSS styles for form */
    form {
      width: 50%;
      margin: 0 auto;
    }

    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error {
      color: red;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="container" style="margin-top: 20px; margin-bottom: 20px;">

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2>Add New Vehicle</h2>
          <form method="post" action="busprofileaction.php" onsubmit="return validateForm()">
            <label for="veh_reg">Vehicle Registration Number:</label><br>
            <input type="text" id="veh_reg" name="veh_reg" required><br>

            <!-- Add other input fields for vehicle information here -->
            <label for="brand">Brand:</label><br>
            <input type="text" id="brand" name="brand" required><br>

            <label for="veh_color">Color:</label><br>
            <input type="text" id="veh_color" name="veh_color" required><br>

            <label for="veh_regdate">Registration Date:</label><br>
            <input type="date" id="veh_regdate" name="veh_regdate" required><br>

            <label for="veh_description">Description:</label><br>
            <textarea id="veh_description" name="veh_description" rows="4" cols="50" required></textarea><br>

            <label for="veh_photo">Vehicle Photo:</label><br>
            <input type="file" id="veh_photo" name="veh_photo" accept="image/*" required><br>

            <label for="chesisno">Chassis Number:</label><br>
            <input type="text" id="chesisno" name="chesisno" required><br>

            <input type="submit" name="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var vehReg = document.getElementById("veh_reg").value;
      var brand = document.getElementById("brand").value;
      var vehColor = document.getElementById("veh_color").value;
      var regDate = document.getElementById("veh_regdate").value;
      var description = document.getElementById("veh_description").value;
      var photo = document.getElementById("veh_photo").value;
      var chassisNo = document.getElementById("chesisno").value;

      if (vehReg == "" || brand == "" || vehColor == "" || regDate == "" || description == "" || photo == "" || chassisNo == "") {
        alert("All fields must be filled out");
        return false;
      }



      return true;
    }
  </script>
</body>

</html>