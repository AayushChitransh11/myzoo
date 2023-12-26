<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Daily Zoo Activities - Turtle Back Zoo</title>
    <!-- Any necessary CSS or styling links -->
</head>
<body>
    <h1>Manage Daily Zoo Activities</h1>
    
    <!-- Attractions Section -->
    <h2>Attractions</h2>
    <form action="process_daily_activities.php" method="POST">
        <input type="hidden" name="action" value="add_attraction">
        
        <label for="attraction_name">Attraction Name:</label>
        <input type="text" id="attraction_name" name="attraction_name" required>
        
        <label for="attendance">Attendance:</label>
        <input type="number" id="attendance" name="attendance" required>
        
        <label for="revenue">Revenue:</label>
        <input type="number" id="revenue" name="revenue" required>
        
        <input type="submit" value="Add Attraction">
    </form>
    
    <!-- Concessions Section -->
    <h2>Concessions</h2>
    <form action="process_daily_activities.php" method="POST">
        <input type="hidden" name="action" value="add_concession">
        
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        
        <label for="daily_revenue">Daily Revenue:</label>
        <input type="number" id="daily_revenue" name="daily_revenue" required>
        
        <input type="submit" value="Add Concession">
    </form>
    
    <!-- Attendance Section -->
    <h2>Attendance</h2>
    <form action="process_daily_activities.php" method="POST">
        <input type="hidden" name="action" value="add_attendance">
        
        <label for="attendee_type">Attendee Type:</label>
        <input type="text" id="attendee_type" name="attendee_type" required>
        
        <label for="total_count">Total Count:</label>
        <input type="number" id="total_count" name="total_count" required>
        
        <label for="total_revenue">Total Revenue:</label>
        <input type="number" id="total_revenue" name="total_revenue" required>
        
        <input type="submit" value="Add Attendance">
    </form>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
