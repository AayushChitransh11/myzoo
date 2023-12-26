<!DOCTYPE html>
<?php include "db_conn.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Hourly Wages - Turtle Back Zoo</title>
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

        input[type="submit"], input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
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

    </style>
</head>
<body>
    <h1>Manage Hourly Wages</h1>
    
    <!-- Form to Add/Update Hourly Wages -->
    <form action="process_wages.php" method="POST">
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" required>
        
        <label for="hourly_rate">Hourly Rate:</label>
        <input type="number" id="hourly_rate" name="hourly_rate" required>
        
        <input type="submit" value="Add/Update Hourly Rate">
    </form>
    
    <!-- Table to Display Existing Hourly Wages -->
    <h2>Existing Hourly Wages</h2>
    <table>
        <thead>
            <tr>
                <th>Hourly Rate ID</th>
                <th>Hourly Rate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            // $servername = "your_servername";
            // $username = "your_username";
            // $password = "your_password";
            // $dbname = "your_dbname";

            // $conn = new mysqli($servername, $username, $password, $dbname);

            // if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            // }

            // Fetch and display existing hourly rates
            $sql = "SELECT hour_id, rate FROM HourlyRate";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['hour_id'] . "</td>";
                    echo "<td>" . $row['rate'] . "</td>";
                    echo "<td><a href='update_wage.php?id=" . $row['hour_id'] . "'>Update</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hourly rates found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
