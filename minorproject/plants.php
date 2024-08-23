<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Shop</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
  <header>
		<nav>
			<div class="logo">
				Pla<span>n</span>ts
			</div>
			<div class="menu">
				<a href="index.php"><b>Home</b></a>
        <div class="dropdown">
				<a class="active" href="plants.php"><b>Plants</b></a> 
        <div class="dropdown-content">
        <?php
        // Connect to the database
        include 'config.php';

        // Retrieve categories from database
        include 'category.php';
      ?>
      </div>
      </div>
				<a href="about.php"><b>About</b></a>
				<a href="contactus.php"><b>Contact us</b></a>
			</div>
			<div class="icon">
      <?php
      session_start();
      
    			if (isset($_SESSION['email'])) {
      			// user is logged in, display "Logout" and "My Account" options
            echo '<a href="myaccount.php">My Account</a>';
            echo '<a href="logout.php">Logout</a>';
				} else {
				// user is not logged in, display "Login" option
				echo '<a href="login.php">Login</a>';
				}
				?>
			</div>
		</nav>
  </header>
  <header>
  <div class="shop-cover">
  <div class="left-images">
    <img src="image/flower.png">
    <img src="image/flower1.png">
  </div>
  <div class="right-text">
    <h1>Welcome to our shop</h1>
    <p>Explore our collection of products and find the perfect item for you.</p>
    <p><b>Get 50%</b> Discount Instantly</p>
  </div>
</div>
  </header>
  

<!--This-->
<h1 class="head">

  Best Plants Collection
  <?php
  // Check if a category is selected
  if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    // Connect to the database
    include 'config.php';

    // Fetch the category name from the database based on the category ID
    $query = "SELECT name FROM categories WHERE id = $categoryId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $categoryName = $row['name'];
      echo " - " . $categoryName; // Display the hyphen and category name
    }
  }
  ?>
</h1>

<div class="order-section">
  <?php
  // Connect to the database
  include 'config.php';

  // Retrieve the category ID from the query string parameter
  $category_id = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_NUMBER_INT);

  $category_name = '';
  if ($category_id) {
    // Use a prepared statement to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $category_name = $row['name'];
    }
  }

  // Construct the SQL query to retrieve products for the specified category
  $sql = "SELECT * FROM product";
  if ($category_id) {
    // Use a prepared statement to prevent SQL injection attacks
    $stmt = $conn->prepare("SELECT * FROM product WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
  } else {
    $result = mysqli_query($conn, $sql);
  }

  // Check if any products are found in the database
  if ($result->num_rows > 0) {
    $count = 0;
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
      $id = $row["id"];
      $name = htmlspecialchars($row["name"]);
      $description = htmlspecialchars($row["description"]);
      $price = $row["price"];
      $image = $row["image"];

      // Display the product information in a product card
      echo '<div class="col">
              <div class="product">
                <img src="./'.$image.'" alt="'. $name.'">
                <h3>'. $name.'</h3>';
                if(isset($_POST['order-btn']) && $_POST['order-btn'] == $id) {
                  echo '<p class="description">'.$description.'</p>';
              } else {
                  echo '<p class="description">'.substr($description, 0, 80).'...</p>';
              }
                echo '<p class="price">₹'.$price.'</p>
                <form method="post" action="order.php">
                  <input type="hidden" name="product_id" value="'.$id.'">
                  <button class="order-btn" name="order-btn" value="'.$id.'">Order Now</button>
                </form>
              </div>
            </div>';
      $count++;
      if ($count % 3 == 0) {
        // Close the current row and start a new one
        echo '</div><div class="row">';
      }
    }
    // Close the last row
    echo '</div>';
  } else {
    // If no products are found in the database, display a message
    echo "No products found.";
  }

  // Close the database connection
  mysqli_close($conn);

  ?>
</div>

    
<!--footer-->

<?php
include 'footer.php';
?>
</body>
</html>
