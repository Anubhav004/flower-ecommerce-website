<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>
</html>