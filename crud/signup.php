<?php
// Check if the signup form is submitted
if(isset($_POST['submit'])){
  // Establish database connection
  $conn = mysqli_connect("localhost", "root", "", "users");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Prepare and execute the query to insert user data into the database
  $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
  $result = mysqli_query($conn, $query);

  // Check if the query executed successfully
  if($result){
    echo "Signup successful!";
  }else{
    echo "Signup failed!";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="signup-name">Name:</label>
        <input type="text" id="signup-name" name='name' required>
      </div>
      <div class="form-group">
        <label for="signup-email">Email:</label>
        <input type="email" id="signup-email" name='email' required>
      </div>
      <div class="form-group">
        <label for="signup-password">Password:</label>
        <input type="password" id="signup-password" name='password' required>
      </div>
      <div class="form-group">
        <button type="submit" name='submit'>Sign Up</button>
      </div>
      <div class="switch-form">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
