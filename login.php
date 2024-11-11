<?php
include 'db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify the password using bcrypt
    if (password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid password
        echo "<script>alert('Invalid credentials. Please try again.'); window.location.href='index.html';</script>";
    }
} else {
    // User not found
    echo "<script>alert('User not found. Please register.'); window.location.href='register.html';</script>";
}

$conn->close();
?>
