<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}
  
  // Query to fetch data
  $sql = "SELECT * FROM `order`";
  
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section class="home">
<table>
  <thead>
    <tr>
      <th>S.No.</th>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Zip</th>
      <th>CDT</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["sno"] . "</td>";
        echo "<td>" . $row["product_id"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["product_price"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["total_price"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["zip"] . "</td>";
        echo "<td>" . $row["cdt"] . "</td>";
        echo "<td>";
        echo "<button><a href='delete.php?id=" . $row["sno"] . "'>Delete</a></button>";
        echo "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='13'>No orders found</td></tr>";
    }
    ?>
  </tbody>
</table>
</section>
<?php
// Close database connection
$conn->close();
?>
<?php include "nav.php"?>
<script src="script.js"></script>
</body>
</html>