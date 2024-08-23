
<!DOCTYPE html>
<html>
<head>
  <title>Order Now</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<?php
  session_start();
  
  include 'header.php';
  // Connect to the database
  include 'config.php';

  // check if the user is logged in
  if (!isset($_SESSION['email'])) {
    // user is not logged in, redirect to login page
    header('Location: login.php');
    exit;
  }

    // Check if the product_id is set in the $_POST array
    if (isset($_POST['product_id'])) {
      $product_id = $_POST['product_id'];
  
      // Retrieve the product information from the database
      $sql = "SELECT * FROM product WHERE id = '$product_id'";
      $result = mysqli_query($conn, $sql);
  
      if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // set default value to 1
        $total_price = $product['price'] * $quantity;
  
        // Display the product information and order details
        echo '<div class="order-summary">';
        echo '<div class="product-image"><img src="' . $product['image'] . '" alt="' . $product['name'] . '"></div>';
        echo '<div class="product-info">';
        echo '<h2 class="product-name">' . $product['name'] . '</h2>';
        echo '<p class="product-description">' . $product['description'] . '</p>';
        echo '<p class="product-price">Price: ₹' . number_format($product['price'], 2) . '</p>';
        echo '<form method="post" action="order.php">';
        echo '<div class="product-quantity"><label for="quantity">Quantity:</label>';
        echo '<select name="quantity" id="quantity" onchange="updatePrice()">';
        for ($i = 1; $i <= 10; $i++) {
            echo '<option value="' . $i . '">' . $i . '</option>';
        }
        echo '</select></div>';
        echo '<p class="product-total-price">Total Price: ₹<span id="total-price">' . number_format($total_price, 2) . '</span></p>';
        echo '</div>'; 
        echo '</div>'; 

        // Add the customer information fields
        echo '<div class="order-form">';
        echo '<h2>Order Form</h2>';
        echo '<div>';
        echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
        echo '<label for="name">Name:</label>';
        echo '<input type="text" name="name" id="name" required>';
        echo '</div>';
        echo '<div>';
        echo '<label for="phone">Phone:</label>';
        echo '<input type="tel" name="phone" id="phone" required>';
        echo '</div>';
        echo '<div>';
        echo '<label for="email">Email:</label>';
        echo '<input type="email" name="email" id="email" required>';
        echo '</div>';
        echo '<div>';
        echo '<label for="address">Address:</label>';
        echo '<textarea name="address" id="address" required></textarea>';
        echo '</div>';
        echo '<div>';
        echo '<label for="zip">Zip Code:</label>';
        echo '<input type="text" name="zip" id="zip" required>';
        echo '</div>';
      echo '<div class="button-container">';
      echo '<button type="submit" name="place_order">Place Order</button>';
      echo '<button type="submit" name="cancel_order" onclick="goBack()">Cancel</button>';
      echo '</div>';
      echo '</form>';
      echo '</div>';
    } else {
        // Product not found in the database
        echo 'Product not found';
      }
    } else {
        // product_id is not set in the $_POST array
        echo 'Product ID not set';
      }

// Process the order form submission
if (isset($_POST['place_order'])) {
  $name = trim($_POST['name']);
  $phone = trim($_POST['phone']);
  $email = trim($_POST['email']);
  $address = trim($_POST['address']);
  $zip = trim($_POST['zip']);
  $product_name = $product['name'];
  $product_price = $product['price'];
  $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
  $total_price = $product_price * $quantity;

  // Validate the form data
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Name is required.';
  }
  if (empty($phone)) {
    $errors[] = 'Phone is required.';
  }
  if (empty($email)) {
    $errors[] = 'Email is required.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email is invalid.';
  }
  if (empty($address)) {
    $errors[] = 'Address is required.';
  }
  if (empty($zip)) {
    $errors[] = 'Zip code is required.';
  } elseif (!ctype_digit($zip)) {
    $errors[] = 'Zip code must be a number.';
  }

  if (count($errors) > 0) {
    // Display the validation errors
    echo '<div class="order-summary">';
    echo '<h2>Order Form Errors</h2>';
    echo '<ul>';
    foreach ($errors as $error) {
      echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
    echo '</div>';
  } else {
    // Insert the order into the database
    $sql = "INSERT INTO `order` (product_id, product_name, product_price, quantity, total_price, name, phone, email, address, zip) VALUES ('$product_id', '$product_name', '$product_price', '$quantity', '$total_price', '$name', '$phone', '$email', '$address', '$zip')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      // Order successfully placed
      header("Location: success.php");
      exit();
    } else {
      // Error placing order
      echo 'Error placing order: ' . mysqli_error($conn);
    }
  }
} elseif (isset($_POST['cancel_order'])) {
  // Order cancelled
  echo '<div class="order-summary">';
  echo '<h2>Order Cancelled</h2>';
  echo '<p>Your order has been cancelled.</p>';
  echo '</div>';
}

// Close the database connection
mysqli_close($conn);


  echo '<script>';
  echo 'function updatePrice() {';
  echo 'var quantity = document.getElementById("quantity").value;';
  echo 'var price = ' . $product['price'] . ';';
  echo 'var total_price = quantity * price;';
  echo 'document.getElementById("total-price").innerHTML = total_price.toFixed(2);';
  echo '}';
  echo '</script>';
    echo '<script>';
    echo 'function goBack() {';
    echo  'window.history.back();';
    echo '}';
    echo '</script>';

    include 'footer.php';
?>
</body>
</html>
