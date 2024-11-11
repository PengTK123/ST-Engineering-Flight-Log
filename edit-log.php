<?php
include 'db.php';
session_start();

if (!isset($_GET['id'])) {
    echo "Invalid request.";
    exit;
}

$logId = $_GET['id'];
$sql = "SELECT * FROM flight_logs WHERE id = $logId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $log = $result->fetch_assoc();
} else {
    echo "Flight log not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Flight Log</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Edit Flight Log</h2>
<form action="update-log.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $log['id']; ?>">
    <label>Tail Number:</label>
    <input type="text" name="tailNumber" value="<?php echo $log['tailNumber']; ?>" required>
    
    <label>Flight ID:</label>
    <input type="text" name="flightID" value="<?php echo $log['flightID']; ?>" required>
    
    <label>Takeoff:</label>
    <input type="datetime-local" name="takeoff" value="<?php echo date('Y-m-d\TH:i', strtotime($log['takeoff'])); ?>" required>
    
    <label>Landing:</label>
    <input type="datetime-local" name="landing" value="<?php echo date('Y-m-d\TH:i', strtotime($log['landing'])); ?>" required>
    
    <label>Duration:</label>
    <input type="text" name="duration" value="<?php echo $log['duration']; ?>" required>
    
    <button type="submit">Update Log</button>
</form>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

<?php $conn->close(); ?>
