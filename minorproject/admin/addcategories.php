<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Check if the form was submitted
if (!empty($_POST)) {
  
    // Check if the category name was provided
    if (!empty($_POST['category_name'])) {
      $category_name = $_POST['category_name'];
      
      // Use a prepared statement to prevent SQL injection attacks
      $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
      $stmt->bind_param("s", $category_name);
      $stmt->execute();
  
      // Check if the category was successfully inserted
      if ($stmt->affected_rows > 0) {
        header("Location: addcategories.php");
      } else {
        echo "Error adding category: " . $stmt->error;
      }
  
      // Close the prepared statement
      $stmt->close();
  
    } else {
      echo "Error: Category name not provided.";
    }
  
    // Close the database connection
    mysqli_close($conn);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categories</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  
    <div class = "categories">
        
<form method="post" action="">
<h1>Add Categories</h1>
  <label for="category_name">Category Name:</label>
  <input type="text" id="category_name" name="category_name" required>
  <button type="submit" name="submit">Add category</button>
</form>
</div>
<?php include 'nav.php'?>
<script src="script.js"></script>
</body>
</html>