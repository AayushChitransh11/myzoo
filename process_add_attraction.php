<?php
include 'db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attraction_name = $_POST['attraction_name'];
    $activity_date = $_POST['activity_date'];
    $attendance = $_POST['attendance'];
    $revenue = $_POST['revenue'];

    // Insert new attraction into the database
    $sql = "INSERT INTO Attractions (attraction_name, activity_date, attendance, revenue) VALUES ('$attraction_name', '$activity_date', '$attendance', '$revenue')";

    if ($conn->query($sql) === TRUE) {
        echo "New attraction added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Close database connection
?>
