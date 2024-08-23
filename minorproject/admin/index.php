<!-- session start -->
<?php
	session_start();
    
    if(!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit();

    }
		// connect to database (replace the values with your own)
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "admin11";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

        // Fetch the admin name from the database based on the logged-in admin's email
        $email = $_SESSION["email"];
        $sql = "SELECT name FROM admins WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    
    // Check if the query was successful and if a row was returned
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $adminName = $row["name"];
    } else {
        // If no row was returned, handle the error or provide a default name
        $adminName = "Admin";
    }
    
    // Close the database connection
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
<?php include "nav.php"?>
<section class="home">
        <div class="text">Welcome to Dashboard, <?php echo $adminName; ?>!</div>
        <img src="plantss.jpg" width="1000" height="600" style="display: block; margin-left: auto; margin-right: auto;">
    </section>
    <script src="script.js"></script>

</body>
</html>