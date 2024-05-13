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
          <h2>Add New Drivers</h2>
          <form method="post" action="driverprofileaction.php" onsubmit="return validateForm()">
            <label for="drname">Driver Name:</label><br>
            <input type="text" id="drname" name="drname" required><br>

            <label for="drjoin">Joined Date:</label><br>
            <input type="date" id="drjoin" name="drjoin" required><br>

            <label for="drmobile">Mobile:</label><br>
            <input type="text" id="drmobile" name="drmobile" required><br>

            <label for="drnid">NID:</label><br>
            <input type="text" id="drnid" name="drnid" required><br>

            <label for="drlicense">Driver License:</label><br>
            <input type="text" id="drlicense" name="drlicense" required><br>

            <label for="drlicensevalid">License Valid till:</label><br>
            <input type="date" id="drlicensevalid" name="drlicensevalid" required><br>

            <label for="draddress">Address:</label><br>
            <input type="text" id="draddress" name="draddress" required><br>

            <label for="drphoto">Driver Photo:</label><br>
            <input type="file" id="drphoto" name="drphoto" accept="image/*" required><br>

            <label for="dr_available">Availability:</label><br>
            <select id="dr_available" name="dr_available" required>
              <option value="1">Available</option>
              <option value="0">Not Available</option>

            </select><br>
            <input type="submit" name="submit" value="Submit">
        </div>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      var vehReg = document.getElementById("dr_name").value;
      var brand = document.getElementById("drjoin").value;
      var vehColor = document.getElementById("drmobile").value;
      var regDate = document.getElementById("drnid").value;
      var description = document.getElementById("drlicense").value;

      var photo = document.getElementById("drlicensevalid").value;
      var chassisNo = document.getElementById("draddress").value;
      var chassisNo = document.getElementById("drphoto").value;
      var chassisNo = document.getElementById("dr_available").value;


      if (vehReg == "" || brand == "" || vehColor == "" || regDate == "" || description == "" || photo == "" || chassisNo == "") {
        alert("All fields must be filled out");
        return false;
      }



      return true;
    }
  </script>
</body>

</html>