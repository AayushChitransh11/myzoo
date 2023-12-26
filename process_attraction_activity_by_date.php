<?php
include("db_conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $activity_date = $_POST['activity_date'];
    $attraction_name = $_POST['attraction_name'];
    $attendance = $_POST['attendance'];
    $revenue = $_POST['revenue'];

    // Connect to the database
    // $servername = "your_servername";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_dbname";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Insert data into Attractions table
    $sql = "INSERT INTO Attractions (activity_date, attraction_name, attendance, revenue) VALUES ('$activity_date', '$attraction_name', $attendance, $revenue)";

    if ($conn->query($sql) === TRUE) {
        echo "Attraction activity added successfully for date: $activity_date";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
