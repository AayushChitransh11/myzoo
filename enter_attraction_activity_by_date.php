<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Attraction Activity by Date - Turtle Back Zoo</title>
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
        input[type="text"],
        input[type="number"],
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
    <h1>Enter Attraction Activity by Date</h1>
    
    <form action="process_attraction_activity_by_date.php" method="POST">
        <label for="activity_date">Select Date:</label>
        <input type="date" id="activity_date" name="activity_date" required>

        <label for="attraction_name">Attraction Name:</label>
        <input type="text" id="attraction_name" name="attraction_name" required>
        
        <label for="attendance">Attendance:</label>
        <input type="number" id="attendance" name="attendance" required>
        
        <label for="revenue">Revenue:</label>
        <input type="number" id="revenue" name="revenue" required>
        
        <input type="submit" value="Submit">
    </form>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
