<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        input[type="submit"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <h1>Booking</h1>
    <form id="bookingForm" action="../CONTROLLER/bookingaction.php" method="post" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" required>
        <div>
            <label>Type:</label>
            <input type="radio" name="type" value="bus">Bus
            <input type="radio" name="type" value="car">Car
        </div>

        <label for="req_date">Date Needed:</label>
        <input id="req_date" type="date" name="req_date" required>

        <label for="req_time">Time Needed:</label>
        <input type="time" name="req_time" id="req_time" required>

        <label for="return_date">Return Date:</label>
        <input id="return_date" type="date" name="return_date">

        <label for="return_time">Return Time:</label>
        <input type="time" name="return_time" id="return_time" required>

        <label for="destination">Destination:</label>
        <input id="destination" type="text" name="destination" placeholder="Car Destination" required>

        <label for="pickup">Pickup:</label>
        <input id="pickup" type="text" name="pickup" placeholder="Pickup" required>

        <label for="reason">Reason for Booking:</label>
        <input id="reason" type="text" name="reason" placeholder="Reason for booking the vehicle" required>

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required>

        <label for="mobile">Mobile No:</label>
        <input id="mobile" type="text" name="mobile" placeholder="Mobile No" required>

        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="submit" name="submit">
    </form>

    <script>
        function validateForm() {
            var reqDate = new Date(document.getElementById("req_date").value);
            var reqTime = document.getElementById("req_time").valueAsDate;
            var returnDate = new Date(document.getElementById("return_date").value);
            var returnTime = document.getElementById("return_time").valueAsDate;

            // Compare return date and time with request date and time
            if (returnDate < reqDate || (returnDate.getTime() === reqDate.getTime() && returnTime <= reqTime)) {
                alert("Return date and time must be after the date and time of booking");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>