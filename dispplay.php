<?php
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

// Function to split skills correctly
function split_skills($skills) {
    $skills = preg_split('/,(?![^()]*\))/', $skills);
    return array_map('trim', $skills);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#e2ded3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
            transition: transform 0.3s,box-shadow 0.3s;
        }
        .project:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .project:last-child {
            border-bottom: none;
        }
        .project-details {
            max-width: 70%; /* Increase max-width to make it wider */
            
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
        .skills-list {
            list-style-type: disc;
            margin: 0;
            padding-left: 20px;
        }
        .register-button {
            background-color: #4e413b;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .register-button:hover {
            background-color: #211717;
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
                $skills = split_skills($row["skills"]);
                echo '<div class="project">';
                echo '<div class="project-details">';
                echo '<div class="project-title">' . htmlspecialchars($row["title"]) . '</div>';
                echo '<div class="project-description">' . nl2br(htmlspecialchars($row["description"])) . '</div>';
                echo '<div class="project-skills">Skills:</div>';
                echo '<ul class="skills-list">';
                foreach ($skills as $skill) {
                    echo '<li>' . htmlspecialchars($skill) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '<a href="registration.php" class="register-button">Register</a>';
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
