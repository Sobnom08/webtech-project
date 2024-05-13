<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Navigation</title>
    <style>
        /* CSS styles for navigation */
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            float: left;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>

<body>
    <nav>
        <button type="button"></button>
        <ul>
            <li><a href="newdriver.php">Add New Driver</a></li>
            <li><a href="newvehicle.php">Add New Vehicle</a></li>
            <li><a href="indexbill.php">Billing</a></li>
            <li><a href="bookinghistory.php">Booking History</a></li>
            <li><a href="Trip_details.php">Trip Cost Details</a></li>
        </ul>
        <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="index.html">Visit Site</a></li>
        </ul>
    </nav>

    <script>
        // JavaScript for button functionality
        document.querySelector('button').addEventListener('click', function () {
            document.querySelector('nav ul').classList.toggle('show');
        });
    </script>
</body>

</html>