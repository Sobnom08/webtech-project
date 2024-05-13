<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once '../MODEL/model.php';

$msg = ""; // Initialize message variable

if (isset($_POST['submit'])) {
  $drname = $_POST['drname'];
  $drjoin = $_POST['drjoin'];
  $drmobile = $_POST['drmobile'];
  $drnid = $_POST['drnid'];
  $drlicense = $_POST['drlicense'];
  $drlicensevalid = $_POST['drlicensevalid'];
  $draddress = $_POST['draddress'];
  //$drphoto=$_FILES['file']['name'];
  $drphoto = $_FILES['file']['name'];

  $res = false;
  $insert_query = "INSERT INTO `driver`(`driverid`, `drname`, `drjoin`, `drmobile`, `drnid`, `drlicense`, `drlicensevalid`, `draddress`, `drphoto`) VALUES ('','$drname','$drjoin','$drmobile','$drnid','$drlicense','$drlicensevalid','$draddress','$drphoto')";

  $res = mysqli_query($connection, $insert_query);

  if ($res == true) {
    $msg = "<script language='javascript'>
                   alert('Success! Registration Completed!');
                </script>";
  } else {
    die('unsuccessful' . mysqli_error($connection));
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>New Driver</title>
  <script>
    function validateForm() {
      var drname = document.getElementById('drname').value;
      var drjoin = document.getElementById('drjoin').value;
      var drmobile = document.getElementById('drmobile').value;
      var drnid = document.getElementById('drnid').value;
      var drlicense = document.getElementById('drlicense').value;
      var drlicensevalid = document.getElementById('drlicensevalid').value;
      var draddress = document.getElementById('draddress').value;
      var file = document.getElementById('file').value;

      if (drname == "" || drjoin == "" || drmobile == "" || drnid == "" || drlicense == "" || drlicensevalid == "" || draddress == "" || file == "") {
        alert("All fields are required");
        return false;
      }
      return true;
    }
  </script>
</head>

<body>
  <?php include 'navbar_admin.php'; ?>
  <br>

  <div class="container">
    <div class="row">
      <div class="page-header">
        <h1 style="text-align: center;">New Driver Form</h1>
        <?php echo $msg; ?>
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-6 animated bounceIn">
        <br>
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"
          onsubmit="return validateForm();">
          <div class="input-group">
            <span class="input-group-addon"><b>Driver Name</b></span>
            <input id="drname" type="text" class="form-control" name="drname" placeholder="Name">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>Mobile</b></span>
            <input id="drmobile" type="text" class="form-control" name="drmobile" placeholder="Mobile No">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>Driver Joining Date</b></span>
            <input id="drjoin" type="text" class="form-control" name="drjoin" placeholder="Joining date">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>National ID</b></span>
            <input id="drnid" type="text" class="form-control" name="drnid" placeholder="Nid No">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>License No</b></span>
            <input id="drlicense" type="text" class="form-control" name="drlicense" placeholder="License No">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>License End Date</b></span>
            <input id="drlicensevalid" type="text" class="form-control" name="drlicensevalid"
              placeholder="Validity date">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>Driver Address</b></span>
            <textarea id="draddress" type="text" class="form-control" name="draddress" placeholder="Address"></textarea>
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><b>Photo</b></span>
            <input type="file" class="form-control" name="file" id="file">
          </div>
          <div class="input-group">
            <input type="submit" name="submit" class="btn btn-success">
          </div>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</body>

</html>