<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Attendance Activity - Turtle Back Zoo</title>
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

        input[type="text"],
        input[type="number"],
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
    </style>
</head>
<body>
    <h1>Enter Attendance Activity</h1>

    <form action="process_attendance_activity.php" method="POST">
        <label for="attendee_type">Attendee Type:</label>
        <input type="text" id="attendee_type" name="attendee_type" required><br><br>
        
        <label for="count">Count:</label>
        <input type="number" id="count" name="count" required><br><br>

        <label for="revenue">Revenue:</label>
        <input type="number" id="revenue" name="revenue" required><br><br>
        
        <label for="attendance_date">Attendance Date:</label>
        <input type="date" id="attendance_date" name="attendance_date" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <!-- Any necessary JavaScript scripts -->
</body>
</html>
