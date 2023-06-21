<?php
// Step 1: Connect to the database
$conn = mysqli_connect("localhost", "root", "", "product_db");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Step 2: Handle the deletion
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Delete the product from the database
  $query = "DELETE FROM products WHERE id = $product_id";
  mysqli_query($conn, $query);

  header("Location: dashboard.php");
  exit();
}

// Step 3: Close the database connection
mysqli_close($conn);
?>
