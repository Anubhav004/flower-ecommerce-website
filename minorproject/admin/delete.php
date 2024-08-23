<?php
session_start();

// Include database connection file
include 'config.php';

if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Check if ID is set in URL query string
if (isset($_GET["id"])) {
  // Retrieve ID from URL query string
  $id = $_GET["id"];

  // Delete row from database with corresponding ID
  $sql = "DELETE FROM `order` WHERE sno='$id'";
  $result = $conn->query($sql);

  // Check if row was deleted successfully
  if ($result) {
    header("Location: vieworder.php");
  } else {
    echo "Error deleting row: " . $conn->error;
  }
}

// Close database connection
$conn->close();
?>
