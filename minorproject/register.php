<?php
session_start();

// check if user is already logged in, redirect login page
if(isset($_SESSION["email"])){
    header("location: index.php");
    exit;
}

// check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// retrieve form data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pasword = $_POST['pasword'];
	$confirm_password = $_POST['confirm_password'];
	$gender = $_POST['gender'];
	$birth = date('Y-m-d', strtotime($_POST['birth']));

	// validate form data
	$errors = array();
	if (empty($name)) {
		$errors[] = "Name is required.";
	}
	if (empty($email)) {
		$errors[] = "Email is required.";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format.";
	}
	if (empty($pasword)) {
		$errors[] = "Password is required.";
	}
	if ($pasword != $confirm_password) {
		$errors[] = "Passwords do not match.";
	}
	if (empty($gender)) {
		$errors[] = "Gender is required.";
	}
	if (empty($birth)) {
		$errors[] = "Date of birth is required.";
	}

	// if no errors, save user data to database
	if (count($errors) == 0) {
		// connect to database (replace the values with your own)
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "user001";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// check if username already exists
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$errors[] = "Email already exists.";
		} else {
			// hash the password
			$hash_password = password_hash($pasword, PASSWORD_DEFAULT);

			// save user data to database
			$sql = "INSERT INTO users (name, email, pasword, gender, birth, cdt) VALUES ('$name', '$email', '$hash_password', '$gender', '$birth', current_timestamp())";
			if (mysqli_query($conn, $sql)) {
				// set session variable
				$_SESSION["email"] = $email;

				// redirect to my account page
				header("location: index.php");
				exit;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// close database connection
		mysqli_close($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
	<title>Register</title>
</head>
<body>
	<div class="container">
	<?php
	// display errors
		if (!empty($errors)) {
			echo "<ul>";
			foreach ($errors as $error) {
				echo "<center><h3>$error</h3></center>";
			}
			echo "</ul>";
	}
	?>
	<h1>Register</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
		<input type="text" id="name" name="name" placeholder="Enter your full name" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" placeholder="Enter your email" required>

		<label for="password">Password:</label>
		<input type="password" id="password" name="pasword" placeholder="Enter your password" required>

        <label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>

		<label for="gender">Gender:</label>
		<select id="gender" name="gender" required>
		  <option value="">Select Gender</option>
		  <option value="male">Male</option>
		  <option value="female">Female</option>
		  <option value="other">Other</option>
		</select>

		<label for="birth">Date of Birth:</label>
		<input type="date" id="birth" name="birth" required>

		<button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
	</form>
    </div>
</body>
</html>
