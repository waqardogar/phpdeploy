<?php
// Step 1: Connect to the database
$conn = mysqli_connect("localhost", "root", "", "product_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the submitted form data
  $product_id = $_POST['product_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $unit_price = $_POST['unit_price'];
  // Update the product in the database
  $query = "UPDATE products SET name = '$name', description = '$description', quantity = $quantity, unit_price = $unit_price WHERE id = $product_id";
  mysqli_query($conn, $query);
  header("Location: dashboard.php");
  exit();
}
// Step 3: Retrieve the product data
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // echo "this is2 ";

  $product_id = $_GET['id'];
  // Retrieve the product from the database
  $query = "SELECT * FROM products WHERE id = $product_id";
  $result = mysqli_query($conn, $query);
//   echo $result;
  // Check if the product exists
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $description = $row['description'];
    $quantity = $row['quantity'];
    $unit_price = $row['unit_price'];
  } else {
    echo "Product not found.";
    exit();
  }
}
// Step 4: Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
</head>
<body>
<h2>Edit Product</h2>
  <form method="POST" action="update.php">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo isset($name) ? $name : 'this'; ?>"><br><br>
    <label>Description:</label>
    <textarea name="description"><?php echo isset($description) ? $description : 'this'; ?></textarea><br><br>
    <label>Quantity:</label>
    <input type="text" name="quantity" value="<?php echo isset($quantity) ? $quantity : 'this'; ?>"><br><br>
    <label>Unit Price:</label>
    <input type="text" name="unit_price" value="<?php echo isset($unit_price) ? $unit_price : 'this'; ?>"><br><br>
    <input type="submit" value="Save">
  </form>
</body>
</html>
