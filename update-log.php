<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $tailNumber = $_POST['tailNumber'];
    $flightID = $_POST['flightID'];
    $takeoff = $_POST['takeoff'];
    $landing = $_POST['landing'];
    $duration = $_POST['duration'];

    $sql = "UPDATE flight_logs SET 
            tailNumber = '$tailNumber', 
            flightID = '$flightID', 
            takeoff = '$takeoff', 
            landing = '$landing', 
            duration = '$duration' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Flight log updated successfully.'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating flight log.'); window.location.href='edit-log.php?id=$id';</script>";
    }
}

$conn->close();
?>
