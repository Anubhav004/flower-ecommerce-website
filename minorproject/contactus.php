<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="style2.css">
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
				<a class="active" href="contactus.php"><b>Contact us</b></a>
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
  <header class="cover" style = "margin-top: 3%";>
  <h1>Contact Us</h1>
</header>
  <main>
  <div class="design">
    <form method="post" action="submit.php">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>
  <label for="subject">Subject:</label>
  <input type="text" id="subject" name="subject" required><br><br>
  <label for="message">Message:</label>
  <textarea id="message" name="message" required></textarea><br><br>
  <input type="submit" value="Submit">
</form>
<div class="right-text">
<h2>Contact Us</h2>
    <p>Feel free to reach out to us with any questions or concerns. We'll get back to you as soon as possible.</p>
  </div>
	</div>
  </main>

<!-- Footer -->
<?php
include 'footer.php';
?>
<!-- Add this before the closing body tag -->

</body>
</html>
