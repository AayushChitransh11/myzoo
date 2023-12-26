<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Attractions - Turtle Back Zoo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
            text-align: center;
            padding: 20px;
            background-color: #70a1ff;
            margin: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
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
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Manage Attractions</h1>

    <!-- Form for Adding a New Attraction -->
    <h2>Add New Attraction</h2>
    <form action="process_add_attraction.php" method="POST">
        <label for="attraction_name">Attraction Name:</label>
        <input type="text" id="attraction_name" name="attraction_name" required><br><br>

        <label for="activity_date">Activity Date:</label>
        <input type="date" id="activity_date" name="activity_date" required><br><br>

        <label for="attendance">Attendance:</label>
        <input type="text" id="attendance" name="attendance" required><br><br>

        <label for="revenue">Revenue:</label>
        <input type="text" id="revenue" name="revenue" required><br><br>

        <input type="submit" value="Add Attraction">
    </form>

    <br><br>

    <!-- Display Existing Attractions -->
    <h2>Existing Attractions</h2>
    <?php
    include 'db_conn.php'; // Include your database connection file

    // Retrieve existing attractions
    $sql = "SELECT * FROM Attractions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
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
</body>
</html>
