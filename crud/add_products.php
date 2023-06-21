<!DOCTYPE html>
<html>
<head>
  <title>Add products</title>
</head>
<body>
  <h1>Add Product</h1>
  <form action="add_product.php" method="post" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br><br>
    
    <label for="description">Product Description:</label>
    <textarea name="description" rows="4" cols="50" required></textarea><br><br>
    
    <label for="quantity">Product Quantity:</label>
    <input type="number" name="quantity" required><br><br>
    
    <label for="unit_price">Product Unit Price:</label>
    <input type="number" step="0.01" name="unit_price" required><br><br>
    
    <label for="image">Product Image:</label>
    <input type="file" name="image" required><br><br>
    
    <input type="submit" value="Add Product">
  </form>
</body>
</html>
