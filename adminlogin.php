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
    $adminid = $_POST['adminid'];
    $adminpassword = $_POST['adminpassword'];

    // Prepare and bind a SQL statement to fetch the user's password
    $stmt = $conn->prepare("SELECT adminpassword FROM admin WHERE adminid = ?");
    if ($stmt) {
        $stmt->bind_param("s", $adminid);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($stored_password);
            $stmt->fetch();

            // Verify the password (plain text comparison)
            if ($adminpassword === $stored_password) {
                // Authentication successful
                $_SESSION['adminid'] = $adminid;
                header("Location: insertproject.php");
                exit();
            } else {
                // Incorrect password
                echo '<script>alert("Invalid username or password.");</script>';
            }
        } else {
            // User not found
            echo '<script>alert("Invalid username or password.");</script>';
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
    <title>Admin Login</title>
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
            <h3 class="mb-5">Admin Login</h3>
            <form action="adminlogin.php" method="POST">
              <div class="form-outline mb-4">
                <input type="text" name="adminid" id="adminid" class="form-control form-control-lg" required/>
                <label class="form-label" for="adminid">Admin ID</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="adminpassword" id="adminpassword" class="form-control form-control-lg" required/>
                <label class="form-label" for="adminpassword">Password</label>
              </div>
              <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
            <hr class="my-4">
            
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
