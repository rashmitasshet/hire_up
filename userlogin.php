<?php
session_start();

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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind a SQL statement to fetch the user's password
    $stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            // Debugging: Print the retrieved password
            error_log("Password retrieved from database: " . $stored_password);

            // Verify the password (plain text comparison)
            if ($password === $stored_password) {
                // Authentication successful
                $_SESSION['username'] = $username;
                
                // Redirect to user home page
                header("Location: indexnew.php");
                exit();
            } else {
                // Incorrect password
                echo '<script>alert("Invalid username or password.");</script>';
                error_log("Password verification failed.");
            }
        } else {
            // User not found
            echo '<script>alert("Invalid username or password.");</script>';
            error_log("User not found: " . $username);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Error preparing the statement
        echo "Error preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e2ded3;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
        }
        .card {
            border-radius: 1rem;
        }
        .btn-primary {
            background-color: #4e413b;
        }
        .btn:hover {
            background-color:#211717;
        }

    </style>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Login</h3>
            <form action="userlogin.php" method="POST">
              <div class="form-outline mb-4">
                <input type="text" name="username" id="username" class="form-control form-control-lg" required/>
                <label class="form-label" for="username">Username</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
                <label class="form-label" for="password">Password</label>
              </div>
              <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
            <hr class="my-4">
            <label>Don't have an account? <a href="registration.php">Register</a></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>
</html>

