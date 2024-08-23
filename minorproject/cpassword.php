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
    $row = $result->fetch_assoc();
    $pasword = $row['pasword'];
} else {
    // User not found
    header("Location: login.php");
    exit;
}
// Handle password change form submission
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if current password is correct
    if (password_verify($current_password, $row['pasword'])) {
        // Check if new password and confirm password match
        if ($new_password === $confirm_password) {
            // Hash the new password and update in the database
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET pasword = '$new_password' WHERE email = '$email'";
            if ($conn->query($update_sql) === TRUE) {
                $success_message = "Password updated successfully.";
            } else {
                $error_message = "Error updating password: " . $conn->error;
            }
        } else {
            $error_message = "New password and confirm password do not match.";
        }
    } else {
        $error_message = "Current password is incorrect.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<?php if (isset($success_message)) { ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>

<h2>Change Password</h2>
    <form method="post" action="">
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" required><br><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>

        <button type="submit" name="change_password">Change Password</button>
        <button onclick="window.location.href='myaccount.php'">Goo Back</button>
    </form>
</body>
</html>