<?php
include("db_conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product = $_POST['product'];
    $revenue = $_POST['revenue'];
    $activity_date = $_POST['activity_date'];

    // Connect to the database
    // $servername = "your_servername";
    // $username = "your_username";
    // $password = "your_password";
    // $dbname = "your_dbname";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Insert data into ConcessionActivity table
    $sql = "INSERT INTO ConcessionActivity (product, revenue, activity_date) 
            VALUES ('$product', $revenue, '$activity_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Concession activity added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
