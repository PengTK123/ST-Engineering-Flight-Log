<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: index.html");
    exit;
}
include 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('User registered successfully!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Registration failed. Please try again.'); window.location.href='register.html';</script>";
}
$conn->close();
?>
