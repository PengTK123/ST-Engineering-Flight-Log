<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Flight Log</title>
<link rel="stylesheet" href="styles.css">
</head>
<?php
include 'db.php';
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: index.html");
    exit;
}

$flightID = $_GET['flightID'] ?? '';

if (empty($flightID)) {
    echo "<script>alert('Please enter a Flight ID to search.'); window.location.href='dashboard.php';</script>";
    exit;
}

$sql = "SELECT * FROM flight_logs WHERE flightID LIKE ? AND userId = ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$flightID%";
$userId = $_SESSION['userId'];
$stmt->bind_param("si", $searchTerm, $userId);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Search Results for Flight ID: $flightID</h2>";
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Tail Number</th>
                <th>Flight ID</th>
                <th>Takeoff</th>
                <th>Landing</th>
                <th>Duration</th>
                <th>Actions</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['tailNumber']}</td>
                <td>{$row['flightID']}</td>
                <td>{$row['takeoff']}</td>
                <td>{$row['landing']}</td>
                <td>{$row['duration']}</td>
                <td>
                    <a href='edit-log.php?id={$row['id']}' class='button'><i class='fas fa-edit'></i> Edit</a>
                    <a href='delete-log.php?id={$row['id']}' class='button'><i class='fas fa-trash'></i> Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No flight logs found for Flight ID: $flightID</p>";
}

$stmt->close();
$conn->close();
?>
<a href="dashboard.php" class="button">Back to Dashboard</a>
