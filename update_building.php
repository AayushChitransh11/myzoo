<?php
// Establish connection to the database (replace with your connection details)
include("db_conn.php");
// $servername = "your_servername";
// $username = "your_username";
// $password = "your_password";
// $dbname = "your_dbname";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $building_id = $_GET['id'];

    // Retrieve building details based on the provided ID
    $sql = "SELECT * FROM Building WHERE building_id = $building_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display form with existing building details for updating
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Update Building - Turtle Back Zoo</title>
            <!-- Any necessary CSS or styling links -->
        </head>
        <body>
            <h1>Update Building</h1>
            <form action="process_update_building.php" method="POST">
                <input type="hidden" name="building_id" value="<?php echo $building_id; ?>">
                <label for="building_name">Building Name:</label>
                <input type="text" id="building_name" name="building_name" value="<?php echo $row['name']; ?>" required><br><br>
                <label for="building_type">Building Type:</label>
                <input type="text" id="building_type" name="building_type" value="<?php echo $row['type']; ?>" required><br><br>
                <input type="submit" value="Update Building">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Building not found.";
    }
}

$conn->close();
?>
