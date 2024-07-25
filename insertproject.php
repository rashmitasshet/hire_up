
<?php
// Include the database configuration file
require 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills = $_POST['skills']; // This will be an array

    // Connect to the database
    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind a SQL statement to insert project data into the database
    $stmt = $conn->prepare("INSERT INTO project (title, description, skills) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $skills_str);

    // Convert skills array to a comma-separated string
    $skills_str = implode(', ', $skills);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo '<script>alert("Project added successfully.");</script>';
    } else {
        echo '<script>alert("Error adding project.");</script>';
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #e2ded3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        textarea {
            resize: vertical;
        }
        .skill-field {
            display: flex;
            align-items: center;
        }
        .skill-field input[type="text"] {
            flex: 1;
            margin-right: 10px;
        }
        button {
            padding: 10px 15px;
            border: none;
            background:red;/*#5cb85c*/
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #4cae4c;
        }
        button[type="button"] {
            background:  #4e413b/*#d9534f;*/
        }
        button[type="button"]:hover {
            background: #211717 ;
        }
        input[type="submit"] {
            background: #804d3b;/*#0275d8;*/
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }
        input[type="submit"]:hover {
            background: #522e24;/*#025aa5;*/
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Project</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="skills">Skills:</label>
            <div id="skills-container">
                <div class="skill-field">
                    <input type="text" name="skills[]" required>
                    <button type="button" onclick="removeSkill(this)">Remove</button>
                </div>
            </div>
            <button type="button" onclick="addSkill()">Add Skill</button>

            <input type="submit" value="Save Project">
        </form>
    </div>

    <script>
        function addSkill() {
            const skillContainer = document.getElementById('skills-container');
            const newSkill = document.createElement('div');
            newSkill.className = 'skill-field';
            newSkill.innerHTML = `<input type="text" name="skills[]" required>
                                  <button type="button" onclick="removeSkill(this)">Remove</button>`;
            skillContainer.appendChild(newSkill);
        }

        function removeSkill(button) {
            const skillField = button.parentNode;
            skillField.parentNode.removeChild(skillField);
        }
    </script>
</body>
</html>
