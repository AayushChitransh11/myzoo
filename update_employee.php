<?php
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
    $emp_id = $_GET['id'];

    $sql = "SELECT * FROM Employee WHERE emp_id = $emp_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Update Employee - Turtle Back Zoo</title>
            <!-- Any necessary CSS or styling links -->
        </head>
        <body>
            <h1>Update Employee</h1>
            <form action="process_update_employee.php" method="POST">
                <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $row['FirstName']; ?>" required><br><br>
                
                <!-- Include other fields -->

                <!-- Additional Fields for Address Details -->
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" value="<?php echo $row['Street']; ?>"><br><br>
                
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="<?php echo $row['City']; ?>"><br><br>
                
                <label for="state">State:</label>
                <input type="text" id="state" name="state" value="<?php echo $row['State']; ?>"><br><br>
                
                <label for="zip">Zip Code:</label>
                <input type="text" id="zip" name="zip" value="<?php echo $row['Zip']; ?>"><br><br>
                
                <input type="submit" value="Update Employee">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Employee not found.";
    }
}

$conn->close();
?>
