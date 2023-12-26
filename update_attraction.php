<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Attraction - Turtle Back Zoo</title>
    <!-- Any necessary CSS or styling links -->
</head>
<body>
    <h1>Update Attraction</h1>

    <?php
    include 'db_conn.php'; // Include your database connection file

    // Check if an ID is provided in the URL
    if (isset($_GET['id'])) {
        $attraction_id = $_GET['id'];

        // Retrieve attraction details based on ID
        $sql = "SELECT * FROM Attractions WHERE attraction_id = $attraction_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>

    <!-- Form to update attraction -->
    <form action="process_update_attraction.php" method="POST">
        <input type="hidden" name="attraction_id" value="<?php echo $row['attraction_id']; ?>">
        <label for="attraction_name">Attraction Name:</label>
        <input type="text" id="attraction_name" name="attraction_name" value="<?php echo $row['attraction_name']; ?>" required><br><br>

        <label for="activity_date">Activity Date:</label>
        <input type="date" id="activity_date" name="activity_date" value="<?php echo $row['activity_date']; ?>" required><br><br>

        <label for="attendance">Attendance:</label>
        <input type="text" id="attendance" name="attendance" value="<?php echo $row['attendance']; ?>" required><br><br>

        <label for="revenue">Revenue:</label>
        <input type="text" id="revenue" name="revenue" value="<?php echo $row['revenue']; ?>" required><br><br>

        <input type="submit" value="Update Attraction">
    </form>

    <?php
        } else {
            echo "No attraction found with the provided ID.";
        }
    } else {
        echo "Attraction ID not provided.";
    }

    $conn->close(); // Close database connection
    ?>
</body>
</html>
