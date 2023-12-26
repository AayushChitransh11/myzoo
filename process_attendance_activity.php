<?php
include "db_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendee_type = $_POST['attendee_type'];
    $count = $_POST['count'];
    $revenue = $_POST['revenue'];
    $attendance_date = $_POST['attendance_date'];

    // $servername = "your_servername";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_dbname";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    $sql = "INSERT INTO AttendanceActivity (attendee_type, count, revenue, attendance_date) 
            VALUES ('$attendee_type', $count, $revenue, '$attendance_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance activity added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
