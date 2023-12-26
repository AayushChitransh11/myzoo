<?php
// Check if form is submitted
include("db_conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $animal_id = $_POST['animal_id'];
    $species_id = $_POST['species_id'];
    $status = $_POST['status'];
    
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

    // Check if the animal ID exists in the Animal table
    $check_query = "SELECT animal_id FROM Animal WHERE animal_id = '$animal_id'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Update existing animal information
        $update_query = "UPDATE Animal SET species_id = '$species_id', status = '$status' WHERE animal_id = '$animal_id'";
        
        if ($conn->query($update_query) === TRUE) {
            echo "Animal information updated successfully";
        } else {
            echo "Error updating animal information: " . $conn->error;
        }
    } else {
        // Insert new animal information
        $insert_query = "INSERT INTO Animal (animal_id, species_id, status) VALUES ('$animal_id', '$species_id', '$status')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo "New animal information added successfully";
        } else {
            echo "Error adding animal information: " . $conn->error;
        }
    }

    $conn->close();
} else {
    // Redirect or display error message if form wasn't submitted
    // header("Location: manage_animals.php");
    // exit();
    echo "Form not submitted";
}
?>
