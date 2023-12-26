<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Hourly Rate - Turtle Back Zoo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
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
    </style>
</head>
<body>
    <h1>Update Hourly Rate</h1>
    
    <!-- Form to Update Hourly Rate -->
    <form action="process_wages.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $hour_id; ?>">
        
        <label for="hourly_rate">Hourly Rate:</label>
        <input type="number" id="hourly_rate" name="hourly_rate" value="<?php echo $existing_hourly_rate; ?>" required>
        
        <input type="submit" value="Update Hourly Rate">
    </form>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
