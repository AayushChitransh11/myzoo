<?php
include 'db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['report_date'])) {
        $report_date = $_POST['report_date']; // Date selected for the report

        // Query to generate revenue report by source for the given date
        $sql = "SELECT
                    re.activity_date AS eventDate,
                    re.attraction_name AS event,
                    re.attendance AS ticketsSold,
                    re.revenue AS totalRevenue,
                    cn.concession_name AS revenueSource
                FROM
                    Attractions re
                JOIN
                    Concession cn ON re.attraction_id = cn.revenuetype_id
                WHERE
                    re.activity_date = '$report_date'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the report table
            echo "<table border='1'>
                <tr>
                    <th>Event Date</th>
                    <th>Event</th>
                    <th>Tickets Sold</th>
                    <th>Total Revenue</th>
                    <th>Revenue Source</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row["eventDate"]."</td>
                    <td>".$row["event"]."</td>
                    <td>".$row["ticketsSold"]."</td>
                    <td>".$row["totalRevenue"]."</td>
                    <td>".$row["revenueSource"]."</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found for the selected date.";
        }
    }
}

$conn->close(); // Close database connection
?>
