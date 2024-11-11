<?php
$servername = "localhost";
$username = "root";
$password = "";  // Leave blank if you did not set a password for MySQL
$dbname = "flight_log_db";  // Ensure this matches your database name

// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
