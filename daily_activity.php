<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Zoo Activity - Turtle Back Zoo</title>
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

        h2 {
            color: #333;
            margin-top: 20px;
            text-align: center;
        }

        .section-container {
            text-align: center;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            display: block;
            text-align: center;
            margin: 10px auto;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Daily Zoo Activity</h1>

    <!-- Attractions Section -->
    <div class="section-container">
        <h2>Attractions</h2>
        <a href="view_attraction_activity_by_date.php"><button>View Attraction Activity</button></a>
        <a href="enter_attraction_activity_by_date.php"><button>Enter Attraction Activity</button></a>
    </div>
    
    <!-- Concessions Section -->
    <div class="section-container">
        <h2>Concessions</h2>
        <a href="view_concession_activity.php"><button>View Concession Activity</button></a>
        <a href="enter_concession_activity.php"><button>Enter Concession Activity</button></a>
    </div>
    
    <!-- Attendance Section -->
    <div class="section-container">
        <h2>Attendance</h2>
        <a href="view_attendance_activity.php"><button>View Attendance Activity</button></a>
        <a href="enter_attendance_activity.php"><button>Enter Attendance Activity</button></a>
    </div>

    <!-- Other content related to daily zoo activity -->

    <!-- Any necessary JavaScript scripts -->
</body>
</html>
