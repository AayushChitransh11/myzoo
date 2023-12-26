<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Attendance Activity - Turtle Back Zoo</title>
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
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>View Attendance Activity</h1>

    <!-- Filter by Date Form -->
    <form action="" method="GET">
        <label for="attendance_date">Filter by Date:</label>
        <input type="date" id="attendance_date" name="attendance_date">
        <input type="submit" value="Filter">
    </form>

    <?php
    include("db_conn.php");
    // PHP code to handle form submissions and display attendance activities based on filters

    // Establish connection to the database
    // $servername = "your_servername";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_dbname";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Default SQL query to fetch all attendance records
    $sql = "SELECT attendee_type, count, revenue, attendance_date FROM AttendanceActivity";

    // Check if filtering by date is requested
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['attendance_date'])) {
        $selected_date = $_GET['attendance_date'];
        $sql = "SELECT attendee_type, count, revenue, attendance_date FROM AttendanceActivity WHERE attendance_date = '$selected_date'";
    }

    // Execute the SQL query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Attendance Activity</h2>";
        echo "<table>";
        echo "<thead><tr><th>Attendee Type</th><th>Count</th><th>Revenue</th><th>Date</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["attendee_type"] . "</td>";
            echo "<td>" . $row["count"] . "</td>";
            echo "<td>$" . $row["revenue"] . "</td>";
            echo "<td>" . $row["attendance_date"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No attendance records found.";
    }

    $conn->close();
    ?>
</body>
</html>
