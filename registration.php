<?php
// Database connection parameters
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "hireup"; 

// Establish connection
$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the registration form is submitted
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Validate password and confirm password
    if ($password === $repassword) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $query = "INSERT INTO user (username, phone, email, password) VALUES ('$username','$phone', '$email', '$password')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo '<script>alert("Registration successful! Please login."); window.location.href = "userlogin.php";</script>';
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo '<script>alert("Passwords do not match. Please try again."); window.location.href = "registration.php";</script>';
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color:#e2ded3;
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
            <h3 class="mb-5">User Registration</h3>
            <form action="registration.php" method="POST">
              <div class="form-outline mb-4">
                <input type="text" name="username" id="username" class="form-control form-control-lg" required/>
                <label class="form-label" for="username">User Name</label>
              </div>
              <div class="form-outline mb-4">
                <input type="tel" name="phone" id="phone" class="form-control form-control-lg" pattern="[0-9]{10}" title="Please Enter Valid Number" required/>
                <label class="form-label" for="phone">Phone Number</label>
              </div>
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                <label class="form-label" for="email">Email</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="repassword" id="repassword" class="form-control form-control-lg" required/>
                <label class="form-label" for="repassword">Confirm Password</label>
              </div>
              <button name="register" class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
            </form>
            <hr class="my-4">
            <label>Already a user? <a href="userlogin.php">Login</a></label>
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
