<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animal Population Report - Turtle Back Zoo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Animal Population Report</h1>

    <?php
    include 'db_conn.php'; // Include your database connection file

    // Execute the SQL query
    $sql = "SELECT
                s.Name AS species,
                a.status,
                COUNT(a.animal_id) AS animalCount,
                SUM(s.food_cost) AS totalFoodCost,
                SUM(nvl(hr.rate * 40 * 4, 0)) AS VetCost
            FROM
                animal a
            JOIN
                SPECIES s ON a.species_id = s.species_id
            JOIN
                V_S_cares_for vsc ON a.species_id = vsc.species_id
            JOIN
                EMPLOYEE e ON vsc.emp_id = e.emp_id
            JOIN
                HourlyRate hr ON e.hour_id = hr.hour_id
            GROUP BY
                s.Name,
                a.status";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display report as a table
        echo "<table>
                <tr>
                    <th>Species</th>
                    <th>Status</th>
                    <th>Animal Count</th>
                    <th>Total Food Cost</th>
                    <th>Veterinarian and Specialist Cost</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["species"]."</td>
                    <td>".$row["status"]."</td>
                    <td>".$row["animalCount"]."</td>
                    <td>".$row["totalFoodCost"]."</td>
                    <td>".$row["VetCost"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for the animal population report.</p>";
    }

    $conn->close(); // Close database connection
    ?>
</body>
</html>
