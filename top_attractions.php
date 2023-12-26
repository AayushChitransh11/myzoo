<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Attractions - Turtle Back Zoo</title>
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
    <h1>Top Attractions Report</h1>

    <!-- Form for Date Filtering -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <input type="submit" value="Filter">
    </form>

    <?php
    include 'db_conn.php'; // Include your database connection file

    // Default date range or from form input
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '2023-01-02';
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '2023-12-05';

    // Execute the SQL query to get top attractions
    $sql = "SELECT attraction_name AS attraction, SUM(revenue) AS totalRevenue
            FROM Attractions 
            WHERE activity_date BETWEEN '$start_date' AND '$end_date'
            GROUP BY attraction_name
            ORDER BY totalRevenue DESC
            LIMIT 3";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display report as a table
        echo "<table>
                <tr>
                    <th>Attraction</th>
                    <th>Total Revenue</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["attraction"]."</td>
                    <td>".$row["totalRevenue"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for top attractions within the specified date range.</p>";
    }

    $conn->close(); // Close database connection
    ?>
</body>
</html>
