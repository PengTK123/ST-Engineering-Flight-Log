<?php
include 'db.php';
session_start();

$id = $_GET['id'];
$sql = "DELETE FROM flight_logs WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Flight log deleted successfully.'); window.location.href='dashboard.php';</script>";
} else {
    echo "<script>alert('Error deleting flight log.'); window.location.href='dashboard.php';</script>";
}
$conn->close();
?>
