<?php
// Check if the function exists before declaring it
if (!function_exists('db_connect')) {
    function db_connect()
    {
        $connection = mysqli_connect("localhost", "root", "", "vehicle management system");

        if (!$connection) {
            die("Connection error: " . mysqli_connect_error());
        }

        return $connection;
    }
}
?>