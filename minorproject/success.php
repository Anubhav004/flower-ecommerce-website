<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['email'])) {
	 //redirect user to login page
	header("Location: login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Placed Successfully!</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<h1>Order Placed Successfully!</h1>
	<p>Thank you for your order. Your order has been placed successfully.</p>
	<p>If you would like to place another order, please click the button below:</p>
	<button onclick="window.location.href='plants.php'">Place Another Order</button>
</body>
</html>
