<!DOCTYPE html>
<?php include "db_conn.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Animal Information - Turtle Back Zoo</title>
    <!-- Any necessary CSS or styling links -->
</head>
<body>
    <h1>Update Animal Information</h1>
    
    <?php
    // Check if the animal ID is provided in the URL
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $animal_id = $_GET['id']; // Get the animal_id from the URL parameter

        // Connect to the database
        // $servername = "your_servername";
        // $username = "your_username";
        // $password = "your_password";
        // $dbname = "your_dbname";

        // $conn = new mysqli($servername, $username, $password, $dbname);

        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }

        // Fetch the existing animal information for the given animal_id
        $select_query = "SELECT * FROM Animal WHERE animal_id = '$animal_id'";
        $result = $conn->query($select_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- Form to Update Animal Information -->
            <form action="process_animals.php" method="POST">
                <input type="hidden" name="animal_id" value="<?php echo $animal_id; ?>">
                
                <label for="species_id">Species ID:</label>
                <input type="text" id="species_id" name="species_id" value="<?php echo $row['species_id']; ?>" required>
                
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>" required>
                
                <!-- Add more fields for additional information -->
                
                <input type="submit" value="Update Animal Information">
            </form>
            <?php
        } else {
            echo "No animal information found for this ID";
        }
        $conn->close();
    } else {
        echo "Invalid request";
    }
    ?>
    
    <!-- Any necessary JavaScript scripts -->
</body>
</html>
