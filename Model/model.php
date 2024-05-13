<?php
require_once '../MODEL/db_connect.php';
$connection = mysqli_connect("localhost", "root", "", "vehicle management system");
function signup($firstname, $lastname, $email, $username, $password, $account_type)
{
	$connection = db_connect();

	$sql = "INSERT INTO user (firstname, lastname, email, username, password, account_type) VALUES (?, ?, ?, ?, ?, ?)";

	$stmt = $connection->prepare($sql);
	// Bind parameters
	$stmt->bind_param($firstname, $lastname, $email, $username, $password, $account_type);

	$success = $stmt->execute();

	if ($success) {
		return true;
	} else {
		echo "Error Storing in database";
		return false;
	}
}

function tripcost($id, $username, $total_km, $oil_cost, $extra_cost, $total_cost)
{
	$connection = db_connect();

	$sql = "INSERT INTO user (booking_id, username, total_km, oil_cost, extra_cost, total_cost) VALUES (?, ?, ?, ?, ?, ?)";

	$stmt = $connection->prepare($sql);
	// Bind parameters
	$stmt->bind_param($id, $username, $total_km, $oil_cost, $extra_cost, $total_cost);

	$success = $stmt->execute();

	if ($success) {
		return true;
	} else {
		echo "Error Storing in database";
		return false;
	}
}

function booking($name, $username, $type, $req_date, $req_time, $return_date, $return_time, $destination, $pickup, $reason, $email, $mobile)
{
	$connection = db_connect();


	$sql = "INSERT INTO booking (booking_id, name, username, type, req_date, req_time, ret_date, ret_time, destination, pickup_point, resons, email, mobile, confirmation, veh_reg, driverid, finished) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$stmt = $connection->prepare($sql);

	$stmt->bind_param($name, $username, $type, $req_date, $req_time, $return_date, $return_time, $destination, $pickup, $reason, $email, $mobile);

	$success = $stmt->execute();

	if ($success) {
		return true;

	} else {
		echo "Error Storing in database";
		return false;
	}
}

