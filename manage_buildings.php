<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Building Management - Turtle Back Zoo</title>
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
    <h1>Building Management</h1>

    <!-- Form for Adding a New Building -->
    <h2>Add New Building</h2>
    <form action="process_building.php" method="POST">
        <label for="new_building_name">Building Name:</label>
        <input type="text" id="new_building_name" name="new_building_name" required><br><br>

        <label for="new_building_type">Building Type:</label>
        <input type="text" id="new_building_type" name="new_building_type" required><br><br>

        <input type="submit" value="Add Building">
    </form>

    <!-- Displaying Existing Buildings -->
    <h2>Existing Buildings</h2>
    <?php
    include("db_conn.php");

    // Retrieve and display existing buildings
    $sql = "SELECT building_id, name, type FROM Building";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Type</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["building_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td><a href='update_building.php?id=" . $row["building_id"] . "'>Update</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No buildings found.";
    }

    $conn->close();
    ?>
</body>
</html>
