<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Flight Logs</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Flight Log Dashboard</h2>
<a href="add-log.html" class="button"><i class="fas fa-plus-circle"></i> Add New Log</a>
<table>
    <tr>
        <th>Tail Number</th>
        <th>Flight ID</th>
        <th>Takeoff</th>
        <th>Landing</th>
        <th>Duration</th>
        <th>Actions</th>
    </tr>
    <?php
    include 'db.php';
    session_start();
    $userId = $_SESSION['userId'];
    $result = $conn->query("SELECT * FROM flight_logs WHERE userId = $userId");

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['tailNumber']}</td>
                <td>{$row['flightID']}</td>
                <td>{$row['takeoff']}</td>
                <td>{$row['landing']}</td>
                <td>{$row['duration']}</td>
                <td>
                    <a href='edit-log.php?id={$row["id"]}' class='button'><i class='fas fa-edit'></i> Edit</a>
                    <a href='delete-log.php?id={$row["id"]}' class='button'><i class='fas fa-trash'></i> Delete</a>
                </td>
              </tr>";
    }
    $conn->close();
    ?>
</table>
<form action="search.php" method="GET">
    <input type="text" name="flightID" placeholder="Search by Flight ID" required>
    <button type="submit">Search</button>
</form>
<a href="logout.php" class="button"><i class="fas fa-sign-out-alt"></i> Logout</a>
</body>
</html>
