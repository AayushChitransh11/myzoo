<?php
include("db_conn.php");
// Establish connection to the database (replace with your connection details)
// $servername = "your_servername";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_dbname";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_building_name = $_POST['new_building_name'];
    $new_building_type = $_POST['new_building_type'];

    $sql = "INSERT INTO Building (name, type) VALUES ('$new_building_name', '$new_building_type')";

    if ($conn->query($sql) === TRUE) {
        echo "New building added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
