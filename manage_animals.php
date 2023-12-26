<!DOCTYPE html>
<?php include "db_conn.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Animals - Turtle Back Zoo</title>
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

        input {
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
    <h1>Manage Animals</h1>

    <!-- Form to Add/Update Animal Information -->
    <form action="process_animals.php" method="POST">
        <label for="animal_id">Animal ID:</label>
        <input type="text" id="animal_id" name="animal_id" required>
        
        <label for="species_id">Species ID:</label>
        <input type="text" id="species_id" name="species_id" required>
        
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>
        
        <!-- Add more fields for additional information -->
        
        <input type="submit" value="Add/Update Animal Information">
    </form>
    
    <!-- Table to Display Existing Animal Information -->
    <h2>Existing Animals</h2>
    <table>
        <thead>
            <tr>
                <th>Animal ID</th>
                <th>Species ID</th>
                <th>Status</th>
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

            // Fetch and display existing animal information
            $select_query = "SELECT * FROM Animal";
            $result = $conn->query($select_query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['animal_id'] . "</td>";
                    echo "<td>" . $row['species_id'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='update_animal.php?id=" . $row['animal_id'] . "'>Update</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No animal information found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
