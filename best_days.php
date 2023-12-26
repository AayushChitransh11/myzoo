<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Best Days Report - Attractions</title>
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
    <h1>Best Days Report</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <input type="submit" value="Generate Report">
    </form>

    <?php
    include 'db_conn.php'; // Include your database connection file

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            // Prepare and execute the SQL query
            $sql = "SELECT activity_date, SUM(revenue) AS totalRevenue
                    FROM Attractions
                    WHERE DATE(activity_date) BETWEEN '$start_date' AND '$end_date'
                    GROUP BY activity_date
                    ORDER BY totalRevenue DESC
                    LIMIT 5";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display the report
                echo "<h2>Best Days Report</h2>";
                echo "<table>
                        <tr>
                            <th>Activity Date</th>
                            <th>Total Revenue</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["activity_date"]."</td>
                            <td>".$row["totalRevenue"]."</td>
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
