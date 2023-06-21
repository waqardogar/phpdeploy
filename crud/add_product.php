<?php
require_once "connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $description = $_POST["description"];
  $quantity = $_POST["quantity"];
  $unit_price = $_POST["unit_price"];
  $image = $_FILES["image"]["name"];
  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($image);
  move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
  $sql = "INSERT INTO products (name, description, quantity, unit_price, image)
          VALUES ('$name', '$description', $quantity, $unit_price, '$image')";
  if ($conn->query($sql) === TRUE) {
    // echo "Product added successfully!";
    header('location:dashboard.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>