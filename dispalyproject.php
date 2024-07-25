<!-- <?php
// Database connection parameters
$host = "localhost"; 
$user = "root"; 
$password = ""; // Replace with your database password if any
$database = "hireup"; 

// Connect to the database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all projects from the database
$query = "SELECT title, description, skills FROM project";
$result = $conn->query($query);

?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
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
        .project {
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
        }
        .project:last-child {
            border-bottom: none;
        }
        .project-title {
            font-size: 1.5em;
            color: #333;
        }
        .project-description {
            margin: 10px 0;
            color: #666;
        }
        .project-skills {
            color: #0275d8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Projects</h1>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each project
            while ($row = $result->fetch_assoc()) {
                echo '<div class="project">';
                echo '<div class="project-title">' . htmlspecialchars($row["title"]) . '</div>';
                echo '<div class="project-description">' . nl2br(htmlspecialchars($row["description"])) . '</div>';
                echo '<div class="project-skills">Skills: ' . htmlspecialchars($row["skills"]) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No projects found.</p>';
        }
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
