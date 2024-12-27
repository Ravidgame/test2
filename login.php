<?php
require_once 'config.php';

// Get data from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Find user by email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // User found
  $row = $result->fetch_assoc();
  // Verify password
  if (password_verify($password, $row['password'])) {
    echo "success";
  } else {
    echo "error: Invalid password";
  }
} else {
  echo "error: User not found";
}

$conn->close();
?>