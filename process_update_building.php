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
    $building_id = $_POST['building_id'];
    $building_name = $_POST['building_name'];
    $building_type = $_POST['building_type'];

    $sql = "UPDATE Building SET name='$building_name', type='$building_type' WHERE building_id=$building_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage_buildings.php"); // Redirect to view buildings page after successful update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
