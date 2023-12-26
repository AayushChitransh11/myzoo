<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Concession Activity - Turtle Back Zoo</title>
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

        input[type="date"],
        input[type="submit"] {
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>View Concession Activity</h1>

    <!-- Filter by Date Form -->
    <form action="view_concession_activity.php" method="GET">
        <label for="activity_date">Filter by Date:</label>
        <input type="date" id="activity_date" name="activity_date" required>
        <input type="submit" value="Filter">
    </form>

    <!-- View All Concessions Button -->
    <form action="view_concession_activity.php" method="GET">
        <input type="hidden" name="show_all" value="true">
        <input type="submit" value="View All Concessions">
    </form>

    <?php
    include("db_conn.php");

    // Check for date filter submission
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['activity_date'])) {
        $selected_date = $_GET['activity_date'];

        // Fetch concession activities for the selected date
        $sql = "SELECT product, revenue, activity_date FROM ConcessionActivity WHERE activity_date = '$selected_date'";
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['show_all'])) {
        // Fetch all concession activities
        $sql = "SELECT product, revenue, activity_date FROM ConcessionActivity";
    } else {
        // By default, fetch all concession activities
        $sql = "SELECT product, revenue, activity_date FROM ConcessionActivity";
    }

    // Execute the SQL query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Concession Activity</h2>";
        echo "<table>";
        echo "<thead><tr><th>Product</th><th>Revenue</th><th>Date</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["product"] . "</td>";
            echo "<td>$" . $row["revenue"] . "</td>";
            echo "<td>" . $row["activity_date"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No concession activity found.";
    }

    $conn->close();
    ?>
</body>
</html>
