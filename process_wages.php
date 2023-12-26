<?php
include("db_conn.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $employee_id = $_POST['employee_id'];
    $hourly_rate = $_POST['hourly_rate'];

    // Validate form data (add more validation as needed)

    // Connect to the database
    // $servername = "your_servername";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_dbname";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Check if the employee ID exists in the HourlyRate table
    $check_query = "SELECT hour_id FROM HourlyRate WHERE hour_id = '$employee_id'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Update existing hourly rate for the employee
        $update_query = "UPDATE HourlyRate SET rate = '$hourly_rate' WHERE hour_id = '$employee_id'";
        
        if ($conn->query($update_query) === TRUE) {
            echo "Hourly rate updated successfully";
        } else {
            echo "Error updating hourly rate: " . $conn->error;
        }
    } else {
        // Insert new hourly rate for the employee
        $insert_query = "INSERT INTO HourlyRate (hour_id, rate) VALUES ('$employee_id', '$hourly_rate')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo "New hourly rate added successfully";
        } else {
            echo "Error adding hourly rate: " . $conn->error;
        }
    }

    $conn->close();
} else {
    // Redirect or display error message if form wasn't submitted
    // header("Location: manage_wages.php");
    // exit();
    echo "Form not submitted";
}
?>
