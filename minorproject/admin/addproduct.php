<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Query to fetch categories
$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

// Store category options in an array
$category_options = array();
while ($row = mysqli_fetch_assoc($result)) {
    $category_options[$row['id']] = $row['name'];
}

// Check if form submitted
if (isset($_POST['submit'])) {
    // Get product details from form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    // Upload product image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        //$image = $target_file;
        $image = 'admin/uploads/'.basename($_FILES['image']['name']);
    } else {
        $image = "";
    }

    // Insert product details into database
    $query = "INSERT INTO product (name, description, price, quantity, image, category_id)
              VALUES ('$name', '$description', '$price', '$quantity', '$image', '$category_id')";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
<!-- HTML form -->
<form method="post" enctype="multipart/form-data">
    <h2>Add a New Product</h2>
    <label for="image">Product Image:</label>
    <input type="file" name="image" accept="image/*" required>
    <br><br>
    <label for="name">Product Name:</label>
    <input type="text" name="name" required>
    <br><br>
    <label for="description">Product Description:</label>
    <textarea name="description" required></textarea>
    <br><br>
    <label for="price">Product Price:</label>
    <input type="number" name="price" step="0.01" min="0" required>
    <br><br>
    <label for="quantity">Product Quantity:</label>
    <input type="number" name="quantity" min="0" required>
    <br><br>
    <label for="category_id">Product Category:</label>
    <select name="category_id">
        <?php foreach ($category_options as $id => $name) { ?>
            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
        <?php } ?>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Add Product">
</form>
<?php include "nav.php"?>
<script src="script.js"></script>
</body>
</html>