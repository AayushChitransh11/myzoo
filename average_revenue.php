<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Average Revenue Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        form {
            margin: 20px 0;
        }

        label {
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        table {
            width: 60%;
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
    <h1>Average Revenue Report</h1>

    <!-- Form for selecting start and end dates -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <input type="submit" value="Generate Report">
    </form>

    <?php
    include 'db_conn.php'; // Include your database connection file

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];

            // SQL query to generate the average revenue report
            $sql = "SELECT
                        attraction_name AS revenueSource,
                        ROUND(AVG(revenue), 2) AS averageRevenue,
                        SUM(attendance) AS totalAttendance
                    FROM
                        Attractions 
                    WHERE
                        activity_date BETWEEN '$start_date' AND '$end_date'
                    GROUP BY
                        attraction_name
                    ORDER BY
                        averageRevenue DESC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display the report in a table format
                echo "<table>
                        <tr>
                            <th>Revenue Source</th>
                            <th>Average Revenue</th>
                            <th>Total Attendance</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["revenueSource"]."</td>
                            <td>".$row["averageRevenue"]."</td>
                            <td>".$row["totalAttendance"]."</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found for the selected date range.</p>";
            }
        }
    }

    $conn->close(); // Close database connection
    ?>
</body>
</html>
