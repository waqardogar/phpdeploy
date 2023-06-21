<?php
require_once "connection.php";
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
  <style>
    .product {
      display: inline-block;
      width: 200px;
      padding: 10px;
      margin: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }
  </style>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #333;
      color: #fff;
      padding: 20px;
    }
    
    .navbar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    
    .navbar li {
      margin-right: 20px;
    }
    
    .navbar a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }
    
    .navbar a:hover {
      color: #ffcc00;
    }
    
    .content {
      padding: 20px;
    }
    /* CSS styles for the product card */
    .product-card {
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    .product-card img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    
    .product-card h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }
    
    .product-card p {
      font-size: 14px;
      color: #666;
      margin-bottom: 10px;
    }
    
    .product-card .price {
      font-size: 18px;
      font-weight: bold;
    }
    
    .product-card button {
      padding: 10px 15px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    .product-card button:hover {
      background-color: #45a049;
    }
  
  </style>
</head>

<body>
  <h1>Products</h1>
  <?php
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $id = $row['id'];
      echo '<div class="product product-card">';
      echo '<img src="uploads/' . $row["image"] . '" width="150" height="150"><br>';
      echo '<h3>'.'Name: ' . $row["name"] . '</h3>';
      echo '<p>: ' . $row["description"] .'</p>';
      echo '<p>'.'Quantity Availble: ' . $row["quantity"] . '</p>';
      echo '<p>'.'Unit Price: $' . $row["unit_price"] .'</p>'. '<br>';
      echo '<button><a href="update.php?id=' . $id . '">Edit</a></button>';
      echo '<button><a href="delete.php?id=' . $id . '">Delete</a></button>';
      echo '</div>';
    }
  } else {
    echo "No products found.";
  }

  $conn->close();
  ?>
<br>
  <button><a href="add_products.php">Add Products</a></button>
</body>
</html>