<?php
// Database configuration
$host = "localhost";
$db_name = "lpa_ecomms";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Set charset to UTF-8
$conn->set_charset("utf8");
?>