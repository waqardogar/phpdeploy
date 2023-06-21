<?php
// Check if the login form is submitted
if(isset($_POST['login'])){
  // Establish database connection
  $conn = mysqli_connect("localhost", "root", "", "users");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  // Retrieve form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare and execute the query to fetch user data from the database
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);

  // Check if the query executed successfully and if a user with the given email exists
  if($result && mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);

    // Verify the password
    if(password_verify($password, $user['password'])){
      header('location:dashboard.php');
    }else{
      echo "Invalid password!";
    }
  }
  // Close the database connection
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form id="login-form" method="POST" action="">
      <div class="form-group">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name='email' required>
      </div>
      <div class="form-group">
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name='password' required>
      </div>
      <div class="form-group">
        <button type="submit" name='login'>Login</button>
      </div>
      <div class="switch-form">
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
      </div>
    </form>
  </div>
</body>
</html>
