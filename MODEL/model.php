<?php
	require_once '../MODEL/db_connect.php';
    $connection=mysqli_connect("localhost","root","","vehicle management");
	function user ($firstname, $lastname, $email, $username, $password, $account_type) {
		$connection = db_connect();
		// Prepare SQL statement with placeholders
		$sql = "INSERT INTO user (firstname, lastname, email, username, password, account_type) VALUES (?, ?, ?, ?, ?, ?)";
		// Create a prepared statement
		$stmt = $connection->prepare($sql);
		// Bind parameters
		$stmt->bind_param( $firstname, $lastname, $email, $username, $password, $account_type);
		// Execute the statement
		$success = $stmt->execute();
		// Check if the statement was executed successfully
		if ($success) {
			return true;
		} else {
			echo "Error Storing in database";
			return false;
		}
	}
	function booking ($name, $username, $type, $req_date, $req_time, $return_date, $return_time, $destination, $pickup, $reason, $email, $mobile) {
		$connection = db_connect();
		// Prepare SQL statement with placeholders
		$sql = "INSERT INTO booking (booking_id, name, username, type, req_date, req_time, ret_date, ret_time, destination, pickup_point, resons, email, mobile, confirmation, veh_reg, driverid, finished) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		// Create a prepared statement
		$stmt = $connection->prepare($sql);
		// Bind parameters
		$stmt->bind_param($name, $username, $type, $req_date, $req_time, $return_date, $return_time, $destination, $pickup, $reason, $email, $mobile );
		// Execute the statement
		$success = $stmt->execute();
		// Check if the statement was executed successfully
		if ($success) {
			return true;
			$msg = "Success! Registration Completed!";
		} else {
			echo "Error Storing in database";
			return false;
		}
	}
	