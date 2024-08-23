<?php
session_start();
// Include database connection file
include 'config.php';

if (isset($_SESSION['email'])) {
    // Redirect to my account page if user is already logged in
    header("Location: index.php");
    exit;
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password submitted from the login form
    $email = $_POST["email"];
    $pasword = $_POST["pasword"];
 
    // Query the database to check if the email and password match a record in the users table
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
 
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hash_password = $row['pasword'];
        
        // Compare submitted password with hashed password
        if (password_verify($pasword, $hash_password)) {
            // Password is correct, set session variable and redirect
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        } else {
            // Password incorrect
            $password_err = "Wrong Password.";
        }
    } else {
        // Email not found
        $email_err = "Wrong Email.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
<?php
if (isset($email_err)) {
    echo "<center><h3>$email_err</h3></center>";
}
if (isset($password_err)) {
    echo "<center><h3>$password_err</h3></center>";
}
?>
	<h1>Login</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	  <label for="email">Email:</label>
	  <input type="email" id="email" name="email" placeholder="Enter your Email" required>

	  <label for="password">Password:</label>
	  <input type="password" id="password" name="pasword" placeholder="Enter your password" required>
	  <button type="submit">Login</button>
	  <p>New user? <a href="register.php">Register here</a></p>
	</form>
</div>
</body>
</html>

