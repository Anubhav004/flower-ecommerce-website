<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the user's information from the database based on their email
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user_row = $result->fetch_assoc();
    $user_name = $user_row['name'];
    $birth = $user_row['birth'];
    $gender = $user_row['gender'];
} else {
    // User not found
    header("Location: login.php");
    exit;
}
// Retrieve the user's product history from the database
$product_sql = "SELECT * FROM `order` WHERE email = '$email'";
$product_result = $conn->query($product_sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
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
				<a href="plants.php"><b>Plants</b></a>
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
    <div class="detail">
    <h2>Welcome to our Plant Paradise.</h2>
    <p>Name:- <?php echo $user_name; ?></p>
    <p>Email:- <?php echo $_SESSION['email']; ?></p>
    <p>Birth date:- <?php echo $birth; ?></p>
    <p>Gender:- <?php echo $gender; ?></p>
</div>
<h3 class="p_history">Product History:</h3>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Date Purchased</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through each product and display its information
        while ($product_row = $product_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $user_name . "</td>";
            echo "<td>" . $product_row['product_name'] . "</td>";
            echo "<td>₹" . $product_row['product_price'] . "</td>";
            echo "<td>" . $product_row['quantity'] . "</td>";
            echo "<td>₹" . $product_row['total_price'] . "</td>";
            echo "<td>" . $product_row['cdt'] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
    <p class="pasword">You Want to Change the Password :-  <button onclick="window.location.href='cpassword.php'">Change Password</button></p>
    
    <!-- Footer -->
<?php
include 'footer.php';
?>
</body>
</html>