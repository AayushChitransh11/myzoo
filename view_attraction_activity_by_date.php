<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Attraction Activity by Date - Turtle Back Zoo</title>
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
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>View Attraction Activity by Date</h1>
    
    <!-- Date Selection Form -->
    <form action="view_attraction_activity_by_date.php" method="GET">
        <label for="activity_date">Select Date:</label>
        <input type="date" id="activity_date" name="activity_date" required>
        <input type="submit" value="View Activity">
    </form>

    <!-- Button to view all activity -->
    <form action="view_attraction_activity_by_date.php" method="GET">
        <input type="hidden" name="show_all" value="true">
        <input type="submit" value="View All Activity">
    </form>

    <?php
    include("db_conn.php");

    // Check if 'show_all' is set to true
    if (isset($_GET['show_all']) && $_GET['show_all'] === 'true') {
        // Fetch all attraction activity
        $sql = "SELECT attraction_name, attendance, revenue, activity_date FROM Attractions ORDER BY activity_date DESC";
    } else {
        // Check if a date is selected
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['activity_date'])) {
            $selected_date = $_GET['activity_date'];

            // Fetch attraction activity for the selected date
            $sql = "SELECT attraction_name, attendance, revenue, activity_date FROM Attractions WHERE activity_date = '$selected_date'";
        } else {
            // Fetch all attraction activity
            $sql = "SELECT attraction_name, attendance, revenue, activity_date FROM Attractions ORDER BY activity_date DESC";
        }
    }

    // Execute the SQL query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Attraction Activity</h2>";
        echo "<table>";
        echo "<thead><tr><th>Date</th><th>Attraction Name</th><th>Attendance</th><th>Revenue</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["activity_date"] . "</td>";
            echo "<td>" . $row["attraction_name"] . "</td>";
            echo "<td>" . $row["attendance"] . "</td>";
            echo "<td>$" . $row["revenue"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No attraction activity found.";
    }

    $conn->close();
    ?>

    <!-- Any necessary JavaScript scripts -->
</body>
</html>
