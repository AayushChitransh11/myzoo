<?php
include("db_conn.php");
// Display Employees Table
$sql = "SELECT emp_id, FirstName, LastName FROM Employee";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Employees Table</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Employee ID</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    // Add more table headers for other employee details
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["emp_id"] . "</td>";
        echo "<td>" . $row["FirstName"] . "</td>";
        echo "<td>" . $row["LastName"] . "</td>";
        // Add more table cells for other employee details
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No employees found";
}
?>
