<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Trip Cost</h1>
        <?php ?>
        <form id="billForm" action="billaction.php?id=<?php #echo $id; ?>" method="post"
            onsubmit="return validateForm()">
            <label for="km"><b>Total Km</b></label>
            <input id="km" type="text" name="total_km" placeholder="Total Km" oninput="calculateTotal()">
            <label for="oil"><b>Oil Cost</b></label>
            <input id="oil" type="text" name="oil_cost" placeholder="Total Oil" oninput="calculateTotal()">
            <label for="extra"><b>Extra Cost</b></label>
            <input id="extra" type="text" name="extra_cost" placeholder="Extra Cost" oninput="calculateTotal()">
            <label for="total"><b>Total Cost</b></label>
            <input id="total" type="text" name="total_cost" placeholder="Total Cost" readonly>
            <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <script>
        function calculateTotal() {
            var km = parseFloat(document.getElementById("km").value) || 0;
            var oil = parseFloat(document.getElementById("oil").value) || 0;
            var extra = parseFloat(document.getElementById("extra").value) || 0;
            var totalCost = oil + extra;
            document.getElementById("total").value = totalCost.toFixed(2);
        }

        function validateForm() {
            var km = document.getElementById("km").value;
            var oil = document.getElementById("oil").value;
            var extra = document.getElementById("extra").value;
            var total = document.getElementById("total").value;

            // Validation logic
            if (km === "" || oil === "" || extra === "" || total === "") {
                alert("All fields must be filled out");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>