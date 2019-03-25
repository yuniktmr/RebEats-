<?php

//variables that hold the database configuration
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "olemiss2019";
$dbName = "eatrebs";

//makes the connection to the database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//kills process if connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>