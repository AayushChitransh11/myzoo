<?php
include 'db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_date = $_POST['report_date'];

    // Generate report based on the provided date
    $sql = "SELECT
                re.activity_date AS eventDate,
                re.attraction_name AS event,
                SUM(re.attendance) AS ticketsSold,
                SUM(re.revenue) AS totalRevenue
            FROM
                Attractions re
            WHERE
                re.activity_date = '$report_date'
            GROUP BY
                eventDate, event";

    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revenue Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<?php
    if ($result->num_rows > 0) {
        // Output report
        echo "<h2>Revenue Report for Date: $report_date</h2>";
        echo "<table>
                <tr>
                    <th>Event Date</th>
                    <th>Event</th>
                    <th>Tickets Sold</th>
                    <th>Total Revenue</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["eventDate"]."</td>
                    <td>".$row["event"]."</td>
                    <td>".$row["ticketsSold"]."</td>
                    <td>".$row["totalRevenue"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for the selected date.</p>";
    }
?>
</body>
</html>

<?php
}

$conn->close(); // Close database connection
?>
