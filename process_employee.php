<?php
include("db_conn.php");
// $servername = "your_servername";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_dbname";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//}

// Handle form submission to add new employee
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $startdate = $_POST['startdate'];
    $jobtype = $_POST['jobtype'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // SQL query to insert new employee
    $sql = "INSERT INTO Employee (FirstName, MiddleName, LastName, StartDate, JobType, Street, City, State, Zip)
            VALUES ('$firstname', '$middlename', '$lastname', '$startdate', '$jobtype', '$street', '$city', '$state', '$zip')";

    if ($conn->query($sql) === TRUE) {
        echo "New employee added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
