<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userId'])) {
    echo "<script>alert('You must be logged in to add a flight log.'); window.location.href='index.html';</script>";
    exit;
}

// Check if the form data is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data using $_POST
    $userId = $_SESSION['userId'];
    $tailNumber = $_POST['tailNumber'] ?? null;
    $flightID = $_POST['flightID'] ?? null;
    $takeoff = $_POST['takeoff'] ?? null;
    $landing = $_POST['landing'] ?? null;

    // Validate that all fields are filled
    if (empty($tailNumber) || empty($flightID) || empty($takeoff) || empty($landing)) {
        echo "<script>alert('Please fill in all the fields.'); window.location.href='add-log.html';</script>";
        exit;
    }

    // Calculate the duration
    $takeoffTime = new DateTime($takeoff);
    $landingTime = new DateTime($landing);

    if ($landingTime < $takeoffTime) {
        echo "<script>alert('Landing time cannot be before takeoff time.'); window.location.href='add-log.html';</script>";
        exit;
    }

    $interval = $takeoffTime->diff($landingTime);
    $duration = $interval->format('%d days %h hours %i minutes');

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO flight_logs (tailNumber, flightID, takeoff, landing, duration, userId) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $tailNumber, $flightID, $takeoff, $landing, $duration, $userId);

    if ($stmt->execute()) {
        echo "<script>alert('Flight log added successfully! Duration: $duration'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='add-log.html';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request method. Please submit the form.'); window.location.href='add-log.html';</script>";
}
?>
