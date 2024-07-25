<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hireup";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all projects
$sql = "SELECT title, description, skills FROM project";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        h2 {
            margin: 0 0 10px;
            color: #0275d8;
        }
        p {
            margin: 0 0 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Projects</h1>
        <ul>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<li><h2>" . htmlspecialchars($row["title"]) . "</h2>";
                    echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                    echo $row["skills"];
                    echo "</li>";
                }
            } else {
                echo "<li>No projects found</li>";
            }
            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
