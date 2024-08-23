<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product edit</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section class="home">
<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the products from the database
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

// Check if any products are found
if (mysqli_num_rows($result) > 0) {
    // Display the table
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Description</th>';
    echo '<th>Price</th>';
    echo '<th>Quantity</th>';
    echo '<th>Category ID</th>';
    echo '<th>Image</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Iterate over the fetched products
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['category_id'] . '</td>';
        echo '<td><img src="uploads/' . $row['image'] . '" alt="' . $row['name'] . '"></td>';
        echo '<td>';
        echo '<form method="POST" action="update.php" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<input type="text" name="name" value="' . $row['name'] . '">';
        echo '<input type="text" name="description" value="' . $row['description'] . '">';
        echo '<input type="text" name="price" value="' . $row['price'] . '">';
        echo '<input type="text" name="quantity" value="' . $row['quantity'] . '">';
        echo '<input type="text" name="category_id" value="' . $row['category_id'] . '">';
        echo '<input type="file" name="image">';
        echo '<button type="submit">Update</button>';
        echo '</form>';
        echo '<button class="delete-btn">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No products found.';
}
?>

</section>
<?php include "nav.php"?>

<script src="script.js"></script>
</body>
</html>