<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Management - Turtle Back Zoo</title>
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
            max-width: 600px;
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
    <h1>Employee Management</h1>

    <!-- Form for Adding a New Employee -->
    <h2>Add New Employee</h2>
    <form action="process_employee.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>
        
        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename"><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="startdate">Start Date:</label>
        <input type="date" id="startdate" name="startdate" required><br><br>

        <label for="jobtype">Job Type:</label>
        <input type="text" id="jobtype" name="jobtype" required><br><br>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street"><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city"><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state"><br><br>

        <label for="zip">Zip Code:</label>
        <input type="text" id="zip" name="zip"><br><br>
        
        <input type="submit" value="Add Employee">
    </form>

    <br>

    <!-- Form for Filtering Employee by emp_id -->
    <h2>Filter Employee by ID</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <label for="emp_id">Enter Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id">
        <input type="submit" value="Filter">
    </form>

    <br>

    <!-- Display All Records Button -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="submit" name="show_all" value="Show All Records">
    </form>

    <br>

    <!-- Displaying Filtered/All Employees -->
    <h2>Employees</h2>
    <?php
    include 'db_conn.php'; // Include your database connection file

    if (isset($_GET['emp_id'])) {
        $emp_id = $_GET['emp_id'];
        $sql = "SELECT * FROM Employee WHERE emp_id = $emp_id";
    } elseif (isset($_GET['show_all'])) {
        $sql = "SELECT * FROM Employee";
    }

    if (isset($sql)) {
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Displaying table headers
            echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Start Date</th>
                    <th>Job Type</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <!-- Include other fields as needed -->
                </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row["emp_id"]."</td>
                    <td>".$row["FirstName"]."</td>
                    <td>".$row["LastName"]."</td>
                    <td>".$row["StartDate"]."</td>
                    <td>".$row["JobType"]."</td>
                    <td>".$row["Street"]."</td>
                    <td>".$row["City"]."</td>
                    <td>".$row["State"]."</td>
                    <td>".$row["Zip"]."</td>
                    <!-- Include other fields as needed -->
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }
    }

    $conn->close();
    ?>
</body>
</html>
