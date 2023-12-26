<?php
include 'db_conn.php'; // Include your database connection file

// Retrieve existing attractions
$sql = "SELECT * FROM Attractions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Attraction ID</th><th>Attraction Name</th><th>Activity Date</th><th>Attendance</th><th>Revenue</th><th>Action</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["attraction_id"] . "</td>";
        echo "<td>" . $row["attraction_name"] . "</td>";
        echo "<td>" . $row["activity_date"] . "</td>";
        echo "<td>" . $row["attendance"] . "</td>";
        echo "<td>" . $row["revenue"] . "</td>";
        echo "<td><a href='update_attraction.php?id=" . $row["attraction_id"] . "'>Edit</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No attractions found";
}

$conn->close(); // Close database connection
?>
