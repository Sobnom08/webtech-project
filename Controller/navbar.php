<?php
require_once '../MODEL/model.php';
include_once 'navbar.php'; // Use relative path if navbar.php is in the same directory

if (isset($_SESSION['username']) == false) {
    ?>
    <nav style="background-color: #333; padding: 20px;">
        <button type="button" data-toggle="collapse" data-target="#myNavbar"></button>
        <ul style="list-style-type: none; margin: 0; padding: 0;">
            <li style="display: inline;"><a href="index.html" style="color: white; text-decoration: none;">Home</a></li><br>
            <li style="display: inline;"><a href="buslist.php" style="color: white; text-decoration: none;">Vehicle</a></li>
            <br>
            <li style="display: inline;"><a href="driverlist.php" style="color: white; text-decoration: none;">Driver</a>
            </li><br>
            <li style="display: inline;"><a href="trip_details.html" style="color: white; text-decoration: none;">Trip
                    Information</a></li><br>
            <li style="display: inline;"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></li>
            <br>

        </ul>
    </nav>
<?php } else { ?>
    <nav style="background-color: #333; padding: 26px;">
        <button type="button" data-toggle="collapse" data-target="#myNavbar"></button>
        <ul style="list-style-type: none; margin: 0; padding: 0;">
            <li style="display: inline;"><a href="buslist.php" style="color: white; text-decoration: none;">Vehicle</a></li>
            <br>
            <li style="display: inline;"><a href="driverlist.php" style="color: white; text-decoration: none;">Driver</a>
            </li>
            <li style="display: inline;"><a href="booking.php" style="color: white; text-decoration: none;">Booking</a></li>
            <li style="display: inline;"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></li>
            <li style="display: inline;"><a href="trip_details.html" style="color: white; text-decoration: none;">Trip
                    Information</a></li>
            <li style="display: inline;"><a href="bill.php?id=<?php echo $_SESSION['username']; ?>"
                    style="color: white; text-decoration: none;">My Account</a></li>
            <li style="display: inline;"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></li>
            <li style="display: inline;"><a href="#" style="color: white; text-decoration: none;">Welcome
                    <?php echo $_SESSION['username']; ?></a></li>
        </ul>
    </nav>
<?php } ?>